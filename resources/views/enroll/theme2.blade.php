<!DOCTYPE html>
<html>
<head>
	<title>主题开发</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme2.css')}}">
	<style type="text/css">
		/*._citys { width: 450px; display: inline-block; border: 2px solid #eee; padding: 5px; position: relative; background: white;}
		._citys span { color: #56b4f8; height: 15px; width: 15px; line-height: 15px; text-align: center; border-radius: 3px; position: absolute; right: 10px; top: 10px; border: 1px solid #56b4f8; cursor: pointer; }
		._citys0 { width: 100%; height: 34px; display: inline-block; border-bottom: 2px solid #56b4f8; padding: 0; margin: 0; }
		._citys0 li { display: inline-block; line-height: 34px; font-size: 15px; color: #888; width: 80px; text-align: center; cursor: pointer; }
		.citySel { background-color: #56b4f8; color: #fff !important; }
		._citys1 { width: 100%; display: inline-block; padding: 10px 0; background-color: white;}
		._citys1 a { width: 83px; height: 35px; display: inline-block; background-color: #f5f5f5; color: #666; margin-left: 6px; margin-top: 3px; line-height: 35px; text-align: center; cursor: pointer; font-size: 13px; overflow: hidden; }
		._citys1 a:hover { color: #fff; background-color: #56b4f8; }
		.AreaS { background-color: #56b4f8 !important; color: #fff !important; }*/
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
			</div>	
		</div>
		<div class="clear"></div>
		<div class="inner">
			<div class="tabs">
				<div class="back_click"></div>
				<ul class="change_tab_click">
					<li></li>
					<!-- <li class="active"></li> -->
					<li></li>
					<li></li>
				</ul>
			</div>
			<div class="enroll_information">
				<p class="title">报名系统</p>
				<div class="clear"></div>
				<form class="form-horizontal" method="post" action="/enroll/{{$act['id']}}">
		            @foreach($form->fields as $tag)
		                
		            @if ($tag['type'] == 'text')
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
		            <div class="form-group select">
		                <div>
		                    <label>所在区域</label>
		                </div>
		                <!-- <select class="form-control">
		                	<option>中国大陆</option>
		                	<option disabled="">其他</option>
		                </select>
		                <select class="form-control" id="selProvince" onchange="provinceChange();">
		                </select>
		                <select class="form-control" id="selCity" style="margin-right: 0px;">
		                </select> -->
		                <input type="text" id="city" value="请选择您的地址" />
		            </div>

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

	        
	        $("#city").click(function (e) {
				SelCity(this,e);
			});

		    // //定义数组，存储省份信息     选择地区
		    // var province = ["请选择", "北京", "上海", "天津", "重庆", "浙江", "江苏", "广东", "福建", "湖南", "湖北", "辽宁", 
		    // "吉林", "黑龙江", "河北", "河南", "山东", "陕西", "甘肃", "新疆", "青海", "山西", "四川", 
		    // "贵州", "安徽", "江西", "云南", "内蒙古", "西藏", "广西", "宁夏", "海南", "香港", "澳门", "台湾"]; 
		    // //定义数组,存储城市信息 
		    // var please_select = ["请选择"];
		    // var beijing = ["东城区", "西城区", "海淀区", "朝阳区", "丰台区", "石景山区", "通州区", "顺义区", "房山区", "大兴区", "昌平区", "怀柔区", "平谷区", "门头沟区", "延庆县", "密云县"]; 
		    // var shanghai = ["浦东新区", "徐汇区", "长宁区", "普陀区", "闸北区", "虹口区", "杨浦区", "黄浦区", "卢湾区", "静安区", "宝山区", "闵行区", "嘉定区", "金山区", "松江区", "青浦区", "南汇区", "奉贤区", "崇明县"]; 
		    // var tianjing = ["河东", "南开", "河西", "河北", "和平", "红桥", "东丽", "津南", "西青", "北辰", "塘沽", "汉沽", "大港", "蓟县", "宝坻", "宁河", "静海", "武清"]; 
		    // var chongqing = ["渝中区", "大渡口区", "江北区", "沙坪坝区", "九龙坡区", "南岸区", "北碚区", "万盛区", "双桥区", "渝北区", "巴南区", "万州区", "涪陵区", "黔江区", "长寿区", "江津区", "合川区", "永川区", "南川区"]; 
		    // var jiangsu = ["南京", "无锡", "常州", "徐州", "苏州", "南通", "连云港", "淮安", "扬州", "盐城", "镇江", "泰州", "宿迁"]; 
		    // var zhejiang = ["杭州", "宁波", "温州", "嘉兴", "湖州", "绍兴", "金华", "衢州", "舟山", "台州", "利水"]; 
		    // var guangdong = ["广州", "韶关", "深圳", "珠海", "汕头", "佛山", "江门", "湛江", "茂名", "肇庆", "惠州", "梅州", "汕尾", "河源", "阳江", "清远", "东莞", "中山", "潮州", "揭阳"]; 
		    // var fujiang = ["福州", "厦门", "莆田", "三明", "泉州", "漳州", "南平", "龙岩", "宁德"]; 
		    // var hunan = ["长沙", "株洲", "湘潭", "衡阳", "邵阳", "岳阳", "常德", "张家界", "益阳", "郴州", "永州", "怀化", "娄底", "湘西土家苗族自治区"]; 
		    // var hubei = ["武汉", "襄阳", "黄石", "十堰", "宜昌", "鄂州", "荆门", "孝感", "荆州", "黄冈", "咸宁", "随州", "恩施土家族苗族自治州"]; 
		    // var liaoning = ["沈阳", "大连", "鞍山", "抚顺", "本溪", "丹东", "锦州", "营口", "阜新", "辽阳", "盘锦", "铁岭", "朝阳", "葫芦岛"]; 
		    // var jilin = ["长春", "吉林", "四平", "辽源", "通化", "白山", "松原", "白城", "延边朝鲜族自治区"]; 
		    // var heilongjiang = ["哈尔滨", "齐齐哈尔", "鸡西", "牡丹江", "佳木斯", "大庆", "伊春", "黑河", "大兴安岭"]; 
		    // var hebei = ["石家庄", "保定", "唐山", "邯郸", "承德", "廊坊", "衡水", "秦皇岛", "张家口"]; 
		    // var henan = ["郑州", "洛阳", "商丘", "安阳", "南阳", "开封", "平顶山", "焦作", "新乡", "鹤壁", "许昌", "漯河", "三门峡", "信阳", "周口", "驻马店", "济源"]; 
		    // var shandong = ["济南", "青岛", "菏泽", "淄博", "枣庄", "东营", "烟台", "潍坊", "济宁", "泰安", "威海", "日照", "滨州", "德州", "聊城", "临沂"]; 
		    // var shangxi = ["西安", "宝鸡", "咸阳", "渭南", "铜川", "延安", "榆林", "汉中", "安康", "商洛"]; 
		    // var gansu = ["兰州", "嘉峪关", "金昌", "金川", "白银", "天水", "武威", "张掖", "酒泉", "平凉", "庆阳", "定西", "陇南", "临夏", "合作"]; 
		    // var qinghai = ["西宁", "海东地区", "海北藏族自治州", "黄南藏族自治州", "海南藏族自治州", "果洛藏族自治州", "玉树藏族自治州", "海西蒙古族藏族自治州"]; 
		    // var xinjiang = ["乌鲁木齐", "奎屯", "石河子", "昌吉", "吐鲁番", "库尔勒", "阿克苏", "喀什", "伊宁", "克拉玛依", "塔城", "哈密", "和田", "阿勒泰", "阿图什", "博乐"]; 
		    // var shanxi = ["太原", "大同", "阳泉", "长治", "晋城", "朔州", "晋中", "运城", "忻州", "临汾", "吕梁"]; 
		    // var sichuan = ["成都", "自贡", "攀枝花", "泸州", "德阳", "绵阳", "广元", "遂宁", "内江", "乐山", "南充", "眉山", "宜宾", "广安", "达州", "雅安", "巴中", "资阳", "阿坝藏族羌族自治州", "甘孜藏族自治州", "凉山彝族自治州"]; 
		    // var guizhou = ["贵阳", "六盘水", "遵义", "安顺", "黔南布依族苗族自治州", "黔西南布依族苗族自治州", "黔东南苗族侗族自治州", "铜仁", "毕节"]; 
		    // var anhui = ["合肥", "芜湖", "安庆", "马鞍山", "阜阳", "六安", "滁州", "宿州", "蚌埠", "巢湖", "淮南", "宣城", "亳州", "淮北", "铜陵", "黄山", "池州"]; 
		    // var jiangxi = ["南昌", "九江", "景德镇", "萍乡", "新余", "鹰潭", "赣州", "宜春", "上饶", "吉安", "抚州"]; 
		    // var yunnan = ["昆明", "曲靖", "玉溪", "保山", "昭通", "丽江", "普洱", "临沧", "楚雄彝族自治州", "大理白族自治州", "红河哈尼族彝族自治州", "文山壮族苗族自治州", "西双版纳傣族自治州", "德宏傣族景颇族自治州", "怒江傈僳族自治州", "迪庆藏族自治州"]; 
		    // var neimenggu = ["呼和浩特", "包头", "乌海", "赤峰", "通辽", "鄂尔多斯", "呼伦贝尔", "巴彦淖尔", "乌兰察布"]; 
		    // var guangxi = ["南宁", "柳州", "桂林", "梧州", "北海", "防城港", "钦州", "贵港", "玉林", "百色", "贺州", "河池", "崇左"]; 
		    // var xizang = ["拉萨", "昌都地区", "林芝地区", "山南地区", "日喀则地区", "那曲地区", "阿里地区"]; 
		    // var ningxia = ["银川", "石嘴山", "吴忠", "固原", "中卫"]; 
		    // var hainan = ["海口", "三亚"]; 
		    // var xianggang = ["中西区", "湾仔区", "东区", "南区", "九龙城区", "油尖旺区", "观塘区", "黄大仙区", "深水埗区", "北区", "大埔区", "沙田区", "西贡区", "元朗区", "屯门区", "荃湾区", "葵青区", "离岛区"]; 
		    // var taiwan = ["台北", "高雄", "基隆", "台中", "台南", "新竹", "嘉义"]; 
		    // var aomeng = ["澳门半岛", "氹仔岛", "路环岛"]; 
		    // //页面加载方法 
		    // $(function () { 
			   //  //设置省份数据 
			   //  setProvince(); 
		    // }); 
		    // //设置省份数据 
		    // function setProvince() { 
		    //     //给省份下拉列表赋值 
		    //     var option, modelVal; 
		    //     var $sel = $("#selProvince");
		    //     //获取对应省份城市 
		    //     for (var i = 0, len = province.length; i < len; i++) { 
		    //     modelVal = province[i]; 
		    //     option = "<option value='" + modelVal + "'>" + modelVal + "</option>";
		    //     //添加到 select 元素中 
		    //     $sel.append(option); 
		    //     } 
		    //     //调用change事件，初始城市信息 
		    //     provinceChange(); 
		    // } 
		    // //根据选中的省份获取对应的城市 
		    // function setCity(provinec) { 
			   //  var $city = $("#selCity"); 
			   //  var proCity, option, modelVal;
			   //  //通过省份名称，获取省份对应城市的数组名
			   //  switch (provinec) { 
			   //      case "请选择": 
			   //      proCity = please_select; 
			   //      break; 
			   //      case "北京": 
			   //      proCity = beijing; 
			   //      break; 
			   //      case "上海": 
			   //      proCity = shanghai; 
			   //      break; 
			   //      case "天津": 
			   //      proCity = tianjing; 
			   //      break; 
			   //      case "重庆": 
			   //      proCity = chongqing; 
			   //      break; 
			   //      case "浙江": 
			   //      proCity = zhejiang; 
			   //      break; 
			   //      case "江苏": 
			   //      proCity = jiangsu; 
			   //      break; 
			   //      case "广东": 
			   //      proCity = guangdong; 
			   //      break; 
			   //      case "福建": 
			   //      proCity = fujiang; 
			   //      break; 
			   //      case "湖南": 
			   //      proCity = hunan; 
			   //      break; 
			   //      case "湖北": 
			   //      proCity = hubei; 
			   //      break; 
			   //      case "辽宁": 
			   //      proCity = liaoning; 
			   //      break; 
			   //      case "吉林": 
			   //      proCity = jilin; 
			   //      break; 
			   //      case "黑龙江": 
			   //      proCity = heilongjiang; 
			   //      break; 
			   //      case "河北": 
			   //      proCity = hebei; 
			   //      break; 
			   //      case "河南": 
			   //      proCity = henan; 
			   //      break; 
			   //      case "山东": 
			   //      proCity = shandong; 
			   //      break; 
			   //      case "陕西": 
			   //      proCity = shangxi; 
			   //      break; 
			   //      case "甘肃": 
			   //      proCity = gansu; 
			   //      break; 
			   //      case "新疆": 
			   //      proCity = xinjiang; 
			   //      break; 
			   //      case "青海": 
			   //      proCity = qinghai; 
			   //      break; 
			   //      case "山西": 
			   //      proCity = shanxi; 
			   //      break; 
			   //      case "四川": 
			   //      proCity = sichuan; 
			   //      break; 
			   //      case "贵州": 
			   //      proCity = guizhou; 
			   //      break; 
			   //      case "安徽": 
			   //      proCity = anhui; 
			   //      break; 
			   //      case "江西": 
			   //      proCity = jiangxi; 
			   //      break; 
			   //      case "云南": 
			   //      proCity = yunnan; 
			   //      break; 
			   //      case "内蒙古": 
			   //      proCity = neimenggu; 
			   //      break; 
			   //      case "西藏": 
			   //      proCity = xizang; 
			   //      break; 
			   //      case "广西": 
			   //      proCity = guangxi; 
			   //      break; 
			   //      case "": 
			   //      proCity = xizang; 
			   //      break; 
			   //      case "宁夏": 
			   //      proCity = ningxia; 
			   //      break; 
			   //      case "海南": 
			   //      proCity = hainan; 
			   //      break; 
			   //      case "香港": 
			   //      proCity = xianggang; 
			   //      break; 
			   //      case "澳门": 
			   //      proCity = aomeng; 
			   //      break; 
			   //      case "台湾": 
			   //      proCity = taiwan; 
			   //      break; 
			   //  } 
			   //  //先清空之前绑定的值 
			   //  $city.empty(); 
			   //  //设置对应省份的城市 
			   //  for (var i = 0, len = proCity.length; i < len; i++) { 
			   //      modelVal = proCity[i]; 
			   //      option = "<option value='" + modelVal + "'>" + modelVal + "</option>"; 
			   //      //添加 
			   //      $city.append(option); 
			   //  }
		    // } 
		    // //省份选中事件 
		    // function provinceChange() { 
			   //  var $pro = $("#selProvince"); 
			   //  setCity($pro.val()); 
		    // }
		    var a = $('#selProvince option');
		    $('.btn-primary').click(function(){
			    console.log($("#selProvince").val() +" "+ $("#selCity").val());
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
		}
	</script>
</body>
</html>