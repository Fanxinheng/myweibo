<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
	//加载修改页面
    public function edit ()
    {
    	return view('admins/config/edit');
    }

    //执行修改功能
    public function update ()
    {
    	
    }
}
