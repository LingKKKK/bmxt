<?php

namespace App\Enroll;

use Illuminate\Database\Eloquent\Model;
use Session;
use Cache;
use Carbon\Carbon;

class VerifyCode
{
    public function getCode()
    {
        $code = rand(100000, 999999);
        $key = uniqid('verify_code_');
        Session::put('verifycode.key', $key);
        Cache::put($key, $code, Carbon::now()->addMinutes(5));
        return $code;
    }

    public function verifyCode($code)
    {
        if (empty($code)) {
            return false;
        }

        $key = Session::get('verifycode.key');

        if (empty($key)) {
            return false;
        }

        $cache_code = Cache::get($key);

        if (empty($cache_code)) {
            return false;
        }

        if ($code != $cache_code) {
            return false;
        }

        return true;
    }
}
