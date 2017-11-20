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
        <link rel="stylesheet" href="/homes/css/user.index.css">
    </head>
    
    <body>
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
                                    {{$rev->nickName}}
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
                                    <img width="65" height="65" alt="Generic placeholder image" src="/homes/images/2015.jpg"
                                    class="img-circle">
                                </div>
                                <!-- 名称和时间 -->
                                <div class="col-log-8" id="tiename">
                                    <h3>
                                        {{$rev->nickName}}
                                    </h3>
                                    <h6>
                                        {{date('Y-m-d H:i:s',$v->time)}}
                                    </h6>
                                </div>
                            </div>
                            <!-- 内容 -->
                            <div class="col-lg-10" id="tiecon">
                                {{$v->content}}
                            </div>
                            <!-- 点赞评论 -->
                            <div class="col-lg-12" id="gongneng">
                                <ul class="nav nav-sidebar">
                                    <li>
                                        <div>
                                            <a href="">
                                                转发{{$v->fnum}}
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="plil">
                                            <a href="">
                                                评论{{$v->rnum}}
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <a href="">
                                                点赞{{$v->pnum}}
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <form action="/home/delete/{{$v->cid}}" method="post">
                                                <button class="btn">
                                                    删除
                                                </button>
                                                {{csrf_field()}}
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-10 disd1" style="display:none;" >
                                <div style="margin-left: 80px;float:left;margin-bottom: 20px; ">
                                    <textarea name="conn" id="conn" cols="50" rows="5">
                                    </textarea>
                                </div>
                                <button class="btn btn-success" style="margin-top: 100px;margin-left: 10px">
                                    回复
                                </button>
                            </div>
                            <div>
                                <div>
                                    <div class="col-lg-10" style="margin-left: 80px;">
                                        <!-- 头像 -->
                                        <div class="col-log-2" style="margin-top: 20px;float:left;margin-right: 10px">
                                            <img width="30" height="30" src="/homes/images/2015.jpg" class="img-circle">
                                        </div>
                                        <!-- 名称和时间 -->
                                        <div class="col-log-8" style="margin-top: 30px;">
                                            <h6>
                                                谁给谁回复时间
                                            </h6>
                                        </div>
                                        <div class="col-lg-10" style="margin-left: 23px;margin-top: 5px;word-break:break-all;margin-bottom: 10px">
                                            sfdfdsgsdgnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn
                                        </div>
                                        <div class="psp">
                                            <span>
                                                回复
                                            </span>
                                        </div>
                                        <div class="col-lg-12 disd2" style="display:none;">
                                            <div style="margin-left: 30px;float:left;margin-bottom: 20px ">
                                                <textarea name="conn" id="conn" cols="50" rows="5">
                                                </textarea>
                                            </div>
                                            <button class="btn btn-success" style="margin-top: 100px;margin-left: 10px">
                                                回复
                                            </button>
                                        </div>
                                    </div>
                                    <!-- 内容 -->
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- 微博遍历结束 -->
                    </div>
                    <!-- 微博结束 -->
                </div>
            </div>
        </div>
        <!-- 中间结束 -->
        <div id="foot">
            <footer class="footer" id="foot1">
                <div class="container">
                    <p class="text-muted">
                        Place sticky footer content here.
                    </p>
                </div>
            </footer>
            <!-- footer 开始-->
        </div>
        <!-- footer结束 -->
        </div>
        <script>
            $('.plil').click(function() {
                $('.disd1').show();
                return false;
            });

            $('.psp').click(function() {

                $('.disd2').show();
                return false;
            });

            window.onload = function() {

                $(document).click(function() {
                    $('.disd2').hide();
                });
                $(document).click(function() {
                    $('.disd1').hide();
                });
                $('.disd2').click(function(event) {
                    event = event || window.event;
                    event.stopPropagation();
                });
                $('.disd1').click(function(event) {
                    event = event || window.event;
                    event.stopPropagation();
                });
            };
        </script>
    </body>

</html>