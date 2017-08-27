<!DOCTYPE html>
<html>
<head>
    <!--Import materialize.css-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/materialize.css')}}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/mystyle.css')}}">
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/languagecss.css')}}">
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/friendsstyle.css')}}">
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/activitystyle.css')}}">

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

    <div class="row">
        <div class="col s10 offset-s1">

            <div style="height:20px"></div>

            <div class="row top-option">
                <div class="valign-wrapper col s2">
                    <i class="material-icons" style="color: green">add</i>
                    <a href="#add" class="modal-trigger">
                        <span>添加好友</span>
                    </a>
                </div>
                <div class="valign-wrapper col s5">
                    <i class="material-icons" style="color: darkred">notifications</i>
                    <a href="#request" class="modal-trigger">
                        <span>我的好友请求</span>
                    </a>

                    @if($count!=0)

                    <span class="block-new">{{$count}} new</span>

                    @endif

                </div>
                <div class="col s5"></div>
            </div>

            <div class="row">
                <div class="col s10 offset-s1">
                    <ul class="collection friends-list">

                        @foreach($friends as $friend)

                        <li class="collection-item avatar">
                            <img src="{{URL::asset($friend->friend_pic_url_b)}}" class="circle friend-head-pic">
                            <a href="/{{$friend->friend_name_b}}/personal_info" class="title friend-name">{{$friend->friend_name_b}}</a>
                            <p class="friend-detail">{{$friend->friend_city_b}} <br>
                                {{$friend->friend_career_b}} <br>
                                {{$friend->friend_description_b}}
                            </p>
                            <a href="" class="secondary-content friend-heart"
                                onclick="deleteFriend('{{$friend->friend_name_b}}')">
                                <i class="material-icons">delete</i>
                            </a>
                        </li>

                        @endforeach

                    </ul>
                </div>
                <div claas="col s1"></div>
            </div>

        </div>
    </div>

    <!--添加好友-->
    <div id="add" class="modal modal-fixed-footer">
        <form id="add_friend">
            <div class="modal-content">
                <h5 class="valign-wrapper" style="padding-left: 10%;margin-bottom: 40px">
                    添加好友
                </h5>
                <div style="height:20px"></div>
                <div class="input-field container">
                    <input value="shiroko" name="name" type="text" class="validate">
                    <label class="active font-15px" for="name">输入用户名</label>
                </div>
                <div style="height:20px"></div>
                <div class="container" style="margin-top: 0px">
                    <div class="font-15px" style="color: #9e9e9e">验证信息</div>
                    <p></p>
                    <textarea id="textarea1" class="materialize-textarea"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <a href="" class=" modal-action modal-close waves-effect waves-green btn-flat">取消</a>
                <a href="" class=" modal-action modal-close waves-effect waves-green btn-flat"
                    onclick="sendFriendRequest()">发送
                </a>
            </div>
        </form>
    </div>

    <!--好友请求-->
    <div id="request" class="modal modal-fixed-footer">
        <div class="modal-content">
            <ul class="collection friend-request">

                @foreach($requests as $request)

                <li class="collection-item avatar">
                    <img src="{{URL::asset($request->friend_pic_url_b)}}" class="circle">
                    <a href="/{{$request->friend_name_b}}/personal_info" class="title">{{$request->friend_name_b}}</a>
                    <p>{{$request->friend_city_b}} <br>
                        {{$request->friend_career_b}}
                    </p>
                    <a href="" class="secondary-content" style="margin-top: 12px;margin-right: 12px">
                        <i class="material-icons" style="font-size: 30px"
                           onclick="acceptRequest('{{$request->friend_name_b}}')">
                            done
                        </i>
                    </a>
                </li>

                @endforeach

            </ul>
        </div>
        <div class="modal-footer">
            <a href="" class="modal-action modal-close waves-effect waves-green btn-flat ">取消</a>
        </div>
    </div>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="{{URL::asset('js/materialize.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/highcharts.js')}}"></script>

    <script type="text/javascript">

        $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal-trigger').leanModal();
        });

        function acceptRequest($name){
            $.ajax({
                type: "post",
                url: "/accept_friend_request",
                data: {'name':$name},
                success: function(){
                    alert("已添加新好友");
                    window.location.href = "/friends_info";
                }
            });
        }

        function sendFriendRequest(){
            $.ajax({
                type: "post",
                url: "/send_friend_request",
                data: $('#add_friend').serialize(),
                success: function(result){
                    if(result=='exist'){
                        alert("你已有该好友");
                    }
                    else if(result=='success'){
                        alert("已发送请求");
                    }
                    else if(result=='null'){
                        alert("该用户不存在");
                    }
                }
            });
        }
        
        function deleteFriend($name) {
            $.ajax({
                type: "post",
                url: "/delete_friend",
                data: {'name':$name},
                success: function(){
                    alert("删除成功");
                    window.location.href = "/friends_info";
                }
            });
        }

    </script>

</body>

</html>