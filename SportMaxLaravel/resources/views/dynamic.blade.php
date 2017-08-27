<!DOCTYPE html>
<html>
<head>
    <!--Import materialize.css-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/materialize.css')}}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/mystyle.css')}}">
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/languagecss.css')}}">
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/friendsstyle.css')}}">
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/friendsstyle.css')}}">

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
                    <a href="" class="left logo-position">SportMax</a>
                </ul>
                <ul class="right hide-on-med-and-down navbar-style">
                    <li><a href="/sport_data">运动</a></li>
                    <li><a href="/activity">活动</a></li>
                    <li class="active"><a href="/dynamic">动态</a></li>
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
                <div class="valign-wrapper col s3">
                    <i class="material-icons" style="color: green">add</i>
                    <a href="#new" class="modal-trigger">
                        <span>新建动态</span>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col s10 offset-s1">

                    @foreach($dynamics as $dynamic)

                    <div class="card-panel-lighten white">
                        <div class="valign-wrapper dynamic-head">
                            <img src="{{$dynamic->creator_pic_url}}" class="circle">
                            <a href="/{{$dynamic->creator_name}}/personal_info">{{$dynamic->creator_name}}</a>
                            <span>{{$dynamic->date}}</span>
                        </div>
                        <hr style="width: 100%;color: #e0e0e0; border-style: solid">
                        <div class="dynamic-content">
                                <span>
                                    {!! $dynamic->content !!}
                                </span>
                        </div>
                        <hr style="width: 100%;color: #e0e0e0; border-style: solid">
                        <div class="valign-wrapper dynamic-footer">
                            <i class="material-icons">thumb_up</i>
                            <a href="#"
                               id="{{$dynamic->id}}"
                               onclick="addStar({{$dynamic->id,$dynamic->stars}})"
                            >
                                {{$dynamic->stars}}
                            </a>
                        </div>
                    </div>

                    @endforeach

                    @foreach($self_dynamics as $self_dynamic)

                    <div class="card-panel-lighten white">
                                <div class="valign-wrapper dynamic-head">
                                    <img src="{{$self_dynamic->creator_pic_url}}" class="circle">
                                    <a href="/{{$self_dynamic->creator_name}}/personal_info">{{$self_dynamic->creator_name}}</a>
                                    <span>{{$dynamic->date}}</span>
                                </div>
                                <hr style="width: 100%;color: #e0e0e0; border-style: solid">
                                <div class="dynamic-content">
                                <span>
                                    {!! $self_dynamic->content !!}
                                </span>
                                </div>
                                <hr style="width: 100%;color: #e0e0e0; border-style: solid">
                                <div class="valign-wrapper dynamic-footer">
                                    <i class="material-icons">thumb_up</i>
                                    <a href="#"
                                       id="{{$self_dynamic->id}}"
                                       onclick="addStar({{$self_dynamic->id,$self_dynamic->stars}})"
                                        >
                                        {{$self_dynamic->stars}}
                                    </a>
                                    <a href="" class="waves-effect waves-green btn-flat"
                                        onclick="deleteDynamic({{$self_dynamic->id}})">
                                        删除
                                    </a>
                                </div>
                            </div>

                    @endforeach

                </div>
                <div claas="col s1"></div>
            </div>

        </div>
    </div>

    <div id="new" class="modal modal-fixed-footer">
        <form id="create_dynamic">
            <div class="modal-content">
                <h5 class="valign-wrapper" style="padding-left: 10%;margin-bottom: 40px">
                    动态发布
                </h5>
                <div style="height:20px"></div>
                <div class="container" style="margin-top: 0px">
                    <div class="font-15px" style="color: #9e9e9e">动态内容</div>
                    <p></p>
                    <textarea name="content" class="materialize-textarea"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <a href="" class=" modal-action modal-close waves-effect waves-green btn-flat">取消</a>
                <a href="" class=" modal-action modal-close waves-effect waves-green btn-flat"
                    onclick="createDynamic()">
                    发布
                </a>
            </div>
        </form>
    </div>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="{{URL::asset('js/materialize.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/highcharts.js')}}"></script>

    <script>

        $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal-trigger').leanModal();
        });

        function createDynamic(){
            $.ajax({
                type: "post",
                url: "/create_dynamic",
                data: $("#create_dynamic").serialize(),
                success: function(){
                    alert("已发表新动态");
                    window.location.href = "/dynamic";
                }
            });
        }

        function deleteDynamic($id){
            $.ajax({
                type: "post",
                url: "/delete_dynamic",
                data: {'id':$id},
                success: function(){
                    alert("动态已删除");
                    window.location.href = "/dynamic";
                }
            });
        }

        function addStar($id,$stars){
            alert($stars+1);
            $("#{$id}").html($stars+1);
        }

    </script>

</body>

</html>