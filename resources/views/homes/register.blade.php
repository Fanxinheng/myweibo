<!DOCTYPE html>
<html>
    
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
        <meta charset="utf-8">
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
	       		<div class="col-md-12">
	        		<div class="W_nologin_logo_big">
	        			<img src="/homes/images/wb_logo-x2.png" alt="">
	        		</div>
	        	</div>
	        	<div class="col-md-12" style="height:500px;background:white;border-radius:10px">
	        		<div class="col-md-12" style="height:130px;">
	        			<div id="redis">个人注册</div>
	        			<div class="rr"></div>
						
	        		</div>
	        		<div class="col-md-12" style="height:460px;">
						<div class="col-md-12" style="height:400px;margin-top: 30px">
							<form class="form-horizontal">
								  <div class="form-group" >
								    <label for="inputphone3" class="col-sm-2 control-label" >手机号:</label>
								    <div class="col-sm-4">
								      <input type="phone" class="form-control"  placeholder="请输入手机号">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">密码:</label>
								    <div class="col-sm-4">
								      <input type="password" class="form-control" id="inputPassword3" placeholder="请设置密码">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputcode3" class="col-sm-2 control-label">激活码:</label>
									
									<div class="col-sm-offset-2 col-sm-2" style="margin-left:2px">
								      <button type="submit" class="btn btn-default">免费获取短信激活码</button>
								    </div>

								    <div class="col-sm-2">
								      <input type="text" class="form-control" id="inputPassword3" name="code" placeholder="输入验证码">
								    </div>
								    
								  </div>
								  <div class="form-group" style="margin-top:30px">
								    <div class="col-sm-offset-2 col-sm-10">
								      <button type="submit" class="btn btn-default" style="background:#FFA00A; color:white;width:200px">立即注册</button>
								      已有账号,
								      <a href="login">直接登录>></a>
								    </div>
								  </div>
								</form>
						</div>
						
					</div>
	        	</div>
       		</div>
    	</div>
       
    
    </body>

</html>