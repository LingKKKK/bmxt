<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <title>RoboCom北京挑战赛</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/matchbj.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/kenrobot.css')}}">
    <link href="https://cdn.bootcss.com/datepicker/0.5.3/datepicker.css" rel="stylesheet">
</head>
<body>
    <div class="main">
        <div class="header">
            <div class="inner">
                <img src="{{ asset('assets/img/logo1.png')}}" alt="">
                <div class="logout">
                    <span></span>
                </div>
            </div>
        </div>
        <div class="instructions clearfix">
            <h2 class="instructions-h">北京挑战赛报名须知</h2>
            <span class="instructions-span clearfix"> 各位参赛选手与老师：</span>
            <br/>
            <span class="instructions-span clearfix"> 2017世界机器人大赛——RoboCom青少年挑战赛全国总决赛在线报名工作从6月1日开始收到全国广大青少年选手的高度关注。公开报名已于6月22日12点结束，不再接受公开报名。如有疑问可以联系各相关负责人：</span>
            <br/>
            <span class="instructions-span clearfix"> &nbsp;&nbsp;&nbsp;&nbsp;“未来世界”： 李超 18510207182   13910252611</span>
            <span class="instructions-span clearfix"> &nbsp;&nbsp;&nbsp;&nbsp;“博思威龙”、“工业时代”：曾令勇 15899948376</span>
            <span class="instructions-span clearfix"> &nbsp;&nbsp;&nbsp;&nbsp; “攻城大师”、“智造大挑战”：李达 15876493817</span>
            <br/>
            <span class="instructions-span clearfix"> 网上报名技术支持：江城 13476000614</span>
            <br/>
            <span class="instructions-span clearfix"> 特此通知！</span>
            <div class="clear"></div>
            <a id="btn-read" type="button">我同意</a>
            <span class="span-read">阅读,并同意</span>
            <input type="checkbox" id="input-read" name="" value=""/>
        </div>

        <div class="content active">
            <form id="form" name="form" action="/signup" enctype="multipart/form-data" method="POST" novalidate style="width: 1004px;">
                <div class="tab_menu">
                    <ul>
                        <li class="active">联系人信息</li>
                        <li>领队老师/教练信息</li>
                        <li>赛项信息</li>
                        <li>队员信息</li>
                        <li>开票信息</li>
                        <li>信息确认</li>
                    </ul>
                </div>
                <div class="all_info clearfix">
                    <div class="contact_info div_tab clearfix active">
                        <div class="input-field">
                            <span class="input-label">邀请码  :</span>

                            <input tip-warn="邀请码不能为空" tip-info="输入邀请码" data-type="invitecode" required class="input-field-text" id="invitecode" name="invitecode" type="text" value="{{$signdata['invitecode'] or ''}}">
                            <div class="tips"></div>
                        </div>
                        <div class="input-field">
                            <span class="input-label">是否添加联系人  :</span>
                            <select class="input-field-text" id="add_contact">
                                <option value="yes">添加</option>
                                <option value="no" selected>不添加</option>
                            </select>
                            <div class="tips"></div>
                        </div>
                        <div class="input-field">
                            <span class="input-label">联系人姓名  :</span>
                            <input tip-warn="" tip-info="仅支持英文、汉字" data-type="realname" class="input-field-text add_contact disabled" readonly  id="contact_name_info" name="contact_name" type="text" value="">
                            <div class="tips"></div>
                        </div>
                        <div class="input-field">
                            <span class="input-label">联系人手机号码  :</span>
                            <input tip-info="请填联系人手机号码" data-type="mobile" class="input-field-text add_contact disabled" readonly  id="contact_mobile_info" type="text" name="contact_mobile" value="">
                            <div class="tips"></div>
                        </div>
                        <div class="input-field">
                            <span class="input-label">联系人邮箱  :</span>
                            <input tip-info="请按照正确的邮箱格式填写" data-type="email" class="input-field-text add_contact disabled" readonly id="contact_email_info" name="contact_email" type="text" value="">
                            <div class="tips"></div>
                        </div>
                        <div class="input-field">
                            <span class="input-label">联系人备注  :</span>
                            <input tip-info="请填写备注内容" class="input-field-text add_contact disabled" id="contact_remark_info" readonly name="contact_remark" type="text" value="">
                            <div class="tips"></div>
                        </div>
                        <div class="input-field">
                            <span class="input-label" style="width: auto; color: red;">* 联系人部分为选填内容,如果不填写,默认第一个领队老师为联系人!!!</span>
                        </div>
                        <button type="button" class="btn_next" id="leader_info_btn">下一步</button>
                    </div>
                    <div class="leader_info div_tab clearfix">
                        <div class="clearfix teachers">
                        </div>
                        <button type="button" id="add_teacher">添加领队信息</button>

                        <button type="button" class="btn_pre">上一步</button>
                        <button type="button" class="btn_next">下一步</button>
                    </div>
                    <div class="ranks_info div_tab">
                        <div class="input-field">
                            <span class="input-label">队伍名称  :</span>
                            <input data-type="schoolname|teamname" required tip-warn="" tip-info="请输入您队伍的名称" class="input-field-text" id="team_name" name="team_name" type="text" value="">
                            <div class="tips"></div>
                        </div>
                        <div class="input-field">
                            <span class="input-label">赛事项目  :</span>
                            <select class="select-box" id="competition_1" name="competition_name" level="1"></select>
                            <input type="hidden" id="competition_name_val" name="" value="">
                        </div>
                        <div class="input-field">
                            <span class="input-label">赛事名称  :</span>
                            <select class="select-box" id="competition_2" name="competition_type" level="2"></select>
                            <input type="hidden" id="competition_type_val" name="" value="">
                        </div>
                        <div class="input-field">
                            <span class="input-label">组别  :</span>
                            <select class="select-box" id="competition_3" name="competition_group" level="3"></select>
                            <input type="hidden" id="competition_group_val" name="" value="">
                        </div>
                        <div class="input-field">
                            <span class="input-label">备注  :</span>
                            <input tip-info="请按照正确的邮箱格式填写" class="input-field-text" id="remarks" name="remarks" type="text" value="">
                            <div class="tips"></div>
                        </div>
                        <button type="button" class="btn_pre">上一步</button>
                        <button id="checkTeamName" type="button" class="btn_next">下一步</button>
                    </div>
                    <div class="student_info div_tab">
                        <span class="title-span">*队员最多8人</span>
                        <div class="clearfix students">
                        </div>

                        <button type="button" class="btn_new" id="add_student">添加新成员</button>
                        <button type="button" class="btn_pre">上一步</button>
                        <button type="button" class="btn_next">下一步</button>
                    </div>
                    <div class="payment div_tab">
                        <div class="enroll-notice">
                            <div class="input-field">
                                <span class="input-label">开票类型 :</span>
                                <select name="invoice_type" id="invoice_type" class="input-field-text">
                                    <option value="发票" selected>发票</option>
                                    <option value="收据">收据</option>
                                    <option value="不开票">不开票</option>
                                </select>
                                <div class="tips"></div>
                            </div>
                            <div class="input-field">
                                <span class="input-label">发票抬头(*收款机构的抬头) :</span>
                                <input required data-type='schoolname' tip-info="发票抬头" class="input-field-text invoice-group" id="invoice_title" name="invoice_title" type="text" value="{{$signdata['invoice_header'] or ''}}">
                                <div class="tips"></div>
                            </div>
                            <div class="input-field">
                                <span class="input-label">统一社会信用代码 :</span>
                                <input required data-type='' tip-info="统一社会信用代码" class="input-field-text invoice-group" id="invoice_code" name="invoice_code" type="text" value="{{$signdata['invoice_header'] or ''}}">
                                <div class="tips"></div>
                            </div>
                            <div class="input-field">
                                <span class="input-label">开票金额 :</span>
                                <input required data-type='float' tip-info="开票金额" class="input-field-text invoice-group" id="invoice_money" name="invoice_money" type="text" value="{{$signdata['total_cost'] or ''}}">
                                <div class="tips"></div>
                            </div>
                            <div class="input-field">
                                <span class="input-label">收件地址 :</span>
                                <input required data-type='schoolname' tip-info="收件地址" class="input-field-text invoice-group" id="invoice_mail_address" name="invoice_mail_address" type="text" value="{{$signdata['total_cost'] or ''}}">
                                <div class="tips"></div>
                            </div>
                            <div class="input-field">
                                <span class="input-label">联系人姓名 :</span>
                                <input required data-type='realname' class="input-field-text invoice-group" id="invoice_mail_recipients" name="invoice_mail_recipients" type="text" value="{{$signdata['total_cost'] or ''}}">
                                <div class="tips"></div>
                            </div>
                            <div class="input-field">
                                <span class="input-label">联系电话 :</span>
                                <input required data-type='mobile' tip-info="联系电话" class="input-field-text invoice-group" id="invoice_mail_mobile" name="invoice_mail_mobile" type="text" value="{{$signdata['total_cost'] or ''}}">
                                <div class="tips"></div>
                            </div>
                            <div class="input-field">
                                <span class="input-label">E-mail :</span>
                                <input required data-type='email' tip-info="电子邮件" class="input-field-text invoice-group" id="invoice_mail_email" name="invoice_mail_email" type="text" value="{{$signdata['total_cost'] or ''}}">
                                <div class="tips"></div>
                            </div>
                            <div class="input-field">
                                <span class="input-label">备注 :</span>
                                <input class="input-field-text invoice-group" id="invoice_remark" name="invoice_remark" type="text" value="{{$signdata['total_cost'] or ''}}">
                                <div class="tips"></div>
                            </div>
                        </div>
                        <button type="button" class="btn_pre">上一步</button>
                        <button type="button" class="btn_next">下一步</button>
                    </div>

                    <div class="preview_info div_tab">
                        <div class="leader" id="number-leader">
                            <span class="leader_title">带队老师信息(如果无数据,第一个领队教师为联系人)</span>
                            <div class="cut"></div>
                            <div class="input-field">
                                <span class="name">真实姓名 :</span>
                                <span  id="preview_contact_name" class="name_input" ></span>
                            </div>
                            <div class="input-field">
                                <span class="name">联系人手机号 :</span>
                                <span  id="preview_contact_mobile" class="name_input"></span>
                            </div>
                            <div class="input-field">
                                <span  class="name">联系人邮箱 :</span>
                                <span id="preview_contact_email" class="name_input"></span>
                            </div>
                            <div class="input-field">
                                <span class="name">联系人备注 :</span>
                                <span  id="preview_contact_remark" class="name_input" style="margin-bottom: 40px;"></span>
                            </div>
                        </div>
                        <div class="leader" id="leader">
                            <span class="leader_title">领队老师信息</span>
                            <div id="preview_leader">

                            </div>

                        </div>
                        <div class="leader" id="team">
                            <span class="leader_title">队伍信息</span>
                            <div class="cut"></div>
                            <div class="input-field">
                                <span class="name">队伍编号 :</span>
                                <span id="team_id" class="name_input"></span>
                            </div>
                            <div class="input-field">
                                <span class="name">队伍名称 :</span>
                                <span id="preview_team_name" class="name_input"></span>
                            </div>
                            <div class="input-field">
                                <span class="name">赛事项目 :</span>
                                <span id="preview_competition_name" class="name_input"></span>
                            </div>
                            <div class="input-field">
                                <span class="name"></span>
                                <span id="preview_competition_type" class="name_input"></span>
                            </div>
                            <div class="input-field">
                                <span class="name">组别 :</span>
                                <span id="preview_competition_group" class="name_input"></span>
                            </div>
                            <div class="input-field">
                                <span class="name">备注 :</span>
                                <span id="preview_remarks" class="name_input"></span>
                            </div>
                        </div>
                        <div class="all_number">
                            <span class="leader_title">队员信息</span>
                            <div class="team_number" id="preview_member">

                            </div>
                        </div>
                        <div class="pays clearfix" id="pays">
                            <span class="leader_title">开票信息</span>
                            <div class="cut"></div>
                            <span class="name">发票抬头 :</span>
                            <span id="preview_invoice_title" class="name_input"></span>
                            <div class="clearfix clear"></div>
                            <span class="name">信用代码 :</span>
                            <span id="preview_invoice_code" class="name_input"></span>
                            <div class="clearfix clear"></div>
                            <span class="name">开票金额 :</span>
                            <span id="preview_invoice_money" class="name_input"></span>
                            <div class="clearfix clear"></div>
                            <span class="name">开票明细 :</span>
                            <span id="preview_invoice_type" class="name_input"></span>
                            <div class="clearfix clear"></div>
                            <span class="name">收件地址 :</span>
                            <span id="preview_invoice_mail_address" class="name_input"></span>
                            <div class="clearfix clear"></div>
                            <span class="name">联系人姓名</span>
                            <span id="preview_invoice_mail_recipients" class="name_input"></span>
                            <div class="clearfix clear"></div>
                            <span class="name">联系人电话</span>
                            <span id="preview_invoice_mail_mobile" class="name_input"></span>
                            <div class="clearfix clear"></div>
                            <span class="name">E-mail</span>
                            <span id="preview_invoice_mail_email" class="name_input"></span>
                            <div class="clearfix clear"></div>
                            <span class="name">备注</span>
                            <span id="preview_invoice_remark" class="name_input"></span>
                            <div class="clearfix clear"></div>
                        </div>
                        <div id="code" class="clearfix">
                            <span class="input-label">验证码  :</span>
                            <!-- <input required name="verificationcode" id="verificationcode" tip-info="请输入您收到的验证码" class="code" type="text"> -->
                            <input name="verificationcode" data-type="required|verificationcode" id="verificationcode" class="code" type="text">
                            <a id="getverifycode" class="tel">获取手机验证码</a>

                            <div class="tips"></div>
                        </div>
                        <div class="clearfix"></div>
                        <button type="button" class="btn_pre">上一步</button>
                        <!-- <button type="submit" class="btn_next">确认提交</button> -->
                        <button type="button" id="getQrcode" class="btn_next">确认提交</button>
                        <input class="btn_next" id="submit" style="display: none;" type="submit" value="确认提交" />
                    </div>
                </div>
            </form>
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

                var errMsg = type == 'file' ? '照片不能为空！' : '不能为空！'
                $el.tipWarn(errMsg);
                return false;
            }

            if (datatype.indexOf('realname') !== -1 && !isName(val)) {
                $el.tipWarn('姓名不能是数字或特殊字符，请重新输入！');
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

            // 邀请码
            if (datatype.indexOf('invitecode') !== -1 && ! invitecodeCheck(val)) {
                $el.tipWarn('请您输入有效邀请码！');
                return false;
            }

            // 队名检测 :: BUG: 不知道问么
            if (datatype.indexOf('teamname') !== -1 && ! teamNameCheck(val)) {
                $el.tipWarn('您输入的队伍名已被占用,请输入其他名称！');
                return false;
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
            var nations = ["汉族","蒙古族","回族","藏族","维吾尔族","苗族","彝族","壮族","布依族","朝鲜族","满族","侗族","瑶族","白族","土家族", "哈尼族","哈萨克族","傣族","黎族","傈僳族","佤族","畲族","高山族","拉祜族","水族","东乡族","纳西族","景颇族","柯尔克孜族", "土族","达斡尔族","仫佬族","羌族","布朗族","撒拉族","毛南族","仡佬族","锡伯族","阿昌族","普米族","塔吉克族","怒族", "乌孜别克族", "俄罗斯族","鄂温克族","德昂族","保安族","裕固族","京族","塔塔尔族","独龙族","鄂伦春族","赫哲族","门巴族","珞巴族","基诺族"];

            return function(type = 'member') {
                var tmpl = $.templates("#tmpl_memberlist");
                var rawHtml = tmpl.render({
                    'index': addIndex,
                    'type': type,
                    'nations': nations
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

                if (studentCount >= 8) {
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
        function buildOptions(data) {
            // console.log('OPTION_DATA', data);
            var arr = [];
            for (key in data){
                arr.push(data[key]);
            }
            var tmpl = $.templates('#tmpl_competiton_options');
            return tmpl.render({'options': arr})
        };

        function getOptions(key = 0) {
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

        function fillOptions(level = 1, key = 0) {
            var options_data = getOptions(key);
            var options_html = buildOptions(options_data);

            // 更新下拉选项
            $('#competition_' + level).html(options_html);
            if (level < 3) {
                $('#competition_' + level).change();
            }
        }

        function buildPreview(type) {
            var container = type == 'member' ? '.teachers .person_data' : '.students .person_data';

            var resultHtml = '';
            $(container).each(function(){
                // console.log(this);

                var data = new Array();
                $(this).find('.input-field').each(function(){
                    var name = $(this).find('.input-label').html();
                    var $el_input = $(this).find('input, select').eq(0);
                    var value = '';
                    if ($el_input.is('select')) {
                        console.log('selec');
                        value = $el_input.find('option:selected').val();
                    } else if($el_input.attr('type') == 'radio') {
                        value = $(this).find('input:radio:checked').val();
                    } else if ($el_input.attr('type') == 'file') {
                        value = '图片';
                    } else {
                        value = $el_input.val();
                    }
                    data.push({
                        name: name,
                        value: value
                    })
                    console.log(name, value);
                });

                var tmpl = $.templates('#tmpl_preview_memberlist');
                resultHtml += tmpl.render({'datalist' : data});
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
                'invoice_mail_address',
                'invoice_mail_recipients',
                'invoice_mail_mobile',
                'invoice_mail_email',
                'invoice_remark',
            );

            for(i in idNames)
            {
                $el = $('#' + idNames[i]);
                var val = $el.val();
                if ($el.is('select')) {
                    val = $el.find('option:selected').val();
                }
                $('#preview_' + idNames[i]).html(val);
            }

            $('#preview_leader').html(buildPreview('leader'));
            $('#preview_member').html(buildPreview('member'));



        }



        // 提取联系人手机
        function getContactMobile() {
            var mobile = $('#contact_mobile').val() || '18511431517';
            return mobile;
        }

        $(function(){

            // 0. 报名须知
            $('#input-read').click(function (){
                if ($('#input-read').prop("checked") == false) {
                    $(this).addClass('disabled');
                    $('#btn-read').unbind('click');
                } else {
                    $(this).removeClass('disabled');
                    $('#btn-read').bind('click', function(event) {
                        $('.instructions').removeClass('active');
                        $('.content').addClass('active');
                    });;
                }
            });

            $('#btn-read').click(function (){
                $('.instructions').removeClass('active');
                $('.content').addClass('active');
            });

            // 1. 邀请码，联系人信息
            $('#invitecode').blur(function() {
                validField(this);
            });

            $('#add_contact').change(function() {
                var val = $(this).find('option:selected').val();
                if (val == 'yes') {
                    $('.add_contact').attr('required', true);
                    $('.add_contact').removeClass('disabled');
                    $('.add_contact').removeAttr('readonly');

                } else {
                    $('.add_contact').removeAttr('required');
                    $('.add_contact').addClass('disabled');
                    $('.add_contact').attr('readonly', true);
                }
            });

            // TODO: 用户可选择是否添加联系人

            // 2. 添加领队

            $('#add_teacher').click(function(event) {
                var count = getPersonCount('leader');
                if (count >= 2) {
                    console.warn('too many');
                    return;
                }

                addMemberList('leader');
            });

            // TODO: 添加按钮 DISABLED
            // TODO: 最大人数限制

            // 3. 赛项信息 加载比赛项目数据， 校验队伍名称
            $('#team_name').blur(function() {
                validField(this);
            });

            fillOptions();
            setTimeout(function(){
                $('#competition_1').change();
            }, 300);
            $('.select-box').change(function() {
                var level = $(this).attr('level');
                var key = $(this).find('option:selected').val();
                var next_level = parseInt(level) + 1;
                fillOptions(next_level, key);
            });



            // 4. 添加队员
            $('#add_student').click(function (){

                var count = getPersonCount('leader');
                if (count >= 8) {
                    console.warn('too many');
                    return;
                }
                addMemberList();
            });

            // TODO: 添加按钮 DISABLED
            // TODO: 最大人数限制

            // 5. 开票信息
            // TODO&MAYBE: 根据人数计算金额
            $('#invoice_type').change(function(){
                var selectedValue = $(this).find('option:selected').val();
                if (selectedValue == '发票') {
                    $('.invoice-group').attr('required', true);
                    $('.invoice-group').removeClass('disabled');
                    $('.invoice-group').removeAttr('readonly');
                } else if (selectedValue == '收据') {
                    $('.invoice-group').attr('required', true);
                    $('.invoice-group').removeClass('disabled');
                    $('.invoice-group').removeAttr('readonly');

                    $('#invoice_code').removeAttr('required');
                    $('#invoice_code').addClass('disabled');
                    $('#invoice_code').attr('readonly', ture);

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
                if(! partten.test(mobile)) {
                    return;
                }
                $('.verificationcode_box').addClass('active');
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
                            $('.verificationcode_box').removeClass('active');
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

            // 6.3 发送手机验证码
            $("#getQrcode").click(function() {
                var validcode = false;
                $.ajax({
                    type:"post",
                    url:"{{url('/verificationcode/verify')}}",
                    data:{"verificationcode": $('#verificationcode').val()},
                    async:false,
                    success:function(res) {
                        if (res.status == 0) {
                            validcode = true;

                            // 解决IE 8下部分时机提交不成功的问题
                            setTimeout(function() {

                                // IE 8 下无法提交的问题
                                $('#submit').trigger('click');
                                $('#submit').trigger('click');
                                $('#submit').trigger('click');
                                $('#submit').trigger('click');
                                $('#submit').trigger('click');
                                $('#submit').trigger('click');
                                $('#submit').trigger('click');
                            }, 100);
                        } else if (res.status == -1) {
                            validcode = false;
                            $('.codeError').addClass('active');
                        }
                    }
                });
                console.log('valid', validcode);
                return false;
            });

            // 6.4 点击取消输入验证码
            $('.verificationcode_box .no').click(function() {
                $('.verificationcode_box').removeClass('active');
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
                });

            }, function(index){
                if (index == 5) {
                    previewList();
                }
            });

            $('.btn_pre').click(function(){
                tabCenter.previous();
            });

            tabCenter.go(1);
            addMemberList('leader');




        });// end of $(function())



       </script>

    <script id="tmpl_memberlist" type="text/x-jsrender">
        <div class="clearfix person_data  @{{:type}}_list" id="member_list_@{{:index}}" data-index="@{{:index}}">
            <div class="delete"><i class="icon kenrobot ken-close"></i></div>
            <div class="input-field">
                <span class="input-label">姓名  :</span>
                <input data-type="realname" required tip-warn="" tip-info="仅支持英文、汉字" class="input-field-text name" id="@{{:type}}_@{{:index}}_name" name="@{{:type}}[@{{:index}}][name]" type="text" value="">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">性别  :</span>
                <input id="@{{:type}}_@{{:index}}_sex_man" class="input-radio man @{{:type}}_sex" type="radio" checked name="@{{:type}}[@{{:index}}][sex]" value="男"><span>男</span>
                <input id="@{{:type}}_@{{:index}}_sex_woman"  class="input-radio woman @{{:type}}_sex" type="radio" name="@{{:type}}[@{{:index}}][sex]" value="女"><span>女</span>
                <p id="@{{:type}}_@{{:index}}_sex"></p>
            </div>
            <div class="input-field">
                <span class="input-label">民族  :</span>
                <select id="@{{:type}}_@{{:index}}_nation" name="@{{:type}}[@{{:index}}][nation]" class="input-field-text">
                        <option value="请选择">请选择</option>
                        @{{for nations}}
                            <option value="@{{: #data}}"> @{{: #data}}</option>}
                        @{{/for}}
                </select>
                <input type="hidden" id="@{{:type}}_@{{:index}}_nation">
            </div>
            <div class="input-field">
                <span class="input-label">出生日期  :</span>
                <input required type="text" id="@{{:type}}_@{{:index}}_birthday" data-toggle="datepicker" class="input-field-text input-field-datetime"  name="@{{:type}}[@{{:index}}][birthday]" />
                <div class="tips"></div>
            </div>

            <div class="input-field">
                <span class="input-label">身高  :</span>
                <input data-type="height_cm" required tip-info="请填写真实的身高(cm为单位)" class="input-field-text"  id="@{{:type}}_@{{:index}}_height" type="text" name="@{{:type}}[@{{:index}}][height]" value="">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">学校  :</span>
                <input data-type="schoolname" required tip-info="请填写工作单位" class="input-field-text"  id="@{{:type}}_@{{:index}}_work_unit" type="text" name="@{{:type}}[@{{:index}}][work_unit]" value="">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">证件类型  :</span>
                <select name="@{{:type}}[@{{:index}}][ID_type]" class="input-field-text id_type">
                    <option value="身份证">身份证</option>
                    <option value="内地通行证">内地通行证</option>
                    <option value="台胞证">台胞证</option>
                    <option value="护照">护照</option>
                </select>
            </div>
            <div class="input-field">
                <span class="input-label">证件号码  :</span>
                <input tip-info="请填写证件号码" required class="input-field-text id_number" data-type="ID" id="@{{:type}}_@{{:index}}_ID_number" type="text" name="@{{:type}}[@{{:index}}][ID_number]" value="">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">户籍地址  :</span>
                <input data-type="schoolname" required tip-info="请填写户籍地址" class="input-field-text"  id="@{{:type}}_@{{:index}}_register_address" type="text" name="@{{:type}}[@{{:index}}][register_address]" value="">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">现居住详址  :</span>
                <input data-type="schoolname" required tip-info="请填写现居住详址" class="input-field-text"  id="@{{:type}}_@{{:index}}_home_address" type="text" name="@{{:type}}[@{{:index}}][home_address]" value="">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">手机号码  :</span>
                <input required data-type="mobile" tip-info="请填写正确的手机号码" class="input-field-text tel" id="@{{:type}}_@{{:index}}_tel" name="@{{:type}}[@{{:index}}][tel]" type="text" value="">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">邮箱  :</span>
                <input required data-type="email" tip-info="请按照正确的邮箱格式填写" class="input-field-text mail" id="@{{:type}}_@{{:index}}_mail" name="@{{:type}}[@{{:index}}][mail]" type="text" value="">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">备注  :</span>
                <input tip-info="请填写备注信息" class="input-field-text mail" id="@{{:type}}_@{{:index}}_remarks" name="@{{:type}}[@{{:index}}][remarks]" type="text" value="">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">照片  :</span>
                <div class="uploadBtn">上传照片 </div>
                <input tip-info="格式 PNG/JPG 文件大小 <= 2M" accept="image/jpeg,image/png" required name="@{{:type}}[@{{:index}}][pic]" id="@{{:type}}[@{{:index}}]_pic" type="file" class="uploadField @{{:type}}_pic"  onchange="picPreview(this, 'preview_@{{:index}}_@{{:type}}_pic')">
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

            <img id="" src="" >
        </div>
    </script>

    <script id="tmpl_competiton_options" type="text/x-jsrender">
        @{{for options}}
            <option value="@{{: id}}"> @{{: name}}</option>}
        @{{/for}}
    </script>
</body>
</html>
