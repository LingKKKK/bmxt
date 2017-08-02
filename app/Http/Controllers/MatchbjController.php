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
        return redirect('matchbj');
    }

    public function signup(Request $request, \App\Enroll\CompetitionService $service)
    {
        $competitionList = $service->getCompetitionList();
        $competitonsJson = json_encode($competitionList, JSON_UNESCAPED_UNICODE);

        return view('matchbj', compact('competitonsJson'));
    }

    public function doSignup(Request $request)
    {
        // dd($request->all());

        $team_fields = [
            'id', 'invitecode',
            'contact_name', 'contact_mobile', 'contact_email', 'contact_remark',
            'team_no', 'team_name', 'competition_event_id',
            'invoice_title', 'invoice_code', 'invoice_money', 'invoice_type', 'invoice_mail_address', 'invoice_mail_recipients',
            'invoice_mail_mobile', 'invoice_mail_email', 'invoice_remark'
        ];

        $team_data = $request->only($team_fields);
        $team_data['team_no'] = $this->getTeamNo();

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

        $seg2 = date('mdHi');
        $seg3 = 1687 + $teamCount;

        // 年份前缀-月日时分-报名次序
        $this->team_no = $seg1.$seg2.$seg3;
        return $this->team_no;
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
