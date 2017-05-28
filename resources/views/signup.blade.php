<!DOCTYPE html>
<html>
<head>
    <!-- <meta http-equiv="x-ua-compatible" content="IE=9" > -->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <title>RoboCom青少年挑战赛</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/signup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/kenrobot.css')}}">
    <!-- <script src="https://cdn.bootcss.com/jQuery-Validation-Engine/2.6.4/contrib/other-validations.js"></script> -->
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
            <h2 class="instructions-h">报名须知</h2>
            <span class="instructions-span clearfix">1.报名时间截止日期：2017年6月20日23:59。</span>
            <span class="instructions-span clearfix">2.正式报名前，应仔细阅读本须知，并按要求认真填写个人基本信息，填写内容必须真实、完整、准确。如同意报名相关条款，点击“同意”后方可继续进行网上报名操作。</span>
            <span class="instructions-span clearfix"><i style="color: red;">重要提示</i>：请确保带队老师和参赛队员的姓名、身份证件类型、证件编码等个人信息的真实性和准确性，如有错误，可能导致报名失败。参赛队员的信息将用于2017年世界机器人大赛—RoboCom青少年挑战赛全国总决赛，报名人员须对其提交的错误信息造成的后果负责。</span>
            <span class="instructions-span clearfix">3.联系“总通知中”各个项目的报名负责人，索取相应的项目邀请码。</span>
            <span class="instructions-span clearfix">4.每条邀请码仅有效使用1次。请严格、谨慎的填写信息。一旦提交，将不再做修改。</span>
            <span class="instructions-span clearfix">5.注册完成后，请注意保存自己的队伍编码，以备查询核实之用。</span>
            <span class="instructions-span clearfix">6.注册资料填写完整，经组委会审核通过后，会在RoboCom官方网站进行公示s。</span>
            <span class="instructions-span clearfix">7.如对网上报名有疑问，可通过联系江城（13476000614），曾令勇（ 15899948376），李达（ 15876493817）咨询。</span>

            <h2 class="instructions-h" style="margin-top: 40px;">报名表填写说明</h2>
            <span class="instructions-span clearfix"><i class="left" style="width: 200px;">邀请码</i><i class="right">由赛项负责人提供的16位邀请码，每个邀请码只能使用一次</i></span>
            <span class="instructions-span clearfix"><i class="left" style="width: 200px;">姓名</i><i class="right">填写有效证件上的姓名，姓名只能包含汉字和英文</i></span>
            <span class="instructions-span clearfix"><i class="left" style="width: 200px;">手机号码</i><i class="right">填写11位有效手机号码。如参赛选手没有手机则须填写带队老师或监护人手机号码。</i></span>
            <span class="instructions-span clearfix"><i class="left" style="width: 200px;">邮箱</i><i class="right">填写有效邮箱地址</i></span>
            <span class="instructions-span clearfix"><i class="left" style="width: 200px;">身份证号</i><i class="right">填写有效18位居民身份证号。</i></span>
            <span class="instructions-span clearfix"><i class="left" style="width: 200px;">照片</i><i class="right">须上传2寸免冠登记照</i></span>
            <span class="instructions-span clearfix"><i class="left" style="width: 200px;">队伍名称</i><i class="right">填写参赛队伍的名称，不接受已存在的队伍名称</i></span>
            <span class="instructions-span clearfix"><i class="left" style="width: 200px;">学校/单位名称</i><i class="right">填写所属学校或单位名称</i></span>
            <span class="instructions-span clearfix"><i class="left" style="width: 200px;">学校/单位地址</i><i class="right">填写所属学校或单位地址</i></span>
            <span class="instructions-span clearfix"><i class="left" style="width: 200px;">赛事项目</i><i class="right">选择队伍参加的赛项</i></span>
            <span class="instructions-span clearfix"><i class="left" style="width: 200px;">子赛项</i><i class="right">选择参队伍加的子赛项</i></span>
            <span class="instructions-span clearfix"><i class="left" style="width: 200px;">组别</i><i class="right">选择参队伍加的组别</i></span>
            <span class="instructions-span clearfix"><i class="left" style="width: 200px;">性别</i><i class="right">填写真实年龄</i></span>
            <span class="instructions-span clearfix"><i class="left" style="width: 200px;">年龄</i><i class="right">填写真实性别</i></span>
            <span class="instructions-span clearfix"><i class="left" style="width: 200px;">身高</i><i class="right">填写真实身高（用于制定活动用T恤尺寸）</i></span>
            <span class="instructions-span clearfix"><i class="left" style="width: 200px;">验证码</i><i class="right">填写发送到领队手机的6位数验证码</i></span>
            <div class="clear"></div>
            <a id="btn-read" type="button">我同意</a>
            <span class="span-read">阅读,并同意</span>
            <input type="checkbox" id="input-read" name="" value=""/>
        </div>
        <div class="content">
            <form id="form" name="form" action="/signup" enctype="multipart/form-data" method="POST" novalidate>
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
                            <input required tip-warn="不能为空" tip-warn="" tip-info="输入邀请码" class="input-field-text" id="invitecode" name="invitecode" type="text" value="{{old('invitecode')}}">
                            <!-- <input type="hidden" name="out_trade_no" id="out_trade_no"> -->
                            <div class="tips"></div>
                        </div>
                        <div class="input-field">
                            <span class="input-label">姓名  :</span>
                            <input data-type="character" required tip-warn="" tip-info="仅支持英文、汉字" class="input-field-text" id="leader_name" name="leader_name" type="text" value="{{old('leader_name')}}">
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
                            <input required data-type="ID" tip-info="仅支持数字以及个别英文" class="input-field-text" id="leader_id" name="leader_id" type="text" value="{{old('leader_id')}}">
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
                            <input type="file" data-picurl="{{session('leader_pic_preview')}}" tip-info="格式 PNG/JPG 文件大小 <= 2M" accept="image/jpeg,image/png" required name="leader_pic" id="leader_pic" class="inputstyle" value='' onchange="dox1(this)">
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
                            <select id="competition_name" name="competition_name" onchange="chg(this);">
                                <!-- <option value ='-1' selected = "selected">未来世界</option> -->
                            </select>
                        </div>
                        <div class="input-field">
                            <select id="competition_type" name="competition_type" onchange="chg2(this)" style="margin-left: 130px;">
                                <!-- <option value ='WRO常规赛' selected = "selected">WRO常规赛</option> -->
                            </select>
                        </div>
                        <div class="input-field">
                            <span class="input-label">组别  :</span>
                            <select id="competition_group" name="competition_group">
                                <!-- <option value ='小学' selected = "selected">小学</option> -->
                            </select>
                        </div>
                        <button type="button" class="btn_pre">上一步</button>
                        <button id="checkTeamName" type="button" class="btn_next">下一步</button>
                    </div>
                    <div class="append_rank div_tab">
                        <span class="title-span">*添加队员人数最多为9人</span>
                        <?php $i = 0 ?>
                        @foreach((array)old('members') as $member)
                        <div class="menber_list">
                            <div class="delete"><i class="icon kenrobot ken-close"></i></div>
                            <div class="input-field">
                                <span class="input-label">队员姓名{{$i}}:</span>
                                <input data-type="character" required tip-info="仅支持汉字、英文" name="members[{{$i}}][name]" class="input-field-text member_name" type="text" value="{{$member['name']}}">
                                <div class="tips"></div>
                            </div>
                            <div class="input-field">
                                <span class="input-label">身份证号  :</span>
                                <input data-type="ID" required data-type="ID" tip-info="请输入合法的身份证号格式" name="members[{{$i}}][ID]" class="input-field-text member_id" type="text" value="{{$member['ID']}}">
                                <div class="tips"></div>
                            </div>
                            <div class="input-field">
                                <span class="input-label">手机号码  :</span>
                                <input data-type="mobile" required tip-info="仅支持英文、数字、下划线" name="members[{{$i}}][mobile]" class="input-field-text member_mobile" type="text" value="{{$member['mobile']}}">
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
                                <input required tip-warn="" tip-info="仅支持数字,以厘米为单位" name="members[{{$i}}][height]" class="input-field-text member_height" type="text" value="{{$member['height']}}">
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
                        <div class="input-field" style="display: none;">
                            <span class="input-label">缴费方式:</span>
                            <input class="input-radio man" type="radio" name="payment" checked="checked" value="在线支付"><span>在线支付(仅支持支付宝)</span>
                            <input class="input-radio woman" type="radio" name="payment" disabled value="现场缴费"><span style="color: #ccc" >现场缴费(暂不支持)</span>
                        </div>
                        <div class="enroll-notice">
                            <h4>缴费流程如下：</h4>
                            <p>在线报名完成后，请根据自己所报赛项联系相应的项目参赛联系人缴费（请保留在线报名的队伍编码和转账成功的截图以方便核实）。2017年6月20日23:59后未缴费的队伍将被视为报名失败。</p>
                            <span>1.联系相关项目的收费负责人。</span>
                            <span>a):“博思威龙”、“工业时代”两个项目参赛交费联系人：曾令勇 15899948376</span>
                            <span>b):“攻城大师”、“智造大挑战” 两个项目参赛交费联系人：李达 15876493817</span>
                            <span>c) 座机：027-84692577</span>
                            <span>2.核实参赛队伍是否报名成功。并核实参赛人数。</span>
                            <span>3.支付参赛注册费</span>
                            <span style="font-weight: bold;">付款对公账户：</span>
                            <span>开户名称：北京工道动力机器人技术研究院</span>
                            <span>开户银行：锦州银行股份有限公司北京分行</span>
                            <span>开户行号：313100022226</span>
                            <span>银行账号：410100203296687</span>
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
                            <img style="" id="preview_leader_pic" src="" >
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
                        </div>
                        <div class="all_number">
                            <span class="leader_title">队员信息</span>
                            <div class="team_number" id="number">
                                @for($i = 0; $i< 10; $i++)
                                <div id="member_info_{{$i}}" class="member_info" style="display: none;">
                                    <div class="cut"></div>
                                    <div class="input-field">
                                        <span class="name">队员姓名 :</span>
                                        <span data-type="character" id="{{'preview_'.$i.'_member_name'}}" class="name_input"></span>
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
                                        <span class="name">身高(单位:cm) :</span>
                                        <span id="{{'preview_'.$i.'_member_height'}}" class="name_input"></span>
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
                        <!-- <div class="pays clearfix" id="pays">
                            <span class="leader_title">缴费信息</span>
                            <div class="cut"></div>
                            <span class="name">支付方式 :</span>
                            <span id="preview_payment" class="name_input" ></span>
                        </div> -->
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
        //数字 英文 汉字
        function isMathEngCha(val) {
            reg= /^[\w\u4e00-\u9fa5][\s\w\u4e00-\u9fa5]*(?!\s)$/gi;
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
            var name = $el.prop('name');
            var type = $el.prop('type');
            var id = $el.prop('id');
            var val = $el.val();
            var datatype = $el.data('type');// 数据类型 email , mobile , ID,
            if (type == 'file') {
                // console.log($el.attr('required'));
                // console.log(val);
                // console.log(';;;;;;;;;;;;;;');
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
                    // console.log($el)
                    return false;
                }
                if (datatype == 'character' && !isName(val)) {
                    $el.tipWarn('姓名不能是数字或特殊字符，请重新输入!');
                    return false;
                }
                if (datatype == 'schoolname' && !isMathEngCha(val)) {
                    $el.tipWarn('允许输入汉字英文数字空格,切首位不能为空格!');
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
                        // console.dir($(this));
                        // $(this).val(f.name);
                        $(this).siblings('.file_name').html(f.name);
                    }
                }
             });
            // 添加删除按钮
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
                var validcode = false;
                $.ajax({
                    type:"post",
                    url:"{{url('/verificationcode/verify')}}",
                    data:{"verificationcode": $('#verificationcode').val()},
                    async:false,
                    success:function(res) {
                        if (res.status == 0) {
                            // console.log('通过验证');
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
                // console.log('valid', validcode);
                return false;
            });

            $("#submit").unbind("click").click(function() {
                $("#form").submit();
            });
            $('.codeError .close').unbind('click').click(function() {
                $('.codeError').removeClass('active');
            });
        }
        function detectIE()
        {
            var browser=navigator.appName
            var b_version=navigator.appVersion
            var version=b_version.split(";");
            var trim_Version=version[1].replace(/[ ]/g,"");
            if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE8.0") {
                return 'ie8';
            }
            if (browser=="Microsoft Internet Explorer" && trim_Version=="MSIE9.0") {
                return 'ie9';
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
                    // $('#preview_competition_name').html($('#competition_name  option:selected').text())
                    // $('#preview_' + id).html(val);
                }
                if (type == 'text' || type == 'select-one') {
                    // console.log('id:'+id);
                    // console.log('val:'+val);
                    // console.log(this)

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
            });
            $('.append_rank > .menber_list').each(function(index){
                var mapKey = new Array('member_name', 'member_id' ,'member_mobile', 'member_age', 'member_sex', 'member_height', 'member_school_name', 'member_school_address', 'member_pic');
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
                                    // console.log('111')
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
            if ($('#team_id').text() == "") {
                $('#team_id').parents('.input-field').css('display', 'none');
            }
        }
        $(function(){
            $('#input-read').click(function (){
                // console.log($('#input-read').prop("checked"))
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
                    // console.log(1);
                } else {
                    // console.log(0);
                    $('#append_rank_new').click();
                }
            }, 1000)
            // 点击刷新验证码图片
            $('.identifying .showBox img').click(function (){
                // console.log(1)
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
            var memberListNum = 1;
            // 添加成员列表
            function addMemberList(){
                var memberList = '';
                memberList += '<div class="menber_list">';
                memberList += '<div class="delete"><i class="icon kenrobot ken-close"></i></div>';
                memberList += '<div class="input-field">';
                memberList += '<span class="input-label">队员姓名('+ memberListNum +'):</span>';
                memberList += '<input data-type="character" required tip-info="仅支持汉字、英文" name="members['+memberListNum+'][name]" class="input-field-text member_name" type="text">';
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
                memberList += '<input data-type="mobile" required tip-info="仅支持英文、数字、下划线" name="members['+memberListNum+'][mobile]" class="input-field-text member_mobile" type="text">';
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
                memberList += '<input data-type="heightNum" required tip-warn="" tip-info="仅支持数字,以厘米为单位"  name="members['+memberListNum+'][height]" class="input-field-text member_height" type="text">';
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
                memberList += '<input tip-info="格式 PNG/JPG 文件大小 <= 2M" accept="image/jpeg,image/png" required name="members['+memberListNum+'][pic]" id="" type="file" class="inputstyle member_pic"  onchange="dox2(this, \'preview_'+(memberListNum-1)+'_member_pic\')">';
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
            $('#competition_name').change();

        });// end of $(function())


        //  阅读报名须知
        $('#btn-read').click(function (){
            $('.instructions').removeClass('active');
            $('.content').addClass('active');
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
        // function getPayQrcode (){
        //     var validcode = false;
        //     $.ajax({
        //         type: "post",
        //         url: "{{url('/getpayqrcode')}}",
        //         data: {
        //             invitecode: $('#invitecode').val()
        //         },
        //         async: false,
        //         success: function (res) {
        //             var outTradeNo = 0;
        //             if (res.status == 0) {
        //                 // console.log(res);
        //                 $(".QRcodeShow .QEbox .QEcode img").attr('src', res.data.qrcodeimgurl);
        //                 outTradeNo = res.data.out_trade_no;
        //                 $('#out_trade_no').val(outTradeNo);
        //                 // console.log(outTradeNo)
        //                 validcode = true;
        //                 if (outTradeNo != null) {
        //                     // console.log(outTradeNo);
        //                     RefreshQrcode(outTradeNo);
        //                 }else {
        //                     // console.log('未获取到out_trade_no')
        //                 }
        //             } else if (res.status == -1) {
        //                 // console.log(res);
        //                 validcode = false;
        //             }
        //         }
        //     });
        // }
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

         //声明省
        var game_name = ["未来世界", "博思威龙", "工业时代", "部落战争——攻城大师", "智造大挑战"]; //直接声明Array
         //声明市
        var game_type = [
            ["WRO常规赛", "EV3足球赛", "WRO创意赛-'可持续发展'"],
            ["VEX-EDR'步步为营'工程挑战赛", "VEX-IQ'环环相扣'工程挑战赛", "BDS机器人工程挑战赛——'长城意志'"],
            ["能力风暴——WER能力挑战赛", "能力风暴——WER能力挑战赛工程创新赛", "能力风暴——WER普及赛"],
            ["部落战争——攻城大师"],
            ["智造大挑战"]
        ];
        var game_object = [
                [
                    ["小学", "初中", "高中", "大专"],
                    ["小学", "中学(含初高中)"],
                    ["小学", "中学(含初高中)"],
                ],
                [
                    ["中学(含小初)", "高中"],
                    ["小学", "初中"],
                    ["小初高"]
                ],
                [
                    ["小学", "初中", "高中"],
                    ["小学", "初中", "高中"],
                    ["小学", "初中"]
                ],
                [
                    ["小学", "初中", "高中"]
                ],
                [
                    ["中学(含小初)", "高中"]
                ]
            ]
        var pIndex = -1;
        var preEle = document.getElementById("competition_name");
        var cityEle = document.getElementById("competition_type");
        var areaEle = document.getElementById("competition_group");
        for (var i = 0; i < game_name.length; i++) {
            var op = new Option(game_name[i], i);
            // if (i == 0) {
            //     op = new Option(game_name[i], i);
            // }
            preEle.options.add(op);
        }
        function chg(obj) {
            if (obj.value == -1) {
                cityEle.options.length = 0;
                areaEle.options.length = 0;
            }
            var val = obj.value;
            pIndex = obj.value;
            var cs = game_type[val];
            var as = game_object[val][0];
            cityEle.options.length = 0;
            areaEle.options.length = 0;
            for (var i = 0; i < cs.length; i++) {
                //  type
                var op = new Option(cs[i], cs[i]);
                cityEle.options.add(op);
            }
            for (var i = 0; i < as.length; i++) {
                //  group
                var op = new Option(as[i], as[i]);
                // console.log(as[i], i)
                areaEle.options.add(op);
                // console.log(areaEle)
            }
            if(($('#competition_name option').text() == "智造大挑战") || ($('#competition_name option').text() == "智造大挑战")){
                $('#competition_name').css({
                    'height': '0',
                    'margin-bottom': '0',
                    'border': 'none'
                });
            }else {
                $('#competition_name').css({
                    'height': '30px',
                    'margin-bottom': '30px',
                    'border': '1px solid #CCCCCC'
                });
            }
            // console.dir($('#competition_type option:eq(0)'))
            // $('#competition_type option:eq(0)').css("display", "none");
        }
        function chg2(obj) {
            var val = obj.selectedIndex;
            var as = game_object[pIndex][val];
            areaEle.options.length = 0;
            for (var i = 0; i < as.length; i++) {
                var op = new Option(as[i], as[i]);
                areaEle.options.add(op);
            }
        }
        function dox1(obj) {
            var browser=navigator.appName
            var b_version=navigator.appVersion
            var version=b_version.split(";");
            var trim_Version=version[1].replace(/[ ]/g,"");
            if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE8.0"){
                if (obj) {
                    // console.log("图片预览")
                    obj.select();
                    obj.blur();
                    var nfile = document.selection.createRange().text;
                    document.selection.empty();
                    document.getElementById("preview_leader_pic").style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src='"+nfile+"')";
                    document.getElementById("preview_leader_pic").style.backgroundImage="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src='"+nfile+"')";            } else {
                    // console.error("文件不存在")
                }
            }
            else if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE9.0"){
                if (obj) {
                    obj.select();
                    obj.blur();
                    var nfile = document.selection.createRange().text;
                    document.selection.empty();
                    document.getElementById("preview_leader_pic").style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src='"+nfile+"')";
                    document.getElementById("preview_leader_pic").style.backgroundImage="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src='"+nfile+"')";
                } else {
                    // console.error("文件不存在")
                }
            } else {
                // console.log('非ie 8 9 版本')
            }
        }
        function dox2(obj, id) {
            // console.log(obj, id)
            var browser=navigator.appName
            var b_version=navigator.appVersion
            var version=b_version.split(";");
            var trim_Version=version[1].replace(/[ ]/g,"");
            if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE8.0"){
                if (obj) {
                    // console.log("图片预览")
                    obj.select();
                    obj.blur();
                    var nfile = document.selection.createRange().text;
                    document.selection.empty();
                    document.getElementById(id).style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src='"+nfile+"')";
                    document.getElementById(id).style.backgroundImage="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src='"+nfile+"')";            } else {
                    // console.error("文件不存在")
                }
            }
            else if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE9.0"){
                if (obj) {
                    obj.select();
                    obj.blur();
                    var nfile = document.selection.createRange().text;
                    document.selection.empty();
                    document.getElementById(id).style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src='"+nfile+"')";
                    document.getElementById(id).style.backgroundImage="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src='"+nfile+"')";
                } else {
                    // console.error("文件不存在")
                }
            } else {
                // console.log('非ie 8 9 版本')
            }
        }
    </script>
</body>
</html>
