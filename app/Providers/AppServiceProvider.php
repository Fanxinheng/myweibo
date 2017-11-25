<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Model\advert;
use App\Http\Model\link;
use App\Http\Model\notice;
use App\Http\Model\label;

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

        //将值传递到所有页面
        view()->share('advert',$advert);

        view()->share('link',$link);

        view()->share('notice',$notice);

        view()->share('label',$label);


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
