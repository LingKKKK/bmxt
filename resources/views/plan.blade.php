<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plan.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lqdatetimepick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/kenrobot.css')}}">
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js')}}"></script>
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
        <div class="instructions clearfix active">
            <h2 class="instructions-h">行程系统需求</h2>
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
        <div class="content">
            <form id="form" name="form" action="/plan" onkeydown="if(event.keyCode==13)return false;" enctype="multipart/form-data" method="POST" novalidate>
                <div class="all_info clearfix">
                    <div class="div_tab" id="base">
                        <span class="leader_title">基本信息</span>
                        <div class="cut"></div>
                        <span class="name">队伍编号 :</span>
                        <!-- <span id="preview_team_id" class="name_input">{{$signdata['team_no'] or ''}}</span> -->
                        <input class="name_input" name="team_no" type="text" value="{{$signdata['team_no'] or ''}}">
                        <div class="clearfix clear"></div>
                        <span class="name">队伍名称 :</span>
                        <input class="name_input" name="team_name" type="text" value="{{$signdata['team_name'] or ''}}">
                        <div class="clearfix clear"></div>
                        <span class="name">赛事项目 :</span>
                        <input class="name_input" id="preview_competition_name" name="competition_name" type="text" value="{{$signdata['competition_name'] or ''}}">
                        <div class="clearfix clear"></div>
                        <span class="name">子赛项 :</span>
                        <input class="name_input" id="preview_competition_type" name="competition_type" type="text" value="{{$signdata['competition_type'] or ''}}">
                        <div class="clearfix clear"></div>
                        <span class="name">组别 :</span>
                        <input class="name_input" id="preview_competiton_group" name="competition_group" type="text" value="{{$signdata['competition_group'] or ''}}">
                        <div class="clearfix clear"></div>
                        <span class="name">领队姓名 :</span>
                        <input class="name_input" name="leader_name" type="text" value="{{$signdata['leader_name'] or ''}}">
                        <div class="clearfix clear"></div>
                        <span class="name">手机号 :</span>
                        <input class="name_input" id="leader_mobiles" name="leader_mobile" type="text" value="{{$signdata['leader_mobile'] or ''}}">
                        <input type="text">
                        <div class="clearfix clear"></div>
                    </div>
                    <?php $i = 0; ?>
                    @foreach($trip_data as $val)
                        @if($val['trip_type'] == '到达')
                            <div class="div_tab" id="back_{{$i+1}}">
                                <span class="leader_title">出发信息表</span>
                                <div class="delete"><i class="icon kenrobot ken-close"></i></div>
                                <div class="cut"></div>
                                <div class="input-field" style="margin-top: 30px;">
                                    <input type="hidden" name="trip[{{$i}}][id]" value="{{$val['id'] or ''}}">
                                    <input id="trip[{{$i}}][trip_type]" style="display:none;" name="trip[{{$i}}][trip_type]" type="text" value="到达" />
                                    <span class="input-label">交通工具  :</span>
                                    <select id="trip[{{$i}}][vehicle_type]" name="trip[{{$i}}][vehicle_type]" class="input-field-text" onclick="vehicleChange($(this))">
                                        <option value="{{$val['vehicle_type'] or ''}}" selected >{{$val['vehicle_type'] or ''}}</option>
                                        <option value="飞机" >飞机</option>
                                    </select>
                                </div>
                                <div class="input-field">
                                    <span class="input-label">航班/车次  :</span>
                                    <input data-type="Alltype" required tip-warn="不能为空" tip-warn="" tip-info="输入您的航班/车次" class="input-field-text" id="trip[{{$i}}][vehicle_number]" name="trip[{{$i}}][vehicle_number]" type="text" value="{{$val['vehicle_number'] or ''}}">
                                    <div class="tips"></div>
                                </div>
                                <div class="input-field">
                                    <span class="input-label">出发日期  :</span>
                                    <input required tip-warn="不能为空" tip-warn="" tip-info="输入出发日期" type="text" name="trip[{{$i}}][start_date]" id="datetimepicker{{$i*5+1}}" class="input-field-text" value="{{$val['start_date'] or ''}}"/>
                                    <div class="tips"></div>
                                </div>
                                <div class="input-field">
                                    <span class="input-label">出发时间  :</span>
                                    <input required tip-warn="不能为空" tip-warn="" tip-info="输入出发时间" type="text" name="trip[{{$i}}][start_time]" id="datetimepicker{{$i*5+2}}" class="input-field-text" value="{{$val['start_time'] or ''}}"/>
                                    <div class="tips"></div>
                                </div>
                                <div class="input-field">
                                    <span class="input-label">到达日期  :</span>
                                    <input required tip-warn="不能为空" tip-warn="" tip-info="输入到达日期" type="text" name="trip[{{$i}}][arrive_date]" id="datetimepicker{{$i*5+3}}" class="input-field-text" value="{{$val['arrive_date'] or ''}}"/>
                                    <div class="tips"></div>
                                </div>
                                <div class="input-field">
                                    <span class="input-label">到达时间  :</span>
                                    <input required tip-warn="不能为空" tip-warn="" tip-info="输入到达时间" type="text" name="trip[{{$i}}][arrive_time]" id="datetimepicker{{$i*5+4}}" class="input-field-text" value="{{$val['arrive_time'] or ''}}"/>
                                    <div class="tips"></div>
                                </div>
                                <div class="input-field">
                                    <span class="input-label">到达地点  :</span>
                                    <select id="trip[{{$i}}][arrive_place]" name="trip[{{$i}}][arrive_place]" class="input-field-text" onclick="stateChange($(this));">
                                        <option value="{{$val['arrive_place'] or ''}}" selected >{{$val['arrive_place'] or ''}}</option>
                                        <option value="汉口火车站" >汉口火车站</option>
                                        <option value="武昌火车站" >武昌火车站</option>
                                    </select>
                                    <div class="tips"></div>
                                </div>
                                <div class="input-field">
                                    <span class="input-label">人数  :</span>
                                    <input data-type="isNumber" required  required tip-warn="不能为空" tip-warn="" tip-info="请输入人数"  type="text" name="trip[{{$i}}][people_number]" id="trip[{{$i}}][people_number]" class="input-field-text" value="{{$val['people_number'] or ''}}"/>
                                    <div class="tips"></div>
                                </div>
                                <div class="input-field">
                                    <span class="input-label">联系人  :</span>
                                    <input data-type="character" required tip-warn="" tip-info="仅支持英文、汉字" class="input-field-text" id="trip[{{$i}}][contact_name]" name="trip[{{$i}}][contact_name]" type="text" value="{{$val['contact_name'] or ''}}">
                                    <div class="tips"></div>
                                </div>
                                <div class="input-field">
                                    <span class="input-label">联系电话  :</span>
                                    <input data-type="mobile" required tip-info="请填写您的常用手机" class="input-field-text"  id="trip[{{$i}}][contact_mobile]" type="text" name="trip[{{$i}}][contact_mobile]" value="{{$val['contact_mobile'] or ''}}">
                                    <div class="tips"></div>
                                </div>
                                <button type="button" class="btn_next Btn_come">添加出发信息</button>
                            </div>
                            <?php $i++ ?>
                        @endif
                    @endforeach

                    <?php $i = 2; ?>
                    @foreach($trip_data as $val)
                        @if($val['trip_type'] == '返程')
                            <div class="div_tab" id="back_{{$i+1}}">
                                <span class="leader_title">返回信息表</span>
                                <div class="cut"></div>
                                <div class="delete"><i class="icon kenrobot ken-close"></i></div>
                                <div class="input-field" style="margin-top: 30px;">
                                    <input type="hidden" name="trip[{{$i}}][id]" value="{{$val['id'] or ''}}">
                                    <input style="display:none;" name="trip[{{$i}}][trip_type]" type="text" value="返程" />
                                    <span class="input-label">交通工具  :</span>
                                    <select id="trip[{{$i}}][vehicle_type]" name="trip[{{$i}}][vehicle_type]" class="input-field-text" onclick="vehicleChange($(this))">
                                        <option value="{{$val['vehicle_type'] or ''}}" selected >{{$val['vehicle_type'] or ''}}</option>
                                        <option value="飞机" >飞机</option>
                                    </select>
                                    <div class="tips"></div>
                                </div>
                                <div class="input-field">
                                    <span class="input-label">航班/车次  :</span>
                                    <input  data-type="Alltype" required tip-warn="不能为空" tip-warn="" tip-info="输入您的航班/车次" class="input-field-text" id="trip[{{$i}}][vehicle_number]" name="trip[{{$i}}][vehicle_number]" type="text" value="{{$val['vehicle_number'] or ''}}">
                                    <div class="tips"></div>
                                </div>
                                <div class="input-field">
                                    <span class="input-label">出发日期  :</span>
                                    <input required type="text" name="trip[{{$i}}][start_date]" id="datetimepicker{{$i*5+1}}" class="input-field-text" value="{{$val['start_date'] or ''}}"/>
                                    <div class="tips"></div>
                                </div>
                                <div class="input-field">
                                    <span class="input-label">出发时间  :</span>
                                    <input required type="text" name="trip[{{$i}}][start_time]" id="datetimepicker{{$i*5+2}}" class="input-field-text" value="{{$val['start_time'] or ''}}"/>
                                    <div class="tips"></div>
                                </div>
                                <div class="input-field">
                                    <span class="input-label">出发地点  :</span>
                                    <select id="trip[{{$i}}][start_place]" name="trip[{{$i}}][start_place]" class="input-field-text" onclick="hotelChange($(this))">
                                        <option value="{{$val['start_place'] or ''}}" selected >{{$val['start_place'] or ''}}</option>
                                        <option value="武汉碧桂园凤凰酒店" >武汉碧桂园凤凰酒店</option>
                                        <option value="武汉豪生国际酒店" >武汉豪生国际酒店</option>
                                        <option value="湖北中核国际酒店" >湖北中核国际酒店</option>
                                        <option value="武汉明德酒店" >武汉明德酒店</option>
                                        <option value="武汉联投半岛酒店" >武汉联投半岛酒店</option>
                                    </select>
                                    <div class="tips"></div>
                                </div>
                                <div class="input-field">
                                    <span class="input-label">起飞/发车时间  :</span>
                                    <input required type="text" name="trip[{{$i}}][vehicle_time]" id="datetimepicker{{$i*5+3}}" class="input-field-text" value="{{$val['vehicle_time'] or ''}}"/>
                                    <div class="tips"></div>
                                </div>
                                <div class="input-field">
                                    <span class="input-label">人数  :</span>
                                    <input data-type="isNumber" required tip-warn="不能为空!" tip-info="请输入人数" type="text" name="trip[{{$i}}][people_number]" id="trip[{{$i}}][people_number]" class="input-field-text" value="{{$val['people_number'] or ''}}"/>
                                    <div class="tips"></div>
                                </div>
                                <div class="input-field">
                                    <span class="input-label">联系人  :</span>
                                    <input data-type="character" required tip-warn="" tip-info="仅支持英文、汉字" class="input-field-text" id="trip[{{$i}}][contact_name]" name="trip[{{$i}}][contact_name]" type="text" value="{{$val['contact_name'] or ''}}">
                                    <div class="tips"></div>
                                </div>
                                <div class="input-field">
                                    <span class="input-label">联系电话  :</span>
                                    <input data-type="mobile" required tip-info="请填写您的常用手机" class="input-field-text"  id="trip[{{$i}}][contact_mobile]" type="text" name="trip[{{$i}}][contact_mobile]" value="{{$val['contact_mobile'] or ''}}">
                                    <div class="tips"></div>
                                </div>
                                <button type="button" class="btn_next Btn_back">添加返回信息</button>
                            </div>
                            <?php $i++ ?>
                        @endif
                    @endforeach


                    <div class="div_tab" style="padding-bottom: 0px;">
                        <span class="leader_title">信息确认</span>
                        <div class="cut" style="margin-bottom: 50px;"></div>
                        <div id="code" class="clearfix">
                            <span class="input-label">验证码  :</span>
                            <!-- <input required name="verificationcode" id="verificationcode" tip-info="请输入您收到的验证码" class="code" type="text"> -->
                            <input name="verificationcode" id="verificationcode" class="code" type="text">
                            <div class="tips"></div>
                        </div>
                        <a id="tel" class="tel">获取手机验证码</a>
                        <div class="clearfix"></div>
                        <button type="button" id="getQrcode" class="btn_next">确认提交</button>
                        <input class="btn_next" id="submit" type="submit" value="确认提交" />
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
        <div class="identifying">
            <div class="showBox">
                <span class="tip">提示: 请您在右侧输入图中的数字或者字母~</span>
                <span id="tipes">验证成功之后,我们会将验证码发送至您的手机:  <i></i></span>
                <span class="tipes-false">您输入的验证码有误,请核对后重新输入!!!</span>
                <img src="{{url('/captcha')}}">
                <input id="v_code" type="text" placeholder="请输入">
                <a id="sendCode" class="yes">确认</a>
                <a class="no"><i class="icon kenrobot ken-close">X</i></a>
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
                <span class="money">￥0.01</span>
                <div class="QEcode">
                    <img src="" />
                </div>
                <span class="method">使用【支付宝】钱包扫描交易付款二维码</span>
                <p class="tips">Tips：支付完成前，请不要关闭页面</p>
            </div>
        </div>

    </div>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/selectUi.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/lq.datetimepick.js')}}"></script>
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
                // console.log(2)
                // console.log($(this));
                // if($(this).attr('tagName') == 'IMG'){
                    var timestamp = Date.parse(new Date());
                    $(this).attr('src', "{{url('/captcha')}}"+"?t="+timestamp);
                // }
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
        // 数字  所有的正整数
        function isNumber(val) {
            reg= /^[1-9]*[1-9][0-9]*$/;
            if(!reg.test(val)) {
                return false;
            }
            return true;
        }
        //数字 英文 汉字
        function isMathEngCha(val) {
            reg= /^[\w\u4e00-\u9fa5\(\)（）][\s\w\u4e00-\u9fa5\(\)（）]*(?!\s)$/gi;
            if(!reg.test(val)) {
                return false;
            }
            return true;
        }
        //数字 英文 汉字  agemenber
        function isAgemenber(val) {
            reg= /^([0-9]|[0-9]{2}|80)$/gi;
            if(!reg.test(val)) {
                return false;
            }
            return true;
        }
        // 身高 isHeightnum  heightNum
        function isHeightnum(val) {
            reg= /^1[6-9]$|^[2-9]\d$|^1\d{2}$/gi;
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
            // reg = /^1(?:[38]\d|4[4579]|5[0-35-9]|7[35678])\d{8}$/;
            // ret = /^(0|86|17951)?(13[0-9]|15[012356789]|17[3678]|18[0-9]|14[57])[0-9]{8}$/;
            var reg = /^1\d{10}$/;

            if(!reg.test(val)) {
                return false;
            }
            return true;
        }
        //账户类型判断
        function Accountype(val) {
            var getVal = $('input[name="account_type"]:checked').val();
            if(getVal == '公对公账户') {
                return false;
            }
            return true;
        }
        //取消身份证验证
        function Alltype(val) {
            if( 1 == 2) {
                return false;
            }
            // console.log("Alltype");
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
            var name = $el.prop('name');
            var type = $el.prop('type');
            var id = $el.prop('id');
            var val = $el.val();
            var datatype = $el.data('type');// 数据类型 email , mobile , ID,
            if (type == 'file') {
                if (!!$el.attr('required') && val == "") {
                    $el.tipWarn('照片不能为空');
                    return false;
                } else {
                    var fileObj = $('#'+id);
                    // console.log(fileObj)
                    if (fileObj) {
                        if (fileObj.prop('files')) {
                            var f = fileObj.prop('files')[0];
                            // console.log(f);
                            if (f) {
                                $('#preview_'+id).attr('src', URL.createObjectURL(f));
                            }
                        }
                    }
                }
            } else if(type == 'text') {
                if ($el.attr('required') && val == '') {
                    $el.tipWarn('不能为空！');
                    return false;
                }
                if (datatype == 'character' && !isName(val)) {
                    $el.tipWarn('姓名不能是数字或特殊字符，请重新输入!');
                    return false;
                }
                if (datatype == 'isNumber' && !isNumber(val)) {
                    $el.tipWarn('只允许输入数字!');
                    return false;
                }
                if (datatype == 'schoolname' && !isMathEngCha(val)) {
                    $el.tipWarn('允许输入汉字英文数字空格,且首位不能为空格!');
                    return false;
                }
                if (datatype == 'agemenber' && !isAgemenber(val)) {
                    $el.tipWarn('请出入正确的年龄!');
                    return false;
                }
                if (datatype == 'heightNum' && !isHeightnum(val)) {
                    $el.tipWarn('请出入正确的身高!');
                    return false;
                }
                if (datatype == 'email' && !isEmail(val)) {
                    $el.tipWarn('邮件格式不正确');
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
                if (datatype == 'account_type' && ! Accountype(val)) {
                    // // $('input[data-type="account_type"]').attr("required", "true");
                    // $el.tipInfo('选择公对公账户时,这一部分必填');
                    // return false;   allType
                }
                if (datatype == 'all_type' && ! Alltype(val)) {
                    return true;
                }
            }
            $el.tipValid();
            return true;
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
                var required = $(this).attr('required');
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
                if ($(this).attr('files')) {
                    var f = $(this).attr('files')[0];
                    if(f)
                    {
                        // console.log(f.name);
                        $(this).siblings('.file_name').html(f.name);
                    }
                }
             });
            // 队员部分,添加删除按钮
            $('.append_rank .menber_list .delete').unbind('click').click(function(){
                $(this).parent('.menber_list').remove();
                if ($('.all_info .append_rank .menber_list').length > 8) {
                    $('#append_rank_new').css({
                        'pointer-events': 'none',
                        'background': '#ccc'
                    });
                }else {
                    $('#append_rank_new').css({
                        'pointer-events': 'auto',
                        'background': '#587BEF'
                    });
                }
            })
            // 领队部分,添加删除按钮
            $('.other_leader .leader_list .delete').unbind('click').click(function(){
                $(this).parent('.leader_list').remove();
                if ($('.all_info .other_leader .leader_list').length > 0) {
                    $('.add_leader').css({
                        'pointer-events': 'none',
                        'background': '#ccc'
                    });
                }else {
                    $('.add_leader').css({
                        'pointer-events': 'auto',
                        'background': '#587BEF'
                    });
                    leaderListNum = 1;
                }
            })
            //上传 队员照片
            $('.uploadBtn').unbind('click').click(function() {
                $(this).siblings('.inputstyle').click();
            });
            // 校验邀请码是否重复
            $("#invitecode").unbind('blur').blur(function() {
                var str0 = '<span class="useable"><i class="icon kenrobot ken-check"></i></span>';
                var str1 = '<span class="unuse">请您输入有效邀请码!</span>';
                // var str2 = '<span class="unuse">邀请码信息不能为空</span>';
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
                var str0 = '<span class="useable"><i class="icon kenrobot ken-check"></i></span>';
                var str1 = '<span class="unuse">您输入的队伍名已被占用,请输入其他名称!</span>';
                var str2 = '<span class="unuse">队伍名不能为空</span>';
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
                var prevent = false;
                var $inputs = $($('.all_info .div_tab')).find('input').each(function() {
                    var ret = validField(this);
                    if (!ret) {
                        prevent = true;
                    }else {

                    }
                    // console.log(prevent);
                });
                if (!prevent) {
                    var validcode = false;
                    $.ajax({
                        type:"post",
                        url:"{{url('/verificationcode/verify')}}",
                        data:{"verificationcode": $('#verificationcode').val()},
                        async:false,
                        success:function(res) {
                            if (res.status == 0) {
                                // $('.QRcodeShow').addClass('active');
                                // getPayQrcode();
                                validcode = true;
                                setTimeout(function() {
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
                }
            });

            $("#submit").unbind("click").click(function() {
                $("#form").submit();
            });
            $('.codeError .close').unbind('click').click(function() {
                $('.codeError').removeClass('active');
            });
            //  切换证件类型
            $('.menber_list .id_type .input-field-text').unbind('change').change(function (){
                $('.menber_list .id_type select .type').remove();
                $(this).parents('.input-field').siblings('.id_card').find('input').css("pointer-events", "auto");
                var getVal = $(this).find('option:selected').text();
                if ( getVal == "身份证") {
                    $(this).parents('.input-field').siblings('.id_card').find('input').attr("required", "true");
                    $(this).parents('.input-field').siblings('.id_card').find('input').attr("data-type", "ID");
                    $(this).parents('.input-field').siblings('.id_card').find('.input-label').text("身份证号  :");
                } else {
                    $(this).parents('.input-field').siblings('.id_card').find('input').attr("required", "true");
                    // $(this).parents('.input-field').siblings('.id_card').find('input').removeAttr('required');
                    $(this).parents('.input-field').siblings('.id_card').find('input').attr("data-type", "Alltype");
                    $(this).parents('.input-field').siblings('.id_card').find('.input-label').text("护照号  :");
                }
            })
            //  出发信息
            $('#back_1 .Btn_come').unbind('click').bind('click', function(event) {
                backNum = 2;
                $("#back_1").after(addBackInfo());
                $('#back_2 .Btn_come').remove();
                $('#back_1 .Btn_come').css({
                    "background": '#CCC',
                    "pointer-events": 'none'
                });
                rebindVlidation();
            });
            $('#back_2 .delete').unbind('click').bind('click', function(event) {
                $('#back_2').remove();
                $('#back_1 button').css({
                    "background": '#587BEF',
                    "pointer-events": 'auto'
                });
                rebindVlidation();
            });
            // 返回信息
            $('#back_3 .Btn_back').unbind('click').bind('click', function(event) {
                comeNum = 4;
                $("#back_3").after(addComeInfo());
                $('#back_4 .Btn_back').remove();
                $('#back_3 .Btn_back').css({
                    "background": '#CCC',
                    "pointer-events": 'none'
                });
                rebindVlidation();
            });
            $('#back_4 .delete').unbind('click').bind('click', function(event) {
                $('#back_4').remove();
                $('#back_3 .Btn_back').css({
                    "background": '#587BEF',
                    "pointer-events": 'auto'
                });
                rebindVlidation();
            });
            // 导入的插件,点击弹出选择菜单
            $("#datetimepicker4").unbind('click').bind("click",function(e){
                e.stopPropagation();
                $(this).lqdatetimepicker({
                    css : 'datetime-hour',
                    selectback : function(){
                        var prevent = false;
                        var $inputs = $("#datetimepicker1").each(function() {
                            var ret = validField(this);
                            if (!ret) {
                                prevent = true;
                            }else {

                            }
                        });
                    }
                });
            });
            $("#datetimepicker2").unbind('click').bind("click",function(e){
                e.stopPropagation();
                $(this).lqdatetimepicker({
                    css : 'datetime-hour',
                    selectback : function(){
                        var prevent = false;
                        var $inputs = $("#datetimepicker2").each(function() {
                            var ret = validField(this);
                            if (!ret) {
                                prevent = true;
                            }else {

                            }
                        });
                    }
                });
            });
            $("#datetimepicker1").unbind('click').bind("click",function(e){
                e.stopPropagation();
                $(this).lqdatetimepicker({
                    css : 'datetime-day',
                    dateType : 'D',
                    selectback : function(){
                        var prevent = false;
                        var $inputs = $("#datetimepicker3").each(function() {
                            var ret = validField(this);
                            if (!ret) {
                                prevent = true;
                            }else {

                            }
                        });
                    }
                });
            });
            $("#datetimepicker3").unbind('click').bind("click",function(e){
                e.stopPropagation();
                $(this).lqdatetimepicker({
                    css : 'datetime-day',
                    dateType : 'D',
                    selectback : function(){
                        var prevent = false;
                        var $inputs = $("#datetimepicker4").each(function() {
                            var ret = validField(this);
                            if (!ret) {
                                prevent = true;
                            }else {

                            }
                        });
                    }
                });
            });

            $("#datetimepicker9").unbind('click').bind("click",function(e){
                e.stopPropagation();
                $(this).lqdatetimepicker({
                    css : 'datetime-hour',
                    selectback : function(){
                        var prevent = false;
                        var $inputs = $("#datetimepicker5").each(function() {
                            var ret = validField(this);
                            if (!ret) {
                                prevent = true;
                            }else {

                            }
                        });
                    }
                });
            });
            $("#datetimepicker7").unbind('click').bind("click",function(e){
                e.stopPropagation();
                $(this).lqdatetimepicker({
                    css : 'datetime-hour',
                    selectback : function(){
                        var prevent = false;
                        var $inputs = $("#datetimepicker6").each(function() {
                            var ret = validField(this);
                            if (!ret) {
                                prevent = true;
                            }else {

                            }
                        });
                    }
                });
            });
            $("#datetimepicker8").unbind('click').bind("click",function(e){
                e.stopPropagation();
                $(this).lqdatetimepicker({
                    css : 'datetime-day',
                    dateType : 'D',
                    selectback : function(){
                        var prevent = false;
                        var $inputs = $("#datetimepicker7").each(function() {
                            var ret = validField(this);
                            if (!ret) {
                                prevent = true;
                            }else {

                            }
                        });
                    }
                });
            });
            $("#datetimepicker6").unbind('click').bind("click",function(e){
                e.stopPropagation();
                $(this).lqdatetimepicker({
                    css : 'datetime-day',
                    dateType : 'D',
                    selectback : function(){
                        var prevent = false;
                        var $inputs = $("#datetimepicker8").each(function() {
                            var ret = validField(this);
                            if (!ret) {
                                prevent = true;
                            }else {

                            }
                        });
                    }
                });
            });

            $("#datetimepicker13").unbind('click').bind("click",function(e){
                e.stopPropagation();
                $(this).lqdatetimepicker({
                    css : 'datetime-hour',
                    selectback : function(){
                        var prevent = false;
                        var $inputs = $("#datetimepicker9").each(function() {
                            var ret = validField(this);
                            if (!ret) {
                                prevent = true;
                            }else {

                            }
                        });
                    }
                });
            });
            $("#datetimepicker12").unbind('click').bind("click",function(e){
                e.stopPropagation();
                $(this).lqdatetimepicker({
                    css : 'datetime-hour',
                    selectback : function(){
                        var prevent = false;
                        var $inputs = $("#datetimepicker10").each(function() {
                            var ret = validField(this);
                            if (!ret) {
                                prevent = true;
                            }else {

                            }
                        });
                    }
                });
            });
            $("#datetimepicker11").unbind('click').bind("click",function(e){
                e.stopPropagation();
                $(this).lqdatetimepicker({
                    css : 'datetime-day',
                    dateType : 'D',
                    selectback : function(){
                        var prevent = false;
                        var $inputs = $("#datetimepicker11").each(function() {
                            var ret = validField(this);
                            if (!ret) {
                                prevent = true;
                            }else {

                            }
                        });
                    }
                });
            });

            $("#datetimepicker16").unbind('click').bind("click",function(e){
                e.stopPropagation();
                $(this).lqdatetimepicker({
                    css : 'datetime-day',
                    dateType : 'D',
                    selectback : function(){
                        var prevent = false;
                        var $inputs = $("#datetimepicker12").each(function() {
                            var ret = validField(this);
                            if (!ret) {
                                prevent = true;
                            }else {

                            }
                        });
                    }
                });
            });
            $("#datetimepicker17").unbind('click').bind("click",function(e){
                e.stopPropagation();
                $(this).lqdatetimepicker({
                    css : 'datetime-hour',
                    selectback : function(){
                        var prevent = false;
                        var $inputs = $("#datetimepicker13").each(function() {
                            var ret = validField(this);
                            if (!ret) {
                                prevent = true;
                            }else {

                            }
                        });
                    }
                });
            });
            $("#datetimepicker18").unbind('click').bind("click",function(e){
                e.stopPropagation();
                $(this).lqdatetimepicker({
                    css : 'datetime-hour',
                    selectback : function(){
                        var prevent = false;
                        var $inputs = $("#datetimepicker14").each(function() {
                            var ret = validField(this);
                            if (!ret) {
                                prevent = true;
                            }else {

                            }
                        });
                    }
                });
            });
        }
        function detectIE()
        {
            var browser=navigator.appName

            if(browser == "Microsoft Internet Explorer")
            {
                var b_version=navigator.appVersion
                var version=b_version.split(";");
                var trim_Version=version[1].replace(/[ ]/g,"");
                if(trim_Version=="MSIE8.0") {
                    return 'ie8';
                }
                if (trim_Version=="MSIE9.0") {
                    return 'ie9';
                }
            }


            return '';
        }
        // 更新预览界面
        function updatePreview() {
            $('input, select').each(function(){
                var type = $(this).prop('type');
                var id = $(this).attr('id');
                var name = $(this).attr('name');
                var val = $(this).val();
                if (type == 'select-one') {
                    val = $('#'+id+' option:selected').val();
                    if (id == 'competition_name') {
                       val = $('#'+id+' option:selected').text();
                    }
                    $('#preview_competition_name').html($('#competition_name  option:selected').text())
                    $('#preview_' + id).html(val);
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
                    if (detectIE() == 'ie8') {
                    } else {
                        var fileObj = $('#'+id);
                        if (fileObj) {
                            if (fileObj.attr('files')) {
                                var f = fileObj.attr('files')[0];
                                if(f){
                                    $('#preview_'+id).attr('src', URL.createObjectURL(f));
                                }
                            } else {
                                // console.log('img');
                            }
                        }
                    }
                }
                //select
                if (type == 'select-one') {
                    var chkVal = $('select[name="'+name+'"]').find('option:selected').val();
                    $('#preview_' + name).html(chkVal);
                }
            });
            // 领队信息部分
            $('.other_leader > .leader_list').each(function(index){
                var mapKey = new Array('leader_name', 'leader_id' ,'leader_mobile', 'leader_email', 'leader_sex', 'leader_pic');
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
                    if (type == 'file') {
                        var picurl = $el.data('picurl');
                        if (picurl) {
                            $(preview_el).attr('src', picurl);
                            continue;
                        }
                        var fileObj = $el.prop('files');
                        if (fileObj) {
                            if ($el.prop('files')) {
                                var f = $el.prop('files')[0];
                                if(f){
                                    $(preview_el).attr('src', URL.createObjectURL(f));
                                }
                            }
                        }
                        continue;
                    }
                    $(preview_el).html(val);
                }
                $('#leader_info_'+index).show();
            })
            // 队员信息部分
            $('.append_rank > .menber_list').each(function(index){
                var mapKey = new Array('member_name', 'member_id' ,'member_mobile', 'member_age', 'member_sex', 'member_height', 'member_school_name', 'member_school_address', 'member_pic', 'member_id_type', 'member_passport');
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
                    // if (type == 'file') {
                    //     // var picurl = $el.data('picurl');
                    //     // if (picurl) {
                    //     //     $(preview_el).attr('src', picurl);
                    //     //     continue;
                    //     // }
                    //     if (detectIE() == 'ie8') {

                    //     } else {
                    //         if ($el.attr('files')) {
                    //             var f = $el.attr('files')[0];
                    //              console.log(f);
                    //              console.log(preview_el);
                    //             if(f){
                    //                 // $('#preview_'+id).attr('src');
                    //                 $(preview_el).attr('src', URL.createObjectURL(f));
                    //             }
                    //         }

                    //     }
                    //     continue;
                    // }
                    if (type == 'file') {
                        var picurl = $el.data('picurl');
                        if (picurl) {
                            $(preview_el).attr('src', picurl);
                            continue;
                        }
                        var fileObj = $el.prop('files');
                        if (fileObj) {
                            if ($el.prop('files')) {
                                var f = $el.prop('files')[0];
                                if(f){
                                    // $('#preview_'+id).attr('src');
                                    $(preview_el).attr('src', URL.createObjectURL(f));
                                }
                            }
                        }
                        continue;
                    }
                    $(preview_el).html(val);
                }
                $('#member_info_'+index).show();
            })
            // 隐藏显示界面的空行
            function aaa(){
                if ($('#team_id').text() == "") {
                    $('#team_id').parents('.input-field').css('display', 'none');
                }
            }
            // 隐藏显示界面的空行
            function bbb(){
                if ($('#number .member_info .name_input').text() == "") {
                    $('#number .member_info .name_input').parents('.input-field').css('display', 'none');
                }
            }
            aaa();
            function showIDPassport(){
                $('.append_rank .menber_list .id_type .member_id_type').each(function() {
                    var getVal = $(this).find('option:selected').text();
                    var idHtml = $(this).parents('.input-field').siblings('.id_card').find('input').val();
                    var passHtml = $(this).parents('.input-field').siblings('.passport').find('input').val();
                    if ( getVal == "身份证") {
                        $(this).parents('.input-field').siblings('.passport').find('input').val(idHtml);
                    }else {
                        $(this).parents('.input-field').siblings('.id_card').find('input').val(passHtml);
                    }
                });
            };
            // showIDPassport();
        }
        $(function(){
            $('#input-read').click(function (){
                if ($('#input-read').prop("checked") == false) {
                    $('#btn-read').css({
                        'backgroundColor': '#ccc',
                        'pointer-events': 'none'
                    });
                    $('#btn-read').unbind('click');
                } else {
                    $('#btn-read').css({
                        'backgroundColor': '#587BEF',
                        'pointer-events': 'auto'
                    });
                    $('#btn-read').bind('click', function(event) {
                        $('.instructions').removeClass('active');
                        $('.content').addClass('active');
                    });;
                }
            })
            // 默认添加一次队员列表
            setTimeout(function (){
                if ($('.append_rank .menber_list').length > 0) {
                } else {
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
                var mobile = $('#leader_mobiles').val();
                // var email = $('#leader_email').val();
                var type = 'mobile';
                // console.log(captchacode,mobile,type);
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
                            refresh_captcha();
                            $('.identifying').removeClass('active');
                            countdown();
                        } else {
                            // 验证码填写错误
                            $('.tipes-false').css('opacity', 1);
                        }
                    }
                );
            });
            //更新表单验证绑定
            $('#append_rank_new').click(function (){
                $('.delete').eq(0).css('display', 'none');
                if ($('.all_info .append_rank .menber_list').length > 8) {
                    $('#append_rank_new').css({
                        'pointer-events': 'none',
                        'background': '#ccc'
                    });
                }else {
                    $('#append_rank_new').css({
                        'pointer-events': 'auto',
                        'background': '#587BEF'
                    });
                }
            })

            @if(old('leader_sex'))
            $('input').each(function(){
                validField(this);
            });
            @endif
            rebindVlidation();
            $('#competition_name').change();
        });
        // end of $(function())
        //  阅读报名须知
        $('#btn-read').click(function (){
            $('.instructions').removeClass('active');
            $('.content').addClass('active');
        })
        // 发送手机验证码
        $('#tel').click(function() {
            var partten = /^1[3,5,8]\d{9}$/;
            var partten = /^1\d{10}$/;
            if(partten.test($('#leader_mobiles').val())){
               $('.identifying').addClass('active');
               $('#tipes i').html($('#leader_mobiles').val());
               // countdown();
            }else {
                // console.log('无法调取')
            }
        });
        // IE有关的判断;
        $('.falseCodeAlert').click(function(){
            $(this).css('display', 'none');
        })
        // 轮询
        function RefreshQrcode(outTradeNo){
            // var Qrcode = false;
            // var timer = setInterval(function (){
            //     $.ajax({
            //         type: "post",
            //         url: "{{url('/pay/queryorder')}}",
            //         data: {
            //             "out_trade_no": outTradeNo
            //         },
            //         async: false,
            //         success: function(res) {
            //             if (res.status == 0) {
            //                 // console.log(res);   //支付成功
            //                 $('#submit').click();
            //                 $('#submit').click();
            //                 clearTimeout(timer);
            //                 Qrcode = true;
            //             } else if (res.status == 1) {
            //                 // console.log(res);
            //                 Qrcode = false;
            //             }
            //         }
            //     });
            // }, 2000)
        }

        // 账户类型发生改变  公对公账户  私对公账户
        $('.enroll-notice').find('input[name="account_type"]').change(function(){
            var getVal = $('input[name="account_type"]:checked').val();
            if (getVal == '公对公账户') {
                $('input[type="text"]').attr("required", "true");
            }else {
                $('input[data-type="account_type"]').removeAttr('required');
            }
        })
        // 切换金额的时候   总价也相应的进行改变
        $('#average_amount').change(function(){
            var num = $('.append_rank .menber_list').length + 1 + $('.other_leader .leader_list').length;
            $('#participant').text(num);
            $('#participant-input').val(num);
            var price = $('#average_amount option:selected').val();
            var total = num * price;
            $('#total_cost').text(total);
            $('#total_cost_input').val(total);
        })

        var game_name = ["未来世界", "博思威龙", "工业时代", "部落战争——攻城大师", "智造大挑战", "创客生存挑战赛"]; //直接声明Array
        var game_type = [
            ["WRO常规赛", "EV3足球赛", "WRO创意赛-'可持续发展'"],
            ["VEX-EDR'步步为营'工程挑战赛", "VEX-IQ'环环相扣'工程挑战赛", "BDS机器人工程挑战赛——'长城意志'"],
            ["能力风暴——WER能力挑战赛", "能力风暴——WER能力挑战赛工程创新赛", "能力风暴——WER普及赛"],
            ["部落战争——攻城大师"],
            ["智造大挑战"],
            ["创客生存挑战赛"]
        ];
        var get_competition_type = $('#preview_competition_type').val();

        isIE8();
        function isIE8(){
            if (navigator.appName === 'Microsoft Internet Explorer') {
                if (navigator.userAgent.match(/Trident/i) && navigator.userAgent.match(/MSIE 8.0/i)) {
                    for (x in game_type)
                    {
                        if (!Array.prototype.indexOf){
                            Array.prototype.indexOf = function(elt /*, from*/){
                            var len = this.length >>> 0;
                            var from = Number(arguments[1]) || 0;
                            from = (from < 0)
                                 ? Math.ceil(from)
                                 : Math.floor(from);
                            if (from < 0)
                              from += len;
                            for (; from < len; from++)
                            {
                              if (from in this &&
                                  this[from] === elt)
                                return from;
                            }
                            return -1;
                          };
                        }
                        if (game_type[x].indexOf(get_competition_type) > -1) {
                            $('#preview_competition_name').val(game_name[x]);
                        }
                    }
                }else {
                    for (x in game_type)
                    {
                        if (game_type[x].indexOf(get_competition_type) > -1) {
                            $('#preview_competition_name').val(game_name[x]);
                        }
                    }
                }
            }else {
                for (x in game_type)
                {
                    if (game_type[x].indexOf(get_competition_type) > -1) {
                        $('#preview_competition_name').val(game_name[x]);
                    }
                }
            }
        }

        var comeNum = 3;
        function addComeInfo(){
            var comeInfo = '';
            comeInfo += '<div class="div_tab" id="back_' + comeNum + '">';
            comeInfo += '<span class="leader_title">返回信息表</span>';
            comeInfo += '<div class="cut"></div>';
            comeInfo += '<div class="delete"><i class="icon kenrobot ken-close"></i></div>';
            comeInfo += '<div class="input-field" style="margin-top: 30px;">';
            comeInfo += '<input style="display:none;" name="trip['+comeNum+'][trip_type]" type="text" value="返程" />';
            comeInfo += '<span class="input-label">交通工具  :</span>';
            comeInfo += '<select id="trip['+comeNum+'][vehicle_type]" name="trip['+comeNum+'][vehicle_type]" class="input-field-text">';
            comeInfo += '<option value="火车" selected >火车</option>';
            comeInfo += '<option value="飞机" >飞机</option>';
            comeInfo += '</select>';
            comeInfo += '<div class="tips"></div>';
            comeInfo += '</div>';
            comeInfo += '<div class="input-field">';
            comeInfo += '<span class="input-label">航班/车次  :</span>';
            comeInfo += '<input data-type="Alltype" required tip-warn="不能为空" tip-warn="" tip-info="输入您的航班/车次" class="input-field-text" id="trip['+comeNum+'][vehicle_number]" name="trip['+comeNum+'][vehicle_number]" type="text" value="{{old("trip['+comeNum+'][vehicle_number]")}}">';
            comeInfo += '<div class="tips"></div>';
            comeInfo += '</div>';
            comeInfo += '<div class="input-field">';
            comeInfo += '<span class="input-label">出发日期  :</span>';
            comeInfo += '<input data-type="Alltype" required type="text" name="trip['+comeNum+'][start_date]" id="datetimepicker' + ((comeNum-3)*5 + 11) + '" class="input-field-text" value="{{old("trip['+comeNum+'][start_date]")}}"/>';
            comeInfo += '<div class="tips"></div>';
            comeInfo += '</div>';
            comeInfo += '<div class="input-field">';
            comeInfo += '<span class="input-label">出发时间  :</span>';
            comeInfo += '<input required data-type="Alltype" type="text" name="trip['+comeNum+'][start_time]" id="datetimepicker' + ((comeNum-3)*5 + 12) + '" class="input-field-text" value="{{old("trip['+comeNum+'][start_time]")}}"/>';
            comeInfo += '<div class="tips"></div>';
            comeInfo += '</div>';
            comeInfo += '<div class="input-field">';
            comeInfo += '<span class="input-label">出发地点  :</span>';
            comeInfo += '<select id="trip['+comeNum+'][start_place]" name="trip['+comeNum+'][start_place]" class="input-field-text">';
            comeInfo += '<option value="喜瑞德大酒店" selected >喜瑞德大酒店</option>';
            comeInfo += '<option value="武汉碧桂园凤凰酒店" >武汉碧桂园凤凰酒店</option>';
            comeInfo += '<option value="武汉豪生国际酒店" >武汉豪生国际酒店</option>';
            comeInfo += '<option value="湖北中核国际酒店" >湖北中核国际酒店</option>';
            comeInfo += '<option value="武汉明德酒店" >武汉明德酒店</option>';
            comeInfo += '<option value="武汉联投半岛酒店" >武汉联投半岛酒店</option>';
            comeInfo += '</select>';
            comeInfo += '<div class="tips"></div>';
            comeInfo += '</div>';
            comeInfo += '<div class="input-field">';
            comeInfo += '<span class="input-label">起飞/发车时间  :</span>';
            comeInfo += '<input required type="text" name="trip['+comeNum+'][vehicle_time]" id="datetimepicker' + ((comeNum-3)*5 + 13) + '" class="input-field-text" value="{{old("trip['+comeNum+'][vehicle_time]")}}"/>';
            comeInfo += '<div class="tips"></div>';
            comeInfo += '</div>';
            comeInfo += '<div class="input-field">';
            comeInfo += '<span class="input-label">人数  :</span>';
            comeInfo += '<input id="trip['+comeNum+'][people_number]" data-type="isNumber" required tip-warn="" tip-info="请输入人数" type="text" name="trip['+comeNum+'][people_number]" class="input-field-text" value="{{old("trip['+comeNum+'][people_number]")}}"/>';
            comeInfo += '<div class="tips"></div>';
            comeInfo += '</div>';
            comeInfo += '<div class="input-field">';
            comeInfo += '<span class="input-label">联系人  :</span>';
            comeInfo += '<input data-type="character" required tip-warn="" tip-info="仅支持英文、汉字" class="input-field-text" id="trip['+comeNum+'][contact_name]" name="trip['+comeNum+'][contact_name]" type="text" value="{{old("trip['+comeNum+'][contact_name]")}}">';
            comeInfo += '<div class="tips"></div>';
            comeInfo += '</div>';
            comeInfo += '<div class="input-field">';
            comeInfo += '<span class="input-label">联系电话  :</span>';
            comeInfo += '<input data-type="mobile" required tip-info="请填写您的常用手机" class="input-field-text"  id="trip['+comeNum+'][contact_mobile]" type="text" name="trip['+comeNum+'][contact_mobile]" value="{{old("trip['+comeNum+'][contact_mobile]")}}">';
            comeInfo += '<div class="tips"></div>';
            comeInfo += '</div>';
            comeInfo += '<button type="button" class="btn_next Btn_back">添加返程信息</button>';
            comeInfo += '</div>';
            rebindVlidation();
            comeNum += 1;
            return comeInfo;
        }

        var backNum = 1;
        function addBackInfo(){
            var backInfo = '';
            backInfo += '<div class="div_tab" id="back_' + backNum + '">';
            backInfo += '<span class="leader_title">出发信息表</span>';
            backInfo += '<div class="cut"></div>';
            backInfo += '<div class="delete"><i class="icon kenrobot ken-close"></i></div>';
            backInfo += '<div class="input-field" style="margin-top: 30px;">';
            backInfo += '<input style="display:none;" name="trip['+backNum+'][trip_type]" type="text" value="到达" />';
            backInfo += '<span class="input-label">交通工具  :</span>';
            backInfo += '<select id="trip['+backNum+'][vehicle_type]" name="trip['+backNum+'][vehicle_type]" class="input-field-text">';
            backInfo += '<option value="火车" selected >火车</option>';
            backInfo += '<option value="飞机" >飞机</option>';
            backInfo += '</select>';
            backInfo += '<div class="tips"></div>';
            backInfo += '</div>';
            backInfo += '<div class="input-field">';
            backInfo += '<span class="input-label">航班/车次  :</span>';
            backInfo += '<input data-type="Alltype" id="trip['+backNum+'][vehicle_number]" required tip-warn="不能为空" tip-warn="" tip-info="输入您的航班/车次" class="input-field-text" id="vehicle_come_number_new" name="trip['+backNum+'][vehicle_number]" type="text" value="{{old("trip['+backNum+'][vehicle_number]")}}"/>';
            backInfo += '<div class="tips"></div>';
            backInfo += '</div>';""
            backInfo += '<div class="input-field">';
            backInfo += '<span class="input-label">出发日期  :</span>';
            backInfo += '<input required tip-warn="不能为空" tip-warn="" tip-info="输入交通工具" type="text" name="trip['+backNum+'][start_date]" id="datetimepicker'+ ((backNum-1)*5 + 1) +'" class="input-field-text" value="{{old("trip['+backNum+'][start_date]")}}"/>';
            backInfo += '<div class="tips"></div>';
            backInfo += '</div>';
            backInfo += '<div class="input-field">';
            backInfo += '<span class="input-label">出发时间  :</span>';
            backInfo += '<input required type="text" name="trip['+backNum+'][start_time]" id="datetimepicker'+ ((backNum-1)*5 + 2) +'" class="input-field-text" value="{{old("trip['+backNum+'][start_time]")}}"/>';
            backInfo += '<div class="tips"></div>';
            backInfo += '</div>';
            backInfo += '<div class="input-field">';
            backInfo += '<span class="input-label">到达日期  :</span>';
            backInfo += '<input required type="text" name="trip['+backNum+'][arrive_date]" id="datetimepicker'+ ((backNum-1)*5 + 3) +'" class="input-field-text" value="{{old("trip['+backNum+'][arrive_date]")}}"/>';
            backInfo += '<div class="tips"></div>';
            backInfo += '</div>';
            backInfo += '<div class="input-field">';
            backInfo += '<span required class="input-label">到达时间  :</span>';
            backInfo += '<input type="text" name="trip['+backNum+'][arrive_time]" id="datetimepicker'+ ((backNum-1)*5 + 4) +'" class="input-field-text" value="{{old("trip['+backNum+'][arrive_time]")}}"/>';
            backInfo += '<div class="tips"></div>';
            backInfo += '</div>';
            backInfo += '<div class="input-field">';
            backInfo += '<span class="input-label">到达地点  :</span>';
            backInfo += '<select id="trip['+backNum+'][arrive_place]" name="trip['+backNum+'][arrive_place]" class="input-field-text">';
            backInfo += '<option value="武汉火车站" selected >武汉火车站</option>';
            backInfo += '<option value="汉口火车站" >汉口火车站</option>';
            backInfo += '<option value="武昌火车站" >武昌火车站</option>';
            backInfo += '</select>';
            backInfo += '<div class="tips"></div>';
            backInfo += '</div>';
            backInfo += '<div class="input-field">';
            backInfo += '<span class="input-label">人数  :</span>';
            backInfo += '<input data-type="isNumber" id="trip['+backNum+'][people_number]" required tip-warn="" tip-info="请输入人数" type="text" name="trip['+backNum+'][people_number]" class="input-field-text" value="{{old("trip['+backNum+'][people_number]")}}"/>';
            backInfo += '<div class="tips"></div>';
            backInfo += '</div>';
            backInfo += '<div class="input-field">';
            backInfo += '<span class="input-label">联系人  :</span>';
            backInfo += '<input data-type="character" required tip-warn="" tip-info="仅支持英文、汉字" class="input-field-text" id="trip['+backNum+'][contact_name]" name="trip['+backNum+'][contact_name]" type="text" value="{{old("trip['+backNum+'][contact_name]")}}">';
            backInfo += '<div class="tips"></div>';
            backInfo += '</div>';
            backInfo += '<div class="input-field">';
            backInfo += '<span class="input-label">联系电话  :</span>';
            backInfo += '<input data-type="mobile" required tip-info="请填写您的常用手机" class="input-field-text"  id="trip['+backNum+'][contact_mobile]" type="text" name="trip['+backNum+'][contact_mobile]" value="{{old("trip['+backNum+'][contact_mobile]")}}">';
            backInfo += '<div class="tips"></div>';
            backInfo += '</div>';
            backInfo += '<button type="button" class="btn_next Btn_come">添加出发信息</button>';
            backInfo += '</div>';
            rebindVlidation();
            backNum += 1;
            return backInfo;
        }

        function sortDiv(){
            if ($('.all_info .div_tab').length == 2) {
                addComeInfo();
                addBackInfo();
            }
        }

        clickSelf();
        function clickSelf(){
            if ($('.all_info .div_tab').length == 2) {
                $("#base").after(addBackInfo());
                $('#back_1 .delete').remove();
                $("#back_1").after(addComeInfo());
                $('#back_3 .delete').remove();
                rebindVlidation();
            }else if ($('#back_4').length == 0 && $('#back_2').length != 0) {
                $('#back_1 .delete').remove();
                $('#back_1 button').css({
                    "background": '#CCC',
                    "pointer-events": 'none'
                });
                $('#back_2 button').remove();
                $('#back_3 .delete').remove();
                rebindVlidation();
            }else if ($('#back_4').length == 0 && $('#back_2').length == 0) {
                $('#back_1 .delete').remove();
                $('#back_3 .delete').remove();
            }else if ($('#back_4').length != 0 && $('#back_2').length == 0) {
                $('#back_1 .delete').remove();
                $('#back_3 .delete').remove();
                $('#back_3 button').css({
                    "background": '#CCC',
                    "pointer-events": 'none'
                });
            }else {
                $('#back_1 .delete').remove();
                $('#back_3 .delete').remove();
                $('#back_1 button').css({
                    "background": '#CCC',
                    "pointer-events": 'none'
                });
                $('#back_3 button').css({
                    "background": '#CCC',
                    "pointer-events": 'none'
                });
                $('#back_2 button').remove();
                $('#back_4 button').remove();
            }
        }

        function vehicleChange(thisSelect){
            thisSelect.find('option:first').text('火车');
            thisSelect.find('option:first').val('火车');
        }
        function hotelChange(thisSelect){
            thisSelect.find('option:first').text('喜瑞德大酒店');
            thisSelect.find('option:first').val('喜瑞德大酒店');
        }
        function stateChange(thisSelect){
            thisSelect.find('option:first').text('武汉火车站');
            thisSelect.find('option:first').val('武汉火车站');
        }
    </script>
</body>
</html>
