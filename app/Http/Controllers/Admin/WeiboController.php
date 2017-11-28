<?php
 
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request; 

use App\Http\Requests;
use App\Http\Controllers\Controller; 

use App\Http\Model\label;
use App\Http\Model\contents;
use App\Http\Model\user_info;
use App\Http\Model\replay;
use App\Http\Model\report;
use App\Http\Model\forward;
use App\Http\Model\point;
use App\Http\Model\message;

class WeiboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //标签切换页面实现
    public function index(request $request)
    {   
        //获取label表内数据
        $resa = label::get();

        //通过contents表联查user_info表查询相应发博人用户名并搜索与分页
        $resd = contents::join('user_info','contents.uid','=','user_info.uid')

        ->where('label','like','%'.$request->input('select').'%')
            
        ->paginate(10); 

        return view('admins/weibo/index',['resa'=>$resa,'resd'=>$resd,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     * 热门状态修改
     * @param  int  $id
     * @returnint(0) \Illuminate\Http\Response
     */
    public function edit($cid)
     {   
        //获取表中当前微博的hot值
        $hot = contents::where('cid',$cid)->value('hot');

        //判断如果hot为1修改其为0，反之为1
        if($hot=='1'){

            //把要赋值给hot的值放入一个数组$res当中
            $res['hot'] = 0;

            //以contents表的cid查询相对应hot下的值并更新其值
            $req = contents::where('cid',$cid)->update($res); 

        }else{

            //把要赋值给hot的值放入一个数组$res当中
            $res['hot']=1;

            //以contents表的cid查询相对应hot下的值并更新其值
            $req = contents::where('cid',$cid)->update($res);
        }
        
       return $res;
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
        
    }

    /**
     * Remove the specified resource from storage.
     * 微博删除
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

        // 通过ID查询到要删除的那一条微博ID从数据库删除
        $resg = contents::where('cid',$id)->delete($id);

        // 获取表中当前微博的uid获取
        $res['uid'] = $id;

        // 写一条信息放入数组中
        $res['content'] = '您的微博信息违规已被删除!!';

        // 获取时间戳
        $res['time'] = time();

        // 将此条信息整合发送给被删除微博的用户
        $res = message::insert($res);
    }
}
