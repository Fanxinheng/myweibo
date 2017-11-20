<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\user_info;
use App\Http\Model\label;
use App\Http\Model\contents;
use App\Http\Model\user_attention;

use session;

class LoginController extends Controller
{
    //
    public function index()
    {
    	//查询标签内容
        $label = label::get();

        //查询登录用户信息 session('uid')
       	$user = user_info::where('uid',1)->first();

       	//查询登录用户关注数量
       	$unum = user_attention::where('uid',1)->count();

       	//查询登录用户粉丝数量
       	$gnum = user_attention::where('gid',1)->count();

       	//查询登录用户微博数量
       	$cnum = contents::where('uid',1)->count();

        //查询微博内容
        $index = contents::join('user_info',function($join){
        	$join->on('contents.uid','=','user_info.uid');
        })->orderBy('time','desc')->get();

    	return view('homes/login',['label'=>$label,'user'=>$user,'unum'=>$unum,'gnum'=>$gnum,'cnum'=>$cnum,'index'=>$index]);
    }

    public function hot ()
    {
        //查询标签内容
        $label = label::get();

        //查询登录用户信息 session('uid')
       	$user = user_info::where('uid',1)->first();

       	//查询登录用户关注数量
       	$unum = user_attention::where('uid',1)->count();

       	//查询登录用户粉丝数量
       	$gnum = user_attention::where('gid',1)->count();

       	//查询登录用户微博数量
       	$cnum = contents::where('uid',1)->count();

    	//查询热门微博内容
        $index = contents::join('user_info',function($join){
        	$join->on('contents.uid','=','user_info.uid');
        })->where('hot',1)
        ->orWhere('fnum','>',1)
        ->orWhere('rnum','>',1)
        ->orderBy('time','desc')
        ->get();

       return view('homes/login',['label'=>$label,'user'=>$user,'unum'=>$unum,'gnum'=>$gnum,'cnum'=>$cnum,'index'=>$index]);
    }

    public function label ($id)
    {
        //查询标签内容
        $label = label::get();

        //查询登录用户信息 session('uid')
       	$user = user_info::where('uid',1)->first();

       	//查询登录用户关注数量
       	$unum = user_attention::where('uid',1)->count();

       	//查询登录用户粉丝数量
       	$gnum = user_attention::where('gid',1)->count();

       	//查询登录用户微博数量
       	$cnum = contents::where('uid',1)->count();

        //查询标签
        $index = contents::join('user_info',function($join){
        	$join->on('contents.uid','=','user_info.uid');
        })->where('label','like','%'.$id.'%')->get();

        return view('homes/login',['label'=>$label,'user'=>$user,'unum'=>$unum,'gnum'=>$gnum,'cnum'=>$cnum,'index'=>$index]);
    }
}
