<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Enroll\Models\CompetitionEvent;

use App\Enroll\Models\CompetitionTeamMember;
use App\Enroll\Models\CompetitionTeam;
use App\Enroll\InviteManager;
use Validator;
use Storage;
use Session;


class MatchbjController extends Controller
{
    //队伍码
    protected $team_no = '';

    public function test(\App\Enroll\CompetitionService $service)
    {
        $service->initEvents();
    }

    public function search()
    {
        return view('searchbj');
    }

    public function doSearch(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'leader_mobile' => 'required',
                'team_no'   => 'required',
                'verificationcode' => 'required|verificationcode',
            ],
            [
                'leader_mobile.required' => '手机号不能为空',
                'leader_id.required' => '身份证或者领队姓名名填写至少一个',
                'leader_name.required_without' => '身份证或者领队姓名名至少填写一个',
                'team_no.required'  => '队伍编号不能为空',
                'verificationcode.required' => '验证码不能为空',
                'verificationcode.verificationcode' => '验证码不正确',
            ]);
        // 处理事件的对象 处理事件的方式 处理事件错误时返回的结果

        if ($validator->fails()) {
           // return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $team_no = $request->input('team_no', '');
        $signdata = SignupData::where('team_no', $team_no)->first();
        if ($signdata === null) {
            return redirect()->back()->withErrors(collect(['notfound' => '数据不存在']))->withInput();
        }

        if ($signdata['leader_mobile'] != $request->input('leader_mobile')) {
            return redirect()->back()->withErrors(collect(['notfound' => '请填写正确的领队手机号']))->withInput();
        }

        // $request->session()->flash('signdata', $signdata->toArray());

        // $request->session()->put('signdata', $signdata->toArray());
        return redirect('success');
    }

    public function signup(Request $request, \App\Enroll\CompetitionService $service)
    {
        $competitionList = $service->getCompetitionList();
        $competitonsJson = json_encode($competitionList, JSON_UNESCAPED_UNICODE);
        $team_no = $this->getTeamNo();


        return view('matchbj', compact('competitonsJson', 'team_no'));
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
                'invitecode.required' => '邀请码不能为空',
                'invitecode.invitecode' => '邀请码不正确',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
            ->withInput();
        }

        $team_fields = [
            'id', 'invitecode',
            'contact_name', 'contact_mobile', 'contact_email', 'contact_remark',
            'team_no', 'team_name', 'competition_event_id',
            'invoice_title', 'invoice_code', 'invoice_money', 'invoice_type', 'invoice_mail_address', 'invoice_mail_recipients',
            'invoice_mail_mobile', 'invoice_mail_email', 'invoice_remark'
        ];

        $team_data = $request->only($team_fields);

        if (!$team_data['team_no']) {
            $team_data['team_no'] = $this->getTeamNo();
        }

        $competitionTeamModel = new CompetitionTeam();

        if (isset($team_data['id']) && !empty($team_data['id'])) {
            $competitionTeamModel = CompetitionTeam::find($team_data['id']);
            $this->team_no = $competitionTeamModel->team_no; // 更新队伍编号
        }

        $competitionTeamModel->fill($team_data)->save();

        $leaders = (array)$request->all()['leader'];
        $members = (array)$request->all()['member'];

        foreach ($leaders as $k => $val) {
            $leaders[$k]['team_id'] = $competitionTeamModel->id;
            $leaders[$k]['type'] = 'leader';
        }

        foreach ($members as $k => $val) {
            $members[$k]['team_id'] = $competitionTeamModel->id;
            $members[$k]['type'] = 'member';
        }

        $member_fields = [
            'id', 'team_id', 'type',
                // 基本信息
            'name', 'mobile', 'name', 'email', 'idcard_type', 'idcard_no', 'nation', 'sex', 'birthday', 'age', 'height', 'photo_url',
                // 其他资料
            'vocation', 'work_unit', 'register_address', 'home_address', 'remark'
        ];

        foreach (array_merge($leaders, $members) as $k => $val) {
            $memberModel = new CompetitionTeamMember();
            if (isset($val['id']) && !empty($val)) {
                $memberModel = CompetitionTeamMember::find('id');
            }

            $photo_url = $this->saveFile($val['pic']);
            if ($photo_url) {
                $val['photo_url'] = $this->saveFile($val['pic']);
            }

            $val = array_only($val, $member_fields);
            $memberModel->fill($val)->save();
        }

        // 无效邀请码 异常
        InviteManager::useCode($team_data['invitecode'], $competitionTeamModel->id);
        return redirect('finish');
    }

    private function getTeamNo()
    {
        if ($this->team_no) {
            return $this->team_no;
        }

        $teamCount = CompetitionTeam::count();

        $seg1 = '2017';

        $seg2 = date('mdHis');
        $seg3 = 1687 + $teamCount;

        // 年份前缀-月日时分-报名次序
        $this->team_no = $seg1.$seg2.$seg3;
        return $this->team_no;
    }
    private function saveFile($file)
    {
        if (!$file) {
            return '';
        }

        $filename = $file->getClientOriginalName();

        $ext = $file->getClientOriginalExtension();

        $suffix = rand(1000, 9999);

        $hashfilename = md5($filename.$suffix).'.'.$ext;
        $storePath = '/data/pic_beijing/'.$this->getTeamNo().'/'.$hashfilename;
        $publicPath = '/data/pic_beijing/'.$this->getTeamNo().'/'.$hashfilename;
        Storage::put($storePath, file_get_contents($file));

        return $publicPath;
    }

    public function checkName(Request $request)
    {
        $team_name = $request->input('team_name', '');
        if (empty($team_name)) {
            return api_response(2, '队名不能为空');
        }
        $result = CompetitionTeam::where('team_name', $team_name)->first();
        if ($result !== null) {
            return api_response(1, '队伍名重复');
        }
        return api_response(0, '合法的队名');

    }


    public function finish(){
        return view('finish');
    }
}
