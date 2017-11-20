<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\user;
use App\Http\Model\user_info;
use Hash;


class DetailsController extends Controller
{
    //
    public function index(Request $request)
    {	

    	return view('homes.details');
    
    }

    //检测昵称是否存在的方法
    public function uname(Request $request){

        // 获取input框里的昵称值
    	$res = $request->input('uname');

        //在user_info表中查询昵称值
    	$uname = user_info::where('nickName','=',$res)->value('nickName');

        // 为空返回1,否则返回0
    	if($uname==null){
    		echo "1";
    	}else{
    		echo "0";
    	}

    }

    //验证邮箱是否存在的方法
    public function email(Request $request){

        // 获取input框里的email值
        $res = $request->input('email');

        // 在user_info表中查询email值
        $email = user_info::where('email','=',$res)->value('email');

        // 判断为空返回1,否则返回0
        if($email==null){
            echo "1";
        }else{
            echo "0";
        }
    }

    //将个人信息页面传过来的值存入user_info的方法
    public function deposit(Request $request)
    {   
        //文件上传
        if($request->hasFile('photo')){

            //修改名字
            $name = rand(1111,9999).time();
            // var_dump($name);
            //获取后缀
            $suffix = $request->file('photo')->getClientOriginalExtension();

            //移动图片
            $request->file('photo')->move('./homes/uploads',$name.'.'.$suffix);
        }

        //获取个人信息的值        
        $res = $request->except('_token');

        //把uid存到res数组中
        $res['uid'] = session('uid');

        //把图片按路径的格式存到res数组中
        $res['photo'] = '/homes/uploads/'.$name.'.'.$suffix;

        //把res数组中的信息存到user_info表中
        $data = user_info::insert($res);

        //判断成功就跳转首页,否则返回当前页面并存闪存
        if($data){

            return redirect('/home/login');

        }else{

            return back()->withInput();
        }
    }

}
