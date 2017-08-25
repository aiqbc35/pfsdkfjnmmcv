@extends('Common.home')
@section('css')
.overlay-inner-image img{
    height:182.77px;
}
.footer-social a{
    color:#959595;
}
.banner-content{
   background: none;
    top:0;
}
a.col-md-1.col-sm-1.col-xs-12.text-center {
    font-size: 11px;
    padding-right: 8px;
}
@stop
@section('content')
    <div class="banner-style1 background-color-gray padding-top-50 padding-bottom-30" id="banner-style1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="image-container">
                        <img src="" alt="" style="height: 500px;" class="img-responsive top-one-image"/>
                        <a href="#" class="image-overlay top-one-link"></a>
                        <div class="banner-content clearfix" style="top:32rem;">

                            <div class="banner-category"><a href="#" class="cat">movies</a></div>
                            <div class="banner-content-details">


                                <h2><a href="#"  class="banner-big-title top-one-title"></a></h2>
                                <p><span>View</span> <i class="top-one-click"></i> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="image-container" style="height: 265px;">

                        <div class="banner-content clearfix">
                            <h2>告示</h2>
                            <h6>Welcome to godsky, please remember our permanent website: http://www.godsky.org</h6>
                            <h6>[ 歡迎來到godsk，請記住我們的永久網址：http://www.godsky.org ]</h6>
                            <h6>Have any questions, such as: slow access, video can not play ... always welcome to our feedback. Contact post office: support@godsky.org</h6>
                            <h6>[ 有任何問題，列如：訪問速度慢，視頻播放不了...隨時歡迎向我們反饋。聯繫郵局：support@godsky.org ]</h6>
                            <h6>[如閣下發現網址無法訪問，請發送任意內容至wwwgodskyorg@gmail.com獲取最新網址，有任何建議都歡迎您的提出！]</h6>
                            <h6>[GodSky正式開啟VIP計劃，VIP擁有更新最快，播放最流暢等等更多權益，價格為：10美金/年或70人民幣/年，感謝您對本站的支持！]</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="image-container">
                        <img src="" alt="" style="height:235px" class="img-responsive top-two-image"/>
                        <a href="#" class="image-overlay top-two-link"></a>
                        <div class="clearfix banner-content-small">

                            <div class="banner-content-details pull-left">

                                <h2><a href="" class="top-two-title"></a></h2>
                                <p><span>VIEW</span> <i class="top-two-click"></i> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="image-container">
                        <img src="" alt="" style="height: 235px;" class="img-responsive top-three-image"/>
                        <a href="" class="image-overlay top-three-link"></a>
                        <div class="clearfix banner-content-small">

                            <div class="banner-content-details pull-left">

                                <h2><a href=""  class="banner-small-title top-three-title"></a></h2>
                                <p><span>VIEW</span> <i class="top-three-click"></i> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!--staff picked=============================-->
    <div class="staff-picked-posts padding-top-20 padding-bottom-20 border-bottom">
        <div class="container position-relative">
            <div class=" slider-container">

                <div class="post-advertis">
                    <img src="http://storage1.imgchr.com/V24q1.png" alt="" />
                </div>

            </div>
        </div>
    </div>

    <!--popular videos=============================-->
    <div class="popular-videos padding-top-70 border-bottom padding-bottom-10">
        <div class="container position-relative">
            <div class="slider-container">
                <div class="small-title">
                    <h2>Private line <a href="categorymain.html">“ 专属线路 ” <i class="fa fa-angle-right"></i></a> </h2>

                </div>


                <div class="row  margin-bottom-70">

                    <div class="slick-image-slider-4 movies-lar private-video">

                    </div>
                </div>

            </div>
        </div>
        <div class="container position-relative">
            <div class="slider-container">
                <div class="small-title">
                    <h2>Public line <a href="{{url('/list/public')}}">“ 公共线路 ” <i class="fa fa-angle-right"></i></a> </h2>

                </div>


                <div class="row  margin-bottom-70">

                    <div class="slick-image-slider-4 movies-lar public-video">

                    </div>
                </div>

            </div>
        </div>
    </div>

@stop
@section('links')
    <div class="footer-social row padding-top-20">
    </div>
@stop

@section('script')
    <script type="text/javascript">
        window.onload = function(){
            $.get("/api/home", { top:3,limit:12 }, function(data){
                getTop(data.image,data.top);
                var privateVideo = getPravite(data.image,data.private);
                var publicVideo = getPravite(data.image,data.public);
                $(".private-video").html(privateVideo);
                $(".public-video").html(publicVideo);
                var _links = '';
                $.each(data.links,function(i,item)
                {
                    _links += '<a href="'+item.link+'" class="col-md-1 col-sm-1 col-xs-12 text-center" target="_blank">'+item.title.substring(0,12)+'</a>'
                });
                $(".footer-social").html(_links);
            },'json');
        }
    </script>
@stop