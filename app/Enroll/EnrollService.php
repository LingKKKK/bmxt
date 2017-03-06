<?php

namespace App\Enroll;

class EnrollService
{

    public function parseConfig($form_design)
    {
        $fields = isset($form_design['fields']) ? $form_design['fields'] : [];

        //规范化数据
        foreach ($fields as $k => $tag) {
            if (isset($tag['required']) && $tag['required']) {
                $fields[$k]['required'] = 'required';
            } else {
                unset($fields[$k]['required']);
            }

            if (isset($tag['checked']) && $tag['checked']) {
                $fields[$k]['checked'] = 'checked';
            } else {
                unset($fields[$k]['checked']);
            }

            if (isset($tag['multiple']) && $tag['multiple']) {
                $fields[$k]['multiple'] = 'multiple';
            } else {
                unset($fields[$k]['multiple']);
            }

            if (!isset($tag['id']) || !$tag['id']) {
                $fields[$k]['id'] = 'input_'.$tag['name'];
            }
        }

        //校验规则
        $validatorules = [];
        $validatormessages = [];


        $config['fields'] = $fields;
        $config['datakeys'] = array_keys($fields);
        $config['verificationtype'] = isset($form_design['verificationtype']) ? $form_design['verificationtype'] : 'captcha';
        $config['verificationtype'] = 'mobile';
        $config['theme'] = isset($form_design['theme']) ? $form_design['theme'] : 'default';


        foreach ($fields as $k => $tag) {
            $rule = [];

            if (isset($tag['required']) && $tag['required']) {
                $rule[] = 'required';
                $validatormessages["$k.required"] = $tag['labeltext'].'不能为空!';
            }

            if (isset($tag['datatype'])) {
                if ($tag['datatype'] == 'email') {
                   $rule[] = 'email';
                   $validatormessages["$k.email"] = $tag['labeltext'].' [邮件]格式不正确!';
                }

                if ($tag['datatype'] == 'mobile') {
                    $rule[] = 'mobile';
                    $validatormessages["$k.mobile"] = $tag['labeltext'].' [手机号]格式不正确!';
                }


                if ($tag['datatype'] == 'captcha') {
                    $rule[] = 'captcha';
                    $validatormessages["$k.captcha"] = $tag['labeltext'].' 校验错误!';
                }

                if ($tag['datatype'] == 'verificationcode') {
                    $rule[] = 'verificationcode';
                    $validatormessages["$k.verificationcode"] = $tag['labeltext'].' 验证错误!';
                }

            }

            if (! empty($rule)) {
                $validatorules[$k] = join('|', $rule); 
            }
        }

        // 配置校验规则
        if($config['verificationtype'] == 'captcha') {
            $validatorules['captcha'] = 'required|captcha';
            $validatormessages['captcha.required'] = '验证码不能为空!';
            $validatormessages['captcha.captcha'] = '验证码格式不正确!';
        } elseif ($config['verificationtype'] == 'mobile' || $config['verificationtype'] = 'email') {
            $validatorules['verificationcode'] = 'required|verificationcode';
            $validatormessages['verificationcode.required'] = '验证码不能为空!';
            $validatormessages['verificationcode.verificationcode'] = '验证码格式不正确!';
        } else {

        }

        $config['validator.rules'] = $validatorules;
        $config['validator.messages'] = $validatormessages;

        return $config;
    }

    public function getdemoFormDesign()
    {


        $form_design = [
            'fields' => [
                'username' => [
                    'type' => 'text',
                    'id' => 'username',
                    'name' => 'username', 
                    'labeltext' => '姓名',
                    'required' => true,
                ],
                'radio1' => [
                    'type' => 'radio',
                    'id'   => 'radio1',
                    'name' => 'radio1',
                    'labeltext' => '单选',
                    'required' => true,
                    'value' => '1',
                    'checked' => false,
                ],
                'chkbox1' => [
                    'type' => 'checkbox',
                    'id' => 'chkbox1',
                    'name' => 'chkbox1',
                    'labeltext' => '多选',
                    'required' => true,
                    'value' => '2',
                    'checked' => false,
                ],

                'select1' => [
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
                'radiolist' => [
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
                'checkboxlist' => [
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
            'default_fields' => [
                'email' => [
                    'id' => 'email',
                    'name' => 'email',
                    'type' => 'text',
                    'labeltext' => '邮箱',
                    'datatype' => 'email',
                ],

                'mobile' => [
                    'id' => 'mobile',
                    'name' => 'mobile',
                    'type' => 'text',
                    'labeltext' => '手机号',
                    'datatype' => 'mobile',
                    'required' => 'required',
                ],
            ],
            'verification' => [
                'verificationcode' => [
                    'id' => 'verificationcode',
                    'name' => 'verificationcode',
                    'type' => 'verificationcode',
                    'labeltext' => '验证码',
                    'datatype' => 'verificationcode',
                ],
                'captcha' => [
                    'id'    => 'captcha',
                    'name'  => 'captcha',
                    'type'  => 'text',
                    'datatype' => 'captcha',
                    'labeltext' => '验证码',
                ],
            ],
            'theme' => 'black',
            'verificationcode' => 'email',

        ];

        return $form_design;
    }

    
}