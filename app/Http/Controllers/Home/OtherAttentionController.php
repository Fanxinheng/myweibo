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

class OtherAttentionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //关注页
    public function index($uid)
    {

        //获取微博评论的消息
        $message = Session('message');

        //获取用户的信息
        $rev = user_info::where('uid','=',$uid)->first();

        //获取关注人的信息
        $res = user_attention::join('user_info','user_attention.gid','=','user_info.uid')->where('user_attention.uid',$uid)->orderBy('time','desc')->paginate(5);

         //获取登录用户的信息
        $id = Session('uid');

        //查询用户的信息是否存在于数组中
        $r = user_attention::where('uid',$id)->where('gid',$uid)->get();

        if($r){

            $re = 1;

        }else{

            $re = 0;

        }
        
        //页面跳转
        return view('homes/otherUser/attention',['res'=>$res,'rev'=>$rev,'message'=>$message,'re'=>$re]);
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
        //获取缓存的id
        $uid = Session('uid');

        $res = user_attention::where(['gid'=>$id,'uid'=>$uid])->delete();

        return 1;

    }
}
