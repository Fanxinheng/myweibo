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

//广告管理
Route::get('advert', function () {

    return view('admins.layout.admin');

});

//广告添加页面

Route::get('/advert/add', 'Admin\AdvertController@stort');


//广告列表页面
Route::get('/advert/entry', 'Admin\AdvertController@index');
