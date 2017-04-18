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

            $table->string('team_name', 50)->comments('队伍名称');
            $table->string('school_name', 50)->comments('学校或单位名称');
            $table->string('competition_type')->comments('比赛类型');

            $table->string('leader_name', 20)->comments('领队姓名');
            $table->string('leader_mobile', 20)->comments('领队电话');
            $table->string('leader_email', 20)->comments('领队电话');

            $table->string('captain_name', 20)->comments('队长姓名');
            $table->string('captain_mobile', 20)->comments('队长电话');
            $table->string('captain_email', 50)->comments('队长邮箱');

            $table->string('members', 1200)->comments('队员列表');
            $table->string('remark', 1200)->comments('备注');
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
