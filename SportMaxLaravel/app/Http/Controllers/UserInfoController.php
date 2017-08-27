<?php

namespace App\Http\Controllers;

use App\UserInfo;
use Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserInfoController extends Controller
{

    public function getPersonalInfoPage($username, Request $request){

        $personal_info = UserInfo::where('username',$username)->first();
        $username = $request->session()->get('username');
        $pic_url = $request->session()->get('pic_url');
        if($personal_info->username==$username)
            return view('personal_info',['info'=>$personal_info]);
        else
            return view('other_personal_info',['info'=>$personal_info,'username'=>$username,'pic_url'=>$pic_url]);

    }

    public function getSelfPersonalInfoPage(Request $request){

        $username = $request->session()->get('username');
        $personal_info = UserInfo::where('username',$username)->first();
        return view('personal_info',['info'=>$personal_info]);

    }

    public function editSelfPersonalInfo(Request $request){

        $username = $request->session()->get('username');
        $nickname = $request->input('nickname');
        $email = $request->input('email');
        $sex = $request->input('sex');
        $birthday = $request->input('birthday');
        $city = $request->input('city');
        $career = $request->input('career');
        $hobby = $request->input('hobby');
        $description = $request->input('description');

        DB::table('personal_info')
            ->where('username',$username)
            ->update(
                ['nickname'=>$nickname, 'email'=>$email, 'sex'=>$sex, 'birthday'=>$birthday,
                    'city'=>$city, 'career'=>$career, 'hobby'=>$hobby, 'description'=>$description]
            );

        DB::table('friendship')
            ->where('friend_name_b',$username)
            ->update(
              ['friend_city_b'=>$city, 'friend_career_b'=>$career,
                  'friend_description_b'=>$description]
            );

        DB::table('friend_request')
            ->where('friend_name_b',$username)
            ->update(
                ['friend_city_b'=>$city, 'friend_career_b'=>$career]
            );

        DB::table('activity_member')
            ->where('member_name',$username)
            ->update(
                ['member_city'=>$city, 'member_career'=>$career]
            );

    }

}
