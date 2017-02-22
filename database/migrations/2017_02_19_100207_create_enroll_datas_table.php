<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrollDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enroll_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('activity_id')->comment('注册活动ID');
            $table->string('email', 60)->comment('邮箱:用于通知回执');
            $table->string('phone', 20)->comment('手机:用于回执通知');
            $table->string('data')->comment('注册数据');
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
        Schema::drop('enroll_datas');
    }
}
