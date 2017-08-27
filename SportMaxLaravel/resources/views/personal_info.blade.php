<!DOCTYPE html>
<html>
<head>
    <!--Import materialize.css-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/materialize.css')}}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/mystyle.css')}}">
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
                        <li><img src="{{URL::asset($info->pic_url)}}" class="circle head-pic-navbar"></li>
                        <li style="margin-right: 20px">{{$info->username}}</li>
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

    <div class="row">
        <div class="col s10 offset-s1">

            <!--left-part-->
            <div class="col s12 m4">
                <div class="card-panel-lighten white">
                    <div style="padding-left:10%;padding-right:10%;padding-top:10px">
                        <img class="responsive-img head-pic-large materialboxed"
                             src={{URL::asset($info->pic_url)}}>
                    </div>
                    <div class="personal-info-name center" style="margin-bottom: 10px">
                        <span>{{$info->nickname}}</span>
                        <span style="background-color: #26a69a;
                            padding-left: 5px;
                            padding-right: 5px;
                            border-radius: 2px;
                            color: white;
                            font-weight: 300;
                            font-size: 17px">
                            Lv{{$info->level}}
                        </span>
                    </div>
                    <div class="progress container" style="margin-bottom: 15px">
                        <div class="determinate" style="width: {{$info->level_exp}}%"></div>
                    </div>
                    <hr style="width: 100%;color: #e0e0e0; border-style: solid">
                    <div class="detail-info-list">
                        <i class="material-icons left">account_box</i>
                        <span class="left">用户名</span>
                        <div style="width:40%" class="right">
                            <div class="truncate">{{$info->username}}</div>
                        </div>
                    </div>
                    <div class="detail-info-list">
                        <i class="material-icons left">mail_outline</i>
                        <span class="left">邮箱</span>
                        <div style="width:40%" class="right">
                            <div class="truncate">{{$info->email}}</div>
                        </div>
                    </div>
                    <div class="detail-info-list">
                        <i class="material-icons left">wc</i>
                        <span class="left">性别</span>
                        <div style="width:40%" class="right">
                            <div class="truncate">{{$info->sex}}</div>
                        </div>
                    </div>
                    <div class="detail-info-list">
                        <i class="material-icons left">date_range</i>
                        <span class="left">生日</span>
                        <div style="width:40%" class="right">
                            <div class="truncate">{{$info->birthday}}</div>
                        </div>
                    </div>
                    <div class="detail-info-list">
                        <i class="material-icons left">add_location</i>
                        <span class="left">所在城市</span>
                        <div style="width:40%" class="right">
                            <div class="truncate">{{$info->city}}</div>
                        </div>
                    </div>
                    <div class="detail-info-list">
                        <i class="material-icons left">work</i>
                        <span class="left">职业</span>
                        <div style="width:40%" class="right">
                            <div class="truncate">{{$info->career}}</div>
                        </div>
                    </div>
                    <div class="detail-info-list">
                        <i class="material-icons left">directions_run</i>
                        <span class="left">运动喜好</span>
                        <div style="width:40%" class="right">
                            <div class="truncate">{{$info->hobby}}</div>
                        </div>
                    </div>
                    <hr style="width: 100%;color: #e0e0e0; border-style: solid">
                    <div style="padding-top: 12px" class="center">
                        <a class="waves-effect waves-light btn modal-trigger" href="#edit">
                            <i class="material-icons left">mode_edit</i>编辑信息
                        </a>
                    </div>
                </div>
            </div>

            <!--right-part-->
            <div class="col s12 m8">

                <!--intro-->
                <div class="card-panel-lighten white" style="height: 180px">
                    <span class="detail-info-intro-title">个人简介</span>
                    <hr style="width: 100%;color: #e0e0e0; border-style: solid">
                    <div class="detail-info-intro-text">
                        {!! $info->description !!}
                    </div>
                </div>

                <!--data-->
                <div class="card-panel-lighten white" style="margin-top: 20px;padding-bottom: 20px">
                    <span class="detail-info-intro-title">数据与成就</span>
                    <hr style="width: 100%;color: #e0e0e0; border-style: solid">
                    <div class="row">
                        <div class="col s6">
                            <div id="chartC"></div>
                        </div>
                        <div class="col s6" style="padding: 0px">
                            <div style="height: 30px"></div>
                            <hr style="width: 100%;color: #e0e0e0; border-style: solid">
                            <div style="height: 10px"></div>
                            <div class="personal-stat-list">
                                <i class="material-icons">directions_walk</i>
                                <span class="font-a">
                                        步行总里程
                                    </span>
                                <div style="width:30%" class="right">
                                    <div class="center">
                                        <span style="font-size: 19px">{{$info->walk_miles}} </span>km
                                    </div>
                                </div>
                            </div>
                            <div class="personal-stat-list">
                                <i class="material-icons">directions_run</i>
                                <span class="font-a">
                                        跑步总里程
                                    </span>
                                <div style="width:30%" class="right">
                                    <div class="center">
                                        <span style="font-size: 19px">{{$info->run_miles}} </span>km
                                    </div>
                                </div>
                            </div>
                            <div class="personal-stat-list">
                                <i class="material-icons">directions_bike</i>
                                <span class="font-a">
                                        骑行总里程
                                    </span>
                                <div style="width:30%" class="right">
                                    <div class="center">
                                        <span style="font-size: 19px">{{$info->bike_miles}} </span>km
                                    </div>
                                </div>
                            </div>
                            <div class="personal-stat-list">
                                <i class="material-icons">date_range</i>
                                <span class="font-a">
                                        已连续签到
                                    </span>
                                <div style="width:30%" class="right">
                                    <div class="center">
                                        <span style="font-size: 19px">{{$info->register_days}} </span>天
                                    </div>
                                </div>
                            </div>
                            <div class="personal-stat-list">
                                <i class="material-icons">face</i>
                                <span class="font-a">
                                        身体健康指数
                                    </span>
                                <div style="width:30%" class="right">
                                    <div class="center">
                                        <span style="font-size: 19px">{{$info->health_points}} </span>分
                                    </div>
                                </div>
                            </div>
                            <hr style="width: 100%;color: #e0e0e0; border-style: solid">
                            <div style="padding-top: 25px" class="center">
                                <a class="waves-effect waves-light btn"
                                    onclick="shareInfo()">
                                    <i class="material-icons left">reply</i>分享
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="edit" class="modal modal-fixed-footer">
        <form method="post" id="edit_form">
            <div class="modal-content">
                <h5 class="valign-wrapper" style="padding-left: 10%;margin-bottom: 40px">编辑个人信息
                    <img class="circle" src="{{URL::asset($info->pic_url)}}" style="width: 50px;height: 50px;margin-left: 20px">
                </h5>
                <p></p>
                <div class="input-field container">
                    <input value="{{$info->nickname}}" name="nickname" type="text" class="validate">
                    <label class="active font-15px" for="nickname">昵称</label>
                </div>
                <div class="input-field container">
                    <input value="{{$info->email}}" name="email" type="text" class="validate">
                    <label class="active font-15px" for="email">邮箱</label>
                </div>
                <div class="input-field container">
                    <input value="{{$info->sex}}" name="sex" type="text" class="validate">
                    <label class="active font-15px" for="sex">性别</label>
                </div>
                <div class="input-field container">
                    <input value="{{$info->birthday}}" name="birthday" type="text" class="validate">
                    <label class="active font-15px" for="birthday">生日</label>
                </div>
                <div class="input-field container">
                    <input value="{{$info->city}}" name="city" type="text" class="validate">
                    <label class="active font-15px" for="city">南京</label>
                </div>
                <div class="input-field container">
                    <input value="{{$info->career}}" name="career" type="text" class="validate">
                    <label class="active font-15px" for="career">职业</label>
                </div>
                <div class="input-field container">
                    <input value="{{$info->hobby}}" name="hobby" type="text" class="validate">
                    <label class="active font-15px" for="hobby">爱好</label>
                </div>
                <div class="container" style="margin-top: 0px">
                    <div class="font-15px" style="color: #9e9e9e">个人简介</div>
                    <p></p>
                    <textarea name="description" class="materialize-textarea">{{$info->description}}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <a href="" class=" modal-action modal-close waves-effect waves-green btn-flat">取消</a>
                <a href="" class=" modal-action modal-close waves-effect waves-green btn-flat"
                   onclick="editPersonalInfo()" type="button">确定</a>
            </div>
        </form>
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
    <script type="text/javascript" src="{{URL::asset('js/highcharts.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/personal_highcharts.js')}}"></script>

    <script>

        $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal-trigger').leanModal();
        });

        function editPersonalInfo(){
            $.ajax({
                type: "post",
                url: "/edit_personal_info",
                data: $("#edit_form").serialize(),
                success: function(){
                    alert("已成功编辑");
                    window.location.href = "/personal_info";
                }
            });
        }

        function shareInfo(){
            $.ajax({
                type: "post",
                url: "create_dynamic",
                data: {
                    'content':"步行总里程：508.1km<br>跑步总里程：105.3km<br>骑行总里程：171.2km<br>" +
                    "已连续签到：12天<br>健康指数：85"
                },
                success: function(){
                    alert("已分享到动态");
                }
            });
        }

        $walk_miles = {{$info->walk_miles}};
        $run_miles = {{$info->run_miles}};
        $bike_miles = {{$info->bike_miles}};
        personal_highcharts_init($walk_miles,$run_miles,$bike_miles);

    </script>

</body>

</html>