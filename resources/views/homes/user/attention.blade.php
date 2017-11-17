<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <title>
            个人主页
        </title>
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap-theme.min.css">
        <script type="text/javascript" src="/homes/js/jquery.min.js">
        </script>
        <script type="text/javascript" src="/homes/bootstrap/js/bootstrap.min.js">
        </script>
        <style>
            body{ background-color: #B3D9F0; } #weibo #gongneng li{ float: left; list-style:
            none; width:167px; height:50px; font-size: 15px; line-height: 20px; text-align:
            center; overflow: hidden; } #weibo { height: 800px;margin-bottom: 50px ;margin-top: 60px} #weibo #lanmu { background-color: #fff; height:500px;
            } #weibo #lanmu li { margin-top: 3px; font-size: 20px; } #weibo .col-md-8
            #tiezi{ background-color: #fff; margin-bottom: 10px; margin-left: 12px;
            } .footer .container{ height: 50px; text-align: center; } #foot { margin-top:100px }
        </style>
    </head>
    
    <body>   
        <div>
        <!-- 头开始 -->
            <div >
                <nav class="navbar navbar-fixed-top" style="background-color: #fff">
                    <div class="container">
                        <div class="navbar-header" style="margin-top: 13px;">
                            <img src="/homes/images/wb_logo.png" alt="">
                        </div>
                        <div class="navbar-header" style="margin-left:100px">
                            <form class="navbar-form navbar-right">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="搜索框" style="width: 500px">
                                </div>
                                <button class="btn btn-success" type="submit">
                                   搜索
                                </button>
                            </form>
                        </div>

                        <div  id="nav-1" style="margin-top: 5px;float: right;">
                            <button type="button" class="btn btn-default" aria-label="Left Align"
                            style="width:70px;height: 40px;">
                                <span class="glyphicon glyphicon-home" aria-hidden="true">
                                </span>
                                首页
                            </button>
                            |
                            <button type="button" class="btn btn-default" aria-label="Left Align"
                            style="width:70px;height: 40px;">
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
                    <!-- 头像 -->
                    <div class="container">
                        <div class="jumbotron" style="height: 300px">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <!-- 头像 -->
                                <div style="margin-top: 10px;margin-left: 100px">
                                    <img width="100" height="100" alt="Generic placeholder image" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                                    class="img-circle">
                                </div>
                                <div>
                                    <!-- 昵称  -->
                                    <div id="" style="text-align: center;margin-top: 5px">
                                        dslkfjhlksdjfhalkjshf

                                    </div>
                                    <!-- 签名  -->
                                    <div style="text-align: center;margin-top: 5px">
                                        slfkuhlakshfkdjfhsjdkksfhkdjy
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                    <!-- 栏目及遍历   -->
                    <div class="container">
                        <!-- 栏目 -->
                        <div class="col-md-4 sidebar" id="lanmu">
                            <ul class="nav nav-sidebar">
                                <li class="active">
                                    <a href="#">
                                        我的微博
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        我的粉丝
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        我的关注
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        相册管理
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        我点赞的微博
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        我微博的赞
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        我的评论
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        转发的微博
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- 栏目结束 -->

                        <!-- 关注 -->
                        <div class="col-md-8 sidebar">

                            <!-- 微博遍历的地方 -->
                          
                            <div class="col-lg-12" id="tiezi" style="">
                                <div class="col-lg-12">
                                    <!-- 头像 -->
                                    <div class="col-log-2" height="100" style="float: left ;margin-top:12px">
                                        <img width="65" height="65" alt="Generic placeholder image" src="" class="img-circle">
                                    </div>
                                    <!-- 名称和时间 -->
                                    <div class="col-log-8" style="float: left;margin-left: 20px">
                                        <h3>
                                            dsafsdf
                                        </h3>
                                        <h6>
                                            {{$v->time}}
                                        </h6>
                                    </div>
                                    <!-- 删除分享的地方 -->
                                    <div class="col-log-2">
                                        <div class="dropup" style="float: right;margin-top: 20px">
                                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="glyphicon glyphicon-menu-down" aria-hidden="true">
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- 删除分享的结束地方 -->
                                </div>
                                <!-- 内容 -->
                                <div class="col-lg-10" style="margin-left:100px">
                                    斯蒂芬斯蒂芬
                                </div>
                                <!-- 点赞评论 -->
                               
                          
                            <!-- 微博遍历结束 -->
                        </div>
                        <!-- 关注栏结束 -->
                        
                    </div>
                </div>
            </div>
        <!-- 中间结束 -->


        <!-- footer开始 -->
            <div id="foot">
                <footer class="footer" style="background-color: #fff">
                    <div class="container">
                        <p class="text-muted">
                            Place sticky footer content here.
                        </p>
                    </div>
                </footer>
                <!-- footer 开始-->
                <footer class="footer" style="background-color: #fff">
                    <div class="container">
                        <p class="text-muted">
                            Place sticky footer content here.
                        </p>
                    </div>
                </footer>
            </div>
        <!-- footer结束 -->


        </div>
        
    </body>

</html>