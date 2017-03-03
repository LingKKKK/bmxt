<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Enroll\Activity as ActivityModel;
use Carbon\Carbon;
use Validator;
use App\Enroll\EnrollService;
use App\Enroll\EnrollDataRepository;
use App\Enroll\EnrollForm;
class ActivityController extends Controller
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

    public function store(Request $request, EnrollService $enrollservice)
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

        $form_design = EnrollForm::create();
        //默认配置
        $input['form_design'] = $form_design->toJson();

        $act = ActivityModel::create($input);
        return redirect('/admin/activity/list');
    }

    //配置报名活动
    public function config($id, Request $request, EnrollDataRepository $enrollrepo)
    {
        $id = intval($id);
        $act = $enrollrepo->getActivity($id);
        if (empty($act)) {
            abort(404);
        }
        $fields = $act['form_design']['fields'];
        return view('admin.activity.config', compact('id', 'fields'));
    }

    public function configPreview($id, EnrollDataRepository $enrollrepo)
    {
        $act = $enrollrepo->getActivity($id);
        if (empty($act)) {
            return api_response(-1, 'invalid act_id');
        }

        return api_response(0,'success', $act['form_design']);
    }

    public function saveConfig($id, Request $request, EnrollDataRepository $enrollrepo)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'type' => 'required',
            'labeltext' => 'required',
        ],[
            'name.required'     => 'name不能为空',
            'type.required'   => 'type不能为空',
            'labeltext.required'     => 'labeltext不能为空',
        ]);

        if ($validator->fails()) {
            return api_response(-2, $validator->errors()->first());
        }

        $act = $enrollrepo->getActivity($id);
        if (empty($act)) {
            return api_response(-1, 'invalid act_id');
        }


        $enrollform = EnrollForm::parse($act['form_design']);

        $input = $request->all();
        $input['required'] = isset($input['required']) && $input['required'] ? true : false;
        try {
            if ($input['type'] == 'text') {
                $enrollform->addTextField($input['name'], $input['labeltext'], $input['required']);
            } elseif ($input['type'] == 'text.email') {
                $enrollform->addTextField($input['name'], $input['labeltext'], $input['required'], ['datatype' => 'email']);
            } elseif ($input['type'] == 'text.mobile') {
                $enrollrepo->addTextField($input['name'], $input['labeltext'], $input['required'], ['datatype' => 'mobile']);
            } elseif ($input['type'] == 'text.date') {
                $enrollrepo->addTextField($input['name'], $input['labeltext'], $input['required'], ['datatype' => 'date']);
            } else {
                return api_response(-4, '无效的类型');
            }

            $enrollrepo->saveActivity($id, ['remark' => date('Y-m-d H:i:s'),'form_design' => $enrollform->toJson()]);
            return api_response(0, '添加成功');
        } catch (\Exception $e) {
            return api_response(-3, '重复的key ['.$input['name'].']'.$e->getMessage());
        }
    }
}
