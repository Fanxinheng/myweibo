<!DOCTYPE html>
<html>
    
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
        <meta charset="utf-8">
        <meta name="csrf_token" content="{{ csrf_token() }}"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="initial-scale=1,minimum-scale=1">
        <meta content="随时随地发现新鲜事！微博带你欣赏世界上每一个精彩瞬间，了解每一个幕后故事。分享你想表达的，让全世界都能听到你的心声！" name="description">
        <link rel="shortcut icon" type="image/x-icon" href="/homes/images/favicon.ico">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap-theme.min.css">

        <link rel="stylesheet" href="/homes/jquery/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="/homes/jquery/dist/zoomify.min.css">
        <link rel="stylesheet" type="text/css" href="/homes/css//iconfont.css">
        <script type="text/javascript" src="/homes/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="/homes/layer/layer.js"></script>
        <script type="text/javascript" src="/homes/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/homes/js/validate.js"></script>
        <title>
            微博-随时随地发现新鲜事
        </title>
    </head>
    
    <body class="FRAME_login">
        <div style="position: absolute; top: -9999px;">
            <div id="js_style_css_module_global_WB_outframe">
            </div>

        </div>
        <link media="all" href="/homes/css/index.css" type="text/css" rel="stylesheet">
        <div  class="B_unlog">
            <div class="WB_miniblog">
                <div class="WB_miniblog_fb">
                    <div id="weibo_top_public" >
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
                                            <img src="/homes/images/wb_logo.png" alt="" style="margin-top:7px;">
                                        </span>
                                    </a>
                                </div>
                                <div class=" gn_search_v2">
                                    
                                    <input node-type="searchInput" autocomplete="off" value="" class="W_input" name="15102240605332" type="text" style="height:25px" placeholder="搜索你想要的">
                                    <a href="javascript:void(0);" title="搜索" node-type="searchSubmit" class="W_ficon ficon_search S_ficon"
                                    suda-uatrack="key=topnav_tab&amp;value=search" target="_top">
                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    </a>
                                </div>
                                <div class="gn_position" >
                                    <div class="gn_nav">
                                        <ul class="gn_nav_list">
                                            <li>
                                                <a href="/home/admin" class="home S_txt1" suda-uatrack="key=topnav_tab&amp;value=homepage"
                                                target="_top">
                                                    <em class="W_ficon ficon_home S_ficon">
                                                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                                    </em>
                                                    <!-- <i class="lock_fill icon-lock_fill">asdasdasd</i> -->
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
                                                <a href="register" class="S_txt1" target="_top">
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
                                                    
                                                    <!--article feed-->
                                                     
                                                    <!--广告模块-->
                                                    <div class="UG_list_b" mid="4171968871140682" action-type="feed_list_item"
                                                    href="//weibo.com/5187664653/FuceP4MK6?ref=feedsdk" suda="key=nologin_home&amp;value=nologin_card_weibo:4171968871140682"
                                                    suda-uatrack="key=www_unlogin_home&amp;value=recommend_feed">


                                                @foreach($index as $k=>$v)
                                                    
                                                    <div class="list_des">
                                                        <a href="/home/replay/{{$v->cid}}">
                                                        <h3 class="list_title_s">
                                                            <div>
                                                                {{$v->content}}
                                                            </div>
                                                        </h3>
                                                        </a>
                                                        <div class="subinfo_box clearfix">
                                                            
                                                                <span class="subinfo_face ">
                                                                    <img src="{{$v->photo == NULL ? '/homes/uploads/default.jpg' : $v->photo}}" alt="" width="20" height="20">
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
                                                    </div> 
                                                    <!-- read_pos -->
                                                    <!--/read_pos-->
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
                                                                        action-data="type=normal" suda-uatrack="key=tblog_weibologin3&amp;value=ordinary_login"
                                                                        >
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
                                                                        <div id="e1" style="width: 200px;height: 20px;display: none;color: red;font-size: 13px;font-weight: bold;margin-left: 13px">
                                                            
                                                                        </div>

                                                                        <div class="form-group" style="margin-top:10px">
                                                                            <span class="glyphicon glyphicon-lock" aria-hidden="true" style="float: left;margin-top: 10px"></span>
                                                                            <input type="password" class="form-control" id="password" placeholder="请输入密码" style="width:250px;" name="password">
                                                                        </div>
                                                                        <div id="e2" style="width: 200px;height: 20px;display: none;color: red;font-size: 13px;font-weight: bold;margin-bottom:10px;margin-left: 13px"> 
                                                                        </div>
                                                                        
                                                                </div>
                                                                
                                                                    <div class="info_list auto_login clearfix">
                                                                        
                                                                        

                                                                        <div style="float: right;margin-right:10px;font-size: 15px">
                                                                            <a href="/home/admin/find">忘记密码</a>
                                                                        </div>
                                                                            
                                                                    </div>

                                                                    {{csrf_field()}}
                                                                    <input type="submit" value="登录" style="margin-top: 8px;background:#ff8140;color: white;width:260px;height: 40px;font-size: 17px;border-radius: 6px" id="btn1">

                                                                </form>
                                                                    
                                                                    <div class="info_list register" style="font-size:14px">
                                                                        <span class="S_txt2">
                                                                            还没有微博？
                                                                        </span>
                                                                        <a target="_top" href="/home/register">
                                                                            立即注册!
                                                                        </a>

                                                                        <a href="/home/admin/find" style="float: right;margin-right:9px;">忘记密码</a>
                                                                    </div>
                                                                </div>
                                                               
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="height: 1px; margin-top: -1px; visibility: hidden;">
                                                </div>
                                            </div>
                                            <div class="bg" node-type="qr_help" style="position: absolute; top: 2px; left: -220px; width: 264px; height: 372px; background-position: -300px -150px; background-repeat: no-repeat; z-index: 999; background-image: url('sprite_login.png'); display: none;">
                                            </div>
                                        </div>
                                        <div id="pl_unlogin_home_hotpersoncategory">
                                            <div class="UG_box_l" style="width:340px;float: right;">
                                                <h2 class="UG_box_title">
                                                    微博找人
                                                </h2>
                                                <div class="UG_contents">
                                                    <div class="UG_tag_list">
                                                        <h3 class="tag_title">
                                                            名人
                                                        </h3>
                                                        <ul class="clearfix">
                                                            <li>
                                                                <a class="S_txt1" target="_top" suda-uatrack="key=nologin_home&amp;value=nologin_famous"
                                                                href="https://d.weibo.com/1087030002_2975_1003_0">
                                                                    <i class="item_icon">
                                                                        <img src="/homes/images/1087030002_892_1003_0.png" class="pic">
                                                                    </i>
                                                                    <span class="text width_fix W_autocut">
                                                                        明星
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="S_txt1" target="_top" suda-uatrack="key=nologin_home&amp;value=nologin_famous"
                                                                href="https://d.weibo.com/1087030002_2975_1001_0">
                                                                    <i class="item_icon">
                                                                        <img src="/homes/images/1087030002_892_1001_0.png" class="pic">
                                                                    </i>
                                                                    <span class="text width_fix W_autocut">
                                                                        商界
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="S_txt1" target="_top" suda-uatrack="key=nologin_home&amp;value=nologin_famous"
                                                                href="https://d.weibo.com/1087030002_2975_5007_0">
                                                                    <i class="item_icon">
                                                                        <img src="/homes/images/1087030002_892_1007_0.png" class="pic">
                                                                    </i>
                                                                    <span class="text width_fix W_autocut">
                                                                        媒体精英
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="S_txt1" target="_top" suda-uatrack="key=nologin_home&amp;value=nologin_famous"
                                                                href="https://d.weibo.com/1087030002_2975_2003_0">
                                                                    <i class="item_icon">
                                                                        <img src="/homes/images/1087030002_892_1005_0.png" class="pic">
                                                                    </i>
                                                                    <span class="text width_fix W_autocut">
                                                                        作家
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="S_txt1" target="_top" suda-uatrack="key=nologin_home&amp;value=nologin_famous"
                                                                href="https://d.weibo.com/1087030002_2975_7002_0">
                                                                    <i class="item_icon">
                                                                        <img src="/homes/images/1087030002_892_1004_0.png" class="pic">
                                                                    </i>
                                                                    <span class="text width_fix W_autocut">
                                                                        政府官员
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        </ul>
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
             <!--  <div class="WB_footer S_bg2">
              
               <div class="other_link S_bg1 clearfix T_add_ser">
                 
                   <p class="copy_v2">
                       <a href="//weibo.com/aj/static/jicp.html?_wv=6" target="_blank" class="S_txt2">京ICP证100780号</a>
                       <a href="//weibo.com/aj/static/medi_license.html?_wv=6" target="_blank" class="S_txt2">互联网药品服务许可证</a>
                       <a href="//weibo.com/aj/static/jww.html?_wv=6" target="_blank" class="S_txt2">京网文[2014]2046-296号</a>&emsp;
                       <a href="//www.miibeian.gov.cn" target="_blank" class="S_txt2">京ICP备12002058号</a>&emsp;
                       <a href="//weibo.com/aj/static/license.html?_wv=6" target="_blank" class="S_txt2">增值电信业务经营许可证B2-20140447</a>
                       <a href="//weibo.com/aj/static/map_license.html?_wv=6" target="_blank" class="S_txt2">乙测资字1111805</a>
                   </p>
                   <p class="company"></p>
               </div>
             </div> -->

        
        <!--/footer-->
        </div>
            </div>
        </div>

    <script type="text/javascript">

            //加载照片
            $('.list_des #image').zoomify();

            //发布微博
            $('.glyphicon-thumbs-up').on('click',function() {
                layer.msg('亲，您好像忘了登录呦:)');
            });

            $('.subinfo_face').on('click', function(){
            
            layer.msg('亲，您好像忘了登录呦:)');
          });
    </script>
    
    <script type="text/javascript">
         var ch2 ;
         var ch3 ;
         var aaa=0;
         var bbb=0;

        //手机号失去焦点事件
        $('#phone').blur(function(){
           
            var pho  = $(this).val();
            ch2 = checkTel($('#phone'),$('#e1'));

            if(ch2==100){
              $('#e1').css('display','none');
              ch2 = 100;
              
            }else{
              $('#e1').css('display','block');
              //ch2 = 100;
              return;
           
            }
            $.get("pho",{pho:pho},function(data){

              if(data=='1'){
                $('#e1').css('display','none');
                ch2 = 100;
           
                aaa=1;
              }else{

                ch2 = 0;
                $("#e1").html("该手机号还未注册,请先去注册");
                $('#e1').css('display','block');
                aaa=0;
       
              }
            },'json')
                console.log(ch2);
            })

            
            //密码失去焦点事件
            $('input[name="password"]').blur(function(){
            
                var pas = $(this).val();
                var pho = $('#phone').val();

                ch3 = checkPassword($('#password'),$('#e2'),6);

                if(ch3!=100){
                  $('#e2').css('display','block');
                   ch3 = 0;

                }else{
                  $('#e2').css('display','none');
                  ch3 = 100;
            
                }
                $.get("pass",{pas:pas,pho:pho},function(data){
                  if(data=='1'){
                    $('#e2').css('display','none');
                    ch3 = 100;
                    bbb=1;
                  
                  }else{
                    $("#e2").html("密码不正确");
                    $('#e2').css('display','block');
                    ch3 = 0;
                    bbb=0;            
                  }
                },'json')

                // console.log(ch3);
                if (aaa==1 && bbb==1 ) {
                    next();
                }else{
                    return false;
                }
            })

            
    </script>
    </body>
        

</html>