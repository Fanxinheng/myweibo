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
    <body>   
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

                        <div  id="nav-1">
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
                                     {{$id->nickName}}
                                    </div>
                                    <!-- 签名  -->     
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                    <!-- 头像 及北京-->
                    <!-- 栏目及遍历   -->
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
                        <div class="col-md-8 sidebar" id="tiezi"> 

                            <!-- 微博遍历的地方 -->
                            <div class="col-lg-12" id="atit">
                                <h3>粉丝</h3>
                            </div>


                            <div class="col-lg-12" id="tiezi2">
                                
                               @foreach($res as $k=>$v)

                                <div class="col-lg-12" id="tiezi3">
                                    <!-- 头像 -->
                                    <div class="col-log-2" id="tieimg">
                                        <img width="65" height="65" src="/homes/images/wb_logo.png"
                                        class="img-circle">
                                    </div>
                                    <!-- 名称和时间 -->
                                    <div class="col-log-8" id="tiecon" >
                                        <h3>
                                            {{$v->nickName}}
                                        </h3>
                                        <h5>
                                            关注:{{$v->id}}|粉丝:123|微博:123
                                        </h5>
                                    </div>
                                    <!-- 删除分享的地方 -->
                                    <div class="col-log-2">
                                        <div class="dropup">
                                            <form action="/home/fans/{{$v->id}}" method="post" >
                                                <button class="btn btn-danger dropdown-toggle" name="but1">
                                                    删除
                                                </button>
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                            </form>

                                            <button class="btn btn-warning dropdown-toggle">
                                                关注
                                            </button>



                                        </div>
                                    </div>
                                    <!-- 删除分享的结束地方 -->
                                </div>
                                @endforeach
                            <!-- 微博遍历结束 -->
                            </div>
                        <!-- 微博结束 -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- 中间结束 -->
     
            <div id="foot">
                <footer class="footer" id="foot1" >
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
        
    </body>

</html>