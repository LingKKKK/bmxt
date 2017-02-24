<?php

namespace App\Utils;

use Session;
use Cache;
use Carbon\Carbon;

/**
 * 验证码
 */
class VerificationCode
{

    protected $lifttime;

    public function __construct($lifttime_minute = 3)
    {
        $this->lifttime = $lifttime_minute;
    }

    public function create()
    {
        $code = rand(100000, 999999);
        $key = uniqid('verify_code_');
        Session::put('verifycode.key', $key);
        Cache::put($key, $code, Carbon::now()->addMinutes($this->lifttime));
        return $code;
    }
    
    public function check($code)
    {
        if (empty($code)) {
            return false;
        }

        $key = Session::get('verifycode.key');

        if (empty($key)) {
            return false;
        }

        $code_expected = Cache::get($key);

        if (empty($code_expected)) {
            return false;
        }

        if ($code != $code_expected) {
            return false;
        }

        return true;
    }
}
