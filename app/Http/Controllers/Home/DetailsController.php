<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\user;
use App\Http\Model\user_info;
use App\Http\Model\job;
use Hash;
use session;

use zgldh\QiniuStorage\QiniuStorage;


class DetailsController extends Controller
{
	
	public function index(Request $request)
	{   

        $res = job::get();
		return view('/homes/details',['res'=>$res]);
	
	}

	//检测昵称是否存在的方法
	public function uname(Request $request){

		// 获取input框里的昵称值
		$res = $request->input('uname');
        
        //获取session中的uid
        $uid = $request->session()->get('uid');

       	//根据uid查询出当前用户的昵称
       	$nickName = user_info::where('uid',$uid)->value('nickName');

       	if($res==$nickName){
            
       		echo "2";

       	}else{

       		//在user_info表中查询昵称值
			$uname = user_info::where('nickName','=',$res)->value('nickName');

			// 为空返回1,否则返回0
			if($uname==null){
				echo "1";
			}else{
				echo "0";
			}

       	}
		

	}

	//验证邮箱是否存在的方法
	public function email(Request $request){

		// 获取input框里的email值
		$res = $request->input('email');

		// 在user_info表中查询email值
		$email = user_info::where('email',$res)->value('email');

		// 判断为空返回1,否则返回0
		if($email==null){
			echo "1";
		}else{
			echo "0";
		}
	}

	//将个人信息页面传过来的值存入user_info的方法
	public function deposit(Request $request)
	{   
		//获取除了token以外的值
		$res = $request->except('_token');

		//文件上传
		if($request->hasFile('photo')){

			//初始化七牛云
			$disk = QiniuStorage::disk('qiniu');

			//获取文件内容
			$file = $request->file('photo');

			//修改随机生成名字
			$name = rand(1111,9999).time();

			//获取上传文件后缀
			$suffix = $request->file('photo')->getClientOriginalExtension();

			//拼装文件名
			$logo = 'homes/uploads/'.$name.'.'.$suffix;

			$res['photo'] = $logo;


			//上传到七牛云
			$bool = $disk->put($logo,file_get_contents($file->getRealPath()));
            if($bool){
            	//把uid存到res数组中
			    $res['uid'] = session('uid');

				//把res数组中的信息存到user_info表中
				$data = user_info::insert($res);

				//判断成功就跳转首页,否则返回当前页面并存闪存
				if($data){
		           
		            echo "<script>alert('添加成功!');window.location.href='/home/login';</script>";
					
				}else{

					echo "<script>slert('添加失败!');</script>";                        
					return back()->withInput();
				}
            }else{
            	echo "<script>alert('请检查网络是否畅通');wind</script>";
            }
			
		}
		   
		
	}

	//加载修改个人信息页面
	public function edit(Request $request)
	{   
		//获取职业列表
        $job = job::get();

        //获取登录者id
		$uid = $request->session()->get('uid');

		//获取登录者信息
		$res = user_info::where('uid',$uid)->first();

		return view('homes/edit',['job'=>$job,'res'=>$res]);
	}


  //修改头像发送ajax存入数据库
     public function editphoto(Request $request)
	 {   

	   if($request->hasFile('photo')){
           
				//初始化七牛云
				$disk = QiniuStorage::disk('qiniu');
				
				//获取文件内容
				$file = $request->file('photo');
				
				//修改随机生成名字
 				$name = rand(1111,9999).time();

				//获取上传文件后缀
				$suffix = $request->file('photo')->getClientOriginalExtension();

				//拼装文件名
				$logo = 'homes/uploads/'.$name.'.'.$suffix;

				$res['photo'] = $logo;

				//上传到七牛云
				$bool = $disk->put($logo,file_get_contents($file->getRealPath()));

				//获取session中当前用户的uid
				$uid= $request->session()->get('uid');
                
				//删除旧头像
		        $old = user_info::where('uid',$uid)->value('photo');

		        $del = $disk->delete($old);
		      
				//把res数组中的信息按照uid修改到user_info表中
				$data = user_info::where('uid',$uid)->update($res);
					
				//判断成功就跳转首页,否则返回当前页面并存闪存
				if($data){
					return $logo;
						//echo "0";
				}else{

					echo "1";
				}

		}       
	}

	//form表单提交执行修改个人信息方法
	public function update(Request $request)
	{   

		//获取除了token以外的值
		$res = $request->except('_token','tp');
		
		//获取session中当前用户的uid
		$uid= $request->session()->get('uid');
        
        //根据uid获取其一条数据
        $re = user_info::where('uid',$uid)->first();

        $a = ['nickName'=>$re['nickName'],'sex'=>$re['sex'],'age'=>$re['age'],'work'=>$re['work'],'email'=>$re['email']];

        //判断是否修改个人信息，修改则更新数据库，没修改则不更新数据库
        if($res==$a){
        	echo "<script>alert('修改成功！');window.location.href='/home/login'</script>";
        }else{
        	//把res数组中的信息按照uid修改到user_info表中
			$data = user_info::where('uid',$uid)->update($res);
				
			//判断成功就跳转首页,否则返回当前页面并存闪存
			if($data){
				echo "<script>alert('修改成功！');window.location.href='/home/login'</script>";
			}else{

				echo "<script>alert('修改失败！');window.location.href='/home/details/edit'</script>";
				
			}

        }
		
	}
	
	//加载修改密码页面 
	public function changepass()
	{
		return view('homes/changepass');
	}

	//判断旧密码与user表中密码是否一致
	public function oldpass(Request $request)
	{   
	   //获取session中的uid
	   $uid = $request->session()->get('uid');

	   //获取input表中的旧密码
	   $oldpass = $request->input('oldpass');
	   
	   //根据uid查询他的密码
	   $res = user::where('id',$uid)->value('password');
	   
	   //比较两个密码是否一致
	   if (Hash::check($oldpass,$res)){
		  echo "1";
		}else{
		  echo "0";
		}

	}

	//判断新密码与表中密码是否一致
	public function newpass(Request $request)
	{   
	   //获取session中的uid
	   $uid = $request->session()->get('uid');

	   //获取input表中的旧密码
	   $newpass = $request->input('newpass');
	   
	   //根据uid查询他的密码
	   $res = user::where('id',$uid)->value('password');
	   
	   //比较两个密码是否一致
	   if (Hash::check($newpass,$res)){
		  echo "1";
		}else{
		  echo "0";
		}

	}
	

	//执行忘记密码把新密码存到数据库
	public function changepassword(Request $request)
	{   

		//获取session中的uid
		$uid = $request->session()->get('uid');

		//获取token以外的值
		$res['password'] = $request->except('_token','oldpass');

		//密码用哈希加密
		$res['password']=Hash::make($request->input('newpass'));

		//根据uid更新user表中的password
		$data = user::where('id',$uid)->update($res);
		if($data){

		   echo "<script>alert('密码修改成功，请重新登录！');window.location.href='/home/admin';</script>";
		   
		}else{
			echo "0";
		}
	}

	//执行退出
	public function quit(Request $request)
	{
		
		$request->session()->forget('uid');
		$request->session()->forget('code');
		$request->session()->forget('message');
		$request->session()->forget('point');
		$request->session()->forget('replay');
		$request->session()->forget('forward');
		return redirect('/home/admin');


	}
		

}
