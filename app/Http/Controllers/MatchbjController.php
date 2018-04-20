<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Enroll\Models\CompetitionEvent;

use App\Enroll\Models\CompetitionTeamMember;
use App\Enroll\Models\CompetitionTeam;
use App\Enroll\CompetitionService;
use Validator;
use Excel;
use Auth;


class MatchbjController extends Controller
{
    protected $service = null;

    public function __construct(CompetitionService $service)
    {
        $this->service = $service;
    }
    public function initEvents(\App\Enroll\CompetitionService $service)
    {
        $this->service->initEvents();
    }

    public function information(Request $request, \App\Enroll\CompetitionService $service)
    {
        if (! Auth::check()) {
            return redirect('/login');
        }

        $teamList = $service->getTeamList(Auth::user()->id);
        return view('information', compact('teamList'));

    }

    public function create(Request $request)
    {
        if (! Auth::check()) {
            // return redirect('/login');
            return view('successTips', ['status' => '您需要进入登录页面', 'link' => '/login']);
        }


        $competitionList = $this->service->getCompetitionList();
        $competitonsJson = json_encode($competitionList, JSON_UNESCAPED_UNICODE);

        return view('matchbj', [
            'competitonsJson' => $competitonsJson,
            'is_update' => false,
            'teamData' => null
        ]);


        $user = Auth::user();
        $teamModel = CompetitionTeam::where('enroll_user_id', $user->id)->first();

        $teamData = null;
        if ($teamModel !== null) {
            $team_no = $teamModel->team_no;
            $teamData = $this->service->getTeamData($team_no);
        } else {
            $team_no = $this->getTeamNo();
        }

        $is_update = !empty($teamData);


        return view('matchbj', compact('competitonsJson', 'team_no', 'teamData', 'is_update'));
    }

    public function edit($team_no, Request $request)
    {
        if (! Auth::user()) {
            return view('successTips', ['status' => '您需要进入登录页面', 'link' => '/login']);
        }

        $teamData = $this->service->getTeamData($team_no);

        if ($teamData === null) {
            return view('successTips', ['status' => '不存在', 'link' => '/']);
        }

        $competitionList = $this->service->getCompetitionList();
        $competitonsJson = json_encode($competitionList, JSON_UNESCAPED_UNICODE);

        return view('matchbj', [
            'competitonsJson' => $competitonsJson,
            'is_update' => true,
            'teamData' => $teamData
        ]);
    }

    public function doSignup(Request $request)
    {
        if (! Auth::check()) {
            return view('successTips', ['status' => '您需要进入登录页面', 'link' => '/login']);
        }

        $user = Auth::user();

        $id = $request->input('id', 0);
        $competitionTeamModel = CompetitionTeam::find($id);
        if ($competitionTeamModel === null) {
            $competitionTeamModel = new CompetitionTeam();
            $competitionTeamModel->team_no = $this->getTeamNo();
        }

        $team_data = $request->only([
            'user_id',
            'id',
            'contact_name', 'contact_mobile', 'contact_email', 'contact_remark', // 'team_no',
            'team_name', 'competition_event_id', 'remark',
            'invoice_title', 'invoice_code', 'invoice_money', 'invoice_type', 'invoice_detail', 'invoice_mail_address', 'invoice_mail_recipients',
            'invoice_mail_mobile', 'invoice_mail_email', 'invoice_remark', 'invoice_detail',
        ]);
        $competitionTeamModel->enroll_user_id = $user->id;
        $competitionTeamModel->fill(array_except($team_data, ['id']))->save();

        $leaders = (array)$request->all()['leader']; // 领队教师
        $members = (array)$request->all()['member']; // 队员

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
        CompetitionTeamMember::destroy($deleteIds);

        // 添加成员
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

        return redirect('finish/'.$competitionTeamModel->team_no);
    }

    private function getTeamNo()
    {
        $teamCount = CompetitionTeam::count();

        $seg1 = '2017';
        $seg2 = date('mdHis');
        $seg3 = 1687 + $teamCount;

        // 年份前缀-月日时分-报名次序
        return $seg1.$seg2.$seg3;
    }

    public function checkName(Request $request)
    {
        if (! $request->has('team_name')) {
            return api_response(2, '队名不能为空');
        }

        $team_name = $request->input('team_name', '');

        $nameCount = CompetitionTeam::where('team_name', $team_name)->count();
        if ($nameCount > 0) {
            return api_response(1, '队伍名重复');
        }

        return api_response(0, '队伍名可用');
    }

    public function finish($team_no, Request $request, \App\Enroll\CompetitionService $service){
        if (! Auth::check()) {
            return view('successTips', ['status' => '您需要进入登录页面', 'link' => '/login']);
        }

        $user = Auth::user();

        $teamData = $service->getTeamData($team_no);

        if (! $this->canAccess($teamData, $user)) {
            return view('successTips', ['status' => '队伍不存在', 'link' => '/']);
        }

        return view('finish', compact('teamData'));
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
        return view('inquire');
    }

    public function doExportExcel(Request $request, \App\Enroll\CompetitionService $service)
    {
        $validator = Validator::make($request->all(),[
                'email'    => 'required',
            ],[
                'email.required' => '您没有权限,请选择其他操作',
            ]);

        if ($validator->fails()) {
           return view('/successTips', ['status' => '您没有权限,请选择其他操作', 'link' => '/']);
        }

        $adminArr  = [
            '815854240@qq.com',
            'slowlyrun@hotmail.com'
        ];

        if (! in_array($request->input('email'), $adminArr)) {
            // return redirect()->back()->withErrors(['您无权下载此数据'])->withInput();
            return view('successTips', ['status' => '您没有权限,需要进入登录页面', 'link' => '/']);
        }

        $filename = 'RoboCom国际公开赛——青少年人工智能编成挑战赛-' . date('Y_m_d_H_i_s');
        return $service->makeExcel($filename);
    }

    public function dataShow(Request $request, \App\Enroll\CompetitionService $service)
    {
        if (! Auth::check() || ! $this->isAdmin(Auth::user())) {
            return view('successTips', ['status' => '您没有权限,需要进入登录页面', 'link' => '/login']);
        }

        $teamList = $service->getTeams();
        return view('dataShow', compact('teamList'));
    }

    protected function canAccess(array $teamData, $user)
    {
        if ($user === null) {
            return false;
        }

        if ($teamData === null) {
            return false;
        }

        if ($teamData['enroll_user_id'] !== $user->id && ! $this->isAdmin($user)) {
            return false;
        }

        return true;
    }

    public function isAdmin($user)
    {
        return $user !== null && $user->email === '815854240@qq.com' || $user->email === 'slowlyrun@hotmail.com';
    }
}
