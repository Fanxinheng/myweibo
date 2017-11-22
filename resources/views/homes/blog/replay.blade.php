<!DOCTYPE html>
<html>
    
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="renderer" content="webkit">
        <meta name="viewport" content="initial-scale=1,minimum-scale=1">
        <meta name="csrf_token" content="{{ csrf_token() }}"/>
        <link rel="shortcut icon" type="image/x-icon" href="/homes/images/favicon.ico">
        <link title="微博" href="https://weibo.com/aj/static/opensearch.xml" type="application/opensearchdescription+xml" rel="search">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap-theme.min.css">
        <script type="text/javascript" src="/homes/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="/homes/layer/layer.js"></script>
        <script type="text/javascript" src="/homes/bootstrap/js/bootstrap.min.js"></script>
    
        <!-- <link rel="stylesheet" href="/homes/css/login.css"> -->

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
                                            <img src="/homes/images/wb_logo.png" alt="" style="margin-top:7px;">
                                        </span>
                                    </a>
                                </div>
                                <div class=" gn_search_v2">
                                    
                                    <input node-type="searchInput" autocomplete="off" value="" class="W_input"
                                    name="15102240605332" type="text" style="height:25px">
                                    <a href="javascript:void(0);" title="搜索" node-type="searchSubmit" class="W_ficon ficon_search S_ficon"
                                    suda-uatrack="key=topnav_tab&amp;value=search" target="_top">
                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>

                                    </a>
                                    <!--搜索热词下拉-->
                                    <div class="gn_topmenulist_search" node-type="searchSuggest" style="display: none;">
                                        <div class="gn_topmenulist">
                                            <div node-type="basic">
                                            </div>
                                            <div node-type="plus">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/搜索热词下拉-->
                                </div>
                            <!-- 搜索 -->
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
                                            <li>
                                                <a href="/home/details"  title="修改个人信息">
                                                    <em class="W_ficon ficon_user S_ficon">
                                                        <span class="glyphicon glyphicon-user" aria-hidden="true" ></span>
                                                    </em>
                                                    <em class="S_txt1">
                                                        {{$user->nickName}}
                                                    </em>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"  title="退出登录">
                                                    <em class="W_ficon ficon_home S_ficon">
                                                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                                    </em>
                                                    <em class="S_txt1">
                                                        退出
                                                    </em>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                        
                                        
                                    </ul>
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
                                                                <img title="{{$content->nickName}}"
                                                                src="{{$content->photo == null ? '/homes/uploads/default.jpg' : $content->photo}}" class="W_face_radius"
                                                                width="50" height="50">
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
                                                        <div id="image">
                                                            <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$content->image}}?imageView2/1/w/200/h/200/q/75|watermark/2/text/bXl3ZWlibw==/font/5a6L5L2T/fontsize/240/fill/I0YxRUZFNg==/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim"" style="width:100px;" id="img">
                                                        </div>
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
                                            <form action="/home/replay/store/" method="post">
                                                <div class="WB_feed_detail clearfix" node-type="feed_content" ">
                                                    <textarea class="form-control" rows="3" name="rcontent"></textarea>
                                                    <input type="hidden" name="uid" value="{{$content->uid}}">
                                                    <input type="hidden" name="tid" value="{{$content->cid}}">
                                                    {{csrf_field()}}
                                                    <button class="btn btn-default btn-sm" id="replay" style="float: right;margin:5px 0 5px 0">评论</button>
                                                   
                                                </div> 
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                @if($content->rnum == 0)
                                <div mrid="rid=1_0_8_3071587196499772427" tbinfo="ouid=3305085281" diss-data="group_source=group_all&amp;rid=1_0_8_3071587196499772427"
                                class="WB_cardwrap WB_feed_type S_bg2 WB_feed_vipcover WB_feed_like" mid="4172237139817031"
                                action-type="feed_list_item">
                                    <div class="WB_feed_detail clearfix" node-type="feed_content" ">
                                       
                                        <div class="WB_detail">
                                            <div class="WB_info">
                                                <a suda-uatrack="key=feed_headnick&amp;value=pubuser_nick:4172237139817031"
                                                target="_top" class="W_f14 W_fb S_txt1" title="{{$v->nickName}}" 
                                                usercard="id=3305085281&amp;refer_flag=0000015010_" indepth="true">
                                                    这么好的微博还没有人评论那，快去试试吧:)
                                                </a>
                                               
                                            </div>
                                            
                                        </div>
                                       
                                    </div>
                                    <!-- minzheng add part 3 -->
                                   
                                </div>
                                @endif
                                


                                @foreach($replay as $v)
                                <div mrid="rid=1_0_8_3071587196499772427" tbinfo="ouid=3305085281" diss-data="group_source=group_all&amp;rid=1_0_8_3071587196499772427"
                                class="WB_cardwrap WB_feed_type S_bg2 WB_feed_vipcover WB_feed_like" mid="4172237139817031"
                                action-type="feed_list_item">
                                    <div class="WB_feed_detail clearfix" node-type="feed_content" ">
                                        
                                        
                                        <div class="WB_face W_fl">
                                            <div class="face">
                                                <a title="{{$v->nickName}}" indepth="true">
                                                    <img title="{{$v->nickName}}"
                                                    src="{{$v->photo == null ? '/homes/uploads/default.jpg' : $v->photo}}" class="W_face_radius"
                                                    width="50" height="50">
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

                                            
                                            <div class="WB_text W_f14" node-type="feed_list_content" style="word-break:break-all">
                                                
                                                {{$v->rcontent}}
                                                
                                            </div>
                                            
                                        </div>
                                       
                                    </div>
                                    <!-- minzheng add part 3 -->
                                   
                                </div>
                                @endforeach
                                

                                </div>

                               
                              </div>
                                   <div id="v6_pl_rightmod_myinfo" style="float: right;width:245px">
                                        <div class="WB_cardwrap S_bg2">
                                            <div class="W_person_info" style="height:190px">
                                                <div class="cover" id="skin_cover_s" style="background-image: url('/homes/images/001_s.jpg');">
                                                    <div class="headpic">
                                                        <a bpfilter="page_frame" href="/home/user"  indepth="true">
                                                            <img class="W_face_radius" src="{{$user->photo == null ? '/homes/uploads/default.jpg' : $user->photo}}"
                                                             width="60" height="60">
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
                                    </div>
                               </div>
                            </div>


                        </div>
                        <script type="text/javascript">
                            
                            $('#replay').mouseover(function() {
                             
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                                   }
                                });

                                var content = $(this).siblings('textarea').val();
                                
                                $.post('/home/replay/empty', {content:content}, function(data){
                                    if(data == 0){
                                        layer.alert('微博评论内容不能为空！', {
                                          icon:2 ,
                                        })
                                        
                                        return false;
                                        
                                    }else{
                                        $('#replay').click(function() {
                                            layer.msg('微博评论成功:)');
                                        });

                                    }
                                });
                                
                                
                            });         
                        </script>
                    </body>

                </html>