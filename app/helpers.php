<?php

/**
 * 自定义帮助函数
 * App Helper 项目专有部分
 * Common Helper 通用代码
 */

/********************* App Helper *********************/

if (! function_exists('api_response')) {
    function api_response($status, $message, $data = null, $httpcode = 200)
    {
        if ($data === null) {
            return response()->json(compact('status', 'message'));
        } else {
            return response()->json(compact('status', 'message', 'data'));
        }
    }
}

//发送信息
if (! function_exists('sms_send_verifycode')) {
    function sms_send_verifycode($mobile, $code)
    {
        return app('\App\Utils\SMS')->sendVerifyCode($mobile, $code);
    }
}

// 短信/邮件验证码
if (! function_exists('verificationcode_create')) {
    function verificationcode_create()
    {
        return app('\App\Utils\VerificationCode')->create();
    }
}

// 短信/邮件验证码
if (! function_exists('verificationcode_check')) {
    function verificationcode_check($code)
    {
        return app('\App\Utils\VerificationCode')->check($code);
    }
}

// 邀请码验证机制
if (! function_exists('invitecode_check')) {
    function invitecode_check($code)
    {
        return \App\Enroll\InviteManager::checkCode($code);
    }
}



/****************** Common Helper *********************/

if (! function_exists('is_mobile')) {
    /**
     * 移动：134、135、136、137、138、139、150、151、152、157、158、159、182、183、184、187、188、178(4G)、147(上网卡)；
     * 联通：130、131、132、155、156、185、186、176(4G)、145(上网卡)；
     * 电信：133、153、180、181、189 、177(4G)；
     * 卫星通信：1349
     * 虚拟运营商：170
     */
    function is_mobile($mobile)
    {
        if (! is_numeric($mobile)) {
            return false;
        }
        $regexMobile = '/^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17\d{9}$|^18[\d]{9}$/';
        return preg_match($regexMobile, $mobile) ? true : false;
    }
}

if (! function_exists('is_email')) {
    function is_email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) ? true : false;
    }
}
