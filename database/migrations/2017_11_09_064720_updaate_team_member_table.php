<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdaateTeamMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('competition_team_members', function(Blueprint $table) {
            $table->string('headmaster', 300)->comments('学校校长姓名');
            $table->string('school', 300)->comments('学校');
            $table->string('class', 300)->comments('班级');
            $table->string('guarder', 300)->comments('监护人姓名');
            $table->string('relation', 300)->comments('关系');
        });

        Schema::table('competition_teams' , function(Blueprint $table){
            $table->string('invoice_detail', 300)->comments('发票明细');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('competition_team_members', function(Blueprint $table) {
            $table->dropColumn('headmaster');
            $table->dropColumn('school');
            $table->dropColumn('class');
            $table->dropColumn('guarder');
            $table->dropColumn('relation');
        });

        Schema::table('competition_teams' , function(Blueprint $table){
            $table->dropColumn('invoice_detail');
        });
    }
}
