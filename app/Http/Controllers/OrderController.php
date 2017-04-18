<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order()
    {
        return view('order');
    }


    public function loadindex1()
    {
        return view('enroll/theme3');
    }

    public function payment()
    {
        return view('payment');
    }

    public function paymentLists()
    {
        $testData = [
      
            "order_no" => "23213213213213213",

            'goods' =>
            [
                [
                    "name" => "Head dawdwadawdawdwadwadwa",
                    "market_price" => 198.00,
                    "price" => 168.00,
                    "qty" => 1
                ],
                [
                    "name" => "Head 111111111111111111111",
                    "market_price" => 198.00,
                    "price" => 168.00,
                    "qty" => 1
                ]  
            ]
        ];

        return api_response(0, 'OK', $testData);
    }

    public function details()
    {
        return view('details');
    }
}
