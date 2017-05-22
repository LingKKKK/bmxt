<?php

namespace Kenrobot\AliPay\Models;

use Illuminate\Database\Eloquent\Model;

class AliPayLog extends Model
{
    protected $table = 'ali_pay_logs';

    protected $fillable = ['out_trade_no', 'trade_no', 'buyer_pay_amount', 'buyer_logon_id', 'buyer_user_id', 'open_id', 'invoice_amount', 'point_amount', 'receipt_amount',
                            'send_pay_date', 'total_amount', 'trade_status', 'attach', 'data'];
}

