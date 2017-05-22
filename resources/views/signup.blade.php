<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="x-ua-compatible" content="IE=9" >
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/signup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/kenrobot.css')}}">
    <!-- <script src="https://cdn.bootcss.com/jQuery-Validation-Engine/2.6.4/contrib/other-validations.js"></script> -->
</head>
<body>
    <div class="main">
        <div class="header">
            <div class="inner">
                <img src="{{ asset('assets/img/logo-white-word.png')}}" alt="">
                <div class="logout">
                    <span></span>
                </div>
            </div>
        </div>
        <div class="content">
            <form id="form" action="/signup" enctype="multipart/form-data" method="POST" novalidate>
                <div class="tab_menu">
                    <ul>
                        <li class="active">带队老师信息</li>
                        <li>队伍参赛信息</li>
                        <li>队员信息</li>
                        <li>缴费信息</li>
                        <li>信息确认</li>
                    </ul>
                </div>
                <div class="all_info clearfix">
                    <div class="active leader_info div_tab clearfix">
                        <div class="input-field">
                            <span class="input-label">邀请码  :</span>
                            <input required tip-warn="" tip-info="输入邀请码" class="input-field-text" id="invitecode" name="invitecode" type="text" value="{{old('invitecode')}}">
                            <input type="hidden" name="out_trade_no" id="out_trade_no">
                            <div class="tips"></div>
                        </div>
                        <div class="input-field">
                            <span class="input-label">姓名  :</span>
                            <input data-type="realname" required tip-warn="" tip-info="仅支持仅支持英文、汉字" class="input-field-text" id="leader_name" name="leader_name" type="text" value="{{old('leader_name')}}">
                            <div class="tips"></div>
                        </div>
                        <div class="input-field">
                            <span class="input-label">手机号码  :</span>
                            <input data-type="mobile" required tip-info="请填写您的常用手机" class="input-field-text"  id="leader_mobile" type="text" name="leader_mobile" value="{{old('leader_mobile')}}">
                            <div class="tips"></div>
                        </div>
                        <div class="input-field">
                            <span class="input-label">邮箱  :</span>
                            <input required data-type="email" tip-info="请按照正确的邮箱格式填写" class="input-field-text" id="leader_email" name="leader_email" type="text" value="{{old('leader_email')}}">
                            <div class="tips"></div>
                        </div>
                        <div class="input-field">
                            <span class="input-label">身份证号  :</span>
                            <input required data-type="ID" tip-info="仅支持仅支持数字以及个别英文" class="input-field-text" id="leader_id" name="leader_id" type="text" value="{{old('leader_id')}}">
                            <div class="tips"></div>
                        </div>

                        <div class="input-field">
                            <span class="input-label">性别  :</span>
                            <input class="input-radio man" type="radio" name="leader_sex" @if(old('leader_sex') == '' || old('leader_sex') == '男') checked="checked" @endif value="男"><span>男</span>
                            <input class="input-radio woman" type="radio" name="leader_sex"  @if(old('leader_sex') == '女') checked="checked" @endif value="女"><span>女</span>
                        </div>
                        <div class="input-field">
                            <span class="input-label">带队老师照片  :</span>
                            <div class="uploadBtn">上传图片 </div>
                            <input type="file" data-picurl="{{session('leader_pic_preview')}}" tip-info="格式 PNG/JPG 文件大小 <= 2M" accept="image/jpeg,image/png" required name="leader_pic" id="leader_pic" class="inputstyle" value=''>
                            <div class="tips"></div>
                            <span class="file_name" id="file_name">{{session('leader_pic_filename')}}</span>
                        </div>
                        <button type="button" class="btn_next" id="leader_info_btn">下一步</button>
                    </div>
                    <div class="ranks_info div_tab">
                        <div class="input-field">
                            <span class="input-label">队伍名称  :</span>
                            <input data-type="schoolname" required tip-warn="" tip-info="请出入您队伍的名称" class="input-field-text" id="team_name" name="team_name" type="text" value="{{old('team_name')}}">
                            <div class="tips"></div>
                        </div>
                        <div class="input-field">
                            <span class="input-label">学校/单位名称  :</span>
                            <input data-type="schoolname" required tip-warn="" tip-info="仅支持汉字、英文、数字"  class="input-field-text" id="school_name" name="school_name" type="text" value="{{old('school_name')}}">
                            <div class="tips"></div>
                        </div>
                        <div class="input-field">
                            <span class="input-label">学校/单位地址  :</span>
                            <input data-type="schoolname" required tip-warn="" tip-info="仅支持汉字、英文、数字" class="input-field-text" id="school_address" name="school_address" type="text" value="{{old('school_address')}}">
                            <div class="tips"></div>
                        </div>
                        <div class="input-field">
                            <span class="input-label">赛事项目  :</span>
                            ‍‍<select id="competition_type" name="competition_type">
                                @foreach ($competition_types as $value => $text)
                                <option value="{{$value}}" @if(old('competition_type') == $value) selected @endif >{{$text}}</a>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-field">
                            <span class="input-label">组别  :</span>
                            ‍‍<select id="competition_group" name="competition_group">
                                @foreach ($competition_groups as $value => $text)
                                <option value="{{$value}}" @if(old('competition_group') == $value) selected @endif >{{$text}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="button" class="btn_pre">上一步</button>
                        <button id="checkTeamName" type="button" class="btn_next">下一步</button>
                    </div>
                    <div class="append_rank div_tab">
                        <?php $i = 0 ?>
                        @foreach((array)old('members') as $member)
                        <div class="menber_list">
                            <!-- <div class="delete"><i class="icon kenrobot ken-close"></i></div> -->
                            <div class="input-field">
                                <span class="input-label">队员姓名{{$i}}:</span>
                                <input data-type="realname" required tip-info="仅支持仅支持汉字、英文" name="members[{{$i}}][name]" class="input-field-text member_name" type="text" value="{{$member['name']}}">
                                <div class="tips"></div>
                            </div>
                            <div class="input-field">
                                <span class="input-label">身份证号  :</span>
                                <input data-type="ID" required data-type="ID" tip-info="请输入合法的身份证号格式" name="members[{{$i}}][ID]" class="input-field-text member_id" type="text" value="{{$member['ID']}}">
                                <div class="tips"></div>
                            </div>
                            <div class="input-field">
                                <span class="input-label">手机号码  :</span>
                                <input data-type="mobile" required tip-info="仅支持仅支持英文、数字、下划线" name="members[{{$i}}][mobile]" class="input-field-text member_mobile" type="text" value="{{$member['mobile']}}">
                                <div class="tips"></div>
                            </div>
                            <div class="input-field">
                                <span class="input-label">年龄  :</span>
                                <input required tip-warn="" tip-info="仅支持数字" name="members[{{$i}}][age]" class="input-field-text member_age" type="text" value="{{$member['age']}}">
                                <div class="tips"></div>
                            </div>
                            <div class="input-field">
                                <span class="input-label">性别  :</span>
                                <input name="members[{{$i}}][sex]" class="input-radio man member_sex" type="radio" checked="checked" name="sex" @if($member['sex'] == '' || $member['sex'] == '男') checked="checked" @endif value="男"><span>男</span>
                                <input name="members[{{$i}}][sex]" class="input-radio woman member_sex" type="radio" name="sex" @if($member['sex'] == '女') checked="checked" @endif value="女"><span>女</span>
                            </div>
                            <div class="input-field">
                                <span class="input-label">队员身高  :</span>
                                <input required tip-warn="" tip-info="仅支持数字,以厘米为单位" name="members[{{$i}}][height]" class="input-field-text member_age" type="text" value="{{$member['height']}}">
                                <div class="tips"></div>
                            </div>
                            <div class="input-field">
                                <span class="input-label">学校/单位名称  :</span>
                                <input required tip-warn="" tip-info="仅支持汉字"  name="members[{{$i}}][school_name]" class="input-field-text member_school_name" type="text" value="{{$member['school_name']}}">
                                <div class="tips"></div>
                            </div>
                            <div class="input-field">
                                <span class="input-label">学校/单位地址  :</span>
                                <input required tip-warn="" tip-info="仅支持汉字" name="members[{{$i}}][school_address]" class="input-field-text member_school_address" type="text" value="{{$member['school_address']}}">
                                <div class="tips"></div>
                            </div>
                            <div class="input-field">
                                <span class="input-label">队员照片  :</span>
                                <div class="uploadBtn">上传图片</div>
                                <input name="members[{{$i}}][pic]" data-picurl="{{session('members_data')[$i]['pic']}}" type="file" class="inputstyle member_pic">
                                <span class="file_name">{{session('leader_pic_filename')}}</span>
                            </div>
                            <div class="cut"></div>
                        </div>
                        <?php $i++ ?>
                        @endforeach

                        <button type="button" class="btn_new" id="append_rank_new">添加新成员</button>
                        <button type="button" class="btn_pre">上一步</button>
                        <button type="button" class="btn_next">下一步</button>
                    </div>
                    <div class="payment div_tab">
                        <div class="input-field">
                            <span class="input-label">缴费方式:</span>
                            <input class="input-radio man" type="radio" name="payment" checked="checked" value="在线支付"><span>在线支付(仅支持支付宝)</span>
                            <input class="input-radio woman" type="radio" name="payment" disabled value="现场缴费"><span style="color: #ccc" >现场缴费(暂不支持)</span>
                        </div>
                        <button type="button" class="btn_pre">上一步</button>
                        <button type="button" class="btn_next">下一步</button>
                    </div>
                    <div class="team_info div_tab">
                        <div class="leader" id="leader">
                            <span class="leader_title">带队老师信息</span>
                            <div class="cut"></div>
                            <div class="input-field">
                                <span class="name">真实姓名 :</span>
                                <span  id="preview_leader_name" class="name_input" ></span>
                            </div>
                            <div class="input-field">
                                <span class="name">身份证号 :</span>
                                <span  id="preview_leader_id" class="name_input"></span>
                            </div>
                            <div class="input-field">
                                <span class="name">邮箱 :</span>
                                <span  id="preview_leader_email" class="name_input"></span>
                            </div>
                            <div class="input-field">
                                <span  class="name">手机号 :</span>
                                <span id="preview_leader_mobile" class="name_input"></span>
                            </div>
                            <div class="input-field">
                                <span  class="name">性别 :</span>
                                <span id="preview_leader_sex" class="name_input"></span>
                            </div>
                            <img id="preview_leader_pic" src="" >
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
                                <span class="name">学校/单位名称 :</span>
                                <span id="preview_school_name" class="name_input"></span>
                            </div>
                            <div class="input-field">
                                <span class="name">学校/单位地址 :</span>
                                <span id="preview_school_address" class="name_input"></span>
                            </div>
                            <div class="input-field">
                                <span class="name">赛事项目 :</span>
                                <span id="preview_competition_type" class="name_input"></span>
                            </div>
                            <div class="input-field">
                                <span class="name">组别 :</span>
                                <span id="preview_competition_group" class="name_input"></span>
                            </div>
                        </div>
                        <div class="all_number">
                            <span class="leader_title">队员信息</span>
                            <div class="team_number" id="number">
                                @for($i = 0; $i< 10; $i++)
                                <div id="member_info_{{$i}}" class="member_info" style="display: none;">
                                    <div class="cut"></div>
                                    <div class="input-field">
                                        <span class="name">队员姓名 :</span>
                                        <span data-type="realname" id="{{'preview_'.$i.'_member_name'}}" class="name_input"></span>
                                    </div>
                                    <div class="input-field">
                                        <span class="name">身份证 :</span>
                                        <span id="{{'preview_'.$i.'_member_id'}}" class="name_input"></span>
                                    </div>
                                    <div class="input-field">
                                        <span data-type="mobile" class="name">手机号 :</span>
                                        <span id="{{'preview_'.$i.'_member_mobile'}}" class="name_input"></span>
                                    </div>
                                    <div class="input-field">
                                        <span class="name">性别 :</span>
                                        <span id="{{'preview_'.$i.'_member_sex'}}" class="name_input"></span>
                                    </div>
                                    <div class="input-field">
                                        <span class="name">年龄 :</span>
                                        <span id="{{'preview_'.$i.'_member_age'}}" class="name_input"></span>
                                    </div>
                                    <div class="input-field">
                                        <span class="name">学校/单位名称 :</span>
                                        <span id="{{'preview_'.$i.'_member_school_name'}}" class="name_input"></span>
                                    </div>
                                    <div class="input-field">
                                        <span class="name" style="margin-bottom: 30px;">学校/单位地址 :</span>
                                        <span id="{{'preview_'.$i.'_member_school_address'}}" class="name_input"></span>
                                    </div>
                                    <img id="{{'preview_'.$i.'_member_pic'}}" src="" >
                                </div>
                                @endfor

                            </div>
                        </div>
                        <div class="pays clearfix" id="pays">
                            <span class="leader_title">缴费信息</span>
                            <div class="cut"></div>
                            <span class="name">支付方式 :</span>
                            <span id="preview_payment" class="name_input" ></span>
                        </div>
                        <div id="code" class="clearfix">
                            <span class="input-label">验证码  :</span>
                            <!-- <input required name="verificationcode" id="verificationcode" tip-info="请输入您收到的验证码" class="code" type="text"> -->
                            <input name="verificationcode" id="verificationcode" class="code" type="text">
                            <div class="tips"></div>
                        </div>
                        <a id="tel" class="tel">获取手机验证码</a>
                        <div class="clearfix"></div>
                        <button type="button" class="btn_pre">上一步</button>
                        <button type="button" id="getQrcode" class="btn_next">确认提交</button>
                        <button class="btn_next" id="submit"></button>
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
                <span class="tipes-false">您输入的手机号码或者验证码有误,请重新输入!!!</span>
                <img src="{{url('/captcha')}}">
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
        <div class="QRcodeShow">
            <div class="QEbox">
                <div class="zhifubao"></div>
                <span class="payment">扫码支付</span>
                <span class="money">￥199</span>
                <div class="QEcode">
                    <img src="" />
                </div>
                <span class="method">使用【支付宝】钱包扫描交易付款二维码</span>
                <p class="tips">Tips：支付完成前，请不要关闭页面</p>
            </div>
        </div>

    </div>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript">
    function isIE(){
        if (window.navigator.userAgent.indexOf("MSIE")>=1) {
            // console.log("true")
        }
        else{
            // console.log("false")
        }
    }
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
            else {
                if (isIE()) {
                    var fileObj = document.getElementById($el.prop('id'));
                    if (fileObj) {
                        var f = fileObj.files[0];
                        if (f) {
                            if (f.size > 2 * 1024 * 1024) {
                                $el.tipWarn('文件大小不能超过2M！');
                                return false;
                            }
                        }
                    }
                } else {
                    // return false;
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
    // 切换显示页面
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
        // 获取文件信息 IE 也可以获取该文件名称
        $("input[type=file]").unbind('change').change(function(){
            validField(this);
            $(this).siblings('.file_name').html('');
            var f = $(this).prop('files')[0];
            if(f)
            {
                // console.log(f.name);
                // console.dir($(this));
                // $(this).val(f.name);
                $(this).siblings('.file_name').html(f.name);
            }
         });
        // 添加删除按钮
        $('.append_rank .menber_list .delete').click(function(){
            $(this).parent('.menber_list').remove();
        })
        //上传 队员照片
        $('.uploadBtn').unbind('click').click(function() {
            $(this).siblings('.inputstyle').click();
        });
        // 校验邀请码是否重复
        $("#invitecode").unbind('blur').blur(function() {
            let str0 = '<span class="useable"><i class="icon kenrobot ken-check"></i></span>';
            let str1 = '<span class="unuse">请您输入有效邀请码!</span>';
            // let str2 = '<span class="unuse">邀请码信息不能为空</span>';
            $.post("{{url('/checkinvitecode')}}",{
                invitecode: $('#invitecode').val()
            }, function(res) {
                if (res.status == 0) {
                    $('#invitecode').siblings('.tips').html(str0);
                    $('#leader_info_btn').css('pointer-events', 'auto');
                    $('#leader_info_btn').css('backgroundColor', '#587BEF');
                } else if (res.status == 1) {
                    $('#invitecode').siblings('.tips').html(str1);
                    $('#leader_info_btn').css('pointer-events', 'none');
                    $('#leader_info_btn').css('backgroundColor', '#ccc');
                }
            });
        });
        // 校验队伍名称
        $("#team_name").unbind('blur').blur(function() {
            let str0 = '<span class="useable"><i class="icon kenrobot ken-check"></i></span>';
            let str1 = '<span class="unuse">您输入的队伍名已被占用,请输入其他名称!</span>';
            let str2 = '<span class="unuse">队伍名不能为空</span>';
            $.post("{{url('/checkteamname')}}",{
                team_name: $('#team_name').val()
            }, function(res) {
                if (res.status == 0) {
                    $('#team_name').siblings('.tips').html(str0);
                    $('#checkTeamName').css('pointer-events', 'auto');
                } else if (res.status == 1) {
                    $('#team_name').siblings('.tips').html(str1);
                    $('#checkTeamName').css('pointer-events', 'none');
                } else if (res.status == 2) {
                    $('#team_name').siblings('.tips').html(str2);
                    $('#checkTeamName').css('pointer-events', 'none');
                }
            });
        });
        // 校验验证码
        $("#getQrcode").unbind('click').click(function() {
            var validcode = false;
            $.ajax({
                type:"post",
                url:"{{url('/verificationcode/verify')}}",
                data:{"verificationcode": $('#verificationcode').val()},
                async:false,
                success:function(res) {
                    if (res.status == 0) {
                        console.log('通过验证');
                        $('.QRcodeShow').addClass('active');
                        getPayQrcode();
                        validcode = true;
                    } else if (res.status == -1) {
                        $('.codeError').addClass('active');
                        validcode = false;
                    }
                }
            });
            // console.log('valid', validcode);
            return false;
        });
        $('.codeError .close').unbind('click').click(function() {
            $('.codeError').removeClass('active');
        });
    }
    // 更新预览界面
    function updatePreview() {
        $('input,select').each(function(){
            var type = $(this).prop('type');
            var id = $(this).prop('id');
            var name = $(this).prop('name');
            var val = $(this).val();
            if (type == 'select-one') {
                val = $('#'+id+' option:selected').val();
            }
            if (type == 'text' || type == 'select-one') {
                $('#preview_' + id).html(val);
            }
            if (type == 'radio') {
                var chkVal = $('input:radio[name="'+name+'"]:checked').val();
                $('#preview_' + name).html(chkVal);
            }
            // 默认填写图片文件的路径
            if (type == 'file') {
                if (isIE()) {
                }else {
                    var fileObj = document.getElementById(id);
                    if (fileObj) {
                        var f = fileObj.files[0];
                        if(f){
                            $('#preview_'+id).attr('src', URL.createObjectURL(f));
                        }
                    }
                }
            }
        });
        $('.append_rank > .menber_list').each(function(index){
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
                // console.log(preview_el);
                // console.log(val);
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
    $(function(){
        // 默认添加一次队员列表
        setTimeout(function (){
            if ($('.append_rank .menber_list').length > 0) {
                // console.log(1);
            } else {
                // console.log(0);
                $('#append_rank_new').click();
            }
        }, 1000)
        // 点击刷新验证码图片
        $('.identifying .showBox img').click(function (){
            $(this).refreshCaptcha();
        });
        // 点击取消输入验证码
        $('.identifying .no').click(function() {
            $('.identifying').removeClass('active');
        });
        $('#v_code').click(function(event) {
            $('.tipes-false').css('opacity', 0);
        });
        // 点击确认输入验证码
        $('.identifying .yes').click(function() {
            // $('.identifying').removeClass('active');
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
                        // console.log('验证码填写成功并确定')
                        refresh_captcha();
                        $('.identifying').removeClass('active');
                        countdown();
                    } else {
                        // console.log('验证码填写错误')
                        $('.tipes-false').css('opacity', 1);
                    }
                }
            );
        });
        //更新表单验证绑定
        $('#append_rank_new').click(function (){
            addMemberList();
            $('.delete').eq(0).css('display', 'none');
        })
        var memberListNum = 1;
        // 添加成员列表
        function addMemberList(){
            var memberList = '';
            memberList += '<div class="menber_list">';
            // memberList += '<div class="delete"><i class="icon kenrobot ken-close"></i></div>';
            memberList += '<div class="input-field">';
            memberList += '<span class="input-label">队员姓名('+ memberListNum +'):</span>';
            memberList += '<input data-type="realname" required tip-info="仅支持仅支持汉字、英文" name="members['+memberListNum+'][name]" class="input-field-text member_name" type="text">';
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
            memberList += '<input data-type="mobile" required tip-info="仅支持仅支持英文、数字、下划线" name="members['+memberListNum+'][mobile]" class="input-field-text member_mobile" type="text">';
            memberList += '<div class="tips"></div>';
            memberList += '<div class="clearfix"></div>';
            memberList += '</div>';

            memberList += '<div class="input-field">';
            memberList += '<span class="input-label">年龄  :</span>';
            memberList += '<input data-type="agemenber" required tip-warn="" tip-info="仅支持数字" name="members['+memberListNum+'][age]" class="input-field-text member_age" type="text">';
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
            memberList += '<span class="input-label">队员身高  :</span>';
            memberList += '<input data-type="agemenber" required tip-warn="" tip-info="仅支持数字,以厘米为单位"  name="members['+memberListNum+'][height]" class="input-field-text" type="text">';
            memberList += '<div class="tips"></div>';
            memberList += '<div class="clearfix"></div>';
            memberList += '</div>';

            memberList += '<div class="input-field">';
            memberList += '<span class="input-label">学校/单位名称  :</span>';
            memberList += '<input data-type="schoolname" required tip-warn="" tip-info="可以输入汉字，英文，数字"  name="members['+memberListNum+'][school_name]" class="input-field-text member_school_name" type="text">';
            memberList += '<div class="tips"></div>';
            memberList += '<div class="clearfix"></div>';
            memberList += '</div>';
            memberList += '<div class="input-field">';
            memberList += '<span data-type="schoolname" class="input-label">学校/单位地址  :</span>';
            memberList += '<input required tip-warn="" tip-info="可以输入汉字，英文，数字" name="members['+memberListNum+'][school_address]" class="input-field-text member_school_address" type="text">';
            memberList += '<div class="tips"></div>';
            memberList += '<div class="clearfix"></div>';
            memberList += '</div>';
            memberList += '<div class="input-field">';
            memberList += '<span class="input-label">队员照片  :</span>';
            memberList += '<div class="uploadBtn">上传图片</div>';
            memberList += '<input tip-info="格式 PNG/JPG 文件大小 <= 2M" accept="image/jpeg,image/png" required name="members['+memberListNum+'][pic]" id="" type="file" class="inputstyle member_pic">';
            memberList += '<div class="tips"></div>';
            memberList += '<span class="file_name">{{session("leader_pic_filename")}}</span>';
            memberList += '<div class="clearfix"></div>';
            memberList += '<div class="cut"></div>';
            memberList += '</div>';
            $('.append_rank').append(memberList);
            rebindVlidation();
            memberListNum +=1;
        }
        var tabIndex = 0;
        // 点击切换 进行下一步
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
            }
            showTab(tabIndex);
        });
        // 返回上一步
        $('.btn_pre').click(function(){
            tabIndex -=1;
            showTab(tabIndex);
        });
        @if(old('leader_sex'))
        $('input').each(function(){
            validField(this);
        });
        @endif
        showTab(tabIndex);
        rebindVlidation();
    })
    // 发送手机验证码
    $('#tel').click(function() {
        var partten = /^1[3,5,8]\d{9}$/;
        if(partten.test($('#leader_mobile').val())){
           $('.identifying').addClass('active');
           $('#tipes i').html($('#leader_mobile').val());
           // countdown();
        }else {
           // console.log('格式错误');
        }
    });
    // IE有关的判断;
    $('.falseCodeAlert').click(function(){
        $(this).css('display', 'none');
    })
    // 获取支付二维码
    function getPayQrcode (){
        var validcode = false;
        $.ajax({
            type: "post",
            url: "{{url('/getpayqrcode')}}",
            data: {
                invitecode: $('#invitecode').val()
            },
            async: false,
            success: function (res) {
                var outTradeNo = 0;
                if (res.status == 0) {
                    console.log(res);
                    $(".QRcodeShow .QEbox .QEcode img").attr('src', res.data.qrcodeimgurl);
                    outTradeNo = res.data.out_trade_no;
                    $('#out_trade_no').val(outTradeNo);
                    console.log(outTradeNo)
                    validcode = true;
                    if (outTradeNo != null) {
                        console.log(outTradeNo);
                        RefreshQrcode(outTradeNo);
                    }else {
                        console.log('未获取到out_trade_no')
                    }
                } else if (res.status == -1) {
                    console.log(res);
                    validcode = false;
                }
            }
        });
    }
    // 轮询
    function RefreshQrcode(outTradeNo){
        var Qrcode = false;
        var timer = setInterval(function (){
            $.ajax({
                type: "post",
                url: "{{url('/pay/queryorder')}}",
                data: {
                    "out_trade_no": outTradeNo
                },
                async: false,
                success: function(res) {
                    if (res.status == 0) {
                        console.log(res);   //支付成功
                        $('#submit').click();
                        clearTimeout(timer);
                        Qrcode = true;
                    } else if (res.status == 1) {
                        console.log(res);
                        Qrcode = false;
                    }
                }
            });
        }, 2000)

    }
</script>
</body>
</html>
