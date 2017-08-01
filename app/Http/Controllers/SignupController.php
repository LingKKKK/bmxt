<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Enroll\Models\TripData;
use App\Enroll\InviteManager;
use App\Enroll\Models\SignupData;
use App\Http\Controllers\Controller;

use Validator;
use Mail;
use Storage;
use Session;
use Excel;

class SignupController extends Controller
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
        //数据展示
        // $request->session()->forget('signdata');
        // $signdata = $request->session()->pull('signdata');
        $signdata = $this->fetchSignData();

        if ($signdata) {
            return view('success', compact('signdata'));
        }

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
        return view('signup', compact('competition_types', 'competition_groups'));
    }

    public function checkName(Request $request)
    {
        $team_name = $request->input('team_name', '');
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

        // $signdata = $request->session()->pull('signdata');   /*检测一次内容*/
        $signdata = $this->fetchSignData();
        if ($signdata) {

            return view('success', compact('signdata'));
        }


        return redirect('/search');
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
                'leader_pic.required' => '领队照片不能为空'
                // 'verificationcode.verificationcode' => '验证码错误',
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

        try {

        } catch (Exception $e) {

        }
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
        $validator = Validator::make($request->all(),
            [
                'leader_mobile' => 'required',
                // 'leader_id' => 'sometimes|required',
                // 'leader_name' => 'required_without:leader_id'
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

    public function export()
    {
        return view('enroll.excel');
    }

    public function doExportExcel(Request $request)
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
        ];
        if (! in_array($request->input('mobile'), $adminArr)) {
            return redirect()->back()->withErrors(['您无权下载此数据'])->withInput();
        }

        $filename = 'RoboCom报名-' . date('Y_m_d_H_i_s');

        $signdataList = SignupData::all();

        foreach ($signdataList as $k => $val) {
            $signdataList[$k]['members'] = json_decode($val['members'], true);
        }

        foreach ($signdataList as $k => $val) {
            $signdataList[$k]['data'] = json_decode($signdataList[$k]['data'], true);
            // dd($signdataList[$k]['data']['leaders']);
        }

        Excel::create($filename, function($excel) use($signdataList) {

            // Set the title
            $excel->setTitle('RoboCom报名表');

            // Chain the setters
            $excel->setCreator('RoboCom')
                  ->setCompany('RoboCom');

            // Call them separately
            $excel->setDescription('报名数据');

            $excel->sheet('报名数据', function($sheet) use($signdataList) {
                $sheet->mergeCells('A1:H1');
                $sheet->mergeCells('I1:M1');
                $sheet->mergeCells('N1:V1');
                $sheet->cell('A1', '队伍信息');
                $sheet->cell('I1', '领队信息');
                $sheet->cell('N1', '队员信息');
                $sheet->row(1, function($row) {
                    $row->setAlignment('center');
                });
                $sheet->row(2, function($row) {
                    $row->setAlignment('center');
                });
                $sheet->row(2, ['队伍编号', '邀请码', '队伍名称', '学校/单位名称', '学校/单位地址', '赛事项目', '子赛项', '组别', '姓名', '身份证号', '邮箱', '手机号', '性别', '队员姓名', '证件类型', '证件号', '手机号', '性别', '年龄', '身高(单位cm)', '学校/单位名称', '学校/单位地址',]);

                $rowIndex = 3;
                $rowIndexLeader = $rowIndex;
                foreach ($signdataList as $k => $val) {
                    $sheet->row($rowIndex++, [ $val['team_no'].' ', $val['invitecode'],$val['team_name'], $val['school_name'], $val['school_address'], $this->getParentType($val['competition_type']), $val['competition_type'], $val['competition_group'], $val['leader_name'], $val['leader_id'].' ', $val['leader_email'], $val['leader_mobile'].' ', $val['leader_sex'],]);
                    $rowIndexLeader = $rowIndexLeader + 1;
                    // 循环添加members内容
                    // dd($val['members']);
                    foreach ((array)$val['members'] as $member) {
                        $sheet->row($rowIndex++, ['', '', '', '', '', '', '', '', '', '', '', '','' , $member['name'], isset($member['id_type']) ? $member['id_type'] : '身份证', $member['ID'].' ', $member['mobile'].' ', $member['sex'], $member['age'], $member['height'], $member['school_name'], isset($member['school_address']) ? $member['school_address'] : '', ]);
                    }
                    // 循环添加leaders内容
                    foreach ((array)$val['data']['leaders'] as $leader) {
                        $sheet->row($rowIndexLeader++, [ '', '', '', '', '', '', '', '', $leader['name'], $leader['ID'].' ', $leader['email'].' ', $leader['mobile'].' ', $leader['sex'], ]);
                    }
                    // 给空行添加背景颜色 便于区分
                    if ( $rowIndex>$rowIndexLeader ) {
                        $largeNum = $rowIndex;
                        $sheet->row($largeNum, function($row) {
                            $row->setBackground('#DDDDDD');
                        });
                    }else {
                        $largeNum = $rowIndexLeader;
                        $sheet->row($largeNum, function($row) {
                            $row->setBackground('#DDDDDD');
                        });
                    }
                    // 让每个数据中间都加上一个空行
                    $rowIndex = $largeNum + 1;
                    $rowIndexLeader = $largeNum + 1;
                }

            });
            //最后一步 导出excel 表格
        })->export('xls');
    }

    private function getParentType($type = '')
    {
        $arrType = [
            '未来世界' => [
                    "WRO常规赛" => 1,
                    "EV3足球赛" => 2,
                    "WRO创意赛-'可持续发展'" => 3,
            ],
            '博思威龙'      =>  [
                "VEX-EDR'步步为营'工程挑战赛" => 11,
                "VEX-IQ'环环相扣'工程挑战赛" => 12,
                "BDS机器人工程挑战赛——'长城意志'" => 13,
            ],
            '工业时代'      =>  [
                "能力风暴——WER能力挑战赛" => 21,
                "能力风暴——WER能力挑战赛工程创新赛" => 22,
                "能力风暴——WER普及赛" => 23,
            ],
            '部落战争——攻城大师'    =>  [
                "部落战争——攻城大师" => 31,

            ],
            '智造大挑战'     => [
                "智造大挑战" => 41

            ]
        ];

        foreach ($arrType as $k => $val) {
           if (isset($val[$type]) && $val[$type]) {
                return $k;
           }
        }
        return '';
    }

    public function scheduling()
    {
        return view('scheduling');
    }

    public function doScheduling(Request $request)
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
           return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $team_no = $request->input('team_no', '');
        $signdata = SignupData::where('team_no', $team_no)->first();
        if ($signdata === null) {
            return redirect()->back()->withErrors(collect(['notfound' => '数据不存在']))->withInput();
        }

        if ($signdata['leader_mobile'] != $request->input('leader_mobile')) {
            return redirect()->back()->withErrors(collect(['notfound' => '请填写正确的领队手机号']))->withInput();
        }

        // $request->session()->put('signdata', $signdata->toArray());
        $request->session()->flash('signdata', $signdata->toArray());

        return redirect('plan');
    }

    public function plan(Request $request)
    {
        // $signdata = $request->session()->pull('signdata');   /*检测一次内容*/
        // $signdata = $request->session()->pull('signdata');

        $signdata = $this->fetchSignData();
        if (! $signdata) {
            return redirect('/scheduling');
            // return view('/scheduling');
        }

        $team_no =  $signdata['team_no'];
        $trip_data = TripData::where('team_no', $team_no)->get();
        // return redirect('/scheduling');
        return view('plan', compact('trip_data', 'signdata'));
    }

    public function doPlan(Request $request)
    {
        $validator = Validator::make($request->all(),
            [],
            [
                'verificationcode.required' => '验证码不能为空',
            ]
        );

        // dd($request->all());
        $team_no = $request->input('team_no');
        $trip_data_old = TripData::where('team_no', $team_no)->get();

        // 获取到所有提交的数据   下面是对这些数据 进行分配 处理
        // dd($team_no, $trip_data);
        try {
            $team_no = $request->input('team_no');
            $trip_data = $request->input('trip');

            TripData::where('team_no', $team_no)->delete();
            foreach ($trip_data as $k => $val) {
                $val['team_no'] = $team_no;
                $id = isset($val['id']) ? intval($val['id']) : 0;
                if (!empty($id)) {
                    $trip = TripData::find($id);
                    if ($trip !== null) {
                        $trip->fill($val)->save();
                        // echo $val['id'].'<br>';
                        continue;
                    }
                }
                TripData::create($val);
            }
        // dd($team_no, $trip_data_old, $request->all());

        }catch (\Exception $e) {
            // dd($e->getMessage());

            return redirect()->back()->withInput();
        }

        // $request->session()->put('showTrip', 1);
        $request->session()->flash('showTrip', 1);

        return redirect('/showTrip');
    }

    public function showTrip(Request $request)
    {
        $showTrip = $request->session()->get('showTrip');
        if ($showTrip) {
            return view('showTrip', compact('tripdata'));
        }

        return redirect('scheduling');
    }

    public function planExport()
    {
        return view('enroll.planExport');
    }

    public function planExportExcel(Request $request)
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
        ];

        if (! in_array($request->input('mobile'), $adminArr)) {
            return redirect()->back()->withErrors(['您无权下载此数据'])->withInput();
        }

        $filename = 'RoboCom行程-' . date('Y_m_d_H_i_s');

        $tripdataList = TripData::all();

        // 处理基本信息
        $signupDataList = SignupData::all(['team_no', 'team_name', 'competition_type', 'competition_group', 'leader_name', 'leader_mobile'])->toArray();

        $signupList = array();

        foreach ($signupDataList as $val) {
            $val['competition_name'] = $this->getParentType($val['competition_type']);
            $signupList[$val['team_no']] = $val;
        }

        Excel::create($filename, function($excel) use($tripdataList, $signupList) {

            // Set the title
            $excel->setTitle('RoboCom行程表');

            // Chain the setters
            $excel->setCreator('RoboCom')
                  ->setCompany('RoboCom');

            // Call them separately
            $excel->setDescription('行程数据');

            $excel->sheet('行程数据', function($sheet) use($tripdataList, $signupList) {

                $sheet->row(1, function($row) {
                    $row->setAlignment('center');
                });
                $sheet->row(2, function($row) {
                    $row->setAlignment('center');
                });
                $sheet->row(2, ['队伍编号', '行程状态',
                    '队伍名称', '赛事项目', '子赛项', '组别', '领队姓名', '领队手机号',
                    '交通工具', '航班/车次',
                    '出发日期', '出发时间', '出发地点',
                    '到达日期', '到达时间', '到达地点',
                    '航班/列车发车时间', '总人数', '联系人', '联系人电话']);

                $rowIndex = 3;

                foreach ($tripdataList as $k => $val) {
                    $team_baseinfo = $signupList[$val['team_no']];

                    $sheet->row($rowIndex++, [
                        $val['team_no'].' ', $val['trip_type'],
                        $team_baseinfo['team_name'], $team_baseinfo['competition_name'], $team_baseinfo['competition_type'], $team_baseinfo['competition_group'], $team_baseinfo['leader_name'], $team_baseinfo['leader_mobile'].' ',
                        $val['vehicle_type'], $val['vehicle_number'].' ' ,
                        $val['start_date'], $val['start_time'], $val['start_place'],
                        $val['arrive_date'], $val['arrive_time'], $val['arrive_place'],
                        $val['vehicle_time'], $val['people_number'], $val['contact_name'], $val['contact_mobile'].' ',]);
                }

            });
            //最后一步 导出excel 表格
        })->export('xls');

    }
}
