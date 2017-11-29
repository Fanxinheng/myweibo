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
   <body style="background: url('/homes/images/body_bg.jpg') no-repeat center center fixed;font: 12px/1.3 'Arial','Microsoft YaHei';background-size: 100% 100%;background-position: top center;">

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

                                    <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$rev->photo}}?imageView2/1/w/100/h/100/q/75|watermark/2/text/bXl3ZWlibw==/font/5a6L5L2T/fontsize/240/fill/I0YxRUZFNg==/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim" style="width:100px;" id="img" class="img-circle">
                                </div>
                                <div>
                                    <div id="nickname">
                                        {{$rev->nickName}}
                                        @if($re == 1)
                                        <button id="abtn1" onclick="abtn1({{$rev->uid}})"  class="btn-defalut">取消关注</button>
                                        @else
                                        <button id="abtn1" onclick="abtn1({{$rev->uid}})"  class="btn-defalut" class="btn-defalut">关注</button>
                                        @endif
                                    </div>
                                    <div id="nickname">
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
                    #weibo #tiezi #tiezi3 button{margin-top: 10px;}
                    </style>

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

                        <!-- 微博 -->
                        <div class="col-md-8 sidebar" id="tiezi">

                            <!-- 微博遍历的地方 -->
                            <div class="col-lg-12" style="margin-left: 12px;background-color: #fff;margin-bottom: 10px;width: 830px; ">
                                <h3>粉丝</h3>
                            </div>
                            @if($res ->isEmpty())
                                <div style="margin-top: 100px;line-height: 40px;height: 40px;background-color: #fff;width
                                :830px;margin-left: 14px">&nbsp;他还没有粉丝哟~~~
                                </div>
                                @else

                            <div class="col-lg-12" style="background-color: #fff;margin-left: 12px;width: 830px;padding-bottom: 10px " >

                               @foreach($res as $k=>$v)

                                <div class="col-lg-4" id="tiezi3" style="float: left;width: 250px;margin-left: 5px;background:#DEDEE5;margin-top: 10px;background-color: #F2F2F5;height: 65px;">
                                    <!-- 头像 -->
                                    <div class="col-log-2" style="margin-top:10px;float: left; ">
                                        <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$v->photo}}?imageView2/1/w/35/h/35/q/75|watermark/2/text/bXl3ZWlibw==/font/5a6L5L2T/fontsize/240/fill/I0YxRUZFNg==/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim"  id="img" class="img-circle">
                                    </div>
                                    <!-- 名称和时间 -->
                                    <div class="col-log-8" style="margin-top: 15px;margin-left: 10px;float: left;" >

                                            <a href="/home/other/user/{{$v->uid}}">{{$v->nickName}}</a><br>


                                            <div style="float: left;font-size: 12px;color: #808080;">
                                                年龄:{{$v->age}}&nbsp;|&nbsp;性别:

                                                @if($v->sex=='m')
                                                男
                                                @elseif($v->sex == 'w')
                                                女
                                                @endif
                                                &nbsp;|&nbsp;工作:
                                                @if($v->work)
                                                {{$v->work}}
                                                @else
                                                暂无
                                                @endif

                                            </div>

                                    </div>
                                </div>
                                @endforeach

                            <!-- 微博遍历结束 -->
                            </div>
                              @endif
                        <!-- 微博结束 -->
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