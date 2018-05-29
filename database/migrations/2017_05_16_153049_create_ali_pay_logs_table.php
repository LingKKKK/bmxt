<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAliPayLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ali_pay_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('out_trade_no', 100)->comments('商家单号');
            $table->string('trade_no', 100)->comments('交易单号(支付宝生成)');
            $table->decimal('buyer_pay_amount', 10, 2)->comments('用户支付金额');
            $table->string('buyer_logon_id', 50)->comments('付款账号');
            $table->string('buyer_user_id', 50)->comments('付款用户id');

            $table->string('open_id', 50)->comments('');
            $table->decimal('invoice_amount', 10, 2)->comments('账面／发票金额');
            $table->decimal('point_amount', 10, 2)->comments('这个不知道');
            $table->decimal('receipt_amount', 10, 2)->comments('实收金额');
            $table->timestamp('send_pay_date')->comments('支付时间');
            $table->decimal('total_amount', 10, 2)->comments('总金额');
            $table->string('trade_status', 50)->comments('支付结果');
            $table->string('attach', 50)->comments('attach');
            $table->string('data', 8000)->comments('交易数据');
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
        Schema::drop('ali_pay_logs');
    }
}
