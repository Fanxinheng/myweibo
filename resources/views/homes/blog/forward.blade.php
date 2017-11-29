<!DOCTYPE html>
<html>

    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="renderer" content="webkit">
        <meta name="viewport" content="initial-scale=1,minimum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="/homes/images/favicon.ico">
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
            我的首页 微博-随时随地发现新鲜事
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
                                <!-- 搜索 -->
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


                                <div id="v6_pl_content_homefeed">
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
                                                            <a title="{{$content->nickName}}" indepth="true">
                                                                <img class="W_face_radius" width="50" height="50"  src="http://ozsrs9z8f.bkt.clouddn.com/{{$content->photo}}?imageView2/1/w/200/h/200/q/75|watermark/2/text/bXl3ZWlibw==/font/5a6L5L2T/fontsize/240/fill/I0YxRUZFNg==/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="WB_detail">
                                                        <div class="WB_info">
                                                            <a suda-uatrack="key=feed_headnick&amp;value=pubuser_nick:4172237139817031"
                                                            target="_top" class="W_f14 W_fb S_txt1" title="{{$content->nickName}}"
                                                            usercard="id=3305085281&amp;refer_flag=0000015010_" indepth="true">
                                                                {{$content->nickName}}
                                                            </a>

                                                            <!-- 判断微博是否为登录用户发布 -->
                                                            @if($uid != $content->uid)
                                                                @if($bool)
                                                                    <a id="attent" style="float: right;cursor: pointer;font-size: 14px;" onclick="attent({{$content->uid}})" title="取消关注">√ 已关注
                                                                        <input type="hidden" name="attent" value="{{$content->uid}}">
                                                                    </a>

                                                                @else
                                                                    <a id="attent" style="float: right;cursor: pointer;font-size: 15px;" onclick="attent({{$content->uid}})" title="关注博主">关注
                                                                        <input type="hidden" name="attent" value="{{$content->uid}}">
                                                                    </a>
                                                                @endif

                                                            @endif
                                                        </div>
                                                        <div class="WB_from S_txt2">
                                                            <!-- minzheng add part 2 -->
                                                            <a target="_top" title="发布时间" date="1510222313000"
                                                            class="S_txt2" node-type="feed_list_item_date" suda-data="key=tblog_home_new&amp;value=feed_time:4172237139817031:frommainfeed"
                                                            indepth="true">
                                                                {{date('Y-m-d H:i:s',$content->time)}}
                                                            </a>

                                                            <!-- minzheng add part 2 -->
                                                        </div>

                                                        <div class="WB_text W_f14" node-type="feed_list_content" style="word-break:break-all">
                                                            {{$content->content}} ​​​​
                                                        </div>


                                                        @if($content->image)


                                                            <?php
                                                                $img = rtrim($content->image,'##');

                                                                $imgs = explode('##',$img);

                                                            ?>
                                                                @foreach($imgs as $i)
                                                                    <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$i}}?imageView2/0/q/75|watermark/2/text/TVlXRUlCTy5DT00=/font/5a6L5L2T/fontsize/400/fill/I0YxRUZFNg==/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim" style="width:110px;" id="img">
                                                                @endforeach

                                                            @else

                                                            @endif

                                                    </div>

                                                </div>
                                                <!-- minzheng add part 3 -->

                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div id="v6_pl_content_homefeed">
                                    <div node-type="homefeed">

                                        <!--feed list-->
                                        <div class="WB_feed WB_feed_v3 WB_feed_v4" pagenum="1" node-type="feed_list"
                                        unread_mode="1">

                                            <div mrid="rid=1_0_8_3071587196499772427" tbinfo="ouid=3305085281" diss-data="group_source=group_all&amp;rid=1_0_8_3071587196499772427"
                                            class="WB_cardwrap WB_feed_type S_bg2 WB_feed_vipcover WB_feed_like" mid="4172237139817031"
                                            action-type="feed_list_item">
                                            <form action="/home/forward/store/" method="post">
                                                <div class="WB_feed_detail clearfix" node-type="feed_content" ">
                                                    <textarea class="form-control" rows="3" name="fcontent"></textarea>
                                                    <input type="hidden" name="uid" value="{{$content->uid}}">
                                                    <input type="hidden" name="tid" value="{{$content->cid}}">
                                                    {{csrf_field()}}
                                                    <button class="btn btn-default btn-sm" id="report" style="float: right;margin:5px 0 5px 0">转发</button>

                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if($content->fnum == 0)
                                <div mrid="rid=1_0_8_3071587196499772427" tbinfo="ouid=3305085281" diss-data="group_source=group_all&amp;rid=1_0_8_3071587196499772427"
                                class="WB_cardwrap WB_feed_type S_bg2 WB_feed_vipcover WB_feed_like" mid="4172237139817031"
                                action-type="feed_list_item">
                                    <div class="WB_feed_detail clearfix" node-type="feed_content" ">

                                        <div class="WB_detail">
                                            <div class="WB_info">
                                                <a suda-uatrack="key=feed_headnick&amp;value=pubuser_nick:4172237139817031"
                                                target="_top" class="W_f14 W_fb S_txt1" title="{{$v->nickName}}"
                                                usercard="id=3305085281&amp;refer_flag=0000015010_" indepth="true">
                                                    这么好的微博还没有人转发那，快去试试吧:)
                                                </a>

                                            </div>

                                        </div>

                                    </div>
                                    <!-- minzheng add part 3 -->

                                </div>
                                @endif



                                @foreach($forward as $v)
                                <div mrid="rid=1_0_8_3071587196499772427" tbinfo="ouid=3305085281" diss-data="group_source=group_all&amp;rid=1_0_8_3071587196499772427"
                                class="WB_cardwrap WB_feed_type S_bg2 WB_feed_vipcover WB_feed_like" mid="4172237139817031"
                                action-type="feed_list_item">
                                    <div class="WB_feed_detail clearfix" node-type="feed_content" ">


                                        <div class="WB_face W_fl">
                                            <div class="face">
                                                <a title="{{$v->nickName}}" indepth="true">
                                                    <img class="W_face_radius" width="50" height="50"  src="http://ozsrs9z8f.bkt.clouddn.com/{{$v->photo}}?imageView2/1/w/200/h/200/q/75|watermark/2/text/bXl3ZWlibw==/font/5a6L5L2T/fontsize/240/fill/I0YxRUZFNg==/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="WB_detail">
                                            <div class="WB_info">
                                                <a suda-uatrack="key=feed_headnick&amp;value=pubuser_nick:4172237139817031"
                                                target="_top" class="W_f14 W_fb S_txt1" title="{{$v->nickName}}"
                                                usercard="id=3305085281&amp;refer_flag=0000015010_" indepth="true">
                                                    {{$v->nickName}}
                                                </a>

                                            </div>
                                            <div class="WB_from S_txt2">
                                                <!-- minzheng add part 2 -->
                                                <a target="_top" title="发布时间" date="1510222313000"
                                                class="S_txt2" node-type="feed_list_item_date" suda-data="key=tblog_home_new&amp;value=feed_time:4172237139817031:frommainfeed"
                                                indepth="true">
                                                    {{date('Y-m-d H:i:s',$v->time)}}
                                                </a>

                                                <!-- minzheng add part 2 -->
                                            </div>

                                            @if($v->fcontent)
                                            <div class="WB_text W_f14" node-type="feed_list_content" style="word-break:break-all">

                                                {{$v->fcontent}}

                                            </div>
                                            @else
                                            <div class="WB_text W_f14" node-type="feed_list_content" style="word-break:break-all">

                                                转发微博

                                            </div>
                                            @endif
                                        </div>

                                    </div>
                                    <!-- minzheng add part 3 -->

                                </div>
                                @endforeach
                                <div style="float: right">
                                    {!! $forward->render() !!}
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
                                                        <em style="font-size: 14px">
                                                            {{$user->socre}}
                                                        </em>
                                                        </a>
                                                    </div>
                                                    <ul class="user_atten clearfix W_f18" style="padding-left: 10px">
                                                        <li class="S_line1">
                                                            <a bpfilter="page_frame" href="/home/attention" class="S_txt1" indepth="true">
                                                                <strong node-type="follow" id="attention">
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
                                                                <strong node-type="weibo">
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

                                </div>
                            </div>
                            <!--/footer-->
                        </div>


                        </div>
            <script type="text/javascript">

                //加载照片
                $('.WB_detail img').zoomify();

                //微博转发
                $('#report').on('click', function(){

                    layer.msg('微博转发成功:)', {icon: 1});

                  });

                //关注博主
                function attent(id){
                    $.ajax({
                        type: "get",
                        url: "/home/attent",
                        data: {gid:id},

                        beforeSend:function(){
                             a = layer.load();
                          },
                        success: function(data) {

                            layer.close(a);

                            if(data.a == 0){
                                layer.msg('已取消关注', {icon: 1});
                                document.getElementById('attent').innerHTML = '关注';
                                document.getElementById('attention').innerHTML = data.gnum;

                            }else{
                                layer.msg('已关注', {icon: 1});
                                document.getElementById('attent').innerHTML = '√ 已关注';
                                document.getElementById('attention').innerHTML = data.gnum;

                            }

                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {

                            layer.msg("点赞失败，请检查网络后重试", {icon:2 ,})

                        }
                    });
                }


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
        </body>

    </html>