<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\user;
use App\Http\Model\user_info;
use App\Http\Model\label;
use App\Http\Model\contents;
use App\Http\Model\user_attention;
use App\Http\Model\forward;
use App\Http\Model\report;
use App\Http\Model\replay;

use zgldh\QiniuStorage\QiniuStorage;

use Session;

class BlogController extends Controller
{

    //微博举报
	public function report (Request $request)
    {
        //获取登录用户ID
        $res['rid'] = Session('uid');

        //获取举报微博ID
        $res['tid'] = $request->input('cid');

        //获取被举报者ID
        $res['uid'] = contents::where('cid',$request->input('cid'))->value('uid');

        //获取举报事件
        $res['time'] = time();

        //将数据插入数据库
        $bool = report::insert($res);

        //举报微博举报次数+1
        $report = contents::where('cid',$request->input('cid'))->value('report');

        $num['report'] = $report + 1;

        $data = contents::where('cid',$request->input('cid'))->update($num);

        if($bool && $data){
            echo 1;
        }else{
            echo 0;
        }
    }

    //微博转发页面
    public function forward ($id)
    {
    	// //获取登录用户ID
        $uid = Session('uid');

  	    //查询标签内容
        $label = label::get();

        //查询登录用户信息
	 	$user = user_info::where('uid',$uid)->first();

	 	//查询登录用户关注数量
	 	$unum = user_attention::where('uid',$uid)->count();

	 	//查询登录用户粉丝数量
	 	$gnum = user_attention::where('gid',$uid)->count();

	 	//查询登录用户微博数量
	 	$cnum = contents::where('uid',$uid)->count();

        //查看微博内容
    	$content = contents::join('user_info','contents.uid','=','user_info.uid')->where('cid',$id)->first();

        //查询转发信息
    	$forward = forward::join('user_info','forward.fid','=','user_info.uid')->where('tid',$id)->orderBy('time','desc')->get();

    	return view('homes/blog/forward',['uid'=>$uid,'label'=>$label,'user'=>$user,'unum'=>$unum,'gnum'=>$gnum,'cnum'=>$cnum,'content'=>$content,'forward'=>$forward]);
    	
    }


    //微博评论页面
    public function replay ($id)
    {
        // //获取登录用户ID
        $uid = Session('uid');

        //查询标签内容
        $label = label::get();

        //查询登录用户信息
        $user = user_info::where('uid',$uid)->first();

        //查询登录用户关注数量
        $unum = user_attention::where('uid',$uid)->count();

        //查询登录用户粉丝数量
        $gnum = user_attention::where('gid',$uid)->count();

        //查询登录用户微博数量
        $cnum = contents::where('uid',$uid)->count();

        //查看微博内容
        $content = contents::join('user_info','contents.uid','=','user_info.uid')->where('cid',$id)->first();

        //查询评论信息
        $replay = replay::join('user_info','replay.rid','=','user_info.uid')->where('tid',$id)->orderBy('time','desc')->get();

        return view('homes/blog/replay',['uid'=>$uid,'label'=>$label,'user'=>$user,'unum'=>$unum,'gnum'=>$gnum,'cnum'=>$cnum,'content'=>$content,'replay'=>$replay]);
        
    }


    //删除自己的微博
    public function destroy (Request $request)
    {
        //获取删除ID
        $cid = $_GET['did'];

        //删除此微博的转发
        $bool = forward::where('tid',$cid)->delete();

        //删除此微博的评论
        $bool1 = replay::where('tid',$cid)->delete();

        //删除此微博的举报
        $bool2 = report::where('tid',$cid)->delete();

        //删除七牛云微博图片
        $image = contents::where('cid',$cid)->value('image');

        if($image){

            //初始化七牛云
            $disk = QiniuStorage::disk('qiniu');

            //删除云中图片
            $disk->delete($image);

        }

        //删除此微博内容
        $bool3 = contents::where('cid',$cid)->delete();

        //查询登录用户微博数量
        $cnum = contents::where('uid',Session('uid'))->count();
        
        return $cnum;


        
    }
}
