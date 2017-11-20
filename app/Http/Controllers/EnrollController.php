<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Enroll\Models\CompetitionEvent;
use App\Enroll\Models\CompetitionTeamMember;
use App\Enroll\Models\CompetitionTeam;
use App\Enroll\CompetitionService;
use Auth;

class EnrollController extends Controller
{
    public function index(Request $request, CompetitionService $service)
    {


        $competitionList = $service->getCompetitionList();
        $competitonsJson = json_encode($competitionList, JSON_UNESCAPED_UNICODE);


        $team_no = $this->getTeamNo();

        // 如果是修改
        if ($teamData != null) {
            $team_no = $teamData['team_no'];
        }

        $is_update = !empty($teamData);

        return view('matchbj', compact('competitonsJson', 'team_no', 'teamData', 'is_update'));
    }

    public function signup(Request $request, CompetitionService $service)
    {
        // if (! Auth::check()) {
        //     dd('未登录');
        // }

        $this->validate($request,
            [
                'team_no' => 'sometimes|required|exists:competition_teams,team_no'
            ]);


        $team_no = $request->input('team_no');

        $competitionList = $service->getCompetitionList();
        $competitonsJson = json_encode($competitionList, JSON_UNESCAPED_UNICODE);

        $teamData = null;

        // 如果是修改
        if ($team_no !== null) {
            $teamData = $this->getTeam($team_no);
        } else {
            $team_no = $this->getTeamNo();
        }

        $is_update = ! empty($teamData);

        return view('matchbj', compact('competitonsJson', 'team_no', 'teamData', 'is_update'));
    }

    public function getTeam($team_no)
    {
        $teamData = CompetitionTeam::where('team_no', $team_no)
                                    ->with('members')->first();

        // 比赛项目
        $teamEvent = $teamData->event;
        $eventItems = collect([]);
        while ($teamEvent != null) {
            $eventItems->push([
                'id' => $teamEvent->id,
                'name'   => $teamEvent->name,
                'parent_id' => $teamEvent->parent_id,
                ]);
            $teamEvent = $teamEvent->parent;
        }

        $eventItems = $eventItems->reverse();
        $teamData = $teamData->toArray();
        $teamData['eventItems'] = $eventItems->toArray();
        $teamData['competition_1'] = $eventItems[0]['name'];
        $teamData['competition_2'] = $eventItems[1]['name'];
        $teamData['competition_3'] = $eventItems[2]['name'];
        $eventItemsKeys = $eventItems->pluck('id');
        $teamData['eventItemsKeys'] = $eventItemsKeys;

        return $teamData;

    }

    private function getTeamNo()
    {

        $teamCount = CompetitionTeam::count();

        $seg1 = '2017';

        $seg2 = date('mdHis');
        $seg3 = 1687 + $teamCount;

        // 年份前缀-月日时分-报名次序
        $this->team_no = $seg1.$seg2.$seg3;
        return $this->team_no;
    }

    public function doSignup(Request $Request)
    {

    }
}
