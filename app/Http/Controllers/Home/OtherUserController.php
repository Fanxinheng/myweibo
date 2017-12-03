<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
// use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests;
use App\Http\Model\contents;
use App\Http\Model\point;
use App\Http\Model\replay;
use App\Http\Model\forward;
use App\Http\Model\user_info;
use App\Http\Model\user_attention;

use App\Http\Controllers\Controller;

use \DB;
use Session;

class OtherUserController extends Controller
{
    //用户个人中心页
    public function index($id)
    {   
        //获取缓存的id
        $sid = Session('uid');

        //判断如果传过来的id为缓存id'
        if($id==Session('uid')){

            //跳转到个人中心
            return redirect('/home/user');

        }

        //查询用户的信息是否存在于数组中
        $r = user_attention::where('uid',$sid)->where('gid',$id)->count();

        if($r>0){

            $re = 1;

        }else{

            $re = 0;

        }

        //获取微博评论的消息
        $message = Session('message');

        //查询用户的所有信息
        $rev = user_info::where('uid','=',$id)->first();

        //查询用户的帖子和评论
        $res = contents::where('uid',$id)->with(['replay'=>function ($query){
            $query->orderBy('time','desc');
        }],'replay.user_info')->orderBy('time','desc')->paginate(5);

        //跳转页面
        return view('homes/otherUser/index',['res'=>$res,'rev'=>$rev,'sid'=>$sid,'message'=>$message,'re'=>$re]);
    }

     //照片
    public function photo($id)
    {
        //查询所有照片
        $res = contents::select('time','image')->whereNotNull('image')->where('uid',$id)->orderBy('time','desc')->paginate(5);

        //用户的信息
        $rev = user_info::where('uid',$id)->first();

        //获取微博评论的消息
        $message = Session('message');

        //获取登录用户的信息
        $uid = Session('uid');

        //查询用户的信息是否存在于数组中
        $r = user_attention::where('uid',$uid)->where('gid',$id)->get();

        if($r){

            $re = 1;

        }else{

            $re = 0;

        }

        //页面跳转
        return view('homes/otherUser/photo',['res'=>$res,'rev'=>$rev,'message'=>$message,'re'=>$re]);
    }
//=================================功能===================================================================//

     //评论微博
    public function type()
    {
        //获取缓存的id
        $res['rid'] = Session('uid');

        //获取发帖人的id
        $res['uid'] = DB::table('contents')->where('cid',$_GET['tid'])->first()->uid;

        //获取帖子id
        $res['tid'] = $_GET['tid'];

        //获取回帖内容
        $res['rcontent'] = $_GET['conn'];

        //获取回帖时间
        $res['time'] = time();

        //将回帖内容放入回帖表中
        $r = replay::insert($res);

        //获取帖子的回帖量
        $v = contents::where('cid',$_GET['tid'])->value('rnum');

        //回帖加一
        $v = $v+1;

        //将数字存入数组
        $res1['rnum']=$v;

        //修改表中的字段
        contents::where('cid',$_GET['tid'])->update($res1);

        if ($res['rid'] != $res['uid']) {

            //获取用户的积分
            $socre = user_info::where('uid',$res['rid'])->value('socre');

            //将用户的积分加一
            $soc['socre'] = $socre + 1;

            //修改表中的字段
            user_info::where('uid',$res['rid'])->update($soc);

            //获取发帖人的积分
            $socre1 = user_info::where('uid',$res['uid'])->value('socre');

            //将发帖人的积分加一
            $soc1['socre'] = $socre1 + 1;

            //修改表中的字段
            user_info::where('uid',$res['uid'])->update($soc1);

        }else{

            //发帖人的积分
            $soc1['socre'] = user_info::where('uid',$res['uid'])->value('socre');

        }
        //将用户名添加在数组中
        $res['nickName'] = user_info::where('uid',$res['rid'])->value('nickName'); 

        //将时间格式化
        $res['time'] = date('Y-m-d H:i:s',time());

        //获取最后的id
        $res['id'] = replay::max('id');

        //获取图片
        $res['photo'] = user_info::where('uid',$res['rid'])->value('photo');

        //将回帖数放入一个数组中
        $res['replay'] = $v;

        //将积分放入一个数组中
        $res['socre'] = $soc1['socre'];

        return $res;
    } 

