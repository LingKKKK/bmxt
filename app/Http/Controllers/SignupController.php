<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Enroll\SignupData;
use Validator;
use Mail;
use Storage;
use Session;
use App\Enroll\InviteManager;

class SignupController extends Controller
{
    //
    protected $group_map = [

        '小学组' => 1,
        '中学组' => 2,
        '高中组' => 3,
    ];

    protected $type_map = [
        '智慧日月潭' => 1,
        '部落战争' => 2,
        '引领未来' => 3,
        '星光璀璨' => 4,
        '工业时代' => 5,
    ];

    //队伍码
    protected $team_no = '';

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
                'invitecode' => 'required', //邀请码信息
                'leader_name' => 'required', //领队姓名
                'leader_id' => 'required', //领队身份证号
                'leader_sex' => 'required', //领队性别
                'leader_pic' => 'required|image',
                'leader_email' => 'required|email',
                'leader_mobile' => 'required',
                'team_name' => 'required',
                'school_name' => 'required',
                'school_address' => 'required',
                // 'verificationcode' => 'required|verificationcode',
                'invitecode' => 'required|invitecode'
            ],
            [
                'invitecode.required' => '邀请码必填',
                'team_name.required' => '队名必填',
                'school_name.required' => '学校名必填',
                'verificationcode.required' => '验证码不能为空',
                'invitecode.required' => '邀请码不能为空',
                'invitecode.invitecode' => '邀请码不正确',
                // 'verificationcode.verificationcode' => '验证码错误',
            ]
        );

        //初始化队伍码
        $this->initTeamNo($request->input('competition_group'), $request->input('competition_type'));


        $leader_picdata = $this->saveFile($request->file('leader_pic'));
        $leader_pic = !empty($leader_picdata) && isset($leader_picdata['publicPath']) ? $leader_picdata['publicPath'] : '';
        $leader_pic_filename = !empty($leader_picdata) && isset($leader_picdata['filename']) ? $leader_picdata['filename'] : '';

        // 处理成员
        $members = array();
        $origin_members = isset($request->all()['members']) ? $request->all()['members'] : [];

        foreach ($origin_members as $k => $item) {
            $member_info = array_only($item, ['name', 'mobile', 'ID' ,'age', 'sex', 'school_name', 'height']);
            $pic = isset($item['pic']) ? $item['pic'] : null;

            $member_picdata = $this->saveFile($item['pic']);
            $member_info['pic'] = $member_picdata['publicPath'];
            $member_info['pic_filename'] = $member_picdata['filename'];
            $members[] = $member_info;
        }

        if ($validator->fails()) {
            return redirect()->back()->withInput()
                                     ->withErrors($validator->errors())
                                     ->with('leader_pic_preview', $leader_pic)
                                     ->with('leader_pic_filename', $leader_pic_filename)
                                     ->with('members_data', $members);
        }

        //表单地钻
        $keys = ['invitecode','out_trade_no' ,'leader_name', 'leader_id', 'leader_sex', 'leader_mobile', 'leader_email',
                 'team_name', 'school_name', 'school_address', 'competition_type', 'competition_group',
                'payment'
        ];

        $data = $request->only($keys);
        $data['leader_pic'] = $leader_pic;
        $data['members'] = json_encode($members, JSON_UNESCAPED_UNICODE);
        $data['team_no'] = $this->team_no;

        $request->session()->flash('signdata', $data);

        $data['data'] = json_encode($data, JSON_UNESCAPED_UNICODE);
        $data['origin_data'] = json_encode($request->all(), JSON_UNESCAPED_UNICODE);

        try {
            $ddt = SignupData::create($data);
            InviteManager::useCode($data['invitecode'], $ddt->id);
            // dd($ddt);
        } catch (\Exception $e) {
            // dd($e);
            return redirect()->back()->withInput();
        }
        // dd($ddt);

        return redirect('/');
    }

    protected function initTeamNo($competition_group, $competition_type)
    {
        $seg1 = '2017';

        $competition_group_id = $this->group_map[$competition_group];
        $competition_type_id = $this->type_map[$competition_type];

        $seg2 = str_pad($competition_group_id, 2, '0', STR_PAD_LEFT);
        $seg3 = str_pad($competition_type_id, 2, '0', STR_PAD_LEFT);

        $group_type_count = SignupData::where('competition_group', $competition_group)->where('competition_type', $competition_type)->count();
        $total_count = SignupData::count();

        $seg4 = str_pad($group_type_count + 1, 3, '0', STR_PAD_LEFT);
        $seg5 = str_pad($total_count + 1, 4, '0', STR_PAD_LEFT);
        // 年份前缀-组别-比赛类型-报名总序号-比赛序号
        $this->team_no = $seg1.$seg2.$seg3.$seg5.$seg4;
        return $this->team_no;
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

    /**
     * 保存文件
     * @param  [type] $file [description]
     * @return [type]       [description]
     */
    public function saveFile($file)
    {
        if (!$file) {
            return '';
        }

        $filename = $file->getClientOriginalName();

        $ext = $file->getClientOriginalExtension();

        $suffix = rand(1000, 9999);

        $hashfilename = md5($filename.$suffix).'.'.$ext;
        $storePath = '/data/pic/'.$this->team_no.'/'.$hashfilename;
        $publicPath = '/data/pic/'.$this->team_no.'/'.$hashfilename;

        Storage::put($storePath, file_get_contents($file));

        return compact('filename', 'publicPath');
    }

    /**
     * 搜索
     * @return [type] [description]
     */
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

        $signdata = SignupData::where('leader_mobile', $leader_mobile)->first();
        $request->session()->flash('signdata', $signdata);
        return redirect('success');
    }
}
