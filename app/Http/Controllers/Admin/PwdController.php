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

    //修改管理员信息方法
    public function update(Request $request,$id)
    {

        //正则验证
       $this->validate($request, [
            'name' => 'regex:/^\w{6,12}$/',
            'oldpwd' => 'regex:/^\w{6,12}$/',
            'password' => 'regex:/^\w{6,12}$/',
            'againpwd' => 'regex:/^\w{6,12}$/',
            'againpwd' => 'same:password'

        ],[
            'name.regex' => '*请输入6~12位用户名*',
            'oldpwd.regex' => '*请输入6~12位密码*',
            'password.regex' => '*请输入6~12位密码*',
            'againpwd.same' => '*两次新密码不一致*'

        ]);


        if($request->has('name')){

             //获取用户名
            $arr['name'] = $request->input('name');
        }


        if($request->has('oldpwd')){

            //获取数据信息
            $res = admin::where('id',$id)->first();

             //获取页面的原密码
            $pass = $request->input('oldpwd');

            // 将页面密码与数据库密码进行验证
            if (!Hash::check($pass,$res['password'])) {

                return back()->with('msg','抱歉，您输入的密码与原密码不符');
            }

            //哈希加密
            $arr['password'] = Hash::make($request['password']);

            //将数据写入数据库
            $data = admin::where('id',$id)->update($arr);

            if ($data) {
                    //消除session里面的pid弹回登录页面
                    $request->session()->forget('pid');
                    
                    return redirect('admin/')->with('edit','修改成功,请再次登录！');
            }else {
                    return back()->with('msg','个人信息修改失败！');
            }


        }

            //判断如果不为空
            if(!empty($arr)){

                //将数据写入数据库
                $data = admin::where('id',$id)->update($arr);

                if ($data) {

                    return redirect('/admin/admins/')->with('msg','用户名修改成功！');
                } else {
                    return back()->with('msg','个人信息修改失败！');
                }
            }else{

                //如果为空在当前页面提示
                return redirect('/admin/admins/')->with('msg','您还未修改您的信息');

            }

    }

    //修改管理员头像
    public function pic (Request $request)
    {
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


    public function delete(Request $request,$id)
    {
        //删除session内的信息
        $request->session()->forget('pid');

        return redirect('/admin/')->with('out','退出成功！');
    }
}
