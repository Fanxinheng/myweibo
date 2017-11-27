<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <title>
           
        </title>
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap-theme.min.css">
        <script type="text/javascript" src="/homes/js/jquery.min.js">
        </script>
        <script type="text/javascript" src="/homes/bootstrap/js/bootstrap.min.js">
        </script>

        <link rel="stylesheet" href="/homes/css/user.attention.css">
    </head>
    <body style="background: url('/homes/images/body_bg.jpg') no-repeat center center fixed;font: 12px/1.3 'Arial','Microsoft YaHei';">
      
            <div>
                <nav class="navbar navbar-fixed-top" id = "navbar">
                    <div class="container">
                        <div class="navbar-header" id="navbar-header1" >
                            <img src="/homes/images/wb_logo.png" alt="">
                        </div>
                        <div class="navbar-header" id="navbar-header2">
                            <form class="navbar-form navbar-right">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="搜索框" style="">
                                </div>
                                <button class="btn btn-success" type="submit">
                                   搜索
                                </button>
                            </form>
                        </div>

                       <div id="nav-1">
                        <div style="float:right;line-height: 20px;font-size: 16px;margin-right: 20px;margin-top: 10px">
                            <span class="glyphicon glyphicon-home" aria-hidden="true">
                            </span>
                            <a href="/home/message">
                                系统消息
                                @if($message>0)
                                <div style="width: 20px;height: 20px;background:#fa7d3c;float: right;border-radius: 10px;margin-left: 3px;text-align:center;color: #fff;line-height: 20px  ">
                                    {{$message}}
                                </div>
                                @else
                                <div></div>
                                @endif
                            </a>
                        </div>
                        <div style="float:right;line-height: 20px;font-size: 16px;margin-right: 20px;margin-top: 10px">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true">
                            </span>
                            <a href="/home/user">
                              {{$rev->nickName}} 
                            </a>
                        </div>
                        <div style="float:right;line-height: 20px;font-size: 16px;margin-right: 20px;margin-top: 10px">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true">
                            </span>
                            <a href="/home/admin">
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
                        <div class="jumbotron" id="backg">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <!-- 头像 -->
                                <div id="jimg" >
                                    <img width="100" height="100"  src="/homes/images/197.jpg" class="img-circle">
                                </div>
                                <div>
                                    <!-- 昵称  -->
                                    <div id="nickname" >
                                     {{$rev->nickName}}
                                    </div>
                                    <!-- 签名  -->     
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
                                        相册管理
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

                            <div class="col-lg-12">
                                
                         <!-- 粉丝遍历的地方 -->
                         @foreach($res as $k=>$v)
                            <div style="width: 245px;height: 70px;float: left;margin: 10px;background-color: #F2F2F5">
                                    <!-- 头像 -->
                                    <div style="margin: 10px;float: left;margin-top: 15px">
                                        <img width="40" height="40" src="/homes/images/197.jpg" class="img-circle">
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

                            <!-- 微博遍历结束 -->
                           
                        </div>

                        <!-- 关注栏结束 -->
                        </div>
                    </div>

                </div>
            </div>
        <!-- 中间结束 -->
        <!-- footer结束 -->
        </div>
        
    </body>

</html>