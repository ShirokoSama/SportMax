<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Illuminate\Support\Facades\DB;

class DynamicController extends Controller
{

    public function getDynamicPage(Request $request){

        $username = $request->session()->get('username');
        $pic_url = $request->session()->get('pic_url');

        $dynamics = DB::table('dynamic')
            ->join('friendship','dynamic.creator_name','=','friendship.friend_name_b')
            ->select('dynamic.*')
            ->where('friendship.friend_name_a',$username)
            //->orwhere('dynamic.creator_name',$username)
            ->orderby('dynamic.date')
            ->get();

        $self_dynamics = DB::table('dynamic')
            ->select('*')
            ->where('creator_name',$username)
            ->orderby('date')
            ->get();

        Log::info($dynamics);
        Log::info($self_dynamics);

        return view('dynamic',['username'=>$username, 'pic_url'=>$pic_url, 'dynamics'=>$dynamics, 'self_dynamics'=>$self_dynamics]);

    }

    public function createDynamic(Request $request){

        $content = $request->input('content');

        DB::table('dynamic')
            ->insertGetId(
                [
                    'content'=>$content,
                    'date'=>'2016-12-1',
                    'creator_name'=>$request->session()->get('username'),
                    'creator_pic_url'=>$request->session()->get('pic_url'),
                    'stars'=>0
                ]
            );

    }

    public function deleteDynamic(Request $request){

        $id = $request->input('id');
        DB::table('dynamic')
            ->where('id',$id)
            ->delete();

    }

}
