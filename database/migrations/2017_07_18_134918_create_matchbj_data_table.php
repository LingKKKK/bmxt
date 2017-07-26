<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchbjDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bejing_teams' , function(Blueprint $table){
            $table->increments('id');

            $table->string('team_no', 50)->comments('队伍编码');
            $table->string('invitecode', 50)->comments('邀请码');
            $table->string('team_name', 50)->comments('队伍名称');
            $table->string('competition_name', 50)->comments('赛事项目');
            $table->string('competition_type', 50)->comments('子赛项');
            $table->string('competition_group', 1200)->comments('组别');
            $table->string('vocation', 50)->comments('职业');
            
            $table->string('photo', 50)->comments('登记照');
            $table->string('billing_header', 50)->comments('开票抬头');
            $table->string('credit_code', 50)->comments('统一社会信用代码');
            $table->string('billing_money', 50)->comments('开票金额');
            $table->string('billing_details', 50)->comments('开票明细');
            $table->string('receive_address', 50)->comments('收件地址');
            $table->string('contact_name', 50)->comments('联系人姓名');
            $table->string('contact_tel', 50)->comments('联系电话');
            $table->string('contact_mail', 50)->comments('联系人邮箱');
            $table->string('contact_remarks', 50)->comments('备注');
            $table->string('contact_name_info', 50)->comments('联系人姓名');
            $table->string('contact_tel_info', 50)->comments('联系电话');
            $table->string('contact_mail_info', 50)->comments('联系人邮箱');
            $table->string('contact_remarks_info', 50)->comments('备注');

            $table->string('members', 1200)->comments('队员列表:json');

            $table->string('data', 8000)->comments('数据');
            $table->string('origin_data', 1200)->comments('原始提交数据,备份');

            $table->uniqute('team_no');
            $table->timestamps();
        });

        Schema::create('team_members', function(Blueprint $table) {
            $table->increments('id');
            $table->string('type', 20)->comments('成员类型: 领队,指导教师,队长,队员');
            $table->integer('team_id')->comments('队伍id'); //
            $table->string('name', 50)->comments('名字');
            $table->string('mobile', 50)->comments('手机号码');
            $table->string('email', 100)->comments('邮箱');
            $table->string('idcard_type', 50)->comments('证件类型: 身份证,护照');
            $table->string('idcard_no', 50)->comments('证件号码:');
            $table->string('nation', 30)->comments('民族');
            $table->tinyInteger('sex')->comments('性别');
            $table->tinyInteger('age')->unsigned()->comments('年龄');
            $table->string('birthday', 20)->comments('生日');

            $table->mediumInteger('height')->comments('身高:cm');
            $table->string('work_unit', 50)->comments('工作单位');
            $table->string('register_address', 50)->comments('户籍地址');
            $table->string('home_address', 50)->comments('现居详情');
            
            $table->string('remarks', 1500)->comments('备注');
            $table->string('profiles', 2000)->comments('其他资料');


            $table->foreign('team_id')->references('id')->on('bejing_teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('matchbj_data');
    }
}
