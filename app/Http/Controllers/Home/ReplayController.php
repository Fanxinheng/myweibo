<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\contents;
use App\Http\Model\user_info;
use App\Http\Model\replay;
use App\Http\Model\label;

use Session;

class ReplayController extends Controller
{

    //前台未登录加载评论页面
    public function create ($id)
    {
    	//查看微博内容
    	$res = contents::with('user_info')->where('cid',$id)->first();

    	//查询评论信息
    	$replay = replay::with('user_info')->where('tid',$id)->orderBy('time','desc')->paginate(10);

    	return view('homes/show/replay',['res'=>$res,'replay'=>$replay]);
    }

    //微博评论功能
    public function store (Request $request)
    {

    	//获取评论内容
    	$res['rcontent'] = $_POST['rcontent'];

        //获取指定微博ID
        $res['tid'] = $_POST['tid'];

        //获取指定微博发布者ID
        $res['uid'] = $_POST['uid'];

    	//获取评论时间
    	$res['time'] = time();

    	//获取评论人id
    	$res['rid'] = Session('uid');

    	//将指定微博评论数量+1
    	$rnum = contents::where('cid',$res['tid'])->value('rnum');

    	$num['rnum'] = $rnum +1;

    	$data = contents::where('cid',$res['tid'])->update($num);

    	//将转发内容存入数据库
    	$data1 = replay::insert($res);

        //判断评论人和登录用户是否为同一个人
        if($request->only('uid')['uid'] != $res['rid']){

            //登录用户积分+1
            $socre = user_info::where('uid',Session('uid'))->value('socre');

            $socres['socre'] = $socre + 1;

            $data2 = user_info::where('uid',Session('uid'))->update($socres);

            //微博发布者积分+1
            $socre1 = user_info::where('uid',$request->only('uid'))->value('socre');

            $socres1['socre'] = $socre1 + 1;

            $data3 = user_info::where('uid',$request->only('uid'))->update($socres1);
        }

        //将数据拼装返回
    	if($data && $data1 ){

    		return back();
    	}else{
    		return back();

    	}

    }


    //ajax判断微博评论是否为空
    public function empty (Request $request)
    {
        //获取评论内容
        $res['content'] = $request->input('content');

        //判断并返回标记
        if($res['content'] == ''){
            echo 0;
        }else{
            
            echo 1;
        }
    }
}
