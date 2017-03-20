<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PreviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('preview');
    }

    public function order()
    {
        return view('order');
    }

    public function chapter()
    {
        $testData = [
            "第一章 历史由来" => [
                [
                    "name" => "1.1 arduino起源",
                    "time" => "56:10",
                    "buy" => "buy"
                ],[
                    "name" => "1.2 arduino cc 和arduino org的爱恨情仇",
                    "time" => "12:10",
                    "buy" => "unbuy"
                ]
            ],
            "第二章 常用硬件" => [
                [
                    "name" => "1.1 arduino起源",
                    "time" => "56:10",
                    "buy" => "unbuy"
                ],[
                    "name" => "aaaaaaa",
                    "time" => "12:10",
                    "buy" => "buy"
                ],[
                    "name" => "bbbbbb",
                    "time" => "12:10",
                    "buy" => "unbuy"
                ]
            ],
            "第三章 常用硬件" => [
                [
                    "name" => "1.1 arduino起源",
                    "time" => "56:10",
                    "buy" => "buy"
                ],[
                    "name" => "ccccccc",
                    "time" => "12:10",
                    "buy" => "buy"
                ],[
                    "name" => "ddddddd",
                    "time" => "12:10",
                    "buy" => "unbuy"
                ],[
                    "name" => "eeeeeee",
                    "time" => "12:10",
                    "buy" => "unbuy"
                ]
            ]
        ];

        return api_response(0, 'OK', $testData);
    }

    public function intro()
    {
        $testData = [
            "intro" => "在这个时代，数据越来越重要，数据=金钱，已经成为定理。本课程让你初步掌握使用Python进行数据采集，以及如何从TXT和PDF文档中读取数据，掌握本课程，创造属于你的价值。",
            "price" => "    158 RMB",
            "recommend" => "★★★★★",
            "tech_sup" => [
                "Scratch" => "",
                "Arduino" => "",
                "啃萝卜" => "",
            ]
        ];
        return api_response(0, 'OK', $testData);
    }

    public function recommend()
    {
        $testData =[
            [
            "img" => "",
            "name" => "SpringBoot进阶之Web进阶",
            "info" => "初级 · 1人在学",
            ],[
            "img" => "",
            "name" => "SpringBoot进阶之Web进阶",
            "info" => "初级 · 2人在学",
            ],[
            "img" => "",
            "name" => "SpringBoot进阶之Web进阶",
            "info" => "初级 · 3人在学",
            ],[
            "img" => "",
            "name" => "SpringBoot进阶之Web进阶",
            "info" => "初级 · 4人在学",
            ]
        ];
        return api_response(0, 'OK', $testData);
    }

}
