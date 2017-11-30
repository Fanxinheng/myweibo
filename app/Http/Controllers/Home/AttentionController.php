<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\user;
use App\Http\Model\user_attention;
use App\Http\Model\user_info;
use \DB;
use \Redis;

use Session;

class AttentionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //关注页
    public function index()
    {

        //获取缓存中的id
        $uid = Session('uid');

        //获取登录用户的信息
        $rev = user_info::where('uid','=',$uid)->first();

        //根据id查询关注的所有人
        $res = user_attention::join('user_info','user_attention.gid','=','user_info.uid')->where('user_attention.uid',$uid)->orderBy('time','desc')->paginate(5);

        //获取微博评论的消息
        $replay = Session('replay');

        //获取微博评论的消息
        $forward = Session('forward');

        //获取微博评论的消息
        $message = Session('message');

        //获取微博评论的消息
        $point = Session('point');

        //跳转个人关注页
        return view('homes/user/attention',['res'=>$res,'rev'=>$rev,'message'=>$message,'point'=>$point,'replay'=>$replay,'forward'=>$forward]);
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
        echo "ha";
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
        echo "show";
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
     //取消关注
    public function destroy($id)
    {

        //获取缓存中的id
        $uid = Session('uid');

        //从数据库删除关注的信息
        $res = user_attention::where(['gid'=>$id,'uid'=>$uid])->delete();

        //跳转到控制器中
        return 1;

    }
}
