<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_data', function(Blueprint $table){
            $table->increments('id');
            $table->string('team_no', 200)->comments('队伍编号');
            $table->string('trip_type', 200)->comments('行程类型:到达,返程');

            $table->string('vehicle_type', 200)->comments('交通工具');
            $table->string('vehicle_number', 200)->comments('航班/车次');

            $table->string('start_date', 200)->comments('出发日期');
            $table->string('start_time', 200)->comments('出发时间');
            $table->string('start_place', 2000)->comments('出发地点');

            $table->string('arrive_date', 200)->comments('到达日期');
            $table->string('arrive_time', 200)->comments('到达时间');
            $table->string('arrive_place', 2000)->comments('到达地点');

            $table->string('vehicle_time', 200)->comments('起飞/发车时间');

            $table->string('people_number', 200)->comments('人数');
            
            $table->string('contact_name', 200)->comments('联系人');
            $table->string('contact_mobile', 200)->comments('联系电话');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trip_data');
    }
}
