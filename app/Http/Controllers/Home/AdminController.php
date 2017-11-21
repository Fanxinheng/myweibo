<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\user;
use Hash;

class AdminController extends Controller
{
   
   //跳到登录页面
    public function index(Request $request)
    {
   
       	return view('homes.index');

    }

    //获取表单传过来的值并添加到user表中
    public function alog(Request $request)
    {
        //
        //获取表单传过来的信息
    	$res = $request->only('phone','password');
    	// dd($res);die;

    	//密码用哈希加密
    	$res['password']=Hash::make($request->input('password'));

    	// //往user表里添加数据
    	$data = user::insert($res);

    	//判断注册成功
    	if($data){

    		echo "<script>alert('注册成功');window.location.href='/home/admin';</script>";
    		
       	}else{

    		return back()->withinput();
    	}
    }


    //验证手机号是否在数据库存在,若不存在跳到注册页面
    public function phone(Request $request)
    {
    	//获取input框里输入的手机号
    	$res = $request->input('phone');

    	//从数据库查询电话号码
    	$phone = user::where('phone','=',$res)->value('phone');

    	//判断
        if($phone){
            echo "1";
        }else{
            echo "0";
    	};
	}

    //忘记密码页面
    public function find()
    {
        return view('homes/findpass');
    }



}
