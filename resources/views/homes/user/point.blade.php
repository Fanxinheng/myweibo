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

        <link rel="stylesheet" href="/homes/css/user.fans.css">
    </head>
    <body style="background: url('/homes/images/body_bg.jpg') no-repeat center center fixed;font: 12px/1.3 'Arial','Microsoft YaHei';">
      
            <div>
                <nav class="navbar navbar-fixed-top" id = "navbar">
                    <div class="container">
                        <div class="navbar-header" id="navbar-header1" >
                            <a href="/home/login">
                            <img src="/homes/images/wb_logo.png" alt="">
                            </a>
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
                            <a href="/home/login">
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
                                        相册管理
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
                            </ul>
                        </div>
                        <!-- 栏目结束 -->

                        <!-- 微博 -->
                        <div class="col-md-8 sidebar" > 

                           
                            <div class="col-lg-12" style="margin-left: 12px;background-color: #fff;margin-bottom: 10px;width: 830px; ">
                                <h3>点赞</h3>
                            </div>
                            <!-- 微博遍历的地方 -->
                            @if($res ->isEmpty())
                            <div class="col-lg-12" id="tiezi" style="width: 830px;margin-top: 10px;height: 40px;line-height: 40px;background-color: #fff;margin-left: 14px">你还没有任何回复哟~~~</div>
                            @else
                            <div class="col-lg-12" >
                                @foreach($res as $k=>$v) 
                                <div class="col-lg-12" style="width: 830px;background-color: #fff;margin-left: -2px;margin-top: 10px;padding-bottom: 10px" >
                                    <!-- 头像 -->
                                    <div class="col-log-2" style="float: left;margin-top: 10px;margin-right: 10px">

                                        <img width="30" height="30" src="/homes/images/2015.jpg"
                                        class="img-circle">
                                    </div>
                                    <!-- 名称和时间 -->
                                    <div class="col-log-8" style="margin-top:12px;">
                                        <b><a href="/home/other/user/{{$v->user_info->uid}}">{{$v->user_info->nickName}}</a></b><em>赞了我的微博</em><br>

                                        <em></em>
                                    </div>
                                    <div class="col-log-10" style="word-break:break-all;margin-left: 40px;margin-top:10px;background-color:#F2F2F5;line-height: 40px;border-radius: 10px ">

                                        @foreach($v->content as $res)
                                        &nbsp;&nbsp;&nbsp;<b>@张筱:</b>{{$res->content}} 
                                        @endforeach 
                                        
                                    </div>
                                </div>
                                <!-- <div style="padding:20px 350px;border-top-color:#000;margin-bottom: -20px; line-height:40px;"><span>回复</span></div> -->
                                 @endforeach
                             </div>
                             @endif
                           
                            <!-- 微博遍历结束 -->                           
                        <!-- 微博结束 -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- 中间结束 -->
        </div>
        
    </body>

</html>