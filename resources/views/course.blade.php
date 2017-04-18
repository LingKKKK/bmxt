<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/course.css')}}">	
	<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
</head>
<body>
<div id="info">
	<div class="top">
		<div class="inner">
			<div class="logo"></div>
			<ul class="nav">
				<a>开发版</a>
				<a>教育版</a>
				<a>社区</a>
				<a>帮助</a>
			</ul>
			<ul class="login">
				<a class="active">免费注册</a>
				<a>登录</a>
			</ul>
		</div>	
	</div>
	<div class="banner">
		<div class="inner">
			<div class="turns_pic">
				<div class="turns_pic_tabs active"></div>
				<div class="turns_pic_tabs"></div>
				<div class="turns_pic_tabs"></div>
				<div class="turns_pic_tabs"></div>
				<div class="turns_pic_tabs"></div>
				<ul class="click_pic">
					<li class="ac"></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
				</ul>
			</div>
		</div>

		<div class="pre" id="pre"></div>
		<div class="next" id="next"></div>
	</div>

	<ul class="course_show" id="course_show">
		<!-- <li>
			<div class="tab_course_box">
				<div class="course_img"></div>
				<span class="course_name">课程名称</span>
				<span class="course_price">$: 198</span>
				<span class="course_iden">ZZZ</span>
				<span class="course_info">在这个时代，数据越来越重要，数据=金钱，已经成为定理。本课程让你初步掌握使用Python进行数据采集，以及如何从TXT和PDF文档中读取数据，掌握本课程，创造属于你的价值</span>
			</div>
		</li> -->
		<div class="clearfix"></div>
	</ul>

	<div class="bot">
		<div class="logo"></div>
		<span>© 2017 KenRobot  |  京 ICP备15039570号</span>
		<p>北京市海淀区天秀路10号中国农大国际创业园1号楼526</p>
	</div>
</div>
<script type="text/javascript">
	window.onload = function ()
	{
	    var timer = null;
	    var iNow = 0;
	    var oLi = $(".click_pic li"); 
		$(".click_pic li").click(function () {
		    $(this).addClass("ac").siblings().removeClass("ac");
		    var index = $(this).index();
		    iNow = index;
		    $(".turns_pic .turns_pic_tabs").eq(iNow).addClass("active").siblings().removeClass("active");
		});
	    timer = setInterval(function () {
	        iNow++;
	        if (iNow > oLi.length - 1) {
	            iNow = 0;
	        }
	        oLi.eq(iNow).trigger("click");
	    }, 3000);
	    $('#pre').click(function (){
	    	iNow--;
	    	$(".click_pic li").eq(iNow).click();
    	});
	    $('#next').click(function (){
	    	iNow++;
	    	$(".click_pic li").eq(iNow).click();
	    });


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
	    	console.log(data)
	    	var str = '';
	    	var fix = '<div class="clearfix"></div>';
	    	for(var course in data)
            {
				str += '<li>';
				str += '<div class="tab_course_box">';
				str += '<div class="course_img"></div>';
				str += '<span class="course_name">'+data[course].name+'</span>';
				str += '<span class="course_price">'+data[course].price+'</span>';
				str += '<span class="course_iden">'+data[course].iden+'</span>';
				str += '<span class="course_info">'+data[course].info+'</span>';
				str += '</div>';
				str += '</li>';
            }
            $('#course_show').html(str.concat(fix));
	    }

	}
</script>
</body>
</html>
