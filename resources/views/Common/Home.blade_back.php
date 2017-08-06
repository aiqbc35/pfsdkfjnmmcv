<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/color.css')}}" rel="stylesheet">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/slick.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/slick-theme.css')}}" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">

    <style type="text/css">
        .movies-lar .col-xs-12 {
            margin-bottom: 10px !important;
        }
    </style>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="{{asset('js/html5shiv.js')}}"></script>
    <script src="{{asset('js/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body>


<div id="top-bar-style1" class="catgroy-main">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="theme-logo">
                    <a href="index.html"><img src="{{asset('images/logo.png')}}" alt=""/></a>
                </div>
                <div class="search-form clearfix">
                    <form>

                        <div class="search-field pull-left">
                            <input type="text" placeholder="Search here">
                        </div>
                        <div class="search-btn pull-left">
                            <button>
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 text-right">
                <div class="top-bar-upload pad-top-0">
                    <a href="login.html" class="user-btn"><i class="fa fa-user"></i></a>
                    <div class="pull-right" id="admin-name"><a  href="#" class="">taketheme</a>
                        <div class="hidden-menue2">
                            <ul data-tabs="tabs">
                                <li class="block-1"><a href="#r" data-toggle="tab">Sign up(注册)</a></li>
                                <li class="block-1"><a href="#r" data-toggle="tab">Sign in(登录)</a></li>

                                <li><a href=""> Sign out(退出)</a></li>

                            </ul>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.item -->
<div id="header-style1">

    <div class="wrapper">

        <div class="container">

            <nav role="navigation" class="navbar plain">
                <div class="navbar-header">
                    <button data-target="#navbar-collapse-02" data-toggle="collapse" class="navbar-toggle" type="button">
                        <i class="fa fa-bars"></i>
                    </button>

                </div>

                <div id="navbar-collapse-02" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="propClone"><a href="movie.html"> <i class="fa fa-home"></i>Home(首页)</a></li>
                        <li class="propClone"><a href="movie.html"> <i class="fa fa-film"></i>Private line(专属线路)</a></li>
                        <li class="propClone"><a href="categorymain.html"><i class="fa fa-futbol-o"></i> Public line(公共线路)</a></li>
                        <li class="propClone"><a href="mychannels.html"><i class="fa fa-user"></i> Member(会员中心)</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>

        </div><!-- /.container -->

    </div><!-- /.wrpaper -->
</div><!-- /.item -->

<!--banner=============================-->

@yield('content')

<!--footer=============================-->
<div class="footer">
    <div class="copyright">
        <div class="container clearfix">
            <div class="pull-left">
                <p>Videofy © 2016 All Rights Reserved <span>Terms of Use</span> and <span>Privacy Policy</span></p>
            </div>
            <div class="pull-right">
                <p>Powered by Wordpress</p>
            </div>
        </div>

    </div>
</div>

<!--Load JS here for greater good=============================-->
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/slick.min.js')}}"></script>


<script src="{{asset('js/triger.js')}}"></script>
<script>
    $(document).ready(function(){
        "use strict";



        $('[data-toggle="tooltip"]').tooltip({placement: "left"});

    });
</script>


</body>
</html>