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


//==========================后台路由===================================//

//后台登录主页面
Route::get('admin',"Admin\LoginController@index");

//后台登录功能
Route::get('admin/login',"Admin\LoginController@login");



//后台主页面
//中间件控制
Route::group([],function(){

	//后台主页
	Route::resource('admin/index','Admin\UserController');

	//后台管理员资源路由
	Route::resource('admin/admins','Admin\AdminsController');

	//后台热门微博资源路由
	Route::resource('admin/hot','Admin\HotController');

	//后台举报管理资源路由
	Route::resource('admin/report','Admin\ReportController');

	//后台广告管理资源路由
	Route::resource('admin/advert','Admin\AdvertController');

	//后台友情链接资源路由
	Route::resource('admin/link','Admin\LinkController');

	//后台系统公告资源路由
	Route::resource('admin/notice','Admin\NoticeController');

	//后台网站配置路由
	Route::get('admin/config','Admin\ConfigController@edit');

});


