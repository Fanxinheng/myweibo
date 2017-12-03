<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <title>{{$config[0]->name}}</title>
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap-theme.min.css">
        <script type="text/javascript" src="/homes/js/jquery-3.2.1.min.js">
        </script>
        <script type="text/javascript" src="/homes/bootstrap/js/bootstrap.min.js">
        </script>
        <link rel="stylesheet" href="/homes/css/user.index.css">
        <meta name="csrf_token" content="{{ csrf_token() }}"/>

        <script type="text/javascript" src="/homes/layer/layer.js">
        </script>
    </head>
    
    <body style="background:#B4DAF0 no-repeat center center fixed;font: 12px/1.3 'Arial','Microsoft YaHei';background-size: 100% 100%;background-position: top center;">
        <div>
            <nav class="navbar navbar-fixed-top" id="navbar">
                <div class="container">
                    <div class="navbar-header" id="navbar-header1">
                        <a href="/home/login">
                        <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$config[0]->logo}}" alt="" style="width:80px;height:27px;margin-top:7px;">
                        </a>
                    </div>
                    <div class="navbar-header" id="navbar-header2">
                        <form action="/home/search" class="navbar-form navbar-right" method="get">
                            <div class="form-group">
                                <input type="text" name="search" class="form-control" placeholder="精彩生活，微博搜索" >
                            </div>

                            {{csrf_field()}}
                            <button class="btn btn-warning" type="submit">
                                搜索
                            </button>
                        </form>
                    </div>
                    <div id="nav-1">
                        <div style="float:right;line-height: 20px;font-size: 16px;margin-right: 20px;margin-top: 10px">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            <a href="/home/details/quit"  title="退出登录" style="text-decoration:none;">
                                退出
                            </a>
                        </div>
                        <div style="float:right;line-height: 20px;font-size: 16px;margin-right: 20px;margin-top: 10px">
                            <li class="dropdown" style="list-style-type:none">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration:none;">设置<span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="/home/user">个人中心</a></li>
                                <li><a href="/home/details/edit">个人信息</a></li>
                                <li><a href="/home/changepass">修改密码</a></li>
                                <li><a href="/home/message">系统消息</a></li>
                              </ul>
                            </li>
                        </div>
                        <div style="float:right;line-height: 20px;font-size: 16px;margin-right: 20px;margin-top: 10px">
                             <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                            <a href="/home/login" style="text-decoration:none;">
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
                        <div class="jumbotron" id="backg" style="background:url('/homes/images/2016.jpg');background-repeat:no-repeat">
                   
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <!-- 头像 -->
                                <div id="jimg" style="margin-left: 100px">
                                     <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$rev->photo}}?imageView2/1/w/100/h/100/q/75   " style="width:100px;" id="img" class="img-circle">
                                   
                                </div>
                                <div>
                                    <!-- 昵称 -->
                                    <div id="nickname" style="font-size: 18px;">
                                        {{$rev->nickName}}
                                        @if($re == 1)
                                        <span id="abtn1" onclick="abtn1({{$rev->uid}})"  class="btn-defalut" style="cursor: pointer;">取消关注</span>
                                        @else
                                        <span id="abtn1" onclick="abtn1({{$rev->uid}})"  class="btn-defalut" class="btn-defalut" style="cursor: pointer;">关注</span>
                                        @endif
                                    </div>
                                    <div id="nickname" style="font-size: 15px;">
                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;年龄:&nbsp;{{$rev->age}}&nbsp;&nbsp;职业:&nbsp;{{$rev->work}}&nbsp;&nbsp;积分:<span id="fsoc">{{$rev->socre}}</span>&nbsp;&nbsp;&nbsp;性别:&nbsp;
                                        @if($rev->sex=='w')
                                        女
                                        @else
                                        男
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
                        <div class="col-md-3 sidebar" id="lanmu" style="height:500px">
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
                        <div class="col-md-8 sidebar">
                            <div class="col-lg-12" style="margin-left: 12px;background-color: #fff;margin-bottom: 10px;width: 830px; ">
                                <h3>
                                    微博
                                </h3>
                            </div>
                           @if($res ->isEmpty())
                                <div style="margin-top: 70px;line-height: 40px;height: 40px;background-color: #fff;width
                                :830px;margin-left: 14px">&nbsp;他还没有发微博哟~~~
                                </div>
                                @else
                            <!-- 微博遍历的地方 -->
                            @foreach($res as $k=>$v)
                            
                            <div class="col-lg-12" id="tiezi" style="width: 830px;overflow: hidden;background-color: #fff;margin-left: 12px;margin-top: 20px">
                                <div class="col-lg-12">
                                    <!-- 头像 -->
                                    <div class="col-log-2" id="tieimg" style="margin-top: 20px;float: left">
                                         <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$rev->photo}}?imageView2/1/w/50/h/50/q/75"  id="img" class="img-circle">
                                    </div>
                                    <!-- 名称和时间 -->
                                    <div class="col-log-6" id="tiename" style="margin-top: 25px;margin-left: 50px;">
                                        <div>
                                            <b id="xing" style="margin-left: 10px">
                                                {{$rev->nickName}}
                                            </b>
                                        </div>
                                        <div style="margin-top: 5px;font-size: 12px;color: #808080;margin-left: 10px">
                                            <em style="color:#676462"> {{date('Y-m-d H:i:s',$v->time)}}   </em>
                                        </div>

                                        <div id="nei" style="margin-top: 20px; word-break:break-all;width:600px;margin-left: 10px">
                                            <a href="/home/blog/replay/{{$v->cid}}" style="text-decoration:none;">{{$v->content}}</a>
                                            
                                        </div><br>
                                        @if($v->image)
                                        <div style="margin-top: 10px">
                                              <?php
                                            $img = rtrim($v->image,'##');

                                            $imgs = explode('##',$img);
                                            
                                        ?>
                                            @foreach($imgs as $i)
                                                <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$i}}?imageView2/0/q/75|watermark/2/text/TVlXRUlCTy5DT00=/font/5a6L5L2T/fontsize/400/fill/I0YxRUZFNg==/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim" style="width:110px;" id="img">
                                            @endforeach
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
                                                 <span class="glyphicon glyphicon-share" aria-hidden="true" style="margin-top: 4px;width: 10px;height: 10px"></span>
                                                <span  id="fspan{{$v->cid}}">
                                                    转发{{$v->fnum}}&nbsp;&nbsp;|
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" onclick="fun({{$v->cid}})">
                                                <span class="glyphicon glyphicon-comment" aria-hidden="true" style="margin-top: 4px;width: 10px;height: 10px"></span>
                                                <span id="rspa{{$v->cid}}">
                                                    评论{{$v->rnum}}&nbsp;&nbsp;|
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" onclick="poin({{$v->cid}})">
                                                <span id="spa{{$v->cid}}">
                                                    点赞{{$v->pnum}}
                                                </span>&nbsp;&nbsp;|
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" onclick="jubao({{$v->cid}})">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true" style="margin-top: 4px;width: 10px;height: 10px"></span>
                                                <span id="spa{{$v->cid}}">
                                                        举报&nbsp;&nbsp;|
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div id="v" >
                                    <div class="col-lg-12 disd1" id="disd1{{$v->cid}}">
                                            <div id="tex">
                                                <textarea name="conn" id="conn" cols="70" rows="1"></textarea>
                                            </div>
                                            <button class="btn btn-defalut" style="height: 28px;line-height: 15px"
                                            id="butt" onclick="rebut({{$v->cid}})">
                                                回复
                                            </button>    
                                    </div>
                                    <div id="sdf{{$v->cid}}">
                                        @foreach($v->replay as $key=>$val)
                                         <div id="he{{$val->id}}" style="dispaly:block;">
                                            <div class="col-lg-12" id="hejiu{{$v->cid}}" >
                                                <!-- 头像 -->
                                                <div class="col-log-2" id="rimg">
                                                   
                                                     <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$val->user_info->photo}}?imageView2/1/w/30/h/30/q/75" id="img" class="img-circle">
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
                                                         @if($val->user_info->uid == $sid)
                                                    <div style="margin-top: 10px;font-size: 12px;color: #808080;word-break:break-all; width: 600px">
                                                        {{date('Y-m-d H:i:s',$val->time)}}
                                                         <a href="javascript:;" onclick="rdel({{$val->id}})">
                                                            <span style="float: right">
                                                                删除
                                                            </span>
                                                        </a>
                                                    </div>
                                                    @else
                                                    
                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                        @endforeach
                                        <!-- 内容 -->
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            <!-- 微博遍历结束 -->
                        </div>
                            <div style="float: right">{!! $res->render() !!}</div>
                        
                        <!-- 微博结束 -->
                    </div>
                </div>
            </div>
            <!-- 中间结束 -->
        </div>
        <script>
            //举报
              //微博举报
            function jubao(cid){
                layer.msg('您确定举报此微博吗？', {
                  time: 0 //不自动关闭
                  ,btn: ['确定', '取消']
                  ,yes: function(index){

                    $.get('/home/blog/report', {cid:cid}, function (data) {
                        if(data == 1){
                            layer.close(index);
                            layer.msg('我们收到了您的举报，感谢您的监督:)', {
                              icon: 6
                              ,btn: ['再见']
                            });

                        }else{
                            layer.msg('您已举报过此微博:)', {icon:2 ,})
                        }
                    });
                   
                  }
                });    
            };


            //关注
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

                  

            //回复点击事件
            function fun(id) {

                //让回复框显示
                $('#disd1' + id).show();

            };

             //删除微博评论
            function rdel (id){    
                    $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                        }
                    });

                $.ajax({
                    url:'/home/other/replay/delete',
                    type:'POST',
                    data:{id:id},
                    beforeSend:function(){
                        a = layer.load();                      
                    },
                    success:function(data){

                    //改变转发那里的转发量
                    document.getElementById('rspa'+data['tid']).innerHTML="评论"+data['rnum'];

                       $('#he'+id).remove();
                       layer.close(a);
                    }
                });
            }


            //点击回复
            function rebut(cid){

             conn =$('#conn').val();

             $.get('/home/other/type',{tid:cid,conn:conn},function(data){

                //改变转发那里的转发量
                document.getElementById('rspa'+cid).innerHTML="评论"+data['replay'];

                //改变积分
                document.getElementById('fsoc').innerHTML=data['socre'];


                hejiu = document.getElementById('sdf'+cid);       

                //添加回复消息
                var newDiv = document.createElement('div');
                var str = "<div id='he"+data['id']+"' style='dispaly:block;'><div class='col-lg-12'><div class='col-log-2' id='rimg'><img src='http://ozsrs9z8f.bkt.clouddn.com/"+data['photo']+"?imageView2/1/w/30/h/30/q/75|watermark/2/text/bXl3ZWlibw==/font/5a6L5L2T/fontsize/240/fill/I0YxRUZFNg==/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim' id='img' class='img-circle'></div><div class='col-log-8' id='cont'><div id='div1'><a href='/home/other/user/"+data['nickName']+"'>"+data['nickName']+"</a>&nbsp;回复:&nbsp; "+data['rcontent']+"</div><div id='div2'><em style='color:#676462'>"+data['time']+"</em><a href='javascript:;'' onclick='rdel("+data['id']+")'><span style='float: right;margin-right:140px;'>删除</span></a></div></div></div></div>";
                //添加div里内容
                newDiv.innerHTML=str;
                //把节点从头部插入div
                $('#sdf'+cid).prepend(newDiv,hejiu);
                //隐藏回复框
                $('#disd1' + cid).hide();
                //将回复框的内容清空
                $('#conn').val('');
                //弹框提醒评论成功
                layer.msg('评论成功');

             });

            }

            //点赞
            function poin(cid) {
                $.ajax({
                    url: '/home/other/pointFun',
                    data: {
                        cid: cid
                    },
                    type: 'GET',
                    success: function(data) {

                          //判断是否重复点赞
                        if(data==0){
                            layer.msg('您已赞过此微博:)', {icon:2,})
                        }else{
                            document.getElementById('spa'+ cid).innerHTML = "点赞" + data.pnum;

                            layer.msg('点赞成功', {icon:1 ,});
                        }
                    },
                    asycn: true
                });
            }

            //转发
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
                    $.get('/home/other/ward',{tid:cid,rcon:te},function(data){

                    //改变内容    
                    document.getElementById('fspan'+cid).innerHTML="转发"+data['fnum'];

                    // //获取积分
                    document.getElementById('fsoc').innerHTML=data['socre'];

                    //弹出提示框
                    layer.msg('转发成功');
                    console.log(data);
                    });
                    //关闭窗口
                    layer.close(index);
                },
                closeBtn: 0,
                area: ['450px', '260px'],
                shadeClose: true,
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