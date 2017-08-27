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
                        <li><a href="/login">登录</a></li>
                        <li class="active"><a href="#">注册</a></li>
                    </ul>
                </div>
                <div class="col s1"></div>
            </div>
        </div></nav></div>


<div class="container" style="margin-top: 30px;margin-bottom: 30px">
    <div class="card-panel row">
        <div class="slider col s6">
            <ul class="slides">
                <li>

                </li>
                <li>

                </li>
            </ul>
        </div>
        <form class="col s6" style="margin-top: 10px">
            <div class="container">
                <div class="row center">
                    <div class="login-title">S I G N U P</div>
                </div>
                <div class="row valign-wrapper">
                    <div class="col s1">
                        <i class="material-icons right">account_circle</i>
                    </div>
                    <div class="input-field col s11" style="margin-top: 0px">
                        <input value="" id="username" type="text" class="validate">
                        <label for="username">请输入用户名</label>
                    </div>
                </div>
                <div class="row valign-wrapper">
                    <div class="col s1">
                        <i class="material-icons right">security</i>
                    </div>
                    <div class="input-field col s11">
                        <input value="" id="password" type="password" class="validate">
                        <label for="password">请输入密码</label>
                    </div>
                </div>
                <div class="row valign-wrapper">
                    <div class="col s1">
                        <i class="material-icons right">security</i>
                    </div>
                    <div class="input-field col s11">
                        <input value="" id="password_confirm" type="password" class="validate">
                        <label for="password_confirm">请确认密码</label>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px">
                    <button class="col s6 offset-s3 btn waves-effect waves-light" href="/signup">
                        <div class="container">注册<i class="material-icons right">cloud_upload</i></div>
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

</body>