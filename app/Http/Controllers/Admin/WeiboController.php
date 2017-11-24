<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request; 

use App\Http\Requests;
use App\Http\Controllers\Controller; 

use App\Http\Model\label;
use App\Http\Model\contents;
use App\Http\Model\user_info;
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

        // 通过contents表联查user_info表查询相应发博人用户名
        $resd = contents::join('user_info','contents.uid','=','user_info.uid')

        // 通过模糊查询查询搜索框所搜索的数据
        ->where('content','like','%'.$request->input('content').'%')

        // 通过模糊查询查询下拉框的ID点击搜索按钮搜索其ID所对应的微
        // 博内容并遍历到模板页面
        ->where('label','like','%'.$request->input('select').'%')
        ->paginate(5); 

        // 返回视图页面并把查询到的值发送到模板遍历到相应位置
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
     *
     * @param  int  $id
     * @returnint(0) \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        //获取表中当前微博的hot值
        $hot = contents::where('cid',$id)->value('hot');

        //判断如果hot为1修改其为0，反之为1
        if($hot=='1'){

            //把要赋值给hot的值放入一个数组$res当中
            $res['hot'] = 0;

            //以contents表的cid查询相对应hot下的值并更新其值
            $req = contents::where('cid',$id)->update($res);

        }else{

            //把要赋值给hot的值放入一个数组$res当中
            $res['hot']=1;

            //以contents表的cid查询相对应hot下的值并更新其值
            $req = contents::where('cid',$id)->update($res);}

        // 返回并重新走一遍index方法   
        return redirect('admin/weibo');  
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
        //查询contents表中微博ID与模板页面传递过来要删除的微博ID条件相同的赋值给$res
        // $res = contents::where('cid',$id)->value('cid');

        // 通过ID查询到要删除的那一条微博ID从数据库删除
        // $resc = contents::where('cid',$id)->delete($res);

        // $resa = replay::where('rid',$id)->delete($resc);
        var_dump($id);die;
        // 重新加载页面重走路由
        // return view('admin/weibo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        
        
    }
}
