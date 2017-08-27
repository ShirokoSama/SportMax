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
                        <li class="active"><a href="/activity">活动</a></li>
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

    <div style="height: 20px"></div>

    <div class="row">
    <div class="col s10 offset-s1">
        <div class="row">

            <!--左侧选择栏-->
            <div class="col s3">
                <div id="head" class="card-panel-lighten white" style="padding-bottom: 5px">
                    <div class="sidebar-title">
                        活动管理
                    </div>
                    <hr style="width: 100%;color: #e0e0e0; border-style: solid">
                    <div class="container valign-wrapper sidebar-option">
                        <i class="material-icons" style="color: #00695c;font-size: 30px">add_circle</i>

                        @if($level>=2)

                        <a href="#modal1" class="modal-trigger" id="create_button">
                            创建活动
                        </a>

                        @else

                        <a href="" class="" id="create_button"
                           onclick="priorityHandle({{$level}})">
                            创建活动
                        </a>

                        @endif

                    </div>
                    <hr style="width: 100%;color: #e0e0e0; border-style: solid">
                    <div class="container valign-wrapper sidebar-option">
                        <i class="material-icons" style="color: orangered;font-size: 30px">announcement</i>
                        <a href="#modal2" class="modal-trigger">我的邀请</a>
                    </div>
                    <hr style="width: 100%;color: #e0e0e0; border-style: solid">
                    <div class="container valign-wrapper sidebar-option">
                        <i class="material-icons" style="color: #9e9d24;font-size: 30px">event_note</i>
                        <a href="#">我的活动</a>
                    </div>
                    <hr style="width: 100%;color: #e0e0e0; border-style: solid">
                    <div class="container valign-wrapper side-bar-option-next">
                        <i class="material-icons" style="color: #9e9e9e">terrain</i>
                        <a href="#">普通活动</a>
                    </div>
                    <div class="container valign-wrapper side-bar-option-next">
                        <i class="material-icons" style="color: #bf360c">flag</i>
                        <a href="#">双人PK</a>
                    </div>
                    <div class="container valign-wrapper side-bar-option-next">
                        <i class="material-icons" style="color: #1b5e20">group</i>
                        <a href="#">团队竞赛</a>
                    </div>
                    <div class="container valign-wrapper side-bar-option-next">
                        <i class="material-icons" style="color: #3e2723">timer</i>
                        <a href="#">时间竞速</a>
                    </div>
                </div>
            </div >

            <!--右侧活动内容-->
            <div class="col s9">
                <p></p>
                <!--标签选项卡-->
                <div class="row"><div class="col s7">
                        <ul class="tabs tab-color">
                            <li class="tab"><a href="#test1">
                                    <div class="valign-wrapper container">
                                        <i class="material-icons">record_voice_over</i>
                                        <span style="margin-left: 20px">我创建的活动</span>
                                    </div>
                                </a></li>
                            <li class="tab"><a href="#test2">
                                    <div class="valign-wrapper container">
                                        <i class="material-icons">supervisor_account</i>
                                        <span style="margin-left: 20px">我参与的活动</span>
                                    </div>
                                </a></li>
                        </ul>
                    </div></div>
                <!--标签内容-->

                <!--标签A-->
                <div id="test1">
                    <ul class="collapsible shadow-lighten" data-collapsible="expandable">

                        @foreach($self_list as $item)

                        <li>
                            <div class="collapsible-header active activity-title">
                                <i class="material-icons"
                                   @if($item->type=='normal')
                                   style="color: #9e9e9e"
                                   @elseif($item->type=='double')
                                   style="color: #bf360c"
                                   @elseif($item->type=='team')
                                   style="color: #1b5e20"
                                   @elseif($item->type=='time')
                                   style="color: #3e2723"
                                   @endif
                                >
                                    @if($item->type=='normal')
                                        terrain
                                        @elseif($item->type=='double')
                                            flag
                                        @elseif($item->type=='team')
                                            group
                                        @elseif($item->type=='time')
                                            timer
                                    @endif
                                </i>
                                <span>{{$item->name}}</span>
                                <div class="right valign-wrapper" style="width: 30%">
                                    <img src="{{$item->creator_pic_url}}" class="circle" style="width: 40px;height: 40px">
                                    <a href="/{{$item->creator_name}}/personal_info">{{$item->creator_name}}</a>
                                </div>
                            </div>
                            <div class="collapsible-body activity-content">
                                <p>开始时间： {{$item->start_date}}&nbsp;&nbsp;&nbsp;&nbsp;结束时间： {{$item->end_date}}</p>
                                <p>简介：</p>
                                <p>{{$item->description}}</p>
                                <div class="row activity-btn">

                                    @if($level==2)

                                    <div class="col s3 offset-s3">
                                        <a href="" class="waves-effect waves-green btn-flat"
                                            onclick="inviteRefuse()">
                                            邀请好友
                                        </a>
                                    </div>

                                    @elseif($level>=3)

                                    <div class="col s3 offset-s3">
                                        <a href="#invite_{{$item->id}}" class="modal-trigger waves-effect waves-green btn-flat">
                                            邀请好友
                                        </a>
                                    </div>

                                    @endif

                                    <div class="col s3">
                                        <a href="#{{$item->id}}" class="modal-trigger waves-effect waves-green btn-flat">
                                            成员列表
                                        </a>
                                    </div>
                                    <div class="col s3">
                                        <a href="" class="modal-trigger waves-effect waves-green btn-flat"
                                            onclick="endActivity({{$item->id}})">
                                            结束活动
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        @endforeach

                    </ul>
                </div>

                <!--标签B-->
                <div id="test2">
                    <ul class="collapsible shadow-lighten" data-collapsible="expandable">

                        @foreach($friends_list as $item)

                        <li>
                            <div class="collapsible-header active activity-title">
                                <i class="material-icons"
                                   @if($item->type=='normal')
                                   style="color: #9e9e9e"
                                   @elseif($item->type=='double')
                                   style="color: #bf360c"
                                   @elseif($item->type=='team')
                                   style="color: #1b5e20"
                                   @elseif($item->type=='time')
                                   style="color: #3e2723"
                                        @endif
                                >
                                    @if($item->type=='normal')
                                        terrain
                                    @elseif($item->type=='double')
                                        flag
                                    @elseif($item->type=='team')
                                        group
                                    @elseif($item->type=='time')
                                        timer
                                    @endif
                                </i>
                                <span>{{$item->name}}</span>
                                <div class="right valign-wrapper" style="width: 30%">
                                    <img src="{{URL::asset($item->creator_pic_url)}}" class="circle" style="width: 40px;height: 40px">
                                    <a href="/{{$item->creator_name}}/personal_info">{{$item->creator_name}}</a>
                                </div>
                            </div>
                            <div class="collapsible-body activity-content">
                                <p>开始时间： {{$item->start_date}}&nbsp;&nbsp;&nbsp;&nbsp;结束时间： {{$item->end_date}}</p>
                                <p>简介：</p>
                                <p>{{$item->description}}</p>
                                <div class="row activity-btn">
                                    <div class="col s3 offset-s6">
                                        <a href="#{{$item->id}}" class="modal-trigger waves-effect waves-green btn-flat">
                                            成员列表
                                        </a>
                                    </div>
                                    <div class="col s3">
                                        <a href="" class="waves-effect waves-green btn-flat"
                                            onclick="joinActivity({{$item->id}})">
                                            参加活动
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        @endforeach

                    </ul>
                </div>

            </div>

        </div>
    </div>
    </div>

    <!--创建活动表单-->
    <div id="modal1" class="modal modal-fixed-footer"><form method="post" id="create_form">
        <div class="modal-content">
            <h5 class="valign-wrapper" style="padding-left: 10%;margin-bottom: 40px">活动创建
                <img class="circle" src="{{URL::asset($pic_url)}}" style="width: 50px;height: 50px;margin-left: 20px">
            </h5>
            <p></p>
            <div class="input-field container">
                <input value="The name of activity" name="activity_name" type="text" class="validate">
                <label class="active font-15px" for="activity_name">活动名称</label>
            </div>
            <div class="container">
                <div class="font-15px" style="color: #9e9e9e">活动类型</div>
                <p></p>
                <span style="margin-right: 10px">
                    <input class="with-gap" name="normal" type="radio" id="type1">
                    <label for="type1" style="color: #000000">普通活动</label>
                </span>
                <span style="margin-right: 10px">
                    <input class="with-gap" name="double" type="radio" id="type2">
                    <label for="type2" style="color: #000000">双人PK</label>
                </span>
                <span style="margin-right: 10px">
                    <input class="with-gap" name="team" type="radio" id="type3">
                    <label for="type3" style="color: #000000">团队竞赛</label>
                </span>
                <span style="margin-right: 10px">
                    <input class="with-gap" name="time" type="radio" id="type4">
                    <label for="type4" style="color: #000000">时间竞速</label>
                </span>
            </div>
            <div class="container row" style="margin-top: 15px">
                <div class="col s6" style="padding-left: 0px">
                    <div class="font-15px" style="color: #9e9e9e">开始时间</div>
                    <input type="date" name="start_date" class="datepicker" style="margin-bottom: 0px">
                </div>
                <div class="col s6" style="padding-left: 0px">
                    <div class="font-15px" style="color: #9e9e9e">结束时间</div>
                    <input type="date" name="end_date" class="datepicker" style="margin-bottom: 0px">
                </div>
            </div>
            <div class="container" style="margin-top: 0px">
                <div class="font-15px" style="color: #9e9e9e">竞速模式目标</div>
                <p></p>
                <div class="row">
                    <div class="col s4">
                        <input type="checkbox" class="filled-in" name="walk-box">
                        <label for="walk-box" style="color: #000000"> 步行长度</label>
                        <div class="valign-wrapper">
                            <input name="walk_miles" value="" type="text" class="validate" style="margin-bottom: 0px">km
                        </div>
                    </div>
                    <div class="col s4">
                        <input type="checkbox" class="filled-in" name="run-box">
                        <label for="run-box" style="color: #000000"> 跑步长度</label>
                        <div class="valign-wrapper">
                            <input name="run_miles" value="" type="text" class="validate"  style="margin-bottom: 0px">km
                        </div>
                    </div>
                    <div class="col s4">
                        <input type="checkbox" class="filled-in" name="ride-box">
                        <label for="ride-box" style="color: #000000"> 骑行长度</label>
                        <div class="valign-wrapper">
                            <input name="bike_miles" value="" type="text" class="validate"  style="margin-bottom: 0px">km
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top: 0px">
                <div class="font-15px" style="color: #9e9e9e">活动简介</div>
                <p></p>
                <textarea name="description" class="materialize-textarea"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <a href="" class=" modal-action modal-close waves-effect waves-green btn-flat">取消</a>
            <a href="" class=" modal-action modal-close waves-effect waves-green btn-flat"
                onclick="create()" type="button">确定</a>
        </div>
    </form></div>

    <!--成员列表表单-->

    @foreach($member_list as $item)

    <div id="{{$item[0]->activity_id}}" class="modal modal-fixed-footer">
        <div class="modal-content">
            <ul class="collection">

                @foreach($item as $element)

                <li class="collection-item avatar">
                    <img src="{{URL::asset($element->member_pic_url)}}" class="circle"
                         style="height: 50px;width: 50px;margin-top: 8px">
                    <a href="/{{$element->member_name}}/personal_info" class="title" style="padding-left: 15px">{{$element->member_name}}</a>
                    <p style="padding-left: 15px;color: #9e9e9e">{{$element->member_city}} <br>
                        {{$element->member_career}}
                    </p>
                    <a href="" class="secondary-content" style="margin-top: 12px;margin-right: 12px"
                        onclick="sendFriendRequest('{{$element->member_name}}')">
                        <i class="material-icons" style="font-size: 30px">add</i>
                    </a>
                </li>

                @endforeach

            </ul>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">取消</a>
        </div>
    </div>

    @endforeach

    @foreach($self_list as $item)

        <div id="invite_{{$item->id}}" class="modal modal-fixed-footer">
            <div class="modal-content">
                <ul class="collection">

                    @foreach($friends as $friend)

                        <li class="collection-item avatar">
                            <img src="{{URL::asset($friend->friend_pic_url_b)}}" class="circle"
                                 style="height: 50px;width: 50px;margin-top: 8px">
                            <a href="/{{$friend->friend_name_b}}/personal_info" class="title" style="padding-left: 15px">{{$friend->friend_name_b}}</a>
                            <p style="padding-left: 15px;color: #9e9e9e">{{$friend->friend_city_b}} <br>
                                {{$friend->friend_career_b}}
                            </p>
                            <a href="" class="secondary-content" style="margin-top: 12px;margin-right: 12px"
                               onclick="sendInviteRequest('{{$friend->friend_name_b}}',{{$item->id}})">
                                <i class="material-icons" style="font-size: 30px">add</i>
                            </a>
                        </li>

                    @endforeach

                    <form id="invite_input" style="margin-top: 40px">
                        <div class="row">
                            <div class="input-field container col s8">
                                <input value="" name="name" type="text" class="validate" id="input1">
                                <label class="active font-15px" for="name">邀请对象用户名</label>
                            </div>
                        </div>
                    </form>

                </ul>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">取消</a>
                <a href="" class=" modal-action modal-close waves-effect waves-green btn-flat"
                   onclick="sendInviteRequest2({{$item->id}})" type="button">发送</a>
            </div>
        </div>

    @endforeach

    <div id="modal2" class="modal modal-fixed-footer">
        <div class="modal-content">
            <ul class="collection">

                @foreach($invites as $invite)

                <li class="collection-item avatar">
                    <img src="{{URL::asset($invite->creator_pic_url)}}" class="circle"
                         style="height: 50px;width: 50px;margin-top: 8px">
                    <a href="/{{$invite->creator_name}}/personal_info" class="title" style="padding-left: 15px">{{$invite->creator_name}}</a>
                    <p style="padding-left: 15px;color: #9e9e9e">{{$invite->name}} <br>
                        {{$invite->description}}
                    </p>
                    <a href="" class="secondary-content" style="margin-top: 12px;margin-right: 12px"
                       onclick="acceptInvite({{$invite->id}})">
                        <i class="material-icons" style="font-size: 30px">done</i>
                    </a>
                </li>

                @endforeach

            </ul>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">取消</a>
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
    <script type="text/javascript" src="{{URL::asset('js/highcharts.js')}}"></script>

