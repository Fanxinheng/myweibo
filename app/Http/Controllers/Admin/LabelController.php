<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\model\label;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     * 列表显示页面
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取数据库信息
        $res = label::get();

        //把值传到列表页面
        return view('/admins/label/index',['res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //跳转标签添加页面
        return view('/admins/label/add');
    }

    /**
     * Store a newly created resource in storage.
     *     执行标签添加的方法到数据库
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //设定标签名不能为空
        $this->validate($request, [
            'lcontent' => 'required',
        ],[
            'lcontent.required' => '标签名不能为空',
        ]);

        //打印添加页面获取到的信息
        $res = $request->except('_token');

        $data = Label::insert($res);

        //判断如果添加成功前往列表页，如果失败回到当前页
        if ($data) {
            return redirect('/admin/label/')->with('create','添加标签成功！');
        }
            return back();

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
     * 跳转修改标签页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //通过id获取到相应的单条信息
        $res = label::where('id',$id)->first();

        //跳转到标签修改页面,将值一并传入
        return view('admins/label/edit',['res'=>$res]);
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
        //获取修改页面的信息
        $res = $request->except('_token','_method');

        // 对数据库进行修改
        $data = label::where('id',$id)->update($res);
        
        //判断如果修改成功就跳转到列表页面,失败返回当前页面
        if ($data) {
            return redirect('/admin/label/')->with('create','修改标签成功！');
        }else{
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     * 上除当条数据
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        //执行删除方法
        label::where('id',$id)->delete();
        
    }
}
