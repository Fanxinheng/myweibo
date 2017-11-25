<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\contents;
use App\Http\Model\user_info;
use App\Http\Model\forward;
use App\Http\Model\label;

use Session;


class ForwardController extends Controller
{
    //未登录时转发页面
    public function create ($id)
    {

        //查询标签内容
        $label = label::get();

    	//查看微博内容
    	$res = contents::join('user_info','contents.uid','=','user_info.uid')->where('cid',$id)->first();

    	//查询转发信息
    	$forward = forward::join('user_info','forward.fid','=','user_info.uid')->where('tid',$id)->orderBy('time','desc')->paginate(1);


    	return view('homes/show/forward',['label'=>$label,'res'=>$res,'forward'=>$forward]);
    }


    //微博转发功能
    public function store (Request $request)
    {
    	//获取转发内容
    	$res = $request->except('_token');

    	//获取转发时间
    	$res['time'] = time();

    	//获取转发人id
    	$res['fid'] = Session('uid');

    	//将指定微博转发数量+1
    	$fnum = contents::where('cid',$request->only('tid'))->value('fnum');

    	$fnums['fnum'] = $fnum +1;

    	$data = contents::where('cid',$request->only('tid'))->update($fnums);

    	//将转发内容存入数据库
    	$data1 = forward::insert($res);

        //判断转发人和登录用户是否为同一个人
        if($request->only('uid')['uid'] != $res['fid']){

            //登录用户积分+2
            $socre = user_info::where('uid',Session('uid'))->value('socre');

            $socres['socre'] = $socre +2;

            $data2 = user_info::where('uid',Session('uid'))->update($socres);

            //微博发布者积分+2
            $socre1 = user_info::where('uid',$request->only('uid'))->value('socre');

            $socres1['socre'] = $socre1 +2;

            $data3 = user_info::where('uid',$request->only('uid'))->update($socres1);
        }

       return back();

    }
}
