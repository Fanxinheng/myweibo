<!DOCTYPE html>
<html>
    
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
        <meta charset="utf-8">
        <meta name="csrf_token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="initial-scale=1,minimum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/homes/jquery/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="/homes/jquery/dist/zoomify.min.css">
        <script type="text/javascript" src="/homes/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="/homes/layer/layer.js"></script>
        <script type="text/javascript" src="/homes/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/homes/js/validate.js"></script>
        <script type="text/javascript" src="/homes/jquery/dist/zoomify.min.js"></script>
        <title>
            {{$config[0]->name}}
            
        </title>
    </head>
    
    <body class="FRAME_login">
        
        <div style="position: absolute; top: -9999px;">
            <div id="js_style_css_module_global_WB_outframe">
            </div>
        </div>
        <link media="all" href="/homes/css/index.css" type="text/css" rel="stylesheet">
        <div class="B_unlog">
            <div class="WB_miniblog">
                <div class="WB_miniblog_fb">
                    <div id="weibo_top_public">
                        <!--spec start-->
                        <!--顶部导航-->
                        <div class="WB_global_nav WB_global_nav_v2 " node-type="top_all">
                            <div class="gn_header clearfix" style="width:1200px">
                                <!-- logo -->
                                <div class="gn_logo" node-type="logo" data-logotype="logo" data-logourl="/admin">
                                    <a href="/home/admin" class="box" title=""
                                    node-type="logolink" suda-uatrack="key=topnav_tab&amp;value=weibologo"
                                    target="_top">
                                        <span class="logo">
                                            <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$config[0]->logo}}" alt="" style="width:80px;height:27px;margin-top:7px;">
                                        </span>
                                    </a>
                                </div>
                                <div class=" gn_search_v2">
                                    <form action="/home/admin/search" method="get">
                                        <input node-type="searchInput" autocomplete="off" value="" class="W_input"
                                        name="search" type="text" style="height:25px" placeholder="精彩生活，微博搜索">

                                        {{csrf_field()}}
                                        <button style="float:right;height:26px;" class="btn btn-warning btn-sm" >搜索</button>
                                    </form> 
                                </div>
                                <div class="gn_position">
                                    <div class="gn_nav">
                                        <ul class="gn_nav_list">
                                            <li>
                                                <a href="/home/admin" class="home S_txt1" suda-uatrack="key=topnav_tab&amp;value=homepage"
                                                target="_top">
                                                    <em class="W_ficon ficon_home S_ficon">
                                                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                                    </em>
                                                    <em class="S_txt1">
                                                        首页
                                                    </em>
                                                </a>
                                            </li>
                                           
                                           
                                        </ul>
                                    </div>
                                    <div class="gn_login">
                                        <ul class="gn_login_list">
                                            <li>
                                                <a href="/home/register" class="S_txt1" target="_top">
                                                    注册
                                                </a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--spec end-->
                    </div>
                    <div class="WB_main clearfix" id="plc_frame">
                        <div class="WB_frame">
                            <!-- 左导 -->
                            <div class="WB_main_l">
                                <div id="pl_unlogin_home_leftnav">
                                    <div class="UG_left_nav" node-type="UG_fixed_nav" style="position: absolute; top: 66px; bottom: auto;">
                                        <ul >
                                            <div category_id="0" action-type="filter_cat" suda-data="key=nologin_home&amp;value=nologin_left_hot:0"
                                            suda-uatrack="key=www_unlogin_home&amp;value=recommend">
                                                <li >
                                                    <a href="/home/admin/" class="nav_item">
                                                        全部
                                                    </a>
                                                </li>
                                            </div>
                                            <div category_id="2" action-type="filter_cat" suda-data="key=nologin_home&amp;value=nologin_left_hot:2"
                                            suda-uatrack="key=www_unlogin_home&amp;value=star">
                                                <li>
                                                    <a href="/home/hot/" class="nav_item">
                                                        热门
                                                    </a>
                                                </li>
                                            </div>

                                            @foreach($label as $v)

                                             <div category_id="99991" action-type="filter_cat" suda-data="key=nologin_home&amp;value=nologin_left_hot:99991"
                                            suda-uatrack="key=www_unlogin_home&amp;value=billboard">
                                                <li>
                                                    <a href="/home/label/{{$v->id}}" class="nav_item">
                                                          {{$v->lcontent}}
                                                    </a>
                                                </li>
                                            </div>
                                          @endforeach
    
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- ／左导 -->
                            <div id="plc_main">
                                <div id="plc_unlogin_home_main">
                                    
                                    <div class="WB_frame_c">
                                        <div id="pl_unlogin_home_feed">
                                            <!--榜单栏位置-->
                                         
                                           
                                            <div class="UG_contents" id="PCD_pictext_i_v5">
                                                <!--feed内容-->
                                                <ul class="pt_ul clearfix" pagenum="" node-type="feed_list">
                                                    
                                                @if($index->isEmpty())
                                                    <div style="text-align: center">
                                                    抱歉，我们没有找到您想要的内容:(
                                                    </div>
                                                @endif

                                                @foreach($index as $k=>$v)
                                                
                                                    <div class="list_des">
                                                        <a href="/home/replay/{{$v->cid}}">
                                                        <h3 class="list_title_s">
                                                            <div style="word-break:break-all;padding-bottom:10px;">
                                                                {{$v->content}}
                                                            </div> 
                                                        </h3>
                                                        </a>
                                                        @if($v->image)


                                                            <?php
                                                                $img = rtrim($v->image,'##');

                                                                $imgs = explode('##',$img);
                                                                
                                                            ?>
                                                                @foreach($imgs as $i)
                                                                    <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$i}}?imageView2/0/q/75|watermark/2/text/TVlXRUlCTy5DT00=/font/5a6L5L2T/fontsize/400/fill/I0YxRUZFNg==/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim" style="width:110px;" id="img">
                                                                @endforeach

                                                            @else

                                                            @endif
                                                        
                                                        <div class="subinfo_box clearfix">
                                                                
                                                                <span class="subinfo_face" style="cursor: pointer">
                                                                    <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$v->photo}}" alt="" width="20" height="20">
                                                                </span>
                                                                
                                                                <span class="subinfo S_txt2">
                                                                    {{$v->nickName}} 
                                                                </span>
                                                           
                                                            <span class="subinfo S_txt2">
                                                                {{date('Y-m-d H:i:s',$v->time)}} 
                                                            </span>

                                                            
                                                            <span class="subinfo_rgt S_txt2" class="point">
                                                                <em class="W_ficon ficon_praised S_ficon W_f16">
                                                                    <span class="glyphicon glyphicon-thumbs-up" id="point" aria-hidden="true" ></span>
                                                                </em>
                                                                <em>
                                                                    {{$v->pnum}} 
                                                                </em>
                                                            </span>
                                                            

                                                            <a href="/home/replay/{{$v->cid}}">
                                                            <span class="rgt_line W_fr">
                                                            </span>
                                                            <span class="subinfo_rgt S_txt2" >
                                                                <em class="W_ficon ficon_repeat S_ficon W_f16">
                                                                   <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                                                                </em>
                                                                <em>
                                                                    {{$v->rnum}} 
                                                                </em>
                                                            </span>
                                                            </a>

                                                            <a href="/home/forward/{{$v->cid}}">
                                                            <span class="rgt_line W_fr">
                                                            </span>
                                                            <span class="subinfo_rgt S_txt2">
                                                                <em class="W_ficon ficon_forward S_ficon W_f16">
                                                                    <span class="glyphicon glyphicon-share" aria-hidden="true"></span>
                                                                </em>
                                                                <em>
                                                                    {{$v->fnum}} 
                                                                </em>
                                                            </span>
                                                            </a>
                                                        </div>
                                                        </div>

                                                        <hr>

                                                    @endforeach 

                                                    
                                                    <div style="float: right">
                                                        <nav aria-label="...">
                                                          <ul class="pager">
                                                            <li class="previous"><a href="{{$index->previousPageUrl()}}"><span aria-hidden="true">&larr;</span> Older</a></li>
                                                            <li class="next"><a href="{{$index->nextPageUrl()}}">Newer <span aria-hidden="true">&rarr;</span></a></li>
                                                          </ul>
                                                        </nav>
                                                    </div>
                                                    <div style="float: right">
                                                        {!! $index->appends($request->all())->render() !!}
                                                    </div>
                                                </ul>
                                                <!--/feed内容-->
                                            </div>

                                        </div>

                                    </div>

                                    <div class="WB_main_r" fixed-box="true">
                                        <div id="pl_unlogin_home_login">
                                            <div style="visibility: hidden;">
                                            </div>
                                            <div style="z-index: 10; transform: translateZ(0px); position: relative; width: 340px;">
                                                <div class="UG_box" fixed-inbox="true" fixed-id="2">
                                                    <div class="W_unlogin_v4">
                                                        <div class="login_box" id="pl_login_form">
                                                            <div class="login_innerwrap">
                                                                <div class="info_header">
                                                                    <div class="tab clearfix">
                                                                        <a href="javascript:void(0);" node-type="normal_tab" action-type="switchTab"
                                                                        action-data="type=normal" suda-uatrack="key=tblog_weibologin3&amp;value=ordinary_login">
                                                                            <!-- <span class="W_icon_rec"><span class="W_icon_rec_txt">推荐</span><span class="W_arrow_bor W_arrow_bor_r"><i class="S_spetxt"></i></span></span>-->
                                                                            帐号登录
                                                                        </a>
                                    
                                                                    </div>
                                                                 
                                                                </div>
                                                               
                                                                <!-- /result end -->
                                                                <div class="W_login_form" node-type="normal_form">
                                                                    <!--<div class="info_list pre_info clearfix" node-type="prename_box" style="display:none"></div>-->
                                                                    <form action="/home/nick" method="post">
                                                                        
                                                                        <div class="form-group">
                                                                            <span class="glyphicon glyphicon-user" aria-hidden="true" style="float: left;margin-top: 10px"></span>
                                                                            <input type="text" name="phone" class="form-control" id="phone" placeholder="请输入手机号" style="width:250px; ">
                                                                        </div>
                                                                        <div id="e1" style="width: 200px;height: 20px;display: none;color: red;font-size: 13px;font-weight: bold;margin-bottom:10px;margin-left: 13px"></div>

                                                                        <div class="form-group">
                                                                            <span class="glyphicon glyphicon-lock" aria-hidden="true" style="float: left;margin-top: 10px"></span>
                                                                            <input type="password" class="form-control" id="password" placeholder="请输入密码" style="width:250px;" name="password">
                                                                        </div>
                                                                        <div id="e2" style="width: 200px;height: 20px;display: none;color: red;font-size: 13px;font-weight: bold;margin-bottom:10px;margin-left: 13px"> 
                                                                        </div>

                                                                        {{csrf_field()}}
                                                                        <input type="submit" value="登录" style="margin-top: 8px;background:#ff8140;color: white;width:260px;height: 40px;font-size: 17px;border-radius: 6px" id="btn1">
                                                                </div> 
                                                                    <div class="info_list register" style="font-size:14px">
                                                                        <span class="S_txt2">
                                                                            还没有微博？
                                                                        </span>
                                                                        <a target="_top" href="/home/register">
                                                                            立即注册!
                                                                        </a>
                                                                        <a href="/home/admin/find" style="float: right;">忘记密码</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                        <div style="width:340px; float:right;">
                                            <!-- 公告专用 -->
                                            <div class="UG_box_l" style="width:340px;">
                                                <div class="UG_contents" style="padding-bottom:10px;">
                                                        <div style="font-size: 15px;padding-bottom: 10px">
                                                                系统公告
                                                        </div>
                                                        @foreach($notice as $not)
                                                        <a href="#" class="UG_tag_list" title="公告标题">
                                                            <div style="font-size: 14px" onclick="notice({{$not->id}})">
                                                                {{$not->title}}
                                                            </div>
                                                        </a>
                                                        @endforeach
                                                </div>
                                            </div>

                                             <!-- 广告显示页面 -->
                                            @foreach($advert as $k=>$v)
                                                @if($v->status == 0)
                                                    <div class="UG_box_l" style="width:340px;height:220px;">

                                                        <div class="UG_contents">
                                                            <div class="UG_tag_list">
                                                                    <a target="_blank" class="S_txt1" target="_top" suda-uatrack="key=nologin_home&amp;value=nologin_famous"
                                                                    href="//{{($v->link)}}">
                                                                        <span class="item_icon">
                                                                           <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$v->pic}}?imageView2/1/w/200/h/200/q/75|watermark/2/text/bXl3ZWlibw==/font/5a6L5L2T/fontsize/240/fill/I0YxRUZFNg==/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim" alt="" style="width:300px;height:178px"/>
                                                                        </span>
                                                                    </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endif
                                            @endforeach

                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                      
                    </div>
                </div>
        <div id="plc_bot">
            <!--footer-->
            <div class="WB_footer S_bg2">
                <!-- 友情链接 -->
                <div class="other_link S_bg1 clearfix T_add_ser">
                    <p class="copy_v2">
                        @foreach($link as $k=>$v)
                            @if($v->status==0)
                                <a href="//{{$v->link}}" target="_blank" class="S_txt2">{{$v->user}}</a>
                            @endif
                        @endforeach
                    </p>
                    <p class="copy_v2">
                        <a href="#" class="S_txt2">版权：{{$config[0]->bank}}    出品</a>
                        
                    </p>
                <p class="company"></p>
                </div>
            </div>
        </div>
            </div>
        </div>

    <script type="text/javascript">

        //加载照片
        $('.list_des #img').zoomify();


         $('.glyphicon-thumbs-up').on('click', function(){
            
            layer.msg('亲，您好像忘了登录呦:)');
          });

         $('.subinfo_face').on('click', function(){
            
            layer.msg('亲，您好像忘了登录呦:)');
          });

         //加载照片
        $('.WB_detail img').zoomify();

         //系统公告
        function notice(id){

            $.ajax({
                type: "get",
                url: "/home/notice",
                data: {id:id},
                
                beforeSend:function(){
                    //加载样式
                    a = layer.load(0, {shade: false});
                  },
                success: function(data) {

                    //关闭加载样式
                    layer.close(a)

                    layer.open({
                      type: 1
                      ,title: data.title //不显示标题栏
                      ,closeBtn: false
                      ,area: '300px;'
                      ,shade: 0.8
                      ,id: 'LAY_layuipro' //设定一个id，防止重复弹出
                      ,resize: false
                      ,btn: ['知道了']
                      ,btnAlign: 'c'
                      ,moveType: 1 //拖拽模式，0或者1
                      ,content: '<div style="padding: 50px; line-height: 22px; background-color: #F2F2F5; color: #23527C; font-weight: 300;word-break:break-all;">'+data.content+'</div>'
                      ,
                    });
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    layer.msg("系统公告查看失败，请检查网络后重试", {icon:2 ,})
                    
                    
                }
            });
        }
    </script>

    
    <script type="text/javascript">
         var ch2;
         var ch3;

        //手机号失去焦点事件
        $('#phone').blur(function(){
           
            var pho  = $(this).val();
            
            ch2 = checkTel($('#phone'),$('#e1'));
            if(ch2!=100){
              $('#phone').css('border','solid 2px red');
              $('#e1').css('display','block');
              return;
            }else{
              $('#e1').css('display','none');
              ch2 = 100;
            }
            $.get("pho",{pho:pho},function(data){
              if(data.length>0){
                $('#phone').css('border','solid 2px green');
                $('#e1').css('display','none');
                ch2 = 100;
                return;
              }else{
                $('#phone').css('border','solid 1px red');
                 $("#e1").html("该手机号还未注册,请先去注册");
                $('#e1').css('display','block');
                ch2 = 0;
              }
            },'json')
                
            })

            
            //密码失去焦点事件
            $('input[name="password"]').blur(function(){
            
                var pas = $(this).val();
                var pho = $('#phone').val();

                ch3 = checkPassword($('#password'),$('#e2'),6);
                if(ch3!=100){
                  $('#password').css('border','solid 2px red');
                  $('#e2').css('display','block');
                }else{
                  $('#password').css('border','solid 1px green');
                  $('#e2').css('display','none');
                  ch3 = 100;
                }
                $.get("pass",{pas:pas,pho:pho},function(data){
                  if(data==1){
                    $('#phone').css('border','solid 2px green');
                    $('#e2').css('display','none');
                    ch2 = 100;
                    return;
                  }else{
                    $('#password').css('border','solid 1px red');
                     $("#e2").html("密码不正确");
                    $('#e2').css('display','block');
                    ch2 = 0;
                  }
                },'json')
            })

    </script>
    </body>
        

</html>