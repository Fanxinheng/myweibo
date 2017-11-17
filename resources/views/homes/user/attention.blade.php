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
            center; overflow: hidden; } #weibo #lanmu { background-color: #fff; height:500px;
            } #weibo #lanmu li { margin-top: 3px; font-size: 20px; } #weibo .col-md-8
            #tiezi{ background-color: #fff; margin-bottom: 10px; margin-left: 12px;
            } .footer .container{ height: 50px; text-align: center; }
        </style>
    </head>
    
    <body>
        <!-- 头 -->
        <nav class="navbar navbar-fixed-top" style="background-color: #fff">
            <div class="container">
                <div class="navbar-header" style="margin-top: 13px;">
                    <img src="/homes/images/wb_logo.png" alt="">
                </div>
                <div class="navbar-header" style="margin-left:100px">
                    <form class="navbar-form navbar-right">
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="搜索框" style="width: 500px">
                        </div>
                        <button class="btn btn-success" type="submit">
                            Sign in
                        </button>
                    </form>
                </div>
                <div style="margin-top: 5px;float: right;">
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
        <!-- 头 -->
        <div class="container" style="margin-top: 60px" id="weibo">
            <!-- 头像 -->
            <div class="container">
                <div class="jumbotron" style="height: 400px">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <div style="margin-top: 80px;margin-left: 83px">
                            <img width="140" height="140" alt="Generic placeholder image" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                            class="img-circle">
                        </div>
                        <div>
                            <div style="text-align: center;margin-top: 5px">
                                dslkfjhlksdjfhalkjshf
                            </div>
                            <div style="text-align: center;margin-top: 5px">
                                slfkuhlakshfkdjfhsjdkksfhkdjy
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
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
                <!-- 微博 -->
                <div class="col-md-8 sidebar">
                    <!-- 微博遍历的地方 -->
                    <div class="col-lg-12" id="tiezi" style="">
                        <div class="col-lg-12">
                            <!-- 头像 -->
                            <div class="col-log-2" height="100" style="float: left ;margin-top:5px">
                                <img width="80" height="80" alt="Generic placeholder image" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                                class="img-circle">
                            </div>
                            <!-- 名称和时间 -->
                            <div class="col-log-8" style="float: left;margin-left: 20px">
                                <h3>
                                    dsafsdf
                                </h3>
                                <h6>
                                    dsafklhaslk
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
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <li>
                                            <a href="#">
                                                Action
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                Another action
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                Something else here
                                            </a>
                                        </li>
                                        <li role="separator" class="divider">
                                        </li>
                                        <li>
                                            <a href="#">
                                                Separated link
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- 删除分享的结束地方 -->
                        </div>
                        <!-- 内容 -->
                        <div class="col-lg-10" style="margin-left:100px">
                            sfdsfsdfds
                        </div>
                        <!-- 点赞评论 -->
                        <div class="col-lg-12" id="gongneng">
                            <ul class="nav nav-sidebar">
                                <li>
                                    <a href="">
                                        阅读
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        转发
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        评论
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        点赞
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12" id="tiezi">
                        <div class="col-lg-12">
                            <!-- 头像 -->
                            <div class="col-log-2" height="100" style="float: left ;margin-top:5px">
                                <img width="80" height="80" alt="Generic placeholder image" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                                class="img-circle">
                            </div>
                            <!-- 名称和时间 -->
                            <div class="col-log-8" style="float: left;margin-left: 20px">
                                <h3>
                                    dsafsdf
                                </h3>
                                <h6>
                                    dsafklhaslk
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
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <li>
                                            <a href="#">
                                                Action
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                Another action
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                Something else here
                                            </a>
                                        </li>
                                        <li role="separator" class="divider">
                                        </li>
                                        <li>
                                            <a href="#">
                                                Separated link
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- 删除分享的结束地方 -->
                        </div>
                        <!-- 内容 -->
                        <div class="col-lg-10" style="margin-left:100px">
                            sfdsfsdfds
                        </div>
                        <!-- 点赞评论 -->
                        <div class="col-lg-12" id="gongneng">
                            <ul class="nav nav-sidebar">
                                <li>
                                    <a href="">
                                        阅读
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        转发
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        评论
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        点赞
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12" id="tiezi">
                        <div class="col-lg-12">
                            <!-- 头像 -->
                            <div class="col-log-2" height="100" style="float: left ;margin-top:5px">
                                <img width="80" height="80" alt="Generic placeholder image" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                                class="img-circle">
                            </div>
                            <!-- 名称和时间 -->
                            <div class="col-log-8" style="float: left;margin-left: 20px">
                                <h3>
                                    dsafsdf
                                </h3>
                                <h6>
                                    dsafklhaslk
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
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <li>
                                            <a href="#">
                                                Action
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                Another action
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                Something else here
                                            </a>
                                        </li>
                                        <li role="separator" class="divider">
                                        </li>
                                        <li>
                                            <a href="#">
                                                Separated link
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- 删除分享的结束地方 -->
                        </div>
                        <!-- 内容 -->
                        <div class="col-lg-10" style="margin-left:100px">
                            sfdsfsdfds
                        </div>
                        <!-- 点赞评论 -->
                        <div class="col-lg-12" id="gongneng">
                            <ul class="nav nav-sidebar">
                                <li>
                                    <a href="">
                                        阅读
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        转发
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        评论
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        点赞
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12" id="tiezi">
                        <div class="col-lg-12">
                            <!-- 头像 -->
                            <div class="col-log-2" height="100" style="float: left ;margin-top:5px">
                                <img width="80" height="80" alt="Generic placeholder image" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                                class="img-circle">
                            </div>
                            <!-- 名称和时间 -->
                            <div class="col-log-8" style="float: left;margin-left: 20px">
                                <h3>
                                    dsafsdf
                                </h3>
                                <h6>
                                    dsafklhaslk
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
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <li>
                                            <a href="#">
                                                Action
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                Another action
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                Something else here
                                            </a>
                                        </li>
                                        <li role="separator" class="divider">
                                        </li>
                                        <li>
                                            <a href="#">
                                                Separated link
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- 删除分享的结束地方 -->
                        </div>
                        <!-- 内容 -->
                        <div class="col-lg-10" style="margin-left:100px">
                            sfdsfsdfds
                        </div>
                        <!-- 点赞评论 -->
                        <div class="col-lg-12" id="gongneng">
                            <ul class="nav nav-sidebar">
                                <li>
                                    <a href="">
                                        阅读
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        转发
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        评论
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        点赞
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- 微博遍历结束 -->
                </div>
                <!-- 微博结束 -->
            </div>
        </div>
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
        <!-- footer结束 -->
    </body>

</html>