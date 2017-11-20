<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/information.css')}}" media="screen">
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js')}}"></script>
</head>
<body>
    <div class="main">
        <div class="top">
            <div class="inner">
                <img src="{{ asset('assets/img/logo1-beijing.png')}}" alt="">
            </div>
        </div>

        <div class="mid">
            @if(Auth::check())
                <div class="username_info">
                    <span class=""><i id="username">{{Auth::user()->name}}</i>, 您已成功登录</span>
                    <a href="/logout">退出登录</a>
                </div>
            @else
                <div class='dialogue-box'>
                    <a href="/login">登录</a>
                    <a href="/register">注册</a>
                </div>
            @endif

            <!-- $status = '注册成功,请登录';
            $link = '/login';
            return view('/successTips', compact('status', 'link')); -->

            @if(count($teamData) == 0)
            <span class="no_list">暂无报名数据,请新建报名</span>
            @else
            <div class="information_list clearfix">
                <span class="enroll_title">报名列表:</span>
                <div class="enroll_list clearfix">
                    <ul class="enroll_type">
                        <li>用户名</li>
                        <li>队伍编号</li>
                        <li>报名时间</li>
                    </ul>
                    @foreach($teamData as $team)
                    <ul class="enroll_item">
                        <li>{{Auth::user()->name}}</li>
                        <li>{{$team['team_no'] or ''}}</li>
                        <li>{{$team['created_at'] or ''}}</li>
                        <li><a href="{!!url('/finish/$team[team_no]')!!}">查看</a><a href="#">修改</a></li>
                    </ul>
                    @endforeach
                </div>
            </div>
            @endif
            <!-- 添加报名列表 -->
            <a class="btn-new-enroll">新建报名</a>
        </div>

        <div class="bot">
            <div class="inner">
                <div class="logo-all">
                    <img src="{{ asset('assets/img/LOGO2.png')}}" alt="">
                    <img src="{{ asset('assets/img/logo-white-word.png')}}" alt="">
                </div>
                <span class="sp1">© 2017 RoboCom 国际公开赛组委会  |  鄂ICP备16011249号-2 </span>
                <span class="sp2">技术支持: 北京啃萝卜信息技术有限公司</span>
            </div>
        </div>
    </div>
<script type="text/javascript">
$(function() {
    var timer;
    $('.username_info').unbind('mouseenter', 'mouseleave').bind({
        mouseenter: function() {
            clearInterval(timer);
            timer = setTimeout(function() {
                $('.username_info a').show();
            }, 700);
        },
        mouseleave: function() {
            clearInterval(timer);
            timer = setTimeout(function() {
                $('.username_info a').hide();
            }, 700);
        }
    });
})
</script>
</body>
</html>
