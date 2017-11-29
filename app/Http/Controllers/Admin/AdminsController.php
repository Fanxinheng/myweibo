<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use zgldh\QiniuStorage\QiniuStorage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\admin;

use Hash;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $admin = admin::paginate(10);

        return view('admins/admins/index',['admin'=>$admin,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins/admins/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //正则验证
        $this->validate($request, [
            'name' => 'required|regex:/^\w{6,12}$/',
            'password' => 'required|regex:/^\w{6,12}$/',
            'repass' => 'required|regex:/^\w{6,12}$/',
            'repass' => 'same:password',
            'phone' => 'required|regex:/^1[34578]\d{9}$/',
            'pic' => 'required'


        ],[
            'name.required' => '*用户名不能为空*',
            'name.regex' => '*请输入6~12位用户名*',
            'password.required' => '*密码不能为空*',
            'password.regex' => '*请输入6~12位密码*',
            'repass.same' => '*两次密码不一致*',
            'phone.required' => '*手机号码不能为空*',
            'phone.regex' => '*手机号码格式不正确*',
            'pic.required' => '*头像不能为空'
        ]);

         //判断是否有文件上传
        if ($request->hasFile('pic')) {

            //初始化七牛云
            $disk = QiniuStorage::disk('qiniu');

            //获取文件内容
            $file = $request->file('pic');

            //修改名字已时间戳生成文件名
            $name = rand(1111,9999).time();

            //获取文件名的后缀
            $suffix = $request->file('pic')->getClientOriginalExtension();

            //拼装文件的名称
            $prind = 'admins/Uploads/'.$name.'.'.$suffix;

            //上传到七牛云
            $bool = $disk->put($prind,file_get_contents($file->getRealPath()));

            //判断是否上传到七牛云
            if (!$bool) {
                //如果上传失败，回到广告添加页面提示用户
                 return back()->with('msg','用户头像添加失败！');

            }
            //获取头像信息
            $res['pic'] = $prind;
        }
            //获取用户名
            $res['name'] = $request->input('name');

            //添加到数据库
            $name = admin::where('name','=',$res['name'])->first();

            //判断用户名是否存在
            if(isset($name)){
                return back()->with('msg','抱歉，此用户名已存在！');
            }

            $res['phone'] = $request->input('phone');

            $phone = admin::where('phone','=',$res['phone'])->first();

            //判断手机号是否存在
            if(isset($phone)){
                return back()->with('msg','抱歉，此手机号已存在！');
            }

            $res['password'] = Hash::make($request->input('password'));

            //将数据插入数据库
            $admin = admin::insert($res);

            //判断管理员是否添加成功
            if($admin){
                return redirect('/admin/admins')->with('msg','管理员添加成功！');
            } else {
                return back()->with('msg','管理员添加失败！');
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
        //获取修改管理员信息
        $res = admin::where('id','=',$id)->first();
        
        return view('admins/admins/edit',['res'=>$res]);
    }

    /**
     * Update the specified resource in storage.
     *修改头像信息
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

            //修改名字已时间戳生成文件名
            $name = 'admins'.rand(1111,9999).time();

            // //获取文件名的后缀
            $suffix = $request->file('pic')->getClientOriginalExtension();

            //修改所上传文件的名称
            $print = 'admins/Uploads/'.$name.'.'.$suffix;

            //上传到七牛云
             $bool = $disk->put($print,file_get_contents($file->getRealPath()));

            //获取管理员原头像
            $pic = admin::where('id',$id)->value('pic');

            //删除七牛云信息
            $disk->delete($pic);

            //获取图片信息
            $res['pic'] = $print;

            //对数据库进行修改
            $date = admin::where('id','=',$id)->update($res);
            if($date){
                return redirect('/admin/admins')->with('msg','头像修改成功！');
            }

       }

        return back()->with('msg','您的头像还未修改');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //获取管理员头像
        $pic = admin::where('id',$id)->value('pic');

        //初始化七牛云
        $disk = QiniuStorage::disk('qiniu');

        //删除头像
        $disk->delete($pic);

        //删除数据库信息
        $bool = admin::where('id',$id)->delete();

        if($bool){
            return 1;
        }else{
            return 0;
        }

    }
}
