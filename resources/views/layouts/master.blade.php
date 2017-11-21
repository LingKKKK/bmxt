<html>
    <head>
        <title>RoboCom国际公开赛－－青少年人工智能编成挑战赛</title>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/master.css')}}" media="screen">
        <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js')}}"></script>
    </head>
    <body>
        <div class="main">
            <div class="header">
                <div class="inner">
                    <img src="{{ asset('assets/img/logo1-beijing.png')}}" alt="">
                </div>
            </div>

            @yield('content')

            <div class="footer">
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
    </body>
</html>
