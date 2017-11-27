<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\advert;


class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *         广告列表展示页面
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        //获取分页信息
        //获取搜索全部信息
        // var_dump($request->all());

        //对数据库进行模糊查询
        $res = advert::where('user','like','%'.$request->input('search').'%')->

        orderBy('user','asc')->
        //默认搜索5条数据
        paginate($request->input('paging',5));
        //echo "<pre>";
        // var_dump($res);

       /* $count = advert::count('id');
        $request['count'] = $coi
        var_dump($count);*/

        //将数据传递到页面中
        return view('admins/advert/index',['res'=>$res,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admins/advert/add');
    }

    /**
     * Store a newly created resource in storage.
     *               广告添加方法
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //表单验证
            $this->validate($request, [
                    //不能为空  /正则
            'user' => 'required',
            'link' => 'required',
            'pic' =>'required'
        ],[
            'user.required' => '商品名不能为空！',
            'link.required' => '链接地址不能为空！',
            'pic.required' => '商品图片不能为空！'
        ]);

        //判断是否有文件上传
        if ($request->hasFile('pic')) {

            //修改名字已时间戳生成文件命
            $name = 'Advert'.rand(1111,9999).time();

            // //获取文件命的后缀
            $suffix = $request->file('pic')->getClientOriginalExtension();
            //移动图片到
            $request->file('pic')->move('./admins/Uploads', $name.'.'.$suffix);

        }


            //去除不需要的参数
            $res = $request->except('_token');

            //获取当前时间戳
            $res['time'] = time();

            //修改所上传文件的名称
            $res['pic'] = '/admins/Uploads/'.$name.'.'.$suffix;

            //打印form传过来的参数
            // var_dump($res);
            //打印图片信息
            // dd($res['pic']);

            //添加至数据库
            $data = advert::insert($res);
            // var_dump($data);
            //判断如果成功去列表页，如果失败回到当前页面
            if($data){
                return redirect('/admin/advert/')->with('create','添加广告成功！');
            } else {
                return back()->withInput();
            }


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
        // var_dump($id);
        //查询数据库单条信息
        $res = advert::where('id',$id)->first();
        //将数据传递到修改页面
        return view('/admins/advert/edit',['res'=>$res]);

    }

    /**
     * Update the specified resource in storage.
     *         广告修改方法
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //判断是否有文件上传
        if ($request->hasFile('pic')) {

            //修改名字已时间戳生成文件命
            $name = 'Advert'.rand(1111,9999).time();

            // //获取文件命的后缀
            $suffix = $request->file('pic')->getClientOriginalExtension();
            //移动图片到
            $request->file('pic')->move('./admins/Uploads', $name.'.'.$suffix);

            //获取图片的信息
            $res['pic'] = '/admins/Uploads/'.$name.'.'.$suffix;

        }
           //获取当前时间戳
            $res['time'] = time();
            //获取商户名字
            $res['user'] = $request->user;
            //获取链接地址
            $res['link'] = $request->link;
            //获取状态
            $res['status'] = $request->status;


            // //打印form传过来的参数
            // var_dump($res);

            //修改数据库里面的信息
            $data = advert::where('id',$id)->update($res);
            //判断如果成功去列表页，如果失败回到当前页面
            if ($data) {
                return redirect('/admin/advert/')->with('create','修改广告成功！');
            } else {
                return back();
            }



    }

    /**
     * Remove the specified resource from storage.
     *     获取id删除广告信息
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //获取信息
        $res = advert::where('id',$id)->first();

        // dd($res['pic']);
        // 删除图片
        $data = unlink('.'.$res->pic);

        //var_dump($data)返回的结果集是布尔型
        // var_dump($data);

        if ($data) {
            //删除数据库指定id的信息
            $info = advert::where('id',$id)->delete();
            //如果成功返回列表页面，失败回到当前页面
            if ($info) {
                return redirect('/admin/advert')->with('create','删除广告成功！');
            } else {
                return back();


            }
        }
    }
}
