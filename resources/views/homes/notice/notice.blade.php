<!DOCTYPE html>
<html>

    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
        <meta charset="utf-8">
        <meta name="csrf_token" content="{{ csrf_token() }}" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="initial-scale=1,minimum-scale=1">
        <meta content="随时随地发现新鲜事！微博带你欣赏世界上每一个精彩瞬间，了解每一个幕后故事。分享你想表达的，让全世界都能听到你的心声！"
        name="description">
        <link rel="shortcut icon" type="image/x-icon" href="/homes/images/favicon.ico">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap-theme.min.css">
        <script type="text/javascript" src="/homes/js/jquery-3.2.1.min.js">
        </script>
        <script type="text/javascript" src="/homes/layer/layer.js">
        </script>
        <script type="text/javascript" src="/homes/bootstrap/js/bootstrap.min.js">
        </script>
        <script type="text/javascript" src="/homes/js/validate.js">
        </script>
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
                                    <a href="/home/login" class="box" title="" node-type="logolink" suda-uatrack="key=topnav_tab&amp;value=weibologo"
                                    target="_top">
                                        <span class="logo">
                                            <img src="/homes/images/wb_logo.png" alt="" style="margin-top:7px;">
                                        </span>
                                    </a>
                                </div>
                                <div class=" gn_search_v2">

                                    <form action="/home/search" method="get">
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
                                                <a href="/home/login" class="home S_txt1" suda-uatrack="key=topnav_tab&amp;value=homepage"
                                                target="_top">
                                                    <em class="W_ficon ficon_home S_ficon">
                                                        <span class="glyphicon glyphicon-home" aria-hidden="true">
                                                        </span>
                                                    </em>
                                                    <em class="S_txt1">
                                                        首页
                                                    </em>
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
                        <center>
                            <div style="width:1000px;height:600px;border-radius:10px;border:1px solid #F2F2F5;padding:20px;margin:20px;">
                                <div class="S_txt1" style="font-size: 18px;color: #EEA135;margin-bottom:8px;" title="公告标题">
                                    {{$index->title}}
                                </div>

                                <div class="S_txt1" style="font-size: 12px;margin-bottom:8px;" title="时间">
                                    {{date('Y-m-d H:i:s',$index->time)}}
                                </div>

                                <div class="S_txt1" style="font-size: 14px;margin-bottom:8px;word-break:break-all;">
                                    {{$index->content}}
                                </div>
                            </div>
                        </center>
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
                        <a href="//weibo.com/aj/static/jicp.html?_wv=6" target="_blank" class="S_txt2">京ICP证100780号</a>
                        <a href="//weibo.com/aj/static/medi_license.html?_wv=6" target="_blank" class="S_txt2">互联网药品服务许可证</a>
                        <a href="//weibo.com/aj/static/jww.html?_wv=6" target="_blank" class="S_txt2">京网文[2014]2046-296号</a>&emsp;
                        <a href="//www.miibeian.gov.cn" target="_blank" class="S_txt2">京ICP备12002058号</a>&emsp;
                        <a href="//weibo.com/aj/static/license.html?_wv=6" target="_blank" class="S_txt2">增值电信业务经营许可证B2-20140447</a>
                        <a href="//weibo.com/aj/static/map_license.html?_wv=6" target="_blank" class="S_txt2">乙测资字1111805</a>
                    </p>
                
                </div>
            </div>
            <!--/footer-->
        </div>

        </div>
        </div>
    </body>

</html>