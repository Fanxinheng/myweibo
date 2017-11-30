<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\admin;
use App\Http\Model\user_info;
use App\Http\Model\message;

use Session;



class NewsController extends Controller
{
    public function add ($id)
    {
    	
    	//获取管理员用户名
    	$admin = admin::where('id',Session('pid'))->first();

    	//获取用户名
    	$user = user_info::where('uid',$id)->first();

    	return view('admins/user/news',['admin'=>$admin,'user'=>$user]);
    }

    public function send ($id)
    {
    	//获取管理员ID
    	$res['aid'] = Session('pid');

    	//获取用户ID
    	$res['uid'] = $id;

    	//获取消息内容
    	$res['content'] = $_POST['content'];

    	//获取发送时间
    	$res['time'] = $_POST['time'];

    	//将信息存入数据库
    	$data = message::insert($res);

    	if($data){
    		return redirect('admin/index')->with('msg','消息发送成功！');
    	} else {
    		return redirect('admin/index')->with('msg','消息发送失败！');
    	}
    }
}
