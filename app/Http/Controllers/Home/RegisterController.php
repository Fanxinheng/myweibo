<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
   
    public function index()
    {
        //
        return view('homes.register');
    }

    public function verification(Requests $request)
    {
    	$res = $request->except('_token');
    	dd($res);
    }

    
}
