<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\model\admin;
use Hash;
class PwdController extends Controller
{
    //修改管理员密码页面
    public function edit($id)
    {
        //获取数据库对应ID
        $res = admin::where('id',$id)->first();
        //将获取到的值传入修改页面中
        return view('/admins/admins/pwd',['res'=>$res]);
    }

    //修改管理员密码方法
    public function update(Request $request,$id)
    {

        //正则验证
       $this->validate($request, [
            'oldpwd' => 'required|regex:/^\w{6,12}$/',
            'password' => 'required|regex:/^\w{6,12}$/',
            'againpwd' => 'required|regex:/^\w{6,12}$/',
            'againpwd' => 'same:password'

        ],[
            'oldpwd.required' => '*原密码不能为空*',
            'oldpwd.regex' => '*请输入6~12位密码*',
            'password.required' => '*新密码不能为空*',
            'password.regex' => '*请输入6~12位密码*',
            'againpwd.same' => '*两次新密码不一致*'

        ]);

        //获取数据信息
        $res = admin::where('id',$id)->first();

        //获取原密码的值
        $requests = $request->except('_token');
        $pass = $request->input('oldpwd');

        // 将页面密码于数据库密码进行验证
        if (!Hash::check($pass,$res['password'])) {

            return back()->with('msg','抱歉，您输入的密码与原密码不符');

        }

        //哈希加密
        $hashpwd = Hash::make($requests['password']);
        //转换为数组
        $arr = array('password'=>$hashpwd );

        //将数据写入数据库
        $data = admin::where('id',$id)->update($arr);
        if ($data) {
            $request->session()->forget('pid');
            return redirect('admin/login');
        }else {
            return back()->with('msg','管理员密码修改失败！');
        }

    }

    public function delete(Request $request,$id)
    {

        //删除session内的信息
        $request->session()->forget('pid');

        return redirect('/admin/');
    }
}
