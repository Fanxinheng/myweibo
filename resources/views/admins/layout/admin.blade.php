<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/admins/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/custom-plugins/wizard/wizard.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/admins/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admins/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/themer.css" media="screen">


<link rel="stylesheet" href="/admins/layer/skin/layer.css">

<!-- 分页样式 -->
<link rel="stylesheet" stype="text/css" href="/admins/css/paging.css" media="screen"/>


<title>@yield('title')</title>

</head>

<body>

	<!-- Themer (Remove if not needed) -->

    <!-- Themer End -->

	<!-- Header -->
	<div id="mws-header" class="clearfix">

    	<!-- Logo Container -->
    	<div id="mws-logo-container">

        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<div id="mws-logo-wrap">
            	<h3 style="color: white;font-size: 30px">myweibo.com</h3>
			</div>
        </div>

        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">

        	<!-- Notifications -->

            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">

                <?php
                    $result = DB::table('admin')->where('id',session('pid'))->first();
                ?>
            	<!-- User Photo -->
                	<div id="mws-user-photo">
                    	<img src="{{$result->pic}}" alt="User Photo">
                    </div>

                    <!-- Username and Functions -->
                    <div id="mws-user-functions">


                            <div id="mws-username">
                               用户名:&nbsp;&nbsp;&nbsp;{{$result->name}}
                            </div>
                            <ul>
                                <li><a href="/admin/admins/{{$result->id}}/edit"> 修改个人信息</a></li>
                                <li><a href="/admin/password/{{$result->id}}"> 修改密码</a></li>
                                <li><a href="/admin/password/delete/{{$result->id}}">退出</a></li>
                            </ul>

                    </div>
            </div>

        </div>
    </div>

    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">

    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>

        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">

            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>


            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                    <li>
                        <a href="#"><i class="icon-users"></i>用户管理</a>
                        <ul class="closed">

                            <li><a href="/admin/admins/create">管理员添加</a></li>
                            <li><a href="/admin/admins">管理员列表</a></li>
                            <li><a href="/admin/index">用户列表</a></li>

                        </ul>
                        <a href="#"><i class="icon-twitter-2"></i>微博管理</a>
                        <ul class="closed">
                            <li><a href="/admin/weibo">微博列表</a></li>
                             <li><a href="/admin/hot">热门列表</a></li>
                        </ul>
                        <a href="#"><i class="icon-bell-2"></i>举报管理</a>
                        <ul class="closed">
                            <li><a href="/admin/report">举报列表</a></li>
                        </ul>
                        <a href="#"><i class="icon-list"></i>标签管理</a>
                        <ul class="closed">
                            <li><a href="/admin/label/create">标签添加</a></li>
                            <li><a href="/admin/label">标签列表</a></li>
                        </ul>
                        <a href="#"><i class="icon-filter"></i>广告管理</a>
                        <ul class="closed">
                            <li><a href="/admin/advert/create">广告添加</a></li>
                            <li><a href="/admin/advert">广告列表</a></li>
                        </ul>
                        <a href="#"><i class="icon-link"></i>友情链接</a>
                        <ul class="closed">
                            <li><a href="/admin/link/create">链接添加</a></li>
                            <li><a href="/admin/link">链接列表</a></li>
                        </ul>
                        <a href="#"><i class="icon-calendar"></i>系统公告</a>
                        <ul class="closed">
                            <li><a href="/admin/notice/create">公告添加</a></li>
                            <li><a href="/admin/notice">公告列表</a></li>
                        </ul>
                        <a href="#"><i class="icon-tools"></i>网站配置</a>
                        <ul class="closed">
                            <li><a href="/admin/config">配置修改</a></li>
                            <li><a href="/admin/logo">LOGO修改</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">

            <div class="container">
            @section('content')

            @show
            </div>
            <div id="mws-footer">
            Copyright Your Website 2012. All Rights Reserved.
            </div>
        </div>

        <!-- Main Container End -->
    </div>

    <!-- JavaScript Plugins -->
    <script src="/admins/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/admins/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/admins/js/libs/jquery.placeholder.min.js"></script>
    <script src="/admins/custom-plugins/fileinput.js"></script>

    <script src="/admins/layer/layer.js"></script>

    <!-- jQuery-UI Dependent Scripts -->
    <script src="/admins/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/admins/jui/jquery-ui.custom.min.js"></script>
    <script src="/admins/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/admins/plugins/datatables/jquery.dataTables.min.js"></script>
    <!--[if lt IE 9]>
    <script src="js/libs/excanvas.min.js"></script>
    <![endif]-->
    <script src="/admins/plugins/flot/jquery.flot.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.tooltip.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.pie.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.stack.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.resize.min.js"></script>
    <script src="/admins/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/admins/plugins/validate/jquery.validate-min.js"></script>
    <script src="/admins/custom-plugins/wizard/wizard.min.js"></script>

    <!-- Core Script -->
    <script src="/admins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admins/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/admins/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/admins/js/demo/demo.dashboard.js"></script>
<<<<<<< HEAD
=======

>>>>>>> db293e86662de6b243ad55a406fd24b0089c1ea2
    @section('js')


    @show
</body>
</html>
