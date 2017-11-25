<?php
  
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\contents;
use App\Http\Model\user_info;
use App\Http\Model\replay;

class HotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {   
        //查询数据库contents表与user_info表所需字段
        $res = contents::join('user_info','contents.uid','=','user_info.uid')
        ->where('hot','1')
        ->paginate(8);
        //返回到index页面视图中
        return view('admins/hot/index', ['res' => $res]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */            
    // 添加数据表单页面
    public function create()
    {
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 添加数据表单功能
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 查看发博人信息
    public function show($id)
     {  
        //获取微博ID
        $resn = contents::where('cid',$id)->value('uid');
        
        //获取微博用户昵称
        $nickName = user_info::where('uid',$resn)->value('nickName');
         
        //获取微博相关信息
        $content = contents::where('cid',$id)->first();
        
        // 将获取的数据放入页面中
        return view('admins/hot/show',['nickName'=>$nickName,'content'=>$content]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 修改页面
    public function edit($id)
    {   
              
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 修改功能
    public function update(Request $request, $id)
    {

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
