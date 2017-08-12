@extends('Common.home')
@section('css')
    .overlay-inner-image img{
    height:182.77px;
    }
@stop
@section('content')
    <!-- page title =============================-->
    <div class="page-title-banner">
        <div class="container clearfix">
            <div class="pull-left page-category-title">
                <h1 class="sub-title">PUBLIC LINE “ 公共线路 ”</h1>
                <p>Videos from our comunity</p>

            </div>
            <div class="module-title pull-right">
                <ul  class="page-breadcram">

                    <li><a href="/">Home</a></li>
                    <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                    <li><a href="javascript:;" class="sub-title">PUBLIC LINE “ 公共线路 ”</a></li>

                </ul>
            </div>
        </div>
    </div>

    <!-- category  videos =============================-->
    <div class="staff-picked-posts padding-top-70 padding-bottom-40" id="chennal-page">
        <div class="container">
            <div class="tab-content">

                <div class="slide tab-pane active" id="l">

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row">
                                <ul class="staff-picked-videos">

                                </ul>
                            </div><!-- /Slide1 -->
                        </div><!-- /Slide1 -->

                    </div>


                </div><!-- /#myCarousel -->

                <div class="container clearfix">
                    <nav aria-label="...">
                        <ul class="pager">
                            <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Older</a></li>
                            <li class="next"><a href="#">Next <span aria-hidden="true">&rarr;</span></a></li>
                        </ul>
                    </nav>
                </div>


            </div>

        </div>


    </div>

@stop
@section('script')
    <script type="text/javascript">
        var getUrlType = GetRequest();
        var page = 0;
        if (getUrlType.page) {
            page = getUrlType.page;
        }
        $.get("/api/getVip", { limit: page,type:0 }, function(data){
            pageStyle(data.total,data.limit,page,'/list/public?page=');
            html = listPage(data.list,data.image);
            $(".staff-picked-videos").html(html);
        },'json');

    </script>
@stop
