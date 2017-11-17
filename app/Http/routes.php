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

Route::get('/', function () {
    return view('welcome');
});


//注册前首页
Route::resource('/home/admin','Home\AdminController');

//注册页面
Route::resource('/home/register','Home\RegisterController');

//登录页面
Route::resource('/home/login','Home\LoginController');