@extends('Common.home')
@section('css')
.admin-information{
    bottom:101px;
}
@stop
@section('content')
    <div class="channel-banner background-color-gray padding-top-50 padding-bottom-80">
        <div class="container">
            <div class="banner-image-container banner-img">
                <img src="{{asset('images/ch.jpg')}}" alt="" />
                <div class="slider-over-opacity"></div>
                <div class="admin-information clearfix">
                    <div class="admin-image">
                        <a href=""><img src="{{asset('images/admin.png')}}" alt="img description" width="192" height="193"/></a>
                    </div>
                    <div class="admin-personal-info">
                        <h1 class="title">Danny Ryans</h1>
                        <p class="isVip">是否会员</p>
                        <p>会员到期时间：<i class="vipDate"></i></p>
                    </div>
                </div>
                <div class="admin-social-info social-network">
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-google"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>

                </div>


            </div>


        </div>


    </div>
    <!-- page sorting =============================-->


    <div class="channel-page-sorting border-bottom padding-top-25">
        <div class="container">
            <div class="module-title">

                <ul  class="load-tabs">
                    <!--<li class="cb block-1 active"><a href="#r" data-toggle="tab">Home</a></li>-->
                    <!--<li class="cb block-2"><a href="#a" data-toggle="tab">all</a></li>-->
                    <!--<li class="cb block-3"><a href="#m" data-toggle="tab">Following <span class="f-count">(20)</span></a></li>-->
                    <!--<li class="cb block-4"><a href="#f" data-toggle="tab">Followers   <span class="f-count">(25)</span></a></li>-->

                    <!--<li><a href="#ab" data-toggle="tab">about</a></li>-->

                </ul>
            </div>

        </div>

    </div>


    <!-- category  videos =============================-->
    {{--<div class="staff-picked-posts padding-top-20 padding-bottom-60">--}}
        {{--<div class="container">--}}
            {{--<div class="tab-content">--}}

                {{--<div class="slide tab-pane active" id="r">--}}
                    {{--<div class="small-title">--}}
                        {{--<h2>Featured</h2>--}}

                    {{--</div>--}}
                    {{--<div class="feature-image features-post row padding-bottom-40">--}}

                        {{--<div class="col-md-12">--}}
                            {{--<div class="post-details clearfix">--}}
                                {{--<div class="overlay-inner-image img-holder pull-left">--}}
                                    {{--<img src="images/banner1/3.jpg" alt="" height="230" width="270"/>--}}
                                    {{--<a href="detailpage.html" class="inner-image-overlay"></a>--}}
                                    {{--<div class="watch-icon" data-toggle="tooltip" title="Watch Later" >--}}
                                        {{--<a href=""  ><i class="fa fa-clock-o" aria-hidden="true"></i></a>--}}

                                    {{--</div>--}}

                                {{--</div>--}}
                                {{--<div class="image-content img-holder-content background-color-white pull-left">--}}
                                    {{--<h3><a href="detailpage.html">Ready to Kick it</a></h3>--}}
                                    {{--<p class="margin-bottom-0">2 hours ago <span><i class="fa fa-eye"></i> 150 views  </span> </p>--}}
                                    {{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem </p>--}}
                                    {{--<a class="upload-video" href="detailpage.html"><i class="fa fa-play-circle"></i>Watch video</a>--}}

                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div><!-- /#myCarousel -->--}}

            {{--</div>--}}

        {{--</div>--}}


    {{--</div>--}}

@stop
@section('script')
<script type="text/javascript">
    window.onload = function(){
        $.get("/api/getUser", { name: "John", time: "2pm" }, function(data){
                if (data.status != 1) {
                    window.location.href = '/login';
                    return;
                }
                $(".title").text(data.msg.username);
                if (data.msg.type == 1) {
                    $(".isVip").text('VIP会员');
                    if (data.msg.vipstatus) {
                        window.location.reload();
                        return;
                    }
                    vipdate = getLocalTime('Y-m-d',data.msg.viptime);
                    $(".vipDate").text(vipdate);
                }else{
                    $(".isVip").text('普通会员');
                }

        },'json');
    }
</script>
@stop