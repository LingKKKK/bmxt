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
Route::any('/enroll/test', 'EnrollController@test');
Route::any('/enroll/info', 'EnrollController@info');
Route::any('/enroll/success', 'EnrollController@info');
Route::any('/enroll/fail', 'EnrollController@fail');
Route::get('/enroll/{id}', 'EnrollController@index');
Route::post('/enroll/{id}', 'EnrollController@doEnroll');



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
    Route::get('/activity/list', 'EnrollController@index');
    Route::get('/activity/create', 'EnrollController@create');
    Route::post('/activity/create', 'EnrollController@store');
    Route::get('/activity/config', 'EnrollController@config');
});

//验证码
Route::get('/capacha/{config?}', 'EnrollController@getCaptcha');
Route::get('/auth/verifycode', 'EnrollController@getVerifyCode');