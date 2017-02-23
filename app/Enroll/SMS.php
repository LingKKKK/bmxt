<?php

namespace App\Enroll;

use Illuminate\Database\Eloquent\Model;
use Session;
use Cache;

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

    public function sendVerifycode($mobile, $code)
    {
        $template = '100006';
        $param = [
            'uid' => $this->uid, 
            'pwd' => $this->pwd,
            'template' => $template,
            'mobile' => $mobile,
            'content' => json_encode(['code' => $code], JSON_UNESCAPED_UNICODE),
            // 'content' => urlencode(json_encode(['code' => $code], JSON_UNESCAPED_UNICODE)),

        ];

        $url = $this->host.'&'.http_build_query($param);
        $result = file_get_contents($url);
        return $result;
    }
}
