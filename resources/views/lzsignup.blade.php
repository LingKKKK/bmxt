<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lzsignup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/kenrobot.css')}}">
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <script>
        // $.validator.setDefaults({
        //     submitHandler: function() {
        //       alert("提交事件!");
        //     }
        // });
        // $().ready(function() {
        //     $("#commentForm").validate();
        // });
    </script>
</head>
<body>
    <div class="wrap clearfix">
        <div class="header clearfix">
            <div class="stripe"></div>
            <div class="inner">
                <div class="clearfix">
                    <button class="back-index">返回首页</button>
                    <img class="img" src="" alt="">
                </div>
                <div class="enroll-title clearfix">
                    <span class="title">报名专区</span>
                    <p class="logo">SIGN  UP</p>
                </div>
                <div class="cut"></div>
                <div class="enroll-content clearfix">
                    <p>达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦达瓦</p>
                </div>
            </div>
            </div>
        <div class="content clearfix">
            <span class="content-title">报名系统信息表单</span>
            <div class="cut"></div>
            <form id="form" enctype="multipart/form-data" method="post" action="/submitForm" novalidate>
                <div class="form">
                    <div>
                        <div class="input-field">
                            <span class="input-label">院系  :</span>
                            <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="school_name" name="school_name" type="text" value="">
                            <div class="tips"></div>
                        </div>
                        <div class="input-field">
                            <span class="input-label">院系  :</span>
                            <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="department" name="department" type="text" value="">
                            <div class="tips"></div>
                        </div>
                        <div class="cut"></div>
                    </div>
                    <div>
                        <div class="input-field">
                            <span class="input-label">姓名  :</span>
                            <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="leader_name" name="leader_name" type="text" value="">
                            <div class="tips"></div>
                        </div>
                        <div class="input-field">
                            <span class="input-label">手机号码  :</span>
                            <input data-type="mobile" required tip-info="请填写您的常用手机" class="input-field-text"  id="leader_mobile" type="text" name="leader_mobile" value="{{old('leader_mobile')}}">
                            <div class="tips"></div>
                        </div>
                        <div class="input-field">
                            <span class="input-label">邮箱  :</span>
                            <input class="input-field-text" id="email" type="email" name="email" required>                            
                            <div class="tips"></div>
                        </div>
                        <div class="input-field">
                            <span class="input-label">职务  :</span>
                            <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="leader_job" name="leader_job" type="text" value="">
                            <div class="tips"></div>
                        </div>
                        <div class="cut"></div>
                    </div>
                    <!-- <div>
                        <ul class="team-nav">
                            <li class="active">队伍1</li>
                            <li>队伍2</li>
                            <li>队伍3</li>
                        </ul>
                        <div class="team clearfix">
                            <div class="input-field">
                                <span class="input-label">队伍名称  :</span>
                                <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="school_name" name="school_name" type="text" value="{{old('school_name')}}">
                                <div class="tips"></div>
                            </div>
                            <div class="input-field">
                                <span class="input-label">参赛项目  :</span>
                                <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="department" name="department" type="text" value="{{old('department')}}" style="width: 800px;">
                                <div class="tips"></div>
                            </div>
                            <div class="members">
                                <span class="member-title">参赛队员</span>
                                <div class="input-field">
                                    <span class="input-label">队长姓名  :</span>
                                    <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="department" name="department" type="text" value="{{old('department')}}"">
                                    <div class="tips"></div>
                                </div>
                                <div class="input-field">
                                    <span class="input-label">队长电话  :</span>
                                    <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="department" name="department" type="text" value="{{old('department')}}"">
                                    <div class="tips"></div>
                                </div>
                                <div class="input-field">
                                    <span class="input-label">队员姓名1  :</span>
                                    <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="department" name="department" type="text" value="{{old('department')}}"">
                                    <div class="tips"></div>
                                </div>
                                <div class="input-field">
                                    <span class="input-label">队员姓名2  :</span>
                                    <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="department" name="department" type="text" value="{{old('department')}}"">
                                    <div class="tips"></div>
                                </div>
                                <div class="input-field">
                                    <span class="input-label">队员姓名3  :</span>
                                    <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="department" name="department" type="text" value="{{old('department')}}"">
                                    <div class="tips"></div>
                                </div>
                            </div>

                            <div class="members">
                                <span class="member-title">指导教师</span>
                                <div class="input-field">
                                    <span class="input-label">教师姓名  :</span>
                                    <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="department" name="department" type="text" value="{{old('department')}}"">
                                    <div class="tips"></div>
                                </div>
                                <div class="input-field">
                                    <span class="input-label">教师电话  :</span>
                                    <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="department" name="department" type="text" value="{{old('department')}}"">
                                    <div class="tips"></div>
                                </div>
                                <div class="input-field">
                                    <span class="input-label">教师邮箱  :</span>
                                    <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="department" name="department" type="text" value="{{old('department')}}"">
                                    <div class="tips"></div>
                                </div>
                                <div class="input-field">
                                    <span class="input-label">校内职务  :</span>
                                    <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="department" name="department" type="text" value="{{old('department')}}"">
                                    <div class="tips"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cut" style="margin-top: 34px;"></div>
                    <div>
                        <div class="symposium">
                            <span>是否参加研讨会</span>
                            <span>参与研讨会费用需要额外支付(600元/人)</span>
                            <div class="symposium-member clearfix">
                                <div class="meet"></div>
                                <div class="meet">
                                    <div class="meet-title">参会人2</div>
                                    <div class="input-field">
                                        <span class="input-label">姓名  :</span>
                                        <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="school_name" name="school_name" type="text" value="{{old('school_name')}}">
                                        <div class="tips"></div>
                                    </div>
                                    <div class="input-field">
                                        <span class="input-label">电话  :</span>
                                        <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="school_name" name="school_name" type="text" value="{{old('school_name')}}">
                                        <div class="tips"></div>
                                    </div>
                                    <div class="input-field">
                                        <span class="input-label">邮箱  :</span>
                                        <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="school_name" name="school_name" type="text" value="{{old('school_name')}}">
                                        <div class="tips"></div>
                                    </div>
                                    <div class="input-field">
                                        <span class="input-label">职务  :</span>
                                        <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="school_name" name="school_name" type="text" value="{{old('school_name')}}">
                                        <div class="tips"></div>
                                    </div>
                                </div>
                                <div class="meet"></div>
                                <div class="meet"></div>
                            </div>
                        </div>
                    </div> 
                    <div class="cut" style="margin-top: 34px;"></div>
                    <div>
                        <div class="invoice-header clearfix">
                            <span>发票抬头:</span>
                            <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="invoice_header" name="invoice_header" type="text" value="{{old('invoice_header')}}"">
                        </div>
                    </div>
                    <div class="cut" style="margin-top: 34px;"></div>-->
                    <div>
                        <div class="code-send clearfix">
                            <span>验证码:</span>
                            <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="invoice_header" name="invoice_header" type="text" value="{{old('invoice_header')}}"">
                            <a id="tel" class="tel">发送验证码</a>
                        </div>
                    </div>
                    <div class="logo-img"></div>
                    <button class="submit" type="submit">申请报名</button>
                </div>
            </form>
        </div>
        <div class="footer clearfix">
            <div class="inner clearfix">
                <img class="" alt="">
            </div>
            <div class="bot"></div>
        </div>

        <div class="identifying">
            <div class="showBox">
                <span class="tip">提示: 请您在右侧输入图中的数字或者字母~</span>
                <span id="tipes">验证成功之后,我们会将验证码发送至您的手机:  <i></i></span>
                <span class="tipes-false">您输入的手机号码或者验证码有误,请重新输入!!!</span>
                <img src="{{url('/captcha')}}">
                <input id="v_code" type="text" placeholder="请输入">
                <a id="sendCode" class="yes">确认</a>
                <a class="no"><i class="icon kenrobot ken-close"></i></a>
            </div>
        </div>
    </div>
        <script type="text/javascript">

        (function($){
            $.fn.tipInfo = function(tipMsg){
                $(this).siblings('.tips').html('<span class="cue">'+tipMsg+'</span>');
            }

            $.fn.tipWarn = function(tipMsg) {
                $(this).siblings('.tips').html('<span class="unuse">'+tipMsg+'</span>')
            }

            $.fn.tipValid = function() {
                $(this).siblings('.tips').html('<span class="useable"><i class="icon kenrobot ken-check"></i></span>');
            }

            $.fn.tipClear = function() {
                $(this).siblings('.tips').html('');
            }

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

        //判断是否位真实姓名
        function isName(val) {
            reg= /^[\u4e00-\u9fa5a-z]+$/gi;
            if(!reg.test(val)) {
                return false;
            }
            return true;
        }

        //数字 英文 汉字
        function isMathEngCha(val) {
            reg= /^[\u4e00-\u9fa5a-z0-9]+$/gi;
            if(!reg.test(val)) {
                return false;
            }
            return true;
        }

        //数字 英文 汉字  agemenber
        function isAgemenber(val) {
            reg= /^[0-9]+$/gi;
            if(!reg.test(val)) {
                return false;
            }
            return true;
        }

        //邮件判断
        function isEmail(mail) {
            reg=/^([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/gi;
            if(!reg.test(mail)) {
                return false;
            }
            return true;
        }

        //手机
        function isMobile(val) {
            reg = /^1(?:[38]\d|4[4579]|5[0-35-9]|7[35678])\d{8}$/;
            if(!reg.test(val)) {
                return false;
            }
            return true;
        }

        //身份证
        function isID(val) {        
            var vcity={ 11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古", 21:"辽宁",22:"吉林",23:"黑龙江",31:"上海",32:"江苏", 33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南", 42:"湖北",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆", 51:"四川",52:"贵州",53:"云南",54:"西藏",61:"陕西",62:"甘肃", 63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外"}; 
            var idCardReg =/(^\d{15}$)|(^\d{17}([0-9]|X|x))$/gi;

            if(!idCardReg.test(val)) {
                return false;
            }
            return true;
        }

        //校验表单字段
        function validField(el) {
            var $el = $(el);
            var name = $el.attr('name');
            var type = $el.attr('type');
            var val = $el.val();
            var datatype = $el.data('type');// 数据类型 email , mobile , ID,

            if (type == 'file') {
                if ($el.prop('required') && val == '') {
                    $el.tipWarn('照片不能为空');
                    return false;
                }

                var fileObj = document.getElementById($el.prop('id'));
                if(fileObj)
                {
                    var f = fileObj.files[0];
                    if(f)
                    {
                        if(f.size > 2 * 1024 * 1024)
                        {
                            $el.tipWarn('文件大小不能超过2M！');
                            return false;
                        }

                    }
                }

            } else if(type == 'text') {
                if ($el.prop('required') && val == '') {
                    $el.tipWarn('不能为空！');
                    //console.log('不能')
                    return false;
                }

                if (datatype == 'realname' && !isName(val)) {
                    $el.tipWarn('姓名不能是数字或特殊字符，请重新输入!');
                    return false;
                }

                if (datatype == 'schoolname' && !isMathEngCha(val)) {
                    $el.tipWarn('不能为特殊字符,请重新输入!');
                    return false;
                }

                if (datatype == 'agemenber' && !isAgemenber(val)) {
                    $el.tipWarn('只能输入数字!');
                    return false;
                }

                if (datatype == 'email' && !isEmail(val)) {
                    $el.tipWarn('邮件格式不正确');
                    //console.log('Email');

                    return false;
                }

                if (datatype == 'mobile' && !isMobile(val)) {
                    $el.tipWarn('手机格式不正确');
                    return false;
                }

                if (datatype == 'ID' && ! isID(val)) {
                    $el.tipWarn('身份证号格式不正确');
                    return false;
                }
            }

            $el.tipValid();
            return true;
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
            // 空间验证
            $("input").unbind('blur').blur(function(){
                validField(this);

                return false;
            });

            //输入提示
            $("input").unbind('focus').focus(function(){
                $(this).tipClear();
                var tip_info = $(this).attr('tip-info');
                var required = $(this).prop('required');
                var tip_info = tip_info ? tip_info : required ? '不能为空' : '';
                if (tip_info) {
                    $(this).tipInfo(tip_info);
                }
                return false;
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

            });

            $('.append_rank > .menber_list').each(function(index){
                console.log(index);

                var mapKey = new Array('member_name', 'member_id' ,'member_mobile', 'member_age', 'member_sex', 'member_school_name', 'member_school_address', 'member_pic');
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

                    if (type == 'file') {
                        var picurl = $el.data('picurl');
                        if (picurl) {
                            $(preview_el).attr('src', picurl);
                            continue;
                        }
                        var fileObj = $el.prop('files');
                        if (fileObj) {
                            var f = $el.prop('files')[0];
                            if(f){
                                // $('#preview_'+id).attr('src', );
                                $(preview_el).attr('src', URL.createObjectURL(f));
                            }
                        }
                        continue;

                    }

                    $(preview_el).html(val);
                }

                $('#member_info_'+index).show();
            })
        }

        // 点击确认输入验证码
        $('.identifying .yes').click(function() {
            // $('.identifying').removeClass('active');
            var captchacode = $('#v_code').val();
            var mobile = $('#leader_mobile').val();
            // var email = $('#leader_email').val();
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
                        console.log('验证码填写成功并确定')
                        refresh_captcha();
                        $('.identifying').removeClass('active');
                        countdown();

                    } else {
                        console.log('验证码填写错误')
                        $('.tipes-false').css('opacity', 1);
                    }
                }
            );
        });

        $(function(){
            // 点击刷新验证码图片
            $('.identifying .showBox img').click(function (){
                $(this).refreshCaptcha();
            });

            // 点击取消输入验证码

            // 点击确认输入验证码

            //更新表单验证绑定

            $('.submit').click(function(){
                var prevent = false;
                var $inputs = $($('#form')).find('input').each(function(){
                   var ret = validField(this);
                   if (!ret) {
                     prevent = true;
                   }
                });
                if (!prevent) {
                    console.log(1);
                    // $('form').submit(function(){
                    //     rebindVlidation();
                    //     return false;
                    //     console.log('阻止提交');
                    // })
                }
                return false;
            });

            rebindVlidation();

        })

        // 发送手机验证码
        $('#tel').click(function() {
            console.log(1);
            $('.identifying').addClass('active');
            var partten = /^1[3,5,8]\d{9}$/;
            if(partten.test($('#leader_mobile').val())){
               $('.identifying').addClass('active');
               $('#tipes i').html($('#leader_mobile').val());
               // countdown();
            }else {
               //console.log('格式错误');
            }
        });

        $('.identifying .showBox .no').click(function() {
            $('.identifying').removeClass('active');
        });

        $('.falseCodeAlert').click(function(){
            $(this).css('display', 'none');
        })
    </script>
</body>
</html>
