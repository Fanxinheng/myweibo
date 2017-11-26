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



//==============前台未登录=====================//
Route::group(['prefix'=>'home','namespace'=>'Home'],function(){

	//注册前首页全部微博
	Route::get('/admin','AdminController@index');

	//热门微博列表
	Route::get('/hot','AdminController@hot');

	//微博标签列表
	Route::get('/label/{id}','AdminController@label');

	//微博转发页面
	Route::get('/forward/{id}','ForwardController@create');

	//微博评论页面
	Route::get('/replay/{id}','ReplayController@create');



//============================注册=========================//

	//注册跳登录页面
	Route::post('admin','AdminController@alog');

	//登录时验证手机号是否已注册
	Route::post('admin/phones','AdminController@phone');

	//忘记密码页面
	Route::get('admin/find','AdminController@find');

	//忘记密码页面修改手机号验证是否已注册
	Route::get('admin/find/phone','AdminController@fphone');

	//忘记密码更新数据库
	Route::post('admin/find/fupdate','AdminController@fupdate');
	
	//注册页面
	Route::get('register','RegisterController@index');

	//注册时验证手机号是否存在
	Route::get('register/phone','RegisterController@verification');

	//检验验证码是否正确
	Route::get('register/code','RegisterController@code');

	//前台短信验证
	Route::post('/code','CodeController@send');



//=======================登录============================//
//
	//检测手机号是否已注册
	Route::get('pho','LoginController@pho');

	//检测密码是否与数据库一致
	Route::get('pass','LoginController@pass');

	//检测昵称是否存在,存在跳到首页,不存在跳到个人信息页
	Route::post('nick','LoginController@nick');

});



//===============前台登录后页面===============//
Route::group(['prefix'=>'home','namespace'=>'Home','middleware'=>'home'],function(){


	//微博转发功能
	Route::post('/forward/store/','ForwardController@store');

	//微博评论功能
	Route::post('/replay/store/','ReplayController@store');

	//微博点赞功能
	Route::get('/point/{id}','PointController@point');

	//热门微博列表
	Route::get('/index/hot','LoginController@hot');

	//微博标签列表
	Route::get('/index/label/{id}','LoginController@label');



//=======================完善个人中心===========================//
	
	//完善个人信息
	Route::get('/details','DetailsController@index');

	//前台登录成功后进入首页
	Route::get('/login','LoginController@index');

	//检验昵称是否存在
	Route::get('details/uname','DetailsController@uname');

	//检验邮箱是否存在
	Route::get('details/email','DetailsController@email');

	//把个人信息存入到数据库并跳转到首页
	Route::post('details/deposit','DetailsController@deposit');

	//修改个人信息页面
	Route::get('details/edit','DetailsController@edit');

	//修改个人信息头像页面
	Route::post('details/editphoto','DetailsController@editphoto');

	//修改个人信息方法执行
	Route::post('details/update','DetailsController@update');

	//修改密码页面
	Route::get('changepass','DetailsController@changepass');
    
    //修改密码判断旧密码是否与表中一致
	Route::get('changepass/oldpass','DetailsController@oldpass');


	//执行退出
	Route::get('details/quit','DetailsController@quit');
});


//===================前台个人中心=====================//
Route::group(['prefix'=>'home','namespace'=>'Home','middleware'=>'home'],function(){
	
	//个人主页
	Route::get('user','UserController@index');

	//个人相册
	Route::get('photo','UserController@photo');

	//个人的点赞
	Route::get('point','UserController@point');

	//个人微博的评论
	Route::get('replay','UserController@replay');

	//个人的转发
	Route::get('forward','UserController@forward');

	//删除微博
	Route::post('delete/{id}','UserController@delete');

	//关注
	Route::resource('attention','AttentionController');

	//粉丝
	Route::resource('fans','FansController');
});




//==========================后台路由===================================//

//后台登录
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'admin'],function(){

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

	//后台标签管理资源路由
	Route::resource('label','LabelController');

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



