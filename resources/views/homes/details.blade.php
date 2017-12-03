<!DOCTYPE html>
<html>
    
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
        <meta charset="utf-8">
        <meta name="csrf_token" content="{{ csrf_token() }}"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="initial-scale=1,minimum-scale=1">
        <meta content="个人信息" name="description">
        <link rel="shortcut icon" type="image/x-icon" href="">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap-theme.min.css">
        <script type="text/javascript" src="/homes/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="/homes/bootstrap/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="/homes/js/validate.js"></script>
        <script type="text/javascript" src="{{asset('/homes/layer/layer.js')}}"></script>
        <link rel="stylesheet" href="{{asset('homes/css/details.css')}}">
    
        <title>
            请完善个人信息
        </title>
    </head>
    
    <body id='body' style="background: #B4DAF0">
    	<div id="a"></div>

    	<div class="container">
    		<div class="row">
	       		<div class="col-md-12" id='logo' style="background: url('/homes/images/2016.jpg');">
                    <div class="W_nologin_logo_big">
                        <a href="/home/login" style="text-decoration:none;">
                        <h1 style="color:white;font-style:oblique"><b>{{$config[0]->name}}</b></h1>
                        </a>
                    </div>
                </div>
	        	<div class="col-md-12"  id='bigbox'>
	        		<div class="col-md-12" id='tit'>
	        			<div id="redis">请完善个人信息</div>
	        			<div class="rr" style="width:249px;"></div>
						
	        		</div>
	        		<div class="col-md-12" id='content'>
						<div class="col-md-12" id='con'>
							<form class="form-horizontal" method="post" action="/home/details/deposit" enctype="multipart/form-data" id="forms">
								  <div class="form-group" >
								    <label for="inputphone3" class="col-sm-2 control-label" ><span  class="nspan">*</span>昵称:</label>
								    <div class="col-sm-4" id='inp1'>
								      <input type="text" class="form-control" maxlength="8" placeholder="请输入昵称" name="nickName" id="uname" required maxlength="8">
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
								      <input type="text" class="form-control" id="age" maxlength="3" name="age" required>
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputcode3" class="col-sm-2 control-label" id='wlabel'><span class="nspan">*</span>工作:</label> 
									
                                                                            
									<select class="form-control"  name="work" id="sel">

                                      @foreach($res as $v)
									  <option value="{{$v->job}}" >{{$v->job}}</option>
									   @endforeach
									</select>
                                   
								  </div>
								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label"><span class="nspan">*</span>邮箱:</label>
								    <div class="col-sm-4" id='inp3'>
								      <input type="text" class="form-control" id="email" name="email" placeholder="请输入邮箱" required>
								     <div id="spa1" class='msg' >

								     </div>

								    </div>
								  </div>

								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label"><span class="nspan">*</span>头像:</label>
								    <div class="col-sm-4">
								      <input type="file"  class="form-control" id="photo" name="photo" value="" required>
                                    
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
						<div class="left_link" style="width:500px;float:left;">
                            <span>友情连接：</span>
                            @foreach($link as $k=>$v)
                            @if($v->status==0)
                                <a href="//{{$v->link}}" target="_blank" class="S_txt2" style="text-decoration:none;">{{$v->user}}</a>
                            @endif
                            @endforeach
                        </div>

                        <div class="copy" style="width:200px;float:right;margin-right: 100px">
                        <a href="#" class="S_txt2" style="text-decoration:none;">版权：{{$config[0]->bank}}    出品</a>

                        </div>
				</div>
       		</div>
    	</div>
      
     <script>
       //表单验证

        //昵称获取焦点事件
        $('#uname').focus(function(){
            //添加提示信息
            $('#spa').html('请输入4-8位用户名(数字,字母,下划线');
        })

        //昵称鼠标移出事件
        $('#uname').mouseout(function(){

            //获取昵称
            var uname = this.value;
            // console.log(uname);

            //写正则
            var reg  = /^\w{4,8}$/;

            //检测
            var check = reg.test(uname);

            //判断
            if(uname == ""){
                $('#spa').html('昵称不能为空!');
                $('#spa').css('color','red'); 
                $('#age').attr('readonly',true);
            }else if(check){

                //ajax传过去连接数据库检验昵称
                $.get('/home/details/uname',{uname:uname},function(data){
                    if(data==0){
                        $('#spa').html('该昵称已存在,请换一个昵称!');
                        $('#spa').css('color','red');
                        $('#age').attr('readonly',true);
                        $('#btn1').attr('disabled',true);
                    }else{
                        $('#spa').html('√');
                        $('#spa').css('color','green');
                        $('#age').attr('readonly',false);
                        $('#btn1').attr('disabled',false);
                    }
                })
            }else{
                    $('#spa').html('昵称格式不正确!');
                    $('#spa').css('color','red');
                    $('#age').attr('readonly',true);
                    $('#btn1').attr('disabled',true);
                }
        })


       
        //邮箱获取焦点事件
        $('#email').focus(function(){
            $('#spa1').html('请输入邮箱');
        })

        //邮箱失去焦点事件
        $('#email').blur(function(){
           
            var email  = $(this).val();

             ch2 = checkEmail($('#email'),$('#spa1'));
             // console.log(ch2);
            if(ch2!=100){
              $('#spa1').css('display','block');
              $('#spa1').css('color','red');
              $('#btn1').attr('disabled',true);
            }else{
              $('#spa1').css('display','none');
              $('#btn1').attr('disabled',false);
            }
            $.get("/home/details/email",{email:email},function(data){
                
              if(data==1){
                
              }else{
                $('#spa1').css('display','block');
                $("#spa1").html("该邮箱已被注册!"); 
                $('#spa1').css('color','red');
                $('#btn1').attr('disabled',true);
              }
            })

            
        })
     	
     </script>
    
    </body>


</html>