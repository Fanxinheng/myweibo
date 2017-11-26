<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\user;
use App\Http\Model\contents;
use App\Http\Model\notice;

use Session;

use Hash;
class AdminController extends Controller
{
   
   //加载全部微博
    public function index(Request $request)
    {
       
       //查询微博内容
        $index = contents::join('user_info',function($join){
            $join->on('contents.uid','=','user_info.uid');
        })->orderBy('time','desc')->paginate(10);

       return view('homes/index',['index'=>$index]);

    }

    //加载热门微博
    public function hot ()
    {
        
    	//查询热门微博内容
        $index = contents::join('user_info',function($join){
        	$join->on('contents.uid','=','user_info.uid');
        })->where('hot',1)
        ->orWhere('fnum','>',1)
        ->orWhere('rnum','>',1)
        ->orderBy('time','desc')
        ->paginate(10);

       return view('homes/index',['index'=>$index]);
    }

    //加载标签微博
    public function label ($id)
    {
       
        //查询标签
        $index = contents::join('user_info',function($join){
            $join->on('contents.uid','=','user_info.uid');
        })->where('label','like','%'.$id.'%')
        ->orderBy('time','desc')
        ->paginate(10);

        return view('homes/index',['index'=>$index]);
    }

    //微博搜索
    public function search(Request $request)
    {
    
        //查询搜索内容
        $index = contents::join('user_info','contents.uid','=','user_info.uid')
        ->where('content','like','%'.$request->input('search').'%')
        ->orWhere('nickName','like','%'.$request->input('search').'%')
        ->orderBy('time','desc')
        ->paginate(10);

        return view('homes/search',['index'=>$index,'request'=>$request]);
    }

    //系统公告
    public function notice ()
    {

        //查询公告内容
        $index = notice::where('id',$_GET['id'])->first();

        //判断用户是否登陆
        $bool = Session('uid');


        return $index;

        
    }
   

   //获取表单传过来的值并添加到数据库
    public function alog(Request $request)
    {

        //获取表单传过来的信息
        $res = $request->only('phone','password');

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


}
