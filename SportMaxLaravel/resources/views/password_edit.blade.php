<!DOCTYPE html>
<html>
<head>
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/materialize.css')}}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/mystyle.css')}}">
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/activitystyle.css')}}">
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/languagecss.css')}}">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body>

    <div class="navbar-fixed"><nav><div class="nav-wrapper teal lighten-2">
        <div class="row">
            <div class="col s1"></div>
            <div class="col s10">
                <ul>
                    <a href="#" class="left logo-position">SportMax</a>
                </ul>
                <ul class="right hide-on-med-and-down navbar-style">
                    <li><a href="/sport_data">运动</a></li>
                    <li><a href="/activity">活动</a></li>
                    <li><a href="/dynamic">动态</a></li>
                </ul>
                <ul class="right">
                    <a class="dropdown-button" href="#"  style="height: 64px"
                       data-beloworigin="true" data-hover="true" data-activates="head_drop_down">
                        <li><img src="{{URL::asset($pic_url)}}" class="circle head-pic-navbar"></li>
                        <li style="margin-right: 20px">{{$username}}</li>
                    </a>
                </ul>
                <ul id="head_drop_down" class="dropdown-content">
                    <li><a href="/personal_info" class="text-center">个人信息</a></li>
                    <li class="divider"></li>
                    <li><a href="/friends_info" class="text-center">我的好友</a></li>
                    <li class="divider"></li>
                    <li><a href="/password_edit" class="text-center">修改密码</a></li>
                    <li class="divider"></li>
                    <li><a href="/login" class="text-center">退出登录</a></li>
                </ul>
            </div>
            <div class="col s1"></div>
        </div>
    </div></nav></div>

    <p></p>

    <div class="container">
        <div class="row">
            <div class="col s2"></div>
            <div class="col s8" style="margin-top:100px; margin-bottom: 100px">
                <form id="password_edit">
                    <div class="center">
                        <div class="login-title">修改密码</div>
                    </div>
                    <div class="input-field">
                        <input name="current_pw" type="password" class="validate">
                        <label for="current_pw">当前密码</label>
                    </div>
                    <div class="input-field">
                        <input name="new_pw" type="password" class="validate">
                        <label for="new_pw">新密码</label>
                    </div>
                    <div class="row" style="margin-top: 40px">
                        <button class="col s6 offset-s3 btn waves-effect waves-light" type="button" onclick="verify()">
                            <div class="container">确认修改<i class="material-icons right">send</i></div>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col s2"></div>
        </div>
    </div>

    <footer class="page-footer" >
        <div class="footer-copyright">
            <div class="container">
                © 2016 Copyright Text
                <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
        </div>
    </footer>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="{{URL::asset('js/materialize.min.js')}}"></script>

    <script type="text/javascript">

        function verify(){
            $.ajax({
                type: "post",
                url: "/password_edit",
                data: $("#password_edit").serialize(),
                success: function(msg){
                    console.log(msg);
                    if(msg=="success"){
                        alert("已成功修改");
                        window.location.href = '/login';
                    }else if(msg=="error"){
                        alert("当前密码错误");
                    }
                    else if(msg=="null"){
                        alert("新密码不能为空");
                    }
                }
            });
        }

    </script>

</body>