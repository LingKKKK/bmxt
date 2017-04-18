<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/order.css')}}">	
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
	<div class="banner">
		<div class="inner">
			<p>支付中心</p>
		</div>
	</div>
	<div class="mid">
		<div id="shopping_order" class="order">
			<span class="title">商品信息</span>
			<div id="shopping_cart" class="product_tabs">
				<div class="product_tab" v-for="(g, index) in goods">
					<div class="product_img"></div>
					<div class="product_name">@{{g.name}}</div>
					<div class="product_delete" v-on:click="goods.splice(index, 1)"></div>
					<div class="product_num">
						<a class="reduce_num" href="JavaScript:;" v-on:click='g.qty > 0 ? g.qty-=1 : 0'>-</a>
						<input class="product_num_public" type="text" name="" v-bind:value="g.qty">
						<a class="add_num" href="JavaScript:;" v-on:click="g.qty += 1">+</a>
					</div>
					<span class="product_price_new">￥<i>@{{g.price}}</i></span>
					<span class="product_price_old">￥<i>199</i></span>
				</div>
			</div>
			<div class="cut"></div>
			<div class="discount">
				<span class="sp1">使用折扣码<i class="icon"><img src="{{ asset('assets/img/select_icon.png')}}"></i></span>
				<span class="sp2">关于折扣码？</span>
				<div class="clearfix"></div>
				<input type="text" name="discount_num" class="discount_num" value="KDEC-KL12-3KCA-ZFFP" />
				<button class="en_use" @click.once="html_change">@{{user}}</button>
				<span class="discount_intro">优惠券：满100减20</span>
				
				<div class="clearfix"></div>
			</div>
			<div class="cut"></div>

			<div class="total_order">
				<div class="total_all">
					<div class="altogether oDiv">
						<span class="right_sp">￥<i>@{{ totalPrice }}</i></span>
						<span class="left_sp">共计<i>1</i>件商品，商品总金额：</span>
					</div>
					<div class="discount_amount oDiv">
						<span class="right_sp">￥<i>@{{ discount}}</i></span>
						<span class="left_sp">优惠金额：</span>
					</div>
					<div class="payable oDiv">
						<span class="right_sp">￥<i>@{{ payPrice}}</i></span>
						<span class="left_sp">应付：</span>
					</div>
					<button>提交订单</button>
					<div class="clearfix"></div>
					<span class="read_agreement">我已阅读并同意<a href="javascript:void(0)">《用户付费协议》</a></span>
					<span class="read_click">
						<div class="active">
							<img src="{{ asset('assets/img/input_click.png')}}">
						</div>
					</span>
					<div class="clearfix"></div>
				</div>
			</div>

		</div>
	</div>
	<div class="bot">
		<div class="logo"></div>
		<span>© 2017 KenRobot  |  京 ICP备15039570号</span>
		<p>北京市海淀区天秀路10号中国农大国际创业园1号楼526</p>
	</div>
</div>
<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script type="text/javascript">
	var cartList = new Vue({
		el: '#shopping_order',
		data: {
			goods: [
				{id: 1, name: 1, price: 12, qty: 3},
				{id: 1, name: 2, price: 13, qty: 3},
				{id: 1, name: 3, price: 14, qty: 1},
			],
			discount: 0,
			user: '确定使用',
		},
		computed: {
			totalPrice: function() {
				var total = 0;
				this.goods.forEach(function(g){
					total+= g.price * g.qty;
				});
				return total;
			},

			payPrice: function(){
				if ( this.discount >= this.totalPrice){
					alert("优惠券不可用");
					// console.log("优惠券不可用");
					this.discount = 0;
					return this.totalPrice;
				}
				return this.totalPrice - this.discount;
			}
		},
		methods: {
			add: function (){
				g.qty -= 1;
			},
			red: function () {
				g.qty += 1;
			},
			html_change: function (){
				console.log(1)
				this.discount = 20;
			}
		}
	})
</script>

