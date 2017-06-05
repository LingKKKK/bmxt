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

//
Route::get('/pay/test', 'AliPayController@test');

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
