/*
  通用的工具函数模块
*/
var utils= {
    // 判断是否为IE浏览器
    'isIE': function (){
        if (window.navigator.userAgent.indexOf("MSIE")>=1) {
            return true;
        }
        else{
            return false;
        }
    },
    // 身份证号码
    'isID': function (val) {
        var reg= /^(^[1-9]\d{5}(18|19|([23]\d))\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$)|(^[1-9]\d{5}\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{2}$)$/;
        if(!reg.test(val)) {
            return false;
        }
        return true;
    },
    // 数字范围正则 (年龄,身高,人数等)
    'digitsBetween': function (min, max, val) {
        var reg= /^\d+$/;
        var num = parseFloat(val);
        if(!reg.test(num)) {
            return false;
        } else {
            if ( num >= min && num <= max ) {
                return true;
            } else {
                return false;
            }
        }
    },
    // 手机号码(联通,电信,移动等手机号段)  联通130.131.132.133.  移动134.135.136.137.138.139  联通146.147（3G）  移动150.151.152  电信153  联通155.156  移动157.158.159
    'isMobile': function (val) {
        var reg= /^(0|86|17951)?(13[0-9]|14[0-9]|17[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;
        if(!reg.test(val)) {
            return false;
        }
        return true;
    },
    // 邮箱
    'isEmail': function (val) {
        var reg= /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
        if(!reg.test(val)) {
            return false;
        }
        return true;
    },
    // 纯数字
    'isNumber': function (val) {
        var reg= /^\d+$/;
        if(!reg.test(val)) {
            return false;
        }
        return true;
    },
    // 英文(不区分大小写Aa-Zz)
    'isLetter': function (val) {
        var reg= /^[a-z]+$/i;
        if(!reg.test(val)) {
            return false;
        }
        return true;
    },
    // 纯汉字
    'isChinese': function (val) {
        var reg= /^[\u4e00-\u9fa5]*$/gm;
        if(!reg.test(val)) {
            return false;
        }
        return true;
    },
    // 邮政编号
    'isPost': function (val) {
        var reg= /^[1-9]\d{5}(?!\d)$/;
        if(!reg.test(val)) {
            return false;
        }
        return true;
    },
    // 特殊字符
    'isSpecial': function (val) {
        var reg= /((?=[\x21-\x7e]+)[^A-Za-z0-9])/gm;
        if(!reg.test(val)) {
            return false;
        }
        return true;
    },
    // 限制字符长度
    'islength': function (size, val) {
        if ( String(val).length >= 0 && String(val).length <= size ) {
            return true;
        } else {
            return false;
        }
    },
}


