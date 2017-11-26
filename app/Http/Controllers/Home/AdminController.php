<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\user;
use Hash;

use App\Http\Model\contents;
use App\Http\Model\label;

class AdminController extends Controller
{
   
   //加载全部微博
    public function index(Request $request)
    {
        //查询标签内容
        $label = label::get();

       //查询微博内容
        $index = contents::join('user_info',function($join){
            $join->on('contents.uid','=','user_info.uid');
        })->orderBy('time','desc')->get();

       return view('homes/index',['label'=>$label,'index'=>$index]);

    }


    //获取表单传过来的值并添加到user表中

    //加载热门微博
    public function hot ()
    {
        //查询标签内容
        $label = label::get();

    	//查询热门微博内容
        $index = contents::join('user_info',function($join){
        	$join->on('contents.uid','=','user_info.uid');
        })->where('hot',1)
        ->orWhere('fnum','>',1)
        ->orWhere('rnum','>',1)
        ->orderBy('time','desc')
        ->get();

       return view('homes/index',['label'=>$label,'index'=>$index]);
    }

    //加载标签微博
    public function label ($id)
    {
        //查询标签内容
        $label = label::get();

        //查询标签
        $index = contents::join('user_info',function($join){
            $join->on('contents.uid','=','user_info.uid');
        })->where('label','like','%'.$id.'%')
        ->orderBy('time','desc')
        ->get();

        return view('homes/index',['label'=>$label,'index'=>$index]);
    }

   

   //注册
    public function alog(Request $request)
    {

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

            echo "<script>alert('注册失败')</script>";
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

    //忘记密码页面修改手机号验证是否注册
    public function fphone(Request $request)
    {
        //获取input框里输入的手机号
        $res = $request->input('phone');

        //从数据库查询电话号码
        $phone = user::where('phone','=',$res)->value('phone');

        //判断
        if($phone==null){
            echo "0";
        }else{
            echo "1";
        };
    }


    //忘记密码form表单的值更新数据库
    public function fupdate(Request $request)
    {
        //获取表单传过来的信息
        $res = $request->only('phone','password');
        // dd($res);die;

        //密码用哈希加密
        $res['password']=Hash::make($request->input('password'));

        // //往user表里更新数据
        $data = user::where('phone',$res['phone'])->update($res);

        //判断修改成功
        if($data){

            echo "<script>alert('修改成功');window.location.href='/home/admin';</script>";
            
        }else{

            echo "<script>alert('修改失败')</script>";
            return back()->withinput();
        }
    }



}
