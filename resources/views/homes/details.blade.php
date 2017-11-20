<!DOCTYPE html>
<html>
    
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
        <meta charset="utf-8">
        <meta name="csrf_token" content="{{ csrf_token() }}"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="initial-scale=1,minimum-scale=1">
        <meta content="个人信息" name="description">
        <link rel="shortcut icon" type="image/x-icon" href="/homes/images/favicon.ico">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap-theme.min.css">
        <script type="text/javascript" src="/homes/js/jquery.min.js"></script>
        <script type="text/javascript" src="/homes/bootstrap/js/bootstrap.min.js"></script>
        <title>
            个人信息
        </title>
    </head>
	<style>
		#a{background: #FF4741;width:auto;height:3px}
		.col-md-12{
			/*border:solid 2px red;*/
			height: 200px;
		}
		.W_nologin_logo_big{
   			height: 72px;
    		margin: 80px auto 0;
    		width: 200px;
    		/*border:solid 2px blue;*/
		}
		#redis{width:300px;margin-top:35px;font-size:36px;font-family:微软雅黑}
		.rr{height: 4px;background:#FFA00A;width:140px}
		.col-sm-2 {font-size:20px;}
		.form-control{height:40px}
		.btn {height:40px}
	</style>
    
    <body style="background: #9ECCEA">
    	<div id="a"></div>

    	<div class="container">
    		<div class="row">
	       		<div class="col-md-12" style="background: url('/homes/images/body_bg.jpg');">
	        		<div class="W_nologin_logo_big">
	        			<img src="/homes/images/wb_logo-x2.png" alt="">
	        		</div>
	        	</div>
	        	<div class="col-md-12" style="height:650px;background:white;border-radius:10px">
	        		<div class="col-md-12" style="height:130px;">
	        			<div id="redis">个人信息</div>
	        			<div class="rr"></div>
						
	        		</div>
	        		<div class="col-md-12" style="height:360px;">
						<div class="col-md-12" style="height:300px;margin-top: 30px">
							<form class="form-horizontal" method="get" action="/home/admin">
								  <div class="form-group" >
								    <label for="inputphone3" class="col-sm-2 control-label" ><span style="color:red;margin-right: 5px;">*</span>昵称:</label>
								    <div class="col-sm-4" style="width: 600px;height:40px">
								      <input type="text" class="form-control"  placeholder="请输入昵称" name="nikeName" id="uname" style="width: 345px;float: left">
								       <span id="spa" style="float:left;margin-left: 10px;margin-top: 7px;color:#3EA0E1;font-size:18px"></span>
								    </div>
								  </div>
								  <div class="form-group" >
								  	<label for="inputphone3" class="col-sm-2 control-label" ><span style="color:red;margin-right: 5px;">*</span>性别:</label>
								  	<label class="radio-inline" style="margin-left:15px">
									  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="m"> 男
									</label>
									<label class="radio-inline">
									  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="w"> 女
									</label>
								  </div>
								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">年龄:</label>
								    <div class="col-sm-4" style="width: 600px;height:40px">
								      <input type="text" class="form-control" id="age" style="width: 345px;float: left">
								      <span id="spa1" style="float:left;margin-left: 10px;margin-top: 7px;color:#3EA0E1;font-size:18px"></span>
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputcode3" class="col-sm-2 control-label" style="margin-right:15px">工作:</label> 
									
									<select class="form-control" style="width:340px;">
									  <option>医生</option>
									  <option>IT程序员</option>
									  <option>销售</option>
									  <option>教师</option>
									  <option>餐饮</option>
									  <option>其他</option>
									</select>
								  </div>
								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">邮箱:</label>
								    <div class="col-sm-4" style="width: 600px;height:40px">
								      <input type="email" class="form-control" id="email"  placeholder="请输入邮箱" style="width: 345px;float: left">
								      <span id="spa2" style="float:left;margin-left: 10px;margin-top: 7px;color:#3EA0E1;font-size:18px"></span>
								    </div>
								  </div>

								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">头像:</label>
								    <div class="col-sm-4">
								      <input type="file" style="height: 45px" class="form-control" id="inputPassword3" name="photo" value="" >
								    </div>
								  </div>
								

								  <div class="form-group" style="margin-top:30px">
								    <div class="col-sm-offset-2 col-sm-10">
								    	
								      <button type="submit" class="btn btn-default" style="background:#FFA00A; color:white;width:200px">提交</button>
								      
								    </div>
								  </div>
								</form>
						</div>
						
					</div>
					
	        	</div>
				
				<!-- 底部 -->
	        	<div class="col-md-12" style="height:50px;margin-top: 30px;text-align: center;">
						<div class="left_link" style="width:550px;float:left;">
							<img src="/homes/images/favicon.ico" alt="">
							<em class="company_name">北京微梦创科网络技术有限公司</em>
					        <a href="//weibo.com/aj/static/jww.html">京网文[2011]0398-130号</a>
					        <a href="http://www.miibeian.gov.cn">京ICP备12002058号</a>
						</div>


						<div class="copy" style="width:400px;float:right;">
							<span>Copyright &copy; 2009-2017 WEIBO</span>
						</div>
					</div>
       		</div>
    	</div>
      
     <script>
  
     	//表单验证
     	var uname = document.getElementById('uname');
     	var spa = document.getElementById('spa');
     	var age = document.getElementById('age');
     	var spa1 = document.getElementById('spa1');

     	//昵称获取焦点事件
     	uname.onfoucs = function(){

     		//添加提示信息
     		spa.innerHTML = '请输入6-12位用户名(数字,字母,下划线)';
     	}

     	//昵称失去焦点事件
     	uname.onblur = function(){

     		//获取昵称
     		var uname = this.value;

     		//写正则
     		var reg  = /^\w{6,12}$/;

     		//检测
     		var check = reg.test(uname);

     		//判断
     		if(check){

     			//ajax传过去连接数据库检验昵称
     			$.get('/home/details/uname',{uname:uname},function(data){
     				if(data==1){
     					spa.innerHTML = '该昵称已存在,请换一个昵称!';
     					spa.style.color = 'red';
     				}else{
     					spa.innerHTML = '√';
     					spa.style.color='green';
     				}
     			})
     		}else{
     					spa.innerHTML = '昵称格式不正确!';
     					spq.style.color = 'red';
     				}
     				if(uname == null){
     					spa.innerHTML = '昵称不能为空!';
     					spa.style.color='red';
     				}

     	};


     	//年龄获取焦点事件
     	age.onfoucs = function(){

     		//添加提示信息
     		spa1.innerHTML = '请输入6-12位用户名(数字,字母,下划线)';
     	}

     	//昵称失去焦点事件
     	age.onblur = function(){

     		//获取昵称
     		var age = this.value;

     		//写正则
     		var reg  = /^\d$/;

     		//检测
     		var check = reg.test(age);

     		//判断
     		if(check){

     					spa.innerHTML = '√';
     					spa.style.color='green';
     				}
     			
     		}else{
     					spa.innerHTML = '昵称格式不正确!';
     					spq.style.color = 'red';
     				}
     				if(uname == null){
     					spa.innerHTML = '昵称不能为空!';
     					spa.style.color='red';
     				}

     	};
     </script>
    
    </body>


</html>