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
        //获取分页信息
        //获取搜索全部信息
        // var_dump($request->all());

        //对数据库进行模糊查询
        $res = link::where('user','like','%'.$request->input('search').'%')->

        orderBy('user','asc')->
        //默认搜索5条数据
        paginate($request->input('paging',1));
        //echo "<pre>";
        // var_dump($res);

       /* $count = advert::count('id');
        $request['count'] = $coi
        var_dump($count);*/

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
                    //不能为空
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

            $res['status'] = "0";

            //打印form传过来的参数
            // var_dump($res);

            //添加至数据库
            $data = link::insert($res);
            // var_dump($data);
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
        //获取修改页面的id
        // var_dump($id);
        //链接友情链接数据库，获取对应id的链接
        $res = link::where('id',$id)->first();
        // var_dump($res);
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

        $res['time'] = time();

        // dd($res);

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

        //打印获取到的id
        // var_dump($id);
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
