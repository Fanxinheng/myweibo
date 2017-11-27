<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\admin;
use Hash;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $admin = admin::paginate(2);
        // var_dump($admin);
        return view('admins/admins/index',['admin'=>$admin,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins/admins/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //正则验证
        $this->validate($request, [
            'name' => 'required|regex:/^\w{6,12}$/',
            'password' => 'required|regex:/^\w{6,12}$/', 
            'repass' => 'same:password',
            'phone' => 'required|regex:/^1[34578]\d{9}$/',


            
        ],[
            'name.required' => '*用户名不能为空*', 
            'name.regex' => '*请输入6~12位用户名*',
            'password.required' => '*密码不能为空*', 
            'password.regex' => '*请输入6~12位密码*',
            'repass.same' => '*两次密码不一致*',
            'phone.required' => '*手机号码不能为空*', 
            'phone.regex' => '*手机号码合适不正确*',
        ]);

        //获取用户名
        $res['name'] = $request->input('name');

        $name = admin::where('name','=',$res['name'])->first();

        //判断用户名是否存在
        if(isset($name)){
            return back()->with('msg','抱歉，此用户名已存在！');
        }

        $res['phone'] = $request->input('phone');

        $phone = admin::where('phone','=',$res['phone'])->first();

        //判断手机号是否存在
        if(isset($phone)){
            return back()->with('msg','抱歉，此手机号已存在！');
        }

        $res['password'] = Hash::make($request->input('password'));

        //将数据插入数据库
        $admin = admin::insert($res);

        // var_dump($admin);
        // 判断管理员是否添加成功
        if($admin){
            return redirect('/admin/admins')->with('msg','管理员添加成功！');
        } else {
            return back()->with('msg','管理员添加失败！');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //获取修改管理员信息
        $res = admin::where('id','=',$id)->first();
        // var_dump($res);
        return view('admins/admins/edit',['res'=>$res]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //获取修改后的信息
        $res = $request->only('name','phone');
        // var_dump($res);
        $date = admin::where('id','=',$id)->update($res);

        // echo $date;
        if($date){
            return redirect('/admin/admins')->with('msg','管理员修改成功！');
        } else {
            return back()->with('msg','管理员修改失败！');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $date = admin::where('id','=',$id)->delete();

        if($date){
            return redirect('/admin/admins')->with('msg','管理员删除成功！');
        } else {
            return back()->with('msg','管理员删除失败！');
        }
    }
}
