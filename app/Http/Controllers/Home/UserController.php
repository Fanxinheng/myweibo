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
use App\Http\Model\message;
use App\Http\Model\report;
use App\Http\Controllers\Controller;
use zgldh\QiniuStorage\QiniuStorage;

use \DB;
use Session;

class UserController extends Controller
{
    //用户个人中心页
    public function index()
    {
        //缓存的用户id
        $id=Session('uid');

        //获取系统消息的个数
        $message = message::where('uid',$id)->where('status',0)->count();

        //将消息放入缓存
        Session(['message'=>$message]);

        //获取未读的点赞个数
        $point = point::where('uid',$id)->where('status',0)->count();

        //将消息放入缓存
        Session(['point'=>$point]);

        //获取未读的评论个数
        $replay = replay::where('uid',$id)->where('status',0)->count();

        //将消息放入缓存
        Session(['replay'=>$replay]);

        //获取未读的转发个数
        $forward = forward::where('uid',$id)->where('status',0)->count();

        //将消息放入缓存
        Session(['forward'=>$forward]); 

        //查询用户的所有信息
        $rev = user_info::where('uid','=',$id)->first();

        //查询用户的帖子和评论
        $res = contents::where('uid',$id)->with(['replay'=>function ($query){
            $query->orderBy('time','desc');
        }],'replay.user_info')->orderBy('time','desc')->paginate(5);

        //跳转页面
        return view('homes.user.index',['res'=>$res,'rev'=>$rev,'message'=>$message,'point'=>$point,'replay'=>$replay,'forward'=>$forward]);
    }

    //照片页面
    public function photo()
    {
        //获取session
        $uid = Session('uid');

        //查询用户的帖子所有信息
        $res = contents::select('time','image','cid')->whereNotNull('image')->where('uid',$uid)->orderBy('time','desc')->paginate(5);

        //查询用户的所有的信息
        $rev = user_info::where('uid',$uid)->first();

        //获取微博评论的消息
        $replay = Session('replay');

        //获取微博评论的消息
        $forward = Session('forward');

        //获取微博评论的消息
        $message = Session('message');

        //获取微博评论的消息
        $point = Session('point');

        //跳转到相册管理页面
        return view('homes.user.photo',['res'=>$res,'rev'=>$rev,'message'=>$message,'point'=>$point,'replay'=>$replay,'forward'=>$forward]);

    }

    //微博的点赞页面
    public function point()
    {
        //获取缓存的用户id
        $uid=Session('uid'); 

        //定义一个数组
        $status['status'] = 1; 

        //将所有的消息设为已读
        point::where('uid',$uid)->update($status);

        //修改缓存的值
        $point = Session(['point'=>'0']);

        //获取微博评论的消息
        $replay = Session('replay');

        //获取微博评论的消息
        $forward = Session('forward');

        //获取微博评论的消息
        $message = Session('message');

        //获取用户的信息
        $rev = user_info::where('uid',$uid)->first();

        //获取点赞表和帖子表的信息
        $res = point::where('uid',$uid)->with('user_info','content.user_info')->orderBy('ptime','desc')->paginate(5);


        //页面跳转
        return view('homes/user/point',['res'=>$res,'rev'=>$rev,'message'=>$message,'point'=>$point,'replay'=>$replay,'forward'=>$forward]);

    }

     //评论页面
    public function replay()
    {
        //获取缓存中的用户id
        $uid = Session('uid');

        //获取用户的个人信息
        $rev = user_info::where('uid',$uid)->first();

        //定义一个数组
        $status['status'] = 1; 

        //将所有的消息设为已读
        DB::table('replay')->where('uid',$uid)->update($status);

        //修改缓存的值
        $replay = Session(['replay'=>'0']);

        //获取微博评论的消息
        $point = Session('point');

        //获取微博评论的消息
        $forward = Session('forward');

        //获取微博评论的消息
        $message = Session('message');

        //根据用户uid获取帖子的内容回复及个人信息       
        $res = replay::where(['uid'=>$uid])->with(['content','user_info'])->orderBy('time','desc')->paginate(5);

        //页面跳转
        return view('homes/user/replay',['res'=>$res,'rev'=>$rev,'message'=>$message,'point'=>$point,'replay'=>$replay,'forward'=>$forward]);

    }

