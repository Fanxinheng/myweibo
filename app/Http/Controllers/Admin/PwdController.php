<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use zgldh\QiniuStorage\QiniuStorage;

use App\Http\model\admin;

use Session;
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

    public function self (Request $request)
    {
        dd($request->except('_token'));

        //修改管理员头像
        if($request->hasFile('pic')){

            //初始化七牛云
            $disk = QiniuStorage::disk('qiniu');

            //获取文件
            $file = $request->file('pic');

            //拼装文件名
            $name = rand(1111,9999).time();

            $suffix = $request->file('pic')->getClientOriginalExtension();

            $pic = 'admins/uploads/'.$name.'.'.$suffix;

            //上传文件
            $disk->put($pic,file_get_contents($file->getRealPath()));

            $res['pic'] = $pic;

            //删除旧的管理员头像
            $old = admin::where('id',Session('pid'))->value('pic');

            $data = $disk->delete($old);

            //更新数据库
            admin::where('id',Session('pid'))->update($res);

            return $res['pic'];
        }

        //修改其他信息
        $res['name'] = $_POST['name'];

        //更新数据库
        $bool = admin::where('id',Session('pid'))->update($res);

        if($bool){
            return redirect('admin/admins')->with('msg','管理员信息修改成功！');
        }else{
            return back();
        }
    }

    public function delete(Request $request,$id)
    {

        //删除session内的信息
        $request->session()->forget('pid');

        return redirect('/admin/');
    }
}
