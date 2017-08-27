<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Illuminate\Support\Facades\DB;

class FriendsInfoController extends Controller
{

    public function getFriendsInfoPage(Request $request){

        $username = $request->session()->get('username');
        $pic_url = $request->session()->get('pic_url');

        $friends_list = DB::table('friendship')
            ->select('*')
            ->where('friend_name_a',$username)
            ->get();

        $request_list = DB::table('friend_request')
            ->select('*')
            ->where('friend_name_a',$username)
            ->get();

        $request_num = count($request_list);

        return view('friends_info',
            ['username'=>$username,'pic_url'=>$pic_url,'friends'=>$friends_list,
                'requests'=>$request_list, 'count'=>$request_num]
        );

    }

    public function acceptFriendRequest(Request $request){

        $username = $request->session()->get('username');
        $friend_name = $request->input('name');

        Log::info($friend_name);

        $tmp_info = DB::table('personal_info')
            ->where('username',$username)
            ->first();

        DB::table('friendship')
            ->insert(
                ['friend_name_a'=>$friend_name, 'friend_name_b'=>$username,
                    'friend_city_b'=>$tmp_info->city, 'friend_career_b'=>$tmp_info->career,
                    'friend_description_b'=>$tmp_info->description,
                    'friend_pic_url_b'=>$tmp_info->pic_url]
            );

        $tmp_info = DB::table('personal_info')
            ->where('username',$friend_name)
            ->first();

        DB::table('friendship')
            ->insert(
                ['friend_name_a'=>$username, 'friend_name_b'=>$friend_name,
                    'friend_city_b'=>$tmp_info->city, 'friend_career_b'=>$tmp_info->career,
                    'friend_description_b'=>$tmp_info->description,
                    'friend_pic_url_b'=>$tmp_info->pic_url]
            );

        DB::table('friend_request')
            ->where('friend_name_b',$friend_name)
            ->where('friend_name_a',$username)
            ->delete();

    }

    public function sendFriendRequest(Request $request){

        $username = $request->session()->get('username');
        $pic_url = $request->session()->get('pic_url');
        $city = $request->session()->get('city');
        $career = $request->session()->get('career');
        $targetname = $request->input('name');

        $friends_list = DB::table('friendship')
            ->select('*')
            ->where('friend_name_a',$username)
            ->get();

        for($i=0;$i<count($friends_list);$i++){
            if($friends_list[$i]->friend_name_b==$targetname){
                return 'exist';
            }
        }

        $info = DB::table('personal_info')
            ->where('username',$targetname)
            ->first();

        if($info!=null){
            DB::table('friend_request')
                ->insert(
                    ['friend_name_a'=>$targetname, 'friend_name_b'=>$username,
                        'friend_city_b'=>$city, 'friend_career_b'=>$career,
                        'friend_pic_url_b'=>$pic_url]
                );
            return 'success';
        }else{
            return 'null';
        }

    }

    public function deleteFriend(Request $request){

        $username = $request->session()->get('username');
        $friend_name = $request->input('name');
        DB::table('friendship')
            ->where('friend_name_a',$username)
            ->where('friend_name_b',$friend_name)
            ->delete();
        DB::table('friendship')
            ->where('friend_name_b',$username)
            ->where('friend_name_a',$friend_name)
            ->delete();

    }

}
