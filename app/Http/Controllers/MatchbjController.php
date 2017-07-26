<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Enroll\SignupData;
use App\Enroll\MatchbjData;
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
        $service->initEvents2();
    }

    public function search()
    {
        return view('searchbj');
    }

    public function doSearch(Request $request)
    {
        // $validator = Validator::make($request->all(),
        //     [
        //         'leader_mobile' => 'required',
        //         'team_no'   => 'required',
        //         'verificationcode' => 'required|verificationcode',
        //     ],
        //     [
        //         'leader_mobile.required' => '手机号不能为空',
        //         'leader_id.required' => '身份证或者领队姓名名填写至少一个',
        //         'leader_name.required_without' => '身份证或者领队姓名名至少填写一个',
        //         'team_no.required'  => '队伍编号不能为空',
        //         'verificationcode.required' => '验证码不能为空',
        //         'verificationcode.verificationcode' => '验证码不正确',
        //     ]);

        // if ($validator->fails()) {
        // }

        $team_no = $request->input('team_no', '');
        $signdata = SignupData::where('team_no', $team_no)->first();

        // if ($signdata === null) {
        //     return redirect()->back()->withErrors(collect(['notfound' => '数据不存在']))->withInput();
        // }
        // if ($signdata['leader_mobile'] != $request->input('leader_mobile')) {
        //     return redirect()->back()->withErrors(collect(['notfound' => '请填写正确的领队手机号']))->withInput();
        // }

        // $request->session()->flash('signdata', $signdata->toArray());

        //  已经报名的队伍 可以参加填表  未报名的队伍 不允许添加
        $request->session()->flash('signdata', $signdata->toArray());
        return redirect('matchbj');
    }

    public function signup(Request $request)
    {
        $competition_list = [
            '未来世界' => [
                'WRO常规赛' => [
                    "小学" => 1,
                    "初中" => 1,
                    "高中" => 1,
                    "大专" => 1,
                ],
                'EV3足球赛' => [
                    "小学" => 1,
                    "中学(含初高中)" => 1,
                ],
                'WRO创意赛——"可持续发展"' => [
                    "小学" => 1,
                    "中学(含初高中)" => 1,
                ],
            ],
            '博思威龙' => [
                'VEX-EDR"步步为营"工程挑战赛' => [
                    '中学(含小初)' => 1,
                    '高中' => 1,
                ],
                'VEX-IQ"环环相扣"工程挑战赛' => [
                    '小学' => 1,
                    '初中' => 1,
                ],
                'BDS机器人工程挑战赛——"长城意志"' => [
                    '小初高' => 1,
                ],
            ],
            '工业时代' => [
                '能力风暴——WER能力挑战赛' => [
                    "小学" => 1,
                    "初中" => 1,
                    "高中" => 1,
                ],
                '能力风暴——WER能力挑战赛工程创新赛' => [
                    "小学" => 1,
                    "初中" => 1,
                    "高中" => 1,
                ],
                '能力风暴——WER普及赛' => [
                    "小学" => 1,
                    "初中" => 1,
                ],
            ],
            '攻城大师' => [
                '攻城大师' => [
                    "小学" => 1,
                    "初中" => 1,
                    "高中" => 1,
                ],
            ],
            '智造大挑战' => [
                '智造大挑战' => [
                    "小学" => 1,
                    "初中" => 1,
                    "高中" => 1,
                ],
            ],
        ];

        return view('matchbj', compact('competition_types', 'competition_groups'))->with('competition_list', $competition_list);
        
        // $signdata = $this->fetchSignData();
        // if (! $signdata) {
        //     return redirect('/matchbj');
        // }

        // $team_no =  $signdata['team_no'];
        // $trip_data = TripData::where('team_no', $team_no)->get();

        // return view('matchbj', compact('competition_types', 'competition_groups', 'signdata'));
    }

    public function doSignup(Request $request)
    {
        // $validator = Validator::make($request->all(),

        //     [
        //         'invitecode' => 'required', //邀请码信息
        //     ],
        //     [
        //         'invitecode.required' => '邀请码必填',
        //         'team_name.required' => '队名必填',
        //         'verificationcode.required' => '验证码不能为空',
        //         'invitecode.required' => '邀请码不能为空',
        //         'invitecode.invitecode' => '邀请码不正确',
        //     ]
        // );

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

            dd($data['data']);

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

    public function demo()
    {
        return view('demo');
    }

    public function upDemo(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'invitecode' => 'required', //邀请码信息
            ],
            [
                'invitecode.required' => '邀请码必填',
                'team_name.required' => '队名必填',
                'verificationcode.required' => '验证码不能为空',
                'invitecode.required' => '邀请码不能为空',
                'invitecode.invitecode' => '邀请码不正确',
            ]
        );
    }
    private function fetchSignData()
    {
        $signdata = session('signdata');
        // dd($signdata);
        if ($signdata) {
            $signdata['members'] = json_decode($signdata['members'], true);
            // dd($signdata)
            $data = json_decode($signdata['data'], true);
            $signdata['leaders'] = $data['leaders'];
            $signdata['participant'] = $data['participant'];
            $signdata['account_type'] = $data['account_type'];
            $signdata['invoice_header'] = $data['invoice_header'];
            $signdata['billing_content'] = $data['billing_content'];
            $signdata['receive_address'] = $data['receive_address'];
            $signdata['average_amount'] = $data['average_amount'];
            $signdata['total_cost'] = $data['total_cost'];
            // dd($signdata);

            return $signdata;
        }

        return $signdata;
    }

    public function finish(){
        return view('finish');
    }
}
