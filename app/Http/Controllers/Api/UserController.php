<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseApiController;
use App\User;

class UserController extends BaseApiController
{
    public function login(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required_without:mobile|email|exists:users,email',
                'mobile' => 'sometimes|required|mobile|exists:users,mobile',
                'password' => 'required',
            ]);

        if ($request->has('email')) {
            $user = User::where('email', $request->input('email'))->first();
        } else {
            $user = User::where('mobile', $request->input('mobile'))->first();
        }

        $password = $request->input('password');
        if (! password_verify($password, $user->password)) {
            return api_response(1, '密码错误');
        }

        return api_response(0, '登录成功!', $this->filterUser($user));
    }

    public function userinfo(Request $request)
    {
        $this->validate($request,
            [
                'user_id' => 'required|integer|min:0|exists:users,id',
            ]);

        $user = User::find($request->input('user_id'));
        return api_response(0, 'success', $this->filterUser($user));
    }

    protected function filterUser(User $user)
    {
        $result = $user->toArray();
        return array_only($result, ['name', 'id']);
    }
}
