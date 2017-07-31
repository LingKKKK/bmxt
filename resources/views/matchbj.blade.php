<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <title>RoboCom北京挑战赛</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/matchbj.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/kenrobot.css')}}">
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
            <form id="form" name="form" action="/signup" onkeydown="if(event.keyCode==13)return false;" enctype="multipart/form-data" method="POST" novalidate style="width: 1004px;">
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

                            <input tip-warn="" tip-info="输入邀请码" class="input-field-text" id="invitecode" name="invitecode" type="text" value="{{$signdata['invitecode'] or ''}}">
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
                            <input tip-warn="" tip-info="仅支持英文、汉字" class="input-field-text add_contact" id="contact_name_info" name="contact_name" type="text" value="">
                            <div class="tips"></div>
                        </div>
                        <div class="input-field">
                            <span class="input-label">联系人手机号码  :</span>
                            <input tip-info="请填联系人手机号码" class="input-field-text add_contact"  id="contact_mobile_info" type="text" name="contact_mobile" value="">
                            <div class="tips"></div>
                        </div>
                        <div class="input-field">
                            <span class="input-label">联系人邮箱  :</span>
                            <input tip-info="请按照正确的邮箱格式填写" class="input-field-text add_contact" id="contact_email_info" name="contact_email" type="text" value="">
                            <div class="tips"></div>
                        </div>
                        <div class="input-field">
                            <span class="input-label">联系人备注  :</span>
                            <input tip-info="请填写备注内容" class="input-field-text add_contact" id="contact_remark_info" name="contact_remark" type="text" value="">
                            <div class="tips"></div>
                        </div>
                        <div class="input-field">
                            <span class="input-label" style="width: auto; color: red;">* 联系人部分为选填内容,如果不填写,默认第一个领队老师为联系人!!!</span>
                        </div>
                        <button type="button" class="btn_next" id="leader_info_btn">下一步</button>
                    </div>
                    <div class="leader_info div_tab clearfix">
                        <div class="clearfix leaders">
                        </div>
                        <div class="clearfix other_leader"></div>
                        <button type="button" class="add_leader">添加领队信息</button>
                        <button type="button" class="btn_pre">上一步</button>
                        <button type="button" class="btn_next">下一步</button>
                    </div>
                    <div class="ranks_info div_tab">
                        <div class="input-field">
                            <span class="input-label">队伍名称  :</span>
                            <input data-type="schoolname" required tip-warn="" tip-info="请出入您队伍的名称" class="input-field-text" id="team_name" name="team_name" type="text" value="">
                            <div class="tips"></div>
                        </div>
                        <div class="input-field">
                            <span class="input-label">赛事项目  :</span>
                            <!-- <select id="competition_name" name="competition_name" onchange="chg(this);"></select> -->
                            <select class="select-box" id="competition_first" name="competition_name" level="1"></select>
                            <input type="hidden" id="competition_name_val" name="" value="">
                        </div>
                        <div class="input-field">
                            <span class="input-label">赛事名称  :</span>
                            <!-- <select id="competition_type" name="competition_type" onchange="chg2(this)" style="margin-left: 140px;"></select> -->
                            <select class="select-box" id="competition_second" name="competition_type" level="2"></select>
                            <input type="hidden" id="competition_type_val" name="" value="">
                        </div>
                        <div class="input-field">
                            <span class="input-label">组别  :</span>
                            <!-- <select id="competition_group" name="competition_group"></select> -->
                            <select class="select-box" id="competition_third" name="competition_group" level="3"></select>
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
                    <div class="append_rank div_tab">
                        <span class="title-span">*队员最多8人</span>

                        <button type="button" class="btn_new" id="append_rank_new">添加新成员</button>
                        <button type="button" class="btn_pre">上一步</button>
                        <button type="button" class="btn_next">下一步</button>
                    </div>
                    <div class="payment div_tab">
                        <div class="enroll-notice">
                            <div class="input-field">
                                <span class="input-label">发票抬头(*收款机构的抬头) :</span>
                                <input required data-type='account_type' class="input-field-text" id="invoice_title" name="invoice_title" type="text" value="{{$signdata['invoice_header'] or ''}}">
                                <div class="tips"></div>
                            </div>
                            <div class="input-field">
                                <span class="input-label">统一社会信用代码 :</span>
                                <input required data-type='account_type' class="input-field-text" id="invoice_code" name="invoice_code" type="text" value="{{$signdata['invoice_header'] or ''}}">
                                <div class="tips"></div>
                            </div>
                            <div class="input-field">
                                <span class="input-label">开票金额 :</span>
                                <input required data-type='account_type' class="input-field-text" id="invoice_money" name="invoice_money" type="text" value="{{$signdata['total_cost'] or ''}}">
                                <div class="tips"></div>
                            </div>
                            <div class="input-field">
                                <span class="input-label">开票明细 :</span>
                                <input required data-type='account_type' class="input-field-text" id="invoice_type" name="invoice_type" type="text" value="{{$signdata['total_cost'] or ''}}">
                                <div class="tips"></div>
                            </div>
                            <div class="input-field">
                                <span class="input-label">收件地址 :</span>
                                <input required data-type='account_type' class="input-field-text" id="invoice_mail_address" name="invoice_mail_address" type="text" value="{{$signdata['total_cost'] or ''}}">
                                <div class="tips"></div>
                            </div>
                            <div class="input-field">
                                <span class="input-label">联系人姓名 :</span>
                                <input required data-type='account_type' class="input-field-text" id="invoice_mail_recipients" name="invoice_mail_recipients" type="text" value="{{$signdata['total_cost'] or ''}}">
                                <div class="tips"></div>
                            </div>
                            <div class="input-field">
                                <span class="input-label">联系电话 :</span>
                                <input required data-type='account_type' class="input-field-text" id="invoice_mail_mobile" name="invoice_mail_mobile" type="text" value="{{$signdata['total_cost'] or ''}}">
                                <div class="tips"></div>
                            </div>
                            <div class="input-field">
                                <span class="input-label">E-mail :</span>
                                <input required data-type='account_type' class="input-field-text" id="invoice_mail_email" name="invoice_mail_email" type="text" value="{{$signdata['total_cost'] or ''}}">
                                <div class="tips"></div>
                            </div>
                            <div class="input-field">
                                <span class="input-label">备注 :</span>
                                <input class="input-field-text" id="invoice_remark" name="invoice_remark" type="text" value="{{$signdata['total_cost'] or ''}}">
                                <div class="tips"></div>
                            </div>
                        </div>
                        <button type="button" class="btn_pre">上一步</button>
                        <button type="button" class="btn_next">下一步</button>
                    </div>



                    <div class="team_info div_tab">
                        <div class="leader" id="number-leader">
                            <span class="leader_title">带队老师信息(如果无数据,第一个领队教师为联系人)</span>
                            <div class="cut"></div>
                            <div class="input-field">
                                <span class="name">真实姓名 :</span>
                                <span  id="preview_contact_name_info" class="name_input" ></span>
                            </div>
                            <div class="input-field">
                                <span class="name">联系人手机号 :</span>
                                <span  id="preview_contact_mobile_info" class="name_input"></span>
                            </div>
                            <div class="input-field">
                                <span  class="name">联系人邮箱 :</span>
                                <span id="preview_contact_email_info" class="name_input"></span>
                            </div>
                            <div class="input-field">
                                <span class="name">联系人备注 :</span>
                                <span  id="preview_contact_remark_info" class="name_input" style="margin-bottom: 40px;"></span>
                            </div>
                        </div>
                        <div class="leader" id="leader">
                            <span class="leader_title">领队老师信息</span>
                            @for($i = 0; $i< 10; $i++)
                            <div id="leader_info_{{$i}}" class="leader_info" style="display: none; position: relative;">
                                <div class="cut"></div>
                                <div class="input-field">
                                    <span class="name">姓名 :</span>
                                    <span data-type="character" id="{{'preview_leader_'.$i.'_name'}}" class="name_input"></span>
                                </div>
                                <div class="input-field">
                                    <span class="name">性别 :</span>
                                    <span id="{{'preview_leader_'.$i.'_sex'}}" class="name_input"></span>
                                </div>
                                <div class="input-field">
                                    <span class="name">民族 :</span>
                                    <span id="{{'preview_leader_'.$i.'_nation'}}" class="name_input"></span>
                                </div>
                                <div class="input-field">
                                    <span class="name">出生日期 :</span>
                                    <span id="{{'preview_leader_'.$i.'_age'}}" class="name_input"></span>
                                </div>
                                <div class="input-field">
                                    <span class="name">身高 :</span>
                                    <span id="{{'preview_leader_'.$i.'_height'}}" class="name_input"></span>
                                </div>
                                <div class="input-field">
                                    <span class="name">工作单位 :</span>
                                    <span id="{{'preview_leader_'.$i.'_work_unit'}}" class="name_input"></span>
                                </div>
                                <div class="input-field">
                                    <span class="name">证件类型 :</span>
                                    <span id="{{'preview_leader_'.$i.'_ID_type'}}" class="name_input"></span>
                                </div>
                                <div class="input-field">
                                    <span class="name">证件号码 :</span>
                                    <span id="{{'preview_leader_'.$i.'_ID_number'}}" class="name_input"></span>
                                </div>
                                <div class="input-field">
                                    <span class="name">户籍地址 :</span>
                                    <span id="{{'preview_leader_'.$i.'_register_address'}}" class="name_input"></span>
                                </div>
                                <div class="input-field">
                                    <span class="name">现居详情 :</span>
                                    <span id="{{'preview_leader_'.$i.'_home_address'}}" class="name_input"></span>
                                </div>
                                <div class="input-field">
                                    <span class="name">手机号码 :</span>
                                    <span id="{{'preview_leader_'.$i.'_tel'}}" class="name_input"></span>
                                </div>
                                <div class="input-field">
                                    <span class="name">邮箱 :</span>
                                    <span id="{{'preview_leader_'.$i.'_mail'}}" class="name_input"></span>
                                </div>
                                <div class="input-field">
                                    <span class="name">备注 :</span>
                                    <span id="{{'preview_leader_'.$i.'_remarks'}}" class="name_input"></span>
                                </div>
                                <img id="{{'preview_'.$i.'_leader_pic'}}" src="" >
                            </div>
                            @endfor
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
                            <div class="team_number" id="number">
                                @for($i = 0; $i< 10; $i++)
                                <div id="member_info_{{$i}}" class="member_info" style="display: none;position: relative;">
                                    <div class="cut"></div>
                                    <div class="input-field">
                                        <span class="name">姓名 :</span>
                                        <span data-type="character" id="{{'preview_member_'.$i.'_name'}}" class="name_input"></span>
                                    </div>
                                    <div class="input-field">
                                        <span class="name">性别 :</span>
                                        <span id="{{'preview_member_'.$i.'_sex'}}" class="name_input"></span>
                                    </div>
                                    <div class="input-field">
                                        <span class="name">民族 :</span>
                                        <span id="{{'preview_member_'.$i.'_nation'}}" class="name_input"></span>
                                    </div>
                                    <div class="input-field">
                                        <span class="name">出生日期 :</span>
                                        <span id="{{'preview_member_'.$i.'_age'}}" class="name_input"></span>
                                    </div>
                                    <div class="input-field">
                                        <span class="name">身高 :</span>
                                        <span id="{{'preview_member_'.$i.'_height'}}" class="name_input"></span>
                                    </div>
                                    <div class="input-field">
                                        <span class="name">工作单位 :</span>
                                        <span id="{{'preview_member_'.$i.'_work_unit'}}" class="name_input"></span>
                                    </div>
                                    <div class="input-field">
                                        <span class="name">证件类型 :</span>
                                        <span id="{{'preview_member_'.$i.'_ID_type'}}" class="name_input"></span>
                                    </div>
                                    <div class="input-field">
                                        <span class="name">证件号码 :</span>
                                        <span id="{{'preview_member_'.$i.'_ID_number'}}" class="name_input"></span>
                                    </div>
                                    <div class="input-field">
                                        <span class="name">户籍地址 :</span>
                                        <span id="{{'preview_member_'.$i.'_register_address'}}" class="name_input"></span>
                                    </div>
                                    <div class="input-field">
                                        <span class="name">现居详情 :</span>
                                        <span id="{{'preview_member_'.$i.'_home_address'}}" class="name_input"></span>
                                    </div>
                                    <div class="input-field">
                                        <span class="name">手机号码 :</span>
                                        <span id="{{'preview_member_'.$i.'_tel'}}" class="name_input"></span>
                                    </div>
                                    <div class="input-field">
                                        <span class="name">邮箱 :</span>
                                        <span id="{{'preview_member_'.$i.'_mail'}}" class="name_input"></span>
                                    </div>
                                    <div class="input-field">
                                        <span class="name">备注 :</span>
                                        <span id="{{'preview_member_'.$i.'_remarks'}}" class="name_input"></span>
                                    </div>
                                    <img id="{{'preview_'.$i.'_member_pic'}}" src="" >
                                </div>
                                @endfor
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
                            <input name="verificationcode" id="verificationcode" class="code" type="text">
                            <div class="tips"></div>
                        </div>
                        <a id="tel" class="tel">获取手机验证码</a>
                        <div class="clearfix"></div>
                        <button type="button" class="btn_pre">上一步</button>
                        <!-- <button type="submit" class="btn_next">确认提交</button> -->
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
    <script type="text/javascript" src="{{ asset('assets/js/YMDClass.js')}}"></script>
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
                // if($(this).attr('tagName') == 'IMG'){
                    var timestamp = Date.parse(new Date());
                    $(this).attr('src', "{{url('/captcha')}}"+"?t="+timestamp);
                // }
            }
        })(jQuery);
        //修改s
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
                    if (fileObj) {
                        if (fileObj.prop('files')) {
                            var f = fileObj.prop('files')[0];
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
                if (datatype == 'schoolname' && !isMathEngCha(val)) {
                    $el.tipWarn('允许输入汉字英文数字空格!');
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
            // 添加联系人
            $("#add_contact").on('change', function(event) {
                $('#contact_name_info').removeClass('add_contact');
                $('#contact_name_info').attr("required", "true");
                $('#contact_name_info').attr("data-type", "character");
                $('#contact_mobile_info').removeClass('add_contact');
                $('#contact_mobile_info').attr("required", "true");
                $('#contact_mobile_info').attr("data-type", "mobile");
                $('#contact_email_info').removeClass('add_contact');
                $('#contact_email_info').attr("required", "true");
                $('#contact_email_info').attr("data-type", "email");
                $('#contact_remark_info').removeClass('add_contact');
                /* Act on the event */
            });
            $("input").unbind('blur').blur(function(){
                validField(this);
                return false;
            });
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
            $('.append_rank .member_list .delete').unbind('click').click(function(){
                $(this).parent('.member_list').remove();
                if ($('.all_info .append_rank .member_list').length > 7) {
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
                if ($('.all_info .other_leader .leader_list').length > 1) {
                    $('.add_leader').css({
                        'pointer-events': 'none',
                        'background': '#ccc'
                    });
                }else {
                    $('.add_leader').css({
                        'pointer-events': 'auto',
                        'background': '#587BEF'
                    });
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
                    // console.log(res);
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
                var validcode = false;
                $.ajax({
                    type:"post",
                    url:"{{url('/verificationcode/verify')}}",
                    data:{"verificationcode": $('#verificationcode').val()},
                    async:false,
                    success:function(res) {
                        if (res.status == 0) {
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
                console.log('valid', validcode);
                return false;
            });
            $("#submit").unbind("click").click(function() {
                $("#form").submit();
            });
            $('.codeError .close').unbind('click').click(function() {
                $('.codeError').removeClass('active');
            });
            // 添加民族
            $('.nations_select').each(function(event) {
                if ($(this).find('option').length == 1) {
                    addOption(this);
                }
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
            });


            $('.append_rank .member_list').eq(0).find('.delete').css('display', 'none');
            // new YMDselect('year1','month1','day1');
            // new YMDselect('year2','month2','day2');
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
                    // console.log($(this), chkVal)
                    var new_ID = $(this).siblings('p').attr('id');
                    $('#preview_' + name).html(chkVal);
                    $('#preview_' + new_ID).html(chkVal);
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
                                    console.log(1);
                                    $('#preview_'+id).attr('src', URL.createObjectURL(f));
                                }
                            } else {
                            }
                        }
                    }
                }
                if (type == 'select-one') {
                    if ($(this).siblings('p').length == 0) {
                        var chkVal = $('select[name="'+name+'"]').find('option:selected').val();
                        var new_ID = $(this).siblings('input').attr('id');
                        $('#preview_' + new_ID).html(chkVal);
                    } else {
                        var chkVal = $(this).siblings('p').text();
                        var new_id = $(this).siblings('p').attr('id');
                        $('#preview_' + new_id).html(chkVal);
                    }
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
                    // console.log(preview_el, key, index);//
                    if (type == 'file') {
                        // console.log('here')
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
            $('.append_rank > .member_list').each(function(index){
                var mapKey = new Array('member_name', 'member_id' ,'member_mobile', 'member_age', 'member_sex', 'member_height', 'member_school_name', 'member_school_address', 'member_pic', 'member_id_type', 'member_passport');
                for (var i = 0; i < mapKey.length; i++) {
                    var key = mapKey[i];
                    var $el = $($(this).find('.'+key)[0]);
                    var type = $el.prop('type');
                    var val = $el.val();
                    // console.log($el);
                    if(type == 'radio')
                    {
                        val = $($(this)).find('.'+key+":checked").val();
                    }
                    var preview_el = '#preview_'+index+'_'+key;

                    if (type == 'file') {
                        console.log('there')
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

        var addMemberList = (function() {
            var memberListNum = 0;
            return function() {
                var tmpl = $.templates("#Memberlist");
                var rawHtml = tmpl.render({
                    'index': memberListNum,
                    'type': 'member'
                });
                $('.append_rank').append(rawHtml);
                var year = 'year_member' + (memberListNum);
                var month = 'month_member' + (memberListNum);
                var day = 'day_member' + (memberListNum);
                new YMDselect(year, month, day);
                rebindVlidation();
                memberListNum++;
            }
        })();
        var addleaderList = (function() {
            var leaderListNum = 0;
            return function() {
                var tmpl = $.templates("#Memberlist");
                var rawHtml = tmpl.render({
                    'index': leaderListNum,
                    'type': 'leader'
                });
                $('.leader_info .other_leader').append(rawHtml);
                var year = 'year_leader' + (leaderListNum);
                var month = 'month_leader' + (leaderListNum);
                var day = 'day_leader' + (leaderListNum);
                new YMDselect(year, month, day);
                rebindVlidation();
                leaderListNum++;
            }
        })();


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
                    rebindVlidation();
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
                var mobile = $('#contact_mobile_info').val();
                var email = $('#contact_email_info').val();
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
                addMemberList();
                rebindVlidation();
                $('.add_leader').click();
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
            //添加领队列表

            $('.add_leader').click(function(event) {
                if ($('.all_info .other_leader .leader_list').length > 1) {
                    $('.add_leader').css({
                        'pointer-events': 'none',
                        'background': '#ccc'
                    });
                }else {
                    $('.add_leader').css({
                        'pointer-events': 'auto',
                        'background': '#587BEF'
                    });
                    addleaderList();
                    rebindVlidation();
                }
            });

            var tabIndex = 0;
            // 点击切换 进行下一步
            $('.btn_next').click(function(){
                var num = $('.append_rank .menber_list').length + 1 + $('.other_leader .leader_list').length;
                $('#participant').text(num);
                $('#participant-input').val(num);
                var price = $('#average_amount option:selected').val();
                var total = num * price;
                $('#total_cost').text(total);
                $('#total_cost_input').val(total);
                var prevent = false;
                var $inputs = $($('.all_info .div_tab').get(tabIndex)).find('input').each(function() {
                    var ret = validField(this);
                    if (!ret) {
                        prevent = true;
                    }
                });
                if (!prevent) {
                    tabIndex +=1;
                }
                rebindVlidation();
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
            $('#competition_name').change();
        });// end of $(function())
        //  阅读报名须知
        $('#btn-read').click(function (){
            $('.instructions').removeClass('active');
            $('.content').addClass('active');
        })
        // 发送手机验证码
        $('#tel').click(function() {
            if ($('#contact_mobile').val()=="") {
                $('#contact_name').val($('.other_leader .leader_list').eq(0).find('.name').val());
                $('#contact_mobile').val($('.other_leader .leader_list').eq(0).find('.tel').val());
                $('#contact_email').val($('.other_leader .leader_list').eq(0).find('.mail').val());
                $('#contact_remark').val($('.other_leader .leader_list').eq(0).find('.remarks').val());
            }else {

            }
            var partten = /^1[3,4,5,7,8,9]\d{9}$/;
            var partten = /^1\d{10}$/;
            if(partten.test($('#contact_mobile').val())){
               $('.identifying').addClass('active');
               $('#tipes i').html($('#contact_mobile').val());
               // countdown();
            }else {
            }
        });
        // IE有关的判断;
        $('.falseCodeAlert').click(function(){
            $(this).css('display', 'none');
        })
        var nations = ["汉族","蒙古族","回族","藏族","维吾尔族","苗族","彝族","壮族","布依族","朝鲜族","满族","侗族","瑶族","白族","土家族", "哈尼族","哈萨克族","傣族","黎族","傈僳族","佤族","畲族","高山族","拉祜族","水族","东乡族","纳西族","景颇族","柯尔克孜族", "土族","达斡尔族","仫佬族","羌族","布朗族","撒拉族","毛南族","仡佬族","锡伯族","阿昌族","普米族","塔吉克族","怒族", "乌孜别克族", "俄罗斯族","鄂温克族","德昂族","保安族","裕固族","京族","塔塔尔族","独龙族","鄂伦春族","赫哲族","门巴族","珞巴族","基诺族"];
         //声明比赛大项目
        var game_name = ["未来世界", "博思威龙", "工业时代", "部落战争——攻城大师", "智造大挑战", "创客生存挑战赛"]; //直接声明Array
         //声明比赛的子项目
        // var game_type = [
        //     ["WRO常规赛", "EV3足球赛", "WRO创意赛-'可持续发展'"],
        //     ["VEX-EDR'步步为营'工程挑战赛", "VEX-IQ'环环相扣'工程挑战赛", "BDS机器人工程挑战赛——'长城意志'"],
        //     ["能力风暴——WER能力挑战赛", "能力风暴——WER能力挑战赛工程创新赛", "能力风暴——WER普及赛"],
        //     ["部落战争——攻城大师"],
        //     ["智造大挑战"],
        //     ["创客生存挑战赛"]
        // ];
        // var game_object = [
        //         [
        //             ["小学", "初中", "高中", "大专"],
        //             ["小学", "中学(含初高中)"],
        //             ["小学", "中学(含初高中)"],
        //         ],
        //         [
        //             ["中学(含小初)", "高中"],
        //             ["小学", "初中"],
        //             ["小初高"]
        //         ],
        //         [
        //             ["小学", "初中", "高中"],
        //             ["小学", "初中", "高中"],
        //             ["小学", "初中"]
        //         ],
        //         [
        //             ["小学", "初中", "高中"]
        //         ],
        //         [
        //             ["中学(含小初)", "高中"]
        //         ],
        //         [
        //             ["小学", "初中"]
        //         ]
        //     ]
        // var pIndex = -1;
        // var preEle = document.getElementById("competition_name");
        // var cityEle = document.getElementById("competition_type");
        // var areaEle = document.getElementById("competition_group");
        // for (var i = 0; i < game_name.length; i++) {
        //     var op = new Option(game_name[i], i);
        //     // if (i == 0) {
        //     //     op = new Option(game_name[i], i);
        //     // }
        //     preEle.options.add(op);
        // }
        // function chg(obj) {
        //     if (obj.value == -1) {
        //         cityEle.options.length = 0;
        //         areaEle.options.length = 0;
        //     }
        //     var val = obj.value;
        //     pIndex = obj.value;
        //     var cs = game_type[val];
        //     var as = game_object[val][0];
        //     cityEle.options.length = 0;
        //     areaEle.options.length = 0;
        //     for (var i = 0; i < cs.length; i++) {
        //         //  type
        //         var op = new Option(cs[i], cs[i]);
        //         cityEle.options.add(op);
        //     }
        //     for (var i = 0; i < as.length; i++) {
        //         //  group
        //         var op = new Option(as[i], as[i]);
        //         areaEle.options.add(op);
        //     }
        //     if(($('#competition_name option').text() == "智造大挑战") || ($('#competition_name option').text() == "智造大挑战")){
        //         $('#competition_name').css({
        //             'height': '0',
        //             'margin-bottom': '0',
        //             'border': 'none'
        //         });
        //     }else {
        //         $('#competition_name').css({
        //             'height': '30px',
        //             'margin-bottom': '30px',
        //             'border': '1px solid #CCCCCC'
        //         });
        //     }
        // }
        // function chg2(obj) {
        //     var val = obj.selectedIndex;
        //     var as = game_object[pIndex][val];
        //     areaEle.options.length = 0;
        //     for (var i = 0; i < as.length; i++) {
        //         var op = new Option(as[i], as[i]);
        //         areaEle.options.add(op);
        //     }
        // }

        function dox1(obj) {
            var ieVersion = detectIE();
            if(ieVersion == 'ie8'){
                if (obj) {
                    // console.log("图片预览")
                    obj.select();
                    obj.blur();
                    var nfile = document.selection.createRange().text;
                    document.selection.empty();
                    document.getElementById("preview_leader_pic").style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src='"+nfile+"')";
                    document.getElementById("preview_leader_pic").style.backgroundImage="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src='"+nfile+"')";
                } else {
                    // console.error("文件不存在")
                }
            }
            else if(ieVersion == 'ie9'){
                if (obj) {
                    obj.select();
                    obj.blur();
                    var nfile = document.selection.createRange().text;
                    document.selection.empty();
                    document.getElementById("preview_leader_pic").style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src='"+nfile+"')";
                    document.getElementById("preview_leader_pic").style.backgroundImage="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src='"+nfile+"')";
                } else {
                    // 文件不存在
                }
            } else {
                // 非ie 8 9 版本
            }
        }
        function dox2(obj, id) {
            var ieVersion = detectIE();
            if(ieVersion == 'ie8'){
                if (obj) {
                    obj.select();
                    obj.blur();
                    var nfile = document.selection.createRange().text;
                    document.selection.empty();
                    document.getElementById(id).style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src='"+nfile+"')";
                    document.getElementById(id).style.backgroundImage="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src='"+nfile+"')";            } else {
                    // 文件不存在
                }
            }
            else if(ieVersion == 'ie9'){
                if (obj) {
                    obj.select();
                    obj.blur();
                    var nfile = document.selection.createRange().text;
                    document.selection.empty();
                    document.getElementById(id).style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src='"+nfile+"')";
                    document.getElementById(id).style.backgroundImage="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src='"+nfile+"')";
                } else {
                    // 文件不存在
                }
            } else {
                // 非ie 8 9 版本
            }
        }
        // 改变出生年月日
        function changeDay(obj) {
            var new_age = $(obj).siblings('.y').find('option:selected').text() +'-'+ $(obj).siblings('.m').find('option:selected').text() +'-'+ $(obj).find('option:selected').text();
            // $(obj).siblings('input').val(new_age);
            $(obj).siblings('p').text(new_age);
        }
        // 改变证件类型
        function changeType(obj) {
            $(obj).find('option:contains("请选择")').remove();
            if ($(obj).find('option:selected').text() == "身份证") {
                $(obj).parents('.input-field').siblings('.input-field').find('.id_number').attr('data-type', 'ID');
            } else {

            }
            $(obj).parents('.input-field').siblings('.input-field').find('input').removeClass('id_number');
        };
        function addOption(obj) {
            nations.forEach(function(val) {
                var option = '';
                option += '<option value="'+val+'">'+val+'</option>';
                $(obj).find('option:last-child').after(option);
            })
        }
        // 调整学校参赛项目
        function add_type_team() {
            var type = $('#competition_type_val').val();
            var group = $('#competition_group_val').val();
            game_type.forEach(function(val, index) {
                val.forEach(function(v, i) {
                    $('#competition_name_val').val(game_name[i]);
                    $('#competition_name').find('option:conta')
                    $('#competition_name option').removeAttr('selected');
                    $('#competition_name option:contains("'+game_name[i]+'")').attr("selected", "true")
                    $('#competition_type option').removeAttr('selected');
                    $('#competition_type option:contains("'+type+'")').attr("selected", "true")
                    $('#competition_group option').removeAttr('selected');
                    $('#competition_group option:contains("'+group+'")').attr("selected", "true")
                });
            })
        }
    </script>

    <script id="Memberlist" type="text/x-jsrender">
        <div class="clearfix  @{{:type}}_list">
            <div class="delete"><i class="icon kenrobot ken-close"></i></div>
            <div class="input-field">
                <span class="input-label">姓名  :</span>
                <input data-type="character" required tip-warn="" tip-info="仅支持英文、汉字" class="input-field-text name" id="@{{:type}}_@{{:index}}_name" name="@{{:type}}[@{{:index}}][name]" type="text" value="">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">性别  :</span>
                <input class="input-radio man @{{:type}}_sex" type="radio" checked name="@{{:type}}[@{{:index}}][sex]" value="男"><span>男</span>
                <input class="input-radio woman @{{:type}}_sex" type="radio" name="@{{:type}}[@{{:index}}][sex]" value="女"><span>女</span>
                <p id="@{{:type}}_@{{:index}}_sex"></p>
            </div>
            <div class="input-field">
                <span class="input-label">民族  :</span>
                <select name="@{{:type}}[@{{:index}}][nation]" class="input-field-text nations_select">
                    <option value="请选择">请选择</option>
                </select>
                <input type="hidden" id="@{{:type}}_@{{:index}}_nation">
            </div>
            <div class="input-field ymd">
                <span class="input-label">出生日期  :</span>
                <select class="y" name="year_@{{:type}}@{{:index}}" style="height: 30px;margin-bottom: 30px; margin-right: 5px;"></select>
                <select class="m" name="month_@{{:type}}@{{:index}}" style="height: 30px;margin-bottom: 30px; margin-right: 5px;"></select>
                <select class="d" name="day_@{{:type}}@{{:index}}" style="height: 30px;margin-bottom: 30px; margin-right: 5px;" onchange="changeDay(this)"></select>
                <!-- <input type="hidden" id="leader_@{{:index}}_age" name="leader_@{{:index}}_age" /> -->
                <p id="@{{:type}}_@{{:index}}_age" name="@{{:type}}[@{{:index}}][age]" style="display: none;"></p>
                <input required type="hidden" id="@{{:type}}_@{{:index}}_age_val" name="" />
            </div>
            <div class="input-field">
                <span class="input-label">身高  :</span>
                <input data-type="heightNum" required tip-info="请填写真实的身高(cm为单位)" class="input-field-text"  id="@{{:type}}_@{{:index}}_height" type="text" name="@{{:type}}[@{{:index}}][height]" value="">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">工作单位  :</span>
                <input data-type="schoolname" required tip-info="请填写工作单位" class="input-field-text"  id="@{{:type}}_@{{:index}}_work_unit" type="text" name="@{{:type}}[@{{:index}}][work_unit]" value="">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">证件类型  :</span>
                <select name="@{{:type}}[@{{:index}}][ID_type]" class="input-field-text" onchange="changeType(this);">
                    <option value="请选择">请选择</option>
                    <option value="身份证">身份证</option>
                    <option value="内地通行证">内地通行证</option>
                    <option value="台胞证">台胞证</option>
                    <option value="护照">护照</option>
                    <input type="hidden" id="@{{:type}}_@{{:index}}_ID_type">
                </select>
            </div>
            <div class="input-field">
                <span class="input-label">证件号码  :</span>
                <input tip-info="请填写证件号码" required class="input-field-text id_number" id="@{{:type}}_@{{:index}}_ID_number" type="text" name="@{{:type}}[@{{:index}}][ID_number]" value="">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">户籍地址  :</span>
                <input data-type="schoolname" required tip-info="请填写户籍地址" class="input-field-text"  id="@{{:type}}_@{{:index}}_register_address" type="text" name="@{{:type}}[@{{:index}}][register_address]" value="">
                <div class="tips"></div>
            </div>
            <div class="input-field">
                <span class="input-label">现居详情  :</span>
                <input data-type="schoolname" required tip-info="请填写现居详情" class="input-field-text"  id="@{{:type}}_@{{:index}}_home_address" type="text" name="@{{:type}}[@{{:index}}][home_address]" value="">
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
                <input tip-info="格式 PNG/JPG 文件大小 <= 2M" accept="image/jpeg,image/png" required name="@{{:type}}[@{{:index}}][pic]" id="@{{:type}}[@{{:index}}]_pic" type="file" class="inputstyle @{{:type}}_pic"  onchange="dox2(this, 'preview_@{{:index}}_@{{:type}}_pic')">
                <div class="tips"></div>
            </div>
        </div>
    </script>

    <script id="tmpl_options" type="text/x-jsrender">
        @{{for options}}
            <option value="@{{: #index + 1}}"> @{{: #data}}</option>}
        @{{/for}}
    </script>
    <script>
        // 动态生成 option List (HTML)
        function generateOptions(data) {
            var tmpl = $.templates('#tmpl_options');
            return tmpl.render({'options': data})
        };

        var data = {!! $competitonsJson !!};

        addCompetitons();
        function addCompetitons() {
            var arr = [];
            for (key in data){
                arr.push(data[key]['name']);
            }
            $('#competition_first').html(generateOptions(arr))
        }

        function getOptions(level, key) {
            if (key ==0) {
                return data;
            }
            var arr = [];
            for (index in data[level]['children']) {
                console.log(index);
                arr.push(index);
            }
            return arr;
        }

        $('.select-box').change(function() {
            var level = $(this).attr('level');
            var key = $(this).find('option:selected').val();
            var options_data = getOptions(level, key);
            var options_html = generateOptions(options_data);
            console.log(key, options_data);
            if (level == 1) {
                $('#competition_second').html(options_html);
                $('#competition_second').find('option').removeAttr('selected');
                $('#competition_second').find('option').eq(0).attr('selected', 'true');
            };
            if (level == 2) {
                $('#competition_third').html(options_html);
                $('#competition_third').find('option').removeAttr('selected');
                $('#competition_third').find('option').eq(0).attr('selected', 'true');
            }
            if (level == 3) {

            }
        });

    </script>
</body>
</html>
