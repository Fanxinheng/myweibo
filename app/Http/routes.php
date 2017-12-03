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
/*
Route::get('/', function () {
    return view('welcome');

});*/
//加载主页面
Route::get('/','Home\AdminController@welcome');


//==========================前台路由===================================//




//===========================前台未登录==============================//

Route::group(['prefix'=>'home','namespace'=>'Home'],function(){



	//注册前首页全部微博
	Route::get('/admin','AdminController@index');

	//热门微博列表
	Route::get('/hot','AdminController@hot');

	//微博搜索
	Route::get('/admin/search','AdminController@search');

	//微博标签列表
	Route::get('/label/{id}','AdminController@label');

	//微博转发页面
	Route::get('/forward/{id}','ForwardController@create');

	//微博评论页面
	Route::get('/replay/{id}','ReplayController@create');


	//系统公告
	Route::get('/notice','AdminController@notice');

//============================注册=========================//

	//注册跳登录页面
	Route::post('/admin','AdminController@alog');

	//登录时验证手机号是否已注册
	Route::post('/admin/phones','AdminController@phone');

	//忘记密码页面
	Route::get('/admin/find','AdminController@find');

	//忘记密码页面修改手机号验证是否已注册
	Route::get('/admin/find/phone','AdminController@fphone');

	//忘记密码更新数据库
	Route::post('/admin/find/fupdate','AdminController@fupdate');
	
	//注册页面
	Route::get('/register','RegisterController@index');

	//注册时验证手机号是否存在
	Route::get('/register/phone','RegisterController@verification');

	//检验验证码是否正确
	Route::get('/register/code','RegisterController@code');

	//前台短信验证
	Route::post('/code','CodeController@send');



//=======================登录============================//

	//检测手机号是否已注册
	Route::get('/pho','LoginController@pho');

	//检测密码是否与数据库一致
	Route::post('/pass','LoginController@pass');

	//检测昵称是否存在,存在跳到首页,不存在跳到个人信息页
	Route::post('/nick','LoginController@nick');


});



//===============前台登录后页面===============//
Route::group(['prefix'=>'home','namespace'=>'Home','middleware'=>'home'],function(){

//=========================关于微博===============================//


	//前台登录成功后进入首页
	Route::get('/login','LoginController@index');

	//微博内容搜索栏
	Route::get('/search','LoginController@search');

	//热门微博列表
	Route::get('/index/hot','LoginController@hot');

	//我的关注微博列表
	Route::get('/index/attention','LoginController@attention');

	//微博标签列表
	Route::get('/index/label/{id}','LoginController@label');

	//微博转发列表
	Route::get('/index/forward','LoginController@forward');

	//发布微博
	Route::post('/release','ReleaseController@store');

	//举报微博
	Route::get('/blog/report/','BlogController@report');

	//删除自己的微博
	Route::get('/blog/destroy/','BlogController@destroy');

	//加载微博转发页面
	Route::get('/blog/forward/{id}','BlogController@forward');

	//加载微博评论页面
	Route::get('/blog/replay/{id}','BlogController@replay');
	
	//微博转发功能
	Route::post('/forward/store/','ForwardController@store');

	//删除微博转发
	Route::get('/blog/delete/','BlogController@delete');

	//微博评论功能
	Route::post('/replay/store/','ReplayController@store');

	//ajax判断微博评论是否为空
	Route::post('/replay/empty/','ReplayController@empty');

	//微博点赞功能
	Route::post('/point/','PointController@point');

	//用户关注
	Route::get('/attent','AttentController@attent');

	//用户取消关注
	Route::get('/noattent','AttentController@noattent');

	//微博找人
	Route::get('/job/{id}','LoginController@job');

	//多图上传加载页面
	Route::get('/pics',function(){
		return view('homes/blog/pic');
	});

	Route::post('/blog/pics',"BlogController@pics");


//=======================完善个人中心===========================//

	//完善个人信息
	Route::get('/details','DetailsController@index');

	//检验昵称是否存在
	Route::get('/details/uname','DetailsController@uname');

	//检验邮箱是否存在
	Route::get('/details/email','DetailsController@email');

	//把个人信息存入到数据库并跳转到首页
	Route::post('/details/deposit','DetailsController@deposit');

	//修改个人信息页面
	Route::get('/details/edit','DetailsController@edit');

	//修改个人信息头像页面
	Route::post('/details/editphoto','DetailsController@editphoto');

	//修改个人信息方法执行
	Route::post('/details/update','DetailsController@update');

	//修改密码页面
	Route::get('/changepass','DetailsController@changepass');
    
    //修改密码判断旧密码是否与表中一致
	Route::post('/changepass/oldpass','DetailsController@oldpass');
    
    //修改密码判断旧新密码是否与旧密码中一致
	Route::post('/changepass/newpass','DetailsController@newpass');

	//执行修改密码存到数据库
	Route::post('/details/changepassword','DetailsController@changepassword');

	//执行退出
	Route::get('/details/quit','DetailsController@quit');
});


