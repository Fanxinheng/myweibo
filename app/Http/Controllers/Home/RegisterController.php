<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\user;

use Session;

class RegisterController extends Controller
{
   
    public function index()
    {
        //
        return view('homes/register');
    }
    
    public function verification(Request $request)
    {	
        
    	$res = $request->input('phone');
    	// dd($res);die;
        $phone = user::where('phone','=',$res)->value('phone');
        if($phone){
            echo "1";
        }else{
            echo "0";
        }
        // echo $phone;
    }

    public function code(Request $request)
    {
    	$res = Session('code');
    	echo $res;
    }

    
}
