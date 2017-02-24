<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Enroll\Activity as ActivityModel;
use App\Enroll\EnrollData as EnrollDataModel;
use App\Enroll\EnrollDataRepository;
use Validator;

/**
 * 报名页面展示
 */
class EnrollController extends Controller
{
    protected $enrollrepo = null;
    public function __construct(EnrollDataRepository $enrollrepo)
    {
        $this->enrollrepo = $enrollrepo;
    }

    public function index($id, Request $request, \App\Enroll\EnrollService $enrollservice)
    {
        $id = intval($id);
        $act = $this->enrollrepo->getActivity($id);
        if (!$act) {
            abort(404);
        }
        $config = $enrollservice->parseConfig($enrollservice->getdemoFormDesign());


        return view('enroll.theme1', compact('config','id'));
    }

    public function doEnroll($id, Request $request, \App\Enroll\EnrollService $enrollservice)
    {
        $config = $enrollservice->parseConfig($enrollservice->getdemoFormDesign());
        $validator = Validator::make($request->all(), 
            $config['validator.rules'],
            $config['validator.messages']
        );

        if ($validator->fails()) {
            return redirect("/enroll/$id")
                        ->withErrors($validator)
                        ->withInput();
        }
        

        $id = intval($id);
        $act = $this->enrollrepo->getActivity($id);
        if (empty($act)) {
            abort(404);
        }

        $form_design = $act['form_design'];

        $fileds = [];
        foreach ($form_design['fields'] as $tag) {
            $fields[] = $tag['name'];
        }

        $input = $request->only($fields);
        $enrolldata = [];
        $enrolldata['activity_id'] = $id;
        $enrolldata['phone'] = isset($input['phone']) ? $input['phone'] : '';
        $enrolldata['email'] = isset($input['email']) ? $input['email'] : '';
        $enrolldata['data'] = json_encode($input, JSON_UNESCAPED_UNICODE);

        $endata = EnrollDataModel::create($enrolldata);
        if ($endata) {
            $input['id'] = $endata->id;
            if (!empty($enrolldata['email'])) {
                  $result = \Mail::send('emails.enroll', ['enrolldata' => $input], function($m) use($endata) {
                        $m->from('support@kenrobot.com', '啃萝卜');
                        $m->to($endata['email'], '王昆鹏')->subject('报名成功');
                    });
            }

            return redirect('/enroll/success?enrollid='.$endata->id);
        } else {
            return redirect('/enroll/fail');
        }
    }

    public function test(Request $request, \App\Enroll\EnrollService $enrollservice)
    {
        $ret = $enrollservice->parseConfig($enrollservice->getdemoFormDesign());
        dd($ret);
    }

    public function success()
    {
        return view('enroll.success');
    }

    public function fail()
    {
        return view('enroll.fail');
    }

    public function info(Request $request)
    {
        $enrollid = $request->input('enrollid');
        $enrolldata = $this->enrollrepo->getEnrollData($enrollid);
        if (!$enrolldata) {
            return '表单不存在';
        }

        $form_design = $enrolldata->activity->form_design;
        $data = $enrolldata['data'];

        $pretty_data = []; 
        foreach ($form_design['fields'] as $tag) {
            $name = $tag['name'];
            $pretty_data[$name] = [];
            $pretty_data[$name]['labeltext'] = $tag['labeltext'];
            $pretty_data[$name]['data'] = '';
            if (isset($data[$name])) {
                $pretty_data[$name]['data'] = $this->parseData($data[$name], $tag);
            }
        }

        return view('enroll.info', compact('pretty_data'));
    }

    protected function parseData($val, $tag, $separater = ',')
    {
        if ($val == null) {
            return $val;
        }
        if ($tag['type'] == 'select') {
            $value = [];
            if (is_array($val)) {
                foreach ($tag['options'] as $option ) {
                    if (in_array($option['value'], $val)) {
                        $value[] = $option['text'];
                    }
                }
                return join($separater, $value);
            }
        } elseif ($tag['type'] == 'radiolist' || $tag['type'] == 'checkboxlist') {
            $value = [];
            if (is_array($val)) {
                foreach ($tag['items'] as $item ) {
                    if (in_array($item['value'], $val)) {
                        $value[] = $item['labeltext'];
                    }
                }
                return join($separater, $value);
            }
        }

        return $val;
    }

  

}
