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
        ];

        $competition_types = [
            '智慧日月潭' => '智慧日月潭',
            '部落战争' => '部落战争',
            '引领未来' => '引领未来',
            '星光璀璨' => '星光璀璨',
            '工业时代' => '工业时代'
        ];

        return view('signup', compact('competition_types', 'competition_groups'));
    }

    public function checkName(Request $request)
    {
        $team_name = $request->input('team_name');
        if (empty($team_name)) {
            return api_response(2, '队名不能为空');
        }

        $result = SignupData::where('team_name', $team_name)->first();

        if ($result !== null) {
            return api_response(1, '队伍名重复');
        }

        return api_response(0, '合法的队名');
        
    }




    public function success(Request $request)
    {
        $signdata = $request->session()->get('signdata');
        if ($signdata) {
            $signdata['members'] = json_decode($signdata['members'], true);
            return view('success', compact('signdata'));
        }
    }
    public function doSignup(Request $request)
    {
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
        // dd($this->saveFile($request->file('leader_pic'))['publicPath']);
        $leader_picdata = $this->saveFile($request->file('leader_pic'));
        $leader_pic = !empty($leader_picdata) && isset($leader_picdata['publicPath']) ? $leader_picdata['publicPath'] : '';
        $leader_pic_filename = !empty($leader_picdata) && isset($leader_picdata['filename']) ? $leader_picdata['filename'] : '';

        // 处理成员
        $members = array();
        $origin_members = isset($request->all()['members']) ? $request->all()['members'] : [];

        foreach ($origin_members as $k => $item) {
            $member_info = array_only($item, ['name', 'mobile', 'ID' ,'age', 'sex', 'school_name']);
            $pic = isset($item['pic']) ? $item['pic'] : null;

            $member_picdata = $this->saveFile($item['pic']);
            $member_info['pic'] = $member_picdata['publicPath'];
            $member_info['pic_filename'] = $member_picdata['filename'];
            $members[] = $member_info;
        }

        if ($validator->fails()) {
            // return api_response(1, 'Fail', $validator->errors()->toArray());
            return redirect()->back()->withInput()
                                     ->withErrors($validator->errors())
                                     ->with('leader_pic_preview', $leader_pic)
                                     ->with('leader_pic_filename', $leader_pic_filename)
                                     ->with('members_data', $members);
        }

        //表单地钻
        $keys = ['leader_name', 'leader_id', 'leader_sex', 'leader_mobile', 'leader_email', 
                 'team_name', 'school_name', 'school_address', 'competition_type', 'competition_group',
                'payment'
        ];

        $data = $request->only($keys);

        $data['leader_pic'] = $leader_pic;

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

        // return $publicPath;
        return compact('filename', 'publicPath');
         // ['filename' => $filename, 'publicPath' => $publicPath];
    }

    public function search()
    {
        return view('search');
    }

    public function doSearch(Request $request)
    {
        $leader_name = $request->input('leader_name', '');
        $leader_ID = $request->input('leader_ID', '');
        $leader_mobile = $request->input('leader_mobile', '');

        $inputData = $request->only(['leader_name', 'leader_ID', 'leader_mobile']);
        $inputData = array_filter($inputData);

        $validator = Validator::make($inputData, 
            [
                'leader_mobile' => 'required',
                'leader_ID' => 'sometimes|required',
                'leader_name' => 'required_without:leader_ID'
            ],
            [
                'leader_mobile.required' => '手机号不能为空',
                'leader_ID.required' => '身份证或者用户名至少一个1',
                'leader_name.required_without' => '身份证或者用户名至少填写一个',
            ]);
        // 处理事件的对象 处理事件的方式 处理事件错误时返回的结果


        if ($validator->fails()) {
           return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $singdata = SignupData::where('leader_mobile', $leader_mobile);
        if (empty($signdata)) {
            return redirect()->back()->withErrors(collect(['notfound' => '数据不存在']))->withInput();

        }
        // if (!empty($leader_ID)) {
        //     $singdata = $singdata->where('leader_ID', $leader_ID);
        // }
        // if (!empty($leader_name)) {
        //     $singdata = $singdata->where('leader_name', $leader_name);
        // }
        $signdata = SignupData::where('leader_mobile', $leader_mobile)->first();
        // $signdata['members'] = json_decode($signdata['members'], true);
        $request->session()->flash('signdata', $signdata);
        return redirect('success');
        // return $signdata;
    }

    public function lzsignup(Request $request)
    {
        //数据展示
        $signdata = $request->session()->get('signdata');
        // dd($signdata);
        return view('lzsignup');
    }

    public function submitForm(Request $request)
    {    
        // dd($_POST["name"]);
        $validator = Validator::make($request->all(), 
            [
                'leader_name' => 'required', //领队姓名
                'leader_mobile' => 'required',
                'team_name' => 'required',
                'school_name' => 'required',
                'department' => 'required', 
                'verificationcode' => 'required|verificationcode',
            ],
            [
                'team_name.required' => '队名必填',
                'school_name.required' => '学校名必填',
                'verificationcode.required' => '验证码不能为空',
                'verificationcode.verificationcode' => '验证码错误',
            ]
        );
        // 提交数据的信息 $request->all()
        dd($request->all(), $validator);
        // dd($validator);所有的数据
        // 处理成员
        $members = array();
        $origin_members = isset($request->all()['members']) ? $request->all()['members'] : [];

        foreach ($origin_members as $k => $item) {
            $member_info = array_only($item, ['name', 'mobile', 'ID' ,'age', 'sex', 'height', 'school_name']);
            $pic = isset($item['pic']) ? $item['pic'] : null;
            $member_picdata = $this->saveFile($item['pic']);
            $member_info['pic'] = $member_picdata['publicPath'];
            $member_info['pic_filename'] = $member_picdata['filename'];
            $members[] = $member_info;
        }

        if ($validator->fails()) {
            // return api_response(1, 'Fail', $validator->errors()->toArray());
            return redirect()->back()->withInput()
                                     ->withErrors($validator->errors());
        }

        //表单地钻
        $keys = ['leader_name', 'leader_id', 'leader_sex', 'leader_mobile', 'leader_email', 
                 'team_name', 'school_name', 'school_address', 'competition_type', 'competition_group',
                'payment'
        ];

        $data = $request->only($keys);

        $data['leader_pic'] = $leader_pic;

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
}
