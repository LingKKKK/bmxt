<?php

namespace App\Enroll;

class EnrollService
{

    public function parseConfig($form_design)
    {
        $fields = isset($form_design['fields']) ? $form_design['fields'] : [];
        $default_fields = isset($form_design['default_fields']) ? $form_design['default_fields'] : [];
        $verification = isset($form_design['verification']) ? $form_design['verification'] : [];

        $fieldlist = array_merge($default_fields,$fields,$verification );

        $config['theme'] = isset($form_design['theme']) ? $form_design['theme'] : 'default';
        $config['fieldlist'] = $fieldlist;
        //提取校验规则
        $validatorules = [];
        $validatormessages = [];

        foreach ($fieldlist as $k => $tag) {
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
                    $validatormessages["$k.captcha"] = $tag['labeltext'].' 校验错误';
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

        $config['validator.rules'] = $validatorules;
        $config['validator.messages'] = $validatormessages;

        //提取数据字段
        $config['datakeys'] =array_diff(array_merge(array_keys($default_fields), array_keys($fields)), ['verificationcode', 'captcha']);

        //提取验证码发送规则
        // mobile > email > captcha > '' 三者者必须有一个
        $config['verificationcode.driver'] = 'captcha';

        if (isset($default_fields['captcha'])) {
            $config['verificationcode.driver'] = 'captcha';
        }

        if (isset($default_fields['email'])) {
            $config['verificationcode.driver'] = 'email';
        }

        if (isset($default_fields['mobile'])) {
            $config['verificationcode.driver'] = 'mobile';
        }

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

        ];

        return $form_design;
    }

}