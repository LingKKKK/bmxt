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

Route::get('/', 'HomeController@index');

// 认证路由...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// 注册路由...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// 后台管理
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::get('/', 'IndexController@index');
    Route::get('/activity/list', 'ActivityController@index');
    Route::get('/activity/create', 'ActivityController@create');
    Route::post('/activity/create', 'ActivityController@store');
    Route::get('/activity/config/{id}', 'ActivityController@config')->where('id', '[0-9]+');
    Route::post('/activity/editform/{id}', 'ActivityController@editForm')->where('id', '[0-9]+');
    Route::post('/activity/addfield/{id}', 'ActivityController@addField')->where('id', '[0-9]+');
    
    Route::get('/enrolldata/{id}', 'ActivityController@enrolldata')->where('id', '[0-9]+');

});

// 图形验证码
Route::get('/captcha/{config?}', 'UtilsController@captcha');
Route::post('/captcha/verify', 'UtilsController@verificationcode');

// 短信/邮件验证码 
Route::post('/verificationcode/send', 'UtilsController@verificationcode');
Route::post('/verificationcode/verify', 'UtilsController@checkVerificationcode');

// 报名前台页面
Route::any('/enroll/info', 'EnrollController@info');
Route::any('/enroll/theme/default', 'EnrollController@themedefault');

Route::get('/enroll/{id}', 'EnrollController@index');
Route::post('/enroll/{id}', 'EnrollController@doEnroll')->where('id', '[0-9]+');

Route::get('/enrolldev/{id}', 'EnrollController@enrolldev');
