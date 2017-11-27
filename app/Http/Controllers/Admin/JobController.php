<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\job;


class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询职业内容
        $job = job::get();

        return view('admins/job/index',['job'=>$job]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins/job/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res['job'] = $request->input('job');
        //插入数据
        $bool = job::insert($res);

        if($bool){
            return redirect('admin/job')->with('create','用户职业添加成功！');
        }else{
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
        //查询职业信息
        $job = job::where('id',$id)->first();

        return view('admins/job/edit',['job'=>$job]);

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
        $res['job'] = $request->input('job');

        //更新数据
        $bool = job::where('id',$id)->update($res);

        if($bool){
            return redirect('admin/job')->with('edit','用户职业修改成功！');

        }else{
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

        //删除职业
        job::where('id',$id)->delete();

    }
}
