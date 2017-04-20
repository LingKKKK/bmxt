<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Enroll\SignupData;
use Validator;
use Mail;
use Storage;
use Session;

class SignupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function signup(Request $request)
    {
        //数据展示
        $signdata = $request->session()->get('signdata');
        if ($signdata) {
            $signdata['members'] = json_decode($signdata['members'], true);
            return view('success', compact('signdata'));
        }

        $competition_groups = [
            '小学组' => '小学组',
            '中学组' => '中学组',
            '高中组' => '高中组',
            '大学组' => '大学组',
        ];

        $competition_types = [
            '选项一' => '选项一',
            '选项二' => '选项二',
            '选项三' => '选项三',
            '选项四' => '选项四'
        ];

        return view('signup', compact('competition_types', 'competition_groups'));
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
            // return api_response(1, 'Fail', $validator->errors()->toArray());
            return redirect()->back()->withInput();
        }

        //表单地钻
        $keys = ['leader_name', 'leader_id', 'leader_sex', 'leader_mobile', 'leader_email', 
                 'team_name', 'school_name', 'school_address', 'competition_type', 'competition_group',
                'payment'
        ];

        $data = $request->only($keys);

        $data['leader_pic'] = $this->saveFile($request->file('leader_pic'));

        // 处理成员
        $members = array();
        $origin_members = isset($request->all()['members']) ? $request->all()['members'] : [];

        foreach ($origin_members as $k => $item) {
            $member_info = array_only($item, ['name', 'mobile', 'ID' ,'age', 'sex', 'school_name']);
            $pic = isset($item['pic']) ? $item['pic'] : null;
            $member_info['pic'] = $this->saveFile($item['pic']);
            $members[] = $member_info;
        }

        $data['members'] = json_encode($members, JSON_UNESCAPED_UNICODE);
        $data['team_no'] = $this->getTeamNo();

        $request->session()->flash('signdata', $data);

        $data['data'] = json_encode($data, JSON_UNESCAPED_UNICODE);
        $data['origin_data'] = json_encode($request->all(), JSON_UNESCAPED_UNICODE);

        try {
            $ddt = SignupData::create($data);
        } catch (\Exception $e) {
            return redirect()->back()->withInput();
            return api_response(1 ,'报名失败'.$e->getMessage());
        }
        return redirect('/');
        // $this->sendMail('');
        return api_response(0, '报名成功', $ddt->toArray());
    }

    protected function getTeamNo()
    {
        //队伍码生成规则
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
}
