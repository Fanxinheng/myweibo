<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Model\advert;
use App\Http\Model\link;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //获取数据库信息
        $resres = advert::get();
        $rec = link::get();
        // var_dump($res);
        //将值传递到所有页面
        view()->share('resres',$resres);
        view()->share('rec',$rec);

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
