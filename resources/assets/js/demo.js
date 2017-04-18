/**
 * Created by pengfei on 2017/3/15.
 */
<script type="text/javascript">
    //切换个人资料
    // $('.experts-recommend .wrap').nav({
    //     t: 6000,
    //     a: 300
    // });
    $('.tabpages .tabitem a').click(function() {
        if ($(this).hasClass('disabled')) {
            return;
        }
        var id = $(this).attr('data-tab-id');
        var t = $('.tabpages .tabitem a').removeClass('current');
        $(this).addClass('current');
        $('.platform-content .item').removeClass('current');
        $('.platform-content #item' + id).addClass('current');
    });
//点击播放视频
$('.play-video a').click(function() {
    $('.videobox').show();
})

$('#stop-demo-video').click(function() {
    var video = $('#demo-video')[0];
    video.currentTime = 0;
    video.pause();
    $('.videobox').hide();
});
//打赏界面
var money_random = [];
var r=[];
for(var i=0;i<100;i++){
    r[i]=(10 + parseInt(Math.random()*90)).toFixed(2);
}
$('#symbolNum').click(function(){
    var index = Math.floor((Math.random()*r.length));
    // alert(r[index]);
    $("#money").val(r[index]);
    $('#saoma-money').html(r[index]);
})
$('#money').blur(function(){
    var amount = $('#money').val();
    amount = parseFloat(amount).toFixed(2);
    $('#money').val(amount);
});
//调用打赏接口
var order_no = '';
function isValidMoney(money) {
    var money_pattern = /^(([1-9]\d{0,9})|0)(\.\d{2})?$/;
    var ret = (money+'').match(money_pattern);
    return ret !== null ? true : false;
}
function showPayment(total_fee, qrcodeimgurl){
    $('#saoma-money').html(total_fee/100.0);
    $('#pay_qrcodeimg').attr('src', qrcodeimgurl);
    $('#payBox').css('display','none');
    $('#random').css('display','none');
    $('#saoma').css('display','block');
}
//弹出所有版本的下载链接
$(function(){
    $('#other').click(function(){
        loadAllVersion();
    })
});
function loadAllVersion(){
    $.post(
        'http://www.kenrobot.com?app=public&mod=Download&act=allversion',
        {

        },
        function (res) {
            if (res.status == 0) {
                showAllVersion();
            }
            // console.log(res.data);
        }
    );
}

function showAllVersion() {
    $('#ajaxform').show();
}
function createOrder(total_fee){
    $.post('http://www.kenrobot.com/payment/order.php?act=create',
        {
            total_fee : total_fee,
        }, function(res) {
            if (res.status == 0) {
                showPayment(total_fee, res.data.qrcodeurl);
                order_no = res.data.out_trade_no;
                startQueryOrder();
            }
        });
}

var clock = null;
function startQueryOrder()
{
    clearInterval(clock);
    clock = setInterval(function(){
        queryOrder(order_no);
    }, 3000);
}
function stopQueryOrder()
{
    clearInterval(clock);
    order_no = '';
    $('#payBox').css('display','none');
    $('#random').css('display','none');
    $('#saoma').css('display','none');
}
function queryOrder(order_no) {
    if (!order_no) {
        stopQueryOrder();
    }
    $.post('http://www.kenrobot.com/payment/order.php?act=query',
        {
            order_no : order_no,
        }, function(res) {
            if (res.status == 0) {
                //打赏成功
                // alert('success');
                stopQueryOrder();
                showThanksPage();
            }
        });
}

function showThanksPage() {
    $('#page_thanks').css('display','block');
}

$('.money-gift').click(function(){
    var total_fee = $(this).attr('data-val');
    createOrder(total_fee);
    // $('#random').css('display','block');
});

// 点击立即打赏
$('#now').click(function(){
    var amount = $('#money').val();
    var isvalid = isValidMoney(amount);
    if (!isvalid) {
        alert('错误的金额');
        return;
    }

    var total_fee = (amount+"").split('.').join('');
    createOrder(total_fee);
})


// 点击下载之后 自动下载 并且弹出打赏页面
$('.download-click .pay').click(function(){
    $('#payBox').css('display','block');
    $('#random').css('display','none');
})

// 点击自定义金额
$('#userCheck').click(function(){
    $('#payBox').css('display','none');
    $('#random').css('display','block');
})
// 点击差号 取消pay栏目显示
$('#payBox .top i').click(function(){
    $('#payBox').css('display','none');
})
$('#random .top i').click(function(){
    $('#random').css('display','none');
})
$('#saoma .top i').click(function(){
    $('#saoma').css('display','none');
    stopQueryOrder();
})
$('#page_thanks .top i').click(function(){
    $('#page_thanks').css('display','none');
})
// 给轮播图添加定时器
var timer=null;
var iNow=0;
var oLi= $("#click li");
$("#click li").click(function(){
    $(this).addClass("ac").siblings().removeClass("ac");
    var index=$(this).index();
    iNow=index;
    $(".interface-dowmload .inner_bg_1").eq(iNow).addClass("active").siblings().removeClass("active");
});
timer=setInterval(function(){
    iNow++;
    if(iNow>oLi.length-1){
        iNow=0;
    }
    oLi.eq(iNow).trigger("click");
},3000);
// 给个人简介添加定时器
var timer_person=null;
var iNow_person=0;
var oLi_person= $(".switch-tab a");
$(".switch-tab a").click(function(){
    $(this).addClass("active").siblings().removeClass("active");
    var index=$(this).index();
    iNow_person=index;
    $(".wrap.clearfix .event-item").eq(iNow_person).addClass("current").siblings().removeClass("current");
});
timer_person=setInterval(function(){
    iNow_person++;
    if(iNow_person>oLi_person.length-1){
        iNow_person=0;
    }
    oLi_person.eq(iNow_person).trigger("click");
},4000);
$('#next').click(function(){
    iNow_person++;
    oLi_person.eq(iNow_person).trigger("click");
})
$('#pre').click(function(){
    iNow_person--;
    oLi_person.eq(iNow_person).trigger("click");
})
// 弹出其他版本链接的下载地址

$('#other').click(function(){

})

</script>