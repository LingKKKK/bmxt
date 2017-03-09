<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Enroll\Form;
use App\Enroll\Field;

class EnrollFormTest extends TestCase
{
    public function testCreateField()
    {
        $name = 'email';
        $type = 'text';
        $labeltext = '邮箱';
        $f = Field::fromAttribute($name, $type, $labeltext, ['datatype' => 'text']);
        $f->items(['k1' => 'v1', 'k2' => 'v2']);
        $f->required = true;
        $f->mutiple = true;
        $t = ($f->toArray());

        $expected = '{"name":"email","id":"input_email","type":"text","labeltext":"\u90ae\u7bb1","required":true,"attributes":{"datatype":"text","items":{"k1":"v1","k2":"v2"},"required":true,"mutiple":true}}';

        $this->assertJsonStringEqualsJsonString($expected, json_encode($f->toArray()));;
    }

    public function testCreateForm()
    {
        $form = Form::create(['verificationtype' => 'mobile', 'theme' => 'light', 'form_id' => '691']);

        $form->add('email', 'text', '邮箱', ['datatype' => 'email']);

        $form->add('select', 'select1', '选择', ['items' => ["k1" => "v1", "k2" => "v2"]]);

        $expected = '{"theme":"light",
                    "verificationtype":"mobile",
                    "form_id":"691",
                    "fields":{"email":{"name":"email","id":"input_email","type":"text","labeltext":"\u90ae\u7bb1","required":false,"attributes":{"datatype":"email"}},"select":{"name":"select","id":"input_select","type":"select1","labeltext":"\u9009\u62e9","required":false,"attributes":{"items":{"k1":"v1","k2":"v2"}}}}}';
        $this->assertJsonStringEqualsJsonString($expected, json_encode($form->toArray()));
    }

    public function testFormAddFieldException()
    {
        $form = Form::create(['verificationtype' => 'mobile', 'theme' => 'light', 'form_id' => '691']);
        $this->expectException(\Exception::class);

        $form->add('email', 'text', '邮箱', ['datatype' => 'email']);
        $form->add('email', 'text', '邮箱2', ['datatype' => 'email1']);

    }

    public function testValidator()
    {
        $form = Form::create(['verificationtype' => 'email', 'theme' => 'dark', 'from_id' => '001']);
        $form->add('mobile', 'text', '手机', ['datatype' => 'mobile', 'required' => true]);
        $form->add('email', 'text', '邮箱', ['datatype' => 'email', 'required' => true]);
        $form->add('username', 'text', '用户名', ['datatype' => 'text', 'required' => true]);

        $form->add('sex', 'radiolist', '性别', ['required' => true, 'items' => [1 => '女', 2 => '男']]);
        $form->add('usertype', 'select', '用户类型', ['required' => true, 'items' => [0 => '默认', 1 => '普通用户' , 2 => '会员', 3 => '管理员']]);
        $form->add('hobby', 'checkboxlist', '爱好', ['items' => [1 => '健身', 2 => '游泳', 3 => '吉他']]);

        $form_design = $form->toJson();
        $validator = $form->validateRules();

        $rules = $validator['rules'];
        $messages = $validator['messages'];

        $test_input = [
            'mobile' => '18511431517',
            'username'   => '姓名',
        ];

        $validator = app('validator')->make($test_input, $rules, $messages);

        $this->assertTrue($validator->fails());
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            $this->assertArrayHasKey('email', $errors);
            $this->assertEquals('[邮箱]不能为空!', head($errors['email']));

            $this->assertArrayHasKey('sex', $errors);
            $this->assertEquals('[性别]不能为空!', head($errors['sex']));
        }
    }

    public function testFormfilterData()
    {
        $form = Form::create(['verificationtype' => 'email', 'theme' => 'dark', 'from_id' => '002']);
        $form->add('mobile', 'text', '手机号', ['datatype' => 'mobile', 'required' => true]);
        $form->add('email', 'text', '手机号', ['datatype' => 'email', 'required' => true]);

        $form->add('sex', 'radiolist', '性别', ['required' => true, 'items' => [1 => '女', 2 => '男']]);
        $form->add('usertype', 'select', '用户类型', ['required' => true, 'items' => [0 => '默认', 1 => '普通用户' , 2 => '会员', 3 => '管理员']]);
        $form->add('hobby', 'checkboxlist', '爱好', ['items' => [1 => '健身', 2 => '游泳', 3 => '吉他', 5 => '吃饭']]);

        $input_data = [
            'mobile' => '18511431517',
            'email'  => 'wkp@kenrobot.com',
            'sex'    => [1],
            'usertype'  => [
                2,
            ],
            'hobby' => [
                1,
                5
            ],
        ];

        $content = $form->filterData($input_data);

        $this->assertArraySubset(['mobile' => '18511431517', 'hobby' => [ 1 => '健身', 5 => '吃饭']], $content);
    }

    public function testFieldGet()
    {
        $field = Field::fromAttribute('name1', 'select', '列表', ['datatype' => 'select', 'items' => [ 1 => '选项1', 2 => '选项2']]);

        $this->assertEquals('name1', $field->name);
        $this->assertEquals('input_'.$field->name, $field->id);
        $this->assertArraySubset([1 => '选项1'], $field->items);
    }

    
}
