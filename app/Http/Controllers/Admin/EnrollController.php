<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Enroll\Activity as ActivityModel;

class EnrollController extends Controller
{
    public function index()
    {
        return ActivityModel::all();
    }

    public function createActivity(Request $request)
    {
        $input = $request->only(['act_name', 'start_time', 'end_time', 'remark', 'form_design']);

        $act = ActivityModel::create($input);
    }
}
