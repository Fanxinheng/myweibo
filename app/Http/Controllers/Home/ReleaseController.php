<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\contents;
use App\Http\Model\user_info;

use Session;


class ReleaseController extends Controller
{
    public function store (Request $request)
    {
    	//获取发布者ID
    	$res['uid'] = Session('uid');
    	//文件上传
        if($request->hasFile('image')){

            $name = rand(1111,9999).time();

            $suffix = $request->file('image')->getClientOriginalExtension();

            $request->file('image')->move('./homes/c_images/',$name.'.'.$suffix);

            $res['image'] = '/homes/c_images/'.$name.'.'.$suffix;

        }

        //获取微博内容
		$res['content'] = $_POST['content'];

        //获取微博标签内容
    	$res['label'] = implode(",",$_POST['label']);
		
    	//获取发布时间
    	$res['time'] = time();

    	//登录用户积分+5
    	$socre = user_info::where('uid',Session('uid'))->value('socre');

    	$num['socre'] = $socre +5;

    	$data1 = user_info::where('uid',Session('uid'))->update($num);

		//将数据存入数据库
		$data = contents::insert($res);

		if($data && $data1){
			
			return redirect('home/login');
		}
    }
}
