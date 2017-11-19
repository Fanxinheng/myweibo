<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\contents;

class AdminController extends Controller
{
   
    public function index()
    {
       //查询微博内容
        $index = contents::join('user_info',function($join){
        	$join->on('contents.uid','=','user_info.uid');
        })->orderBy('time','desc')->get();

       return view('homes/index',['index'=>$index]);
    }


    public function hot ()
    {
    	//查询微博内容
        $index = contents::join('user_info',function($join){
        	$join->on('contents.uid','=','user_info.uid');
        })->orderBy('time','desc')->where('hot',1)->get();

       return view('homes/index',['index'=>$index]);
    }

    public function start ()
    {
    	//查询微博内容
        $index = contents::join('user_info',function($join){
        	$join->on('contents.uid','=','user_info.uid');
        })->orderBy('time','desc')->where('content','like','%明%星%')->get();

       return view('homes/index',['index'=>$index]);
    }

    public function society ()
    {
    	//查询微博内容
        $index = contents::join('user_info',function($join){
        	$join->on('contents.uid','=','user_info.uid');
        })->orderBy('time','desc')->where('content','like','%社%会%')->get();

       return view('homes/index',['index'=>$index]);
    }

    public function feel ()
    {
    	//查询微博内容
        $index = contents::join('user_info',function($join){
        	$join->on('contents.uid','=','user_info.uid');
        })->orderBy('time','desc')->where('content','like','%情%感%')->get();

       return view('homes/index',['index'=>$index]);
    }

    public function it ()
    {
    	//查询微博内容
        $index = contents::join('user_info',function($join){
        	$join->on('contents.uid','=','user_info.uid');
        })->orderBy('time','desc')->where('content','like','%科%技%')->get();

       return view('homes/index',['index'=>$index]);
    }
    
}
