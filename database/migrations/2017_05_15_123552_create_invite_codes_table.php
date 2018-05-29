<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInviteCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invite_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 300)->comments('邀请码');
            $table->integer('enroll_id')->comments('注册');
            $table->string('group', 100)->comments('分组');
            $table->timestamp('used_time')->nullable()->comments('使用时间');
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
        Schema::drop('invite_codes');
    }
}
