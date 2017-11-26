<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\contents;
use App\Http\Model\user_info;
use App\Http\Model\replay;
use App\Http\Model\label;



class ReplayController extends Controller
{
    public function create ($id)
    {

        //查询标签内容
        $label = label::get();

    	//查看微博内容
    	$res = contents::join('user_info','contents.uid','=','user_info.uid')->where('cid',$id)->first();

    	//查询评论信息
    	$replay = replay::join('user_info','replay.rid','=','user_info.uid')->where('tid',$id)->orderBy('time','desc')->get();

    	return view('homes/replay',['label'=>$label,'res'=>$res,'replay'=>$replay]);
    }





    

    public function store (Request $request)
    {
    	//获取评论内容
    	$res = $request->except('_token');

    	//获取评论时间
    	$res['time'] = time();

    	//获取评论人id
    	$res['rid'] = 2;

    	//将指定微博评论数量+1
    	$rnum = contents::where('cid',$request->only('tid'))->value('rnum');

    	$num['rnum'] = $rnum +1;

    	$data = contents::where('cid',$request->only('tid'))->update($num);

    	//将转发内容存入数据库
    	$data1 = replay::insert($res);

    	if($data && $data1){
    		return back();
    	}else{
    		return back();

    	}

    }
}
