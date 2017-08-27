<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Log;

class ActivityController extends Controller
{

    public function getSelfActivityPage(Request $request){

        $username = $request->session()->get('username');
        $pic_url = $request->session()->get('pic_url');

        $self_activity_list = DB::table('activity')
            ->select('activity.*')
            ->where('creator_name',$username)
            ->where('state','running')
            ->get();

        $friends_activity_list = DB::table('activity')
            ->join('friendship','activity.creator_name','=','friendship.friend_name_b')
            ->select('activity.*')
            ->where('friendship.friend_name_a',$username)
            ->where('state','running')
            ->get();

        $result = ['self_list'=>$self_activity_list, 'friends_list'=>$friends_activity_list];

        $activity_member_list = [];
        foreach($self_activity_list as $element) {
            $member_list = DB::table('activity_member')
                ->select('activity_member.*')
                ->where('activity_id',$element->id)
                ->get();
            $activity_member_list[]=$member_list;
        }
        foreach($friends_activity_list as $element) {
            $member_list = DB::table('activity_member')
                ->select('activity_member.*')
                ->where('activity_id',$element->id)
                ->get();
            $activity_member_list[]=$member_list;
        }

        $friend_list = DB::table('friendship')
            ->select('friendship.*')
            ->where('friend_name_a',$username)
            ->get();

        $invite_activity_list = DB::table('activity')
            ->join('activity_invite','activity.id','=','activity_invite.activity_id')
            ->select('activity.*')
            ->where('activity_invite.name',$username)
            ->get();

        $result['invites']=$invite_activity_list;

        $result['member_list']=$activity_member_list;

        $result['username']=$username;
        $result['pic_url']=$pic_url;
        $result['level']=$request->session()->get('level');
        $result['friends']=$friend_list;

        return view('activity',$result);

    }

    public function createActivity(Request $request){

        $activity_name = $request->input('activity_name');
        $normal = $request->input('normal');
        $double = $request->input('double');
        $team = $request->input('team');
        $time = $request->input('time');
        $type = 'normal';
        if($normal=='on')
            $type = 'normal';
        else if($double=='on')
            $type='double';
        else if($team=='on')
            $type = 'team';
        else if($time=='on')
            $type = 'time';
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $description = $request->input('description');

        $user_name = $request->session()->get('username');
        $pic_url = $request->session()->get('pic_url');

        $id = DB::table('activity')
            ->insertGetId(
                ['name'=>$activity_name, 'type'=>$type, 'creator_name'=>$user_name,
                    'creator_pic_url'=>$pic_url, 'start_date'=>$start_date, 'end_date'=>$end_date,
                    'description'=>$description, 'state'=>'running']
            );

        DB::table('activity_member')
            ->insert(
                ['activity_id'=>$id, 'member_name'=>$user_name,
                    'member_city'=>$request->session()->get('city'),
                    'member_career'=>$request->session()->get('career'),
                    'member_pic_url'=>$pic_url]
            );

        DB::table('personal_info')
            ->where('username',$user_name)
            ->increment('level_exp',20);

        $exp = DB::table('personal_info')
            ->select('*')
            ->where('username',$user_name)
            ->first();

        if($exp->level_exp>=100){
            DB::table('personal_info')
                ->where('username',$user_name)
                ->decrement('level_exp',100);
            DB::table('personal_info')
                ->where('username',$user_name)
                ->increment('level',1);
        }

    }

    public function endActivity(Request $request){

        //Log::info($request->input('id'));
        DB::table('activity')
            ->where('id',$request->input('id'))
            ->update(['state'=>'end']);

    }

    public function joinActivity(Request $request){

        $name = $request->session()->get('username');
        $pic_url = $request->session()->get('pic_url');
        $city = $request->session()->get('city');
        $career = $request->session()->get('career');
        $id = $request->input('id');

        $member_list = DB::table('activity_member')
            ->select('member_name')
            ->where('activity_id',$id)
            ->get();

        $result = 'success';
        for($i=0;$i<count($member_list);$i++){
            if($member_list[$i]->member_name==$name){
                $result = 'exist';
                break;
            }
        }

        if($result=='success'){
            DB::table('activity_member')
                ->insert(
                    ['activity_id'=>$id, 'member_name'=>$name, 'member_city'=>$city,
                        'member_career'=>$career, 'member_pic_url'=>$pic_url]
                );

            DB::table('personal_info')
                ->where('username',$name)
                ->increment('level_exp',20);

            $exp = DB::table('personal_info')
                ->select('*')
                ->where('username',$name)
                ->first();

            if($exp->level_exp>=100){
                DB::table('personal_info')
                    ->where('username',$name)
                    ->decrement('level_exp',100);
                DB::table('personal_info')
                    ->where('username',$name)
                    ->increment('level',1);
            }

            return ['result'=>$result];
        }
        else{
            return ['result'=>$result];
        }

    }

    public function sendInviteRequest(Request $request){

        $username = $request->session()->get('username');
        $name = $request->input('name');
        $activity_id = $request->input('activity_id');

        $exist = DB::table('activity_member')
            ->select('*')
            ->where('activity_id',$activity_id)
            ->where('member_name',$name)
            ->get();

        if(count($exist)!=0)
            return "exist";

        $exist = null;

        $exist = DB::table('activity_invite')
            ->select('*')
            ->where('inviter_name',$username)
            ->where('name',$name)
            ->where('activity_id',$activity_id)
            ->get();

        if(count($exist)!=0)
            return "send";

        $exist = null;

        $exist = DB::table('personal_info')
            ->select('*')
            ->where('username',$name)
            ->get();

        if(count($exist)==0)
            return "null";

        DB::table('activity_invite')
            ->insert(
                ['inviter_name'=>$username,'name'=>$name,'activity_id'=>$activity_id]
            );

        return "success";

    }

    public function acceptInvite(Request $request){

        $username = $request->session()->get('username');
        $pic_url = $request->session()->get('pic_url');
        $city = $request->session()->get('city');
        $career = $request->session()->get('career');
        $activity_id = $request->input('activity_id');

        DB::table('activity_member')
            ->insert(
              ['activity_id'=>$activity_id, 'member_name'=>$username, 'member_city'=>$city,
                'member_career'=>$career, 'member_pic_url'=>$pic_url]
            );

        DB::table('activity_invite')
            ->where('name',$username)
            ->where('activity_id',$activity_id)
            ->delete();

    }

}
