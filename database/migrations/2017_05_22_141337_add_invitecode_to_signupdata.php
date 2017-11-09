<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInvitecodeToSignupdata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('signup_data', function (Blueprint $table) {
            $table->string('invitecode', 50)->comments('邀请码');
            // $table->string('team_no', 50)->comments('队伍编号');
            $table->string('out_trade_no',  50)->comments('支付单号');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('signup_data', function (Blueprint $table) {
            $table->dropColumn('invitecode');
            // $table->dropColumn('team_no');
            $table->dropColumn('out_trade_no');
        });
    }
}
