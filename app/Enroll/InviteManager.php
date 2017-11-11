<?php

namespace App\Enroll;

use Carbon\Carbon;
use App\Enroll\Models\InviteCode;
use DB;
use InvalidArgumentException;

/*
 * 邀请码管理
 */
class InviteManager
{
    public static function allCode()
    {
        return InviteCode::all();
    }

    public static function usedCode()
    {
        return InviteCode::whereNotNull('used_time')->get();
    }

    public static function usedCodeCount()
    {
        return InviteCode::whereNotNull('user_time')->count();
    }

    public static function remainCode()
    {
        return InviteCode::whereNull('used_time')->count();
    }

    public static function remainCodeCount()
    {
        return InviteCode::whereNull('used_time')->count();
    }

    public static function queryCode($code)
    {
        return InviteCode::where('code', $code)->first();
    }

    public static function useCode($code, $enroll_id)
    {
        $codeModel = InviteCode::where('code', $code)->first();
        if ($codeModel === null) {
            throw new InvalidArgumentException("无效的邀请码");
        }

        if ($codeModel->user_time !== null) {
            throw new \Exception('该邀请码已经被使用');
        }

        $codeModel->enroll_id = $enroll_id;
        $codeModel->used_time = Carbon::now();
        $codeModel->save();
        return true;
    }

    /**
     * 检验邀请码是否可用
     */
    public static function checkCode($code)
    {
        $codeModel = InviteCode::where('code', $code)->first();
        if ($codeModel === null) {
            return false;
        }

        if ($codeModel->used_time !== null) {
            return false;
        }

        return true;
    }

    public static function InitCode($prefix = 'enroll_data')
    {
        for ($i=0; $i < 32; $i++) {
            $arrValues = [];
            for ($j=0; $j < 128; $j++) {
                $seed = $prefix.'_'. $i . '_'. $j;
                $arrValues[] = [
                    'code' => substr(md5($seed), 0, 16),
                    'remark' => $seed
                ];
            }
            DB::table('invite_codes')->insert($arrValues);
        }
    }

}
