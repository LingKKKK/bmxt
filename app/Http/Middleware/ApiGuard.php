<?php

namespace App\Http\Middleware;

use Closure;

class ApiGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $appId = $request->header('X-Kenrobot-appid', '');
        $nonceStr = $request->header('X-Kenrobot-noncestr', '');
        $timestamp = $request->header('X-Kenrobot-timestamp', '');
        $sign = $request->header('X-Kenrobot-sign', '');

        $appSecret = 'kenrobot';
        $expected_sign = $this->makeSign($appId, $appSecret, $nonceStr, $timestamp);
        if (! $sign || $sign !== $expected_sign) {
            return api_response(101, '签名错误', [$expected_sign]);
        }

        return $next($request);
    }

    public function makeSign($appId, $appSecret, $nonceStr, $timestamp)
    {
        $params = [
            'appid' => $appId,
            'appsecret' => $appSecret,
            'noncestr' => $nonceStr,
            'timestamp' => $timestamp
        ];

        ksort($params);

        return md5(join('&', $params));
    }
}
