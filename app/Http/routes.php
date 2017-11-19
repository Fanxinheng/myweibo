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


//====================================前台路由==========================================//



//前台注册
Route::group(['prefix'=>'home','namespace'=>'Home'],function(){

	//注册前首页全部微博
	Route::get('/admin','AdminController@index');

	//热门微博列表
	Route::get('/hot','AdminController@hot');

	//热门微博列表
	Route::get('/hot','AdminController@hot');

	//明星微博列表
	Route::get('/start','AdminController@start');

	//社会微博列表
	Route::get('/society','AdminController@society');

	//情感微博列表
	Route::get('/feel','AdminController@feel');

	//科技微博列表
	Route::get('/it','AdminController@it');
	




	




	//微博详情页
	Route::get('/show/{id}','ShowController@show');


	//微博转发页面
	Route::get('/forward/{id}','ForwardController@create');

	//微博转发功能
	Route::post('/forward/store/','ForwardController@store');


	//微博评论页面
	Route::get('/replay/{id}','ReplayController@create');

	//微博转发功能
	Route::post('/replay/store/','ReplayController@store');


	//微博点赞
	Route::get('/point/{id}','PointController@point');







	//注册页面
	Route::get('/register','RegisterController@index');

	Route::post('/register','RegisterController@verification');

	//前台短信验证
	Route::post('/code','CodeController@send');

	//完善个人信息
	Route::get('/details','DetailsController@index');

});


Route::group(['prefix'=>'home','namespace'=>'Home','middleware'=>'home'],function(){

	//前台登录后首页
	Route::get('/login','LoginController@index');

});



//==========================后台路由===================================//

//后台登录
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){

	//后台登录主页面
	Route::get('/',"LoginController@index");

	//后台二维码生成
	Route::get('/code','LoginController@code');

	//后台登录功能
	Route::post('/login',"LoginController@login");
});




//后台主页面
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){

	//后台主页
	Route::resource('/index','UserController');

	//后台管理员资源路由
	Route::resource('/admins','AdminsController');

	//后台热门微博资源路由
	Route::resource('/hot','HotController');

	//后台举报管理资源路由
	Route::resource('/report','ReportController');

	//后台广告管理资源路由
	Route::resource('/advert','AdvertController');

	//后台友情链接资源路由
	Route::resource('/link','LinkController');

	//后台系统公告资源路由
	Route::resource('/notice','NoticeController');

	//后台网站配置路由
	Route::get('/config','ConfigController@edit');

	//后台网站配置修改
	Route::post('/config/update','ConfigController@update');

	//后台网站LOGO配置修改
	Route::get('/logo','ConfigController@logo');

	//后台网站LOGO配置修改功能
	Route::post('/logo/dologo','ConfigController@dologo');

	//后台加载发送系统消息页面路由
	Route::get('/news/{id}','NewsController@add');

	//后台执行发送系统消息功能路由
	Route::post('/send/{id}','NewsController@send');
	

});



