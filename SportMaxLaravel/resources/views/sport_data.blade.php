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
                    <li class="active"><a href="/sport_data">运动</a></li>
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

    <div style="height: 20px"></div>

    <div class="row">
    <div class="col s10 offset-s1">
        <div class="row">
            <div class="col s12 m9">
                <div class="row">
                    <!--tabs-->
                    <div class="col s9">
                        <ul class="tabs tab-color">
                            <li onclick="click_tabA()" class="tab col s3"><a href="#test1">
                                    <div class="valign-wrapper container">
                                        <i class="material-icons">directions_walk</i>
                                        <span>步行</span>
                                    </div>
                                </a></li>
                            <li onclick="click_tabB()" class="tab col s3"><a href="#test2">
                                    <div class="valign-wrapper container">
                                        <i class="material-icons">directions_run</i>
                                        <span>跑步</span>
                                    </div>
                                </a></li>
                            <li onclick="click_tabC()" id="tabC" class="tab col s3"><a href="#test3">
                                    <div class="valign-wrapper container">
                                        <i class="material-icons" style="margin-right: 5px">directions_bike</i>
                                        <span>骑行</span>
                                    </div>
                                </a></li>
                            <li onclick="click_tabD()" id="tabD" class="tab col s3"><a class="active" href="#test4">
                                    <div class="valign-wrapper container">
                                        <i class="material-icons">equalizer</i>
                                        <span>统计与排行</span>
                                    </div>
                                </a></li>
                        </ul>
                    </div>
                    <!--tab-content-->
                    <!--tab-one-->
                    <div id="test1" class="col s12">
                        <div style="height: 30px"></div>
                        <span class="collection-title">
                                   今日数据
                           </span>
                        <div style="height: 10px"></div>
                        <div id="daywalk" class="scrollspy collection">
                            <a href="#!" class="collection-item">你今日步行距离为
                                <span class="badge"><span style="font-size: 18px">{{$today_walk_data->miles}} </span>km</span>
                            </a>
                            <a href="#!" class="collection-item">你今日步行时长为
                                <span class="badge"><span style="font-size: 18px">{{$today_walk_data->time}} </span>小时</span>
                            </a>
                            <a href="#!" class="collection-item">你今日步行消耗的热量为
                                <span class="badge"><span style="font-size: 18px">{{$today_walk_data->calorie}} </span>卡路里</span>
                            </a>
                            <a href="#!" class="collection-item">你已连续步行运动了
                                <span class="badge"><span style="font-size: 18px">11 </span>天</span>
                            </a>
                        </div>
                        <div style="height: 10px"></div>
                        <hr style="color: #e0e0e0">
                        <div style="height: 10px"></div>
                        <span class="collection-title">本周数据</span>
                        <div style="height: 10px"></div>
                        <div id="weekwalk" class="scrollspy collection">
                            <a href="#!" class="collection-item">你本周步行距离为
                                <span class="badge"><span style="font-size: 18px">68.9 </span>km</span>
                            </a>
                            <a href="#!" class="collection-item">你本周步行时长为
                                <span class="badge"><span style="font-size: 18px">13.7 </span>小时</span>
                            </a>
                            <a href="#!" class="collection-item">你本周步行消耗的热量为
                                <span class="badge"><span style="font-size: 18px">1600 </span>卡路里</span>
                            </a>
                            <a href="#!" class="collection-item">你本周步行获得的积分为
                                <span class="badge"><span style="font-size: 18px">200 </span>pt</span>
                            </a>
                            <a href="#!" class="collection-item">在好友中你的成绩是
                                <span class="badge">第<span style="font-size: 18px"> 5 </span>名</span>
                            </a>
                        </div>
                        <div style="height: 10px"></div>
                        <hr style="color: #e0e0e0">
                        <div style="height: 10px"></div>
                        <span class="collection-title">本月数据</span>
                        <div style="height: 10px"></div>
                        <div id="monthwalk" class="scrollspy collection">
                            <a href="#!" class="collection-item">你本月步行距离为
                                <span class="badge"><span style="font-size: 18px">303.2 </span>km</span>
                            </a>
                            <a href="#!" class="collection-item">你本月步行时长为
                                <span class="badge"><span style="font-size: 18px">51.6 </span>小时</span>
                            </a>
                            <a href="#!" class="collection-item">你本月步行消耗的热量为
                                <span class="badge"><span style="font-size: 18px">3154 </span>卡路里</span>
                            </a>
                            <a href="#!" class="collection-item">你本月步行获得的积分为
                                <span class="badge"><span style="font-size: 18px">960 </span>pt</span>
                            </a>
                            <a href="#!" class="collection-item">在好友中你的成绩是
                                <span class="badge">第<span style="font-size: 18px"> 8 </span>名</span>
                            </a>
                        </div>
                        <div style="height: 10px"></div>
                        <hr style="color: #e0e0e0">
                    </div>
                    <!--tab-two-->
                    <div id="test2" class="col s12">
                        <div style="height: 30px"></div>
                        <span class="collection-title">今日数据</span>
                        <div style="height: 10px"></div>
                        <div id="dayrun" class="scrollspy collection">
                            <a href="#!" class="collection-item">你今日跑步距离为
                                <span class="badge"><span style="font-size: 18px">{{$today_run_data->miles}} </span>km</span>
                            </a>
                            <a href="#!" class="collection-item">你今日跑步时长为
                                <span class="badge"><span style="font-size: 18px">{{$today_run_data->time}} </span>小时</span>
                            </a>
                            <a href="#!" class="collection-item">你今日跑步消耗的热量为
                                <span class="badge"><span style="font-size: 18px">{{$today_run_data->calorie}} </span>卡路里</span>
                            </a>
                            <a href="#!" class="collection-item">你已连续跑步运动了
                                <span class="badge"><span style="font-size: 18px">11 </span>天</span>
                            </a>
                            <a href="#!" class="collection-item">你今日跑步的速度为
                                <span class="badge"><span style="font-size: 18px">{{$today_run_data->speed}} </span>km/小时</span>
                            </a>
                        </div>
                        <div style="height: 10px"></div>
                        <hr style="color: #e0e0e0">
                        <div style="height: 10px"></div>
                        <span class="collection-title">本周数据</span>
                        <div style="height: 10px"></div>
                        <div id="weekrun" class="scrollspy collection">
                            <a href="#!" class="collection-item">你本周跑步距离为
                                <span class="badge"><span style="font-size: 18px">68.9 </span>km</span>
                            </a>
                            <a href="#!" class="collection-item">你本周跑步时长为
                                <span class="badge"><span style="font-size: 18px">13.7 </span>小时</span>
                            </a>
                            <a href="#!" class="collection-item">你本周跑步消耗的热量为
                                <span class="badge"><span style="font-size: 18px">1600 </span>卡路里</span>
                            </a>
                            <a href="#!" class="collection-item">你本周跑步获得的积分为
                                <span class="badge"><span style="font-size: 18px">200 </span>pt</span>
                            </a>
                            <a href="#!" class="collection-item">在好友中你的成绩是
                                <span class="badge">第<span style="font-size: 18px"> 5 </span>名</span>
                            </a>
                        </div>
                        <div style="height: 10px"></div>
                        <hr style="color: #e0e0e0">
                        <div style="height: 10px"></div>
                        <span class="collection-title">本月数据</span>
                        <div style="height: 10px"></div>
                        <div id="monthrun" class="scrollspy collection">
                            <a href="#!" class="collection-item">你本月跑步距离为
                                <span class="badge"><span style="font-size: 18px">303.2 </span>km</span>
                            </a>
                            <a href="#!" class="collection-item">你本月跑步时长为
                                <span class="badge"><span style="font-size: 18px">51.6 </span>小时</span>
                            </a>
                            <a href="#!" class="collection-item">你本月跑步消耗的热量为
                                <span class="badge"><span style="font-size: 18px">3154 </span>卡路里</span>
                            </a>
                            <a href="#!" class="collection-item">你本月跑步获得的积分为
                                <span class="badge"><span style="font-size: 18px">960 </span>pt</span>
                            </a>
                            <a href="#!" class="collection-item">在好友中你的成绩是
                                <span class="badge">第<span style="font-size: 18px"> 8 </span>名</span>
                            </a>
                        </div>
                        <div style="height: 10px"></div>
                        <hr style="color: #e0e0e0">
                    </div>
                    <!--tab-three-->
                    <div id="test3" class="col s12">
                        <div style="height: 30px"></div>
                        <span class="collection-title">今日数据</span>
                        <div style="height: 10px"></div>
                        <div id="daybike" class="scrollspy collection">
                            <a href="#!" class="collection-item">你今日骑行距离为
                                <span class="badge"><span style="font-size: 18px">{{$today_bike_data->miles}} </span>km</span>
                            </a>
                            <a href="#!" class="collection-item">你今日骑行时长为
                                <span class="badge"><span style="font-size: 18px">{{$today_bike_data->time}} </span>小时</span>
                            </a>
                            <a href="#!" class="collection-item">你今日骑行消耗的热量为
                                <span class="badge"><span style="font-size: 18px">{{$today_bike_data->calorie}} </span>卡路里</span>
                            </a>
                            <a href="#!" class="collection-item">你已连续骑行运动了
                                <span class="badge"><span style="font-size: 18px">11 </span>天</span>
                            </a>
                            <a href="#!" class="collection-item">你今日骑行的速度为
                                <span class="badge"><span style="font-size: 18px">{{$today_bike_data->speed}} </span>km/小时</span>
                            </a>
                        </div>
                        <div style="height: 10px"></div>
                        <hr style="color: #e0e0e0">
                        <div style="height: 10px"></div>
                        <span class="collection-title">本周数据</span>
                        <div style="height: 10px"></div>
                        <div id="weekbike" class="scrollspy collection">
                            <a href="#!" class="collection-item">你本周骑行距离为
                                <span class="badge"><span style="font-size: 18px">68.9 </span>km</span>
                            </a>
                            <a href="#!" class="collection-item">你本周骑行时长为
                                <span class="badge"><span style="font-size: 18px">13.7 </span>小时</span>
                            </a>
                            <a href="#!" class="collection-item">你本周骑行消耗的热量为
                                <span class="badge"><span style="font-size: 18px">1600 </span>卡路里</span>
                            </a>
                            <a href="#!" class="collection-item">你本周骑行获得的积分为
                                <span class="badge"><span style="font-size: 18px">200 </span>pt</span>
                            </a>
                            <a href="#!" class="collection-item">在好友中你的成绩是
                                <span class="badge">第<span style="font-size: 18px"> 5 </span>名</span>
                            </a>
                        </div>
                        <div style="height: 10px"></div>
                        <hr style="color: #e0e0e0">
                        <div style="height: 10px"></div>
                        <span class="collection-title">本月数据</span>
                        <div style="height: 10px"></div>
                        <div id="monthbike" class="scrollspy collection">
                            <a href="#!" class="collection-item">你本月骑行距离为
                                <span class="badge"><span style="font-size: 18px">303.2 </span>km</span>
                            </a>
                            <a href="#!" class="collection-item">你本月骑行时长为
                                <span class="badge"><span style="font-size: 18px">51.6 </span>小时</span>
                            </a>
                            <a href="#!" class="collection-item">你本月骑行消耗的热量为
                                <span class="badge"><span style="font-size: 18px">3154 </span>卡路里</span>
                            </a>
                            <a href="#!" class="collection-item">你本月骑行获得的积分为
                                <span class="badge"><span style="font-size: 18px">960 </span>pt</span>
                            </a>
                            <a href="#!" class="collection-item">在好友中你的成绩是
                                <span class="badge">第<span style="font-size: 18px"> 8 </span>名</span>
                            </a>
                        </div>
                        <div style="height: 10px"></div>
                        <hr style="color: #e0e0e0">
                    </div>
                    <!--tab-four-->
                    <div id="test4" class="col s12">
                        <div style="height: 20px"></div>
                        <div id="distance" class="card-panel-lighten white scrollspy">
                            <div class="card-title">一周内运动距离变化</div>
                            <hr style="color: #fafafa">
                            <div style="height: 30px"></div>
                            <div id="chartA"></div>
                        </div>
                        <div style="height: 20px"></div>
                        <div id="time" class="card-panel-lighten white scrollspy">
                            <div class="card-title">一周内运动时长变化</div>
                            <hr style="color: #fafafa">
                            <div style="height: 30px"></div>
                            <div id="chartB"></div>
                        </div>
                        <div style="height: 20px"></div>
                        <div id="months" class="card-panel-lighten white scrollspy">
                            <div class="card-title">月度运动情况变化</div>
                            <hr style="color: #fafafa">
                            <div style="height: 30px"></div>
                            <div id="chartC"></div>
                        </div>
                        <div style="height: 20px"></div>
                        <div id="list" class="card-panel-lighten white scrollspy">
                            <div class="card-title">排行榜</div>
                            <hr style="color: #fafafa">
                            <table class="table-style-A striped">
                                <thead>
                                <tr>
                                    <th>昵称</th>
                                    <th>积分</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="valign-wrapper">
                                        <img src="pic/himawari.jpg" class="pic-24 circle">
                                        <span style="margin-left: 10px">ShirokoA</span>
                                    </td>
                                    <td>2000pt</td>
                                </tr>
                                <tr>
                                    <td class="valign-wrapper">
                                        <img src="pic/himawari.jpg" class="pic-24 circle">
                                        <span style="margin-left: 10px">ShirokoB</span>
                                    </td>
                                    <td>1800pt</td>
                                </tr>
                                <tr>
                                    <td class="valign-wrapper">
                                        <img src="pic/himawari.jpg" class="pic-24 circle">
                                        <span style="margin-left: 10px">ShirokoC</span>
                                    </td>
                                    <td>1600pt</td>
                                </tr>
                                <tr>
                                    <td class="valign-wrapper">
                                        <img src="pic/himawari.jpg" class="pic-24 circle">
                                        <span style="margin-left: 10px">ShirokoD</span>
                                    </td>
                                    <td>1400pt</td>
                                </tr>
                                <tr>
                                    <td class="valign-wrapper">
                                        <img src="pic/himawari.jpg" class="pic-24 circle">
                                        <span style="margin-left: 10px">ShirokoE</span>
                                    </td>
                                    <td>1200pt</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col hide-on-small-only m3">
                <ul class="section table-of-contents side-list pinned">
                    <li id="sideA"><a href='#distance' class='active'>距离统计</a></li>
                    <li id="sideB"><a href='#time'>时长统计</a></li>
                    <li id="sideC"><a href='#months'>月度统计</a></li>
                    <li id="sideD"><a href='#list'>排行榜</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

    <footer class="page-footer">
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
        $('.scrollspy').scrollSpy();
    });

    function click_tabA(){
        $("#sideA").html("<a href='#daywalk' class='active'>今日数据</a>");
        $("#sideB").html("<a href='#weekwalk'>本周数据</a>");
        $("#sideC").html("<a href='#monthwalk'>本月数据</a>");
        $("#sideD").html("");
        $('.scrollspy').scrollSpy();
    }

    function click_tabB(){
        $("#sideA").html("<a href='#dayrun' class='active'>今日数据</a>");
        $("#sideB").html("<a href='#weekrun'>本周数据</a>");
        $("#sideC").html("<a href='#monthrun'>本月数据</a>");
        $("#sideD").html("");
        $('.scrollspy').scrollSpy();
    }

    function click_tabC(){
        $("#sideA").html("<a href='#daybike' class='active'>今日数据</a>");
        $("#sideB").html("<a href='#weekbike'>本周数据</a>");
        $("#sideC").html("<a href='#monthbike'>本月数据</a>");
        $("#sideD").html("");
        $('.scrollspy').scrollSpy();
    }

    function click_tabD(){
        $("#sideA").html("<a href='#distance' class='active'>距离统计</a>");
        $("#sideB").html("<a href='#time'>时长统计</a>");
        $("#sideC").html("<a href='#months'>月度统计</a>");
        $("#sideD").html("<a href='#list'>排行榜</a>");
        $('.scrollspy').scrollSpy();
    }

    $(function () {
        $('#chartA').highcharts({
            title: {
                text: '',
                x: -20 //center
            },
            xAxis: {
                categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
            },
            yAxis: {
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: '°C'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Walk',
                data: [{{$Mon->miles}}, {{$Tue->miles}}, {{$Wed->miles}}, {{$Thu->miles}},
                    {{$Fri->miles}}, {{$Sat->miles}}, {{$Sun->miles}}]
            }, {
                name: 'Run',
                color: "#ffa726",
                data: [{{$Mon_run->miles}}, {{$Tue_run->miles}}, {{$Wed_run->miles}}, {{$Thu_run->miles}},
                    {{$Fri_run->miles}}, {{$Sat_run->miles}}, {{$Sun_run->miles}}]
            }, {
                name: 'Bike',
                color: "#90ed7d",
                data: [{{$Mon_bike->miles}}, {{$Tue_bike->miles}}, {{$Wed_bike->miles}}, {{$Thu_bike->miles}},
                    {{$Fri_bike->miles}}, {{$Sat_bike->miles}}, {{$Sun_bike->miles}}]
            }
            ],
            credits: {
                enabled: false
            }
        });
    });

    $(function () {
        $('#chartB').highcharts({
            title: {
                text: '',
                x: -20 //center
            },
            xAxis: {
                categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
            },
            yAxis: {
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: '°C'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Walk',
                data: [{{$Mon->time}}, {{$Tue->time}}, {{$Wed->time}}, {{$Thu->time}},
                    {{$Fri->time}}, {{$Sat->time}}, {{$Sun->time}}]
            }, {
                name: 'Run',
                color: "#ffa726",
                data: [{{$Mon_run->time}}, {{$Tue_run->time}}, {{$Wed_run->time}}, {{$Thu_run->time}},
                    {{$Fri_run->time}}, {{$Sat_run->time}}, {{$Sun_run->time}}]
            }, {
                name: 'Bike',
                color: "#90ed7d",
                data: [{{$Mon_bike->time}}, {{$Tue_bike->time}}, {{$Wed_bike->time}}, {{$Thu_bike->time}},
                    {{$Fri_bike->time}}, {{$Sat_bike->time}}, {{$Sun_bike->time}}]
            }
            ],
            credits: {
                enabled: false
            }
        });
    });

    $(function () {
        $('#chartC').highcharts({
            title: {
                text: '',
                x: -20 //center
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: '°C'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Walk',
                color: "#e57373",
                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
            }, {
                name: 'Run',
                color: "#81c784",
                data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
            }, {
                name: 'Bike',
                color: "#ba68c8",
                data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
            }
            ],
            credits: {
                enabled: false
            }
        });
    });

</script>

</body>

</html>