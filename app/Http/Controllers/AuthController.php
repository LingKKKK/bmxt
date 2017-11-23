<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Curl\Curl;

class AuthController extends Controller
{
    public function master(Request $request)
    {
        # 创建模板页
        return view('layouts/master');
    }

    public function login(Request $request)
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        dd($request->all());
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

        // return redirect('/');

        $status = '登录成功,正在为您跳转';
        $link = '/';
        return view('/successTips', compact('status', 'link'));
    }

    public function register(Request $request)
    {
        return view('register');
    }

    public function doRegister(Request $request, Curl $curl)
    {
        $this->validate($request,
            [
                'username' => 'required|string|min:1|max:200',
                'email'   => 'required|email|min:0|max:800|unique:users,email',
                'mobile' => 'required|mobile|unique:users,mobile',
                'password' => 'required',
                'verificationcode' => 'required|verificationcode',
            ],
            [
                'email.required' => '用户邮箱不能为空',
                'mobile.required' => '用户手机号不能为空',
                'password.required' => '密码不能为空',
                'verificationcode.required' => '验证码不能为空',
                'verificationcode.verificationcode' => '验证码不正确',
            ]);

        $data = $request->only('email', 'mobile', 'username', 'password');

        $result = $curl->post('http://server.kenrobot.com/register', $data);
        if (! $result) {
            return back()->withInput()->withErrors('请求错误！！');
        }

        $result = (array) $result;
        if ($result['status'] != 0) {
            return back()->withInput()->withErrors([$result['message']]);
        }

        $this->createUser($data);

        $status = '注册成功,请登录';
        $link = '/login';
        return view('/successTips', compact('status', 'link'));
    }

    public function createUser($userData)
    {
        $data = [
            'name' => $userData['username'],
            'email' => $userData['email'],
            'mobile' => $userData['mobile'],
            'password' => bcrypt($userData['password'])
        ];

        $user = User::firstOrCreate([
            'email' => $data['email'],
            'mobile' => $data['mobile'],
        ]);

        return $user->fill($data)->save();

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
