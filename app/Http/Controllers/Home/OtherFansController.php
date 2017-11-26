<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\user;
use App\Http\Model\user_attention;
use App\Http\Model\user_info;
use App\Http\Model\contents;
use Session;
class OtherFansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($uid)
    {

        //获取微博评论的消息
        $message = Session('message');

        //获取用户的信息
        $rev = user_info::where('uid','=',$uid)->first();

        //获取关注人及关注人的信息
        $res = user_attention::join('user_info',function($join){
            $join->on('user_attention.uid','=','user_info.uid');
        })->where('user_attention.gid',$uid)->get();

        //页面跳转
        return view('homes/otherUser/fans',['res'=>$res,'rev'=>$rev,'message'=>$message]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // echo "as";
        $gid = Session('uid');
        $res = user_attention::where(['gid'=>$gid,'uid'=>$id])->delete();
        return redirect('/home/fans');

    }
}
