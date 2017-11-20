<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\user;
use App\Http\Model\user_info;
use Hash;
use Session;

class LoginController extends Controller
{
    //
    public function index(Request $request)
    {   

    	return view('homes.login');
    	
    }

    //验证手机号是否已注册
    public function pho(Request $request)         
    {
    	//获取form表单填写的手机
        $pho = $request->input('pho'); 

        //在数据表中查询填写的手机号        
        $res = user::where('phone',$pho)->get();            
        
        //返回查询结果
        echo $res;      
    }

    //验证密码是否与数据库中的一致
    public function pass(Request $request)         
    {
    	//获取表单中填写的密码和手机号
       	$pas = $request->only('pas','pho');
       	// dd($pas);       	

        //在数据表中查询填写的手机号并获取一条数据       
        $res = user::where('phone',$pas['pho'])->first();            
      	
      	//判断form获取的密码和数据库中是否一致(hash的检测方法,指定子串和加密的判断)
       	if (Hash::check($pas['pas'], $res->password)) {
    		echo "1";
		}else{
			echo "0";
		}
    }

    // 检测昵称是否存在
    public function nick(Request $request)
    {   
        //获取form中的手机号
        $req = $request->input('phone');

        //在user表中根据手机号获取其ID
        $res = user::where('phone',$req)->value('id');

        //在user_info表中根据user表中的id查出其uid
        $nick = user_info::where('uid','=',$res)->value('uid');

        //判断uid是否为空(因为上面传过来的是null)
        if($nick==null){

            Session(['uid'=>$nick]);
            return redirect('/home/details');
           
        }else{

             Session(['uid'=>$nick]);
            return redirect('/home/login');
 
        }

    }
    
    
}
