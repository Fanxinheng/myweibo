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

// 热门管理
Route::resource('/admin/index','Admin\HotController');
// 举报管理
Route::resource('/admin/destroy','Admin\NoticeController');
// 公告管理
route::resource('/admin/index','Admin\ReportController');



