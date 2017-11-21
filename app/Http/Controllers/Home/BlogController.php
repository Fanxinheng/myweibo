<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\user;
use App\Http\Model\user_info;
use App\Http\Model\label;
use App\Http\Model\contents;
use App\Http\Model\user_attention;
use App\Http\Model\forward;

use Session;

class BlogController extends Controller
{

	public function report (Request $request)
    {
    	var_dump($request->input('cid'));
    }

    public function forward ($id)
    {
    	// //获取登录用户ID
        $uid = Session('uid');

  	    //查询标签内容
        $label = label::get();

        //查询登录用户信息 session('uid')
	 	$user = user_info::where('uid',$uid)->first();

	 	//查询登录用户关注数量
	 	$unum = user_attention::where('uid',$uid)->count();

	 	//查询登录用户粉丝数量
	 	$gnum = user_attention::where('gid',$uid)->count();

	 	//查询登录用户微博数量
	 	$cnum = contents::where('uid',$uid)->count();

        //查看微博内容
    	$content = contents::join('user_info','contents.uid','=','user_info.uid')->where('cid',$id)->first();

        //查询转发信息
    	$forward = forward::join('user_info','forward.fid','=','user_info.uid')->where('tid',$id)->orderBy('time','desc')->get();

    	return view('homes/blog/forward',['uid'=>$uid,'label'=>$label,'user'=>$user,'unum'=>$unum,'gnum'=>$gnum,'cnum'=>$cnum,'content'=>$content,'forward'=>$forward]);
    	
    }
}
