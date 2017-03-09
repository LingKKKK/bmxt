<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Enroll\Models\Activity as ActivityModel;
use Carbon\Carbon;
use Validator;
use App\Enroll\EnrollDataRepository;

use App\Enroll\Form as EForm;
use App\Enroll\Field as EField;

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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'act_name' => 'required|max:255',
            'start_time' => 'required|date_format:Y-m-d',
            'end_time' => 'required|date_format:Y-m-d',
            'remark'    => 'required',
        ],[
            'act_name.required'     => '活动名称不能为空',
            'start_time.required'   => '开始时间不能为空',
            'end_time.required'     => '结束时间不能为空',
            'start_time.date_format' => '开始时间格式错误',
            'end_time.date_format'   => '结束时间格式错误', 
            'remark.required'       => '活动说明不能为空',

        ]);

        if ($validator->fails()) {
            return redirect('/admin/activity/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $input = $request->only(['act_name', 'start_time', 'end_time', 'status' ,'remark', 'form_design']);

        $config = $request->only(['verificationtype', 'theme']);
        $form = EForm::create($config);
        $form->add('mobile', 'text', '手机', ['datatype' => 'mobile', 'required' => true]);
        $form->add('email', 'text', '邮箱', ['datatype' => 'email', 'required' => true]);

        $input['form_design'] = $form->toJson();
        $input['config'] = json_encode([]);

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

        $form = EForm::loadFromArray($act['form_design']);


        return view('admin.activity.config', compact('id', 'form'));
    }

    /**
     * 添加字段
     */
    public function addField($id, Request $request, EnrollDataRepository $enrollrepo)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'type' => 'required',
            'labeltext' => 'required',
        ],[
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

        try {

            $form = EForm::loadFromArray($act['form_design']);

            $arr_field = array_only($input, ['name', 'type', 'labeltext']);
            $attributes = array_except($input, ['name', 'type', 'labeltext']);
            $segments = explode('.', $input['type']);

            //数据类型
            if (count($segments) >= 2) {
                $arr_field['type'] = $segments[0];
                $attributes['datatype'] = $segments[1];
            }

            //多选
            if (isset($input['items'])) {
                $item_segments = explode("\n", $input['items']);
                $items = [];

                for ($i=0; $i < count($item_segments); $i++) { 
                    $items[$i+1] = $item_segments[$i];
                }

                $attributes['items'] = $items;
            }

            $arr_field['name'] = $arr_field['type'].uniqid('_');
            $arr_field['attributes'] = $attributes;

            $field = EField::fromArray($arr_field);
            $form->add($field);

            $enrollrepo->saveActivity($id, ['form_design' => $form->toJson()]);
            return api_response(0, '添加成功', ['field' => $field->toArray()]);
        } catch (\Exception $e) {
            return api_response(-3, '重复的key '.$e->getMessage());
        }
    }

    public function editForm($id, Request $request, EnrollDataRepository $enrollrepo)
    {
        $input = $request->only('theme', 'verificationtype');
        $act = $enrollrepo->getActivity($id);

        if (empty($act)) {
            return api_response(-1, 'invalid act_id');
        }

        try {
            $form = EForm::loadFromArray($act['form_design']);
            if (isset($input['theme'])) {
                $form->theme = $input['theme'];
            }

            if (isset($input['verificationtype'])) {
                $form->verificationtype = $input['verificationtype'];
            }
            // dd($input, $form);
            $enrollrepo->saveActivity($id, ['form_design' => $form->toJson()]);
            return api_response(0, '修改成功', ['theme' => $form->theme, 'verificationtype' => $form->verificationtype]);

        } catch (\Exception $e) {
            return api_response(-3, '修改失败');
        }      
    }

    public function enrolldata($id, EnrollDataRepository $enrollrepo)
    {
        $act = $enrollrepo->getActivity($id);
        if (empty($act)) {
            abort(404);
        }

        $form = EForm::loadFromArray($act['form_design']);
        $enrolldatas = $act->enrolldatas;
   
        $titles = $form->titles();
        $datakeys = $form->datakeys();

        $contents = [];
        foreach ($enrolldatas as $k => $val) {
            $val = $val->toArray();  
            $data =  json_decode($val['data'], true);
            $data= $form->filterData($data);
            foreach ($data as $k => $v) {
                if (is_array($data[$k])) {
                    $data[$k] = join(', ', $v);
                }
            }
            $contents[$val['id']] = $data;
        }



        return view('admin.enroll.list', compact('act', 'titles', 'datakeys','contents'));
    }
}
