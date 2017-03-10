<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('province_name', 50);
        });

        Schema::create('cities', function(Blueprint $table){
            $table->increments('id');
            $table->integer('province_id');
            $table->string('city_name');
        });

        Schema::create('districts', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('city_id');
            $table->string('district_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('provinces');
        Schema::drop('cities');
        Schema::drop('districts');
    }
}
