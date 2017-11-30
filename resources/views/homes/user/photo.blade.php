<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap-theme.min.css">
        <script type="text/javascript" src="/homes/js/jquery-3.2.1.min.js">
        </script>
        <script type="text/javascript" src="/homes/bootstrap/js/bootstrap.min.js">
        </script>
        <link rel="stylesheet" href="/homes/css/user.photo.css">
        <meta name="csrf_token" content="{{ csrf_token() }}"/>
        <title>{{$config[0]->name}}</title>
        <script type="text/javascript" src="/homes/layer/layer.js"></script>

    </head>
    
    <body style="background:#F3F4F9 no-repeat center center fixed;font: 12px/1.3 'Arial','Microsoft YaHei';background-size: 100% 100%;background-position: top center;">
    
        <div>
            <nav class="navbar navbar-fixed-top" id="navbar">
                <div class="container">
                    <div class="navbar-header" id="navbar-header1">
                        <a href="/home/login">
                        <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$config[0]->logo}}" alt="" style="width:80px;height:27px;margin-top:7px;">
                        </a>
                    </div>
                    <div class="navbar-header" id="navbar-header2">
                        <form action="/home/search" class="navbar-form navbar-right" method="get">
                            <div class="form-group">
                                <input type="text" name="search" class="form-control" placeholder="精彩生活，微博搜索" >
                            </div>

                            {{csrf_field()}}
                            <button class="btn btn-warning" type="submit">
                                搜索
                            </button>
                        </form>
                    </div>
                   <div id="nav-1">
                        <div style="float:right;line-height: 20px;font-size: 16px;margin-right: 20px;margin-top: 10px">
                            <span class="glyphicon glyphicon-home" aria-hidden="true">
                            </span>
                            <a href="/home/details/quit"  title="退出登录" style="text-decoration:none;">
                                退出
                            </a>
                        </div>
                        <div style="float:right;line-height: 20px;font-size: 16px;margin-right: 20px;margin-top: 10px">
                            <li class="dropdown" style="list-style-type:none">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration:none;">{{$rev->nickName}}<span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="/home/user">个人中心</a></li>
                                <li><a href="/home/details/edit">个人信息</a></li>
                                <li><a href="/home/changepass">修改密码</a></li>
                                <li><a href="/home/message">系统消息</a></li>
                              </ul>
                            </li>
                        </div>
                        <div style="float:right;line-height: 20px;font-size: 16px;margin-right: 20px;margin-top: 10px">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true">
                            </span>
                            <a href="/home/login">
                                首页
                            </a>
                        </div>
                    </div>
                    <!--/.navbar-collapse -->
                </div>
            </nav>
       
        <!-- 头结束 -->
        <!-- 中间开始 -->
            <div class="row" id="weibo">
                <div class="container">
                    <!-- 头像 及北京-->
                    <div class="container">
                        <div class="jumbotron" id="backg" style="background:url('/homes/images/2016.jpg');background-repeat:no-repeat">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <!-- 头像 -->
                                <div id="jimg">
                                     <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$rev->photo}}?imageView2/1/w/100/h/100/q/75" id="img" class="img-circle">
                                </div>
                                <div>
                                   <!-- 昵称 -->
                                    <div id="nickname" style="font-size: 20px;">
                                        {{$rev->nickName}}&nbsp;&nbsp;
                                        
                                    </div>
                                    <div id="nickName" style="margin-top:10px;font-size: 15px;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;年龄:&nbsp;{{$rev->age}}&nbsp;&nbsp;职业:&nbsp;{{$rev->work}}&nbsp;&nbsp;积分:<span id="fsoc">{{$rev->socre}}</span>&nbsp;&nbsp;&nbsp;性别:&nbsp;
                                        @if($rev->sex=='w')
                                        女
                                        @else
                                        男
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                    <!-- 头像 及北京-->
                    <style> #weibo #lanmu li { margin-top: 5px; font-size: 14px}</style>
                    
                    <!-- 栏目及遍历 -->
                    <div class="container">
                        <!-- 栏目 -->
                        <div class="col-md-3 sidebar" id="lanmu">
                           <ul class="nav nav-sidebar">
                                <li class="active">
                                    <a href="/home/user">
                                        微博
                                    </a>
                                </li>
                                <li>
                                    <a href="/home/fans">
                                        粉丝
                                    </a>
                                </li>
                                <li>
                                    <a href="/home/attention">
                                        关注
                                    </a>
                                </li>
                                <li>
                                    <a href="/home/photo">
                                        相册
                                    </a>
                                </li>
                                <li>
                                    <a href="/home/point">
                                        我微博的赞
                                        @if($point>0)
                                        <div style="width: 20px;height: 20px;background:#fa7d3c;float: right;border-radius: 10px;margin-left: 3px;text-align:center;color: #fff;line-height: 20px ">
                                            {{$point}}
                                        </div>
                                        @else
                                        <div></div>
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a href="/home/replay">
                                        微博评论
                                        @if($replay>0)
                                        <div style="width: 20px;height: 20px;background:#fa7d3c;float: right;border-radius: 10px;margin-left: 3px;text-align:center;color: #fff;line-height: 20px ">
                                            {{$replay}}
                                        </div>
                                        @else
                                        <div></div>
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a href="/home/forward">
                                        微博转发
                                        @if($forward>0)
                                        <div style="width: 20px;height: 20px;background:#fa7d3c;float: right;border-radius: 10px;margin-left: 3px;text-align:center;color: #fff;line-height: 20px  ">
                                            {{$forward}}
                                        </div>
                                        @else
                                        <div></div>
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a href="/home/message" style="text-decoration:none;">
                                        系统消息 @if($message>0)
                                        <div style="width: 20px;height: 20px;background:#fa7d3c;float: right;border-radius: 10px;margin-left: 3px;text-align:center;color: #fff;line-height: 20px  ">
                                            {{$message}}
                                        </div>
                                        @else
                                        <div>
                                        </div>
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- 栏目结束 -->


                        <!-- 关注 -->
                        <div class="col-md-8 sidebar" id="tiezi" >
                            <div class="col-lg-12" style="background-color: #fff;margin-left: 30px;width: 820px;">
                                <h3>
                                    相册 <span id="overall" style="font-size: 14px;margin-left: 30px"><em>删除全部</em></span>
                                </h3>
                            </div>
                            <div class="col-lg-12" style="cursor:pointer;background-color: #fff;margin-left: 30px;width: 820px;padding-bottom: 20px;margin-top: 10px" >
                                <!-- 图像遍历的地方 -->
                              
                                <!-- 头像 -->
                                @foreach($res as $k=>$v)
                               
                                 @if($v->image)
                                
                                                         
                                <div id="weiimg" class="cl{{$v->cid}}"  style="margin-top: 20px;margin-left: 20px;float: left;">

                                <div>{{date('Y-m-d H:i:s',$v->time)}}</div><hr>

                                    <div id="x{{$v->cid}}" style="position: absolute;margin-left: 130px;font-size: 18px;cursor: pointer;margin-top: -60px">删除</div>
                                   <?php
                                    $img = rtrim($v->image,'##');

                                    $imgs = explode('##',$img);
                                    ?> 
                                    @foreach($imgs as $i)

                                        <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$i}}?imageView2/0/q/75|watermark/2/text/TVlXRUlCTy5DT00=/font/5a6L5L2T/fontsize/400/fill/I0YxRUZFNg==/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim" style="width:110px;" id="img">
                                    @endforeach
                                </div>
                                 @else  
                                 @endif

                                 @endforeach
                                   
                                <!-- 图像遍历结束 -->
                            </div>
                            <div style="float: right">{!! $res->render() !!}</div>
                            <!-- 关注栏结束 -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <script>

         $.ajaxSetup({
                headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                }
            });

         //删除全部
         $('#overall').on( 'click',function (){
      
            layer.confirm('您确定删除全部？', {
                btn: ['确定','取消'] //按钮
                }, function(){
                    $.ajax({
                        url:'/home/photo/delete',
                        type:'POST',
                         beforeSend:function(){
                        a = layer.load();                      
                        },
                        success:function(data){
                            layer.close(a);

                            $('.img').remove();

                            document.getElementById('weiimg').innerHTML = "你还没有上传图片哟!@~@";
                            
                            layer.msg('删除成功', {icon: 1});

                        },
                        async:false,
                    });
                

                }, function(){
                
                });
         });  

        //删除单条
        function xm(cid){
                $.ajax({
                    url:'/home/photo/move',
                    type:'POST',
                    data:{cid:cid}, 
                    success:function(data){
                       $('.cl'+cid).remove();                       
                    }
                });
            };

             //页面加载事件
            window.onload = function() {

                //文章双击事件
                $(document).dblclick(function() {

                    //回复框显示
                    $('.disd1').hide();

                });
            };


        </script>
    </body>

</html>