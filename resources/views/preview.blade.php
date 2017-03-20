<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/preview.css')}}">	
	<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js')}}"></script>
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

	<div class="preview_show">
		<div class="inner">
			<div class="preview_fl">
				<div class="video">
					<div class="controller_video"></div>
				</div>
				<ul class="tabs_course">
					<li class="active">课程目录</li>
					<li>课程咨询</li>
					<li>课程评价</li>
				</ul>
				<div class="course_tabs" id="course_tabs">
					<div class="kecheng active">
						<!-- <span class="chapter">第yi章  历史由来</span>
						<div class="chapter_sub">
							<span class="chapter_name">1.1 arduino起源</span>
							<span class="chapter_time">56:10</span>
						</div>
						<div class="chapter_sub">
							<span class="chapter_name">1.2 arduino cc 和arduino org的爱恨情仇</span>
							<span class="chapter_time">56:10</span>
						</div> -->
					</div>


					<div class="consulte"></div>
					<div class="evaluate"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="preview_fr">
				<div class="preview_intro">
					<ul class="tab_intro">
						<li class="active">简介</li>
						<li>须知</li>
					</ul>
					<div class="div_intro active">
						<!-- <p class="intro"><span>课程介绍：</span>在这个时代，数据越来越重要，数据=金钱，已经成为定理。本课程让你初步掌握使用Python进行数据采集，以及如何从TXT和PDF文档中读取数据，掌握本课程，创造属于你的价值。</p>
						<p class="price"><span>课程费用：</span><i>198</i>  158 RMB</p>
						<p class="recommend"><span>推荐指数：</span>★★★★★</p>
						<p class="tech_sup"><span>Scratch</span><span>Arduino</span><span>啃萝卜</span></p> -->
					</div>
					<button class="preview_pay">购买课程</button>
				</div>
				<div class="recommend_preview">
					<p>推荐课程</p>
					<ul>
						<!-- <li>
							<div class="img"></div>
							<span class="name">SpringBoot进阶之Web进阶</span>
							<span class="num">初级 · 2487人在学</span>
							<div class="clearfix"></div>
						</li> -->
						<div class="clearfix"></div>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="bot">
		<div class="logo"></div>
		<span>© 2017 KenRobot  |  京 ICP备15039570号</span>
		<p>北京市海淀区天秀路10号中国农大国际创业园1号楼526</p>
	</div>
</div>
<script type="text/javascript">
	window.onload = function (){
//  点击课程目录\咨询\评价  切换相应的栏目
		$(".tabs_course li").click(function () {
		    $(this).addClass("active").siblings().removeClass("active");
		    // var index = $(this).index();
		    // iNow = index;
		    // $(".turns_pic .turns_pic_tabs").eq(iNow).addClass("active").siblings().removeClass("active");
		});
//  点击课程简介\须知  切换相应的栏目
		$(".tab_intro li").click(function () {
		    $(this).addClass("active").siblings().removeClass("active");
		    // var index = $(this).index();
		    // iNow = index;
		    // $(".turns_pic .turns_pic_tabs").eq(iNow).addClass("active").siblings().removeClass("active");
		});
//  添加课程的信息
		loadChapter();  	//课程目录
		loadIntro();		//详情
		loadRecommend();	//推荐

	    function loadChapter() 
	    {
	        $.get('http://enroll0.kenrobot.com/preview/chapter',
	            function (res) {
	                if (res.status == 0) {
	                    showChapter(res.data);
	                }
	            }
	        );
	    }
	    function showChapter(alldatas)
	    {
	    	var str = '';
	    	for (var version in alldatas){
	    		str += '<span class="chapter">'+version+'</span>';
	    		for (var i in alldatas[version]){
	    			str += '<div class="chapter_sub">';
					str += '<span class="chapter_name">'+alldatas[version][i].name+'</span>';
					str += '<span class="chapter_time">'+alldatas[version][i].time+'</span>';
					str += '<span class="'+alldatas[version][i].buy+'"></span>';
					str += '<span class="login"></span>';
					str += '</div>';
	    		}
	    	}
	    	$('#course_tabs .kecheng').html(str);
	    	chapter_sub_hover();
	    }

	   	function loadIntro()
	   	{
	   		$.get('http://enroll0.kenrobot.com/preview/intro',
	            function (res) {
	                if (res.status == 0) {
	                    showIntro(res.data);
	                }
	            }
	        );
	   	}
	   	function showIntro(alldatas)
	   	{
	    	var str = '';
	    	str += '<p class="intro"><span>课程介绍：</span>'+ alldatas.intro +'</p>';
	    	str += '<p class="price"><span>课程费用：</span><i>198   </i>'+ alldatas.price +'</p>';
	    	str += '<p class="recommend"><span>推荐指数：</span>'+ alldatas.recommend +'</p>';
	    	str += '<p class="tech_sup">'
	    	for (var name in alldatas.tech_sup){
	    		str += '<span>'+ name +'</span>';
	    	}
	    	str += '</p>';
	    	$('.preview_intro .div_intro').html(str);	   		
	   	}
	   	function loadRecommend()
	   	{
	   		$.get('http://enroll0.kenrobot.com/preview/recommend',
	            function (res) {
	                if (res.status == 0) {
	                	console.log(res.data)
	                    showRecommend(res.data);
	                }
	            }
	        );
	   	}
	   	function showRecommend(alldatas)
	   	{
	    	var str = '';
            for(var version in alldatas)
            {
            	str += '<li>';
            	str += '<div class="img"></div>';
            	str += '<span class="name">'+ alldatas[version].name +'</span>';
            	str += '<span class="num">'+ alldatas[version].info +'</span>';
            	str += '<div class="clearfix"></div>';
            	str += '</li>';
            }
	    	$('.recommend_preview ul').html(str);	   		
	   	}

	   	function chapter_sub_hover()
	   	{
   		   	$('.chapter_sub').hover(function(){
   		   		$('.chapter_sub').removeClass('active');
   			    $(this).addClass('active');
   			    $('.chapter_sub').find('.buy').html("");
   			    $('.chapter_sub').find('.unbuy').html("");
   			    $('.chapter_sub').find('.login').html("");


   			    if ( 1 == 1 ){
   			    	$(this).find('.buy').html("您已购买,请点击播放!");
   			    	$(this).find('.unbuy').html("需购买观看!");
   			    } else {
   			    	$(this).find('.login').html("请您登陆之后查看!");
   			    }
   			    // $(this).find('.login').html("请您登陆之后查看!");
   			},function(){
   			    
   			});
	   	}



	}
</script>
</body>
</html>