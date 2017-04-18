<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class UtilsController extends Controller
{
    /**
     * 图片验证码
     */
    public function captcha($config)
    {
        return captcha($config);
    }

    /**
     * 检查图片验证码
     */
    public function checkCaptcha(Request $request)
    {
        $captcha = $request->input('captcha', '');

        $ret = captcha_check($captcha);
        if ($ret) {
            return api_response(0, '验证成功');
        } else {
            return api_response(-1, '验证失败');
        }
    }

    /**
     * 发送,短信/邮件验证码
     */
    public function verificationcode(Request $request)
    {
        $type = $request->input('type', '');

        if ($type != 'mobile' && $type != 'email') {
            return api_response(-1, '参数不正确!');
        }

        $captcha = $request->input('captcha');
        $ret = captcha_check($captcha);
        if (! $ret) {
            return api_response(-2, '参数不正确!');
        }

        if ($type == 'mobile') {
            $mobile = $request->input('mobile', '');
            if (! is_mobile($mobile)) {
                return api_response(-1, '参数不正确!');
            }

            $vcode = verificationcode_create();
            //发送短信
            sms_send_verifycode($mobile, $vcode);
            return api_response(0, '短信发送成功!'.$vcode);
        }

        if ($type == 'email') {
            $email = $request->input('email', '');
            if (! is_email($email)) {
                return api_response(-1, '参数不正确!');
            }

            $vcode = verificationcode_create();
            //发送邮件
            $result = Mail::send('emails.verificationcode', ['code' => $vcode], function($m) use($email) {
                        $m->from('support@kenrobot.com', '啃萝卜验证码');
                        $m->to($email, '')->subject('验证码');
            });
            return api_response(0, '邮件发送成功!');
        }

        return api_response(-3, '参数不正确!');
    }

    /**
     * 校验短信验证码
     */
    public function checkVerificationcode(Request $request)
    {
        $verificationcode = $request->input('verificationcode', '');
        $ret = verificationcode_check($verificationcode);
        if ($ret) {
            return api_response(0, '验证成功');
        } else {
            return api_response(-1, '验证失败');
        }
    }
}
