<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\notice;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询数据库notice表所有内容
        $res = notice::paginate(10);

        //返回到index页面视图中
        return view('admins/notice/index', ['res' => $res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins/notice/add');
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
            'title' => 'required',
            'content' => 'required',

        ],[
            'title.required' => '*公告标题不能为空*',
            'content.required' => '*公告内容不能为空*',
        ]);

        // 接收页面传过来的数据除了哈希验证
        $res = $request->except('_token');

        // 添加时间戳
        $res['time']=time();

        // 将数据添加到数据库
        $data = notice::insert($res);

        // 数据添加成功返回页面
         if($data){
             return redirect('admin/notice');
         } else {
             return back();
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
        // 从notice表查到要修改的数据
        $res = notice::where('id',$id)->first();
        return view('/admins/notice/edit',['res'=>$res]);
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
        // 接收从页面发送的新值
       $res= $request->except('_token','_method');

       // 创建时间戳
       $res['time']=time();

       //条件判断当前修改ID与新传的值ID一致更新数据库对应内容
       $data = notice::where('id',$id)->update($res);

        if ($data) {

            //更新成功后返回列表页面
            return redirect('/admin/notice/');
        } else {

            //不成功则返回修改页面
            return back();
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
        // 条件判断当前ID与页面要删除的值ID一致删除对应ID数据
        $data = notice::where('id',$id)->delete();

    }
}
