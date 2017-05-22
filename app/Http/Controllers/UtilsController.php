<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use Storage;
use App\Enroll\InviteManager;
use QrCode;
use Kenrobot\AliPay\AliPayDemo;

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

    public function uploadImg(Request $request)
    {
        // dd($request->all());

        $file = $request->file('file');
        if (empty($file)) {
            return api_response(1, 'Fail');
        }

        $filename = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();

        $suffix = rand(1000, 9999);
        $hashfilename = md5($filename.$suffix).'.'.$ext;
        $storePath = '/data/img/'.$hashfilename;
        $publicPath = '/data/img/'.$hashfilename;

        Storage::put($storePath, file_get_contents($file));
        return api_response(0, 'OK', ['imgUrl' => $publicPath]);
    }

    public function checkInviteCode(Request $request)
    {
        $invitecode = $request->input('invitecode', '');
        $codeModel = InviteManager::queryCode($invitecode);

        if ($codeModel === null || $codeModel->used_time !== null) {
            return api_response(1, '无效的邀请码');
        }

        return api_response(0, '邀请码有效');
    }

    public function qrcodeimg(Request $request)
    {
        $data = $request->input('data', '');
        $data = urldecode($data);
        $content =  QrCode::size(300)->generate($data);
        return response($content)->header('Content-Type', 'image/svg+xml');
    }


    // 获取支付二维码
    public function getPayQrcode(Request $request)
    {

        $invitecode = $request->input('invitecode', '');
        $codeModel = InviteManager::queryCode($invitecode);
        if ($codeModel === null || $codeModel->used_time !== null) {
            return api_response(1, '参数错误');
        }

        $alipay = new AliPayDemo();
        $out_trade_no = '20150302'.date('His').rand(100,999);
        $subject = '比赛缴费';
        $total_amount = '300.00'; // 单位元
        $payurl = $alipay->getPayUrl($out_trade_no, $total_amount, $subject);

        if (!$payurl || $payurl['code'] != 10000) {
            return api_response(1, '获取失败');
        }
        return api_response(0, '获取成功', ['qrcodeimgurl' => url('/qrcodeimg.svg?data=').urlencode($payurl['qr_code']), 'out_trade_no' => $out_trade_no]);
       }

    /**
     * 查询订单张台
     * @return [type] [description]
     */
    public function queryOrderStatus(Request $request)
    {
        $out_trade_no = $request->input('out_trade_no', '');
        if (empty($out_trade_no)) {
            return api_response(1, '等待支付');
        }

        $alipay = new AliPayDemo();
        $payResult =  $alipay->queryOrder($out_trade_no);
        // dd($payResult);

        if ($payResult['code'] == 10000 && $payResult['trade_status'] == "TRADE_SUCCESS") {
            return api_response(0, '支付成功');
        }

        return api_response(1, '等待支付');
    }


}
