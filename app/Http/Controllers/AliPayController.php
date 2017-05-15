<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Kenrobot\AliPay\AliPayDemo;

class AliPayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {
        $alipay = new AliPayDemo();
        $url = $alipay->getPayUrl();
        dd($url);


    }
}
