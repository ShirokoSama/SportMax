<!DOCTYPE html>
<html>
<head>
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/materialize.css')}}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/mystyle.css')}}">
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/activitystyle.css')}}">
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/languagecss.css')}}">
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/sprite.css')}}">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <META NAME="Title" CONTENT="SportMax">
    <META NAME="Author" CONTENT="Srf">
    <META NAME="Description" CONTENT="运动数据记录、统计、分析软件 其实是WEB大作业">
    <META NAME="Keywords" CONTENT="Sport,运动,社交,统计分析">

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
                    <li class="active"><a href="#">登录</a></li>
                    <li><a href="/signup">注册</a></li>
                </ul>
            </div>
            <div class="col s1"></div>
        </div>
    </div></nav></div>


    <div class="container" style="margin-top: 30px;margin-bottom: 30px">
        <div class="card-panel row">
            <div class="col s6">

                {{--<div class="slider">--}}
                    {{--<ul class="slides">--}}
                        {{--<li>--}}
                            {{--<img class="img run1"> <!-- random image -->--}}
                            {{--<div class="caption center-align">--}}
                                {{--<h3>This is our big Tagline!</h3>--}}
                                {{--<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<img class="img volleyball2"> <!-- random image -->--}}
                            {{--<div class="caption center-align">--}}
                                {{--<h3>This is our big Tagline!</h3>--}}
                                {{--<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}

                <img class="img run1">

            </div>
            <form id="login" class="col s6" style="margin-top: 40px" method="post">
                <div class="container">
                    <div class="row center">
                        <div class="login-title">L O G I N</div>
                    </div>
                    <div class="row valign-wrapper">
                        <div class="col s1">
                            <i class="material-icons right">account_circle</i>
                        </div>
                        <div class="input-field col s11">
                            <input id="name" name="username" type="text" class="validate">
                            <label for="username">用户名</label>
                        </div>
                    </div>
                    <div class="row valign-wrapper">
                        <div class="col s1">
                            <i class="material-icons right">security</i>
                        </div>
                        <div class="input-field col s11">
                            <input id="password" name="password" type="password" class="validate">
                            <label for="password">密码</label>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 40px">
                        <button class="col s6 offset-s3 btn waves-effect waves-light" type="button" onclick="verify()">
                            <div class="container">登录<i class="material-icons right">send</i></div>
                        </button>
                    </div>
                </div>
            </form>
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

        $(document).ready(function(){
            $('.slider').slider({full_width: true});
        });

        function verify(){

            var reg_n = /^\s*[\s\S]{4,12}\s*$/;
            var reg_p = /^\s*[\s\S]{6,12}\s*$/;
            var ipt_p = document.getElementById('password');
            var str_p = ipt_p.value;
            var ipt_n = document.getElementById('name');
            var str_n = ipt_n.value;
            if(!reg_n.test(str_n))
                alert("用户名必须为4到12位");
            else if(!reg_p.test(str_p))
                alert("密码长度必须为6到12位");
            else {
                $.ajax({
                    type: "post",
                    url: "/login",
                    data: $("#login").serialize(),
                    success: function (msg) {
                        console.log(msg);
                        if (msg.result == "success") {
                            window.location.href = msg.url;
                        } else if (msg.result == "error") {
                            alert("密码错误");
                        }
                        else if (msg.result == "null") {
                            alert("该用户不存在");
                        }
                    }
                });
            }
        }

    </script>

</body>