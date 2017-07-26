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

//  报名页面
Route::get('/', 'SignupController@signup');
Route::post('/signup', 'SignupController@doSignup');
Route::get('/success', 'SignupController@success');
Route::get('/excel', 'SignupController@doExportExcel');
Route::get('/admin/export', 'SignupController@export');
Route::post('/admin/export', 'SignupController@doExportExcel');
// 报名系统查询
Route::get('/search', 'SignupController@search');
Route::post('/search', 'SignupController@doSearch');
// 行程系统
Route::get('/scheduling', 'SignupController@scheduling');
Route::post('/scheduling', 'SignupController@doScheduling');
Route::get('/plan', 'SignupController@plan');
Route::post('/plan', 'SignupController@doPlan');
Route::get('/showTrip', 'SignupController@showTrip');
// 行程系统查询
Route::get('/plan/export', 'SignupController@planExport');
Route::post('/plan/export', 'SignupController@planExportExcel');


//查询 提交查询信息进行查询
Route::get('/searchbj', 'MatchbjController@search');
Route::post('/searchbj', 'MatchbjController@doSearch');
// 填写信息/修改信息
Route::get('/matchbj', 'MatchbjController@signup');
Route::post('/matchbj', 'MatchbjController@doSignup');
// 修改成功 弹出提示页面
Route::get('/finish', 'MatchbjController@finish');



// 队伍名称检查
Route::post('/checkteamname', 'SignupController@checkName');


// 支付宝支付接口
Route::post('/getpayqrcode', 'UtilsController@getPayQrcode');
// 邀请码验证
Route::post('/checkinvitecode', 'UtilsController@checkInvitecode');
// 查询订单，参数 invitecode
Route::post('/pay/queryorder', 'UtilsController@queryOrderStatus');
//二维码显示
Route::get('/qrcodeimg.svg', 'UtilsController@qrcodeimg');

// 图形验证码
Route::get('/captcha/{config?}', 'UtilsController@captcha');
Route::post('/captcha/verify', 'UtilsController@verificationcode');

// 短信/邮件验证码
Route::post('/verificationcode/send', 'UtilsController@verificationcode');
Route::post('/verificationcode/verify', 'UtilsController@checkVerificationcode');
Route::post('/uploadimg', 'UtilsController@uploadImg');




Route::get('/tttt', 'MatchbjController@test');