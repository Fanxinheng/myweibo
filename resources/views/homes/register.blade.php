<!DOCTYPE html>
<html>
    
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
        <meta charset="utf-8">
        <meta name="csrf_token" content="{{ csrf_token() }}"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="initial-scale=1,minimum-scale=1">
        <meta content="微博注册"
        name="description">
        <link rel="shortcut icon" type="image/x-icon" href="/homes/images/favicon.ico">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap-theme.min.css">
        <script type="text/javascript" src="/homes/js/jquery.min.js"></script>
        <script type="text/javascript" src="/homes/bootstrap/js/bootstrap.min.js"></script>
        <title>
            微博注册
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
	        	<div class="col-md-12" style="height:500px;background:white;border-radius:10px">
	        		<div class="col-md-12" style="height:130px;">
	        			<div id="redis">个人注册</div>
	        			<div class="rr"></div>
						
	        		</div>
	        		<div class="col-md-12" style="height:360px;">
						<div class="col-md-12" style="height:300px;margin-top: 30px">
							<form class="form-horizontal" method="post" action="/home/details">
								  <div class="form-group" >
								    <label for="inputphone3" class="col-sm-2 control-label" >手机号:</label>
								    <div class="col-sm-4" style="width: 450px;height:40px">
								      <input type="text" class="form-control"  placeholder="请输入手机号" name="phone" id="phone" style="width: 345px;float: left">
								      <span id="spa" style="float:left;margin-left: 8px;margin-top: 5px">ghj</span>
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">密码:</label>
								    <div class="col-sm-4">
								      <input type="password" class="form-control" placeholder="请设置密码" name="password" id="password">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">确认密码:</label>
								    <div class="col-sm-4">
								      <input type="password" class="form-control" placeholder="再输一遍密码" name="surepass" id="surepass">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputcode3" class="col-sm-2 control-label">激活码:</label>
									
									<div class="col-sm-offset-2 col-sm-2" style="margin-left:2px">
								      <button type="submit" class="btn btn-default" id="btn1">免费获取短信激活码</button>
								    </div>

								    <div class="col-sm-2">
								      <input type="text" class="form-control"  name="code" placeholder="输入验证码" name="code" id="code">
								    </div>
								    
								  </div>
								  <div class="form-group" style="margin-top:30px">
								    <div class="col-sm-offset-2 col-sm-10">
								    	{{csrf_field()}}
								      <button type="submit" class="btn btn-default" style="background:#FFA00A; color:white;width:200px" >立即注册</button>
								      已有账号,
								      <a href="admin">直接登录>></a>
								    </div>
								  </div>
								</form>
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
							<span>Copyright &copy; 2009-2017 WEIBO</span
						</div>
					</div>
	        	</div>
       		</div>
    	</div>
      
     <script>
     	// alert($);
     	$('#btn1').click(function(){

     		$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
		       }
			});

     		var phone = $('input[name=phone]').val();
     		// console.log(phone);

     		$.post('/home/code',{phone:phone},function(data){

				// console.log(data);
				// alert(data);
			});

			return false;
     	});

     	var phones = document.getElementById('phone');
     	var password = document.getElementById('password');
     	var surepass = document.getElementById('surepass');
     	var spa = document.getElementById('spa');

		//失去焦点事件
		phones.onblur = function(){

			//获取手机号
			var pv = this.value;

			//写正则
			var reg = /^1[34578]\d{9}$/;

			// console.log(pv);
			//检测
			var check = reg.test(pv);

			// console.log(check);
			if(check){

				this.style.border = 'solid 2px green';
				spa.innerHTML= '√';
				spa.style.color='green';

			} else {

				this.style.border = 'solid 2px red';

			}
		};

		password.onblur = function(){

			//获取密码
			 pass = this.value;

			//写正则
			var reg = /^\S{6,16}$/;

			// console.log(pv);
			//检测
			var check = reg.test(pass);

			// console.log(check);
			if(check){

				this.style.border = 'solid 2px green';
				
			} else {

				this.style.border = 'solid 2px red';

			}
		};


		surepass.onblur = function(){

			//获取密码
			var surepass = this.value;

			
			if(surepass==pass){

				this.style.border = 'solid 2px green';
				
			} else {

				this.style.border = 'solid 2px red';

			}
		}
     	
     	
     	$('#btn2').click(function(){

     		$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
		       }
			});

     		var phone = $('input[name=phone]').val();
     		var password = $('input[name=password]').val();
     		var surepass = $('input[name=surepass]').val();
     		var code = $('input[name=code]').val();

     		$.post('/home/register',{phone:phone,password:password,surepass:surepass,code:code},function(data){
     			// console.log(data);
     		})
     	})


     </script>
    
    </body>


</html>