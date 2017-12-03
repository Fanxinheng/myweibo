<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\report;
use App\Http\Model\user_info;
use App\Http\Model\contents;
use App\Http\Model\replay;
use App\Http\Model\forward;
use App\Http\Model\point;
use App\Http\Model\message;

use zgldh\QiniuStorage\QiniuStorage;



class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 微博举报列表主页
    public function index() 
    {
        //查询数据库report表数据
        $res = report::with('user_info','contents.user_info')->paginate(5);

        //返回到index页面视图中
        return view('admins/report/index', ['res' => $res]); 
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
         // 通过微博ID查询被删除微博ID对应的评论表
        $resb = replay::where('tid',$id)->delete();

        // 通过微博ID查询被删除微博ID对应的举报表
        $resc = report::where('tid',$id)->delete();

        // 通过微博ID查询被删除微博ID对应的转发表
        $rese = forward::where('tid',$id)->delete();

        // 通过微博ID查询被删除微博ID对应的点赞表
        $resf = point::where('tid',$id)->delete();

        // 删除七牛云图片
        $images = contents::where('cid',$id)->value('image');

       if($images){

            //初始化七牛云
            $disk = QiniuStorage::disk('qiniu');

            $img = rtrim($images,'##');

            $imgs = explode('##',$img);

            foreach($imgs as $i){
                //删除云中图片
                $disk->delete($i);
            }

        }

        //登录用户积分-5
        $socre = user_info::where('uid',Session('uid'))->value('socre');

        $num['socre'] = $socre - 5;

        user_info::where('uid',Session('uid'))->update($num);

        // 获取表中当前微博的uid获取
        $res['uid'] = contents::where('cid',$id)->value('uid');

        // 获取管理员ID
        $res['aid'] = Session('pid');

        // 写一条信息放入数组中
        $res['content'] = '您的微博信息违规已被删除!!';

        // 获取时间戳
        $res['time'] = time();

        // 将此条信息整合发送给被删除微博的用户
        message::insert($res);
        
        // 通过ID查询到要删除的那一条微博ID从数据库删除
        $resg = contents::where('cid',$id)->delete();
    }
}
