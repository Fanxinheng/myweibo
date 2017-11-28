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
     * 加载公告主页面
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //查询数据库notice表所有内容
        $res = notice::paginate(5);
        // $cont['content'] = notice::where('id',$res)->first('content');
        // $res = substr($cont,0,10);
        //返回到index页面视图中
        return view('admins/notice/index', ['res' => $res]);
    }

    /**
     * Show the form for creating a new resource.
     * 加载公告添加页面
     * @return \Illuminate\Http\Response
     */
    // 
    public function create()
    {
        return view('admins/notice/add');
    }

    /**
     * Store a newly created resource in storage.
     * 公告添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 
    public function store(Request $request)
    {
        // 接收页面发送的数据除了哈希验证
        $res = $request->except('_token');

        // 添加时间戳
        $res['time']=time();

        // 将数据添加到数据库
        $data = notice::insert($res);

        // 如果添加数据库成功则返回index方法从新执行
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
        
    }

    /**
     * Show the form for editing the specified resource.
     * 加载修改页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {   
        //从notice表查询到需要修改的数据
        $res = notice::where('id',$id)->first();

        return view('/admins/notice/edit',['res'=>$res]);
    }

    /**
     * Update the specified resource in storage.
     * 更新公告
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
     * 删除公告
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        // 条件判断当前ID与页面要删除的值ID一致删除对应ID数据
        $data = notice::where('id',$id)->delete();
    }
}