<script>

    $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal({
            dismissible: false
        });
        $('.datepicker').pickadate({
            selectMonths: true,
            selectYears: 15
        });
    });

    function acceptInvite($id){
        $.ajax({
            type: "post",
            url: "/accept_invite",
            data: {'activity_id':$id},
            success: function(){
                alert("加入活动成功");
                window.location.href = '/activity';
            }
        });
    }

    function sendInviteRequest2($id){
        var ipt = document.getElementById('input1');
        var tname = ipt.value;
        sendInviteRequest(tname,$id);
    }

    function sendInviteRequest($name,$activity_id){
        $.ajax({
            type: "post",
            url: "/send_invite_request",
            data: {'name':$name, 'activity_id':$activity_id},
            success: function(msg){
                if(msg=='success')
                    alert("请求已发送");
                else if(msg=='send')
                    alert("你已发送请求");
                else if(msg=='exist')
                    alert("已在该活动中");
                else if(msg=='null')
                    alert("该用户不存在");
            }
        });
    }

    function inviteRefuse(){
        alert("你需要3级才能邀请他人参加活动");
    }

    function priorityHandle($level){
        if($level<2){
            alert("你需要2级才能创建活动");
        }
    }

    function sendFriendRequest($name){
        $.ajax({
            type: "post",
            url: "/send_friend_request",
            data: {'name':$name},
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

    function create(){
        $.ajax({
            type: "post",
            url: "/create_activity",
            data: $("#create_form").serialize(),
            success: function(){
                alert("已提交");
                window.location.href = "/activity";
            }
        });
    }

    function endActivity($id){
        $.ajax({
            type: "post",
            url: "/end_activity",
            data: {'id':$id},
            success: function(){
                alert("已结束");
                window.location.href = "/activity";
            }
        });
    }

    function joinActivity($id){
        $.ajax({
            type: "post",
            url: "/join_activity",
            data: {'id':$id},
            success: function(msg){
                if(msg.result=='success'){
                    alert("成功加入");
                    window.location.href = "/activity";
                }
                else{
                    alert("你已在该活动中");
                }
            }
        });
    }

</script>

</body>

</html>
