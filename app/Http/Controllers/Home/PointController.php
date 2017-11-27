<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\contents;
use App\Http\Model\user_info;
use App\Http\Model\point;

use Session;


class PointController extends Controller
{
    //微博点赞
    public function point ()
    {

    	//获取微博id
        $res['tid'] = $_POST['poid'];

        //获取点赞人id
        $res['pid'] = Session('uid');

        //判断是否为同一用户点赞同一微博
        $bool = point::where('pid',$res['pid'])->where('tid',$res['tid'])->value('id');

        if($bool){
            
            return 0;
        }

        //获取发布者ID
        $res['uid'] = contents::where('cid',$res['tid'])->value('uid');

    	//获取点赞时间
    	$res['ptime'] = time();

    	//将指定微博点赞数量+1
    	$pnum = contents::where('cid',$res['tid'])->value('pnum');

    	$num['pnum'] = $pnum +1;

    	$data = contents::where('cid',$res['tid'])->update($num);

    	//将点赞数据存入数据库
    	$data1 = point::insert($res);

    	return $pnum + 1;

    }
}
