<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/payment.css')}}">   
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
        <div class="payment">
            <p class="payment_num">订单号：<i>1703151514364566</i></p>
            <span class="payment_intro">订单详情</span>
            <div class="clearfix"></div>
            <div class="product_tabs">
                <!-- <div class="product_tab">
                    <div class="product_img"></div>
                    <div class="product_name">@{{g.name}}</div>
                    <div class="product_num">
                        <input class="product_num_public" type="text" name="" v-bind:value="g.qty">
                    </div>
                    <span class="product_price_new">￥<i>@{{g.price}}</i></span>
                    <span class="product_price_old">￥<i>199</i></span>
                </div> -->
            </div>
            <div class="cut"></div>
            <span class="payment_way">支付方式</span>
            <ul class="">
                <li class="active"><span>微信支付图片</span></li>
                <li><span>支付包支付图片</span></li>
                <div class="clearfix"></div>
            </ul>
            <div class="cut"></div>
            <span class="prompt">请在 23小时59分钟 以内支付完成，如未完成此订单将自动关闭。需重新购买！</span>
            <div class="payment_price">
                <span class="right_sp">￥<i>148</i></span>
                <span class="left_sp">应付金额：</span>
            </div>
            <div class="clearfix"></div>
            <button class="payment_now">立即支付</button>
            <div class="clearfix"></div>
            
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
    $(function() {
        $('.payment ul li').click(function(event) {
            $(this).addClass('active').siblings().removeClass('active');
        });

        var payment_num = 0;
        $('.payment_intro').click(function(event) {
            if ( payment_num == 0 ){
                $(this).html('收起订单')
                $('.product_tabs').show();
                payment_num = 1;
            }else if ( payment_num == 1 ){
                $(this).html('订单详情')
                $('.product_tabs').hide();
                payment_num = 0;
            }
        });

        loadAllVersion();
        function loadAllVersion() 
        {
            $.get('http://enroll0.kenrobot.com//payment/list',
                function (res) {
                    if (res.status == 0) {
                        showAllVersion(res.data);
                        $('.payment_num').find('i').html(res.data.order_no)
                    }
                }
            );
        }
        
        function showAllVersion(data)
        {
            console.log(data)
            var str = '';
            for(var course in data)
            console.log(data[course])
            {
                for (var i in data[course]){
                    // console.log(data[course].name)
                    str += '<div class="product_tab">';
                    str += '<div class="product_img"></div>';
                    str += '<div class="product_name">'+data[course][i].name+'</div>';
                    str += '<div class="product_num">';
                    str += '<input class="product_num_public" type="text" name="" value="数量:'+data[course][i].qty+'">';
                    str += '</div>';
                    str += '<span class="product_price_new">￥<i>'+data[course][i].price+'</i></span>';
                    str += '<span class="product_price_old">￥<i>'+data[course][i].market_price+'</i></span>';
                    str += '</div>';
                }
            }
            $('.product_tabs').html(str);
            
        }


    });
</script>
</body>
</html>
