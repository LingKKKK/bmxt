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
