<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\user_info;
use App\Http\Model\contents;
use App\Http\Model\user;
use App\Http\Model\message;

use session;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取用户详细信息
        $res = user::join('user_info','user_info.uid','=','user.id')->where('nickName','like','%'.$request->input('search').'%')->paginate(10);

        return view('admins/user/index',['res'=>$res,'request'=>$request]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        // return view('admins/user/news');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //获取用户名
        $nickName = user_info::where('uid',$id)->value('nickName');
        
        //获取用户微博信息
        $res = contents::where('uid','=',$id)->orderBy('time','desc')->paginate(10);

        return view('admins/user/show',['nickName'=>$nickName,'res'=>$res]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo 'edit';
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
        //查询用户原来状态
        $date = user::where('id',$id)->value('status');
        
        if($date){

            //更新数据库
            $update = user::where('id',$id)->update(['status'=>0]);
            return 0;
        } else {

            //更新数据库
            $update = user::where('id',$id)->update(['status'=>1]);
            return 1;
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
        echo 'delete';
    }
}
