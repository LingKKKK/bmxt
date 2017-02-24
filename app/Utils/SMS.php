<?php

namespace App\Utils;

class SMS
{
    protected $host = '';
    protected $uid = '';
    protected $pwd = '';
    public function __construct()
    {
        $this->uid = config('sms.uid');
        $this->host = config('sms.host');
        $this->pwd = config('sms.pwd');
    }

    public function sendMessage($mobile, $template, $contentArr)
    {
        if (!is_mobile($mobile)) {
            return false;
        }

        $param = [
            'uid' => $this->uid, 
            'pwd' => $this->pwd,
            'template' => $template,
            'mobile' => $mobile,
            'content' => json_encode($contentArr, JSON_UNESCAPED_UNICODE),
        ];

        $url = $this->host.'&'.http_build_query($param);
        $result = file_get_contents($url);
        return $result;
    }

    public function sendVerifyCode($mobile, $code)
    {
        return $this->sendMessage($mobile, '100006', ['code' => $code]);
    }
}
