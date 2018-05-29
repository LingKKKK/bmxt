<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRemarkToInvitecode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invite_codes', function (Blueprint $table) {
            $table->string('remark', 300)->comments('邀请码');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invite_codes', function (Blueprint $table) {
            $table->dropColumn('remark');
        });
    }
}
