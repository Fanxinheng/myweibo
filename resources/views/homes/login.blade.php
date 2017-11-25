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


                                    <form action="/home/release/" method="post" enctype="multipart/form-data">
                                            <textarea rows="4"  class="form-control" maxlength="200" onchange="this.value=this.value.substring(0, 200)" onkeydown="this.value=this.value.substring(0, 200)" onkeyup="this.value=this.value.substring(0, 200)" placeholder="请输入不多于200字内容" name="content" maxlength="200"></textarea>
                                        
                                            
                                            <div class="kind" style="height: 35px;margin-top: 3px;">
                                               <a class="S_txt1" href="javascript:void(0);" action-type="face" action-data="type=500&amp;action=1&amp;log=face&amp;cate=1"
                                               title="表情" node-type="smileyBtn" suda-uatrack="key=tblog_home_edit&amp;value=phiz_button">
                                                   <em class="W_ficon ficon_face">
                                                       <img src="/homes/images/bq.png" alt="" style="width: 15px;height: 15px;margin-bottom: 5px">
                                                   </em>
                                                   表情
                                               </a>
                                                <a class="S_txt1" title="图片" style="position: relative;">
                                                    <em class="W_ficon ficon_image" style="font-size:16px">
                                                        <span class="glyphicon glyphicon-picture" aria-hidden="true" ></span>
                                                    </em>
                                                    图片
                                                    <div style="position: absolute; left: 0px; top: 0px; display: block; overflow: hidden; background-color: rgb(0, 0, 0); opacity: 0; width: 49px; height: 24px;">
                                                            <input  name="image" style="cursor: pointer; width: 1000px; height: 1000px; position: absolute; bottom: 0px; right: 0px; font-size: 200px;"
                                                             multiple="multiple" type="file">
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
                                

                                @foreach($index as $v)
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
                                                                alt="" src="{{$v->photo == null ? '/homes/uploads/default.jpg' : $v->photo}}" class="W_face_radius"
                                                                width="50" height="50">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="WB_detail">
                                                        <div class="WB_info">
                                                            <a suda-uatrack="key=feed_headnick&amp;value=pubuser_nick:4172237139817031"
                                                            target="_top" class="W_f14 W_fb S_txt1" nick-name="{{$v->nickName}}" title="{{$v->nickName}}" 
                                                            usercard="id=3305085281&amp;refer_flag=0000015010_" indepth="true" href="/home/user">
                                                                {{$v->nickName}}
                                                            </a>
                                                            <!-- 判断微博是否为登录用户自己发布 -->
                                                            @if($uid == $v->uid)
                                                                <!-- <a href="/home/blog/destory/{{$v->cid}}"></a> -->
                                                                <a class="glyphicon glyphicon-remove destroy" onclick="destroy({{$v->cid}})" style="float: right;cursor: pointer;" title="删除微博" id="des{{$v->cid}}">
                                                                    <input type="hidden" name="destroy" value="{{$v->cid}}">
                                                                </a>

                                                            @endif
                                                            
                                                           
                                                        </div>
                                                        <div class="WB_from S_txt2">
                                                            <!-- minzheng add part 2 -->
                                                            <a title="发布时间" class="S_txt2">
                                                                {{date('Y-m-d H:i:s',$v->time)}}
                                                            </a>
                                                            
                                                            <!-- minzheng add part 2 -->
                                                        </div>
                                                        <a href="/home/blog/replay/{{$v->cid}}">
                                                            <div class="WB_text W_f14" node-type="feed_list_content" style="word-break:break-all">
                                                                {{$v->content}} ​​​​
                                                            </div>
                                                        </a>
                                                        @if($v->image)
                                                        <div id="image">
                                                            <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$v->image}}?imageView2/1/w/200/h/200/q/75|watermark/2/text/bXl3ZWlibw==/font/5a6L5L2T/fontsize/240/fill/I0YxRUZFNg==/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim" style="width:100px;" id="img">
                                                        </div>
                                                        @else

                                                        @endif
                                                        
                                                    </div>
                                                   
                                                </div>
                                                <!-- minzheng add part 3 -->
                                                <div class="WB_feed_handle">
                                                    <div class="WB_handle">
                                                        <ul class="WB_row_line WB_row_r4 clearfix S_line2">
                                                            <li>
                                                                <a  class="S_txt2" title="举报">
                                                                    <span class="report">
                                                                        <input type="hidden" class="rep" value="{{$v->cid}}">
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
                                                                <a href="/home/blog/forward/{{$v->cid}}" class="S_txt2" title="转发">
                                                                    <span class="pos">
                                                                        <span class="line S_line1" node-type="forward_btn_text">
                                                                            <span>
                                                                                <em class="W_ficon ficon_forward S_ficon">
                                                                                    <span class="glyphicon glyphicon-share" aria-hidden="true" style="margin-top: 4px;width: 10px;height: 10px"></span>
                                                                                </em>
                                                                                <em style="font-size: 14px">
                                                                                    {{$v->fnum}}
                                                                                </em>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="/home/blog/replay/{{$v->cid}}" class="S_txt2" title="评论">
                                                                    <span class="pos">
                                                                        <span class="line S_line1" node-type="comment_btn_text">
                                                                            <span>
                                                                                <em class="W_ficon ficon_repeat S_ficon">
                                                                                    <span class="glyphicon glyphicon-comment" aria-hidden="true" style="margin-top: 4px;width: 10px;height: 10px"></span>
                                                                                </em>
                                                                                <em style="font-size: 14px">
                                                                                    {{$v->rnum}}
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
                                                                        <input type="hidden" name="point" value="{{$v->cid}}">
                                                                        <span class="line S_line1">
                                                                            <span id="point{{$v->cid}}" node-type="like_status" onclick="point({{$v->cid}})">
                                                                                <em class="W_ficon ficon_praised S_txt2">
                                                                                    <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" style="margin-top: 4px;width: 10px;height: 10px"></span>
                                                                                </em>
                                                                                <em style="font-size: 14px" id="pnum{{$v->cid}}">
                                                                                    
                                                                                    {{$v->pnum}}
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
                                    </div>
                               </div>
                            </div>
                        </div>
                        

                        <script type="text/javascript">

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


                            //微博删除
                            function destroy(id){

                                //获取要删除微博的id
                                did = $('#des'+id).children('input[name=destroy]').val();

                                layer.confirm('您确定要删除此微博吗？', {
                                  btn: ['确定','取消'] //按钮
                                }, function(){

                                    $.ajax({
                                    type: "get",
                                    url: "/home/blog/destroy",
                                    data: {did:did},
                                    
                                    beforeSend:function(){
                                        //加载样式
                                        a = layer.load(0, {shade: false});
                                      },
                                    success: function(data) {

                                        //关闭加载样式
                                        layer.close(a)

                                        //移除微博
                                        $('#destroy'+id).remove();
                                        
                                        //微博数量-1
                                        document.getElementById('cnum').innerHTML = data.cnum;

                                        //微博积分-5
                                        document.getElementById('socre').innerHTML = data.socre;

                                        layer.msg('微博删除成功:)', {icon: 1});
                                    },
                                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                                        layer.msg("微博删除失败，请检查网络后重试", {icon:2 ,})
                                        
                                        
                                    }
                                });

                                }, function(){

                                });

                            };


                        </script>
                    </body>

                </html>