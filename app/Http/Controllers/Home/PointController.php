<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\contents;
use App\Http\Model\user_info;
use App\Http\Model\point;


class PointController extends Controller
{
    public function point ($id)
    {
    	//获取微博id
    	$res['tid'] = $id;

    	//获取点赞时间
    	$res['ptime'] = time();

    	//获取点赞人id
    	$res['pid'] = 2;

    	//将指定微博点赞数量+1
    	$pnum = contents::where('cid',$id)->value('pnum');

    	$num['pnum'] = $pnum +1;

    	$data = contents::where('cid',$id)->update($num);

    	//将转发内容存入数据库
    	$data1 = point::insert($res);

    	if($data && $data1){
    		return back();
    	}else{
    		return back();

    	}

    }
}
