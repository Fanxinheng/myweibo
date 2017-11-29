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

    	
        //判断微博内容是否为空
        if($request->has('content')){
            $res['content'] = $_POST['content'];
        }else{
            $res['content'] = '发布微博';
        }

        //插入标签
        if($request->has('label')){
            //获取微博标签内容
            $res['label'] = implode(",",$_POST['label']);
        }

        //插入图片
        if($request->has('image')){
            $res['image'] = $_POST['image'];
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