     //删除评论的微博
    public function replayDelete()
    {

        $id=$_POST['id'];
        
        //查询回复的微博的id
        $tid = replay::where('id',$id)->value('tid');

        //查询发博的id
        $uid = replay::where('id',$id)->value('uid');

        //查询微博信息的评论条数
        $rnum = contents::where('cid',$tid)->value('rnum');

        //帖子数减一
        $res1['rnum'] = $rnum - 1;

        //修改表中的字段
        $v = DB::table('contents')->where('cid',$tid)->update($res1);

        //删除微博评论
        replay::where('id',$id)->delete();

        $res1['tid'] = $tid;

        //页面跳转
        return $res1;

    }

   
    //回复功能
    public function ward()
    {

        //获取缓存的id
        $res['fid'] = session('uid');

        //获取传过来的帖子的id值
        $res['tid'] = $_GET['tid'];

         //获取发帖人的id
        $res['uid'] = contents::where('cid',$res['tid'])->value('uid');

        //获取回帖内容
        $res['fcontent'] = $_GET['rcon'];       

        //获取时间
        $res['time']=time();

        //将数值添加到数据库中
        $re = forward::insert($res);

        //查询帖子的准发量
        $num = contents::where('cid',$res['tid'])->value('fnum');

        //数值加一
        $rnum['fnum'] = $num + 1;

        //修改
        $num = contents::where('cid',$res['tid'])->update($rnum);

         if($res['uid'] != $res['fid']){

            //获取转发人的积分
            $socr = user_info::where('uid',$res['fid'])->value('socre');

            //数值加er
            $socre['socre'] = $socr + 2;

            //放入数据库中
            $fi = user_info::where('uid',$res['fid'])->update($socre);

            //获取转发人的积分
            $socr = user_info::where('uid',$res['uid'])->value('socre');

            //数值加er
            $socre['socre'] = $socr + 2;

            //放入数据库中
            $fi = user_info::where('uid',$res['uid'])->update($socre);

        }else{

            //获取转发人的积分
            $socre['socre'] = user_info::where('uid',$res['uid'])->value('socre');

        }

        //将转发量放入数组中
        $can['fnum'] = $rnum['fnum'];

        //将登录这积分放入数组中
        $can['socre'] = $socre['socre'];

        if($re){
            return $can;
        }else{
            echo 0;
        }
    }

    //点赞功能的实现
    public function pointFun(){

        //获取用户的id
        $res1['pid'] = Session('uid');

        //获取帖子id
        $res1['tid'] = $_GET['cid'];
        
        //获取发帖人的id
        $res1['uid'] = contents::where('cid',$_GET['cid'])->value('uid');

        //获取点赞时间
        $res1['ptime'] = time();

        //判断是否为同一用户点赞同一微博
        $bool = point::where('pid',$res1['pid'])->where('tid',$res1['tid'])->value('id');

        if($bool){
            
            return 0;
        }

        //将数组存入数据库中
        point::insert($res1);

        //获取传过来的帖子id
        $pnum = contents::where('cid',$_GET['cid'])->value('pnum');

        //点赞加一
        $num['pnum'] = $pnum + 1;

        //修改表中的字段
        $res = contents::where('cid',$_GET['cid'])->update($num);

        return $num;

    } 

    //点击关注
    public function attentionAction($id)
    {
        //获取缓存的id
        $res['uid'] = Session('uid');

        //获取关注人的id
        $res['gid'] = $id;

        //获取关注时间
        $res['time'] = time();

        //判断数据库中是否村子此关注薪资
        $re = user_attention::where('uid',$res['uid'])->where('gid',$res['gid'])->count();

        if($re>0){

            //填到数据库
            $rev = user_attention::where('uid',$res['uid'])->where('gid',$res['gid'])->delete();

            //返回参数 
            return 1;

        }else{

            $rev = user_attention::insert($res);

            return 0;
        }

    }   

}
