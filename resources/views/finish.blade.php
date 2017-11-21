<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/finish.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/print-finish.css')}}" media="print" />
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js')}}"></script>
</head>
<body>
    <div class="main">
        <div class="top">
            <div class="inner">
                <img src="{{ asset('assets/img/logo1-beijing.png')}}" alt="">
            </div>
        </div>
        <div class="mid">
            <div class="successAlert" id="successAlert">
                <span>您的信息已提交成功,如需修改,请重新查询并完善您的信息!</span>
            </div>
            <div class="title_top">
                <ul>
                    <li>RoboCom国际公开赛-青少年人工智能编程挑战赛</li>
                </ul>
                <div class="clearfix clear"></div>
            </div>
            <a href="/information" class="returnToIndex">返回首页</a>
            <div class="username_info">
                <span class=""><i id="username">{{Auth::user()->name}}</i>, 您已成功登录</span>
                <a href="/logout">退出登录</a>
            </div>
            <input class="button-print" type="button" value="打印" onclick="window.print()">
            <div class="all_info clearfix clear">
                <div class="active team_info div_tab">
                    <div class="leader" id="team">
                        <span class="leader_title">队伍信息</span>
                        <div class="cut"></div>
                        <span class="name">队伍编号 :</span>
                        <span id="preview_team_no" class="name_input">{{$teamData['team_no'] or ''}}</span>
                        <div class="clearfix clear"></div>
                        <span class="name">队伍名称 :</span>
                        <span id="preview_team_name" class="name_input">{{$teamData['team_name'] or ''}}</span>
                        <div class="clearfix clear"></div>
                        <span class="name">赛事项目 :</span>
                        <span id="preview_school_name" class="name_input">{{$teamData['competition_1'] or ''}}</span>
                        <div class="clearfix clear"></div>
                        <span class="name">组别 :</span>
                        <span id="preview_school_address" class="name_input">{{$teamData['competition_3'] or ''}}</span>
                        <div class="clearfix clear"></div>
                        <span class="name">队伍备注 :</span>
                        <span id="preview_competition_name" class="name_input">{{$teamData['remarks'] or ''}}</span>
                        <div class="clearfix clear"></div>
                        <span class="name">联系人姓名 :</span>
                        <span id="preview_contact_name" class="name_input">{{$teamData['contact_name'] or ''}}</span>
                        <div class="clearfix clear"></div>
                        <span class="name">联系人电话 :</span>
                        <span id="preview_contact_mobile" class="name_input">{{$teamData['contact_mobile'] or ''}}</span>
                        <div class="clearfix clear"></div>
                        <span class="name">联系人邮箱 :</span>
                        <span id="preview_contact_email" class="name_input">{{$teamData['contact_email'] or ''}}</span>
                        <div class="clearfix clear"></div>
                        <span class="name" style="margin-bottom: 20px;">联系人备注 :</span>
                        <span id="preview_contact_remark" class="name_input">{{$teamData['contact_remark'] or ''}}</span>
                        <div class="clearfix clear"></div>
                    </div>
                    <div class="leader" id="leader">
                        <div class="leader_list">
                            @foreach($teamData['members'] as $teamMember)
                                @if($teamMember['type'] == 'leader')
                                <div class="leader_info clearfix">
                                    <span class="name">姓名 :</span>
                                    <span  class="name_input">{{$teamMember['name'] or ''}}</span>
                                    <div class="clearfix clear"></div>
                                    <span class="name">性别 :</span>
                                    <span class="name_input">{{$teamMember['sex'] or ''}}</span>
                                    <div class="clearfix clear"></div>
                                    <span class="name">年龄 :</span>
                                    <span  class="name_input">{{$teamMember['age'] or ''}}</span>
                                    <div class="clearfix clear"></div>
                                    <span class="name">工作单位 :</span>
                                    <span  class="name_input">{{$teamMember['work_unit'] or ''}}</span>
                                    <div class="clearfix clear"></div>
                                    <span class="name">证件类型 :</span>
                                    <span  class="name_input">{{$teamMember['idcard_type'] or ''}}</span>
                                    <div class="clearfix clear"></div>
                                    <span class="name">证件号码 :</span>
                                    <span  class="name_input">{{$teamMember['idcard_no'] or ''}}</span>
                                    <div class="clearfix clear"></div>
                                    <span class="name">联系地址 :</span>
                                    <span  class="name_input">{{$teamMember['home_address'] or ''}}</span>
                                    <div class="clearfix clear"></div>
                                    <span class="name">手机号码 :</span>
                                    <span  class="name_input">{{$teamMember['mobile'] or ''}}</span>
                                    <div class="clearfix clear"></div>
                                    <span class="name">邮箱 :</span>
                                    <span  class="name_input">{{$teamMember['email'] or ''}}</span>
                                    <div class="clearfix clear"></div>
                                    <span class="name">学校校长姓名 :</span>
                                    <span  class="name_input">{{$teamMember['headmaster'] or ''}}</span>
                                    <div class="clearfix clear"></div>
                                    <span class="name">备注 :</span>
                                    <span  class="name_input">{{$teamMember['remark'] or ''}}</span>
                                    <div class="clearfix clear"></div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="all_number">
                        <span class="leader_title">队员信息</span>
                        <div class="team_number clearfix" id="number">
                            @foreach($teamData['members'] as $teamMember)
                                @if($teamMember['type'] == 'member')
                                <div class="member_info">
                                    <span class="name">姓名 :</span>
                                    <span  class="name_input">{{$teamMember['name'] or ''}}</span>
                                    <div class="clearfix clear"></div>
                                    <span class="name">性别 :</span>
                                    <span class="name_input">{{$teamMember['sex'] or ''}}</span>
                                    <div class="clearfix clear"></div>
                                    <span class="name">年龄 :</span>
                                    <span  class="name_input">{{$teamMember['age'] or ''}}</span>
                                    <div class="clearfix clear"></div>
                                    <span class="name">学校 :</span>
                                    <span  class="name_input">{{$teamMember['school'] or ''}}</span>
                                    <div class="clearfix clear"></div>
                                    <span class="name">班级 :</span>
                                    <span  class="name_input">{{$teamMember['class'] or ''}}</span>
                                    <div class="clearfix clear"></div>
                                    <span class="name">证件类型 :</span>
                                    <span  class="name_input">{{$teamMember['idcard_type'] or ''}}</span>
                                    <div class="clearfix clear"></div>
                                    <span class="name">证件号码 :</span>
                                    <span  class="name_input">{{$teamMember['idcard_no'] or ''}}</span>
                                    <div class="clearfix clear"></div>
                                    <span class="name">学生监护人 :</span>
                                    <span  class="name_input">{{$teamMember['guarder'] or ''}}</span>
                                    <div class="clearfix clear"></div>
                                    <span class="name">关系 :</span>
                                    <span  class="name_input">{{$teamMember['relation'] or ''}}</span>
                                    <div class="clearfix clear"></div>
                                    <span class="name">手机号码 :</span>
                                    <span  class="name_input">{{$teamMember['mobile'] or ''}}</span>
                                    <div class="clearfix clear"></div>
                                    <span class="name">联系地址 :</span>
                                    <span  class="name_input">{{$teamMember['home_address'] or ''}}</span>
                                    <div class="clearfix clear"></div>
                                    <span class="name">邮箱 :</span>
                                    <span  class="name_input">{{$teamMember['email'] or ''}}</span>
                                    <div class="clearfix clear"></div>
                                    <span class="name" style="margin-bottom: 20px;">备注 :</span>
                                    <span  class="name_input">{{$teamMember['remark'] or ''}}</span>
                                    <div class="clearfix clear"></div>
                                </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                    <div class="pays clearfix" id="pays">
                        <span class="leader_title">开票信息</span>
                        <div class="cut"></div>
                        <span class="name">开票类型 :</span>
                        <span id="preview_pinvoice_type" class="name_input" >{{$teamData['invoice_type'] or ''}}</span>
                        <div class="clearfix clear"></div>
                        <span class="name">发票抬头 :</span>
                        <span id="preview_invoice_title" class="name_input" >{{$teamData['invoice_title'] or ''}}</span>
                        <div class="clearfix clear"></div>
                        <span class="name">统一社会信用代码 :</span>
                        <span id="preview_invoice_code" class="name_input" >{{$teamData['invoice_code'] or ''}}</span>
                        <div class="clearfix clear"></div>
                        <span class="name">开票金额 :</span>
                        <span id="preview_invoice_money" class="name_input" >{{$teamData['invoice_money'] or ''}}</span>
                        <div class="clearfix clear"></div>
                        <span class="name">收件地址 :</span>
                        <span id="preview_invoice_mail_address" class="name_input" >{{$teamData['invoice_mail_address'] or ''}}</span>
                        <div class="clearfix clear"></div>
                        <span class="name">收件人姓名 :</span>
                        <span id="preview_binvoice_mail_recipients" class="name_input" >{{$teamData['invoice_mail_recipients'] or ''}}</span>
                        <div class="clearfix clear"></div>
                        <span class="name">收件人电话 :</span>
                        <span id="preview_invoice_mail_mobile" class="name_input" >{{$teamData['invoice_mail_mobile'] or ''}}</span>
                        <div class="clearfix clear"></div>
                        <span class="name">收件人邮箱 :</span>
                        <span id="preview_invoice_mail_email" class="name_input" >{{$teamData['invoice_mail_email'] or ''}}</span>
                        <div class="clearfix clear"></div>
                        <span class="name">收件人备注 :</span>
                        <span id="preview_invoice_remark" class="name_input" >{{$teamData['invoice_remark'] or ''}}</span>
                        <div class="clearfix clear"></div>
                    </div>

                    <div class="clearfix clear">
                    </div>
                </div>
            </div>
        </div>
        <div class="bot">
            <div class="inner">
                <div class="logo-all">
                    <img src="{{ asset('assets/img/LOGO2.png')}}" alt="">
                    <img src="{{ asset('assets/img/logo-white-word.png')}}" alt="">
                </div>
                <span class="sp1">© 2017 RoboCom 国际公开赛组委会  |  鄂ICP备16011249号-2 </span>
                <span class="sp2">技术支持: 北京啃萝卜信息技术有限公司</span>
            </div>
        </div>
    </div>
<script type="text/javascript">
    $(function() {
        if ($('#preview_pinvoice_type').text() == '不开票') {
            $('#pays').hide();
        }


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
    })
</script>
</body>
</html>
