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
        <script type="text/javascript" src="/homes/layer/layer.js">
        </script>
    </head>
    
    <body style="background: url('/homes/images/body_bg.jpg') no-repeat center center fixed;font: 12px/1.3 'Arial','Microsoft YaHei';"
    onclick="">
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

                    @if('{{$rev->photo}}'=='')
                    <div class="jumbotron" id="backg" style="background:url('{{$rev->photo}}');">
                        @else
                        <div class="jumbotron" id="backg" style="background:url('/homes/images/197.jpg');">
                            @endif
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <!-- 头像 -->
                                <div id="jimg">
                                    @if('{{$rev->photo}}'=='')
                                    <img width="100" height="100" src="{{$rev->photo}}" class="img-circle">
                                    @else
                                    <img width="100" height="100" src="/homes/images/197.jpg" class="img-circle">
                                    @endif
                                </div>
                                <div>
                                    <!-- 昵称 -->
                                    <div id="nickname" >
                                        {{$rev->nickName}}&nbsp;&nbsp;
                                        
                                    </div>
                                    <div id="nickName">
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
                        <div class="col-md-8 sidebar">
                            <div class="col-lg-12" style="margin-left: 12px;background-color: #fff;margin-bottom: 10px;width: 830px; ">
                                <h3>
                                    微博
                                </h3>
                            </div>

                               @if($res ->isEmpty())
                                <div style="margin-top: 70px;line-height: 40px;height: 40px;background-color: #fff;width
                                :830px;margin-left: 14px">&nbsp;你还没有发微博哟~~~
                                </div>
                                @else
                            <!-- 微博遍历的地方 -->
                            @foreach($res as $k=>$v)
                            <div class="col-lg-12" id="tiezi" style="width: 830px;overflow: hidden;">
                                <div class="col-lg-12" id="buhuo" class="layer_notice">
                                    <!-- 头像 -->
                                    <div class="col-log-2" id="tieimg" style="margin-top: 20px">
                                        <img width="50" height="50" alt="Generic placeholder image" src="/homes/images/2015.jpg"
                                        class="img-circle">
                                    </div>
                                    <!-- 名称和时间 -->
                                    <div class="col-log-6" id="tiename" style="margin-top: 25px;margin-left: 10px;">
                                        <div>
                                            <b id="xing">{{$rev->nickName}}</b>
                                        </div>

                                        <div style="margin-top: 5px;font-size: 12px;color: #808080;">
                                            <em style="color:#676462"> {{date('Y-m-d H:i:s',$v->time)}}   </em>
                                        </div>
                                        <div id="nei" style="margin-top: 20px; word-break:break-all;width:600px">{{$v->content}} </div><br>
                                        @if($v->image)
                                        <div style="margin-top: 10px">
                                             <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$v->image}}?imageView2/1/w/200/h/200/q/75|watermark/2/text/bXl3ZWlibw==/font/5a6L5L2T/fontsize/240/fill/I0YxRUZFNg==/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim" style="width:100px;" id="img">
                                        </div>
                                        @else
                                        <div></div>
                                        @endif
                                    </div>
                                </div>
                                <!-- 内容 -->
                                <style>
                                    #weibo #lanmu ul li{font-size:14px } #weibo #tiezi #gongneng {margin-top:
                                    10px;border-top: 1px solid #D9D9D9;border-bottom:1px solid #D9D9D9;overflow:
                                    hidden;width: 840px;margin-left:-15px;} #weibo #tiezi #gongneng ul li{list-style:none
                                    outside none;color:#808080;font-size:12px;float: left;line-height: 22px;text-align:
                                    center;width:180px; } #weibo #tiezi #v {background:#F2F2F5;width:830;}
                                    #weibo #tiezi #v .disd1{display:none;padding:5px;}
                                    #weibo #tiezi #v .disd1 #tex{margin-left: 64px;float:left; } #weibo #tiezi
                                    #v .disd1 #tex #conn{resize:none;line-height: 20px;height: 28px;margin-right:
                                    10px} 

                                    #weibo #tiezi #v #rimg{float:left;margin-left: 18px;margin-top: 10px}
                                    #weibo #tiezi #v .col-lg-12{background-color:#F2F2F5;margin-left: -15px;width: 830px }
                                    #weibo #tiezi #v #cont{margin-top: 14px;margin-left: 60px;margin-bottom:
                                    10px} #weibo #tiezi #v #cont #div1{margin-top: 5px;font-size: 12px;word-break:break-all;
                                    width: 600px} #weibo #tiezi #v #con #div2{margin-top: 10px;font-size: 12px;word-break:break-all;
                                    width: 600px}
                                </style>
                                <!-- 点赞评论 -->
                                <div class="col-lg-12" id="gongneng">
                                    <ul class="nav nav-sidebar">
                                        <li>
                                            <a href="javascript:;" onclick="fnum({{$v->cid}})">
                                                <span id="fspan">
                                                    转发{{$v->fnum}}&nbsp;&nbsp;|
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" onclick="fun({{$v->cid}})">
                                                <span id="rspa">
                                                    评论{{$v->rnum}}&nbsp;&nbsp;|
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" onclick="poin({{$v->cid}})">
                                                <span class="glyphicon glyphicon-thumbs-up" id="spa{{$v->cid}}">
                                                    
                                                    点赞{{$v->pnum}}&nbsp;&nbsp;|
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/home/delete/{{$v->cid}}">
                                                <span>
                                                    <em>
                                                        删除&nbsp;&nbsp;|
                                                    </em>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div id="v" >
                                    <div class="col-lg-12 disd1" id="disd1{{$v->cid}}">                                 
                                            <div id="tex">
                                                <textarea name="connb" id="conn" cols="70" rows="1"></textarea>
                                            </div>
                                            <span class="btn btn-defalut" style="height: 28px;line-height: 15px"
                                            id="butt"  onclick="rebut({{$v->cid}})">
                                                回复
                                            </span>                                      
                                    </div>
                                    <div id="sdf{{$v->cid}}">
                                        @foreach($v->replay as $key=>$val)
                                        <div class="col-lg-12" id="hejiu{{$v->cid}}">
                                            <!-- 头像 -->
                                            <div class="col-log-2" id="rimg">
                                                <img width="30" height="30" src="/homes/images/2015.jpg">
                                            </div>
                                            <!-- 名称和时间 -->
                                            <div class="col-log-8" id="cont">
                                                <div id="div1">
                                                    <a href="/home/other/user/{{$val->user_info->uid}}">
                                                        {{$val->user_info->nickName}}
                                                    </a>
                                                    &nbsp;回复:&nbsp; {{$val->rcontent}}
                                                </div>
                                                <div id="div2">
                                                    <em style="color:#676462">{{date('Y-m-d H:i:s',$val->time)}}</em>
                                                    <a href="/home/replay/delete/{{$val->id}}">
                                                        <span style="float: right">
                                                            删除
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- 二级回复的微博 -->
                                            <!-- <div class="col-lg-12 disd2" id="disd2{{$key}}" style="display:none;">
                                            <div style="margin-left: 42px;float:left;margin-bottom: 20px;margin-top: 10px ">
                                            <textarea name="conn" id="conn" cols="60" rows="3" style="resize:none;"></textarea>
                                            </div>
                                            <button class="btn btn-success" style="margin-top: 30px;margin-left: 10px">
                                            回复
                                            </button>
                                            </div> -->
                                        </div>
                                        @endforeach
                                        <!-- 内容 -->
                                    </div>
                                </div>
                            </div>
                            @endforeach

                           <!--  <nav>
                              <ul class="pager">
                                <li class="previous"><a href="{{$res->previousPageUrl()}}"><span aria-hidden="true">&larr;</span> Older</a></li>
                                <li class="next"><a href="{{$res->nextPageUrl()}}">Newer <span aria-hidden="true">&rarr;</span></a></li>
                              </ul>
                            </nav> -->

                           
                            <!-- 微博遍历结束 -->
                            @endif
                        </div>
                        <!-- 微博结束 -->
                         <div style="float: right">{!! $res->render() !!}</div>
                    </div>
                </div>
            </div>
            <!-- 中间结束 -->
        </div>
        <script>
            //评论点击事件
            function fun(id) {

                //让回复框显示
                $('#disd1' + id).show();

            };

            //点击回复
            function rebut(cid){

             conn =$('#conn').val();

             $.get('/home/type',{tid:cid,conn:conn},function(data){

                //改变转发那里的转发量
                document.getElementById('rspa').innerHTML="评论"+data['replay'];

                //改变未读的消息量
                document.getElementById('rediv').innerHTML=data['status'];

                //显示未读消息框
                $('#rediv').show();

                //改变积分
                document.getElementById('fsoc').innerHTML=data['socre'];
                hejiu = document.getElementById('hejiu'+cid);
                //添加回复消息
                var newDiv = document.createElement('div');
                var str = "<div class='col-lg-12'><div class='col-log-2' id='rimg'><img width='30' height='30' src='/homes/images/2015.jpg'></div><div class='col-log-8' id='cont'><div id='div1'><a href='/home/other/user/"+data['nickName']+"'>"+data['nickName']+"</a>&nbsp;回复:&nbsp; "+data['rcontent']+"</div><div id='div2'><em style='color:#676462'>"+data['time']+"</em><a href='/home/replay/delete/"+data['id']+"'><span style='float: right'> 删除</span></a></div></div></div>";
                newDiv.innerHTML=str;
                //添加回复消息
                $('#sdf'+cid).prepend(newDiv,hejiu);
                //让回复框隐藏
                 $('#disd1' + cid).hide();
                 //让回复框的内容清空
                $('#conn').val('');
                //弹出提示
                layer.msg('评论成功');

             });

            }

            //转发事件
            function fnum(cid) {
                xing = document.getElementById('xing').innerHTML;
                nei = document.getElementById('nei').innerHTML;

                layer.alert('<div style="margin-top:10px;margin-left:5px;"><em>转发微博:</em></div><br><div style="background-color:#F2F2F5;margin-left:30px;margin-top:5px;width:400px;">@'+xing+':'+nei+'</div><textarea name="te" id="te" style="width:400px;height:80px;resize:none;margin-top:10px;margin-left:30px;"></textarea>',//内容
                {
                type: 1,
                title: "转发",//标题
                btn:['确定','取消'],//button按钮
                yes :function(index){

                    //获取弹出框里输入的参数
                    te = $('#te').val();

                    //发送ajax
                    $.get('/home/ward',{tid:cid,rcon:te},function(data){

                    //改变内容    
                    document.getElementById('fspan').innerHTML="转发"+data['fnum'];

                    //改变消息框里的内容
                    document.getElementById('fdiv').innerHTML=data['news'];

                    $('#fdiv').show();

                    //获取积分
                    document.getElementById('fsoc').innerHTML=data['socre'];

                    //弹出提示框
                    layer.msg('转发成功');
                    });
                    //关闭窗口
                    layer.close(index);
                },
                closeBtn: 0,
                area: ['450px', '260px'],
                shadeClose: true,
                });

            }


            //点赞
            function poin(cid) {

                $.ajax({
                    url: '/home/pointFun',
                    data: {
                        cid: cid
                    },
                    type: 'GET',
                    success: function(data) {

                       document.getElementById('spa'+ cid).innerHTML = "点赞" + data['pnum'];

                        document.getElementById('pdiv').innerHTML = data['point'];

                        $('#pdiv').show();

                        layer.msg('点赞成功');
                    },
                    asycn: true
                });
            }

            //页面加载事件
            window.onload = function() {

                //文章双击事件
                $(document).dblclick(function() {

                    //回复框显示
                    $('.disd1').hide();

                });
            };
        </script>
    </body>

</html>