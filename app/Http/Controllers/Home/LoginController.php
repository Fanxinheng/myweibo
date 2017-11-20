<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\user;
use Hash;

class LoginController extends Controller
{
    //
    public function index(Request $request)
    {
    	return view('homes.login');
    	
    }
    // public function ph(Request $request)        //验证手机号是否存在
    // {
    //     $ph = $request->input('ph');         //获取form表单填写的手机
    //     $res = user::where('phone',$ph)->get();            //在数据表中查询填写的手机号
    //     echo $res;              //返回查询结果
    // }

    public function phone(Request $request){

    	$res = $request->input('phone');
    	
    	 $phone = user::where('phone','=',$res)->value('phone');
        if($phone){
            echo "1";
        }else{
            echo "0";
        }
    }
}
