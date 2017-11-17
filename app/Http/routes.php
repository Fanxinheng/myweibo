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

//后台登录
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){

	//后台登录主页面
	Route::get('/',"LoginController@index");

	//后台二维码生成
	Route::get('code','LoginController@code');

	//后台登录功能
	Route::post('login',"LoginController@login");
});




//后台主页面
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){

	//后台主页
	Route::resource('index','UserController');

	//后台管理员资源路由
	Route::resource('admins','AdminsController');

	//后台热门微博资源路由
	Route::resource('hot','HotController');

	//后台举报管理资源路由
	Route::resource('report','ReportController');

	//后台广告管理资源路由
	Route::resource('advert','AdvertController');

	//后台友情链接资源路由
	Route::resource('link','LinkController');

	//后台系统公告资源路由
	Route::resource('notice','NoticeController');

	//后台网站配置路由
	Route::get('config','ConfigController@edit');

});



