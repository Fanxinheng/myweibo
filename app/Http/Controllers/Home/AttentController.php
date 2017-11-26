<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\user_info;
use App\Http\Model\user_attention;

use Session;


class AttentController extends Controller
{
	//用户关注
    public function attent ()
    {
    	//获取关注用户ID
    	$attent['gid'] = $_GET['gid'];

    	//获取登录用户id
    	$attent['uid'] = Session('uid');

        //获取关注时间
        $attent['time'] = time();

    	//判断用户是否相互关注
    	$bool = user_attention::where('gid',$attent['gid'])->where('uid',$attent['uid'])->value('id');

    	//已关注
    	if($bool){

    		//取消关注
    		user_attention::where('id',$bool)->delete();

    		//查询登录用户关注数量
    		$res['gnum'] = user_attention::where('uid',$attent['uid'])->count();

    		//存储标记并返回
    		$res['a'] = 0;

    		return $res;
    	}

    	//未关注将关注信息存入数据库
    	user_attention::insert($attent);
    	
    	//查询登录用户关注数量
		$res['gnum'] = user_attention::where('uid',$attent['uid'])->count();

		//存储标记并返回
		$res['a'] = 1;

    	return $res;
    	
    }
}
