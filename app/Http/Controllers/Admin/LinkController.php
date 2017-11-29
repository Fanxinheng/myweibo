<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\link;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     * 将数据库信息传递到列表页面
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        //对数据库进行倒叙排列模糊查询收缩n条数据
        $res = link::where('user','like','%'.$request->input('search').'%')->orderBy('user','asc')->paginate($request->input('paging'));


        //将数据传递到页面中
        return view('admins/link/index',['res'=>$res,'request'=>$request]);

    }

    /**
     * Show the form for creating a new resource.
     *     跳转至链接添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admins/link/add');
    }

    /**
     * Store a newly created resource in storage.
     *     添加链接
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         //表单验证
            $this->validate($request, [
            'user' => 'required',
            'link' => 'required',

        ],[
            'user.required' => '商品名不能为空！',
            'link.required' => '链接地址不能为空！',

        ]);
         //去除不需要的参数
            $res = $request->except('_token');
            //获取当前时间戳
            $res['time'] = time();
            //获取友情链接的状态
            $res['status'] = "0";
            //添加至数据库
            $data = link::insert($res);
            //判断如果成功去列表页，如果失败回到当前页面
            if($data){
                return redirect('/admin/link/')->with('create','添加链接成功！');
            } else {
                return back()->withInput();
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
     *跳转至修改页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //链接友情链接数据库，获取对应id的链接
        $res = link::where('id',$id)->first();
        //进信息传递到修改页面
        return view('/admins/link/edit',['res'=>$res]);

    }

    /**
     * Update the specified resource in storage.
     *             修改方法
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //闪存信息，去除不要的参数
        $res = $request->except('_token','_method');
        //获取修改时间戳
        $res['time'] = time();

         //数据库获取对应id的参数执行更新
        $date = link::where('id',$id)->update($res);
        //如果更新成功返回链接列表页，否则返回当前页面。
        if ($date) {
            return redirect('/admin/link/')->with('create','修改链接成功！');
        } else {
            return back();
        }


    }

    /**
     * Remove the specified resource from storage.
     *     执行删除方法
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 获取id对数据库进行删除
        $date = link::where('id',$id)->delete();


        //判断如果成功去列表页，如果失败回到当前页面
        if ($date) {
            return redirect('/admin/link')->with('create','删除链接成功！');
        } else {
            return back();
        }

    }
}
