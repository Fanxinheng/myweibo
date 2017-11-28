<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use zgldh\QiniuStorage\QiniuStorage;


use App\Http\Model\config;


class ConfigController extends Controller
{
	//加载修改页面
    public function edit ()
    {
        //获取网站配置
        $config = config::first();

    	return view('admins/config/edit',['config'=>$config]);
    }

    //执行修改功能
    public function update (Request $request)
    {
        //获取修改后的信息
        $config = $request->except('_token');
        
        //修改数据库
        $data = config::where('id',1)->update($config);

        if($data){
            return redirect('/admin/config/')->with('msg','网站配置修改成功！');
        } else {
            return redirect('/admin/config/')->with('msg','网站配置修改失败！');

        }  
    }

    //加载LOGO修改页面
    public function logo ()
    {
        //获取网站原LOGO
        $logo = config::value('logo');
        
        return view('admins/config/logo',['logo'=>$logo]);
    }

    //执行LOGO修改功能
    public function dologo (Request $request)
    {
        $file = $request->file('logo');

        //文件上传
        if($request->hasFile('logo')){

            //初始化七牛云
            $disk = QiniuStorage::disk('qiniu');

            //获取文件
            $file = $request->file('logo');

            //拼装文件名
            $name = rand(1111,9999).time();

            $suffix = $request->file('logo')->getClientOriginalExtension();

            $logo = 'admins/config/'.$name.'.'.$suffix;

            //上传文件
            $disk->put($logo,file_get_contents($file->getRealPath()));
        }

        $res['logo'] = $logo;

        //删除旧logo
        $old = config::where('id',1)->value('logo');

        $data = $disk->delete($old);

        //判断是否删除成功
        if($data){

            //更新数据库
            config::where('id',1)->update($res);

            return $res['logo'];
        }

        
    }
}