    //转发页面
    public function forward()
    {
        //获取用户的id
        $uid = Session('uid');

        //获取用户的个人信息
        $rev = user_info::where('uid',$uid)->first();

        //定义一个数组
        $status['status'] = 1;

        //将所有转发消息设置为已读
        DB::table('forward')->where('uid',$uid)->update($status);

        //修改缓存的值
        $forward = Session(['forward'=>'0']);

        //获取微博评论的消息
        $point = Session('point');

        //获取微博评论的消息
        $replay = Session('replay');

        //获取微博评论的消息
        $message = Session('message');

        //查询信息
        $res = forward::where(['uid'=>$uid])->with(['contents','user_info'])->orderBy('time','desc')->paginate(5);

        //页面跳转
        return view('homes/user/forward',['res'=>$res,'rev'=>$rev,'message'=>$message,'point'=>$point,'replay'=>$replay,'forward'=>$forward]);

    }

     //系统消息页面
    public function message()
    {

        //获取缓存中的id
        $uid = Session('uid');

        //获取用户的个人信息
        $rev = user_info::where('uid',$uid)->first();

        //获取微博评论的消息
        $replay = Session('replay');

        //获取微博评论的消息
        $forward = Session('forward');

        //获取微博评论的消息
        $point = Session('point');

        //获取系统消息
        $res = message::where('uid',$uid)->orderBy('time','desc')->paginate(5);

        //获取系统消息的个数
        $num = $res->count();

        //定义一个数组
        $r = [];

        //将状态放入数组中
        $r['status']='1';

        //修改系统消息的状态为已读
        DB::table('message')->where('uid',$uid)->update($r);

        //定义一个数组
        $status['status'] = 1;

        //将所有转发消息设置为已读
        DB::table('message')->where('uid',$uid)->update($status);

        //修改缓存的值
        $message = Session(['message'=>'0']);


        //跳转页面
        return view('/homes/user/message',['res'=>$res,'num'=>$num,'rev'=>$rev,'message'=>$message,'point'=>$point,'replay'=>$replay,'forward'=>$forward]);

    }


    //删除微博
    public function delete($id)
    {

        //获取用户的id
        $uid = Session('uid');

        //获取用户的积分
        $num = user_info::where('uid',$uid)->value('socre');
        
        //积分减五
        $num1['socre'] = $num - 5;

        //修改用户的积分
        user_info::where('uid',$uid)->update($num1);

        //删除评论
        replay::where('tid',$id)->delete();

        //删除点赞
        point::where('tid',$id)->delete();        

        //删除转发
        forward::where('tid',$id)->delete();

        //删除举报
        report::where('tid',$id)->delete();

        //删除七牛云的照片
        $image = contents::where('cid',$id)->value('image');


        if($image){

            //初始化七牛云
            $disk = QiniuStorage::disk('qiniu');


            $img = rtrim($image,'##');

            $imgs = explode('##',$img);

            foreach($imgs as $i){
                //删除云中图片
                $disk->delete($i);
            }

        }

        //删除此微博内容
        contents::where('cid',$id)->delete();

        //页面跳转
        return $num1;

    }

    //删除评论的微博
    public function replayDelete()
    {

        //获取回复帖子的id
        $id=$_POST['id'];
        
        //查询回复的微博的id
        $tid = replay::where('id',$id)->value('tid');

        //查询微博信息的评论条数
        $rnum = contents::where('cid',$tid)->value('rnum');

        //帖子数减一
        $res1['rnum'] = $rnum - 1;

        //修改表中的字段
        $v = DB::table('contents')->where('cid',$tid)->update($res1);

        //删除微博评论
        replay::where('id',$id)->delete();

        //获取登录用户的id
        $uid = Session('uid');

        //查询用户未读的回复消息
        $status = replay::where('uid',$uid)->where('status',0)->count();

        //将数据存入数组
        $res1['status'] = $status;

        $res1['tid'] = $tid; 

        //页面跳转
        return $res1;

    }

   
    //评论微博功能
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

