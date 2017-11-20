<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $this->validate($request,
            [
                'email'   => 'required_without:mobile|email|min:1|max:200|exists:users,email',
                'mobile' => 'required_without:email|mobile|exists:users,mobile',
                'password' => 'required',
            ],
            [
                'email.required_without' => '请输入邮箱或手机号',
                'mobile.required_without' => '请输入邮箱或手机号',
                'password.required' => '用户密码有误',
            ]);

        if ($request->has('email')) {
            $user = User::where('email', $request->input('email'))->first();
        } else {
        $user = User::where('mobile', $request->input('mobile'))->first();
        }

        Auth::login($user);


        $status = '登录';
        $link = '/finish';
        return view('/finish', compact('status', 'link'));

        // return redirect('/');
    }

    public function register(Request $request)
    {
        return view('register');
    }

    public function doRegister(Request $request)
    {
        $this->validate($request,
            [
                // 'name' => 'required|string|min:1|max:200',
                'email'   => 'required|email|min:0|max:800|unique:users,email',
                'mobile' => 'required|mobile|unique:users,mobile',
                'password' => 'required',
                // 'verificationcode' => 'required|verificationcode',
            ],
            [
                'email.required' => '用户邮箱不能为空',
                'mobile.required' => '用户手机号不能为空',
                'password.required' => '密码不能为空',
                'verificationcode.required' => '验证码不能为空',
                'verificationcode.verificationcode' => '验证码不正确',
            ]);


        $data = $request->only('email', 'mobile', 'name', 'password');

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => bcrypt($data['password'])
        ]);

        $status = '注册';
        $link = '/login';
        return view('/successTips', compact('status', 'link'));
        // return view('/registerSuccess');
    }

    public function successTips()
    {
        return view('/successTips');
    }
    public function logout()
    {
        Auth::logout();
        return '退出成功';
    }
}
