<!DOCTYPE html>
<html>

    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="renderer" content="webkit">
        <meta name="viewport" content="initial-scale=1,minimum-scale=1">
        <meta name="csrf_token" content="{{ csrf_token() }}"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="">
        <link title="微博" href="https://weibo.com/aj/static/opensearch.xml" type="application/opensearchdescription+xml" rel="search">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/homes/jquery/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="/homes/jquery/dist/zoomify.min.css">
        <script type="text/javascript" src="/homes/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="/homes/layer/layer.js"></script>
        <script type="text/javascript" src="/homes/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/homes/jquery/dist/zoomify.min.js"></script>
        <title>
            {{$config[0]->name}}
            
        </title>
        <link media="all" href="/homes/css/login.css" type="text/css" rel="stylesheet">
    </head>

    <body class="FRAME_main B_index">
        <div class="WB_miniblog">
            <div class="WB_miniblog_fb">
                <div id="plc_top">
                    <!--简易顶部导航拼页面用-->
                        <div class="WB_global_nav WB_global_nav_v2 " node-type="top_all">
                            <div class="gn_header clearfix" style="width:1000px">
                                <!-- logo -->
                                <div class="gn_logo" node-type="logo" data-logotype="logo" data-logourl="/admin">
                                    <a href="/home/login" class="box" title=""
                                    node-type="logolink" suda-uatrack="key=topnav_tab&amp;value=weibologo"
                                    target="_top">
                                        <span class="logo">
                                            <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$config[0]->logo}}" alt="" style="width:80px;height:27px;margin-top:7px;">
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
                                                <a href="/home/login"  title="微博首页">
                                                    <em class="W_ficon ficon_home S_ficon">
                                                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                                    </em>
                                                    <em class="S_txt1">
                                                        首页
                                                    </em>
                                                </a>
                                            </li>
                                            <li class="dropdown">
                                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$user->nickName}}<span class="caret"></span></a>
                                              <ul class="dropdown-menu">
                                                <li><a href="/home/user">个人中心</a></li>
                                                <li><a href="/home/details">个人信息</a></li>
                                                <li><a href="/home/changepass">修改密码</a></li>
                                                <li><a href="/home/message">系统消息</a></li>
                                              </ul>
                                            </li>
                                            <li>
                                                <a href="/home/details/quit"  title="退出登录">
                                                    <em class="W_ficon ficon_home S_ficon">
                                                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                                                    </em>
                                                    <em class="S_txt1">
                                                        退出
                                                    </em>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--/简易顶部导航拼页面用-->
                </div>
                <div class="WB_main clearfix" id="plc_frame">
                    <div id="v6_pl_guide_bubbletip">
                    </div>
                    <div id="v6_pl_content_hometip">
                    </div>
                    <div class="WB_frame">
                        <div class="WB_main_l" fixed-box="true">
                            <div id="v6_pl_leftnav_group">
                                <div class="WB_left_nav WB_left_nav_Atest" node-type="groupList" fixed-item="true">
                                    <div class="lev_Box lev_Box_noborder">
                                        <h3 class="lev">
                                            <a href="/home/login" class="S_txt1" node-type="item" bpfilter="main"
                                            nm="status" suda-uatrack="key=V6update_leftnavigate&amp;value=homepage"
                                            indepth="true">
                                                <span class="levtxt">
                                                    首页
                                                </span>
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="lev_Box lev_Box_noborder">
                                        <h3 class="lev">
                                            <a dot="pos55b9e09c8ae74" href="/home/index/hot" class="S_txt1" node-type="item"
                                            bpfilter="main" suda-uatrack="key=V6update_leftnavigate&amp;value=collect"
                                            indepth="true">
                                                <span class="levtxt">
                                                    热门微博
                                                </span>
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="lev_Box lev_Box_noborder">
                                        <h3 class="lev">
                                            <a dot="pos55b9e09c8ae74" href="/home/index/forward" class="S_txt1" node-type="item"
                                            bpfilter="main" suda-uatrack="key=V6update_leftnavigate&amp;value=collect"
                                            indepth="true">
                                                <span class="levtxt">
                                                    微博转发
                                                </span>
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="lev_Box lev_Box_noborder">
                                        <h3 class="lev">
                                            <a dot="pos55b9e09c8ae74" href="/home/index/attention" class="S_txt1" node-type="item"
                                            bpfilter="main" suda-uatrack="key=V6update_leftnavigate&amp;value=collect"
                                            indepth="true">
                                                <span class="levtxt">
                                                    我的关注
                                                </span>
                                            </a>
                                        </h3>
                                    </div>

                                    @foreach($label as $v)
                                    <div class="lev_Box lev_Box_noborder" >
                                        <h3 class="lev">
                                            <a dot="pos55b9e0b0ca122" href="/home/index/label/{{$v->id}}" class="S_txt1" node-type="item"
                                            bpfilter="main" suda-uatrack="key=V6update_leftnavigate&amp;value=collect"
                                            indepth="true">
                                                <span class="levtxt">
                                                    {{$v->lcontent}}
                                                </span>
                                                <i class="W_new" like-dot="likeDot" style="display: none;">
                                                </i>
                                            </a>
                                        </h3>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="plc_main" style="width:490px">
                            <div class="WB_main_c">
                                <div id="v6_pl_content_publishertop" >
                                    <div class="send_weibo S_bg2 clearfix send_weibo_long" node-type="wrap">
                                        <div class="title_area clearfix">
                                            <div class="title" node-type="publishTitle">
                                                <span class="txt">
                                                    What’s new with you?
                                                </span>
                                                <p class="W_swficon ficon_swtxt">
                                                    <em class="spac1">
                                                        有什么新鲜事想告诉大家?
                                                    </em>

                                                </p>
                                            </div>  
                                        </div>
                                    <form action="/home/release" method="post" enctype="multipart/form-data">
                                            <textarea rows="4"  class="form-control" maxlength="200" onchange="this.value=this.value.substring(0, 200)" onkeydown="this.value=this.value.substring(0, 200)" onkeyup="this.value=this.value.substring(0, 200)" placeholder="请输入不多于200字内容" name="content" maxlength="200"></textarea>
                                        

                                            <div class="kind" style="height: 35px;margin-top: 3px;">
                                               <a class="S_txt1" href="javascript:void(0);" action-type="face" action-data="type=500&amp;action=1&amp;log=face&amp;cate=1"
                                               title="表情" node-type="smileyBtn" suda-uatrack="key=tblog_home_edit&amp;value=phiz_button">
                                                   <em class="W_ficon ficon_face">
                                                       <img src="/homes/images/bq.png" alt="" style="width: 15px;height: 15px;margin-bottom: 5px">
                                                   </em>
                                                   表情
                                               </a>
                                                <a class="S_txt1" title="图片" style="position: relative;" onclick="pic_upload()">
                                                    <em class="W_ficon ficon_image" style="font-size:16px">
                                                        <span class="glyphicon glyphicon-picture" aria-hidden="true" ></span>
                                                    </em>
                                                    图片
                                                    <div style="position: absolute; left: 0px; top: 0px; display: block; overflow: hidden; background-color: rgb(0, 0, 0); opacity: 0; width: 49px; height: 24px;">

                                                        <input  name="image"  type="hidden" id="pic22">

                                                    </div>

                                                </a>

                                                <span>
                                                    

                                                    @foreach($label as $val)

                                                    <label class="checkbox-inline" style="margin-bottom: 15px">
                                                      <input type="checkbox" id="inlineCheckbox1" name="label[]" value="{{$val->id}}">{{$val->lcontent}}
                                                    </label>

                                                    @endforeach
                                               </span>

                                            </div>
                                            <div style="float: right;margin-top: 6px;">
                                                {{csrf_field()}}
                                                <button id="release" style="width:100px;height:40px;border-radius:5px;background:orange;color:white;font-size: 16px">发布</button>
                                                
                                            </div>

                                            
                                    </form>


                                    </div>
                                </div>


                                @foreach($index as $k => $v)
                                @foreach($v->contents as $val)
                                <div id="destroy{{$v->cid}}" class="blog">
                                    <div node-type="homefeed">

                                        <!--feed list-->
                                        <div class="WB_feed WB_feed_v3 WB_feed_v4" pagenum="1" node-type="feed_list"
                                        unread_mode="1">

                                            <div mrid="rid=1_0_8_3071587196499772427" tbinfo="ouid=3305085281" diss-data="group_source=group_all&amp;rid=1_0_8_3071587196499772427"
                                            class="WB_cardwrap WB_feed_type S_bg2 WB_feed_vipcover WB_feed_like" mid="4172237139817031"
                                            action-type="feed_list_item">

                                                <div class="WB_feed_detail clearfix" node-type="feed_content" ">
                                                    

                                                    <div class="WB_face W_fl">
                                                        <div class="face">
                                                            <a target="_top" class="W_face_radius" suda-uatrack="key=feed_headnick&amp;value=pubuser_head:4172237139817031"
                                                            href="/home/user" title="{{$v->nickName}}" indepth="true">
                                                                <img usercard="id=3305085281&amp;refer_flag=0000015010_" title="{{$v->nickName}}"
                                                                alt="" src="http://ozsrs9z8f.bkt.clouddn.com/{{$v->user_info->photo}}?imageView2/1/w/200/h/200/q/75|watermark/2/text/bXl3ZWlibw==/font/5a6L5L2T/fontsize/240/fill/I0YxRUZFNg==/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim"
                                                                width="50" height="50" class="W_face_radius">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="WB_detail">
                                                        <div class="WB_info">
                                                            <a suda-uatrack="key=feed_headnick&amp;value=pubuser_nick:4172237139817031"

                                                            target="_top" class="W_f14 W_fb S_txt1" nick-name="{{$v->nickName}}" title="{{$v->nickName}}" 
                                                            usercard="id=3305085281&amp;refer_flag=0000015010_" indepth="true" href="/home/other/user/{{$v->user_info->uid}}">
                                                                {{$v->user_info->nickName}}
                                                            </a>
                                                        </div>
                                                        
                                                        <div class="WB_from S_txt2">
                                                            <a title="发布时间" class="S_txt2">
                                                            {{date('Y-m-d H:i:s',$val->time)}}
                                                            </a>
                                                        </div>
                                                        <a href="/home/blog/replay/{{$v->cid}}" title="微博内容">
                                                            <div class="WB_text W_f14" node-type="feed_list_content" style="word-break:break-all">
                                                               {{$val->content}}
                                                            </div>
                                                        </a>
                                                            @if($val->image)


                                                            <?php
                                                                $img = rtrim($val->image,'##');

                                                                $imgs = explode('##',$img);
                                                                
                                                            ?>
                                                                @foreach($imgs as $i)
                                                                    <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$i}}?imageView2/0/q/75|watermark/2/text/TVlXRUlCTy5DT00=/font/5a6L5L2T/fontsize/400/fill/I0YxRUZFNg==/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim" style="width:110px;" id="img">
                                                                @endforeach

                                                            @else

                                                            @endif
                                                        
                                                    </div>
                                                </div>
                                                <div class="WB_feed_handle">
                                                    <div class="WB_handle">
                                                        <ul class="WB_row_line WB_row_r4 clearfix S_line2">
                                                            <li>
                                                                <a  class="S_txt2" title="举报">
                                                                    <span class="report">
                                                                        <input type="hidden" class="rep" value="{{$val->cid}}">
                                                                        <span class="line S_line1" node-type="favorite_btn_text">
                                                                            <span>
                                                                                <em class="W_ficon ficon_favorite S_ficon">
                                                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true" style="margin-top: 4px;width: 10px;height: 10px"></span>
                                                                                </em>
                                                                                <em style="font-size: 14px">
                                                                                    
                                                                                    举报
                                                                                </em>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </a>
                                                                
                                                            </li>
                                                            <li>
                                                                <a href="/home/blog/forward/{{$val->cid}}" class="S_txt2" title="转发">
                                                                    <span class="pos">
                                                                        <span class="line S_line1" node-type="forward_btn_text">
                                                                            <span>
                                                                                <em class="W_ficon ficon_forward S_ficon">
                                                                                    <span class="glyphicon glyphicon-share" aria-hidden="true" style="margin-top: 4px;width: 10px;height: 10px"></span>
                                                                                </em>
                                                                                <em style="font-size: 14px">
                                                                                    {{$val->fnum}}
                                                                                </em>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="/home/blog/replay/{{$val->cid}}" class="S_txt2" title="评论">
                                                                    <span class="pos">
                                                                        <span class="line S_line1" node-type="comment_btn_text">
                                                                            <span>
                                                                                <em class="W_ficon ficon_repeat S_ficon">
                                                                                    <span class="glyphicon glyphicon-comment" aria-hidden="true" style="margin-top: 4px;width: 10px;height: 10px"></span>
                                                                                </em>
                                                                                <em style="font-size: 14px">
                                                                                    {{$val->rnum}}
                                                                                </em>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </a>
                                                                <span class="arrow" style="display: none;" node-type="cmtarrow">
                                                                    <span class="W_arrow_bor W_arrow_bor_t">
                                                                        <i class="S_line1">
                                                                        </i>
                                                                        <em class="S_bg1_br">
                                                                        </em>
                                                                    </span>
                                                                </span>
                                                            </li>
                                                            <li>
                                                                <!-- <a href="/home/point/{{$v->cid}}"></a> -->
                                                                <a class="S_txt2" 
                                                                title="点赞">
                                                                    <span class="point">
                                                                        <input type="hidden" name="point" value="{{$val->cid}}">
                                                                        <span class="line S_line1">
                                                                            <span id="point{{$val->cid}}" node-type="like_status" onclick="point({{$val->cid}})">
                                                                                <em class="W_ficon ficon_praised S_txt2">
                                                                                    <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" style="margin-top: 4px;width: 10px;height: 10px"></span>
                                                                                </em>
                                                                                <em style="font-size: 14px" id="pnum{{$val->cid}}">
                                                                                    
                                                                                    {{$val->pnum}}
                                                                                </em>
                                                                            </span>
                                                                        </span>
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
                                
                                @endforeach
                                @endforeach

                                <div style="float: right">
                                    <nav aria-label="...">
                                      <ul class="pager">
                                        <li class="previous"><a href="{{$index->previousPageUrl()}}"><span aria-hidden="true">&larr;</span> Older</a></li>
                                        <li class="next"><a href="{{$index->nextPageUrl()}}">Newer <span aria-hidden="true">&rarr;</span></a></li>
                                      </ul>
                                    </nav>
                                </div>
                              </div>                     

                              </div>
                                   <div id="v6_pl_rightmod_myinfo" style="float: right;width:245px">
                                        <div class="WB_cardwrap S_bg2">
                                            <div class="W_person_info" style="height:190px">
                                                <div class="cover" id="skin_cover_s" style="background-image: url('/homes/images/001_s.jpg');">
                                                    <div class="headpic">
                                                        <a bpfilter="page_frame" href="/home/user"  indepth="true">
                                                            <img class="W_face_radius" width="60" height="60"  src="http://ozsrs9z8f.bkt.clouddn.com/{{$user->photo}}?imageView2/1/w/200/h/200/q/75|watermark/2/text/bXl3ZWlibw==/font/5a6L5L2T/fontsize/240/fill/I0YxRUZFNg==/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="WB_innerwrap" >
                                                    <div class="nameBox" style="height:38px;">
                                                        <a href="/home/user" class="name S_txt1" title="积分" style="padding-top: 10px">
                                                            {{$user->nickName}}
                                                        <em class="W_ficon ficon_favorite S_ficon">
                                                            <span class="glyphicon glyphicon-tint" aria-hidden="true" style="margin-top: 4px;width: 10px;height: 10px"></span>
                                                        </em>
                                                        <em style="font-size: 14px" id="socre">
                                                            {{$user->socre}}
                                                        </em>
                                                        </a>
                                                    </div>
                                                    <ul class="user_atten clearfix W_f18" style="padding-left: 10px">
                                                        <li class="S_line1">
                                                            <a bpfilter="page_frame" href="/home/attention" class="S_txt1" indepth="true">
                                                                <strong node-type="follow">
                                                                    {{$unum}}
                                                                </strong>
                                                                <span class="S_txt2">
                                                                    关注
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li class="S_line1">
                                                            <a bpfilter="page_frame" href="/home/fans" class="S_txt1" indepth="true">
                                                                <strong node-type="fans">
                                                                    {{$gnum}}
                                                                </strong>
                                                                <span class="S_txt2">
                                                                    粉丝
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li class="S_line1">
                                                            <a bpfilter="page_frame" href="/home/user" class="S_txt1" indepth="true">
                                                                <strong node-type="weibo" id="cnum">
                                                                    {{$cnum}}
                                                                </strong>
                                                                <span class="S_txt2">
                                                                    微博
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                        <!-- 系统公告 -->
                        <div style="background-color: #FFFFFF;border-radius: 5px;">
                            <div >
                                <div  style="margin: 10px;padding:10px;">
                                    <div style="font-size: 15px;padding-bottom: 10px;">
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
                        </div>

                        <!-- 微博找人 -->
                        <div style="background-color: #FFFFFF;border-radius: 5px;">
                            <div >
                                <div  style="margin: 10px;padding:10px;line-height: 30px;">
                                    <div style="font-size: 15px;padding-bottom: 10px;">
                                            微博找人
                                    </div>
                                    @foreach($job as $j)
                                    <a href="/home/job/{{$j->id}}">
                                        <laebl style="font-size: 14px;background-color: #F2F2F5;padding:5px;margin:10px;border-radius: 10px;">
                                            {{$j->job}}
                                        </label>
                                    </a>
                                    
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- 广告显示页面 -->
                        @foreach($advert as $k=>$v)
                            @if($v->status == 0)
                             <div class="WB_cardwrap S_bg2">
                                <div class="W_person_info" style="height:190px">
                                    <div class="UG_contents">
                                        <div class="UG_tag_list">
                                            <span>
                                                <a target="_blank" class="S_txt1" target="_top" suda-uatrack="key=nologin_home&amp;value=nologin_famous" href="//{{($v->link)}}">
                                                    <i class="item_icon">
                                                       <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$v->pic}}?imageView2/1/w/200/h/200/q/75|watermark/2/text/bXl3ZWlibw==/font/5a6L5L2T/fontsize/240/fill/I0YxRUZFNg==/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim" alt="" style="padding:10px;width: 243px;height:187px"/>
                                                    </i>
                                                </a>

                                            </span>
                                        </div>
                                    </div>
                              </div>
                           </div>

                            @endif
                        @endforeach


                                    </div>

                               </div>
                            </div>
                        </div>
                        
                <div id="plc_bot">
                            
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
                        
                        </div>
                    </div>
                    
                </div>
        <script type="text/javascript">
            //加载照片
            $('.WB_detail img').zoomify();

            //微博发布
            $('#release').on('click', function(){

                var a = layer.load(0, {shade: false});

                layer.msg('微博发布成功:)', {icon: 1});
              });


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
               }
            });

            //微博点赞
            function point (id){

                $.ajax({
                    type: "post",
                    url: "/home/point",
                    data: {poid:id},
                    
                    beforeSend:function(){
                         a = layer.load();
                      },
                    success: function(data) {

                        layer.close(a);

                        //判断是否重复点赞
                        if(data == 0){
                            layer.msg('您已赞过此微博:)', {icon:2 ,})
                        }else{
                            document.getElementById('pnum'+id).innerHTML = data;

                            layer.msg('点赞成功:)', {icon: 1});

                           $('#point'+id).off('click','point');
                        }

                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                      
                        layer.msg("点赞失败，请检查网络后重试", {icon:2 ,})

                    }
                });
              };


            //微博举报
            $('.report').on('click',function(){

                var cid = $(this).find('.rep').val();

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
            });



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


            //多图上传
            function pic_upload()
            {
                layer.open({
                  type: 2,
                  title: '上传图片到MYWEIBO',
                  shadeClose: true,
                  shade: 0.8,
                  area: ['50%', '350px'],
                  content: '/home/pics/' //iframe的url
                }); 
            }

            </script>
        </body>
        
    </html>