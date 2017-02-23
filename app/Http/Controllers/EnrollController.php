<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Enroll\Activity as ActivityModel;
use App\Enroll\EnrollData as EnrollDataModel;
use Mews\Captcha\Captcha;
use App\Enroll\EnrollDataRepository;
use App\Enroll\SMS;
use App\Enroll\VerifyCode;
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

    public function index($id, Request $request)
    {
        $id = intval($id);
        $act = $this->enrollrepo->getActivity($id);
        if (!$act) {
            abort(404);
        }

        $form_design = $act['form_design'];
      

        return view('enroll.theme1', compact('form_design','id'));
    }

    public function doEnroll($id, Request $request, SMS $sms)
    {
        $id = intval($id);
        $act = $this->enrollrepo->getActivity($id);
        if (empty($act)) {
            abort(404);
        }

        $capacha = $request->input('capacha');
        $ret = captcha_check($capacha);

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

            if (!empty($enrolldata['phone'])) {
                $sms->sendVerifycode($enrolldata['phone'], rand(100000,999999));
            }

            return redirect('/enroll/success?enrollid='.$endata->id);
        } else {
            return redirect('/enroll/fail');
        }
    }

    public function test(\App\Enroll\VerifyCode $verifycode, Request $request)
    {
       $act = $request->input('act', '');
       if ($act == 'g') {
          $code = $verifycode->getCode();
          return $code;
       }

       if ($act == 'v') {
           $code = $request->input('code', '');
           $ret = $verifycode->verifyCode($code);
           dd($ret);
       }
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

    /**
     * 获取验证码
     */
    public function getCaptcha(Captcha $captcha, $config = 'default')
    {
        return $captcha->create($config);
    }

    public function getVerifyCode(Request $request, VerifyCode $verfiycode, SMS $sms)
    {

        $phone = $request->input('phone', '');
        $code = $verfiycode->getCode();
        if (empty($code) || empty($phone)) {
            return api_response(0, '发送失败');
        }

        $sms->sendVerifycode($phone, $code);

        

        return api_response(0, '发送成功');
    }

}
