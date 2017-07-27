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
        // 比赛
        Schema::create('competitons', function(Blueprint $table) {
            $table->increments('id');
            $table->increments('name')->comments('比赛名称');
            $table->string('remark', 1500)->comments('比赛介绍')
        });


        // 比赛项目
        Schema::create('competion_events', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('event_group')->comments('赛项分组');
            $table->integer('parent_id')->comments('上级类别ID');
            $table->string('name', 50)->comments('名称');
            $table->string('description', 1500)->comments('描述');
        });

        // 队伍
        Schema::create('competion_teams' , function(Blueprint $table){
            $table->increments('id');


            $table->string('invitecode', 50)->comments('邀请码');

            $table->string('team_no', 50)->comments('队伍编码');
            $table->string('team_name', 100)->comments('队伍名称');
            $table->string('competition_event_id')->comments('比赛项目');

            // 联系人
            $table->string('contact_name', 50)->comments('联系人姓名');
            $table->string('contact_mobile', 50)->comments('联系电话');
            $table->string('contact_email', 50)->comments('联系人邮箱');
            $table->string('contact_remark', 50)->comments('备注');

            // 发票
            $table->string('invoice_title', 50)->comments('开票抬头');
            $table->string('invoice_code', 50)->comments('统一社会信用代码');
            $table->string('invoice_money', 50)->comments('开票金额（单位：元）');
            $table->string('invoice_type', 50)->comments('发票明细');
            $table->string('invoice_mail_address', 100)->comments('收件地址');
            $table->string('invoice_mail_recipients', 20)->comments('收件人姓名');
            $table->string('invoice_mail_mobile', 30)->comments('收件人联系电话');
            $table->string('invoice_mail_email', 100)->comments('收件人邮箱');
            $table->string('invoice_remark', 1500)->comments('发票邮寄备注');


            $table->timestamps();

            $table->uniqute('team_no');
            $table->foreign('competition_event_id')->references('id')->on('competions_events');

        });

        Schema::create('competion_team_members', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('team_id')->comments('队伍id'); //
            $table->string('type', 20)->comments('成员类型: 领队,指导教师,队长,队员');

            // 基本信息
            $table->string('name', 50)->comments('名字');
            $table->string('mobile', 30)->comments('手机号码');
            $table->string('email', 100)->comments('邮箱');
            $table->string('idcard_type', 50)->comments('证件类型: 身份证,护照');
            $table->string('idcard_no', 50)->comments('证件号码:');
            $table->string('nation', 30)->comments('民族');
            $table->tinyInteger('sex')->comments('性别');
            $table->string('birthday', 20)->comments('生日');         // 年龄生日二选一，默认生日
            $table->tinyInteger('age')->unsigned()->comments('年龄'); // 可选
            $table->mediumInteger('height')->comments('身高:cm');
            $table->string('photo_url', 50)->comments('照片地址');

            //其他资料
            $table->string('vocation', 50)->comments('职业');
            $table->string('work_unit', 50)->comments('工作单位');
            $table->string('register_address', 50)->comments('户籍地址');
            $table->string('home_address', 50)->comments('现居详情');

            $table->string('remark', 1500)->comments('备注');
            $table->string('profiles', 2000)->comments('其他资料');

            $table->timestamps();

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
