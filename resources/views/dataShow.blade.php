<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataShow.css')}}" media="screen">
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
            <div class="information_list clearfix">
                <span class="enroll_title">报名列表:</span>
                <div class="enroll_list clearfix">
                    <ul class="enroll_type">
                        <li>用户名</li>
                        <li>用户手机号</li>
                        <li>队伍名</li>
                        <li style="width: 200px;">队伍编号</li>
                        <li style="width: 260px;">参赛项目</li>
                        <li style="width: 100px;">操作</li>
                    </ul>
                    @foreach($teamList as $team)
                    {{Auth::user()->id}}
                    {{$team['enroll_user_id']}}
                    <ul class="enroll_item clearfix">
                        <li>Lingkkkkkk</li>
                        <li>{{$team['enroll_user_id']}}</li>
                        <li>{{$team['team_name']}}</li>
                        <li style="width: 200px;">{{$team['team_no'] or ''}}</li>
                        <li style="width: 260px;">{{$team['competition_1'] or ''}}</li>
                        <li style="width: 100px;">
                            <a href="{{url('/finish', $team['team_no'])}}">查看详情</a>
                        </li>
                    </ul>
                    @endforeach
                </div>
            </div>

            @if(Auth::check())
                <form id="form" action="/dataShow"  method="POST" novalidate">
                    <input type="text" name='email' value="{{Auth::user()->email}}" style="display: none;">
                    <button class="btn-new-enroll" type="submit">导出Excel表格</button>
                </form>
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
</body>
</html>
