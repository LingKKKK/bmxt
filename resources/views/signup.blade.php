<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/signup.css')}}">   
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js')}}"></script>
</head>
<body>
    <div class="main">
        <div class="top">
            <div class="inner">
                <img src="{{ asset('assets/img/logo-top.png')}}" alt="">
                <div class="login">
                    <span class="register">注册</span>
                    <span class="signin">登录</span>
                </div>
                <div class="logout">
                    <span></span>
                </div>
            </div>
        </div>

        <div class="mid">
            <form action="/signup" enctype="multipart/form-data" method="POST">
       
            <div class="title_top">
                <ul>
                    <li class="active">①领队信息</li> 
                    <li>②队伍参赛信息</li> 
                    <li>③队员信息</li> 
                    <li>④缴费信息</li> 
                    <li>⑤信息确认</li> 
                </ul>
            </div>
            <div class="all_info clearfix">
                <div class="active leader_info div_tab">
                    <div>
                        <span class="user_name">用户名  :</span>
                        <input required tip-warn="" tip-info="仅支持仅支持英文、数字、下划线" class="user_name_input" id="user_name" name="user_name" type="text">
                        <div class="tips">
                            <!-- <span class="cue">仅支持仅支持英文、数字、下划线</span> -->
                            <span class="useable">√</span>
                            <span class="unuse">内容不能为空</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                 
                    <div>
                        <span class="user_name">真实姓名  :</span>
                        <input required tip-warn="" tip-info="仅支持仅支持英文、汉字"  class="user_name_input" id="leader_name" name="leader_name" type="text">
                        <div class="tips">
                            <!-- <span class="cue">仅支持仅支持汉字、英文</span> -->
                            <span class="useable">√</span>
                            <span class="unuse">内容不能为空</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div>
                        <span class="user_name">身份证号  :</span>
                        <input required tip-warn="" tip-info="仅支持仅支持数字以及个别英文" class="user_name_input" id="idCard" name="leader_id" type="text">
                        <div class="tips">
                            <!-- <span class="cue">仅支持数字</span> -->
                            <span class="useable">√</span>
                            <span class="unuse">格式不正确</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div>
                        <span class="user_name">性别  :</span>
                        <input class="man" type="radio" name="leader_sex" value="男"><span>男</span>
                        <input class="woman" type="radio" name="leader_sex" value="女"><span>女</span>
                        <div class="clearfix"></div>
                    </div>
                    <div>
                        <span class="user_name">领队照片  :</span>
                        <div class="div2">上传图片</div>
                        <input type="file" name="leader_pic" class="inputstyle">
                        <div class="clearfix"></div>
                    </div>
                    <div>
                        <span class="user_name">注册邮箱  :</span>
                        <input required tip-warn="" tip-info="请按照正确的邮箱格式填写" class="user_name_input" id="leader_email" name="leader_email" type="text">
                        <div class="tips">
                            <!-- <span class="cue">请按照正确的邮箱格式填写</span> -->
                            <span class="useable">√</span>
                            <span class="unuse">格式不正确</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div>
                        <span class="user_name">手机号码  :</span>
                        <input required tip-warn="" tip-info="请输入您收到的验证码" class="user_name_input"  id="leader_mobile" type="text">
                        <a class="tel">发送验证码</a>
                        <div class="tips">
                            <!-- <span class="cue">请输入您收到的验证码</span> -->
                            <span class="useable">√</span>
                            <span class="unuse">格式不正确</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div>
                        <span class="user_name">验证码  :</span>
                        <input required tip-warn="" tip-info="请输入您收到的验证码" class="code" type="text">
                        <div class="tips">
                            <!-- <span class="cue">请输入您收到的验证码</span> -->
                            <span class="useable">√</span>
                            <span class="unuse">请输入正确的验证码</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <button type="button" class="btn_next" id="leader_info_btn">下一步</button>
                    <div class="clearfix"></div>
                </div>
                <div class="ranks_info div_tab">
                    <div>
                        <span class="user_name">队伍名称  :</span>
                        <input required tip-warn="" tip-info="仅支持仅支持英文、数字、下划线" class="user_name_input" id="team_name" name="team_name" type="text">
                            <div class="tips">
                                <span class="useable">√</span>
                                <span class="unuse">不可用</span>
                            </div>
                        <div class="clearfix"></div>
                    </div>
                    <div>
                        <span class="user_name">学校/单位名称  :</span>
                        <input required tip-warn="" tip-info="仅支持汉字"  class="user_name_input" id="school_name" name="school_name" type="text">
                            <div class="tips">
                                <span class="useable">√</span>
                                <span class="unuse">内容不能为空</span>
                            </div>
                        <div class="clearfix"></div>
                    </div>
                    <div>
                        <span class="user_name">学校/单位地址  :</span>
                        <input required tip-warn="" tip-info="仅支持仅支持英文、数字、下划线" class="user_name_input" id="school_address" name="school_address" type="text">
                        <div class="tips">
                            <span class="useable">√</span>
                            <span class="unuse">不可用</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <span class="user_name">赛事项目  :</span>
                    ‍‍<select id="competition_type1">
                        <option grade="1" value="a">选项一</a>
                        <option grade="2" value="b">选项二</a>
                        <option grade="3" value="c">选项三</a>
                        <option grade="4" value="d">选项四</a>
                        <option grade="5" value="e">选项五</a>
                    </select>
                    <div class="clearfix"></div>
                    <span class="user_name">组别  :</span>
                    ‍‍<select id="competition_type2">
                        <option grade="1" value="a">小学生</a>
                        <option grade="2" value="b">初中生</a>
                        <option grade="3" value="c">高中生</a>
                        <option grade="4" value="d">大学生</a>
                    </select>
                    <div class="clearfix"></div>
                    <button type="button" class="btn_pre" id="ranks_info_pre">上一步</button>
                    <button type="button" class="btn_next" id="ranks_info_next">下一步</button>
                </div>

                <div class="append_rank div_tab">
                    <button type="button" class="btn_new" id="append_rank_new">继续添加新成员</button>
                    <button type="button" class="btn_pre" id="append_rank_pre">上一步</button>
                    <button type="button" class="btn_next" id="append_rank_next">下一步</button>
                </div>

                <div class="payment div_tab">
                    <span class="user_name">缴费方式:</span>
                    <input class="man" type="radio" name="sex" value="option1"><span>现场缴费</span>
                    <input class="woman" type="radio" name="sex" value="option2"><span>在线支付(暂不支持)</span>
                    <div class="clearfix"></div>
                    <button type="button" class="btn_pre" id="payment_pre">上一步</button>
                    <button type="button" class="btn_next" id="payment_next">下一步</button>
                </div>

                <div class="team_info div_tab">
                    <div class="leader" id="leader"></div>
                    <div class="leader" id="team"></div>
                    <div class="all_number">
                        <span class="leader_title">队员信息</span>
                        <div class="team_number" id="number">
                        </div>
                    </div>
                    <div class="pays" id="pays">
                        <span class="leader_title">缴费信息</span>
                        <div class="cut"></div>
                        <span class="name">支付方式 :</span>
                        <input class="name_input" type="text" value="现场支付">
                        <div class="clearfix"></div>
                    </div>
                    <button type="button" class="btn_pre" id="team_info_pre">上一步</button>
                    <button  class="btn_next" type="submit" id="team_info_next">完成</button>

                </div>
            </div>
            </form>

        </div>

        <div class="bot">
            <div class="inner">
                <img src="{{ asset('assets/img/logo-top.png')}}" alt="">
                <span class="sp1">© 2016 KenRobot  |  京 ICP备15039570号 </span>
                <span class="sp2">北京市海淀区天秀路10号中国农大国际创业园1号楼526</span>
            </div>
        </div>

        <div class="identifying">
            <div class="showBox">
                <img src="{{url('/captcha')}}">
                <input id="v_code" type="text" placeholder="请出入图中验证码">
                <a class="yes">确认</a>
                <a class="no">取消</a>
            </div>
        </div>
    </div>



