/*
  验证
*/
var utils_tips = {
    /*
    * html里面 <input id="" class="" name="" tipsInfo="提示信息" tipsWarn="错误警告" />
    */
    addTips: function() {
        // 添加tips标签
        $(this).after('<div class="tips"></div>')
    },
    tipsInfo: function() {
        // 添加提示标签
        var msg = $(this).attr(tipsInfo);
        $(this).siblings('.tips').html('<span class="cue">'+msg+'</span>');
    },
    tipsWarn: function() {
        // 添加提交后错误提示的标签
        var msg = $(this).attr(tipsWarn);
        $(this).siblings('.tips').html('<span class="unuse">'+msg+'</span>');
    },
    tipsFinish: function() {
        //  验证通过之后 返回的true标签
        $(this).siblings('.tips').html('<span class="useable"><i class="icon kenrobot ken-check"></i></span>');
    },
    tipsClear: function() {
        // 清除tips标签
        $(this).siblings('.tips').html('');
    }
}
