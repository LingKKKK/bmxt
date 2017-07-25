/*
  验证
*/
var utils_formdata = {
    // 仅包含字母字符
    "alpha": function(val) {
        var reg = /^[A-Za-z]*$/;
        if (!reg.test(val)) {
            return false;
        }
        return true;
    },
    // 仅包含汉字
    "chinese": function(val) {
        var reg = /^[\u2E80-\u9FFF]+$/;
        if (!reg.test(val)) {
            return false;
        }
        return true;
    },
    //  仅包含字母、数字、破折号以及下划线
    "alpha_dash": function(val) {
        var reg = /^[A-Za-z0-9_-]+$/ig;
        if (!reg.test(val)) {
            return false;
        }
        return true;
    },
    // 仅包含字母、数字 
    "alpha_num": function(val) {
        var reg = /^[A-Za-z0-9]+$/ig;
        if (!reg.test(val)) {
            return false;
        }
        return true;
    },
    // 日期格式验证 yyyy-mm-dd 
    "date": function(val) {
        var reg = /^[1-2][0-9][0-9][0-9]-[0-1]{0,1}[0-9]-[0-3]{0,1}[0-9]$/;
        if (!reg.test(val)) {
            return false;
        }
        return true;
    },
    // [整数]-数值的大小是否介于指定的 min 和 max 之间    
    "integerBetween": function(min, max, val) {
        var reg = /^\d+$/;
        var num = parseInt(val);
        if (!reg.test(num)) {
            return false;
        } else {
            if (num >= min && num <= max) {
                return true;
            } else {
                return false;
            }
        }
    },
    // [允许包含小数]-数值的大小是否介于指定的 min 和 max 之间    
    "floatBetween": function(min, max, val) {
        var reg = /^\d+$/;
        var num = parseFloat(val);
        if (!reg.test(num)) {
            return false;
        } else {
            if (num >= min && num <= max) {
                return true;
            } else {
                return false;
            }
        }
    },
    // [整数或者小数|位数不限制] 仅为数字 
    "digit": function(val) {
        var reg = /^\d+(\.\d*)?$/;
        if (!reg.test(val)) {
            return false;
        }
        return true;
    },
    // e-mail 格式
    "email": function(val) {
        var reg = /^[1-9]\d{5}(?!\d)$/;
        if (!reg.test(val)) {
            return false;
        }
        return true;
    },
    // ip地址 
    "ip": function(val) {
        var reg = /^(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$/;
        if (!reg.test(val)) {
            return false;
        }
        return true;
    },
    // mac地址
    "ip": function(val) {
        var reg = /[A-F\d]{2}:[A-F\d]{2}:[A-F\d]{2}:[A-F\d]{2}:[A-F\d]{2}:[A-F\d]{2}/;
        if (!reg.test(val)) {
            return false;
        }
        return true;
    },
    // [整形] 最大最小值
    "min": function(min, val) {
        var reg = /^\d+$/;
        var num = parseInt(val);
        if (num >= min) {
            return true;
        }
        return false;
    },
    "mac": function(max, val) {
        var reg = /^\d+$/;
        var num = parseInt(val);
        if (num <= max) {
            return true;
        }
        return false;
    },
    // 必填字段
    "required": function(val) {
        if (!val) {
            return false;
        }
        return true;
    },
    // 身份证号的验证
    "isId": function(val) {
        var reg18 = /^[1-9]\d{5}(18|19|([23]\d))\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$/;
        var reg15 = /^[1-9]\d{5}\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{2}$/;
        if (!reg18.test(val) || !reg18.test(val)){
            return false;
        }
        if ( val.length !== 15 ) {
            var num = (val.slice(0, 1)*7) + (val.slice(1, 2)*9) + (val.slice(2, 3)*10) + (val.slice(3, 4)*5) + (val.slice(4, 5)*8) + (val.slice(5, 6)*4) + (val.slice(6, 7)*2) + (val.slice(7, 8)*1) + (val.slice(8, 9)*6) + (val.slice(9, 10)*3) + (val.slice(10, 11)*7) + (val.slice(11, 12)*9) + (val.slice(12, 13)*10) + (val.slice(13, 14)*5) + (val.slice(14, 15)*8) + (val.slice(15, 16)*4) + (val.slice(16, 17)*2);
            num = num%11;
            switch (num) {
                case 0:
                    x="1";
                    if ( val.slice(17, 18) == x) {
                        return true;
                    }
                    break;
                case 1:
                    x="0";
                    if ( val.slice(17, 18) == x) {
                        return true;
                    }
                    break;
                case 2:
                    x="X";
                    if ( val.slice(17, 18) == x) {
                        return true;
                    }
                    break;
                case 3:
                    x="9";
                    if ( val.slice(17, 18) == x) {
                        return true;
                    }
                    break;
                case 4:
                    x="8";
                    if ( val.slice(17, 18) == x) {
                        return true;
                    }
                    break;
                case 5:
                    x="7";
                    if ( val.slice(17, 18) == x) {
                        return true;
                    }
                    break;
                case 6:
                    x="6";
                    if ( val.slice(17, 18) == x) {
                        return true;
                    }
                    break;
                case 7:
                    x="5";
                    if ( val.slice(17, 18) == x) {
                        return true;
                    }
                    break;
                case 8:
                    x="4";
                    if ( val.slice(17, 18) == x) {
                        return true;
                    }
                    break;
                case 9:
                    x="3";
                    if ( val.slice(17, 18) == x) {
                        return true;
                    }
                    break;
                case 10:
                    x="2";
                    if ( val.slice(17, 18) == x) {
                        return true;
                    }
                    break;
            }
            return false;
        }
        return true;
    },
    // 手机号的验证
    "isMobile": function(val) {
        // !!!! 网络虚拟号码  19 16开头
        var reg = /^(0|86|17951)?(13[0-9]|14[0-9]|17[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;
        if (!reg.test(val)) {
            return false;
        }
        return true;
    },
}