<script type="text/javascript">
	window.onload = function ()
	{
		var discount_num = 0;
		$('.discount .sp1').click(function (){
			toggle_discount();
		})

		function toggle_discount() 
		{
			if (discount_num == 0) {
				$('.discount input').css('display', 'block');
				$('.discount button').css('display', 'block');
				$('.discount .discount_intro').css('display', 'block');
				$('.discount .sp1 .icon img').css('transform', 'rotate(0deg)');
				discount_num = 1;
			} else if (discount_num == 1) {
				$('.discount input').css('display', 'none');
				$('.discount button').css('display', 'none');
				$('.discount .discount_intro').css('display', 'none');
				$('.discount .sp1 .icon img').css('transform', 'rotate(-90deg)');
				discount_num = 0;
			}
		}

		// 使用优惠券

		// $('.order .discount .en_use').bind('click', function() {
		// 	$(this).html('成功使用');
		//     $(this).unbind('click');
		// });

		// 购物车数量添加减少
		// $(".add_num").click(function (event) {
		// 	// 绑定点击之后 商品数量改变
		// 	var quantity_goods = $('.total_order .total_all .altogether .left_sp i');
		//     var product_num_variable = $(this).parents('.product_num').find('.product_num_public');
		//     console.dir(product_num_variable)
		//     product_num_variable.val(parseInt(product_num_variable.val()) + 1);

		//     quantity_goods.html(product_num_variable.val());
		//     // var danjia = parseFloat($(this).parent('.product_num').parents('.product_tab').find('.product_price_new').find('i').html());
		//     // 商品单价  
		//     var totle_price = $('.total_order .total_all .altogether .right_sp i'); 
		// 	var total = 0;
		// 	$('.product_tab').each(function(index, el) {
		// 		$(this).find('.product_price_new').find('i').html();

		// 		var price = $(this).find('.product_price_new').find('i').html();
		// 		var quantity = $(this).find('.product_num').find('input').val();
		// 		total += price * quantity;
		// 	});
		// 	totle_price.html(Number(total).toFixed(2));

		//  	var Num_amount = $('.total_order .total_all .discount_amount .right_sp i');
		// 	var Num_payable = $('.total_order .total_all .payable .right_sp i');
		// 	Num_payable.html(Number(totle_price.html() - Num_amount.html()).toFixed(2));
			
		// });
		// $(".reduce_num").click(function () {
		// 	var quantity_goods = $('.total_order .total_all .altogether .left_sp i');
		// 	var Num_amount = $('.total_order .total_all .discount_amount .left_sp i');
		// 	var product_num_variable = $(this).parents('.product_num').find('.product_num_public');
  //           var product_num_variable = $(this).next();
  //           if (product_num_variable.val() == 1) {
  //               return;
  //           }
  //           product_num_variable.val(parseInt(product_num_variable.val()) - 1);
		//     quantity_goods.html(product_num_variable.val());
		//     var totle_price = $('.total_order .total_all .altogether .right_sp i'); 
		// 	var total = 0;
		// 	$('.product_tab').each(function(index, el) {
		// 		$(this).find('.product_price_new').find('i').html();
		// 		var price = $(this).find('.product_price_new').find('i').html();
		// 		var quantity = $(this).find('.product_num').find('input').val();
		// 		total += price * quantity;
		// 	});
		// 	totle_price.html(Number(total).toFixed(2));
		//  	var Num_amount = $('.total_order .total_all .discount_amount .right_sp i');
		// 	var Num_payable = $('.total_order .total_all .payable .right_sp i');
		// 	Num_payable.html(Number(totle_price.html() - Num_amount.html()).toFixed(2));
  //       })

		var read_click_num = 0;
        $('.total_all .read_click').click(function (){
        	read_click();
        })



        function read_click (){
        	if ( read_click_num == 0 ){
        		$('.total_all .read_click').find('.active').hide();
        		$('.total_all .read_click').parent().find('button').css('pointer-events', 'none');
        		read_click_num = 1;
        	}else if( read_click_num == 1 ) {
        		$('.total_all .read_click').find('.active').show();
        		$('.total_all .read_click').parent().find('button').css('pointer-events', 'all');
        		read_click_num = 0;
        	}
        }
	}
</script>
</body>
</html>
