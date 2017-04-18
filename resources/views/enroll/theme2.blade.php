<!DOCTYPE html>
<html>
<head>
	<title>主题开发</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme2.css')}}">
	<style type="text/css">
	</style>
	<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/Popt.js')}}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/cityJson.js')}}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/citySet.js')}}"></script>
</head> 
<body>
	<div id="info">
		<div class="top">
			<div class="inner">
				<div class="logo"></div>
				<ul class="nav">
					<li>开发版</li>
					<li>教育版</li>
					<li>社区</li>
					<li>帮助</li>
				</ul>
				<ul class="login">
					<li class="active">免费注册</li>
					<li>登录</li>
				</ul>
			</div>	
		</div>
		<div class="banner">
			<div class="inner">
				<span>Registeration System</span>
				<p>报名系统</p>
				<!-- <img src="{{asset('assets/img/back.png')}}"> -->
			</div>	
		</div>
		<div class="clear"></div>

		<div class="title_read">
			<p>欢迎参加第一届【啃萝卜硬件开发大赛】，请保证您输入的信息是有效且合法的。如有问题，请及时联系比赛负责人或发送电子邮件至competition@kenrobot.com 进行咨询。</p>
			<span></span>
		</div>

		<div class="inner">
			<div class="tabs">
				<div class="back_click"></div>
				<ul class="change_tab_click">
					<li></li>
					<li></li>
					<li></li>
				</ul>
			</div>
			<div class="enroll_need">
				<p>报名须知</p>
				<div class="intro">
					<span>报名须知<br>&nbsp&nbsp&nbsp请认真阅读：本《最终用户许可协议》（以下称《协议》）是您（单一实体）与啃萝卜之间有关上述啃萝卜软件产品的法律协议。<br>&nbsp&nbsp&nbsp本“软件产品 ”包括计算机软件，并可能包括相关媒体、印刷材料和 “联机”或电子文档（“软件产品”）。本“软件产品 ”还包括对啃萝卜系统提供给您的原 “软件产品 ”的任何更新和补充资料。任何与本 “软件产品 ”一同提供给您的并与单独一份最终用户许可证相关的软件产品是根据那份许可协议中的条款而授予您。您一旦安装、复制、下载、访问或以其它方式使用“ 软件产品 ”，即表示您同意接受本《协议》各项条款的约束。如您不同意本《协议》中的条款，请不要安装或使用 “软件产品 ”。</span>
					<span>&nbsp&nbsp&nbsp请认真阅读：本《最终用户许可协议》（以下称《协议》）是您（单一实体）与啃萝卜之间有关上述啃萝卜软件产品的法律协议。<br>&nbsp&nbsp&nbsp本“软件产品 ”包括计算机软件，并可能包括相关媒体、印刷材料和 “联机”或电子文档（“软件产品”）。本“软件产品 ”还包括对啃萝卜系统提供给您的原 “软件产品 ”的任何更新和补充资料。任何与本 “软件产品 ”一同提供给您的并与单独一份最终用户许可证相关的软件产品是根据那份许可协议中的条款而授予您。您一旦安装、复制、下载、访问或以其它方式使用“ 软件产品 ”，即表示您同意接受本《协议》各项条款的约束。如您不同意本《协议》中的条款，请不要安装或使用 “软件产品 ”。</span>
				</div>
				<!-- <input name="access" type="checkbox" checkbox="true" /> -->
				<div class="simul_input" data-num="0">
					<img src="{{asset('assets/img/input_click.png')}}">
				</div>
				<i>您已阅读并同意<a href="">报名须知</a></i>
				<button id="next_enroll_way">下一步</button>
			</div>
			<div class="enroll_information">
				<p class="title">报名系统</p>
				<div class="clear"></div>
				<form class="form-horizontal" method="post" action="/enroll/{{$act['id']}}">
		            @foreach($form->fields as $tag)

	              @if ($tag['type'] == 'text' && $tag['datatype'] == 'address')
		            <div class="form-group select">
		                <!-- <div>
		                    <label>{{$tag['labeltext']}}</label>
		                </div> -->
		                <!-- <select class="form-control">
		                	<option>中国大陆</option>
		                	<option disabled="">其他</option>
		                </select> -->
		                <!-- <select class="form-control" id="selProvince" onchange="provinceChange();">
		                </select>
		                <select class="form-control" id="selCity" style="margin-right: 0px;">
		                </select> -->
		                <input type="text" class="city_c" id="{{$tag['id']}}" name="{{$tag['name']}}" />
		            </div>

		                
		            @elseif ($tag['type'] == 'text')
		            <!-- 1 -->
		            <div class="form-group text input_text">
		                <label class="label_text" for="{{$tag['id']}}">{{$tag['labeltext'] or ''}}</label>
		                <div class="input_value" style="display: none;">{{$tag['labeltext'] or ''}}</div>
		                <input class="form-control" type="text" id="{{$tag['id']}}" value="{{$tag['labeltext'] or ''}}" name="{{$tag['name']}}" {{ $tag['required'] ? 'required' : '' }}>
		            </div>

		            @elseif ($tag['type'] == 'radio')
		            <div class="radio">
		                <label>
		                    <input type="radio" name="{{$tag['name']}}" id="{{$tag['id']}}" value="{{$tag['value'] or ''}}" {{ $tag['checked'] or ''}} {{ $tag['required'] ? 'required' : '' }}>
		                    {{$tag['labeltext'] or ''}}
		                </label>
		            </div>

		            @elseif ($tag['type'] == 'checkbox')
		            <div class="checkbox">
		                <label>
		                    <input type="checkbox" id="{{$tag['id']}}" name="{{$tag['name']}}" value="{{$tag['value'] or ''}}" {{ $tag['checked'] or ''}} {{ $tag['required'] ? 'required' : '' }}>
		                    {{$tag['labeltext'] or ''}}
		                </label>
		            </div>   

		            @elseif ($tag['type'] == 'select')
		            <!-- <div class="form-group select">
		                <div>
		                    <label>
		                        {{$tag['labeltext'] or ''}}
		                    </label>
		                </div>
		                <select class="form-control" id="{{$tag['id']}}" name="{{$tag['name']}}"  {{$tag['multiple'] ? 'mutiple' : ''}} {{ $tag['required'] ? 'required' : '' }}>
		                @foreach($tag['items'] as $value => $text)
		                    <option value="{{$value}}">{{$text}}</option>
		                @endforeach
		                </select>
		                <select class="form-control">
		                	 <option value="{{$value}}">{{$text}}</option>
		                </select>
		            </div> -->
		         
		            @elseif ($tag['type'] == 'radiolist')
		            <div class="form-group radio">
		                <div>
		                    <label>{{$tag['labeltext'] or ''}}</label>
		                </div>
		                @if($tag['items'])
		                @foreach($tag['items'] as $value => $text)
		                <label class="radio-inline">
		                    <input type="radio" name="{{ $tag['name'].'[]' }}" value="{{$value or ''}}" {{ $tag['required'] ? 'required' : '' }}>
		                    {{$text or ''}}
		                </label>
		                @endforeach
		                @endif
		            </div>

		            @elseif ($tag['type'] == 'checkboxlist')
		            <!-- 6 -->
		            <div class="form-group checkbox">
		                <div>
		                    <label>{{$tag['labeltext'] or ''}}</label>
		                </div>        
		                @foreach($tag['items'] as $value => $text)
		                <label class="checkbox-inline">
		                    <input type="checkbox" name="{{ $tag['name'].'[]' }}" value="{{$value or ''}}" {{ $tag['required'] ? 'required' : '' }}  >
		                    {{$text or ''}}
		                </label>
		                @endforeach
		            </div>

		            @else
		            
		            @endif
		            @endforeach
		    
		            @if( $form->verificationtype == 'mobile')
		            <!-- 获取验证码发送手机 -->
		            <div class="form-group form-inline sendtomail input_text">
		                  <div class="form-group">
		                  <label for="verificationcode">验证码</label>
		                  <input type="text" class="form-control" id="verificationcode" name="verificationcode" data-verifyfield="mobile" value="验证码" required>
		                   </div>
		                  <button id="getverifycode" data-toggle="modal" data-target="#myModal" class="btn btn-default">发送手机验证码</button>
		            </div>
		            @elseif( $form->verificationtype == 'email')
		            <!-- 获取验证码发送邮箱 -->
		            <div class="form-group form-inline sendtomail input_text">

		                  <label class="label_text" for="verificationcode">验证码</label>
		                  <input type="text" class="form-control"  id="verificationcode" name="verificationcode" data-verifyfield="email" value="验证码" required>
		                  
		                  <button id="getverifycode" data-toggle="modal" data-target="#myModal" class="btn btn-default">发送邮箱验证码</button>
		            </div>
		            @elseif( $form->verificationtype == 'captcha')
		            <div id="captcha_area" class="form-group form-inline">
		                <input type="text" id="captcha" name="captcha">
		                <img class="captcha_img" src="{{captcha_src()}}">
		            </div>
		            @else 
		           
		            @endif
		            <!-- 提交 -->
		            <div class="form-group submit">
		                <input type="submit" name="submit" class="btn btn-primary">
		            </div>

		        </form>
		        <button id="reset">重置信息</button>
			</div>
			<div class="enroll_other">
				<p class="enroll_intro">报名信息</p>
				<span>简介</span>
				<div class="resume">
					<p>王昆鹏， 约局创始人兼CEO ，[1]  正和岛副总裁兼商学院执行院长。[2]  青岛大学文学士、中国海洋大学项目管理工程硕士。十年财经媒体职业经历，专注产业经济、企业深度报道，曾任青岛财经日报副总编辑 ，2008年北京奥运会火炬手。</p>
				</div>
				<span>附件</span>
				<!-- <input id="file_upload" type=file /> -->
				<i class="choice">选择文件</i>
				<button class="finish">完成</button>

			</div>
			<div class="clearfix"></div>
		</div>
		<div class="bot">
			<div class="logo"></div>
			<span>© 2017 KenRobot  |  京 ICP备15039570号</span>
			<p>北京市海淀区天秀路10号中国农大国际创业园1号楼526</p>
		</div>
	</div>

	<div class="model">
		<div id="verification_code">
			<div class="top">
				<p>请输入下图中的文字或字母</p>
				<div class="img"></div>
			</div>
			<div class="bot">
				<img src="img/logo.png">
				<input type="text" name="v_code" id="v_code" />
				<button id="confirm">确定</button>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		window.onload = function (){

			$('.title_read span').click(function (){
				// $('.title_read').css('opacity', '0');
				// setInterval(function (){
				// 	$("#div_id").height("0");
				// }, 1000)
				$('.title_read').css('display', 'none');
			})

			$('.back_click').click(function() {
				console.log($('#city').val())
			})
			

			// input_text  focus blur 点击事件
			var oClick = $(".form-horizontal .input_text .form-control")
			console.log(oClick.length)
			oClick.each(function () {
	            $(this).data("txt", $.trim($(this).val()));
	        }).focus(function () {
	            if ($.trim($(this).val()) === $(this).data("txt")) {
	                $(this).val("").css('color', '#666666');
	                $(this).parent().css('border-bottom', '1px solid #20a0ff');
	                $(this).parent().find('.label_text').css({
				      "opacity": 1,
				      "top":"-26px",
				      "color":"#20a0ff",
				      "transition":"all 1s"
				    });
	            }
	        }).blur(function () {
	            if ($.trim($(this).val()) === "" && !$(this).hasClass("once")) {
	                $(this).val($(this).data("txt"));
	                $(this).parent().css('border-bottom', '1px solid #d8d8d8');
	                $(this).parent().find('.label_text').css({
				      "opacity": 0,
				      "top":"0px",
				      "color":"#a4aebd",
				      "transition":"all 0.5s"
				    });
	            }else {
	            	$(this).parent().find('.label_text').css({
				      "color":"#a4aebd",
				      "transition":"all 0.5s"
				    });
	            }
	        });
	// 单选框
	        $('.radio').hover(function(){
	            $(this).css('border-bottom', '1px solid #20a0ff');
			    $('.radio div').css({
					"opacity": 1,
					"top":"-26px",
					"color":"#20a0ff",
					"transition":"all 1s"
			    });
			},function(){  
			    var val=$('input:radio[name="radiolist_58c640150aa81[]"]:checked').val();
	            if(val==null){
	        		$(this).css('border-bottom', '1px solid #a4aebd');
	                $('.radio div').css({
						"opacity": 0,
						"top":"0px",
						"color":"#d8d8d8",
						"transition":"all 0.5s"
				    })
	                return false;
	            }
	            else{
	            	$(this).css('border-bottom', '1px solid #a4aebd');
	            	console.log(val)
	                $('.radio div').css({
						"color":"#a4aebd",
						"transition":"all 0.5s"
				    });
	            }
			});
	// 复选框
	        $('.checkbox').hover(function(){
	            $(this).css('border-bottom', '1px solid #20a0ff');
			    $('.checkbox div').css({
					"opacity": 1,
					"top":"-26px",
					"color":"#20a0ff",
					"transition":"all 1s"
			    });
			},function(){
			    var val=$('input:checkbox[name="checkboxlist_58c6406b0f9be[]"]:checked').val();
	            if(val==null){
	            	$(this).css('border-bottom', '1px solid #a4aebd');
	                $('.checkbox div').css({
						"opacity": 0,
						"top":"0px",
						"color":"#20a0ff",
						"transition":"all 0.5s"
				    })
	                return false;
	            }
	            else{
	            	$(this).css('border-bottom', '1px solid #a4aebd');
	            	console.log(val)
	                $('.checkbox div').css({
						"color":"#a4aebd",
						"transition":"all 0.5s"
				    });
	            }
			});

	        $(".city_c").click(function (e) {
				SelCity(this,e);
			});

		    var a = $('#selProvince option');
		    $('.btn-primary').click(function(){
			    console.log($("#selProvince").val() +" "+ $("#selCity").val());
			    $('.title_read').css('display' ,'none');
			    $('.enroll_information').css('display' ,'none');
			    $('.enroll_other').css('display' ,'block');
		    })
	// 点击弹出model
		    $('#getverifycode').click(function(){
		    	console.log('click');
				$('.model').css('display', 'block');
		    })
	// 点击关闭model
		    $('#verification_code .top .img').click(function (){
		    	$('.model').css('display', 'none');
		    })


     		// 报名的流程  报名须知按钮
		    var num_toggle = 0;
		    $('.simul_input').click(function (){
		    	toggle();
		    })
		    function toggle (){
		    	if ( num_toggle == 0 ){
		    		$(".simul_input").css('background', '#ccc');
		    		$(".simul_input").css('border', '1px solid #cccccc');
		    		$(".simul_input").attr("data-num","1");
		    		$('#next_enroll_way').css({
		    			"background":"#ccc",
		    			"pointer-events":"none"
		    		})
		    		num_toggle = 1;
		    	}else if(num_toggle == 1){
		    		$(".simul_input").css('background', '#2564f5');
		    		$(".simul_input").css('border', '1px solid #2564f5');
		    		$(".simul_input").attr("data-num","0");
		    		$('#next_enroll_way').css({
		    			"background":"#2564f5",
		    			"pointer-events":"all"
		    		})
		    		num_toggle = 0;
		    	}
		    }
		    
		    // 点击下一步 切换到其他的报名的方式;
		    $('#next_enroll_way').click(function (){
		    	$('.title_read').css('display', 'none');
		    	$('.enroll_need').css('display', 'none');
		    	$('.enroll_information').css('display', 'block');		    	
		    })

		    // 上传文件
		    // $('.enroll_intro').click(function() {
		    // 	$('#file_upload').click();
		    // })

		}
	</script>
</body>
</html>
