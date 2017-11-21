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

//前台注册
Route::group(['prefix'=>'home','namespace'=>'Home'],function(){

	//注册前登录首页
	Route::get('admin','AdminController@index');

	//注册跳登录页面
	Route::post('admin','AdminController@alog');

	//登录时验证手机号是否已注册
	Route::post('admin/phones','AdminController@phone');

	//忘记密码页面
	Route::get('admin/find','AdminController@find');


	//注册页面
	Route::get('register','RegisterController@index');

	//注册时验证手机号是否存在
	Route::get('register/phone','RegisterController@verification');

	//检验验证码是否正确
	Route::get('register/code','RegisterController@code');



	//前台短信验证
	Route::post('code','CodeController@send');

	
});


Route::group(['prefix'=>'home','namespace'=>'Home','middleware'=>'home'],function(){

	//前台登录后首页
	Route::get('login','LoginController@index');

	//检测手机号是否已注册
	Route::get('pho','LoginController@pho');

	//检测密码是否与数据库一致
	Route::get('pass','LoginController@pass');

	//检测昵称是否存在,存在跳到首页,不存在跳到个人信息页
	Route::post('nick','LoginController@nick');


	//完善个人信息
	Route::get('details','DetailsController@index');

	//检验昵称是否存在
	Route::get('details/uname','DetailsController@uname');

	//检验邮箱是否存在
	Route::get('details/email','DetailsController@email');

	//把个人信息存入到数据库并跳转到首页
	Route::post('details/deposit','DetailsController@deposit');

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
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'admin'],function(){

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



