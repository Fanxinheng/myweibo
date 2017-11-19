<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\contents;
use App\Http\Model\user_info;
use App\Http\Model\forward;

use session;


class ForwardController extends Controller
{
    public function create ($id)
    {
    	//查看微博内容
    	$res = contents::join('user_info','contents.uid','=','user_info.uid')->where('cid',$id)->first();

    	//查询转发信息
    	$forward = forward::join('user_info','forward.fid','=','user_info.uid')->where('tid',$id)->orderBy('time','desc')->get();


    	return view('homes/forward',['res'=>$res,'forward'=>$forward]);
    }

    public function store (Request $request)
    {
    	//获取转发内容
    	$res = $request->except('_token');

    	//获取转发时间
    	$res['time'] = time();

    	//获取转发人id
    	$res['fid'] = 1;

    	//将指定微博转发数量+1
    	$fnum = contents::where('cid',$request->only('tid'))->value('fnum');

    	$num['fnum'] = $fnum +1;

    	$data = contents::where('cid',$request->only('tid'))->update($num);

    	//将转发内容存入数据库
    	$data1 = forward::insert($res);

    	if($data && $data1){
    		return back()->with('success','转发成功！');
    	}else{
    		return back()->with('fail','转发失败！');

    	}

    }
}
