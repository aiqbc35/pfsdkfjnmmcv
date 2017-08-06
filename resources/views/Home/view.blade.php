@extends('Common.home')
@section('linkcss')
    <link href="{{asset('video-js/video-js.min.css')}}" rel="stylesheet" type="text/css">
@stop
@section('css')
.image-container img{
    height:137.5px;
}
@stop
@section('content')
    <div class="upload-videos background-color-gray padding-top-50" id="detail-page-with-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="main-video-container">
                        <div class="video-player-main" id="player">
                            <video id="example_video_1" class="video-js vjs-16-9 vjs-big-play-centered fod-vjs-default-skin vjs-paused vjs-fluid vjs-controls-enabled vjs-workinghover vjs-mux fod-vjs-embed videoPlayer-25c17d6eb2-dimensions vjs-user-inactive" controls preload="none" width="840" height="464" poster="http://vjs.zencdn.net/v/oceans.png" data-setup="{}">
                                <source src="http://img.ksbbs.com/asset/Mon_1605/0ec8cc80112a2d6.mp4" type="video/mp4">
                                <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                            </video>
                        </div>
                    </div>
                    <div class="main-video-container-content">
                        <div class="banner-category"><a href="javascript:;" class="cat">movies</a></div>
                        <h1 class="title">Always somthing Good</h1>

                    </div>

                </div>
                <div class="col-md-3 col-sm-12 col-xs-12" id="sidebar-detail3">
                    <div class="sidebar">
                        <div class="market">
                            <img src="images/small.jpg" alt="img description" />
                        </div>
                        <div class="widget-aside">
                            <div class="latest-video-widget">
                                <div class="latest-videos-post">
                                    <div class="image-container">
                                        <img src="demo/lt2.jpg" alt="" width="270" height="121"/>
                                        <a href="" class="image-overlay"></a>
                                        <div class="banner-content-small">
                                            <div class="banner-play-sign banner-content-small-font pull-left"></div>

                                        </div>
                                    </div>
                                    <h4><a href="">Analyzing Generous Autobiography</a></h4>
                                    <p class="video-widget-subtitle">2 hours ago <span><i class="fa fa-eye"></i> 150 views  </span></p>
                                </div>
                                <div class="latest-videos-post">
                                    <div class="image-container">
                                        <img src="demo/lt2.jpg" alt="" width="270" height="121"/>
                                        <a href="" class="image-overlay"></a>
                                        <div class="banner-content-small">
                                            <div class="banner-play-sign banner-content-small-font pull-left"></div>

                                        </div>
                                    </div>
                                    <h4><a href="">Analyzing Generous Autobiography</a></h4>
                                    <p class="video-widget-subtitle">2 hours ago <span><i class="fa fa-eye"></i> 150 views  </span></p>
                                </div>
                                <div class="latest-videos-post">
                                    <div class="image-container">
                                        <img src="demo/lt2.jpg" alt="" width="270" height="121"/>
                                        <a href="" class="image-overlay"></a>
                                        <div class="banner-content-small">
                                            <div class="banner-play-sign banner-content-small-font pull-left"></div>

                                        </div>
                                    </div>
                                    <h4><a href="">Analyzing Generous Autobiography</a></h4>
                                    <p>2 hours ago</p>
                                </div>
                                <div class="latest-videos-post">
                                    <div class="image-container">
                                        <img src="demo/lt2.jpg" alt="" width="270" height="121"/>
                                        <a href="" class="image-overlay"></a>
                                        <div class="banner-content-small">
                                            <div class="banner-play-sign banner-content-small-font pull-left"></div>

                                        </div>
                                    </div>
                                    <h4><a href="">Analyzing Generous Autobiography</a></h4>
                                    <p class="video-widget-subtitle">2 hours ago <span><i class="fa fa-eye"></i> 150 views  </span></p>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>


    </div>
@stop
@section('script')

    <script type="text/javascript">
        var request = GetRequest();
        var hostUrl = window.location.host;
        window.onload = function(){
            $.get("/api/random", { name: "John", time: "2pm" }, function(data){
                    if (data.status == 1) {
                        _html = '';
                        $.each(data.msg,function(i,item){
                            _html += '<div class="latest-videos-post"> <div class="image-container"> <img src="' + data.image + item.image + '" alt="" width="270" height="121"/> <a href="/view?id=' + item.id + '" class="image-overlay"></a> <div class="banner-content-small"> <div class="banner-play-sign banner-content-small-font pull-left"></div> </div> </div> <h4><a href="/view?id=' + item.id + '">' + item.name + '</a></h4> <i class="fa fa-eye"></i> ' + item.hit + ' views  </span></p> </div>';
                        });
                        $(".latest-video-widget").html(_html);
                    }
            },'json');

        }

        if (request.id) {
            $.get("/api/getVideo", { id: request.id }, function(data){
                if (data.status == 1) {
                    updateVideo(data.info,data.image,data.link);
                }else if(data.status == 10 || data.status == 11){
                    alertLink(data.msg,data.link);
                }else{
                    alertError(data.msg);
                }

            },'json');
        }else{
            alertError('Please select a video');
        }

        function updateVideo (data,image,link)
        {
            var _html = '<video id="example_video_1" class="video-js vjs-16-9 vjs-big-play-centered fod-vjs-default-skin vjs-paused vjs-fluid vjs-controls-enabled vjs-workinghover vjs-mux fod-vjs-embed videoPlayer-25c17d6eb2-dimensions vjs-user-inactive" controls preload="none" width="840" height="464" poster="' + image + data.image + '" data-setup="{}"> <source src="' + link + data.link + '" type="video/mp4"> <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p></video>';
            $(".title").text(data.name);
            $("#player").html(_html);
        }

    </script>
    <script type="text/javascript" src="{{asset('video-js/ie8/videojs-ie8.min.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="{{asset('video-js/video.min.js')}}" charset="utf-8"></script>
@stop