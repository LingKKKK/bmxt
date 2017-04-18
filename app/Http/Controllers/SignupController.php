<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SignupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function signup()
    {
        return view('signup');
    }

    public function lists()
    {

        $testData = [
                "leader" =>   [
                    "title" =>  "领队信息",
                    "user_name" =>  "fdagtshhdesf",
                    "name" =>  "啊啊",
                    "sex" =>  "男",
                    "mail" =>  "23254235@qq.com",
                    "tel" =>  "15090000000",
                ],
                "team" =>  [
                    "title" =>  "队伍信息",
                    "name" =>  "蓝色风暴队",
                    "school" =>  "东北电力大学",
                    "address" =>  "吉林省 吉林省 xx区 xxxxxxxxxxxxxxx",
                    "type_item" =>  "引领未来",
                    "type" =>  "大学组",
                ],
                "payment" =>  [
                    "type" =>  "现场支付",
                ],
                "team_num" =>  [
                        "name" =>  "啊啊啊",
                        "tel" =>  "15090000000",
                        "sex" =>  "男",
                        "age" =>  "24",
                        "school" =>  "东北电力大学",
                        "address" =>  "吉林省 吉林省 xx区 xxxxxxxxxxxxxxx",
                ]
        ];

        return api_response(0, 'OK', $testData);
    }
}
