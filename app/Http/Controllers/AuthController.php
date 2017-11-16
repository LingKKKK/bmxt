<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {

    }

    public function doLogin(Request $request)
    {

    }

    public function register(Request $request)
    {

    }

    public function doRegister(Request $request)
    {
        //
        User::create(
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => bcrypt($data['password'])
        );

        return api_response(0, '注册撑哦功能')
    }
}
