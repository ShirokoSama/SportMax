<?php

namespace App\Http\Controllers;

use App\LoginInfo;
use Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    public function loginHandle(Request $request){

        $username = $request->input('username');
        $password = $request->input('password');
        $result = "null";

        $login_info = LoginInfo::where('username',$username)->first();

        if($login_info==null){
            $result = "null";
        }
        else if($login_info->password!=$password){
            $result = "error";
        }
        else{
            $request->session()->put('username',$username);
            $info = DB::table('personal_info')
                ->select('personal_info.*')
                ->where('username',$username)
                ->get();
            $request->session()->put('pic_url',$info[0]->pic_url);
            $request->session()->put('city',$info[0]->city);
            $request->session()->put('career',$info[0]->career);
            $request->session()->put('level',$info[0]->level);
            $result = "success";
        }

        return ["result"=>$result,"url"=>"/personal_info"];

    }

    public function getPasswordEditPage(Request $request){

        $username = $request->session()->get('username');
        $pic_url = $request->session()->get('pic_url');
        return view('password_edit',['username'=>$username,'pic_url'=>$pic_url]);

    }

    public function editPassword(Request $request){

        $username = $request->session()->get('username');
        $current_pw = $request->input('current_pw');
        $new_pw = $request->input('new_pw');

        if($new_pw==null){
            return "null";
        }

        $info = DB::table('user_login')
            ->select('*')
            ->where('username',$username)
            ->first();

        if($current_pw==$info->password){
            DB::table('user_login')
                ->where('username',$username)
                ->update(['password'=>$new_pw]);
            return "success";
        }
        else{
            return 'error';
        }

    }

}
