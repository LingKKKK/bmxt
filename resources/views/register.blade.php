<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <title>RoboCom国际公开赛－－青少年人工智能编成挑战赛</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/matchbj.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/kenrobot.css')}}">
    <link href="https://cdn.bootcss.com/datepicker/0.5.3/datepicker.css" rel="stylesheet">
</head>
<body>
    <div class="main">
        <div class="header">
            <div class="inner">
                <div class="banner-img"></div>
            </div>
        </div>
        <div class="instructions clearfix active">
            <h1 class="instructions-h">结束报名通知</h1>
            <span style="font-family: PingFangSC-Regular;font-size: 14px;color: #666666;letter-spacing: 1px;line-height: 24px;text-align: justify;margin-bottom: 10px;color: black;">各位参赛选手与老师：</br>
                <b style="text-align: left; text-indent:2em; font-weight: normal; display: block;margin-top: 20px;color: black;width: 930px;">2018年RoboCom国际公开赛——青少年人工智能编程挑战赛在线报名工作从11月30日开始收到国内广大青少年选手的高度关注。公开报名已于12月15日结束，不再接受公开线上报名。如有疑问可以联系各相关负责人。</b></br>
                特此通知！</br>
            </span>
            <div class="log" style="width: 380px;height: 200px; float: right;transform: translate(0px, -50px);position: relative;">
                <img style="width: 100%;" src="{{asset('assets/img/log.png')}}" alt="">
                <span style="position: absolute;right: 100px;top: 90px;position: absolute;text-align: right;color: black;font-family: PingFangSC-Regular;font-size: 14px;letter-spacing: 1px;line-height: 24px;display: block;margin-bottom: 10px;">RoboCom国际公开赛组委会<br>2017年12月15日</span>
            </div>
            <div class="clearfix"></div>
            <h2 class="" style="margin-bottom: 20px; margin-top: 15px;">附一：负责人联系方式</h2>
            <span class="instructions-span" style="padding-left: 20px;">1. 相关赛事项目技术咨询及比赛规则解释负责人：</span>
            <span class="instructions-span" style="padding-left: 46px;"> a)图形化编程软件创意设计挑战赛  联系人：周善斌 电话：18576690069  樊军伟 电话：18588238651  贺晓山 电话：15994743223</span>
            <span class="instructions-span" style="padding-left: 46px;"> b)智造大挑战赛 联系人：解俊杰　电话：18603015057</span>
            <span class="instructions-span" style="padding-left: 46px;"> c)中鸣超级轨迹赛 联系人：王小君　电话：13500034449</span>
            <span class="instructions-span" style="padding-left: 46px;"> d)单片机迷宫任务挑战赛 联系人：张健 电话：13811159341</span>
            <span class="instructions-span" style="padding-left: 46px;"> e)RoboCom星际迷航  联系人：钟毅  电话：18978985303</span>
            <span class="instructions-span" style="padding-left: 20px;">2. 组委会办公室</span>
            <span class="instructions-span" style="padding-left: 46px;">李佳：13552892879  洪婕：13466616992 闫旭晖：13810882832</span>
            <span class="instructions-span" style="padding-left: 46px;">座机：010-81055310</span>
            <h2 style="margin-bottom: 20px; margin-top: 15px;">附二</h2>
            <span class="instructions-span" style="padding-left: 20px; color: red;">交费流程如下：</span>
            <span class="instructions-span" style="padding-left: 20px;">在线报名完成后，请根据自己所报赛项联系相应的项目参赛联系人缴费（请保留在线报名的队伍编码和转账成功的截图以方便核实）。</span>
            <span class="instructions-span" style="padding-left: 20px;">1. 核实参赛队伍是否报名成功。并核实参赛人数。</span>
            <span class="instructions-span" style="padding-left: 20px;">2. 支付参赛注册费</span>
            <span class="instructions-span" style="padding-left: 20px;">付款对公账户：</span>
            <span class="instructions-span" style="padding-left: 46px;">开户名称：北京搜获科技有限公司</span>
            <span class="instructions-span" style="padding-left: 46px;">开户银行：中国工商银行北京分行东升路支行</span>
            <span class="instructions-span" style="padding-left: 46px;">开户行号（大额支付代码）：102100000626</span>
            <span class="instructions-span" style="padding-left: 46px;">银行账号：0200006209200036460</span>

            <div class="clear"></div>
        </div>
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
        <div class="verificationcode_box">
            <div class="showBox">
                <span class="tip">提示: 请您在右侧输入图中的数字或者字母~</span>
                <span id="tipes">验证成功之后,我们会将验证码发送至您的手机:  <i></i></span>
                <span class="tipes-false">您输入的验证码有误,请核对后重新输入!!!</span>
                <img id="captcha_img1" src="{{url('/captcha')}}">
                <input id="v_code" type="text" placeholder="请输入">
                <a id="sendCode" class="yes">确认</a>
                <a class="no"><i class="icon kenrobot ken-close"></i></a>
            </div>
        </div>
        <div class="codeError">
            <div class="showBox">
                <i class="icon kenrobot ken-close close"></i>
                <div class="clear"></div>
                <i class="icon kenrobot ken-close"></i>
                <p>您输入的手机验证码有误,请核对短信后再次输入~</p>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jsrender.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/helpers.js')}}"></script>
</body>
</html>
