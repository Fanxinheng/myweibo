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

        <script type="text/javascript" src="/homes/js/validate.js"></script>
        <script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
        <link rel="stylesheet" href="{{asset('homes/css/details.css')}}">
        <script src="{{ asset('homes/js/details.js') }}" type="text/javascript"></script>
    
        <title>
            个人信息
        </title>
    </head>
    
    <body id='body'>
    	<div id="a"></div>

    	<div class="container">
    		<div class="row">
	       		<div class="col-md-12" id='logo'>
	        		<div class="W_nologin_logo_big">
	        			<img src="/homes/images/wb_logo-x2.png" alt="">
	        		</div>
	        	</div>
	        	<div class="col-md-12"  id='bigbox'>
	        		<div class="col-md-12" id='tit'>
	        			<div id="redis">个人信息</div>
	        			<div class="rr"></div>
						
	        		</div>
	        		<div class="col-md-12" id='content'>
						<div class="col-md-12" id='con'>
							<form class="form-horizontal" method="post" action="/home/details/deposit" enctype="multipart/form-data" id="forms">
								  <div class="form-group" >
								    <label for="inputphone3" class="col-sm-2 control-label" ><span  class="nspan">*</span>昵称:</label>
								    <div class="col-sm-4" id='inp1'>
								      <input type="text" class="form-control" maxlength="8" placeholder="请输入昵称" name="nickName" id="uname" >
								       <span id="spa" class="msg"></span>
								    </div>
								  </div>
								  <div class="form-group" >
								  	<label for="inputphone3" class="col-sm-2 control-label" ><span class="nspan">*</span>性别:</label>
								  	<label class="radio-inline">
									  <input type="radio" name="sex" id="inlineRadio1" value="m" checked=""> 男
									</label>
									<label class="radio-inline">
									  <input type="radio" name="sex" id="inlineRadio2" value="w"> 女
									</label>
								  </div>
								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label"><span class="nspan">*</span>年龄:</label>
								    <div class="col-sm-4" id='inp2'>
								      <input type="text" class="form-control" id="age" maxlength="3" name="age">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputcode3" class="col-sm-2 control-label" id='wlabel'><span class="nspan">*</span>工作:</label> 
									
									<select class="form-control"  name="work" id="sel">
									  <option value="医生" checked>医生</option>
									  <option value="IT程序员">IT程序员</option>
									  <option value="销售">销售</option>
									  <option value="教师">教师</option>
									  <option value="餐饮">餐饮</option>
									  <option value="其他">其他</option>
									</select>
								  </div>
								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label"><span class="nspan">*</span>邮箱:</label>
								    <div class="col-sm-4" id='inp3'>
								      <input type="text" class="form-control" id="email" name="email" placeholder="请输入邮箱" >
								     <div id="spa1" class='msg' >

								     </div>

								    </div>
								  </div>

								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label"><span class="nspan">*</span>头像:</label>
								    <div class="col-sm-4">
								      <input type="file"  class="form-control" id="photo" name="photo" value="" >
								    </div>
								  </div>
								

								  <div class="form-group" id='but'>
								    <div class="col-sm-offset-2 col-sm-10">
								    	{{csrf_field()}}   
								      <input type="submit" value="提交"  id="btn1">
								    </div>
								  </div>
								</form>
						</div>
						
					</div>
					
	        	</div>
				
				<!-- 底部 -->
	        	<div class="col-md-12" id='footer'>
						<div id="fleft">
							<img src="/homes/images/favicon.ico" alt="">
							<em class="company_name">北京微梦创科网络技术有限公司</em>
					        <a href="//weibo.com/aj/static/jww.html">京网文[2011]0398-130号</a>
					        <a href="http://www.miibeian.gov.cn">京ICP备12002058号</a>
						</div>


						<div id="fright">
							<span>Copyright &copy; 2009-2017 WEIBO</span>
						</div>
					</div>
       		</div>
    	</div>
      
     <script>
  

     	
     </script>
    
    </body>


</html>