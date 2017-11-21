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
use Excel;
use Auth;


class MatchbjController extends Controller
{
    //队伍码
    protected $team_no = '';

    public function initEvents(\App\Enroll\CompetitionService $service)
    {
        // 初始化报名数据
        $service->initEvents();
    }

    public function search()
    {
        return view('searchbj');
    }

    public function doSearch(Request $request, \App\Enroll\CompetitionService $service)
    {
        $validator = Validator::make($request->all(),
            [
                'team_no'   => 'required',
                'contact_mobile' => 'required',
                'verificationcode' => 'required|verificationcode',
            ],
            [
                'team_no.required'  => '队伍编号不能为空',
                'contact_mobile.required' => '联系人手机号不能为空',
                'verificationcode.required' => '验证码不能为空',
                'verificationcode.verificationcode' => '验证码不正确',
            ]);

        if ($validator->fails()) {
           // return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $team_no = $request->input('team_no', '');
        $contact_mobile = $request->input('contact_mobile', '');
        $verificationcode = $request->input('verificationcode', '');

        $teamData = $service->searchTeam($team_no, $contact_mobile);
        // dd($teamData);
        if ($teamData === null) {
            return redirect()->back()->withErrors(collect(['notfound' => '数据不存在']))->withInput();
        }

        return redirect('/')->with('teamData', $teamData);
    }

    public function information(Request $request, \App\Enroll\CompetitionService $service)
    {
        if (! Auth::check()) {
            return redirect('/login');
        }

        $teamList = $service->getTeamList(Auth::user()->id);
        return view('/information', compact('teamList'));
    }

    public function signup(\App\Enroll\CompetitionService $service,  Request $request)
    {

        if (! Auth::check()) {
            return redirect('/login');
            // return view('successTips', ['status' => '需要登录', 'link' => '/login']);
        }

        $user = Auth::user();
        $teamModel = CompetitionTeam::where('enroll_user_id', $user->id)->first();

        $teamData = null;
        if ($teamModel !== null) {
            $team_no = $teamModel->team_no;
            $teamData = $service->getTeamData($team_no);
        } else {
            $team_no = $this->getTeamNo();
        }

        $is_update = !empty($teamData);

        $competitionList = $service->getCompetitionList();
        $competitonsJson = json_encode($competitionList, JSON_UNESCAPED_UNICODE);

        return view('matchbj', compact('competitonsJson', 'team_no', 'teamData', 'is_update'));
    }

    public function doSignup(Request $request)
    {
        if (! Auth::check()) {
            return view('successTips', ['status' => '请登录后填写', 'link' => '/login']);
        }



        $user = Auth::user();
        $is_update = $request->has('id') && !empty($request->input('id'));
        $validator = Validator::make($request->all(),
            [
                'team_no'    => 'required',
            ],
            [
                'team_no.required'  => '队伍编号不能不能为空',
                'verificationcode.required' => '验证码不能为空',
                'verificationcode.verificationcode' => '验证码不正确',
            ]
        );


        if ($validator->fails()) {
            return redirect()->back()->withInput();
        }

        $team_fields = [
            'user_id',
            'id',
            'contact_name', 'contact_mobile', 'contact_email', 'contact_remark',
            'team_no', 'team_name', 'competition_event_id', 'remark',
            'invoice_title', 'invoice_code', 'invoice_money', 'invoice_type', 'invoice_detail', 'invoice_mail_address', 'invoice_mail_recipients',
            'invoice_mail_mobile', 'invoice_mail_email', 'invoice_remark', 'invoice_detail',
        ];

        $team_data = $request->only($team_fields);
        $team_data['enroll_user_id'] = $user->id;

        $this->team_no = $team_data['team_no'];

        $competitionTeamModel = new CompetitionTeam();
        if ($is_update) {
            $competitionTeamModel = CompetitionTeam::find($team_data['id']);
        }

        $competitionTeamModel->fill(array_except($team_data, ['id']))->save();

        // 处理队员
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
            //基本信息
            'name', 'mobile', 'email', 'idcard_type', 'idcard_no', 'nation', 'sex', 'birthday', 'age', 'height',
            //其他资料
            'vocation', 'work_unit','register_address', 'home_address','remark', 'profiles',
            //新增内容
            'headmaster', 'school', 'class', 'guarder', 'relation',
        ];


        $allmembers = array_merge($leaders, $members);

        // 删除成员
        $ids = collect($allmembers)->pluck('id');
        $old_ids = $competitionTeamModel->members->pluck('id');
        $deleteIds = array_diff($old_ids->toArray(), $ids->toArray());
        // dd($ids, $old_ids, $deleteIds);
        CompetitionTeamMember::destroy($deleteIds);

        foreach ($allmembers as $k => $val) {
            if (isset($val['id']) && !empty($val)) {
                $memberModel = CompetitionTeamMember::find($val['id']);
            }

            if ($memberModel == null) {
                $memberModel = new CompetitionTeamMember();
            }

            $val = array_only($val, $member_fields);
            $memberModel->fill(array_except($val, ['id']))->save();
        }

        return redirect('finish')->with('team_no',$competitionTeamModel->team_no)->with('contact_mobile', $competitionTeamModel->contact_mobile);
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

    public function finish($team_no, \App\Enroll\CompetitionService $service){
        if (! Auth::check()) {
            return view('successTips', ['status' => '需要登录', 'link' => '/login']);
        }

        $user = Auth::user();

        $teamData = $service->getTeamData($team_no);

        if ($teamData === null || $teamData['enroll_user_id'] !== $user->id) {
            return view('successTips', ['status' => '队伍不存在', 'link' => '/']);
        }

        // dd($teamData);
        return view('finish', compact('teamData'));
    }

    public function success(Request $request){

        // dd('信息展示页面');
        return view('success');
    }

    /**
     * 跳转页面
     * @return [type] [description]
     */
    public function jumpPage()
    {
        return view('/successTips');
    }

    public function export(\App\Enroll\CompetitionService $service)
    {
        return view('enroll.excel');
    }

    public function doExportExcel(Request $request, \App\Enroll\CompetitionService $service)
    {
        $validator = Validator::make($request->all(),[
                'admincode' => 'required',
                'mobile'    => 'required',
                'verificationcode' => 'required|verificationcode',
            ],[
                'mobile.required' => '手机号不能为空',
                'admincode.required'  => '查询码不能为空',
                'verificationcode.required' => '验证码不能为空',
                'verificationcode.verificationcode' => '验证码不正确',
            ]);

        if ($validator->fails()) {
           return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        if ($request->input('admincode') != 'a3b5c4') {
           return redirect()->back()->withErrors(['查询码不正确'])->withInput();
        }

        $adminArr = [
            '18511431517',
            '15903035872',
            '13476000614', //江城
            '15900000000',
        ];

        if (! in_array($request->input('mobile'), $adminArr)) {
            return redirect()->back()->withErrors(['您无权下载此数据'])->withInput();
        }

        $filename = 'RoboCom国际公开赛-' . date('Y_m_d_H_i_s');
        return $service->makeExcel($filename);
    }


}
