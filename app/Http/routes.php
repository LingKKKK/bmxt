<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// Route::get('/success', 'SignupController@success');
// 导出数据
Route::get('/admin/export', 'MatchbjController@export');
Route::post('/admin/export', 'MatchbjController@doExportExcel');

// 登录注册
Route::get('/register', 'AuthController@register')->name('register');
Route::post('/register', 'AuthController@doRegister');
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@doLogin');
Route::any('/logout', 'AuthController@logout')->name('logout');


// 注册登录成功提示页面
Route::get('/successTips', 'MatchbjController@jumpPage');
// Route::get('/loginSuccess', 'AuthController@loginSuccessTips');information

// 填写信息/修改信息

Route::get('/', 'MatchbjController@information');
Route::get('/signup', 'MatchbjController@create')->name('enroll.create');
Route::get('/signup/{team_no}', 'MatchbjController@edit')->name('enroll.edit');
Route::post('/signup', 'MatchbjController@doSignup')->name('enroll.store');

// 修改成功 弹出提示页面
Route::get('/finish/{team_no}', 'MatchbjController@finish')->name('enroll.result');
//  信息展示页面
Route::get('/success', 'MatchbjController@success');

// 队伍名称检查
Route::post('/checkteamname', 'MatchbjController@checkName');

// 图形验证码
Route::get('/captcha/{config?}', 'UtilsController@captcha');
Route::post('/captcha/verify', 'UtilsController@verificationcode');

// 短信/邮件验证码
Route::post('/verificationcode/send', 'UtilsController@verificationcode');
Route::post('/verificationcode/verify', 'UtilsController@checkVerificationcode');
Route::post('/uploadimg', 'UtilsController@uploadImg');

// 用户远程认证接口
Route::post('/api/user/login', 'Api\UserController@login')->middleware('apiguard');
Route::post('/api/user/info', 'Api\UserController@userinfo')->middleware('apiguard');
