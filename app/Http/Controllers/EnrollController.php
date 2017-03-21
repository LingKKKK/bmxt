<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Enroll\EnrollDataRepository;
use Validator;
use App\Enroll\Form as EForm;

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

    public function enrolldev($id, Request $request)
    {
        $act = $this->enrollrepo->getActivity($id);
        if (!$act) {
            abort(404);
        }

        $form = EForm::loadFromArray($act['form_design']);
        // dd($form);
        return view('enroll.theme2', compact('form','act'));
    }

    public function index($id, Request $request)
    {
        $act = $this->enrollrepo->getActivity($id);
        if (!$act) {
            abort(404);
        }

        $form = EForm::loadFromArray($act['form_design']);

        return view('enroll.theme1', compact('form','act'));
    }

    public function loadindex1($id, Request $request)
    {
        return view('enroll/theme3');
    }

    public function doEnroll($id, Request $request)
    {
        $act = $this->enrollrepo->getActivity($id);
        if (empty($act)) {
            abort(404);
        }

        $form_design = $act['form_design'];
        $form = EForm::loadFromArray($act['form_design']);

        $validateRules = $form->validateRules();
        // dd($validateRules);
        $validator = Validator::make($request->all(), 
            $validateRules['rules'],
            $validateRules['messages']
        );

        if ($validator->fails()) {
            return redirect("/enroll/$id")
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $datakeys = $form->datakeys();

        $input = $request->only($datakeys);

        $enrolldata = [];
        $enrolldata['activity_id'] = $id;
        $enrolldata['mobile'] = isset($input['mobile']) ? $input['mobile'] : '';
        $enrolldata['email'] = isset($input['email']) ? $input['email'] : '';
        $enrolldata['data'] = json_encode($input, JSON_UNESCAPED_UNICODE);

        $endata = $this->enrollrepo->createEnrollData($enrolldata);

        if ($endata) {
            return redirect('/enroll/info?enrollid='.$endata->id);
        } else {
            return redirect('/enroll/fail');
        }
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
        $form = EForm::loadFromArray($form_design);

        $pretty_data['titles'] = $form->titles();
        $pretty_data['content'] = $form->filterData($data);
        foreach ($pretty_data['content'] as $k => $val) {
            if (is_array($val)) {
                $pretty_data['content'][$k] = join(', ', $val);
            }
        }

        return view('enroll.info', compact('pretty_data'));
    }

    public function themedefault()
    {
        return view('enroll.default');
    }
  

}
