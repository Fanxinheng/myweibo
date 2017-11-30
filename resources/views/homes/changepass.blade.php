<!DOCTYPE html>
<html>
    
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
        <meta charset="utf-8">
        <meta name="csrf_token" content="{{ csrf_token() }}"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="initial-scale=1,minimum-scale=1">
        <meta content="修改密码" name="description">
        <link rel="shortcut icon" type="image/x-icon" href="">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap-theme.min.css">
        <script type="text/javascript" src="/homes/js/jquery.min.js"></script>
        <script type="text/javascript" src="/homes/bootstrap/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="/homes/js/validate.js"></script>
        <script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
        <link rel="stylesheet" href="{{asset('homes/css/changepass.css')}}">
        <!-- <script src="{{ asset('homes/js/details.js') }}" type="text/javascript"></script> -->
    
        <title>
            修改密码
        </title>
    </head>
    
    <body id='body'>
        <div id="a"></div>

        <div class="container">
            <div class="row">
                <div class="col-md-12" id='logo' style="background: url('/homes/images/2016.jpg');">
                    <div class="W_nologin_logo_big">
                        <h1 style="color:white;font-style:oblique"><b>MYWEB</b></h1>
                    </div>
                </div>
                <div class="col-md-12"  id='bigbox'>
                    <div class="col-md-12" id='tit'>
                        <div id="redis">修改密码</div>
                        <div class="rr"></div>
                        
                    </div>
                    <div class="col-md-12" id='content'>
                        <div class="col-md-12" id='con'>
                            <form class="form-horizontal" method="post" action="/home/details/changepassword" enctype="multipart/form-data" id="forms">  
                                  <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label"><span class="nspan">*</span>旧密码:</label>
                                    <div class="col-sm-4" id='inp1'>
                                      <input type="password" class="form-control" id="oldpass" maxlength="12" name="oldpass" required>
                                      <div id="spa" class='msg' >
                                    </div>
                                    
                                  </div>
                                 <div class="form-group" style="margin-top: 60px">
                                    <label for="inputPassword3" class="col-sm-2 control-label" style="margin-left:9px"><span class="nspan">*</span>新密码:</label>
                                    <div class="col-sm-4" id='inp2'>
                                      <input type="password" class="form-control" id="newpass" maxlength="12" name="newpass" required>
                                      <div id="spa1" class='msg' >
                                    </div>
                                    
                                  </div>
              
                                  <div class="form-group" id='but' style="width: 300px">
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
        var ch2;
        var ch3;
        var aa = 0;
        //旧密码获取焦点事件
        $('#oldpass').focus(function(){
            $('#spa').html('请输入6-12位旧密码');
        })

        //旧密码失去焦点事件
        $('#oldpass').blur(function(){
           
            oldpass  = $(this).val();

             ch2 = checkOldPassword($('#oldpass'),$('#spa'),6);
             // console.log(ch2);
            if(ch2!=100){
              $('#spa').css('display','block');
              $('#spa').css('color','red');
              $('#btn1').attr('disabled',false);
            }else{
              $('#spa').css('display','none');
              $('#btn1').attr('disabled',true);
            }

            $.ajaxSetup({
               headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                }
            });
            $.post("/home/changepass/oldpass",{oldpass:oldpass},function(data){
                // console.log(data);
              if(data==1){

                $('#spa').css('display','block');
                $("#spa").html("√");
                $('#spa').css('color','green');
                $('#btn1').attr('disabled',false);
                $('#newpass').attr('readonly',false);
              }else{
                $('#spa').css('display','block');
                $("#spa").html("与旧密码不一致");
                $('#spa').css('color','red');
                $('#btn1').attr('disabled',true);
                $('#newpass').attr('readonly',true);
              }
            })

            // console.log(ch2);  
        })

         //新密码获取焦点事件
        $('#newpass').focus(function(){
            $('#spa1').html('请输入6-12位新密码');
        })

        //新密码失去焦点事件
        $('#newpass').blur(function(){
           
            var newpass  = $(this).val();

             ch3 = checkNewPassword($('#newpass'),$('#spa1'),6);
             console.log(ch3);
            if(ch3!=100){
             
              $('#spa1').css('display','block');   
              $('#spa1').css('color','red');

            }else{
             
               $.ajaxSetup({
                   headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    }
                });
                 $.post("/home/changepass/newpass",{newpass:newpass},function(data){
                  if(data==1){
                     $('#spa1').css('display','block');
                    $("#spa1").html("与旧密码不能一样哦");
                    $('#spa1').css('color','red');
                    $('#btn1').attr('disabled',true);
                  }else{
                     $('#spa1').css('display','none');
                     $('#btn1').attr('disabled',false);
                    
                  }
                })




            }

            
            
            // if(){

            // }
           
        })
        
        
     </script>
    
    </body>


</html>