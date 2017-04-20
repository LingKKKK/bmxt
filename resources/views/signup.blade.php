<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/signup.css')}}">
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js')}}"></script>
</head>
<body>
    <div class="main">
        <div class="header">
            <div class="inner">
                <img src="{{ asset('assets/img/logo-white-word.png')}}" alt="">
                <div class="login">
                    <!-- <span class="register">注册</span>
                    <span class="signin">登录</span> -->
                </div>
                <div class="logout">
                    <span></span>
                </div>
            </div>
        </div>
        <div class="mid">
            <form id="form" action="/signup" enctype="multipart/form-data" method="POST" novalidate>

            <div class="tab_menu">
                <ul>
                    <li class="active">领队信息</li>
                    <li>队伍参赛信息</li>
                    <li>队员信息</li>
                    <li>缴费信息</li>
                    <li>信息确认</li>
                </ul>
            </div>
            <div class="all_info clearfix">
                <div class="active leader_info div_tab">
                    <div class="input-field">
                        <span class="input-label">姓名  :</span>
                        <input required tip-warn="" tip-info="仅支持仅支持英文、汉字"  class="input-field-text" id="leader_name" name="leader_name" type="text">
                        <div class="tips"></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="input-field">
                        <span class="input-label">手机号码  :</span>
                        <input data-type="mobile" required tip-info="请填写您的常用手机" class="input-field-text"  id="leader_mobile" type="text" name="leader_mobile">
                        <div class="tips">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="input-field">
                        <span class="input-label">邮箱  :</span>
                        <input required data-type="email" tip-warn="" tip-info="请按照正确的邮箱格式填写" class="input-field-text" id="leader_email" name="leader_email" type="text">
                        <div class="tips">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="input-field">
                        <span class="input-label">身份证号  :</span>
                        <input required data-type="ID" tip-info="仅支持仅支持数字以及个别英文" class="input-field-text" id="leader_id" name="leader_id" type="text">
                        <div class="tips"></div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="input-field">
                        <span class="input-label">性别  :</span>
                        <input class="input-radio man" type="radio" name="leader_sex" checked="checked" value="男"><span>男</span>
                        <input class="input-radio woman" type="radio" name="leader_sex" value="女"><span>女</span>

                        <div class="clearfix"></div>
                    </div>
                    <div class="input-field">
                        <span class="input-label">领队照片  :</span>
                        <div class="uploadBtn">上传图片</div>
                        <input type="file" required name="leader_pic" id="leader_pic" class="inputstyle">
                        <div class="tips"></div>
                        <div class="clearfix"></div>
                    </div>
                    <button type="button" class="btn_next" id="leader_info_btn">下一步</button>
                    <div class="clearfix"></div>
                </div>
                <div class="ranks_info div_tab">
                    <div class="input-field">
                        <span class="input-label">队伍名称  :</span>
                        <input required tip-warn="" tip-info="仅支持仅支持英文、数字、下划线" class="input-field-text" id="team_name" name="team_name" type="text">
                            <div class="tips">
                            </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="input-field">
                        <span class="input-label">学校/单位名称  :</span>
                        <input required tip-warn="" tip-info="仅支持汉字"  class="input-field-text" id="school_name" name="school_name" type="text">
                            <div class="tips">
                            </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="input-field">
                        <span class="input-label">学校/单位地址  :</span>
                        <input required tip-warn="" tip-info="仅支持仅支持英文、数字、下划线" class="input-field-text" id="school_address" name="school_address" type="text">
                        <div class="tips">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <span class="input-label">赛事项目  :</span>
                    ‍‍<select id="competition_type" name="competition_type">
                        <option grade="1" value="选项一">选项一</a>
                        <option grade="2" value="选项二">选项二</a>
                        <option grade="3" value="选项三">选项三</a>
                        <option grade="4" value="选项四">选项四</a>
                        <option grade="5" value="选项五">选项五</a>
                    </select>
                    <div class="clearfix"></div>
                    <span class="input-label">组别  :</span>
                    ‍‍<select id="competition_group" name="competition_group">
                        <option grade="1" value="小学组">小学组</a>
                        <option grade="2" value="初中组">初中组</a>
                        <option grade="3" value="高中组">高中组</a>
                        <option grade="4" value="大学组">大学组</a>
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
                    <span class="input-label">缴费方式:</span>
                    <input class="input-radio man" type="radio" name="payment" checked="checked" value="现场缴费"><span>现场缴费</span>
                    <input class="input-radio woman" type="radio" name="payment" disabled value="在线支付"><span style="color: #ccc" >在线支付(暂不支持)</span>

                    <div class="clearfix"></div>
                    <button type="button" class="btn_pre" id="payment_pre">上一步</button>
                    <button type="button" class="btn_next" id="payment_next">下一步</button>
                </div>
                <div class="team_info div_tab">
                    <div class="leader" id="leader">
                        <span class="leader_title">领队信息</span>
                        <div class="cut"></div>
                        <span class="name">真实姓名 :</span>
                        <span  id="preview_leader_name" class="name_input" ></span>
                        <div class="clearfix"></div>
                        <span class="name">身份证号 :</span>
                        <span  id="preview_leader_id" class="name_input"></span>
                        <div class="clearfix"></div>
                        <span class="name">邮箱 :</span>
                        <span  id="preview_leader_email" class="name_input"></span>
                        <div class="clearfix"></div>
                        <span  class="name">手机号 :</span>
                        <span id="preview_leader_mobile" class="name_input"></span>
                        <div class="clearfix"></div>
                        <span  class="name">性别 :</span>
                        <span id="preview_leader_sex" class="name_input"></span>
                        <div class="clearfix"></div>
                        <img id="preview_leader_pic" src="" >
                    </div>
                    <div class="leader" id="team">
                        <span class="leader_title">队伍信息</span>
                        <div class="cut"></div>
                        <span class="name">队伍名称 :</span>
                        <span id="preview_team_name" class="name_input"></span>
                        <div class="clearfix"></div>
                        <span class="name">学校/单位名称 :</span>
                        <span id="preview_school_name" class="name_input"></span>
                        <div class="clearfix"></div>
                        <span class="name">学校/单位地址 :</span>
                        <span id="preview_school_address" class="name_input"></span>
                        <div class="clearfix"></div>
                        <span class="name">赛事项目 :</span>
                        <span id="preview_competition_type" class="name_input"></span>
                        <div class="clearfix"></div>
                        <span class="name">组别 :</span>
                        <span id="preview_competition_group" class="name_input"></span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="all_number">
                        <span class="leader_title">队员信息</span>
                        <div class="team_number" id="number">
                            @for($i = 0; $i< 10; $i++)
                            <div id="member_info_{{$i}}" class="member_info" style="display: none;">
                                <div class="cut"></div>
                                <span class="name">队员姓名 :</span>
                                <span id="{{'preview_'.$i.'_member_name'}}" class="name_input"></span>
                                <div class="clearfix"></div>
                                <span class="name">身份证 :</span> 
                                <span id="{{'preview_'.$i.'_member_id'}}" class="name_input"></span>
                                <div class="clearfix"></div>
                                <span class="name">手机号 :</span> 
                                <span id="{{'preview_'.$i.'_member_mobile'}}" class="name_input"></span>
                                <div class="clearfix"></div>
                                <span class="name">性别 :</span>
                                <span id="{{'preview_'.$i.'_member_sex'}}" class="name_input"></span>
                                <div class="clearfix"></div>
                                <span class="name">年龄 :</span>
                                <span id="{{'preview_'.$i.'_member_age'}}" class="name_input"></span>
                                <div class="clearfix"></div>
                                <span class="name">学校/单位名称 :</span>
                                <span id="{{'preview_'.$i.'_member_school_name'}}" class="name_input"></span>
                                <div class="clearfix"></div>
                            </div>
                            @endfor

                        </div>
                    </div>
                    <div class="pays" id="pays">
                        <span class="leader_title">缴费信息</span>
                        <div class="cut"></div>
                        <span class="name">支付方式 :</span>
                        <span id="preview_payment" class="name_input" ></span>
                        <div class="clearfix"></div>
                    </div>
                    <div id="code">
                        <span class="input-label">验证码  :</span>
                        <input required name="verificationcode" id="verificationcode" tip-info="请输入您收到的验证码" class="code" type="text">
                        <div class="tips">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <a id="tel">获取手机验证码</a>
                    <div class="clearfix"></div>
                    <button type="button" class="btn_pre" id="team_info_pre">上一步</button>
                    <button  class="btn_next" type="submit" id="team_info_next">确认提交</button>

                </div>
            </div>
            </form>
        </div>
        <div class="footer">
            <div class="inner">
                <img src="{{ asset('assets/img/logo-white-word.png')}}" alt="">
                <span class="sp1">© 2017 KenRobot  |  京 ICP备15039570号 </span>
                <span class="sp2">北京市海淀区天秀路10号中国农大国际创业园1号楼526</span>
            </div>
        </div>
        <div class="identifying">
            <div class="showBox">
                <span class="tip">提示: 请您在右侧输入图中的数字或者字母~</span>
                <span id="tipes">验证成功之后,我们会将验证码发送至您的手机:  <i></i></span>
                <img src="{{url('/captcha')}}">
                <input id="v_code" type="text" placeholder="请输入">
                <a id="sendCode" class="yes">确认</a>
                <a class="no">取消</a>
            </div>
        </div>

        <div class="falseCodeAlert">
            <span class="tip">请输入正确的手机号和验证码~</span>
            <a class="no">X</a>
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

    function isEmail(mail) {
        reg=/^([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/gi;
        if(!reg.test(mail)) {
            //console.log("非法的电子邮件");
            return false;
        }
        return true;
    }

    //手机
    function isMobile(val) {
        reg = /^1(?:[38]\d|4[4579]|5[0-35-9]|7[35678])\d{8}$/
        // reg=/^((13[0-9])|(14[5|7])|(15([0-3]|[5-9]))|(18[0,5-9]))d{8}$/gi;
        if(!reg.test(val)) {
            //console.log("错误的手机格式");
            return false;
        }
        return true;
    }

    //身份证
    function isID(val) {
        reg1=/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$/gi;
        reg2=/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/gi;

        var idCardReg =/(^\d{15}$)|(^\d{17}([0-9]|X|x))$/gi;

        if(!idCardReg.test(val)) {
            //console.log("错误的身份证格式");
            return false;
        }
        return true;
    }

    function validField(el) {
        var $el = $(el);
        var name = $el.attr('name');
        var type = $el.attr('type');
        var val = $el.val();
        var datatype = $el.data('type');// 数据类型 email , mobile , ID,
        //console.log('name' + name);

        if (type == 'file') {
            if ($el.prop('required') && val == '') {
                $el.siblings('.tips').html(tipWarn('照片不能为空'));
                return false;
            }
            //TODO : 文件格式，文件大小限制
        } else if(type == 'text') {
            if ($el.prop('required') && val == '') {
                $el.siblings('.tips').html(tipWarn('不能为空！'));
                //console.log('不能')
                return false;
            }

            if (datatype == 'email' && !isEmail(val)) {
                $el.siblings('.tips').html(tipWarn('邮件格式不正确'));
                //console.log('Email');

                return false;
            }

            if (datatype == 'mobile' && !isMobile(val)) {
                $el.siblings('.tips').html(tipWarn('手机格式不正确'));
                return false;
            }

            if (datatype == 'ID' && ! isID(val)) {
                $el.siblings('.tips').html(tipWarn('身份证号格式不正确'));
                return false;
            }
        }

        $el.siblings('.tips').html(tipValid());
        return true;
    }

    //输入时提示
    function inputTips(el) {
        var $el = $(el);
        $el.siblings('.tips').html('');

        var tip_info = $el.attr('tip-info');
        var required = $el.prop('required');

        var tip_info = tip_info ? tip_info : required ? '不能为空' : '';
        if (tip_info) {
            $el.siblings('.tips').html(tipInfo(tip_info));
        }
    }


    function showTab(index) {
        //checkTab
        $($('.tab_menu ul li').get(index)).addClass('active').siblings().removeClass('active');
        var actTab = $('.all_info .div_tab').get(index);
        $(actTab).addClass('active').siblings().removeClass('active');
        updatePreview();
    }

    // 重新绑定事件, DOM发生变化时调用
    function rebindVlidation() {
        // 所有信息都不能为空
        $("input").unbind('blur').blur(function(){
            validField(this);
            var $el = $(this);
            var name = $el.attr('name');

            return false;
        });

        $("input").unbind('focus').focus(function(){
            inputTips(this);
            return false;
        });

        $('.append_rank .menber_list .delete').click(function(){
            $(this).parent('.menber_list').remove();
        })
    
        // 上传照片
        $('.leader_info .uploadBtn').unbind('click').click(function() {
            $('.leader_info .inputstyle').click();
        });

        //上传 队员照片
        $('.uploadBtn').unbind('click').click(function() {
            $(this).siblings('.inputstyle').click();
        });
    }

    // 更新预览界面
    function updatePreview() {
        $('input,select').each(function(){
            var type = $(this).prop('type');
            var id = $(this).prop('id');
            var name = $(this).prop('name');
            var val = $(this).val();
            //console.log(id+' : '+type);
            if (type == 'select-one') {
                val = $('#'+id+' option:selected').val();
                //console.log('selected' + val);
            }

            if (type == 'text' || type == 'select-one') {
                $('#preview_' + id).html(val);
            }

            if (type == 'radio') {
                //console.log('name');
                var chkVal = $('input:radio[name="'+name+'"]:checked').val();
                $('#preview_' + name).html(chkVal);
            }

   
            if (type == 'file') {
                var fileObj = document.getElementById(id);
                if (fileObj) {
                    var f = fileObj.files[0];
                    if(f){
                        $('#preview_'+id).attr('src', URL.createObjectURL(f));
                    }
                }
            }
        });

        $('.append_rank > .menber_list').each(function(index){
            console.log(index);

            var mapKey = new Array('member_name', 'member_id' ,'member_mobile', 'member_age', 'member_sex', 'member_school_name', 'member_school_address');
            for (var i = 0; i < mapKey.length; i++) {
                var key = mapKey[i];

                var $el = $($(this).find('.'+key)[0]);
                var type = $el.prop('type');
                var val = $el.val();

                if(type == 'radio')
                {
                    val = $($(this)).find('.'+key+":checked").val();
                }

                var preview_el = '#preview_'+index+'_'+key;

                console.log(preview_el);
                console.log(val);

                $(preview_el).html(val);
            }

            $('#member_info_'+index).show();


        })
    }


    $(function(){

        // 点击刷新验证码图片
        $('.identifying .showBox img').click(function (){
            //console.log($('.identifying .showBox img').attr("src"));
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
                        // //console.log(res);
                        // //console.log('消息发送成功');
                        refresh_captcha();
                        countdown();
                    } else {
                        $('.falseCodeAlert').css('display', 'block');
                    }
                }
            );
        });

        //更新表单验证绑定

        $('#append_rank_new').click(function (){
            addMemberList();
        })

        var memberListNum = 1;
        function addMemberList(){
            var memberList = '';
            memberList += '<div class="menber_list">';
            memberList += '<div class="delete"><i class="icon kenrobot ken-logo"></i></div>';
            memberList += '<div class="input-field">';
            memberList += '<span class="input-label">队员姓名('+ memberListNum +'):</span>';
            memberList += '<input required tip-info="仅支持仅支持汉字、英文" name="members['+memberListNum+'][name]" class="input-field-text member_name" type="text">';
            memberList += '<div class="tips"></div>';
            memberList += '<div class="clearfix"></div>';
            memberList += '</div>';

            memberList += '<div class="input-field">';
            memberList += '<span class="input-label">身份证号  :</span>';
            memberList += '<input required data-type="ID" tip-info="请输入合法的身份证号格式" name="members['+memberListNum+'][ID]" class="input-field-text member_id" type="text">';
            memberList += '<div class="tips"></div>';
            memberList += '<div class="clearfix"></div>';
            memberList += '</div>';


            memberList += '<div class="input-field">';
            memberList += '<span class="input-label">手机号码  :</span>';
            memberList += '<input required tip-info="仅支持仅支持英文、数字、下划线" name="members['+memberListNum+'][mobile]" class="input-field-text member_mobile" type="text">';
            memberList += '<div class="tips"></div>';
            memberList += '<div class="clearfix"></div>';
            memberList += '</div>';

            memberList += '<div class="input-field">';
            memberList += '<span class="input-label">年龄  :</span>';
            memberList += '<input required tip-warn="" tip-info="仅支持数字" name="members['+memberListNum+'][age]" class="input-field-text member_age" type="text">';
            memberList += '<div class="tips"></div>';
            memberList += '<div class="clearfix"></div>';
            memberList += '</div>';
            memberList += '<div class="input-field">';
            memberList += '<span class="input-label">性别  :</span>';
            memberList += '<input name="members['+memberListNum+'][sex]" class="input-radio man member_sex" type="radio" checked="checked" name="sex" value="男"><span>男</span>';
            memberList += '<input name="members['+memberListNum+'][sex]" class="input-radio woman member_sex" type="radio" name="sex" value="女"><span>女</span>';

            memberList += '<div class="clearfix"></div>';
            memberList += '</div>';
            memberList += '<div class="input-field">';
            memberList += '<span class="input-label">学校/单位名称  :</span>';
            memberList += '<input required tip-warn="" tip-info="仅支持汉字"  name="members['+memberListNum+'][school]" class="input-field-text member_school_name" type="text">';
            memberList += '<div class="tips"></div>';
            memberList += '<div class="clearfix"></div>';
            memberList += '</div>';
            memberList += '<div class="input-field">';
            memberList += '<span class="input-label">学校/单位地址  :</span>';
            memberList += '<input required tip-warn="" tip-info="仅支持汉字" name="members['+memberListNum+'][address]" class="input-field-text member_school_address" type="text">';
            memberList += '<div class="tips"></div>';
            memberList += '<div class="clearfix"></div>';
            memberList += '</div>';
            memberList += '<div class="input-field">';
            memberList += '<span class="input-label">队员照片  :</span>';
            memberList += '<div class="uploadBtn">上传图片</div>';
            memberList += '<input name="members['+memberListNum+'][pic]" type="file" class="inputstyle member_pic">';
            memberList += '<div class="clearfix"></div>';
            memberList += '<div class="cut"></div>';
            memberList += '</div>';
            $('.append_rank').append(memberList);
            rebindVlidation();
            memberListNum +=1;
        }

        var tabIndex = 0;

        $('.btn_next').click(function(){
            var prevent = false;
            var $inputs = $($('.all_info .div_tab').get(tabIndex)).find('input').each(function(){
               var ret = validField(this);
               if (!ret) {
                 prevent = true;
               }
            });
            if (!prevent) {
                tabIndex +=1;
                showTab(tabIndex);
            }


            // showTab(tabIndex);
        });

        $('.btn_pre').click(function(){
            tabIndex -=1;
            showTab(tabIndex);
        });

        $('form').submit(function(){
            return false;
            console.log('阻止提交');
        })

        rebindVlidation();

    })

    // 发送手机验证码
    $('#tel').click(function() {
        var partten = /^1[3,5,8]\d{9}$/;
        if(partten.test($('#leader_mobile').val())){
           $('.identifying').addClass('active');
           $('#tipes i').html($('#leader_mobile').val());
        }else {
           //console.log('格式错误');
        }
    });

    $('.falseCodeAlert').click(function(){
        $(this).css('display', 'none');
    })


</script>
</body>
</html>
