<!DOCTYPE html>
<html>
    
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
        <meta charset="utf-8">
        <meta name="csrf_token" content="{{ csrf_token() }}"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="initial-scale=1,minimum-scale=1">
        <meta content="修改个人信息" name="description">
        <link rel="shortcut icon" type="image/x-icon" href="">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap-theme.min.css">
        <script type="text/javascript" src="/homes/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="/homes/bootstrap/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="/homes/js/validate.js"></script>
        <script type="text/javascript" src="{{asset('/homes/layer/layer.js')}}"></script>
        <title>
            修改个人信息
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
		.rr{height: 4px;background:#FFA00A;width:220px}
		.col-sm-2 {font-size:20px;}
		.form-control{height:40px}
		.btn {height:40px}
	</style>
    
    <body style="background: #B4DAF0">
    	<div id="a"></div>

    	<div class="container">
    		<div class="row">
	       		<div class="col-md-12" style="background: url('/homes/images/2016.jpg');">
	        		<div class="W_nologin_logo_big">
                        <a href="/home/login" style="text-decoration:none;">
                        <h1 style="color:white;font-style:oblique"><b>{{$config[0]->name}}</b></h1>
                        </a>
                    </div>
	        	</div>
	        	<div class="col-md-12" style="height:700px;background:white;border-radius:10px">
	        		<div class="col-md-12" style="height:130px;">
	        			<div id="redis">修改个人信息</div>
	        			<div class="rr"></div>
						
	        		</div>
	        		<div class="col-md-12" style="height:360px;">
						<div class="col-md-12" style="height:300px;margin-top: 30px">
							<form class="form-horizontal" action="/home/details/update" method="post" id="forms">
								  <div class="form-group" >
								    <label for="inputphone3" class="col-sm-2 control-label" ><span style="color:red;margin-right: 5px;">*</span>昵称:</label>
								    <div class="col-sm-4" style="width: 700px;height:40px">
								      <input type="text" class="form-control" maxlength="8" placeholder="请输入昵称" name="nickName" id="uname" style="width: 345px;float: left" value="{{$res->nickName}}" required maxlength="8">
								       <span id="spa" style="float:left;margin-left: 10px;margin-top: 7px;color:#3EA0E1;font-size:18px"></span>
								    </div>
								  </div>
								  <div class="form-group" >
								  	<label for="inputphone3" class="col-sm-2 control-label" ><span style="color:red;margin-right: 5px;">*</span>性别:</label>
                                   
                                        <label class="radio-inline" style="margin-left:15px">
                                    
									       <input type="radio" name="sex" id="inlineRadio1" value="m" @if($res->sex == 'm') checked @endif> 男
									   </label>
                                   
    									<label class="radio-inline">
    									  <input type="radio" name="sex" id="inlineRadio2" value="w" @if($res->sex == 'w') checked @endif> 女
    									</label>
                                   
								  </div>
								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label"><span style="color:red;margin-right: 5px;">*</span>年龄:</label>
								    <div class="col-sm-4" style="width: 600px;height:40px">
								      <input type="text" class="form-control" id="age" maxlength="3" style="width: 345px;float: left" name="age" value="{{$res->age}}" required>
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputcode3" class="col-sm-2 control-label" style="margin-right:15px"><span style="color:red;margin-right: 5px;">*</span>工作:</label> 
									
									<select class="form-control" style="width:345px;font-size: 18px" name="work" >
    									@foreach($job as $v)
                                        <option value="{{$v->job}}">{{$v->job}}</option>
                                        @endforeach
									</select>

								  </div>
								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label"><span style="color:red;margin-right: 5px;">*</span>邮箱:</label>
								    <div class="col-sm-4" style="width: 600px;height:40px">
								      <input type="text" class="form-control" id="email" name="email" placeholder="请输入邮箱" style="width: 345px;float: left" value="{{$res->email}}" required>
								     <div id="spa1" style="float:left;margin-left: 10px;margin-top: 7px;color:#3EA0E1;font-size:18px">
								     </div>

								    </div>
								  </div>
                                 
                                     <div class="form-group">
                                         <label for="inputPassword3" class="col-sm-2 control-label" style="margin-top:20px;"><span style="color:red;margin-right: 5px;margin-top:30px;">*</span>头像:</label>
                                    
                                    
                                         <div class="col-sm-4" style="width:150px;">
                                         <input type="text" style="width:300px;height:5px;position:absolute;opacity:0" class="form-control" id="photo" name="tp"   >
                                         {{csrf_field()}}
                                          <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$res->photo}}?imageView2/1/w/200/h/200/q/75|watermark/2/text/bXl3ZWlibw==/font/5a6L5L2T/fontsize/240/fill/I0YxRUZFNg==/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim"   style="width:100px;height: 100px;border-radius:50%;border:solid 1px #ABB1BA" id="img">
                                         </div>
                                      </div>         				  
          
								  <div class="form-group" style="margin-top:30px">
								    <div class="col-sm-offset-2 col-sm-10" >
								    	{{csrf_field()}}
                                        <input type="submit" value="修改" style="background:#FFA00A;color: white;width:200px;height: 40px;font-size: 18px;border-radius: 6px;text-align:center" id="btn1">
								    </div>
								  </div>
							</form>
						</div>
						
					</div>
					
	        	</div>
				
				<!-- 底部 -->
	        	<div class="col-md-12" style="height:50px;margin-top: 30px;text-align: center;">
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
        var uname = document.getElementById('uname');
        var spa = document.getElementById('spa');
        var email = document.getElementById('email');
        var age = document.getElementById('age');
        var photo = document.getElementById('photo');
     
        //昵称获取焦点事件
        uname.onfocus = function(){
            //添加提示信息
            spa.innerHTML = '请输入4-8位用户名(数字,字母,下划线)';
        }

        //昵称改变事件
        uname.onchange = function(){

            //获取昵称
            var uname = this.value;
            // console.log(uname);

            //写正则
            var reg  = /^\w{4,8}$/;

            //检测
            var check = reg.test(uname);

            //判断
            if(uname == ""){
                spa.innerHTML = '昵称不能为空!';
                spa.style.color='red';
                $('#btn1').attr('disabled',true);
            }else if(check){

                //ajax传过去连接数据库检验昵称
                $.get('/home/details/uname',{uname:uname},function(data){
                    if(data==2){
                        spa.innerHTML = '√';
                        spa.style.color='green';
                        $('#btn1').attr('disabled',false);
                    }
                    if(data==0){
                        spa.innerHTML = '该昵称已存在,请换一个昵称!';
                        spa.style.color = 'red';
                        $('#btn1').attr('disabled',true);

                    }else{
                        spa.innerHTML = '√';
                        spa.style.color='green';
                        $('#btn1').attr('disabled',false);

                    }
                })
            }else{
                    spa.innerHTML = '昵称格式不正确!';
                    spa.style.color = 'red';
                    $('#btn1').attr('disabled',true);
                }
                
        };


        

        
        //邮箱改变事件
        $('#email').change(function(){
           
            var email  = $(this).val();

             ch2 = checkEmail($('#email'),$('#spa1'));

            if(ch2!=100){
              $('#spa1').css('display','block');
              $('#spa1').css('color','red');
              $('#btn1').attr('disabled',true);
            }else{
              $('#spa1').css('display','none');
             $('#btn1').attr('disabled',false);
            }
          

        })

        //头像发送Ajax
      document.getElementById('img').onclick=function(){

            layer.alert(' <form id="formphoto"><i class="icon-upload-2" id="wngbng"></i><input type="file" name="photo" id="tp" value=""></form>',{
                    skin: 'layui-layer-molv',
                    btn: ['确认', '取消'],
                    area: ['200px', '150px'],
                    title: '上传文件',
                yes:function(index){

                    var imgPath = $("#tp").val();
                    if (imgPath == "") {
                        alert("请选择上传图片！");
                        return;
                    }
                    //判断上传文件的后缀名
                    var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                    if (strExtension != 'jpg' && strExtension != 'gif'
                        && strExtension != 'png' && strExtension != 'bmp') {
                        alert("请选择图片文件");
                        return;
                    }
                        var formData = new FormData($('#formphoto')[0]);

                        $.ajaxSetup({
                           headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                            }
                        });
                        // alert("1234");
                        $.ajax({
                            type: "post",
                            url: "/home/details/editphoto",
                            data: formData ,
                            cache: false,
                            async: true,
                            contentType: false,
                            processData: false,
                            beforeSend:function(){
                                  
                                layer.load(2);
                                // console.log(data);

                              },
                            success: function(data) { 
                                layer.closeAll('loading');
                                layer.alert('头像上传成功！');
                               $('#img').attr('src','http://ozsrs9z8f.bkt.clouddn.com/'+data);
                            },
                            error: function(XMLHttpRequest, textStatus, errorThrown) {
                                layer.alert("上传失败，请检查网络后重试");
                                $('#img').attr('src','http://ozsrs9z8f.bkt.clouddn.com/homes/uploads/96261511620891.jpg');
                                layer.closeAll('loading');
                            }
                        });
                    layer.close(index);
                }
            });

                       
    };
     
     </script>
    
    </body>


</html>