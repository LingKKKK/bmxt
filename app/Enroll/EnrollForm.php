<?php

namespace App\Enroll;

use InvalidArgumentException;

class EnrollForm
{

    protected $fields = [];

    protected $config = ['theme' => 'default', 'verificationtype' => 'captcha'];

    public function __construct($config)
    {
        $this->config = array_merge($this->config, $config);
    }

    public static function parse($json)
    {
        $config = array_only($json, ['theme', 'verificationtype']);
        $form = new static($config);

        foreach ($json['fields'] as $elem) {
            $form->addField($elem);
        }

        return $form;
    }

    public static function create()
    {
        $form = new static([]);
        $form->addTextField('mobile', '手机号', true,['datatype' => 'mobile']);
        $form->addTextField('email', '邮箱', true, ['datatype' => 'email']);
        return $form;
    }

    public function addField($elem)
    {
        if (! isset($elem['name'])) {
            throw new \Exception('[name] field is not specified');
        }

        if (! isset($elem['type'])) {
            throw new \Exception('[type] field is not specified');
        }

        if (! isset($elem['labeltext'])) {
            throw new \Exception('[type] field is not specified');
        }

        if (! isset($elem['required'])) {
            throw new \Exception("[required] field is not specified");
        }

        !isset($elem['id']) || $elem['id'] = 'input_'.$elem['name'];

        $elem['required'] = !!$elem['required'];

        if (isset($this->fields[$elem['name']])) {
            throw new \Exception("该字段已经存在".$elem['name']);
        }

        $this->fields[$elem['name']] = $elem;

        return $this;
    }

    public function removeField($name)
    {
        unset($this->config[$name]);
        return $this;
    }

    public function getField($name)
    {
        return isset($this->fields[$name]) ? $elem : null;
    }

    public function addTextField($name, $labeltext, $required = false, $datatype = null)
    {
        $elem = array();
        $elem['name'] = $name;
        $elem['labeltext'] = $labeltext;
        $elem['required'] = $required;
        $elem['type'] = 'text';

        if (!empty($datatype)) {
            $elem['datatype'] = $datatype;
        }

        return $this->addField($elem);
    }

    public function addRadioList($name, $labeltext, $required = false, $items = [])
    {
        $elem = array();
        $elem['name'] = $name;
        $elem['labeltext'] = $labeltext;
        $elem['required'] = $required;
        $elem['type'] = 'radiolist';
        $elem['items'] = (array) $items;

        return $this->addField($elem);
    }

    public function addCheckboxList($name, $labeltext, $required = false, $items = [])
    {
        $elem = array();
        $elem['name'] = $name;
        $elem['labeltext'] = $labeltext;
        $elem['required'] = $required;
        $elem['type'] = 'checkboxlist';
        $elem['items'] = (array) $items;

        return $this->addField($elem);
    }

    public function addSelect($name, $labeltext, $required = false, $multiple = false, $items = [])
    {
        $elem = array();
        $elem['name'] = $name;
        $elem['labeltext'] = $labeltext;
        $elem['required'] = $required;
        $elem['type'] = 'select';
        $elem['multiple'] = $mutiple;
        $elem['items'] = (array) $items;

        return $this->addField($elem);
    }

    public function toArray()
    {
        $arr = [
            'fields' => $this->fields,
        ];

        $formData = array_merge($this->config, $arr);
        return $formData;
    }

    public function toJson()
    {
        return json_encode($this->toArray(), JSON_UNESCAPED_UNICODE);
    }

}