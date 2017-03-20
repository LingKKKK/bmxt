<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('course');
    }


    public function lists()
    {
        $testData = [
          [
            "img" => "",
            "name" => "课程名称",
            "price" => "$:  198",
            "iden" => "ZZZ",
            "info" => "V在这个时代，数据越来越重要，数据=金钱，已经成为定理。本课程让你初步掌握使用Python进行数据采集，以及如何从TXT和PDF文档中读取数据，掌握本课程，创造属于你的价值"
          ],[
            "img" => "",
            "name" => "课程名称",
            "price" => "$:  198",
            "iden" => "ZZZ",
            "info" => "V在这个时代，数据越来越重要，数据=金钱，已经成为定理。本课程让你初步掌握使用Python进行数据采集，以及如何从TXT和PDF文档中读取数据，掌握本课程，创造属于你的价值"
          ],[
            "img" => "",
            "name" => "课程名称",
            "price" => "$:  198",
            "iden" => "ZZZ",
            "info" => "V在这个时代，数据越来越重要，数据=金钱，已经成为定理。本课程让你初步掌握使用Python进行数据采集，以及如何从TXT和PDF文档中读取数据，掌握本课程，创造属于你的价值"
          ],[
            "img" => "",
            "name" => "课程名称",
            "price" => "$:  198",
            "iden" => "ZZZ",
            "info" => "V在这个时代，数据越来越重要，数据=金钱，已经成为定理。本课程让你初步掌握使用Python进行数据采集，以及如何从TXT和PDF文档中读取数据，掌握本课程，创造属于你的价值"
          ],[
            "img" => "",
            "name" => "课程名称",
            "price" => "$:  198",
            "iden" => "ZZZ",
            "info" => "V在这个时代，数据越来越重要，数据=金钱，已经成为定理。本课程让你初步掌握使用Python进行数据采集，以及如何从TXT和PDF文档中读取数据，掌握本课程，创造属于你的价值"
          ],[
            "img" => "",
            "name" => "课程名称",
            "price" => "$:  198",
            "iden" => "ZZZ",
            "info" => "V在这个时代，数据越来越重要，数据=金钱，已经成为定理。本课程让你初步掌握使用Python进行数据采集，以及如何从TXT和PDF文档中读取数据，掌握本课程，创造属于你的价值"
          ]
        ];

        return api_response(0, 'OK', $testData);
    }

}
