<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'email'   => 'required_without:mobile',
                'mobile' => 'required_without:email',
                'password' => 'required',
            ],
            [
                'email.required' => '用户邮箱有误',
                'mobile.required' => '用户手机号有误',
                'password.required' => '用户密码有误',
            ]);

        if ($validator->fails()) {
           return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // dd('等待登录之后操作');

        return view('login');
    }

    public function register(Request $request)
    {
        return view('register');
    }

    public function doRegister(Request $request)
    {
        // User::create(
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'mobile' => $data['mobile'],
        //     'password' => bcrypt($data['password'])
        // );

        // return api_response(0, '注册撑哦功能')

        $validator = Validator::make($request->all(),
            [
                'email'   => 'required',
                'mobile' => 'required',
                'verificationcode' => 'required|verificationcode',
            ],
            [
                'email.required' => '用户邮箱不能为空',
                'mobile.required' => '用户手机号不能为空',
                'verificationcode.required' => '验证码不能为空',
                'verificationcode.verificationcode' => '验证码不正确',
            ]);

        if ($validator->fails()) {
           return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // dd('等待注册的操作');

        return view('register');
    }
}
