<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/success.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/signup-print.css')}}" media="print">
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js')}}"></script>
</head>
<body>
    <div class="main">
        <div class="top">
            <div class="inner">
                <img src="{{ asset('assets/img/logo-white-word.png')}}" alt="">
            </div>
        </div>
        <div class="mid">
            <div class="successAlert" id="successAlert">
                <span>您已报名成功!</span>
            </div>

            <div class="title_top">
                <ul>
                    <li>2017世界机器人大赛-RoboCom青少年挑战赛</li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="all_info clearfix">
                <div class="active team_info div_tab">
                    <div class="leader" id="team">
                        <span class="leader_title">队伍信息</span>
                        <div class="cut"></div>
                        <span class="name">队伍编号 :</span>
                        <span id="preview_team_id" class="name_input">{{$signdata['team_no'] or ''}}</span>
                        <div class="clearfix"></div>
                        <span class="name">队伍名称 :</span>
                        <span id="preview_team_name" class="name_input">{{$signdata['team_name'] or ''}}</span>
                        <div class="clearfix"></div>
                        <span class="name">学校/单位名称 :</span>
                        <span id="preview_school_name" class="name_input">{{$signdata['school_name'] or ''}}</span>
                        <div class="clearfix"></div>
                        <span class="name">学校/单位地址 :</span>
                        <span id="preview_school_address" class="name_input">{{$signdata['school_address'] or ''}}</span>
                        <div class="clearfix"></div>
                        <span class="name">赛事项目 :</span>
                        <span id="preview_competition_type" class="name_input">{{$signdata['competition_type'] or ''}}</span>
                        <div class="clearfix"></div>
                        <span class="name">组别 :</span>
                        <span id="preview_competiton_group" class="name_input">{{$signdata['competition_group'] or ''}}</span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="leader" id="leader">
                        <span class="leader_title">领队信息</span>
                        <div class="cut"></div>
                        <span class="name">真实姓名 :</span>
                        <span  id="preview_leader_name" class="name_input" >{{$signdata['leader_name'] or ''}}</span>
                        <div class="clearfix"></div>
                        <span class="name">身份证号 :</span>
                        <span  id="preview_leader_id" class="name_input">{{$signdata['leader_id'] or ''}}</span>
                        <div class="clearfix"></div>
                        <span class="name">邮箱 :</span>
                        <span  id="preview_leader_email" class="name_input">{{$signdata['leader_email'] or ''}}</span>
                        <div class="clearfix"></div>
                        <span  class="name">手机号 :</span>
                        <span id="preview_leader_mobile" class="name_input">{{$signdata['leader_mobile'] or ''}}</span>
                        <div class="clearfix"></div>
                        <span  class="name">性别 :</span>
                        <span id="preview_leader_sex" class="name_input">{{$signdata['leader_sex'] or ''}}</span>
                        <div class="clearfix"></div>
                        <img id="preview_leader_pic" src="{{$signdata['leader_pic']}}" >
                    </div>
                    <div class="all_number">
                        <span class="leader_title">队员信息</span>
                        <div class="team_number" id="number">
                            @if($signdata['members'])
                            @foreach($signdata['members'] as $member)
                            <div class="member_info">
                                <div class="cut">
                                    <img id="preview_leader_pic" src="{{$member['pic']}}" >
                                </div>
                                <span class="name">队员姓名 :</span>
                                <span  class="name_input">{{$member['name'] or ''}}</span>
                                <div class="clearfix"></div>
                                <span class="name">身份证 :</span>
                                <span class="name_input">{{$member['ID'] or ''}}</span>
                                <div class="clearfix"></div>
                                <span class="name">手机号 :</span>
                                <span class="name_input">{{$member['mobile'] or ''}}</span>
                                <div class="clearfix"></div>
                                <span class="name">性别 :</span>
                                <span  class="name_input">{{$member['sex'] or ''}}</span>
                                <div class="clearfix"></div>
                                <span class="name">年龄 :</span>
                                <span  class="name_input">{{$member['age'] or ''}}</span>
                                <div class="clearfix"></div>
                                <span class="name" style="margin-bottom: 30px;">学校/单位名称 :</span>
                                <span class="name_input">{{$member['school_name'] or ''}}</span>
                                <div class="clearfix"></div>
                            </div>
                            @endforeach
                            @endif

                        </div>
                    </div>
                    <div class="pays" id="pays">
                        <span class="leader_title">缴费信息</span>
                        <div class="cut"></div>
                        <span class="name">支付方式 :</span>
                        <span id="preview_payment" class="name_input" >在线支付(已成功付款)</span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix">

                    </div>
                </div>
            </div>
            </form>
        </div>

        <input class="button-print" type="button" value="打印" onclick="window.print()">
        <div class="bot">
            <div class="inner">
                <img src="{{ asset('assets/img/logo-white-word.png')}}" alt="">
                <span class="sp1">© 2017 KenRobot  |  京 ICP备15039570号 </span>
                <span class="sp2">北京市海淀区天秀路10号中国农大国际创业园1号楼526</span>
            </div>
        </div>
    </div>
<script type="text/javascript">
    setTimeout(function(){
        $('#successAlert').css({
            'opacity': 0,
            'margin-bottom': '0px'
        });
    }, 3000);

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
            membersList += '<span class="name">队员姓名 :</span>';
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
            membersList += '<span class="name school_add">学校/单位地址 :</span>';
            membersList += '<input class="name_input" type="text" value='+ allData.members[i].member_school_address +'>';
            membersList += '<div class="clearfix"></div>';
        }
        $('#number').html(membersList);
    }
</script>
</body>
</html>
