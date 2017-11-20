<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEnrollUserIdToCompetitionTeam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('competition_teams' , function(Blueprint $table){
            $table->integer('enroll_user_id')->comments('报名人');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('competition_teams' , function(Blueprint $table){
            $table->dropColumn('enroll_user_id');
        });
    }
}
