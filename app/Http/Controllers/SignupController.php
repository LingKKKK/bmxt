<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Enroll\SignupData;
use Validator;
use Mail;
use Storage;

class SignupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function signup()
    {
        // $this->sendMail('2429175732@qq.com');
        return view('signup');
    }

    public function success()
    {
        return view('success');
    }
    public function doSignup(Request $request)
    {
        // dd($request->all(), $request->file());

        $validator = Validator::make($request->all(), 
            [
                'leader_name' => 'required', //领队姓名
                'leader_id' => 'required', //领队身份证号
                'leader_sex' => 'required', //领队性别
                'leader_pic' => 'required|image',
                'leader_email' => 'required|email',
                'leader_mobile' => 'required',

                'team_name' => 'required',
                'school_name' => 'required',
                'school_address' => 'required', 
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

        //表单地钻
        $keys = ['leader_name', 'leader_id', 'leader_sex', 'leader_mobile', 'leader_email', 
                'team_name', 'school_name', 'school_address', 'competiton_type', 'competiton_group',
                'payment'
        ];

        $data = $request->only($keys);

        $data['leader_pic'] = $this->saveFile($request->file('leader_pic'));

        // 处理成员
        $members = array();
        $origin_members = isset($request->all()['members']) ? $request->all()['members'] : [];

        foreach ($origin_members as $k => $item) {
            $member_info = array_only($item, ['name', 'mobile', 'age', 'sex', 'school_name']);
            $pic = isset($item['pic']) ? $item['pic'] : null;
            $member_info['pic'] = $this->saveFile($item['pic']);
            $members[] = $member_info;
        }

        $data['members'] = json_encode($members, JSON_UNESCAPED_UNICODE);

        $data['data'] = json_encode($data, JSON_UNESCAPED_UNICODE);
        $data['origin_data'] = json_encode($request->all(), JSON_UNESCAPED_UNICODE);

        // dd($data, $request->all());
        try {
            $ddt = SignupData::create($data);
        } catch (\Exception $e) {
            return api_response(1 ,'报名失败'.$e->getMessage());
        }
        // $this->sendMail('');
        return api_response(0, '报名成功', $ddt->toArray());
    }

    //发送邮件
    protected function sendMail($email)
    {
        if (!is_email($email)) {
            return false;
        }
        $result = Mail::send('emails.signsuccess', [], function($m) use($email) {
                        $m->from('support@kenrobot.com', '比赛注册');
                        $m->to($email)->subject('验证码');
        });

        return true;
    }

    public function saveFile($file)
    {
        if (!$file) {
            return '';
        }

        $filename = $file->getClientOriginalName();

        $ext = $file->getClientOriginalExtension();

        $suffix = rand(1000, 9999);

        $hashfilename = md5($filename.$suffix).'.'.$ext;
        $storePath = '/data/pic/'.$hashfilename;
        $publicPath = '/data/pic/'.$hashfilename;

        Storage::put($storePath, file_get_contents($file));

        return $publicPath;
        // return compact('filename', 'storePath', 'publicPath');
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
