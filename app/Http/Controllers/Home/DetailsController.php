<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\user;
use App\Http\Model\user_info;
use Hash;
use session;


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
        $email = user_info::where('email',$res)->value('email');

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
        

                if($request->hasFile('photo')){

                    //修改名字
                    $name = rand(1111,9999).time();
                    // var_dump($name);
                    //获取后缀
                    $suffix = $request->file('photo')->getClientOriginalExtension();

                    //移动图片
                    $request->file('photo')->move('./homes/uploads',$name.'.'.$suffix);
                
                    //获取除了token以外的值
                    $res = $request->except('_token');

                    //把uid存到res数组中
                    $res['uid'] = session('uid');

                    //把图片按路径的格式存到res数组中
                    $res['photo'] = '/homes/uploads/'.$name.'.'.$suffix; 

                    //把res数组中的信息存到user_info表中
                    $data = user_info::insert($res);

                    //判断成功就跳转首页,否则返回当前页面并存闪存
                    if($data){

                        echo "<script>slert('添加成功!');window.location.href='/home/login';</script>";

                    }else{

                        echo "<script>slert('添加失败!');</script>";                        
                        return back()->withInput();
                    }
                }
           
        
    }

    //加载修改个人信息页面
    public function edit(Request $request)
    {   
        $uid = $request->session()->get('uid');
        $res = user_info::where('uid',$uid)->first();
         // echo "<pre>";
        // var_dump($res);

        return view('homes/exit',['res'=>$res]);
    }

    //执行修改个人信息方法
    public function update(Request $request)
    {   
          //获取除了token以外的值
            $res = $request->except('_token','photo');

       if($request->hasFile('photo')){

                //修改名字
                $name = rand(1111,9999).time();
                // var_dump($name);
                //获取后缀
                $suffix = $request->file('photo')->getClientOriginalExtension();

                //移动图片
                $request->file('photo')->move('./homes/uploads',$name.'.'.$suffix);

                 //把图片按路径的格式存到res数组中
                $res['photo'] = '/homes/uploads/'.$name.'.'.$suffix;
        }

            
                //获取session中当前用户的uid
                $uid = $request->session()->get('uid');

                //把res数组中的信息按照uid修改到user_info表中
                $data = user_info::where('uid',$uid)->update($res);
                
                //判断成功就跳转首页,否则返回当前页面并存闪存
                if($data){

                    echo "<script>alert('修改成功!');window.location.href='/home/login';</script>";

                }else{

                    echo "<script>alert('亲,你没有修改任何信息哟!');window.location.href='/home/login';</script>";

                }

    }
        

    //执行退出
    public function quit(Request $request)
    {
        
        $request->session()->forget('uid');
        $request->session()->forget('code');
        $request->session()->forget('message');
        $request->session()->forget('point');
        $request->session()->forget('replay');
        $request->session()->forget('forward');
        return redirect('/home/admin');


    }
        

}
