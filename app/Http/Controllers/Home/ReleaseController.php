<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use zgldh\QiniuStorage\QiniuStorage;

use App\Http\Model\contents;
use App\Http\Model\user_info;

use Session;


class ReleaseController extends Controller
{

    //微博发布
    public function store (Request $request)
    {
    	//获取发布者ID
    	$res['uid'] = Session('uid');
    	//文件上传
        if($request->hasFile('image')){
            
            //初始化七牛云
            $disk = QiniuStorage::disk('qiniu');

            //获取文件内容
            $file = $request->file('image');

            //随机生成文件名
            $name = rand(1111,9999).time();

            //获取上传文件后缀
            $suffix = $request->file('image')->getClientOriginalExtension();

            // $request->file('image')->move('./homes/c_images/',$name.'.'.$suffix);
            
            //拼装文件名
            $logo = '/homes/c_images/'.$name.'.'.$suffix;

            $res['image'] = $logo;

            //上传到七牛云
            $bool = $disk->put($logo,file_get_contents($file->getRealPath()));


        }

        //获取微博内容
		$res['content'] = $_POST['content'];

        if($request->has('label')){
            //获取微博标签内容
            $res['label'] = implode(",",$_POST['label']);
        }
        
		
    	//获取发布时间
    	$res['time'] = time();

    	//登录用户积分+5
    	$socre = user_info::where('uid',Session('uid'))->value('socre');

    	$num['socre'] = $socre +5;

    	$data = user_info::where('uid',Session('uid'))->update($num);

		//将数据存入数据库
		$data1 = contents::insert($res);

		if($data && $data1){
			
			return redirect('home/login');
		}
    }
}