<script type="text/javascript">

    function refresh_captcha($el) {
        var timestamp = Date.parse(new Date());
        $($el).attr('src', "{{url('/captcha')}}"+"?t="+timestamp);
    }

    function countdown() {
        var t = 60;
        var countdown = setInterval(function(){
            $('#getverifycode').html('获取验证码('+ t-- + ')');

            if (t <= 0) {
                $('#getverifycode').html('获取验证码');
                clearInterval(countdown);
            }
        },1000);
    }

    function tipWarn(msg){
        return '<span class="unuse">'+msg+'</span>';
    }

    function tipValid(){
        return '<span class="useable">√</span>';
    }

    function tipInfo(msg){
        return '<span class="cue">'+msg+'</span>';
    }


    // function isEmail(mail) {
    //     reg=/^([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/gi;
    //     if(!reg.test(mail) {
    //         console.log("非法的电子邮件");
    //         return false;
    //     }
    //     return true;
    // }


    function rebindVlidation() {
        
        // 所有信息都不能为空
        $("input[type=text]").unbind('blur').blur(function(){

            //必填验证
            if ($(this).prop('required') && $(this).val() == "") {
                $(this).next('.tips').html(tipWarn('不能为空'));
                return false;
            }

            //邮件验证
            // var useemail = $(this).attr('use-email');
            // if (useemail == 'email' && !isEmail($(this).val())) {
            //     $(this).next('.tips').html(tipWarn('邮件格式不正确'))
            // }

            // var mobile = $(this).attr('vvv-mobile');
            // if (mobile == 'vvv-mobile' && !isMobile()) {

            // }

            // if (this.) {}



            $(this).next('.tips').html(tipValid());
            return false;
        });

        $("input[type=text]").unbind('focus').focus(function(){
            console.log(1)
            $(this).next('.tips').css('display', 'block');
            
            $(this).next('.tips').html('');

            var tip_info = $(this).attr('tip-info');
            console.log(tip_info);
            var required = $(this).prop('required');

            var tip_info = tip_info ? tip_info : required ? '不能为空' : '';
            if (tip_info) {
                $(this).next('.tips').html(tipInfo(tip_info));
            }
        });
    }

    $(function(){
        // 上传照片
        $('.leader_info .div2').click(function() {
            $('.leader_info .inputstyle').click();
        });
        // 邮箱格式判断
        $('#leader_mail').blur(function(){
            if($('#leader_mail').val() == "") {
                console.log("电子邮件不能为空");
                return false;
            } else {
                reg=/^([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/gi;
                if(!reg.test($('#leader_mail').val())) {
                    console.log("非法的电子邮件");
                    return false;
                }
            }
        });
        // 发送手机验证码
        $('.leader_info .tel').click(function() {
            addMemberList();
            var partten = /^1[3,5,8]\d{9}$/;
            if(partten.test($('#leader_mobile').val())){
               $('.identifying').addClass('active');
            }else {
               console.log('格式错误');
            }
        });
        // 点击刷新验证码图片
        $('.identifying .showBox img').click(function (){
            console.log($('.identifying .showBox img').attr("src"));
            refresh_captcha(this);
        });
        // 点击取消输入验证码
        $('.identifying .no').click(function() {
            $('.identifying').removeClass('active');
        });
        // 点击确认输入验证码
        $('.identifying .yes').click(function() {
            $('.identifying').removeClass('active');
            var captchacode = $('#v_code').val();
            var mobile = $('#leader_mobile').val();
            var email = $('#leader_email').val();
            var type = 'mobile';
            console.log(captchacode,mobile,type);
            $.post(
                "http://enroll0.kenrobot.com/verificationcode/send",
                {
                    type    : type,
                    captcha : captchacode,
                    mobile  : mobile,
                },
                function(res){
                    if (res.status == 0) {
                        console.log(res);
                        console.log('消息发送成功');
                        refresh_captcha();
                        countdown();
                    } else {
                        console.log('消息发送失败');
                    }
                }
            );
        });




        $('#append_rank_new').click(function (){
            addMemberList();
            $('.append_rank .menber_list .delete').click(function(){
                $(this).parent('.menber_list').remove();
            })
            $('.append_rank .menber_list .div2').unbind('click').click(function() {
                console.log($(this))
                 $(this).next('.inputstyle').click();
            });
        })

        rebindVlidation();
        var memberListNum = 1;
        function addMemberList(){
            var memberList = '';
            memberList += '<div class="menber_list">';
            memberList += '<div class="delete"></div>';
            memberList += '<div>';
            memberList += '<span class="user_name">队员姓名('+ memberListNum +'):</span>';
            memberList += '<input  tip-warn="" tip-info="仅支持仅支持汉字、英文" name="members['+memberListNum+'][name]" class="user_name_input member_name" type="text">';
            memberList += '<div class="tips"><span class="useable">√</span><span class="unuse">内容不能为空</span></div>';
            memberList += '<div class="clearfix"></div>';
            memberList += '</div>';
            memberList += '<div>';
            memberList += '<span class="user_name">手机号码  :</span>';
            memberList += '<input required tip-warn="" tip-info="仅支持仅支持英文、数字、下划线" name="members['+memberListNum+'][mobile]" class="user_name_input member_mobile" type="text">';
            memberList += '<div class="tips"><span class="cue">仅支持汉字</span><span class="useable">√</span><span class="unuse">内容不能为空</span></div>';
            memberList += '<div class="clearfix"></div>';
            memberList += '</div>';
            memberList += '<div>';
            memberList += '<span class="user_name">年龄  :</span>';
            memberList += '<input required tip-warn="" tip-info="仅支持数字" name="members['+memberListNum+'][age]" class="user_name_input member_age" type="text">';
            memberList += '<div class="tips"><span class="useable">√</span><span class="unuse">内容不能为空</span></div>';
            memberList += '<div class="clearfix"></div>';
            memberList += '</div>';
            memberList += '<div>';
            memberList += '<span class="user_name">性别  :</span>';
            memberList += '<input name="members['+memberListNum+'][sex]" class="man" type="radio" name="sex" value="man"><span>男</span>';
            memberList += '<input name="members['+memberListNum+'][sex]" class="woman" type="radio" name="sex" value="women"><span>女</span>';
            memberList += '<div class="clearfix"></div>';
            memberList += '</div>';
            memberList += '<div>';
            memberList += '<span class="user_name">学校/单位名称  :</span>';
            memberList += '<input required tip-warn="" tip-info="仅支持汉字"  name="members['+memberListNum+'][school_name]" class="user_name_input member_school_name" type="text">';
            memberList += '<div class="tips"><span class="cue">仅支持汉字</span><span class="useable">√</span><span class="unuse">内容不能为空</span></div>';
            memberList += '<div class="clearfix"></div>';
            memberList += '</div>';
            memberList += '<div>';
            memberList += '<span class="user_name">学校/单位地址  :</span>';
            memberList += '<input required tip-warn="" tip-info="仅支持汉字 name="members['+memberListNum+'][school_address]" class="user_name_input member_school_address" type="text">';
            memberList += '<div class="tips"><span class="cue">仅支持汉字</span><span class="useable">√</span><span class="unuse">内容不能为空</span></div>';
            memberList += '<div class="clearfix"></div>';
            memberList += '</div>';
            memberList += '<div>';
            memberList += '<span class="user_name">队员照片  :</span>';
            memberList += '<div class="div2">上传图片</div>';
            memberList += '<input name="members['+memberListNum+'][pic]" type="file" class="inputstyle">';
            memberList += '<div class="clearfix"></div>';
            memberList += '<div class="cut"></div>';
            memberList += '</div>';
            $('.append_rank').append(memberList);
            rebindVlidation();
            memberListNum +=1;
        }

        var allData = {
            user_name: '',
            leader_name: '',
            idCard: '',
            leader_mobile: '',
            leader_email: '',
            school_name: '',
            competition_type: '',
            members: [],
        };
        var data = [];
        var memberList = {
            name: '',
            mobile: '',
            sex: '',
            age: '',
            member_school_name: '',
            member_school_address: '',
            photo: '',
        };
        $('#append_rank_next').click(function (){
            $($('.title_top ul li').get(3)).addClass('active').siblings().removeClass('active');
            $($('.all_info .div_tab').get(3)).addClass('active').siblings().removeClass('active');
            var member = $('.append_rank .menber_list').length;
            for( var i=0; i<member; i++ )
            {
                memberList.name = $($('.menber_list').get(i)).find('.member_name').val();
                memberList.mobile = $($('.menber_list').get(i)).find('.member_mobile').val();
                memberList.age = $($('.menber_list').get(i)).find('.member_age').val();
                memberList.sex = $($('.menber_list').get(i)).find('input[type="radio"]:checked').val();
                memberList.member_school_name = $($('.menber_list').get(i)).find('.member_school_name').val();
                memberList.member_school_address = $($('.menber_list').get(i)).find('.member_school_address').val();

                console.log(memberList);
                data.push(memberList);
                memberList = {
                    name: '',
                    mobile: '',
                    sex: '',
                    age: '',
                    member_school_name: '',
                    member_school_address: '',
                    photo: '',
                };
            }
        });

        // 队长信息
        // var captain_name = $('#captain_name').val();
        // var captain_mobile = $('#captain_mobile').val();
        // var captain_email = $('#captain_email').val();
        // 队员信息

        function alertInfo(){
            var user_name = $('#user_name').val();
            var leader_name = $('#leader_name').val();
            var idCard = $('#idCard').val();
            var leader_mobile = $('#leader_mobile').val();
            var leader_email = $('#leader_email').val();
            var leader_sex = $('.leader_info input[type="radio"]:checked').val();
            var team_name = $('#team_name').val();
            var school_name = $('#school_name').val();
            var school_address = $('#school_address').val();
            var competition_type1 = $('#competition_type1 option:selected').val();
            var competition_type2 = $('#competition_type2 option:selected').val();

            var members = data;

            var payment = $('.payment input[type="radio"]:checked').val();
            allData.user_name = user_name;
            allData.leader_sex = leader_sex;
            allData.leader_name = leader_name;
            allData.idCard = idCard;
            allData.leader_mobile = leader_mobile;
            allData.leader_email = leader_email;
            allData.team_name = team_name;
            allData.school_name = school_name;
            allData.school_address = school_address;
            allData.competition_type1 = competition_type1;
            allData.competition_type2 = competition_type2;
            allData.members = members;
            allData.payment = payment;
            console.log(allData);
        }


        $('#payment_next').click(function (){
            $($('.title_top ul li').get(4)).addClass('active').siblings().removeClass('active');
            $($('.all_info .div_tab').get(4)).addClass('active').siblings().removeClass('active');
            alertInfo();
            showInfo();
        });

        function showInfo(){
            var leadersList = '';
            leadersList += '<span class="leader_title">领队信息</span>';
            leadersList += '<div class="cut"></div>';
            leadersList += '<span class="name">用户名 :</span>';
            leadersList += '<input class="name_input" type="text" value='+ allData.user_name +'>';
            leadersList += '<div class="clearfix"></div>';
            leadersList += '<span class="name">真实姓名 :</span>';
            leadersList += '<input class="name_input" type="text" value='+ allData.leader_name +'>';
            leadersList += '<div class="clearfix"></div>';
            leadersList += '<span class="name">性别 :</span>';
            leadersList += '<input class="name_input" type="text" value='+ allData.leader_sex +'>';
            leadersList += '<div class="clearfix"></div>';
            leadersList += '<span class="name">注册邮箱 :</span>';
            leadersList += '<input class="name_input" type="text" value='+ allData.leader_email +'>';
            leadersList += '<div class="clearfix"></div>';
            leadersList += '<span class="name">手机号码 :</span>';
            leadersList += '<input class="name_input" type="text" value='+ allData.leader_mobile +'>';
            leadersList += '<div class="clearfix"></div>';
            $('.team_info #leader').html(leadersList);

            var teamList = '';
            teamList+= '<span class="leader_title">队伍信息</span>';
            teamList+= '<div class="cut"></div>';
            teamList+= '<span class="name">队伍名称 :</span>';
            teamList+= '<input class="name_input" type="text" value='+ allData.team_name +'>';
            teamList+= '<div class="clearfix"></div>';
            teamList+= '<span class="name">学校/单位名称 :</span>';
            teamList+= '<input class="name_input" type="text" value='+ allData.school_name +'>';
            teamList+= '<div class="clearfix"></div>';
            teamList+= '<span class="name">学校/单位地址 :</span>';
            teamList+= '<input class="name_input" type="text" value='+ allData.school_address +'>';
            teamList+= '<div class="clearfix"></div>';
            teamList+= '<span class="name">赛事项目 :</span>';
            teamList+= '<input class="name_input" type="text" value='+ allData.competition_type1 +'>';
            teamList+= '<div class="clearfix"></div>';
            teamList+= '<span class="name">组别 :</span>';
            teamList+= '<input class="name_input" type="text" value='+ allData.competition_type2 +'>';
            teamList+= '<div class="clearfix"></div>';
            $('.team_info #team').html(teamList);

            var num_member = $('.menber_list').length;
            console.log(num_member);

            var membersList = '';
            for( var i=0; i<num_member; i++ ){
                membersList += '<div class="cut"></div>';
                membersList += '<span class="name">队员姓名(一) :</span>';
                membersList += '<input class="name_input" type="text" value='+ allData.members[i].name +'>';
                membersList += '<div class="clearfix"></div>';
                membersList += '<span class="name">手机号码 :</span> ';
                membersList += '<input class="name_input" type="text" value='+ allData.members[i].mobile +'>';
                membersList += '<div class="clearfix"></div>';
                membersList += '<span class="name">性别 :</span>';
                membersList += '<input class="name_input" type="text" value='+ allData.members[i].sex +'>';
                membersList += '<div class="clearfix"></div>';
                membersList += '<span class="name">年龄 :</span>';
                membersList += '<input class="name_input" type="text" value='+ allData.members[i].age +'>';
                membersList += '<div class="clearfix"></div>';
                membersList += '<span class="name">学校/单位名称 :</span>';
                membersList += '<input class="name_input" type="text" value='+ allData.members[i].member_school_name +'>';
                membersList += '<div class="clearfix"></div>';
                membersList += '<span class="name">学校/单位地址 :</span>';
                membersList += '<input class="name_input" type="text" value='+ allData.members[i].member_school_address +'>';
                membersList += '<div class="clearfix"></div>';
            }
            $('#number').html(membersList);

        }



        // 点击下一步 切换到队伍信息
        $('#leader_info_btn').click(function (){
            $($('.title_top ul li').get(1)).addClass('active').siblings().removeClass('active');
            $($('.all_info .div_tab').get(1)).addClass('active').siblings().removeClass('active');
        });
        $('#ranks_info_pre').click(function (){
            $($('.title_top ul li').get(0)).addClass('active').siblings().removeClass('active');
            $($('.all_info .div_tab').get(0)).addClass('active').siblings().removeClass('active');
        });
        $('#ranks_info_next').click(function (){
            $($('.title_top ul li').get(2)).addClass('active').siblings().removeClass('active');
            $($('.all_info .div_tab').get(2)).addClass('active').siblings().removeClass('active');
        });
        $('#append_rank_pre').click(function (){
            $($('.title_top ul li').get(1)).addClass('active').siblings().removeClass('active');
            $($('.all_info .div_tab').get(1)).addClass('active').siblings().removeClass('active');
        });
        $('#payment_pre').click(function (){
            $($('.title_top ul li').get(2)).addClass('active').siblings().removeClass('active');
            $($('.all_info .div_tab').get(2)).addClass('active').siblings().removeClass('active');
        });
        $('#team_info_pre').click(function (){
            $($('.title_top ul li').get(3)).addClass('active').siblings().removeClass('active');
            $($('.all_info .div_tab').get(3)).addClass('active').siblings().removeClass('active');
        });

    })

        function showTab(index) {
            
            
            $($('.title_top ul li').get(index)).addClass('active').siblings().removeClass('active');
            $($('.all_info .div_tab').get(index)).addClass('active').siblings().removeClass('active');
        }

    // 0 start

</script>
</body>
</html>
