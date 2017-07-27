// 帮助类

/*************************
      字段验证
**************************/


//判断是否位真实姓名
function isName(val) {
    reg= /^[\u4e00-\u9fa5a-z·]+$/gi;
    if(!reg.test(val)) {
        return false;
    }
    return true;
}
//数字 英文 汉字
function isMathEngCha(val) {
    reg= /^[\w\u4e00-\u9fa5\(\)（）][\s\w\u4e00-\u9fa5\(\)（）]*(?!\s)$/gi;
    if(!reg.test(val)) {
        return false;
    }
    return true;
}
//数字 英文 汉字  agemenber
function isAgemenber(val) {
    reg= /^([0-9]|[0-9]{2}|80)$/gi;
    if(!reg.test(val)) {
        return false;
    }
    return true;
}
// 身高 isHeightnum  heightNum
function isHeightnum(val) {
    reg= /^1[6-9]$|^[2-9]\d$|^1\d{2}$/gi;
    if(!reg.test(val)) {
        return false;
    }
    return true;
}
//邮件判断
function isEmail(mail) {
    reg=/^([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/gi;
    if(!reg.test(mail)) {
        return false;
    }
    return true;
}
//手机
function isMobile(val) {
    // reg = /^1(?:[38]\d|4[4579]|5[0-35-9]|7[35678])\d{8}$/;
    // ret = /^(0|86|17951)?(13[0-9]|15[012356789]|17[3678]|18[0-9]|14[57])[0-9]{8}$/;
    var reg = /^1\d{10}$/;

    if(!reg.test(val)) {
        return false;
    }
    return true;
}

function isFloat(val) {
    var reg = /^\d+(\.\d{1,2})?$/;
    if (!reg.test(val)) {
        return false;
    }
    return true;
}

//身份证
function isID(val) {
    var vcity={ 11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古", 21:"辽宁",22:"吉林",23:"黑龙江",31:"上海",32:"江苏", 33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南", 42:"湖北",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆", 51:"四川",52:"贵州",53:"云南",54:"西藏",61:"陕西",62:"甘肃", 63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外"};
    var idCardReg =/(^\d{15}$)|(^\d{17}([0-9]|X|x))$/gi;

    if(!idCardReg.test(val)) {
        return false;
    }
    return true;
}

function detectIE()
{
    var userAgent = navigator.userAgent; //取得浏览器的userAgent字符串  
    var isOpera = userAgent.indexOf("Opera") > -1; //判断是否Opera浏览器  
    var isIE = userAgent.indexOf("compatible") > -1 && userAgent.indexOf("MSIE") > -1 && !isOpera; //判断是否IE浏览器  
    var isEdge = userAgent.indexOf("Windows NT 6.1; Trident/7.0;") > -1 && !isIE; //判断是否IE的Edge浏览器  
    var isFF = userAgent.indexOf("Firefox") > -1; //判断是否Firefox浏览器  
    var isSafari = userAgent.indexOf("Safari") > -1 && userAgent.indexOf("Chrome") == -1; //判断是否Safari浏览器  
    var isChrome = userAgent.indexOf("Chrome") > -1 && userAgent.indexOf("Safari") > -1; //判断Chrome浏览器  

    if (isIE)   
    {  
        var reIE = new RegExp("MSIE (\\d+\\.\\d+);");  
        reIE.test(userAgent);  
        var fIEVersion = parseFloat(RegExp["$1"]);  
        if(fIEVersion == 7)  
        { 
            return "IE7";
        }  
        else if(fIEVersion == 8)  
        { 
            return "IE8";
        }  
        else if(fIEVersion == 9)  
        { 
            return "IE9";
        }  
        else if(fIEVersion == 10)  
        { 
            return "IE10"
        }  
        else if(fIEVersion == 11)  
        { 
            return "IE11"
        }  
        else  
        { 
            return "0"
            // return "IE版本过低"
        }
    }//isIE end 
    return '';
}


function invitecodeCheck(invitecode) {
    var ret = false;
    $.ajax({
        type: "post",
        url: "/checkinvitecode",
        data:{
            invitecode: invitecode
        },
        async: false,
        timeout: 5000,
        success:function(res) {
            if (res.status == 0) {
                ret = true;
            } else {
                ret = false;
            }
        }
    });
    return ret;
}

// 队伍名检查
function teamNameCheck(team_name) {
    var ret = false;
    $.ajax({
        type: "post",
        url: '/checkteamname',
        data:{
            team_name: team_name
        },
        async: false,
        timeout: 5000,
        success: function(res) {
            if (res.status == 0) {
                ret = true;
            } else {
                ret = false;
            }
        }
    });
    return ret;
}

// 校验手机验证码
function verificationcodeCheck(verificationcode) {
    var ret = false;
    $.ajax({
        type: "post",
        url: '/verificationcode/verify',
        data: {
            verificationcode: verificationcode
        },
        async: false,
        timeout: 5000,
        success: function(res) {
            if (res.status == 0) {
                ret = true;
            } else {
                ret = false;
            }
        }
    });
    return ret;
}


// 预览照片
function picPreview(obj, id) {
    console.log(obj);
    var ieVersion = detectIE();
    if(ieVersion == 'ie8' || ieVersion == 'ie9'){
        if (obj) {
            obj.select();
            obj.blur();
            var nfile = document.selection.createRange().text;
            document.selection.empty();
            document.getElementById(id).style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src='"+nfile+"')";
            document.getElementById(id).style.backgroundImage="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src='"+nfile+"')";
        }
    }


}










// 更新预览界面
function updatePreview() {
    $('input, select').each(function(){
        var type = $(this).prop('type');
        var id = $(this).attr('id');
        var name = $(this).attr('name');
        var val = $(this).val();
        if (type == 'select-one') {
            val = $('#'+id+' option:selected').val();
            if (id == 'competition_name') {
               val = $('#'+id+' option:selected').text();
            }
            $('#preview_competition_name').html($('#competition_name  option:selected').text())
            $('#preview_' + id).html(val);
        }

        if (type == 'text' || type == 'select-one') {
            $('#preview_' + id).html(val);
        }
        if (type == 'radio') {
            var chkVal = $('input:radio[name="'+name+'"]:checked').val();
            // console.log($(this), chkVal)
            var new_ID = $(this).siblings('p').attr('id');
            $('#preview_' + name).html(chkVal);
            $('#preview_' + new_ID).html(chkVal);
        }
        // 默认填写图片文件的路径
        if (type == 'file') {
            if (detectIE() == 'ie8' || detectIE() == 'ie9') {
            } else {
                var fileObj = $('#'+id);
                if (fileObj) {
                    if (fileObj.attr('files')) {
                        var f = fileObj.attr('files')[0];
                        if(f){
                            console.log(1);
                            $('#preview_'+id).attr('src', URL.createObjectURL(f));
                        }
                    } else {
                    }
                }
            }
        }
        if (type == 'select-one') {
            if ($(this).siblings('p').length == 0) {
                var chkVal = $('select[name="'+name+'"]').find('option:selected').val();
                var new_ID = $(this).siblings('input').attr('id');
                $('#preview_' + new_ID).html(chkVal);
            } else {
                var chkVal = $(this).siblings('p').text();
                var new_id = $(this).siblings('p').attr('id');
                $('#preview_' + new_id).html(chkVal);
            }
        }
    });
    // 领队信息部分
    $('.teachers > .leader_list').each(function(index){
        var mapKey = new Array('leader_name', 'leader_id' ,'leader_mobile', 'leader_email', 'leader_sex', 'leader_pic');
        for (var i = 0; i < mapKey.length; i++) {
            var key = mapKey[i];
            var $el = $($(this).find('.'+key)[0]);
            var type = $el.prop('type');
            var val = $el.val();
            if(type == 'radio')
            {
                val = $($(this)).find('.'+key+":checked").val();
            }
            var preview_el = '#preview_'+index+'_'+key;
            // console.log(preview_el, key, index);//
            if (type == 'file') {
                // console.log('here')
                var picurl = $el.data('picurl');
                if (picurl) {
                    $(preview_el).attr('src', picurl);
                    continue;
                }
                var fileObj = $el.prop('files');
                if (fileObj) {
                    if ($el.prop('files')) {
                        var f = $el.prop('files')[0];
                        if(f){
                            $(preview_el).attr('src', URL.createObjectURL(f));
                        }
                    }
                }
                continue;
            }
            $(preview_el).html(val);
        }
        $('#leader_info_'+index).show();
    })
    // 队员信息部分
    $('.student_info .students > .member_list').each(function(index){
        var mapKey = new Array('member_name', 'member_id' ,'member_mobile', 'member_age', 'member_sex', 'member_height', 'member_school_name', 'member_school_address', 'member_pic', 'member_id_type', 'member_passport');
        for (var i = 0; i < mapKey.length; i++) {
            var key = mapKey[i];
            var $el = $($(this).find('.'+key)[0]);
            var type = $el.prop('type');
            var val = $el.val();
            // console.log($el);
            if(type == 'radio')
            {
                val = $($(this)).find('.'+key+":checked").val();
            }
            var preview_el = '#preview_'+index+'_'+key;

            if (type == 'file') {
                console.log('there')
                var picurl = $el.data('picurl');
                if (picurl) {
                    $(preview_el).attr('src', picurl);
                    continue;
                }
                var fileObj = $el.prop('files');
                if (fileObj) {
                    if ($el.prop('files')) {
                        var f = $el.prop('files')[0];
                        if(f){
                            $(preview_el).attr('src', URL.createObjectURL(f));
                        }
                    }
                }
                continue;
            }
            $(preview_el).html(val);
        }
        $('#member_info_'+index).show();
    })
}

