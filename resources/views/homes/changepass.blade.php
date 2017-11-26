<!DOCTYPE html>
<html>
    
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
        <meta charset="utf-8">
        <meta name="csrf_token" content="{{ csrf_token() }}"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="initial-scale=1,minimum-scale=1">
        <meta content="修改密码" name="description">
        <link rel="shortcut icon" type="image/x-icon" href="/homes/images/favicon.ico">
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
                <div class="col-md-12" id='logo'>
                    <div class="W_nologin_logo_big">
                        <img src="/homes/images/wb_logo-x2.png" alt="">
                    </div>
                </div>
                <div class="col-md-12"  id='bigbox'>
                    <div class="col-md-12" id='tit'>
                        <div id="redis">修改密码</div>
                        <div class="rr"></div>
                        
                    </div>
                    <div class="col-md-12" id='content'>
                        <div class="col-md-12" id='con'>
                            <form class="form-horizontal" method="post" action="/home/details/deposit" enctype="multipart/form-data" id="forms">  
                                  <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label"><span class="nspan">*</span>旧密码:</label>
                                    <div class="col-sm-4" id='inp1'>
                                      <input type="password" class="form-control" id="oldpass" maxlength="6" name="oldpass">
                                      <div id="spa" class='msg' >
                                    </div>
                                    
                                  </div>
                                 <div class="form-group" style="margin-top: 60px">
                                    <label for="inputPassword3" class="col-sm-2 control-label" style="margin-left:9px"><span class="nspan">*</span>新密码:</label>
                                    <div class="col-sm-4" id='inp2'>
                                      <input type="password" class="form-control" id="newpass" maxlength="6" name="newpass">
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
        var ch2;

        //旧密码获取焦点事件
        $('#oldpass').focus(function(){
            $('#spa').html('请输入旧密码');
        })

        //旧密码失去焦点事件
        $('#oldpass').blur(function(){
           
            var oldpass  = $(this).val();

             ch2 = checkOldPassword($('#oldpass'),$('#spa'),6);
             // console.log(ch2);
            if(ch2!=100){
              $('#spa').css('display','block');
              $('#spa').css('color','red');
             // return;
            }else{
              $('#spa').css('display','none');
              ch2 = 100;
            }
            $.get("/home/changepass/oldpass",{oldpass:oldpass},function(data){
                // console.log(data);
              if(data==1){

              }else{
                $('#spa').css('display','block');
                $("#spa").html("该邮箱已被注册!"); 
                $('#spa').css('color','red');
                data = 0;
              }
            })

            console.log(ch2);

            
        })

        // if (PH==1&&NI==1&&AG==1&&EM==1) {
        //  next();
        // }
        
     </script>
    
    </body>


</html>