<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Model\advert;
use App\Http\Model\link;
use App\Http\Model\notice;
use App\Http\Model\label;
use App\Http\Model\job;
use App\Http\Model\config;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //获取广告数据
        $advert = advert::get();

        //获取友情连接数据
        $link = link::get();

        //获取系统公告数据
        $notice = notice::get();

        //获取标签数据
        $label = label::get();

        //获取用户职业数据
        $job = job::get();

        //获取网站配置
        $config = config::get();

        //将值传递到所有页面
        view()->share('advert',$advert);

        view()->share('link',$link);

        view()->share('notice',$notice);

        view()->share('label',$label);

        view()->share('job',$job);

        view()->share('config',$config);

        


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
