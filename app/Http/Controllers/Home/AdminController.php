<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\contents;
use App\Http\Model\label;

class AdminController extends Controller
{
   
    public function index()
    {
        //查询标签内容
        $label = label::get();

       //查询微博内容
        $index = contents::join('user_info',function($join){
        	$join->on('contents.uid','=','user_info.uid');
        })->orderBy('time','desc')->get();

       return view('homes/index',['label'=>$label,'index'=>$index]);
    }

    public function hot ()
    {
        //查询标签内容
        $label = label::get();

    	//查询热门微博内容
        $index = contents::join('user_info',function($join){
        	$join->on('contents.uid','=','user_info.uid');
        })->where('hot',1)
        ->orWhere('fnum','>',1)
        ->orWhere('rnum','>',1)
        ->orderBy('time','desc')
        ->get();

       return view('homes/index',['label'=>$label,'index'=>$index]);
    }

    public function label ($id)
    {
        //查询标签内容
        $label = label::get();

        //查询标签
        $index = contents::join('user_info',function($join){
            $join->on('contents.uid','=','user_info.uid');
        })->where('label','like','%'.$id.'%')->get();

        return view('homes/index',['label'=>$label,'index'=>$index]);
    }

   
}
