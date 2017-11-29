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
        <link rel="stylesheet" href="/homes/css/user.replay.css">
    </head>


     <body style="background: url('/homes/images/body_bg.jpg') no-repeat center center fixed;font: 12px/1.3 'Arial','Microsoft YaHei';background-size: 100% 100%;background-position: top center;">
        <div>
            <nav class="navbar navbar-fixed-top" id="navbar">
                <div class="container">
                    <div class="navbar-header" id="navbar-header1">
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
                                系统消息 @if($message>0)
                                <div style="width: 20px;height: 20px;background:#fa7d3c;float: right;border-radius: 10px;margin-left: 3px;text-align:center;color: #fff;line-height: 20px  ">
                                    {{$message}}
                                </div>
                                @else
                                <div>
                                </div>
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
            <div class="container">
                <!-- 头像 及北京-->
                <div class="container">

                        <div class="jumbotron" id="backg" style="background:url('/homes/images/197.jpg');">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <!-- 头像 -->
                                <div id="jimg" style="margin-left: 100px">
                                     <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$rev->photo}}?imageView2/1/w/100/h/100/q/75|watermark/2/text/bXl3ZWlibw==/font/5a6L5L2T/fontsize/240/fill/I0YxRUZFNg==/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim" style="width:100px;" id="img" class="img-circle">

                                </div>
                                <div>
                                    <!-- 昵称 -->
                                    <div id="nickname" >
                                        {{$rev->nickName}}&nbsp;&nbsp;

                                    </div>
                                    <div id="nickName" style="margin-left: 20px;margin-top:10px;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;年龄:&nbsp;{{$rev->age}}&nbsp;&nbsp;职业:&nbsp;{{$rev->work}}&nbsp;&nbsp;积分:<span id="fsoc">{{$rev->socre}}</span>&nbsp;&nbsp;&nbsp;性别:&nbsp;
                                        @if($rev->sex=='w')
                                        <em>女</em>
                                        @else
                                        <em>男</em>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                    <!-- 头像 及北京-->

                    <style>
                        #weibo #lanmu li { margin-top: 5px; font-size: 14px}
                    </style>
                    <!-- 栏目及遍历 -->
                    <div class="container">
                        <!-- 栏目 -->
                        <div class="col-md-3 sidebar" id="lanmu" style="height: 500px">
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

                                        我微博的赞 @if($point>0)
                                        <div style="width: 20px;height: 20px;background:#fa7d3c;float: right;border-radius: 10px;margin-left: 3px;text-align:center;color: #fff;line-height: 20px " id="pdiv">
                                            {{$point}}
                                        </div>
                                        @else
                                        <div id="pdiv" style="width: 20px;height: 20px;background:#fa7d3c;float: right;border-radius: 10px;margin-left: 3px;text-align:center;color: #fff;line-height: 20px;display: none ">
                                        </div>
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a href="/home/replay">

                                        微博评论 @if($replay>0)
                                        <div style="width: 20px;height: 20px;background:#fa7d3c;float: right;border-radius: 10px;margin-left: 3px;text-align:center;color: #fff;line-height: 20px " id="rediv">
                                            {{$replay}}
                                        </div>
                                        @else
                                        <div style="width: 20px;height: 20px;background:#fa7d3c;float: right;border-radius: 10px;margin-left: 3px;text-align:center;color: #fff;line-height: 20px;display: none" id="rediv">

                                        </div>
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a href="/home/forward">

                                        微博转发 @if($forward>0)
                                        <div style="width: 20px;height: 20px;background:#fa7d3c;float: right;border-radius: 10px;margin-left: 3px;text-align:center;color: #fff;line-height: 20px  " id="fdiv">
                                            {{$forward}}
                                        </div>
                                        @else
                                        <div style="width: 20px;height: 20px;background:#fa7d3c;float: right;border-radius: 10px;margin-left: 3px;text-align:center;color: #fff;line-height: 20px;display: none  "  id="fdiv">
                                        </div>
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- 栏目结束 -->
                        <!-- 微博 -->
                        <div class="col-md-8">
                            <div class="col-lg-12" style="margin-left: 12px;background-color: #fff;margin-bottom: 10px;width: 830px; ">
                                <h3>转发</h3>
                            </div>
                            @if($res ->isEmpty())
                                <div class="col-lg-12" style="width: 830px;height: 10px;margin-left: 12px;background-color: #fff;margin-bottom: 10px;line-height: 40px;height: 40px">
                                    您还没有任何转发哟~~
                                </div>
                            @else
                            <!-- 微博遍历的地方 -->
                            @foreach($res as $k=>$v)
                            <div class="col-lg-12" id="tiezi" style="width: 830px">
                                <div class="col-lg-12" >
                                    <!-- 头像 -->
                                    <div class="col-log-2" id="tieimg">

                                         <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$rev->photo}}?imageView2/1/w/50/h/50/q/75|watermark/2/text/bXl3ZWlibw==/font/5a6L5L2T/fontsize/240/fill/I0YxRUZFNg==/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim" id="img" class="img-circle">
                                    </div>
                                    <!-- 名称和时间 -->
                                    <div class="col-log-8" id="tiename" style="margin-top: 20px">
                                        <b>
                                           <a href="/home/other/user/{{$v->user_info->uid}}">{{$v->user_info->nickName}}</a>
                                        </b>
                                        <br/>
                                        <div style="margin-top: 5px">
                                            <em>
                                                {{date('Y-m-d H:i:s',$v->time)}}
                                            </em>
                                        </div>
                                    </div>
                                </div>
                                <!-- 内容 -->
                                <div class="col-lg-10" style="margin-left: 70px;margin-top: 10px">

                                    {{$v->fcontents}}
                                </div>
                                @foreach($v->contents as $re)
                               <div class="col-lg-10" style="background-color: #F2F2F5;padding:5px;margin-left: 83px;margin-top: 5px;margin-bottom: 10px;border-radius: 10px;line-height: 20px">
                                    <i>
                                        转发我的微博:
                                    </i>
                                    {{$re->content}}
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                            <!-- 微博遍历结束 -->

                            @endif
                        </div>
                        <!-- 微博 -->
                    </div>
                </div>
            </div>
            <!-- 中间结束 -->
        </div>
    </body>

</html>