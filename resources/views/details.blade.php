<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/details.css')}}">   
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
    <div class="path">
        <div class="inner">
            <a href="javascript:void(0);">首页</a>
            <a href="javascript:void(0);">></a>
            <a href="javascript:void(0);">商城</a>
            <a href="javascript:void(0);">></a>
            <a href="javascript:void(0);">主控板</a>
            <a href="javascript:void(0);">></a>
            <div class="classify" id="classify">
                <p class="product_selected" v-on:click="showGoodsList = 1">@{{currentGoods.name}}</p>
                <ul class ="product_list" v-show="showGoodsList" v-on:mouseover="showGoodsList=1" v-on:mouseout="showGoodsList = 0">
                    <li v-for="(g, index) in products" v-bind:title="g.name" v-on:click="goodsIndex = index, showGoodsList = 0">@{{subStr(g.name)}}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="products_details">
        <div class="inner">
            <div class="products_img"></div>
            <div class="products_payment">
                <span class="product_name">@{{currentGoods.name}}</span>
                <span class="producr_intro">@{{currentGoods.intro}}</span>
                <div class="payment_list">
                    <span class="info_label">萝卜价</span>
                    <span class="price">￥<i>@{{currentGoods.price}}</i></span>
                    <span class="market_price">[￥<i>@{{currentGoods.market_price}}</i>]</span>
                    <div class="clearfix"></div>                    
                    <span class="info_label">运费</span>
                    <span class="address"><i class="shop_address">北京</i>至<i class="buyer_address">新疆</i></span>
                    <span class="express_price">快递：<i>@{{express_price}}</i></span>
                    <div class="clearfix"></div>
                    <span class="info_label">重量</span>
                    <span class="product_weight">@{{currentGoods.weight}}</span>
                    <div class="clearfix"></div>
                </div>
                <input class="product_quantity" type="text" v-bind:value="currentGoods.qty" onkeyup="value=value.replace(/[^\d]/g,'')">
                <div class="quantity_change">
                    <a class="add" href="javascript:;" v-on:click='currentGoods.qty += 1'>+</a>
                    <a class="dex" href="javascript:;" v-on:click='currentGoods.qty > 0 ? currentGoods.qty-=1 : 0'>-</a>
                </div>
                <button class="buy_now">立即购买</button>
                <button class="add_to_car">加入购物车</button>
            </div>
            <div class="clearfix"></div>
            <div class="tabs_details">
                <div class="official_recommen">
                    <p>官方推荐</p>
                    <div class="official_recommen_list">
                        <div class="recommen">
                            <div class="img"></div>
                            <span class="name">Elegoo MEGA 2560 R3 Board ATmega2560 ATMEGA16U2 + USB Cable Compatible h …</span>
                            <span class="price">￥117</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="official_recommen_list">
                        <div class="recommen">
                            <div class="img"></div>
                            <span class="name">Elegoo MEGA 2560 R3 Board ATmega2560 ATMEGA16U2 + USB Cable Compatible h …</span>
                            <span class="price">￥117</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="tab_details">
                    <ul id="oClick_tabs">
                        <li v-on:click="tabindex = 0" v-bind:class="{active:tabindex == 0}">商品详情</li>
                        <li v-on:click="tabindex = 1" v-bind:class="{active:tabindex == 1}">商品参数</li>
                        <li v-on:click="tabindex = 2" v-bind:class="{active:tabindex == 2}">售后保障</li>
                        <li v-on:click="tabindex = 3" v-bind:class="{active:tabindex == 3}">商品评论</li>
                    </ul>
                    <div class="alls_product">
                        <div class="details_product" v-show="tabindex == 0">
                            <div class="img">@{{currentGoods.tabs.details.a}}</div>
                            <div class="p" v-html="currentGoods.tabs.details.b"></div>
                        </div>
                        <div class="details_parameter" v-show="tabindex == 1">
                            <ul class="products_attribute">
                                <li v-for="item in currentGoods.tabs.parameter.lists">
                                    <span class="attribute">@{{item.attr}}</span>
                                    <span class="value">@{{item.value}}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="details_service" v-show="tabindex == 2">
                            <div class="service" v-for="item in currentGoods.tabs.service">
                                <span class="title">@{{item.sp1}}</span>
                                <span class="subtitle">@{{item.sp2}}</span>
                                <span class="text">@{{item.sp3}}</span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="details_comment" v-show="tabindex == 3">@{{currentGoods.tabs.comment}}</div>
                    </div>
                </div>
                
                <div class="clearfix"></div>
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
        el: '#info',
        data: {
            products: [
                {
                    id: 1, 
                    name: 'Elegoo MEGA 2560 R1 Board ATmega2560 ATMEGA16U2 + USB Cable Compatible With Arduino', 
                    intro: '最好的也是最靠谱的智能硬件主控板，没有之一',
                    price: 111, 
                    qty: 1, 
                    market_price: 555, 
                    weight: "0.98KG",
                    tabs: {
                        details: {
                            a: "这里放图片信息",
                            b: "<p>Arduino是一个基于开源开发环境，有用简单的I/O接口的物理计算平台。Arduino可以用于独立做项目开发的控制核心也可以与PC进行直接的USB连接完成与电脑间的互动。Arduino开源IDE开发环境可以通过相关文档的链接直接免费下载(支持Window，Linux以及Max系统)。</p><p>DFRobot是意大利Arduino官方授权的大陆区域代理商，代理Arduino旗下的多款控制器和扩展板产品。我们的技术支持和售后服务都经过Arduino官方的认证，能够保证产品和服务的质量。产品均是从意大利直接进口，需要支付进口关税等费用，但是为了让国内用户能够体验官方原版的细节美感，我们把价格控制玩家可接受的水平。欢迎喜欢开源硬件的朋友，前来咨询洽谈。DFRobot代理Arduino官方以下产品，需要更多Arduino原版，请与我们联系。</p><p>Arduino UNO R3 (for China) 是DFRobot与Arduino官方合作推出的一款中文特别定制版。除了保留之前R2版的所有特点之外，这个版本使用了更强大的ATmega16U2替代了之前的ATmega8U2作为USB转串口芯片，提供更快的速度与更好的稳定性。Arduino UNO R3的安装驱动自动集成于Arduino IDE中，免去了用户自行下载的麻烦。</p><p>Arduino Uno R3 (for China)在接口上与官方的UNO R3 保持一致，兼容任何现存的Arduino UNO扩展板。特性上直接继承了官方R3版的所有特性，增加了AREF边上的SDA和SCL端口，增加了RESET管脚边上两个新的端口：IOREF和一个扩展预留口。 此外，Arduino UNO R3 中文定制版，在定制过程中引入了中文元素，关键位置增加了中文标注，使得中文用户在使用上更加毫无压力。注意事项：Arduino UNO R3的安装驱动集成于Arduino IDE中，Window用户需要先安装Arduino IDE。Arduino IDE下载链接（复制 网址到浏览器）：<a href='http://arduino.org.cn/software'>http://arduino.org.cn/software</a></p><div class='clearfix'></div>",
                        },
                        parameter: {
                            "lists": [
                                {
                                    attr: "工作电压",
                                    value: "5V",
                                },{
                                    attr: "输入电压",
                                    value: "接上USB时无须外部供电或外部7V~12V DC输入",
                                },{
                                    attr: "输出电压",
                                    value: "5V DC输出和3.3V DC输出 和外部电源输入",
                                },{
                                    attr: "微处理器",
                                    value: "ATmega328",
                                },{
                                    attr: "Bootloader",
                                    value: "Arduino Uno",
                                },{
                                    attr: "时钟频率",
                                    value: "16 MHz",
                                },{
                                    attr: "输入电压（推荐）",
                                    value: "7-12V",
                                },{
                                    attr: "输入电压（限制）",
                                    value: "6-20V",
                                },{
                                    attr: "工作电压",
                                    value: "5V",
                                },{
                                    attr: "输入电压",
                                    value: "接上USB时无须外部供电或外部7V~12V DC输入",
                                },{
                                    attr: "输出电压",
                                    value: "5V DC输出和3.3V DC输出 和外部电源输入",
                                },{
                                    attr: "微处理器",
                                    value: "ATmega328",
                                },{
                                    attr: "Bootloader",
                                    value: "Arduino Uno",
                                },{
                                    attr: "时钟频率",
                                    value: "16 MHz",
                                },{
                                    attr: "Bootloader",
                                    value: "Arduino Uno",
                                },{
                                    attr: "时钟频率",
                                    value: "16 MHz",
                                }
                            ]
                        },
                        service: [
                            {
                                sp1: "京东承诺",
                                sp2: "",
                                sp3: "",
                            },{
                                sp1: "卖家服务",
                                sp2: "京东平台卖家销售并发货的商品，由平台卖家提供发票和相应的售后服务。请您放心购买！",
                                sp3: "注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！",
                            },{
                                sp1: "正品行货",
                                sp2: "京东商城向您保证所售商品均为正品行货，京东自营商品开具机打发票或电子发票。",
                                sp3: "",
                            },{
                                sp1: "全国联保",
                                sp2: "凭质保证书及京东商城发票，可享受全国联保服务（奢侈品、钟表除外；奢侈品、钟表由京东联系保修，享受法定三包售后服务），与您亲临商场选购的商品享受相同的质量保证。京东商城还为您提供具有竞争力的商品价格和运费政策，请您放心购买！",
                                sp3: "注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！",
                            },{
                                sp1: "无忧退换货",
                                sp2: "客户购买京东自营商品7日内（含7日，自客户收到商品之日起计算），在保证商品完好的前提下，可无理由退货。（部分商品除外，详情请见各商品细则）",
                                sp3: "",
                            }
                        ],
                        comment: "1-4",
                    },
                },
                {
                    id: 2, 
                    name: 'Elegoo MEGA 2560 R2 Board ATmega2560 ATMEGA16U2 + USB Cable Compatible With Arduino', 
                    intro: '最好的也是最靠谱的智能硬件主控板，没有之一',
                    price: 222, qty: 1, 
                    market_price: 666, 
                    weight: "1.98KG",
                    tabs: {
                        details: "",
                        parameter: "2-2",
                        service: "2-3",
                        comment: "2-4",
                    },
                },
                {
                    id: 3,
                    name: 'Elegoo MEGA 2560 R3 Board ATmega2560 ATMEGA16U2 + USB Cable Compatible With Arduino',
                    intro: '最好的也是最靠谱的智能硬件主控板，没有之一',
                    price: 333,
                    qty: 1,
                    market_price: 777,
                    weight: "2.98KG",
                    tabs: {
                        details: "3-1",
                        parameter: "3-2",
                        service: "3-3",
                        comment: "3-4",
                    },
             },
            ],
            express_price: "30.00",
            goodsIndex: 0,
            showGoodsList: 0,
            tabindex : 0,

        },
        computed: {
            currentGoods: function(){
                console.log(this.goodsIndex);
                return this.products[this.goodsIndex];
            }
        },
        methods: {
            subStr: function(str, length = 20) {
                return str.substr(0, length);
            }
        }
    })

    console.log(cartList.$data.products);
</script>
</body>
</html>
