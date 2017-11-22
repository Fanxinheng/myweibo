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
    
    <body>
        <div id="b">
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
                            <button type="button" class="btn btn-default" aria-label="Left Align">
                                <span class="glyphicon glyphicon-home" aria-hidden="true">
                                </span>
                                首页
                            </button>
                            <button type="button" class="btn btn-default" aria-label="Left Align">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true">
                                </span>
                            </button>
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
                        <div class="jumbotron" id="backg">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <!-- 头像 -->
                                <div id="jimg">
                                    <img width="100" height="100" src="/homes/images/197.jpg" class="img-circle">
                                </div>
                                <div>
                                    <!-- 昵称 -->
                                    <div id="nickname">
                                    </div>
                                    <!-- 签名 -->
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                    <!-- 头像 及北京-->
                    <!-- 栏目及遍历 -->
                    <div class="container">
                        <!-- 栏目 -->
                        <div class="col-md-3 sidebar" id="lanmu">
                            <ul class="nav nav-sidebar">
                                <li class="active">
                                    <a href="/home/user">
                                        我的微博
                                    </a>
                                </li>
                                <li>
                                    <a href="/home/fans">
                                        我的粉丝
                                    </a>
                                </li>
                                <li>
                                    <a href="/home/attention">
                                        我的关注
                                    </a>
                                </li>
                                <li>
                                    <a href="/home/phone">
                                        相册管理
                                    </a>
                                </li>
                                <li>
                                    <a href="/home/user">
                                        我点赞的微博
                                    </a>
                                </li>
                                <li>
                                    <a href="/home/point">
                                        我微博的赞
                                    </a>
                                </li>
                                <li>
                                    <a href="/home/replay">
                                        谁给我的微博评论
                                    </a>
                                </li>
                                <li>
                                    <a href="/home/forward">
                                        谁转发了我的微博
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- 栏目结束 -->
                        <!-- 微博 -->
                        <div class="col-md-8 sidebar">
                            <!-- 微博遍历的地方 -->
                            @foreach($res as $k=>$v)
                            <div class="col-lg-12" id="tiezi">
                                <div class="col-lg-12">
                                    <!-- 头像 -->
                                    <div class="col-log-2" id="tieimg">
                                        <img width="50" height="50" alt="Generic placeholder image" src="/homes/images/2015.jpg"
                                        class="img-circle">
                                    </div>
                                    <!-- 名称和时间 -->
                                    <div class="col-log-8" id="tiename" style="margin-top: 20px">
                                        <b>
                                            {{$v->user_info->nickName}}
                                        </b>
                                        <br/>
                                        <em>
                                            {{date('Y-m-d H:i:s',$v->time)}}
                                        </em>
                                    </div>
                                </div>
                                <!-- 内容 -->
                                <div class="col-lg-10" id="tiecon">
                                    {{$v->rcontent}}
                                </div>
                                @foreach($v->content as $re)
                                <div class="col-lg-10" id="tiecon" style="background-color: #ccc;padding:5px">
                                    <i>
                                        评论我的微博:
                                    </i>
                                    {{$re->content}}
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                            <!-- 微博遍历结束 -->
                        </div>
                        <!-- 微博 -->
                    </div>
                </div>
            </div>
            <!-- 中间结束 -->
            
            <div id="foot">
                <footer class="footer" id="foot1" style="background-color: #fff">
                    <div class="container" style="height: 50px; text-align: center;">
                        <p class="text-muted">
                            Place sticky footer content here.
                        </p>
                    </div>
                </footer>
                <!-- footer 开始-->
            </div>
            <!-- footer结束 -->
        </div>
    </body>

</html>