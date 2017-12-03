<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\contents;
use App\Http\Model\user_info;
use App\Http\Model\replay;


class ShowController extends Controller
{
    public function show ($id)
    {
    	//查看微博内容
    	$res = contents::join('user_info','contents.uid','=','user_info.uid')->where('cid',$id)->first();
    	
    	//微博评论
    	$replay = replay::join('user_info','replay.rid','=','user_info.uid')->orderBy('time','desc')->where('tid',$id)->get();
    	
    	return view('homes/show',['res'=>$res,'replay'=>$replay]);
    }
}
