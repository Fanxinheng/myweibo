<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\user;
use Hash;

use App\Http\Model\user_info;

class DetailsController extends Controller
{
    //
    public function index(Request $request)
    {	

    	return view('homes.details');
    
    }

    //检测昵称是否存在的方法
    public function uname(Request $request){

    	$res = $request->input('uname');

    	$uname = user_info::where('nickName','=,',$res)->value('nickName');
    	if($uname){
    		echo "1";
    	}else{
    		echo "0";
    	}

    }
}
