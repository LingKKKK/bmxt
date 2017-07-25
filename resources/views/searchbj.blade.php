<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/searchbj.css')}}">
</head>
<body>
    <div class="header">
        <div class="inner">
            <img src="{{ asset('assets/img/logo1.png')}}" alt="">
            <div class="logout">
                <span></span>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="leader-info-tips">
            @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                <span>{{$error}}</span>
                @endforeach
            @endif
        </div>
        <form id="form" action="/searchbj"  method="POST" novalidate>
            <div class="inner">
                <span class="tips">tips: 请输入队伍编号、领队手机号</span>
                <div class="input-field">
                    <span class="input-label">队伍编号  :</span>
                    <input data-type="" class="input-field-text"  id="team_no" type="text" name="team_no" value="{{old('team_no')}}">
                </div>
                <div class="input-field">
                    <span class="input-label">手机号  :</span>
                    <input data-type="mobile" class="input-field-text"  id="leader_mobile" type="text" name="leader_mobile" value="{{old('leader_mobile')}}">
                </div>
                <!-- <span class="tips-false">您输入的手机或验证码有误,请重新输入~</span> -->
                <div id="code" class="clearfix">
                    <span class="input-label">验证码  :</span>
                    <input name="verificationcode" id="verificationcode" class="code" type="text">
                </div>
                <a id="tel" class="tel">获取手机验证码</a>
                <button class="submit-search" id="submit-search" type="submit">查询</button>
            </div>
        </form>
    </div>

    <div class="identifying">
        <div class="showBox">
            <span class="tip">提示: 请您在右侧输入图中的数字或者字母~</span>
            <span id="tipes">验证成功之后,我们会将验证码发送至您的手机:  <i></i></span>
            <span class="tipes-false">您输入的手机号码或者验证码有误,请重新输入!!!</span>
            <img src="{{url('/captcha')}}">
            <input id="v_code" type="text" placeholder="请输入">
            <a id="sendCode" class="yes">确认</a>
            <a class="no">X</a>
        </div>
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
<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js')}}"></script>
<script type="text/javascript">
    (function($){
        $.fn.refreshCaptcha = function(){
            if($(this).prop('tagName') == 'IMG'){
                var timestamp = Date.parse(new Date());
                $(this).attr('src', "{{url('/captcha')}}"+"?t="+timestamp);
            }
        }
    })(jQuery);
    //修改
    function refresh_captcha($el) {
        var timestamp = Date.parse(new Date());
        $($el).attr('src', "{{url('/captcha')}}"+"?t="+timestamp);
    }

    function countdown() {
        var t = 60;
        var countdown = setInterval(function(){
            $('#tel').html('重新获取验证码('+ t-- + ')s');
            $('#tel').addClass('active');
            if (t <= 0) {
                $('#tel').html('获取验证码');
                $('#tel').removeClass('active');
                clearInterval(countdown);
            }
        },1000);
    }

    $(function(){
        // 默认添加一次队员列表
        setTimeout(function (){
            $('#append_rank_new').click();
        }, 1000)

        // 点击刷新验证码图片
        $('.identifying .showBox img').click(function (){
            $(this).refreshCaptcha();
        });

        // 点击取消输入验证码
        $('.identifying .no').click(function() {
            // clearInterval(countdown);
            $('.identifying').removeClass('active');
        });

        $('#v_code').click(function(event) {
            // console.log(1)
            $('.tipes-false').css('opacity', 0);
        });

        // 点击确认输入验证码
        $('.identifying .yes').click(function() {
            // console.log(1)
            var captchacode = $('#v_code').val();
            var mobile = $('#leader_mobile').val();
            var ID = $('#leader_id').val();
            var type = 'mobile';
            //console.log(captchacode,mobile,type);
            $.post(
                "{{url('/verificationcode/send')}}",
                {
                    type    : type,
                    captcha : captchacode,
                    mobile  : mobile,
                },
                function(res){
                    if (res.status == 0) {
                        // console.log('验证码填写成功并确定')
                        refresh_captcha();
                        $('.identifying').removeClass('active');
                        // $('.submit-search').removeClass('active');
                    } else {
                        // console.log('验证码填写错误')
                        $('.tipes-false').css('opacity', 1);
                    }
                }
            );
        });
    })

    // 发送手机验证码
    $('#tel').click(function() {
        var partten = /^1\d{10}$/;
        if(partten.test($('#leader_mobile').val())){
           $('.identifying').addClass('active');
           $('#tipes i').html($('#leader_mobile').val());
           countdown();
        }else {
           alert('您输入的手机格式错误');
        }
    });

    // 点击input 提示信息清空
    $('.input-field-text').focus(function(event) {
        $('.leader-info-tips').css('opacity', 0)
    });

    // 填写手机验证码之后才能点击提交按钮




</script>
</body>
</html>
