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


    public function signup(Request $request, \App\Enroll\CompetitionService $service)
    {
        $competitionList = $service->getCompetitionList();
        $competitonsJson = json_encode($competitionList, JSON_UNESCAPED_UNICODE);

        // 如果是修改
        $teamData = session('teamData');

        $team_no = $this->getTeamNo();

        // 如果是修改
        if ($teamData != null) {
            $team_no = $teamData['team_no'];
        }

        $is_update = !empty($teamData);

        return view('matchbj', compact('competitonsJson', 'team_no', 'teamData', 'is_update'));
    }

    public function doSignup(Request $request)
    {

        $is_update = $request->has('id') && !empty($request->input('id'));
        $validator = Validator::make($request->all(),
            [
                // 'invitecode' =>  $is_update ? 'required' : 'required|invitecode',
                'team_no'    => 'required',
                'verificationcode' => 'required|verificationcode',
            ],
            [
                // 'invitecode.required' => '邀请码不能为空',
                // 'invitecode.invitecode' => '邀请码不正确',
                'team_no.required'  => '队伍编号不能不能为空',
                'verificationcode.required' => '验证码不能为空',
                'verificationcode.verificationcode' => '验证码不正确',
            ]
        );


        if ($validator->fails()) {
            // dd($request->all(), $validator->errors());
            // dd($validator->errors());
            return redirect()->back()->withInput();
        }

        $team_fields = [
            'id',
            'contact_name', 'contact_mobile', 'contact_email', 'contact_remark',
            'team_no', 'team_name', 'competition_event_id', 'remark',
            'invoice_title', 'invoice_code', 'invoice_money', 'invoice_type', 'invoice_detail', 'invoice_mail_address', 'invoice_mail_recipients',
            'invoice_mail_mobile', 'invoice_mail_email', 'invoice_remark', 'invoice_detail',
        ];

        $team_data = $request->only($team_fields);

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
            // $photo_url = $this->saveFile($val['pic']);
            // if ($photo_url) {
            //     $val['photo_url'] = $this->saveFile($val['pic']);
            // } else {
            //     unset($val['photo_url']); // 如果是修改且未上传照片
            // }

            $val = array_only($val, $member_fields);
            $memberModel->fill(array_except($val, ['id']))->save();
        }

        // 无效邀请码 异常
        // if (!$is_update) {
        //     InviteManager::useCode($team_data['invitecode'], $competitionTeamModel->id);
        // }
        return redirect('finish')->with('team_no',$competitionTeamModel->team_no)->with('contact_mobile', $competitionTeamModel->contact_mobile);
    }

    public function doUpdate(Request $request)
    {
        # code...
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
        // if (!$file) {
        //     return '';
        // }

        // $filename = $file->getClientOriginalName();

        // $ext = $file->getClientOriginalExtension();

        // $suffix = rand(1000, 9999);

        // $hashfilename = md5($filename.$suffix).'.'.$ext;
        // $storePath = '/data/pic_beijing/'.$this->getTeamNo().'/'.$hashfilename;
        // $publicPath = '/data/pic_beijing/'.$this->getTeamNo().'/'.$hashfilename;
        // Storage::put($storePath, file_get_contents($file));

        // return $publicPath;
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

    public function finish(\App\Enroll\CompetitionService $service){
        // dd('12312');
        $team_no = session('team_no');
        $contact_mobile = session('contact_mobile');

        $teamData = $service->searchTeam($team_no, $contact_mobile);

        // dd($teamData);
        return view('finish', compact('teamData'));
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
