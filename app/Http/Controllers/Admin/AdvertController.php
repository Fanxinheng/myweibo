<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\advert;
use zgldh\QiniuStorage\QiniuStorage;


class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *         广告列表展示页面
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        //获取分页信息，获取搜索全部信息

        //对数据库进行模糊查询
        $res = advert::where('user','like','%'.$request->input('search').'%')->
        //倒叙排列
        orderBy('time','desc')->
        //默认搜索n条数据
        paginate($request->input('paging'));
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
            'user.required' => '*商品名不能为空！',
            'link.required' => '*链接地址不能为空！',
            'pic.required' => '*商品图片不能为空！'
        ]);

        //判断是否有文件上传
        if ($request->hasFile('pic')) {

             //初始化七牛云
            $disk = QiniuStorage::disk('qiniu');
            //获取文件内容
            $file = $request->file('pic');
            //修改名字已时间戳生成文件命
            $name = 'Advert'.rand(1111,9999).time();
            //获取文件命的后缀
            $suffix = $request->file('pic')->getClientOriginalExtension();
            //拼装文件名
            $prind = 'admins/Uploads/'.$name.'.'.$suffix;
            //上传到七牛云
            $bool = $disk->put($prind,file_get_contents($file->getRealPath()));
            //判断是否上传到七牛云
            if (!$bool) {
                //如果上传失败，回到广告添加页面提示用户
                return redirect('/admin/advert/')->with('create','广告图片添加失败！');

            }
        }
            //获取上传的文件名
            $res['pic'] = $prind;
            //获取广告用户
            $res['user'] = $request->input('user');
            //获取广告链接
            $res['link'] = $request->input('link');
            //获取当前时间戳
            $res['time'] = time();
            //添加至数据库
            $data = advert::insert($res);
            //判断如果成功去列表页，如果失败回到当前页面
            if($data){
                return redirect('/admin/advert')->with('create','添加广告成功！');
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
        //查询用户原来状态

        $date = advert::where('id',$id)->value('status');

        if($date){

            //更新数据库
            $update = advert::where('id',$id)->update(['status'=>0]);
            return 0;
        } else {

            //更新数据库
            $update = advert::where('id',$id)->update(['status'=>1]);
            return 1;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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

            //初始化七牛云
            $disk = QiniuStorage::disk('qiniu');

            //获取文件内容
            $file = $request->file('pic');

            //修改名字已时间戳生成文件命
            $name = 'Advert'.rand(1111,9999).time();

            //获取文件命的后缀
            $suffix = $request->file('pic')->getClientOriginalExtension();

            //拼装图片信息
            $print = 'admins/Uploads/'.$name.'.'.$suffix;

            //上传到七牛云
            $bool = $disk->put($print,file_get_contents($file->getRealPath()));

            //判断是否上传到七牛云
            if (!$bool) {
                //如果不成功返回页面修改页面
                return redirect('/admin/advert/')->with('create','图片上传失败！');
            }

            //去数据库获取图片信息
            $pic = advert::where('id',$id)->value('pic');

            //删除七牛云信息
            $disk->delete($pic);

            //获取图片信息
            $res['pic'] = $print;


        }

            //获取当前时间戳
            $res['time'] = time();

            //获取商户名字
            $res['user'] = $request->user;

            //获取链接地址
            $res['link'] = $request->link;

            //获取状态
            $res['status'] = $request->status;
            
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
        //获取数据库图片信息
        $res = advert::where('id',$id)->value('pic');
        //初始化七牛云
        $disk = QiniuStorage::disk('qiniu');

        //删除七牛云信息
        $data = $disk->delete($res);
        
        //删除数据库指定id的信息
        $info = advert::where('id',$id)->delete();

        //删除数据库指定id的信息
        $info = advert::where('id',$id)->delete();

    }
}
