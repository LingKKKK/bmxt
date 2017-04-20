<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignupDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signup_data' , function(Blueprint $table){
            $table->increments('id');

            $table->string('leader_name', 20)->comments('领队姓名');
            $table->string('leader_id', 20)->comments('领队身份证');
            $table->string('leader_sex', 20)->comments('领队性别');
            $table->string('leader_mobile', 20)->comments('领队电话');// 注册邮箱
            $table->string('leader_email', 20)->comments('领队电话'); // 注册手机
            $table->string('leader_pic', 1200)->comments('领队照片');

            $table->string('team_no', 50)->comments('队伍编号');

            $table->string('team_name', 50)->comments('队伍名称');
            $table->string('school_name', 50)->comments('学校或单位名称');
            $table->string('school_address', 200)->comments('学校地址');
            $table->string('competition_type', 50)->comments('赛事项目');
            $table->string('competition_group', 50)->comments('组别');

            $table->string('members', 1200)->comments('队员列表:json');

            $table->string('payment', 20)->comments('支付方式');

            $table->string('remark', 1200)->comments('备注');

            $table->string('data', 8000)->comments('数据');
            $table->string('origin_data', 1200)->comments('原始提交数据,备份');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('signup_data');
    }
}