//前台个人
Route::group(['prefix'=>'home','namespace'=>'Home','middleware'=>'home'],function(){

	//====================页面==========================//
	
	//个人主页
	Route::get('/user','UserController@index');

	//系统消息
	Route::get('/message','UserController@message');

	//个人相册页面
	Route::resource('/photo','UserController@photo');

	//个人的点赞页面
	Route::get('/point','UserController@point');

	//个人的转发页面
	Route::get('/forward','UserController@forward');

	//个人微博的评论
	Route::get('/replay','UserController@replay');

	//关注页面
	Route::resource('/attention','AttentionController');

	//粉丝页面
	Route::resource('/fans','FansController');

	//======================功能=============================//

	//删除微博
	Route::get('/delete/{id}','UserController@delete');

	//删除评论
	Route::post('/replay/delete','UserController@replayDelete');

	//点赞微博
	Route::get('/pointFun','UserController@pointFun');

	//微博评论
	Route::get('/type','UserController@type');

	//微博转发
	Route::get('/ward','UserController@ward');

	//删除全部图片
	Route::post('/photo/delete','UserController@photoDelete');

	//删除单个图片
	Route::post('/photo/move','UserController@photomove');
	
	
});

//前台他人个人
Route::group(['prefix'=>'home/other','namespace'=>'Home','middleware'=>'home'],function(){

	//======================页面===============================//
	
	//个人主页
	Route::get('/user/{id}','OtherUserController@index');

	//个人相册
	Route::resource('/photo','OtherUserController@photo');

	//微博评论
	Route::get('/type','OtherUserController@type');

	//关注
	Route::get('/attention/{id}','OtherAttentionController@index');

	//粉丝
	Route::get('/fans/{id}','OtherFansController@index');

	//========================功能==================================//

	//删除评论
	Route::post('/replay/delete','OtherUserController@replayDelete');

	//微博转发
	Route::get('/ward','OtherUserController@ward');

	//点赞微博
	Route::get('/pointFun','OtherUserController@pointFun');

	//关注他人
	Route::get('/act/{id}','OtherUserController@attentionAction');



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
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'admin'],function(){

	//后台主页
	Route::resource('/index','UserController');
	//后台管理员资源路由
	Route::resource('/admins','AdminsController');

	//后台管理员修改密码普通路由
	Route::get('/password/{id}','PwdController@edit');

	//后台管理员修改方法路由
	Route::post('/password/update/{id}','PwdController@update');

	//后台管理员退出路由
	Route::get('/password/delete/{id}','PwdController@delete');

	//后台管理员修改个人信息
	Route::post('/password/pic','PwdController@pic');

	//后台用户职业
	Route::resource('/job','JobController');

	//删除用户职业
	Route::get('/job/delete','JobsController@delete');

	//后台热门微博资源路由
	Route::resource('/hot','HotController');

	//后台微博管理资源路由
	Route::resource('/weibo','WeiboController');

	//后台举报管理资源路由
	Route::resource('/report','ReportController');

	//后台标签管理资源路由
	Route::resource('/label','LabelController');

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







