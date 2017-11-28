<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Gregwar\Captcha\CaptchaBuilder;
use Session;
use App\Http\Model\admin;
use Hash;



class LoginController extends Controller
{
	//加载登录主页面
    public function index ()
    {
    	return view('/admins/login/index');
    }

    //执行登录功能
    public function login (Request $request)
    {
    	//获取登录信息
    	$res = $request->except('_token');

        //将信息存入闪存
        $request->flashExcept('_token');

        //验证验证码
        if(Session('code') != $res['code']){
            return redirect('/admin')->with('msg','验证码不正确！');
        }

        //查询登录人信息
        $login = admin::where('phone','=',$res['phone'])->first();

        //判断用户名是存在
        if(!isset($login)){
            return redirect('/admin')->with('msg','用户名或密码不正确！');
        }

        //判断密码是否正确
        if(!Hash::check($res['password'],$login->password)){
        
            return redirect('/admin')->with('msg','用户名或密码不正确！');
        }

        //将登录成功后的用户ID存入缓存以便验证登录

        Session(['pid' => $login->id]);
        
        return redirect('/admin/index');

    }


    //加载二维码
    public function code ()
    {

        $builder = new CaptchaBuilder;
        $builder->build();
        session(['code' => $builder->getPhrase()]);
        header('Content-type: image/jpeg');
        $builder->output();

    }
}
