<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/signup.css')}}">   
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js')}}"></script>
</head>
<body>

    <div class="main">
        <div class="top">
            <div class="inner">
                <img src="{{ asset('assets/img/logo-top.png')}}" alt="">
                <div class="login">
                    <span class="register">注册</span>
                    <span class="signin">登录</span>
                </div>
                <div class="logout">
                    <span></span>
                </div>
            </div>
        </div>

    <div class="mid">
        <div class="title_top">
            <ul>
                <li class="active">①领队信息</li> 
                <li>②队伍参赛信息</li> 
                <li>③队员信息</li> 
                <li>④缴费信息</li> 
                <li>④缴费信息</li> 
            </ul>
        </div>
        <div class="all_info">
            <div class="leader_info">
                <span class="user_name">用户名  :</span>
                <input class="user_name_input" type="text">
                <div class="clearfix"></div>
                <span class="user_name">密码  :</span>
                <input class="user_name_input" type="text">
                <div class="clearfix"></div>
                <span class="user_name">确认密码  :</span>
                <input class="user_name_input" type="text">
                <div class="clearfix"></div>
                <span class="user_name">真实姓名  :</span>
                <input class="user_name_input" type="text">
                <div class="clearfix"></div>
                <span class="user_name">性别  :</span>
                <input class="man" type="radio" name="sex" value="option1"><span>男</span>
                <input class="woman" type="radio" name="sex" value="option2"><span>女</span>
                <div class="clearfix"></div>
                <span class="user_name">领队照片  :</span>
                <div class="div2">上传图片</div>
                <input type="file" class="inputstyle">
                <div class="clearfix"></div>
                <span class="user_name">注册邮箱  :</span>
                <input class="user_name_input" type="text">
                <div class="clearfix"></div>
                <span class="user_name">手机号码  :</span>
                <input class="user_name_input" type="text">
                <button class="tel">发送验证码</button>
                <div class="clearfix"></div>
                <span class="user_name">验证码  :</span>
                <input class="code" type="text">
                <div class="clearfix"></div>

                <button class="btn_next">下一步</button>
                <div class="clearfix"></div>
            </div>
            <div class="ranks_info">
                <span class="user_name">队伍名称  :</span>
                <input class="user_name_input" type="text">
                <div class="clearfix"></div>
                <span class="user_name">学校/单位名称  :</span>
                <input class="user_name_input" type="text">
                <div class="clearfix"></div>
                <span class="user_name">学校/单位地址  :</span>
                <input class="user_name_input" type="text">
                <div class="clearfix"></div>
                <span class="user_name">赛事项目  :</span>
                ‍‍<select>
                    <option grade="1" value="a">选项一</a>
                    <option grade="2" value="b">选项二</a>
                    <option grade="3" value="c">选项三</a>
                    <option grade="4" value="d">选项四</a>
                    <option grade="5" value="e">选项五</a>
                </select>
                <div class="clearfix"></div>
                <span class="user_name">组别  :</span>
                ‍‍<select>
                    <option grade="1" value="a">小学生</a>
                    <option grade="2" value="b">初中生</a>
                    <option grade="3" value="c">高中生</a>
                    <option grade="4" value="d">大学生</a>
                </select>
                <div class="clearfix"></div>
                <button class="btn_pre">上一步</button>
                <button class="btn_next">下一步</button>
            </div>

            <div class="append_rank">
                <span class="user_name">队员姓名(一):</span>
                <input class="user_name_input" type="text">
                <div class="clearfix"></div>
                <span class="user_name">手机号码  :</span>
                <input class="user_name_input" type="text">
                <div class="clearfix"></div>
                <span class="user_name">性别  :</span>
                <input class="man" type="radio" name="sex" value="option1"><span>男</span>
                <input class="woman" type="radio" name="sex" value="option2"><span>女</span>
                <div class="clearfix"></div>
                <span class="user_name">年龄  :</span>
                <input class="user_age" type="text">
                <div class="clearfix"></div>
                <span class="user_name">学校/单位名称  :</span>
                <input class="user_name_input" type="text">
                <div class="clearfix"></div>
                <span class="user_name">学校/单位地址  :</span>
                <input class="user_name_input" type="text">
                <div class="clearfix"></div>
                <span class="user_name">队员照片  :</span>
                <div class="div2">上传图片</div>
                <input type="file" class="inputstyle">
                <div class="clearfix"></div>
                <button class="btn_pre">上一步</button>
                <button class="btn_next">下一步</button>
                <button class="btn_new">继续添加新成员</button>
            </div>

            <div class="payment">
                <span class="user_name">缴费方式:</span>
                <input class="man" type="radio" name="sex" value="option1"><span>现场缴费</span>
                <input class="woman" type="radio" name="sex" value="option2"><span>在线支付(暂不支持)</span>
                <div class="clearfix"></div>
                <button class="btn_pre">上一步</button>
                <button class="btn_next">下一步</button>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>

        <div class="bot">
            <div class="inner">
                <img src="{{ asset('assets/img/logo-top.png')}}" alt="">
                <span class="sp1">© 2016 KenRobot  |  京 ICP备15039570号 </span>
                <span class="sp2">北京市海淀区天秀路10号中国农大国际创业园1号楼526</span>
            </div>
        </div>
    </div>


<script type="text/javascript">
    $(function(){
        function gradeChange(){

        }

        loadAllVersion();
        function loadAllVersion() 
        {
            $.get('http://enroll0.kenrobot.com/signup/list',
                function (res) {
                    if (res.status == 0) {
                        console.log(res.data)
                        showAllVersion(res.data);
                    }
                }
            );
        }
        
        function showAllVersion(data)
        {
            // console.log(data)
            // var str = '';
            // var fix = '<div class="clearfix"></div>';
            // for(var course in data)
            // {
            //     str += '<li>';
            //     str += '<div class="tab_course_box">';
            //     str += '<div class="course_img"></div>';
            //     str += '<span class="course_name">'+data[course].name+'</span>';
            //     str += '<span class="course_price">'+data[course].price+'</span>';
            //     str += '<span class="course_iden">'+data[course].iden+'</span>';
            //     str += '<span class="course_info">'+data[course].info+'</span>';
            //     str += '</div>';
            //     str += '</li>';
            // }
            // $('#course_show').html(str.concat(fix));
        }
    })
</script>
</body>
</html>
