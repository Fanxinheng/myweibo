<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <title>
            @yield('title')
        </title>
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap-theme.min.css">
        <script type="text/javascript" src="/homes/js/jquery.min.js">
        </script>
        <script type="text/javascript" src="/homes/bootstrap/js/bootstrap.min.js">
        </script>
    </head>
    <body>   
            <div>
                <nav class="navbar navbar-fixed-top" id = "navbar">
                    <div class="container">
                        <div class="navbar-header" id="navbar-header1" >
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

                        <div  id="nav-1">
                            <button type="button" class="btn btn-default" aria-label="Left Align">
                                <span class="glyphicon glyphicon-home" aria-hidden="true">
                                </span>
                                首页
                            </button>
                            <button type="button" class="btn btn-default" aria-label="Left Align">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true">
                                </span>
                            </button>
                        </div>
                        <!--/.navbar-collapse -->
                    </div>
                </nav>
            </div>
        <!-- 头结束 -->

                @section('content')

                @show



                <div id="foot">
                <footer class="footer" id="foot1" >
                    <div class="container">
                        <p class="text-muted">
                            Place sticky footer content here.
                        </p>
                    </div>
                </footer>
                <!-- footer 开始-->
                <footer class="footer" id="foot2">
                    <div class="container">
                        <p class="text-muted">
                            Place sticky footer content here.
                        </p>
                    </div>
                </footer>
            </div>
        <!-- footer结束 -->
        </div>
        
    </body>

</html>