<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Enroll\Models\CompetitionEvent;

use App\Enroll\SignupData;
use Validator;
use Mail;
use Storage;
use Session;
use App\Enroll\InviteManager;
use Excel;
use App\Enroll\TripData;

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

        dd($request->all());


        $team_no = '12321321'.rand(1000, 9999);


        try {
            $leader_picdata = $this->saveFile($request->file('leader_pic'));
            $leader_pic = !empty($leader_picdata) && isset($leader_picdata['publicPath']) ? $leader_picdata['publicPath'] : '';
            $leader_pic_filename = !empty($leader_picdata) && isset($leader_picdata['filename']) ? $leader_picdata['filename'] : '';

            // 处理成员
            $members = array();
            $origin_members = isset($request->all()['members']) ? $request->all()['members'] : [];

            foreach ($origin_members as $k => $item) {
                $member_info = array_only($item, ['name', 'mobile', 'ID' ,'age', 'sex', 'school_name', 'school_address' ,'height', 'id_type']);
                $pic = isset($item['pic']) ? $item['pic'] : null;

                $member_picdata = $this->saveFile($item['pic']);
                $member_info['pic'] =  !empty($member_picdata) && isset($member_picdata['publicPath']) ?  $member_picdata['publicPath'] : '';
                $member_info['pic_filename'] = !empty($member_picdata) && isset($member_picdata['publicPath']) ?  $member_picdata['filename'] : '';
                $members[] = $member_info;
            }
            // 领队成员处理
            $leaders = array();
            $origin_leaders = isset($request->all()['leaders']) ? $request->all()['leaders'] : [];

            foreach ($origin_leaders as $k => $item) {
                $leader_info = array_only($item, ['name', 'mobile', 'ID', 'sex', 'email']);
                $pic = isset($item['pic']) ? $item['pic'] : null;

                $leader_picdata = $this->saveFile($item['pic']);
                $leader_info['pic'] =  !empty($leader_picdata) && isset($leader_picdata['publicPath']) ?  $leader_picdata['publicPath'] : '';
                $leader_info['pic_filename'] = !empty($leader_picdata) && isset($leader_picdata['publicPath']) ?  $leader_picdata['filename'] : '';
                $leaders[] = $leader_info;
            }

            if ($validator->fails()) {
                // 弹出错误提示码
                // dd($validator->errors());
                return redirect()->back()->withInput()
                                         ->withErrors($validator->errors())
                                         ->with('leader_pic_preview', $leader_pic)
                                         ->with('leader_pic_filename', $leader_pic_filename)
                                         ->with('leaders_data', $leaders)
                                         ->with('members_data', $members);
            }

            //表单地钻
            $keys = ['team_no', 'invitecode' ,'team_name', 'competition_name', 'competition_type', 'competition_group', 'vocation', 'name', 'nation', 'sex', 'age', 'heigth', 'work_unit', 'ID_type', 'ID_number'
            ];

            $data = $request->only($keys);
            $data['leader_pic'] = $leader_pic;
            $data['members'] = json_encode($members, JSON_UNESCAPED_UNICODE);
            $data['leaders'] = json_encode($leaders, JSON_UNESCAPED_UNICODE);
            $data['team_no'] = $this->team_no;
            $data['out_trade_no'] = '';


            $dataPayload = $data;
            $dataPayload['participant'] = $request->input('participant', '');
            $dataPayload['account_type'] = $request->input('account_type', '');
            $dataPayload['invoice_header'] = $request->input('invoice_header', '');
            $dataPayload['billing_content'] = $request->input('billing_content', '');
            $dataPayload['receive_address'] = $request->input('receive_address', '');
            $dataPayload['average_amount'] = $request->input('average_amount', '');
            $dataPayload['total_cost'] = $request->input('total_cost', '');
            $dataPayload['leaders'] = $leaders;

            $data['data'] = json_encode($dataPayload, JSON_UNESCAPED_UNICODE);
            $data['origin_data'] = json_encode($request->all(), JSON_UNESCAPED_UNICODE);


            $request->session()->flash('signdata', $data);

            $ddt = SignupData::create($data);
            InviteManager::useCode($data['invitecode'], $ddt->id);
            // dd($ddt);
        } catch (\Exception $e) {
            // dd($e);
            // dd($e);
            return redirect()->back()->withInput();
        }
        // dd($ddt);

        return redirect('/');
    }




    public function finish(){
        return view('finish');
    }
}
