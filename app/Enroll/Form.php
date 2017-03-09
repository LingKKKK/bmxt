<?php

namespace App\Enroll;

use InvalidArgumentException;
use Closure;
use Illuminate\Support\Collection;
use App\Enroll\Field;
use Illuminate\Contracts\Support\Arrayable;

class Form implements Arrayable
{
    protected $options = null;

    protected $default_options = [
        'theme' => 'default',
        'verificationtype' => 'captcha',
    ];

    protected $fields = null;
    public function __construct($options)
    {
        $this->fields = collect([]);
        $this->options = collect(array_merge($this->default_options, $options));
    }

    public static function create($options)
    {
        return new static($options);
    }

    public function add($name, $type = '', $labeltext = '', $attributes = [])
    {
        $field = null;
        if ($name instanceof Field) {
            $field = $name;
        } else {
            $field = Field::fromAttribute($name, $type, $labeltext, $attributes);
        }

        if ($this->fields->has($field->name)) {
            throw new \Exception("Duplicated Name:".$field->name);
        }

        $this->fields->put($field->name, $field);

        return $this;
    }

    public function set($name, $type = '', $labeltext = '', $attributes = [])
    {
        $field = null;
        if ($name instanceof Field) {
            $field = $name;
        } else {
            $field = Field::fromAttribute($name, $type, $labeltext, $attributes);
        }

        $this->fields->put($field->name, $field);

        return $this;
    }

    public function remove($name)
    {
        $this->fields->pull($name);

        return $this;
    }

    public function datakeys()
    {
        return $this->fields->keys()->toArray();
    }

    public function validateRules()
    {
        $rules = [];
        $messages = [];

        $this->fields->each(function($tag, $k) use(&$rules, &$messages)
        {
            $rule = [];
            if ($tag['required']) {
                $rule[] = 'required';
                $messages["$k.required"] = '['.$tag['labeltext'].']不能为空!';
            }


            if ($tag['datatype'] == 'email') {
               $rule[] = 'email';
               $messages["$k.email"] = '['.$tag['labeltext'].']格式不正确!';
            }

            if ($tag['datatype'] == 'mobile') {
                $rule[] = 'mobile';
                $messages["$k.mobile"] = '['.$tag['labeltext'].']格式不正确!';
            }

            if (! empty($rule)) {
                $rules[$k] = join('|', $rule); 
            }
        });

        // 配置校验规则
        if($this->verificationtype == 'captcha') {
            $rules['captcha'] = 'required|captcha';
            $messages['captcha.required'] = '验证码不能为空!';
            $messages['captcha.captcha'] = '验证码格式不正确!';
        }

        if ($this->verificationtype == 'email' || $this->verificationtype == 'mobile') {
            $rules['verificationcode'] = 'required|verificationcode';
            $messages['verificationcode.required'] = '验证码不能为空!';
            $messages['verificationcode.verificationcode'] = '验证码格式不正确!';
        }

        return compact('rules', 'messages');
    }

    public function titles()
    {
        return $this->fields->lists('labeltext', 'name')->toArray();
    }

    public function filterData($input)
    {
        $content = [];

        foreach ($this->fields as $name => $field) {
            $content[$name] = isset($input[$name]) ? $input[$name] : $name;

            switch ($field['type']) {
                case 'select':
                case 'radiolist':
                case 'checkboxlist':
                    $itemkeys = isset($input[$name]) ? (array)$input[$name] : [];
                    $content[$name] = array_only($field['items'], $itemkeys);
                    break;
                default:
                    $content[$name] = $input[$name];
                    break;
            }
        }

        return $content;
    }

    public function __set($property, $value)
    {
        if ($property == 'fields') {
            $this->fields = collect((array)$value);
        }

        $this->options->put($property, $value);
    }

    public function __get($property)
    {
        if ($property === 'fields') {
            return $this->fields;
        }

        if ($this->options->has($property)) {
            return $this->options->get($property);
        }
        // dd($property);
        throw new \Exception("$property doesn't exist");
    }


    public static function createField($name, $type, $labeltext, $attributes)
    {
        return Field::fromAttribute($name, $type, $labeltext, $attributes);
    }


    public static function loadFromArray($data)
    {
        $options = array_except($data, 'fields');
        $fields = array_get($data, 'fields');
        $fields = (array) $fields;

    
        $form = static::create($options);

        foreach ($fields as $val) {
            $form->add(Field::fromArray($val));
        }

        return $form;
    }

    public function toArray()
    {
        return array_merge($this->options->toArray(), 
            [
                'fields'    => $this->fields->toArray(),
            ]
            );
    }

    public function toJson()
    {
        return json_encode($this->toArray(), JSON_UNESCAPED_UNICODE);
    }

}