<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Enroll\SignupData;
use Validator;

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

    public function doSignup(Request $request)
    {

        $default_data = [
            'team_name' => '',
            'school_name' => '',
            'competition_type' => '',
            'leader_name' => '',
            'leader_mobile' => '',
            'leader_email' => '',
            'captain_name' => '',
            'captain_mobile' => '',
            'captain_email' => '',
            'members' => '{}',
            'remark' => '',
            'origin_data' => json_encode($request->all(), JSON_UNESCAPED_UNICODE)
        ];

        $validator = Validator::make($request->all(), 
            [
                'team_name' => 'required',
                'school_name' => 'required',
                'verificationcode' => 'required|verificationcode',
            ],
            [
                'team_name.required' => '队名必填',
                'school_name.required' => '学校名必填',
                'verificationcode.required' => '验证码不能为空',
                'verificationcode.verificationcode' => '验证码错误',
            ]
        );

        if ($validator->fails()) {
            return api_response(1, 'Fail', $validator->errors()->toArray());
        }

        $keys = ['team_name', 'school_name', 'competition_type', 
                'leader_name', 'leader_mobile', 'leader_email',
                'captain_name', 'captain_mobile', 'captain_email',
                'members',
                'remark', 'origin_data'];

        $data = $request->only($keys);
        $data = array_merge($default_data, array_filter($data));
        try {
            $ddt = SignupData::create($data);
        } catch (\Exception $e) {
            return api_response('报名失败');
        }
        
        return api_response(0, '报名成功', $ddt->toArray());
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