            //获取登录用户的id
            $soc['socre'] = user_info::where('uid',$res['rid'])->value('socre');

        }
        //将用户名添加在数组中
        $res['nickName'] = user_info::where('uid',$res['rid'])->value('nickName'); 

        //将未读数加入    
        $res['status'] = replay::where('uid',$res['rid'])->where('status','0')->count();

        //将回复的帖子id放入数组中
        $res['id'] = replay::max('id');

        $res['photo'] = user_info::where('uid',$res['uid'])->value('photo');

        $res['time'] = date('Y-m-d H:i:s',time());

        //将回帖数放入一个数组中
        $res['replay'] = $v;

        //将积分放入一个数组中
        $res['socre'] = $soc['socre'];

        return $res;
    } 


    //点赞功能的实现
    public function pointFun(){

        //获取用户的id
        $res1['pid'] = Session('uid');

        //获取帖子id
        $res1['tid'] = $_GET['cid'];

        //判断是否为同一用户点赞同一微博
        $bool = point::where('pid',$res1['pid'])->where('tid',$res1['tid'])->value('id');

        if($bool){
            
            return 0;
        }
        
        //获取发帖人的id
        $res1['uid'] = contents::where('cid',$_GET['cid'])->value('uid');

        //获取点赞时间
        $res1['ptime'] = time();

        //将数组存入数据库中
        point::insert($res1);

        //获取传过来的帖子id
        $pnum = contents::where('cid',$_GET['cid'])->value('pnum');

        //点赞加一
        $num['pnum'] = $pnum + 1;

        //修改表中的字段
        $res = contents::where('cid',$_GET['cid'])->update($num);
        
        //获取帖子里的未读点赞
        $num['point'] = point::where('uid',$res1['pid'])->where('status',0)->count();

        return $num;

    }

    //转发功能的实现
    public  function  ward () 
    {

        //获取缓存的id
        $res['fid'] = session('uid');

        //获取传过来的帖子的id值
        $res['tid'] = $_GET['tid'];

         //获取发帖人的id
        $res['uid'] = contents::where('cid',$res['tid'])->value('uid');

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
            $socre['socre'] = user_info::where('uid',$res['fid'])->value('socre');

        }

        //获取回帖内容
        $res['fcontent'] = $_GET['rcon'];       

        //获取时间
        $res['time']=time();

        //将数值添加到数据库中
        $re = forward::insert($res);

        //将转发量放入数组中
        $can['fnum'] = $rnum['fnum'];

        //将登录这积分放入数组中
        $can['socre'] = $socre['socre'];

        //将未读消息放入数组中
        $can['news'] = forward::where('uid',$res['uid'])->where('status',0)->count();

        if($re){
            return $can;
        }else{
            echo 0;
        }

    }

    //删除微博全部图片
    public function photoDelete()
    {
        //获取用户的id
        $uid = session('uid');

        //定义一个空数组
        $re['image'] = Null;

        //删除七牛云的照片
        $image = contents::where('uid',$uid)->value('image');

        if($image){

            //初始化七牛云
            $disk = QiniuStorage::disk('qiniu');

             $img = rtrim($image,'##');

            $imgs = explode('##',$img);

            foreach($imgs as $i){
                //删除云中图片
                $disk->delete($i);
            }
        }

         //删除所有微博图片
        $res = contents::where('uid',$uid)->update($re);

       
    }

    //删除一个图片
    public function photomove()
    {

        //获取帖子id
        $cid = $_POST['cid'];

        //定义一个空数组
        $re['image'] = Null;

        //删除七牛云的照片
        $image = contents::where('cid',$cid)->value('image');

        $img = rtrim($image,'##');

        $imgs = explode('##',$img);

        if($imgs){

            //初始化七牛云
            $disk = QiniuStorage::disk('qiniu');

            //删除云中图片
            $disk->delete($imgs);

        }

         //删除所有微博图片
        $res = contents::where('cid',$cid)->update($re);

        return 1;

    }


   
}
