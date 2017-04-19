<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/success.css')}}">   
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js')}}"></script>
</head>
<body>
    <div class="main">
        <div class="top">
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
            <div class="title_top">
                <ul>
                    <li>2017啃萝卜</li>
                </ul>
            </div>
            <div class="all_info clearfix">
                <div class=" active team_info div_tab">
                    <div class="leader" id="leader"></div>
                    <div class="leader" id="team"></div>
                    <div class="all_number">
                        <span class="leader_title">队员信息</span>
                        <div class="team_number" id="number">
                        </div>
                    </div>
                    <div class="pays" id="pays">
                        <span class="leader_title">缴费信息</span>
                        <div class="cut"></div>
                        <span class="name">支付方式 :</span>
                        <input class="name_input" type="text" value="现场支付">
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            </form>
        </div>

        <div class="bot">
            <div class="inner">
                <img src="{{ asset('assets/img/logo-white-word.png')}}" alt="">
                <span class="sp1">© 2017 KenRobot  |  京 ICP备15039570号 </span>
                <span class="sp2">北京市海淀区天秀路10号中国农大国际创业园1号楼526</span>
            </div>
        </div>
    </div>
<script type="text/javascript">
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
