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

    <script src="https://cdn.bootcss.com/datepicker/0.5.3/datepicker.min.js"></script>
    <script src="https://cdn.bootcss.com/datepicker/0.5.3/i18n/datepicker.zh-CN.min.js"></script>
    <script type="text/javascript">

        // *********************************
        //              通用
        // *********************************

        $.fn.datepicker.setDefaults({
            language: 'zh-CN',
            format: 'yyyy-mm-dd'
        });

        // 输入提示
        (function($){
            $.fn.tipInfo = function(tipMsg){
                $(this).siblings('.tips').html('<span class="info">'+tipMsg+'</span>');
            }
            $.fn.tipWarn = function(tipMsg) {
                $(this).siblings('.tips').html('<span class="warn">'+tipMsg+'</span>')
            }
            $.fn.tipValid = function() {
                $(this).siblings('.tips').html('<span class="valid"><i class="icon kenrobot ken-check"></i></span>');
            }
            $.fn.tipClear = function() {
                $(this).siblings('.tips').html('');
            }
            $.fn.refreshCaptcha = function() {
                var timestamp = Date.parse(new Date());
                $(this).attr('src', "{{url('/captcha')}}"+"?t="+timestamp);
            }
            // 倒计时
            $.fn.countdown = function() {
                var timelimit = 60;
                var that = this;
                var old_text = $(this).html();
                var countdown = setInterval(function() {
                    $(that).html('('+ timelimit-- + ')s后重新获取验证码');
                    $(that).addClass('disabled');
                    if (timelimit <= 0) {
                        $(that).html(old_text);
                        $(that).removeClass('disabled');
                        clearInterval(countdown);
                    }
                }, 1000);
            }
        })(jQuery);

        // 校验表单字段
        function validField(el) {
            var $el = $(el);
            var name = $el.prop('name');
            var type = $el.prop('type');
            var id = $el.prop('id');
            var val = $el.val();
            var datatype = $el.data('type') || '';// 数据类型 email , mobile , ID,
            // console.log(name, type, id, val, datatype);
            var required = $el.attr('required') || datatype.indexOf('required') !== -1;

            if (val == '') {
                if (!required) {
                    $el.tipValid();
                    return true;
                }

                if (type == 'file') {
                    // 如果是修改，默认取photourl属性里的值进行校验
                    var photourl = $el.attr('photourl');
                    if (photourl) {
                        $el.tipValid();
                        return true;
                    }
                }

                var errMsg = type == 'file' ? '照片不能为空！' : '不能为空！'
                $el.tipWarn(errMsg);
                return false;
            }

            if (datatype.indexOf('realname') !== -1 && !isName(val)) {
                $el.tipWarn('姓名不能是数字或特殊字符！');
                return false;
            }

            if (datatype.indexOf('realname') == 0 && $el[0].length > 50) {
                $el.tipWarn('字符长度不能超过50!');
                return false;
            }
            if (datatype.indexOf('schoolname') !== -1 && !isMathEngCha(val)) {
                $el.tipWarn('允许输入汉字英文数字空格！');
                return false;
            }
            if (datatype.indexOf('agenumber') !== -1 && !isAgemenber(val)) {
                $el.tipWarn('请输入正确的年龄！');
                return false;
            }
            if (datatype.indexOf('height_cm') !== -1 && !isHeightnum(val)) {
                $el.tipWarn('请输入正确的身高！');
                return false;
            }
            if (datatype.indexOf('email') !== -1 && !isEmail(val)) {
                $el.tipWarn('邮件格式不正确！');
                return false;
            }
            if (datatype.indexOf('mobile') !== -1 && !isMobile(val)) {
                $el.tipWarn('手机格式不正确！');
                return false;
            }
            if (datatype.indexOf('ID') !== -1 && ! isID(val)) {
                $el.tipWarn('身份证号格式不正确！');
                return false;
            }

            if (datatype.indexOf('float') !== -1 && ! isFloat(val)) {
                $el.tipWarn('数据格式不正确');
                return;
            }

            // 队名检测 :: BUG: 不知道问么
            if (datatype.indexOf('teamname') !== -1 && ! teamNameCheck(val)) {
                var old_team_name = "{{$teamData['team_name'] or ''}}";
                if (val != old_team_name) {
                    $el.tipWarn('队伍名已被占用！');
                    return false;
                }
            }

            if (datatype.indexOf('verificationcode') !== -1 && ! verificationcodeCheck(val)) {
                $el.tipWarn('您输入的手机验证码有误,请核对短信后再次输入！');
                return false;
            }

            $el.tipValid();
            return true;
        }

        //切换页面
        var tabCenter = (function(){
            var tabIndexCenter = 0;
            function displayTab(index) {
                var navTab = $('.tab_menu ul li').get(index);
                $(navTab).addClass('active').siblings().removeClass('active');
                var actTab = $('.all_info .div_tab').get(index);
                $(actTab).addClass('active').siblings().removeClass('active');
            }
            return {
                currentIndex: function(){
                    return tabIndexCenter;
                },
                currentTab: function(){
                    return $('.all_info .div_tab').get(tabIndexCenter);
                },

                go: function(index, preCallback, afterCallback){
                    var maxlen = $('.tab_menu ul li').length;
                    if (index < 0 || maxlen <= index) {
                        console.warn('invalid TabIndex!');
                        return;
                    }

                    var prevent = false;

                    if (preCallback) {
                        prevent = ! preCallback(tabIndexCenter); // 传入变化之前的数值
                    }

                    if (prevent) {
                        return;
                    }

                    displayTab(index);
                    tabIndexCenter = index;

                    if (typeof afterCallback == "function") {
                        afterCallback(index); // 传入变化之后的数值
                    }
                },

                next: function(preCallback, afterCallback)
                {
                    this.go(tabIndexCenter + 1, preCallback, afterCallback);
                },

                previous: function(preCallback, afterCallback)
                {
                   this.go(tabIndexCenter - 1, preCallback, afterCallback);
                }
            }
        }());

        // 添加成员
        var addMemberList = (function() {
            var addIndex = 0;

            return function(type, defaultValue) {
                type = type || 'member';
                defaultValue = defaultValue || [];

                var tmpl = $.templates("#tmpl_memberlist");
                var rawHtml = tmpl.render({
                    'index': addIndex,
                    'type': type,
                    'defaultValue': defaultValue
                });

                if (type == 'member') {
                    $('.student_info .students').append(rawHtml);
                } else {
                    $('.leader_info .teachers').append(rawHtml);
                }

                var addHtmlId = '#member_list_' + addIndex + ' ';

                // 表单验证

                $(addHtmlId + " input").blur(function(){
                    validField(this);
                    return false;
                });

                $(addHtmlId + " input").not('.input-field-datetime').focus(function(){
                    $(this).tipClear();
                    var tip_info = $(this).attr('tip-info');
                    var required = $(this).attr('required');
                    var tip_info = tip_info ? tip_info : required ? '不能为空' : '';
                    if (tip_info) {
                        $(this).tipInfo(tip_info);
                    }
                });

                // 上传队员照片
                $(addHtmlId + " input[type=file]").change(function(){
                    validField(this);
                });

                $(addHtmlId + '.uploadBtn').click(function() {
                    $(this).siblings('.uploadField').click();
                });

                // 时间选择插件
                $(addHtmlId + ' input[data-toggle="datepicker"]').datepicker();

                // 删除按钮
                $(addHtmlId + ' .delete').click(function(){
                    $(this).parent().remove();
                    getPersonCount(type);

                });

                // 修改证件类型
                $(addHtmlId + ' .id_type').change(function(){
                    var selectedValue = $(this).find('option:selected').val();
                    if (selectedValue == '身份证') {
                        $(addHtmlId + ' .id_number').attr('data-type', 'ID');
                    } else {
                        $(addHtmlId + ' .id_number').removeAttr('data-type');
                        // **** 直接removeAttr， $.data() 仍然可以取出旧值
                        $(addHtmlId + ' .id_number').removeData('type');
                    }
                });

                // 更新添加按钮状态
                getPersonCount(type);

                addIndex++;
            }
        })();

        // 更新添加状态
        function getPersonCount(type) {
            if (type.indexOf('member') !== -1) {
                var studentCount = $('.students .person_data').length;
                if (studentCount > 0) {
                    $('.students .person_data').eq(0).find('.delete').unbind('click').css('display', 'none');
                }

                if (studentCount >= 4) {
                    $('#add_student').addClass('disabled');
                } else {
                    $('#add_student').removeClass('disabled');
                }

                return studentCount;
            } else {
                var teacherCount = $('.teachers .person_data').length;
                if (teacherCount > 0) {
                    $('.teachers .person_data').eq(0).find('.delete').unbind('click').css('display', 'none');
                }

                if (teacherCount >= 2) {
                    $('#add_teacher').addClass('disabled');
                } else {
                    $('#add_teacher').removeClass('disabled');
                }
                return teacherCount;
            }
            // body...
        }

        // TABINDEX：2 比赛项目
        function buildOptions(data, defaultVal) {
            // console.log('OPTION_DATA', data);
            var arr = [];
            for (key in data){
                arr.push(data[key]);
            }
            var tmpl = $.templates('#tmpl_competiton_options');
            return tmpl.render({'options': arr, 'defaultVal': defaultVal})
        };

        function getOptions(key) {
            key = key || 0 ;
            var data = {!! $competitonsJson !!};

            if (key == 0) {
                return data;
            }

            var datalist = {
                'children': data,
            }
            return findChildrenItems(datalist, key);
        }

        function findChildrenItems(datalist, parent_id) {
            if (!datalist['children']) {
                return;
            }

            for(k in datalist['children'])
            {
                if (k == parent_id) {
                    return datalist['children'][k]['children'];
                }
                var ret = findChildrenItems(datalist['children'][k], parent_id);
                if (ret) {
                    return ret;
                }
            }
            return;
        }

        function fillOptions(level, key, defaultVal) {
            level = level || 1;
            key = key || 0;
            defaultVal = defaultVal;
            // console.log(defaultVal);
            var options_data = getOptions(key);
            var options_html = buildOptions(options_data, defaultVal);
            $('#competition_' + level).html(options_html);
        }

        function buildPreview(type) {
            var container = type == 'member' ? '.students .person_data' : '.teachers .person_data';
            var resultHtml = '';
            var imgPreviewUrl = '';
            var localUrl = '';
            $(container).each(function(index){
                // console.log(this);
                imgPreviewUrl = '';
                localUrl = '';

                var data = new Array();
                $(this).find('.input-field').each(function(){
                    var name = $(this).find('.input-label').html();
                    var $el_input = $(this).find('input, select').eq(0);
                    var value = '';
                    if ($el_input.is('select')) {
                        // console.log('selec');
                        value = $el_input.find('option:selected').val();
                    } else if($el_input.attr('type') == 'radio') {
                        value = $(this).find('input:radio:checked').val();
                    } else if ($el_input.attr('type') == 'file') {

                        value = $el_input.val();

                        if( detectIE() != 'IE8' && detectIE() != 'IE9'){
                            var source_id = $el_input.attr('id');
                            var f = document.getElementById(source_id).files[0];
                            if (f) {
                                // console.log(f);
                                imgPreviewUrl = window.URL.createObjectURL(f);
                                // console.log(imgPreviewUrl);
                            }
                        }
                        localUrl = $el_input.val();

                        //  *** 优先预览用户上传的图片， 如果用户没有改变，使用已提交数据里的图片
                        var photourl = $el_input.attr('photourl');
                        if (photourl) {
                            imgPreviewUrl = imgPreviewUrl || photourl;
                            localUrl = localUrl || photourl;
                        }

                    } else {
                        value = $el_input.val();
                    }

                    // 图片项不显示
                    if ($el_input.attr('type') != 'file') {
                        data.push({
                            name: name,
                            value: value
                        })
                    }
                });

                var tmpl = $.templates('#tmpl_preview_memberlist');
                resultHtml += tmpl.render({'type' : type, 'index': index,'datalist' : data, 'imgurl': imgPreviewUrl, 'localUrl': localUrl});
            });

            return resultHtml;
        }


        function previewList() {
            var idNames = new Array(
                // 联系人信息
                'contact_name',
                'contact_mobile',
                'contact_email',
                'contact_remark',
                // 赛项信息
                'team_no',
                'team_name',
                'competition_1',
                'competition_2',
                'competition_3',
                'remarks',
                // 开票信息
                'invoice_type',
                'invoice_title',
                'invoice_code',
                'invoice_money',
                'invoice_detail',
                'invoice_mail_address',
                'invoice_mail_recipients',
                'invoice_mail_mobile',
                'invoice_mail_email',
                'invoice_remark'
            );

            for(i in idNames)
            {
                $el = $('#' + idNames[i]);
                var val = $el.val();
                if ($el.is('select')) {
                    val = $el.find('option:selected').text();
                }
                $('#preview_' + idNames[i]).html(val);
            }
            // console.log(idNames);
            $('#preview_leader').html(buildPreview('leader'));
            $('#preview_member').html(buildPreview('member'));

            if (detectIE() == 'IE8' || detectIE() == 'IE9') {
                $('.preview-pic').each(function(){
                    var source_id = $(this).attr('id');
                    var imgObj = document.getElementById("preview");
                    var dataURL = $(this).attr('local-src');
                    imgObj.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
                    imgObj.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = dataURL;
                });
            }

        }

        function copyContactInfo() {
            var value =  $('#add_contact').find('option:selected').val();
            // 如果选的是添加联系人信息，就不修改
            if (value == 'yes') {
                return;
            }

            var $el = $('.teachers .person_data').eq(0);
            if ($el) {
                var name = $el.find('input.name').val();
                var mobile = $el.find('input.tel').val();
                var email = $el.find('input.mail').val();
                $('#contact_name').val(name);
                $('#contact_mobile').val(mobile);
                $('#contact_email').val(email);
            }
        }



        // 提取联系人手机
        function getContactMobile() {
             return $('#contact_mobile').val();
        }

        $(function(){
            // 0. 报名须知
            $('#input-read').click(function (){
                console.log(1);
                if ($(this).prop("checked") == false) {
                    $('#btn-read').addClass('disabled');
                    $('#btn-read').unbind('click');
                } else {
                    $('#btn-read').removeClass('disabled');
                    $('#btn-read').bind('click', function(event) {
                        $('.instructions').removeClass('active');
                        $('.content').addClass('active');
                    });
                }
            });

            $('#btn-read').click(function (){
                $('.instructions').removeClass('active');
                $('.content').addClass('active');
            });

            // 1. 邀请码，联系人信息
            // $('#invitecode').blur(function() {
            //     validField(this);
            // });

            $('#add_contact').change(function() {
                var val = $(this).find('option:selected').val();
                if (val == 'yes') {
                    $('.add_contact').not('#contact_remark').attr('required', true);
                    $('.add_contact').removeClass('disabled');
                    $('.add_contact').removeAttr('readonly');

                } else {
                    $('.add_contact').removeAttr('required');
                    $('.add_contact').addClass('disabled');
                    $('.add_contact').attr('readonly', true);
                    $('.add_contact').val('');
                    copyContactInfo();
                }
            });

            // TODO: 用户可选择是否添加联系人

            // 2. 添加领队
            $('#add_teacher').click(function(event) {
                var leaderHtml = $.templates("#leaderList").render({});
                $('.leader_info .teachers').append(leaderHtml);
                deleteLeader();
            });
            function deleteLeader() {
                if ($('.teachers .leader_list').length > 1) {
                    $('#add_teacher').css({
                        'background': '#ccc',
                        'pointer-events': 'none'
                    });
                } else {
                    $('#add_teacher').css({
                        'background': '#587BEF',
                        'pointer-events': 'auto'
                    });
                }
                $('.teachers .leader_list:eq(1) .delete').unbind('click').bind('click', function() {
                    $('.teachers .leader_list:eq(1)').remove();
                    $('#add_teacher').css({
                        'background': '#587BEF',
                        'pointer-events': 'auto'
                    });
                });
                $(' .teachers .leader_list:eq(1) .id_type').change(function() {
                    var selectedValue = $(this).find('option:selected').val();
                    if (selectedValue == '身份证') {
                        $(' .teachers .leader_list:eq(1) .id_number').attr('data-type', 'ID');
                    } else {
                        $(' .teachers .leader_list:eq(1) .id_number').removeAttr('data-type');
                        // **** 直接removeAttr， $.data() 仍然可以取出旧值
                        $(' .teachers .leader_list:eq(1) .id_number').removeData('type');
                    }
                });
                $(' .teachers .leader_list .id_type').each(function() {
                    $(this).blur(function() {
                        validField(this);
                        return false;
                    });
                });
                $('.teachers .leader_list input').each(function() {
                    $(this).blur(function() {
                        validField(this);
                        return false;
                    });
                });
            }

            // 页面分配领队
            $('#leader_info_btn').click(function() {
                console.log($('.teachers .leader_list').length);
                $('.teachers .leader_list:eq(1) .delete').show();
                deleteLeader();

                $(' .teachers .leader_list:eq(0) .id_type').change(function() {
                    var selectedValue = $(this).find('option:selected').val();
                    if (selectedValue == '身份证') {
                        $(' .teachers .leader_list:eq(0) .id_number').attr('data-type', 'ID');
                    } else {
                        $(' .teachers .leader_list:eq(0) .id_number').removeAttr('data-type');
                        // **** 直接removeAttr， $.data() 仍然可以取出旧值
                        $(' .teachers .leader_list:eq(0) .id_number').removeData('type');
                    }
                });
            });

            // TODO: 添加按钮 DISABLED
            // TODO: 最大人数限制

            // 3. 赛项信息 加载比赛项目数据， 校验队伍名称
            $('#team_name').blur(function() {
                validField(this);
            });

            // 初始化
            @if($is_update)
            var initKeys = {!! json_encode($teamData['eventItemsKeys']) !!};
            @else
            var initKeys = [0, 0, 0];
            @endif
            // console.log(initKeys);
            fillOptions(1, 0, initKeys[0]);
            var k1 = $('#competition_1').find('option:selected').val();
            fillOptions(2, k1, initKeys[1]);
            var k2 = $('#competition_2').find('option:selected').val();
            fillOptions(3, k2, initKeys[2]);


            $('.select-box').change(function() {
                var level = $(this).attr('level');
                var key = $(this).find('option:selected').val();
                var next_level = parseInt(level) + 1;
                fillOptions(next_level, key);

                // 更新下拉选项
                if (next_level < 3) {
                    $('#competition_' + next_level).change();
                }
            });

            // 4. 添加队员
            $('#add_student').click(function (){

                var count = getPersonCount('leader');
                if (count >= 4) {
                    console.warn('too many');
                    return;
                }
                addMemberList('member');
            });

            // TODO: 添加按钮 DISABLED
            // TODO: 最大人数限制

            // 5. 开票信息
            // TODO&MAYBE: 根据人数计算金额
            // $('#invoice_type').change(function(){
                // var selectedValue = $(this).find('option:selected').val();
                // if (selectedValue == '发票') {
                //     $('.invoice-group').not('#invoice_remark').attr('required', true);
                //     $('.invoice-group').removeClass('disabled');
                //     $('.invoice-group').removeAttr('readonly');
                // } else if (selectedValue == '收据') {
                //     $('.invoice-group').not('#invoice_remark').attr('required', true);
                //     $('.invoice-group').removeClass('disabled');
                //     $('.invoice-group').removeAttr('readonly');

                //     $('#invoice_code').removeAttr('required');
                //     $('#invoice_code').addClass('disabled');
                //     $('#invoice_code').attr('readonly', true);

                // } else if (selectedValue == '不开票') {
                //     $('.invoice-group').val('');
                //     $('.invoice-group').removeAttr('required');
                //     $('.invoice-group').addClass('disabled');
                //     $('.invoice-group').attr('readonly', true);
            // });
            $('#invoice_type').unbind('change').bind('change', function(event) {
                var selectedValue = $(this).find('option:selected').val();
                if (selectedValue == '发票') {
                    $('.invoice-group').not('#invoice_remark').attr('required', true);
                    $('.invoice-group').removeClass('disabled');
                    $('.invoice-group').removeAttr('readonly');
                } else if (selectedValue == '收据') {
                    $('.invoice-group').not('#invoice_remark').attr('required', true);
                    $('.invoice-group').removeClass('disabled');
                    $('.invoice-group').removeAttr('readonly');

                    $('#invoice_code').removeAttr('required');
                    $('#invoice_code').addClass('disabled');
                    $('#invoice_code').attr('readonly', true);

                } else if (selectedValue == '不开票') {
                    $('.invoice-group').val('');
                    $('.invoice-group').removeAttr('required');
                    $('.invoice-group').addClass('disabled');
                    $('.invoice-group').attr('readonly', true);
                }
            });

            $('.invoice-group').blur(function(){
                validField(this);
            })

            // 6. 信息确认
            // TODO: 信息预览
            // 获取验证码
            // 提交

            // 邀请码校验
            $("#verificationcode").blur(function() {
                validField(this);
            });

            // 6.1 点击「获取手机验证码」按钮，展示窗口
            $('#getverifycode').click(function() {
                var mobile = getContactMobile();
                var partten = /^1\d{10}$/;
                // console.log(mobile);
                if(! partten.test(mobile)) {
                    $('#verificationcode').tipWarn('请输入正确的联系人手机号！');
                    return;
                }
                $('.verificationcode_box').show();
                $('#tipes i').html(mobile);
            });

            // 6.2 发送手机验证码
            $('#sendCode').click(function() {
                var captchacode = $('#v_code').val();
                var mobile = getContactMobile();
                var type = 'mobile';

                $.post(
                    "{{url('/verificationcode/send')}}",
                    {
                        type    : type,
                        captcha : captchacode,
                        mobile  : mobile,
                    },
                    function(res){
                        if (res.status == 0) {
                            // 验证码填写成功并确定
                            $('.verificationcode_box').hide();
                            $('#getverifycode').countdown();
                        } else {
                            // 验证码填写错误
                            $('.tipes-false').css('opacity', 1);
                        }
                        // 刷新验证码
                        $('#captcha_img1').refreshCaptcha();
                    }
                );
            });

            // 6.2 点击刷新验证码图片
            $('#captcha_img1').click(function (){
                $(this).refreshCaptcha();
            });

            // 6.4 点击取消输入验证码
            $('.verificationcode_box .no').click(function() {
                $('.verificationcode_box').hide();
            });
            $('#v_code').click(function(event) {
                $('.tipes-false').css('opacity', 0);
            });

            // 验证码错误提示，关闭
            $('.codeError .close').click(function() {
                $('.codeError').removeClass('active');
            });


            // 7. 提交表单
            $("#submit").click(function() {
                // TODO 校验代码，如果出现错误，那么定位到出错的TAB页面
                $("#form").submit();
            });


            // 通用，翻页
            $('.btn_next').click(function(){
                // console.log('翻页');
                tabCenter.next(function(index){
                    var curTab = tabCenter.currentTab();
                    var prevent = false;
                    $(curTab).find('input').each(function(){
                        var ret = validField(this);
                        // 表单验证不通过
                        if (!ret) {
                            prevent = true;
                        }
                    })

                    return !prevent;
                }, function(index) {
                    copyContactInfo();
                    if (index == 5) {
                        previewList();
                    }
                });
            });

            $('.btn_pre').click(function(){
                tabCenter.previous();
            });

            tabCenter.go(0);

            @if($is_update)
                var team_members = {!! json_encode($teamData['members']) !!};
                for(idx in team_members) {
                    var item = team_members[idx];
                    if (item['type'] == 'leader') {
                    } else {
                        addMemberList(item['type'], item);
                    }
                }

            @else
                // addMemberList('leader');
                addMemberList('member');
            @endif

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

            $('#btn-logout').unbind('click').bind('click', function() {
                console.log('退出效果')
                $('.username_info').hide();
            });

            $('#member_next_btn').unbind("mouseenter").unbind("mouseleave").bind({
                mouseenter: function(event) {
                    var selectedValue = $(this).siblings('.students').find('.member_list').find('.input-field').find('option:selected').val();
                    if (selectedValue == '身份证') {
                       $(this).siblings('.students').find('.member_list').find('.input-field').find('.id_number').attr('data-type', 'ID');
                    } else {
                       $(this).siblings('.students').find('.member_list').find('.input-field').find('.id_number').removeAttr('data-type');
                       $(this).siblings('.students').find('.member_list').find('.input-field').find('.id_number').removeData('type');
                    }
                },
                mouseleave: function() {
                }
            });

            $('#invoice_next_btn').unbind("mouseenter").unbind("mouseleave").bind({
                mouseenter: function(event) {
                    var selectedValue = $(this).siblings('.enroll-notice').find('.input-field').find('option:selected').val();
                    if (selectedValue == '发票') {
                        $('.invoice-group').not('#invoice_remark').attr('required', true);
                        $('.invoice-group').removeClass('disabled');
                        $('.invoice-group').removeAttr('readonly');
                    } else if (selectedValue == '收据') {
                        $('.invoice-group').not('#invoice_remark').attr('required', true);
                        $('.invoice-group').removeClass('disabled');
                        $('.invoice-group').removeAttr('readonly');
                        $('#invoice_code').removeAttr('required');
                        $('#invoice_code').addClass('disabled');
                        $('#invoice_code').attr('readonly', true);
                    } else if (selectedValue == '不开票') {
                        $('.invoice-group').val('');
                        $('.invoice-group').removeAttr('required');
                        $('.invoice-group').addClass('disabled');
                        $('.invoice-group').attr('readonly', true);
                    }
                },
                mouseleave: function() {
                }
            });



        });// end of $(function())


       </script>

    <script id="tmpl_memberlist" type="text/x-jsrender">
        <div class="clearfix person_data  @{{:type}}_list" id="member_list_@{{:index}}" data-index="@{{:index}}">
            <div class="delete"><i class="icon kenrobot ken-close"></i></div>
            <input id="@{{:type}}_@{{:index}}_id" name="@{{:type}}[@{{:index}}][id]" type="hidden" value="@{{: defaultValue['id']}}">

            <div class="input-field">
                <span class="input-label">姓名  :</span>
                <input data-type="realname" required tip-warn="" tip-info="仅支持英文、汉字" class="input-field-text name" id="@{{:type}}_@{{:index}}_name" name="@{{:type}}[@{{:index}}][name]" type="text" value="@{{: defaultValue['name']}}">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">性别  :</span>
                <input id="@{{:type}}_@{{:index}}_sex_man" class="input-radio man @{{:type}}_sex" type="radio" checked name="@{{:type}}[@{{:index}}][sex]" value="男"><span>男</span>
                <input id="@{{:type}}_@{{:index}}_sex_woman"  class="input-radio woman @{{:type}}_sex" type="radio" @{{if defaultValue['sex'] == '女' }} checked @{{/if}} name="@{{:type}}[@{{:index}}][sex]" value="女"><span>女</span>
                <p id="@{{:type}}_@{{:index}}_sex"></p>
            </div>
            <div class="input-field">
                <span class="input-label">年龄  :</span>
                <input data-type="agenumber" required tip-info="请填写真实的年龄" class="input-field-text"  id="@{{:type}}_@{{:index}}_age" type="text" name="@{{:type}}[@{{:index}}][age]" value="@{{: defaultValue['age']}}">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">学校 :</span>
                <input data-type="schoolname" required tip-info="请填写学校" class="input-field-text"  id="@{{:type}}_@{{:index}}_school" type="text" name="@{{:type}}[@{{:index}}][school]" value="@{{: defaultValue['school']}}">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">班级 :</span>
                <input data-type="schoolname" required tip-info="请填写班级" class="input-field-text"  id="@{{:type}}_@{{:index}}_class" type="text" name="@{{:type}}[@{{:index}}][class]" value="@{{: defaultValue['class']}}">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">证件类型  :</span>
                <select name="@{{:type}}[@{{:index}}][idcard_type]" class="input-field-text id_type">
                    <option value="身份证" @{{if defaultValue['relation'] == '身份证'}} selected @{{/if}}>身份证</option>
                    <option value="内地通行证" @{{if defaultValue['relation'] == '内地通行证'}} selected @{{/if}}>内地通行证</option>
                    <option value="台胞证" @{{if defaultValue['relation'] == '台胞证'}} selected @{{/if}}>台胞证</option>
                    <option value="护照" @{{if defaultValue['relation'] == '护照'}} selected @{{/if}}>护照</option>
                </select>
            </div>
            <div class="input-field">
                <span class="input-label">证件号码  :</span>
                <input tip-info="请填写证件号码" required class="input-field-text id_number" data-type="ID" id="@{{:type}}_@{{:index}}_ID_number" type="text" name="@{{:type}}[@{{:index}}][idcard_no]" value="@{{: defaultValue['idcard_no'] }}">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">学生监护人  :</span>
                <input data-type="realname" required tip-warn="" tip-info="仅支持英文、汉字" class="input-field-text name" id="@{{:type}}_@{{:index}}_guarder" name="@{{:type}}[@{{:index}}][guarder]" type="text" value="@{{: defaultValue['guarder']}}">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">关系  :</span>
                <select name="@{{:type}}[@{{:index}}][relation]" class="input-field-text relation">
                    <option value="亲属" @{{if defaultValue['relation'] =='亲属'}} selected @{{/if}}>亲属</option>
                    <option value="师生" @{{if defaultValue['relation'] =='师生'}} selected @{{/if}}>师生</option>
                    <option value="其他" @{{if defaultValue['relation'] =='其他'}} selected @{{/if}}>其他</option>
                </select>
            </div>
            <div class="input-field">
                <span class="input-label">手机号码  :</span>
                <input required data-type="mobile" tip-info="请填写正确的手机号码" class="input-field-text tel" id="@{{:type}}_@{{:index}}_mobile" name="@{{:type}}[@{{:index}}][mobile]" type="text" value="@{{: defaultValue['mobile']}}">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">联系地址  :</span>
                <input data-type="schoolname" required tip-info="请填写联系地址" class="input-field-text"  id="@{{:type}}_@{{:index}}_home_address" type="text" name="@{{:type}}[@{{:index}}][home_address]" value="@{{: defaultValue['home_address']}}">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">邮箱  :</span>
                <input required data-type="email" tip-info="请按照正确的邮箱格式填写" class="input-field-text mail" id="@{{:type}}_@{{:index}}_mail" name="@{{:type}}[@{{:index}}][email]" type="text" value="@{{: defaultValue['email']}}">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">备注  :</span>
                <input tip-info="请填写备注信息" class="input-field-text mail" id="@{{:type}}_@{{:index}}_remarks" name="@{{:type}}[@{{:index}}][remark]" type="text" value="@{{: defaultValue['remark']}}">
                <div class="tips"></div>
            </div>
        </div>
    </script>

    <script id="leaderList" type="text/x-jsrender">
        <div class="clearfix person_data  leader_list" id="member_list_6" data-index="6">
            <div class="delete"><i class="icon kenrobot ken-close"></i></div>
            <input id="leader_6_id" name="leader[6][id]" type="hidden" value="">
            <div class="input-field">
                <span class="input-label">姓名  :</span>
                <input data-type="realname" required="" tip-warn="" tip-info="仅支持英文、汉字" class="input-field-text name" id="leader_6_name" name="leader[6][name]" type="text" value="">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">性别  :</span>
                <input id="leader_6_sex_man" class="input-radio man leader_sex" type="radio" checked="" name="leader[6][sex]" value="男"><span>男</span>
                <input id="leader_6_sex_woman" class="input-radio woman leader_sex" type="radio" name="leader[6][sex]" value="女"><span>女</span>
                <p id="leader_6_sex"></p>
            </div>
            <div class="input-field">
                <span class="input-label">年龄  :</span>
                <input data-type="agenumber" required="" tip-info="请填写真实的年龄" class="input-field-text" id="leader_6_age" type="text" name="leader[6][age]" value="">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">工作单位 :</span>
                <input data-type="schoolname" required="" tip-info="请填写工作单位" class="input-field-text" id="leader_6_work_unit" type="text" name="leader[6][work_unit]" value="">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">证件类型  :</span>
                <select name="leader[6][idcard_type]" class="input-field-text id_type">
                    <option value="身份证" selected="">身份证</option>
                    <option value="内地通行证">内地通行证</option>
                    <option value="台胞证">台胞证</option>
                    <option value="护照">护照</option>
                </select>
            </div>
            <div class="input-field">
                <span class="input-label">证件号码  :</span>
                <input tip-info="请填写证件号码" required="" class="input-field-text id_number" data-type="ID" id="leader_6_ID_number" type="text" name="leader[6][idcard_no]" value="">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">联系地址  :</span>
                <input data-type="schoolname" required="" tip-info="请填写联系地址" class="input-field-text" id="leader_6_home_address" type="text" name="leader[6][home_address]" value="">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">手机号码  :</span>
                <input required="" data-type="mobile" tip-info="请填写正确的手机号码" class="input-field-text tel" id="leader_6_mobile" name="leader[6][mobile]" type="text" value="">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">邮箱  :</span>
                <input required="" data-type="email" tip-info="请按照正确的邮箱格式填写" class="input-field-text mail" id="leader_6_mail" name="leader[6][email]" type="text" value="">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">学校校长姓名(选填)  :</span>
                <input data-type="realname" tip-warn="" tip-info="仅支持英文、汉字" class="input-field-text name" id="leader_6_headmaster" name="leader[6][headmaster]" type="text" value="">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">备注  :</span>
                <input tip-info="请填写备注信息" class="input-field-text mail" id="leader_6_remarks" name="leader[6][remark]" type="text" value="">
                <div class="tips"></div>
            </div>
        </div>
    </script>

    <script id="tmpl_preview_memberlist" type="text/x-jsrender">
        <div class="leader_info" style="position: relative;">
            <div class="cut"></div>
            @{{for datalist}}
            <div class="input-field">
                <span class="name">@{{: name}}</span>
                <span class="name_input">@{{: value}}</span>
            </div>
            @{{/for}}
            <div class="input-field">
                <span class="name"></span>
                <span class="name_input"></span>
            </div>
            <!-- <img id="preview_@{{:type }}_@{{: index}}_pic" class="preview-pic" local-src="@{{: localUrl }}" src="@{{: imgurl}}" > -->
        </div>
    </script>

    <script id="tmpl_competiton_options" type="text/x-jsrender">
        @{{if options.length ~defaultVal = defaultVal}}
            @{{for options}}
                @{{if id == ~defaultVal}}
                <option value="@{{: id}}" selected> @{{: name}}</option>
                @{{else}}
                <option value="@{{: id}}"> @{{: name}}</option>
                @{{/if}}
            @{{/for}}
        @{{/if}}
    </script>
</body>
</html>
