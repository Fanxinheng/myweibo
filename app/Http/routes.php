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

//==========================前台路由===================================//
//前台个人
Route::group(['prefix'=>'home','namespace'=>'Home'],function(){

	//====================页面==========================//
	
	//个人主页
	Route::get('user','UserController@index');

	//系统消息
	Route::get('message','UserController@message');

	//个人相册页面
	Route::resource('photo','UserController@photo');

	//个人的点赞页面
	Route::get('point','UserController@point');

	//个人微博的评论
	Route::get('replay','UserController@replay');

	//个人的转发页面
	Route::get('forward','UserController@forward');

	//关注页面
	Route::resource('attention','AttentionController');

	//粉丝页面
	Route::resource('fans','FansController');

	//======================功能=============================//

	//删除微博
	Route::get('delete/{id}','UserController@delete');

	//删除评论
	Route::get('replay/delete/{id}','UserController@replayDelete');

	//点赞微博
	Route::get('pointFun','UserController@pointFun');

	//微博评论
	Route::get('type','UserController@type');

	//微博转发
	Route::get('ward','UserController@ward');

	//删除全部图片
	Route::post('photo/delete','UserController@photoDelete');


	
});

//前台他人个人
Route::group(['prefix'=>'home/other','namespace'=>'Home'],function(){

	//======================页面===============================//
	
	//个人主页
	Route::get('user/{id}','OtherUserController@index');

	//个人相册
	Route::resource('photo','OtherUserController@photo');

	//微博评论
	Route::get('type','OtherUserController@type');

	//关注
	Route::get('attention/{id}','OtherAttentionController@index');

	//粉丝
	Route::get('fans/{id}','OtherFansController@index');

	//========================功能==================================//

	//删除评论
	Route::get('replay/delete/{id}','OtherUserController@replayDelete');

	//微博转发
	Route::get('ward','OtherUserController@ward');

	//点赞微博
	Route::get('pointFun','OtherUserController@pointFun');


});

//前台注册
Route::group(['prefix'=>'home','namespace'=>'Home'],function(){

	//注册前首页
	Route::get('admin','AdminController@index');

	//注册跳登录页面
	Route::post('admin','AdminController@alog');

	//验证手机号是否存在
	Route::post('admin/phones','AdminController@phone');

	//注册页面
	Route::get('register','RegisterController@index');

	//验证手机号是否存在
	Route::get('register/phone','RegisterController@verification');

	//检验验证码是否正确
	Route::get('register/code','RegisterController@code');

	//前台短信验证
	Route::post('code','CodeController@send');

	
});

//前台登录
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
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'admin'],function(){

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



