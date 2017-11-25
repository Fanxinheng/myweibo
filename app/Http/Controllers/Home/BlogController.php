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
use App\Http\Model\point;

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

        //判断是否为同一用户举报同一微博
        $bool = report::where('rid',$res['rid'])->where('tid',$res['tid'])->value('id');

        if($bool){
            return 0;
        }

        //获取被举报者ID
        $res['uid'] = contents::where('cid',$request->input('cid'))->value('uid');

        //获取举报事件
        $res['time'] = time();

        //将数据插入数据库
        $bool2 = report::insert($res);

        //举报微博举报次数+1
        $report = contents::where('cid',$request->input('cid'))->value('report');

        $num['report'] = $report + 1;

        $data = contents::where('cid',$request->input('cid'))->update($num);

        if($bool2 && $data){
            return 1;
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
    	$forward = forward::join('user_info','forward.fid','=','user_info.uid')->where('tid',$id)->orderBy('time','desc')->paginate(10);

        //查询用户关注信息
        $bool = user_attention::where('uid',$uid)->where('gid',$content->uid)->value('id');

    	return view('homes/blog/forward',['uid'=>$uid,'label'=>$label,'user'=>$user,'unum'=>$unum,'gnum'=>$gnum,'cnum'=>$cnum,'content'=>$content,'forward'=>$forward,'bool'=>$bool]);
    	
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
        $replay = replay::join('user_info','replay.rid','=','user_info.uid')->where('tid',$id)->orderBy('time','desc')->paginate(10);

        //查询用户关注信息
        $bool = user_attention::where('uid',$uid)->where('gid',$content->uid)->value('id');

        return view('homes/blog/replay',['uid'=>$uid,'label'=>$label,'user'=>$user,'unum'=>$unum,'gnum'=>$gnum,'cnum'=>$cnum,'content'=>$content,'replay'=>$replay,'bool'=>$bool]);
        
    }


    //删除自己的微博
    public function destroy (Request $request)
    {
        //获取此微博ID
        $cid = $_GET['did'];

        //删除此微博的转发
        forward::where('tid',$cid)->delete();

        //删除此微博的评论
        replay::where('tid',$cid)->delete();

        //删除此微博的举报
        report::where('tid',$cid)->delete();

        //删除此微博的点赞
        point::where('tid',$cid)->delete();

        //删除七牛云微博图片
        $image = contents::where('cid',$cid)->value('image');

        if($image){

            //初始化七牛云
            $disk = QiniuStorage::disk('qiniu');

            //删除云中图片
            $disk->delete($image);

        }

        //登录用户积分-5
        $socre = user_info::where('uid',Session('uid'))->value('socre');

        $num['socre'] = $socre - 5;

        user_info::where('uid',Session('uid'))->update($num);

        //删除此微博内容
        contents::where('cid',$cid)->delete();

        //查询登录用户微博数量
        $num['cnum'] = contents::where('uid',Session('uid'))->count();
        
        return $num;

    }


    //删除微博转发
    public function delete ()
    {

        //获取微博转发ID
        $id = $_GET['did'];

        //获取原微博id
        $tid = forward::where('id',$id)->value('tid');

        //此微博转发数量-1
        $fnum = contents::where('cid',$tid)->value('fnum');

        $fnums['fnum'] = $fnum - 1;

        $bool = contents::where('cid',$tid)->update($fnums);

        //删除此转发
        $bool1 = forward::where('id',$id)->delete();

        if($bool && $bool1) {
            return 1;
        }
        
        
    }
}
