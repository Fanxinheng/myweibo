<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <title>{{$config[0]->name}}</title>

        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap-theme.min.css">
        <script type="text/javascript" src="/homes/js/jquery-3.2.1.min.js">
        </script>
        <script type="text/javascript" src="/homes/bootstrap/js/bootstrap.min.js">
        </script>
         <script type="text/javascript" src="/homes/layer/layer.js">
        </script>
        <link rel="stylesheet" href="/homes/css/user.attention.css">
    </head>
    <body style="background:#B4DAF0 no-repeat center center fixed;font: 12px/1.3 'Arial','Microsoft YaHei';background-size: 100% 100%;background-position: top center;">
      
            <div>
                <nav class="navbar navbar-fixed-top" id = "navbar">
                    <div class="container">
                        <div class="navbar-header" id="navbar-header1" >
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
                           <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            <a href="/home/details/quit"  title="退出登录" style="text-decoration:none;">
                                退出
                            </a>
                        </div>
                        <div style="float:right;line-height: 20px;font-size: 16px;margin-right: 20px;margin-top: 10px">
                            <li class="dropdown" style="list-style-type:none">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration:none;">设置<span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="/home/user">个人中心</a></li>
                                <li><a href="/home/details/edit">个人信息</a></li>
                                <li><a href="/home/changepass">修改密码</a></li>
                                <li><a href="/home/message">系统消息</a></li>
                              </ul>
                            </li>
                        </div>
                        <div style="float:right;line-height: 20px;font-size: 16px;margin-right: 20px;margin-top: 10px">
                             <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                            <a href="/home/login" style="text-decoration:none;">
                                首页
                            </a>
                        </div>
                    </div>
                        <!--/.navbar-collapse -->
                    </div>
                </nav>
            </div>
        <!-- 头结束 -->


        <!-- 中间开始 -->
            <div class="row" id="weibo">
                <div class="container" >
                    <!-- 头像 及北京-->
                    <div class="container" >
                        <div class="jumbotron" id="backg" style="background:url('/homes/images/2016.jpg');background-repeat:no-repeat">

                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <!-- 头像 -->
                                <div id="jimg" >
                                    
                                    <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$rev->photo}}?imageView2/1/w/100/h/100/q/75" style="width:100px;" id="img" class="img-circle">
                                </div>
                                <div id="nickname" style="font-size: 18px;">
                                        {{$rev->nickName}}
                                        @if($re == 1)
                                        <span id="abtn1" onclick="abtn1({{$rev->uid}})"  class="btn-defalut" style="cursor: pointer;">取消关注</span>
                                        @else
                                        <span id="abtn1" onclick="abtn1({{$rev->uid}})"  class="btn-defalut" class="btn-defalut" style="cursor: pointer;>关注</span>
                                        @endif
                                    </div>
                                    <div id="nickname" style="font-size: 15px;">
                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;年龄:&nbsp;{{$rev->age}}&nbsp;&nbsp;职业:&nbsp;{{$rev->work}}&nbsp;&nbsp;积分:<span id="fsoc">{{$rev->socre}}</span>&nbsp;&nbsp;&nbsp;性别:&nbsp;
                                        @if($rev->sex=='w')
                                        女
                                        @else
                                        男
                                        @endif
                                    </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                    <!-- 头像 及北京-->

                    <style> #weibo #lanmu li { margin-top: 5px; font-size: 14px}</style>

                    <!-- 栏目及遍历   -->
                    <div class="container">
                        <!-- 栏目 -->
                        <div class="col-md-3 sidebar" id="lanmu">
                            <ul class="nav nav-sidebar">
                                <li class="active">
                                    <a href="/home/other/user/{{$rev->uid}}">
                                        微博
                                    </a>
                                </li>
                                <li>
                                    <a href="/home/other/fans/{{$rev->uid}}">
                                        粉丝
                                    </a>
                                </li>
                                <li>
                                    <a href="/home/other/attention/{{$rev->uid}}">
                                        关注
                                    </a>
                                </li>
                                <li>
                                    <a href="/home/other/photo/{{$rev->uid}}">
                                        相册
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- 栏目结束 -->

                        <!-- 关注 -->
                        <div class="col-md-8 sidebar" id="tiezi">  

                            <div class="col-lg-12" style="margin-left: 12px;background-color: #fff;margin-bottom: 10px;width: 830px; ">
                                <h3>关注</h3>
                            </div> 

                            <div class="col-lg-12" style="background-color: #fff;width: 830px;margin-left: 10px">
                                 @if($res ->isEmpty())
                                <div style="margin-top: 10px;line-height: 40px;height: 40px;background-color: #fff;width
                                :800px;">&nbsp;他还没有关注哟~~~
                                </div>
                                @else
                         <!-- 粉丝遍历的地方 -->
                         @foreach($res as $k=>$v)
                            <div style="width: 245px;height: 70px;float: left;margin: 10px;background-color: #F2F2F5">
                                    <!-- 头像 -->
                                    <div style="margin: 10px;float: left;margin-top: 15px">
                                       
                                        <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$v->photo}}?imageView2/1/w/35/h/35/q/75"  id="img" class="img-circle">
                                    </div>
                                    <!-- 名称和时间 -->
                                    <div style="float: left">
                                        <div style="float: left;font-size: 14px;margin-top: 15px">
                                        <a href="/home/other/user/{{$v->uid}}">{{$v->nickName}}</a>
                                        <div style="color:#808080;font-size: 12px;margin-top:10px"><em >性别:
                                        @if($v->sex == 'w') 女
                                        @else 男
                                        @endif
                                        年龄:{{$v->age}}
                                        </em></div>
                                        </div>
                                        
                                    </div>    
                            </div>   
                         @endforeach  
                        @endif
                            <!-- 微博遍历结束 -->
                           
                        </div>
                            <div style="float: right">{!! $res->render() !!}</div>
                        
                        <!-- 关注栏结束 -->
                        </div>
                    </div>

                </div>
            </div>
        <!-- 中间结束 -->
        <!-- footer结束 -->
        </div>
        <script type="text/javascript">
            

           function abtn1 (id){
                $.ajax({
                    url:'/home/other/act/'+id,
                    type:'GET',
                    data:{},
                    success:function(data){
                    if(data == 1){
                        document.getElementById('abtn1').innerHTML="关注";
                        layer.msg('取消成功');
                    }else{
                        document.getElementById('abtn1').innerHTML="取消关注";
                        layer.msg('关注成功');
                    }

                   
                    }
                });
            };
        </script>
        
    </body>

</html>