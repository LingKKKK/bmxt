<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Enroll\Activity as ActivityModel;
use Carbon\Carbon;
use Validator;
class EnrollController extends Controller
{
    //活动列表
    public function index()
    {
        $activities = ActivityModel::all();
        $now = Carbon::now();

        $debug = [];
        foreach ($activities as $k => $act) {
            $activities[$k]['count'] = $act->enrolldatas()->count();
            $debug[$k] = [
                'start_time' => $act['start_time'],
                'time' => Carbon::parse($act['start_time']),
                'value' => $now->lt(Carbon::parse($act['start_time'])),
            ];
            $activities[$k]['status'] = $now->lt(Carbon::parse($act['start_time'])) ? -1 : ($now->gt(Carbon::parse($act['end_time'])) ? 1 : 0);
        }
        
        return view('admin.activity.index', compact('activities'));
    }

    //创建报名活动
    public function create(Request $request)
    {
        return view('admin.activity.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'act_name' => 'required|max:255',
            'start_time' => 'required',
            'end_time' => 'required',
            'remark'    => 'required',
        ],[
            'act_name.required'     => '活动名称不能为空',
            'start_time.required'   => '开始时间',
            'end_time.required'     => '结束时间',
            'remark.required'       => '活动说明不能为空',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/activity/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $input = $request->only(['act_name', 'start_time', 'end_time', 'remark', 'form_design']);

        //默认配置
        $input['form_design'] = $this->getdemoFormDesign();

        $act = ActivityModel::create($input);
        return redirect('/admin/activity/list');
    }

    //配置报名活动
    public function config(Request $request)
    {



        return view('admin.activity.config');
    }

    protected function getdemoFormDesign()
    {
        $form_design = [
            'fields' => [
                [
                    'type' => 'text',
                    'id' => 'username',
                    'name' => 'username', 
                    'labeltext' => '姓名',
                    'required' => true,
                ],
                [
                    'type' => 'text',
                    'id' => 'email',
                    'name' => 'email', 
                    'labeltext' => '邮箱',
                    'required' => true,
                ],
                [
                    'type' => 'text',
                    'id' => 'mobile',
                    'name' => 'mobile', 
                    'labeltext' => '手机号',
                    'required' => true,
                ],
               

                [
                    'type' => 'radio',
                    'id'   => 'radio1',
                    'name' => 'radio1',
                    'labeltext' => '单选',
                    'required' => true,
                    'value' => '1',
                    'checked' => false,
                ],
                [
                    'type' => 'checkbox',
                    'id' => 'chkbox1',
                    'name' => 'chkbox1',
                    'labeltext' => '多选',
                    'required' => true,
                    'value' => '2',
                    'checked' => false,
                ],

                [
                    'type'  => 'select',
                    'id'    => 'select1',
                    'name'  => 'select1',
                    'labeltext' => '多选',
                    'multiple' => 'multiple',
                    'size' => 3,
                    'required' => true,
                    'options' => [
                        [
                            'value' => 1,
                            'text' => '选项1',
                            'selected' => true,
                        ],
                        [
                            'value' => 2,
                            'text' => '选项2',
                        ],
                        [
                            'value' => 3,
                            'text' => '选项3',
                        ]
                    ],

                ],
                [
                    'type' => 'radiolist',
                    'labeltext' => '内联radiogroup',
                    'name' => 'radiolist',
                    'items' => [
                        [
                            'id' => 'inline-radio1',
                            'name' => 'inline-radio1',
                            'labeltext' => '选项1',
                            'value' => 'inline-radio1',
                        ],
                        [
                            'id' => 'inline-radio2',
                            'name' => 'inline-radio2',
                            'labeltext' => '选项2',
                            'value' => 'inline-radio2',
                            'checked' => 'checked',
                        ],
                        [
                            'id' => 'inline-radio3',
                            'name' => 'inline-radio3',
                            'labeltext' => '选项3',
                            'value' => 'inline-radio3',
                        ]

                    ],
                ],
                [
                    'type' => 'checkboxlist',
                    'labeltext' => '内联checkbox',
                    'name' => 'checkboxlist',
                    'items' => [
                        [
                            'id' => 'inline-chkbox1',
                            'name' => 'inline-chkbox1',
                            'labeltext' => '选项S1',
                            'value' => 'inline-chkbox1',
                        ],
                        [
                            'id' => 'inline-chkbox2',
                            'name' => 'inline-chkbox2',
                            'labeltext' => '选项S2',
                            'value' => 'inline-chkbox2',
                            'checked' => 'checked',

                        ],
                        [
                            'id' => 'inline-chkbox3',
                            'name' => 'inline-chkbox3',
                            'labeltext' => '选项S3',
                            'value' => 'inline-chkbox3',
                        ]
                    ],
                ]


            ],

            'theme' => 'black',
        ];

        return json_encode($form_design, JSON_UNESCAPED_UNICODE);
    }



}
