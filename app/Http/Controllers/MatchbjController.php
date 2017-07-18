<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    //
    protected $group_map = [
        '小学' => 1,
        '初中' => 2,
        '高中' => 3,
        '大专' => 4,
        '中学(含初高中)' => 5,
        '中学(含小初)' => 6,
        '小初高' => 7
    ];

    protected $type_map = [
        // 未来世界
        "WRO常规赛" => 1,
        "EV3足球赛" => 2,
        "WRO创意赛-'可持续发展'" => 3,
        // 博思威龙
        "VEX-EDR'步步为营'工程挑战赛" => 11,
        "VEX-IQ'环环相扣'工程挑战赛" => 12,
        "BDS机器人工程挑战赛——'长城意志'" => 13,
        // 工业时代
        "能力风暴——WER能力挑战赛" => 21,
        "能力风暴——WER能力挑战赛工程创新赛" => 22,
        "能力风暴——WER普及赛" => 23,
        // 部落战争——攻城大师
        "部落战争——攻城大师" => 31,
        // 智造大挑战
        "智造大挑战" => 41,
        // 创客生存挑战赛
        "创客生存挑战赛" => 51
    ];
    //队伍码
    protected $team_no = '';    

    public function signup(Request $request)
    {

        $competition_groups = [
            '小学' => 1,
            '初中' => 2,
            '高中' => 3,
            '大专' => 4,
            '中学(含初高中)' => 5,
            '中学(含小初)' => 6,
            '小初高' => 7
        ];
        $competition_types = [
            // 未来世界
            "WRO常规赛" => 1,
            "EV3足球赛" => 2,
            "WRO创意赛-'可持续发展'" => 3,
            // 博思威龙
            "VEX-EDR'步步为营'工程挑战赛" => 11,
            "VEX-IQ'环环相扣'工程挑战赛" => 12,
            "BDS机器人工程挑战赛——'长城意志'" => 13,
            // 工业时代
            "能力风暴——WER能力挑战赛" => 21,
            "能力风暴——WER能力挑战赛工程创新赛" => 22,
            "能力风暴——WER普及赛" => 23,
            // 部落战争——攻城大师
            "部落战争——攻城大师" => 31,
            // 智造大挑战
            "智造大挑战" => 41,
            // 创客生存挑战赛
            "创客生存挑战赛" => 51
        ];

        return view('matchbj', compact('competition_types', 'competition_groups'));
    }

    public function doSignup(Request $request)
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

        //初始化队伍码
        // dd($request->all());
        // 获取到所有提交的数据   下面是对这些数据 进行分配 处理

        $this->initTeamNo($request->input('competition_group'), $request->input('competition_type'));
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
            $keys = ['invitecode', 'out_trade_no' ,'leader_name', 'leader_id', 'leader_sex', 'leader_mobile', 'leader_email', 'team_name', 'school_name', 'school_address', 'competition_name', 'competition_type', 'competition_group', 'payment'
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

            // dd($data['data']);

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
}
