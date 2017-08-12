@extends('Common.mobile')
@section('css')
    <link href="{{asset('video-js/video-js.min.css')}}" rel="stylesheet" type="text/css">
    <style type="text/css">
        .image-container img{
            height:137.5px;
        }
        body{
            background: #f6f6f6;
        }
        .page__hd {
            line-height: 3rem;
            text-align: center;
            background-color: #fff;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 500;
        }
        .page__bd{
            margin-top: 3rem;
            margin-bottom: 4rem;
        }
        article .weui-flex{
            background: #f6f6f6;
            margin-bottom: 6px;
        }
        article .weui-flex .weui-flex__item .placeholder{
            margin: 0 5px;
            height: 16rem;
            background-color: #fff;
            position: relative;
        }
        article .weui-flex .weui-flex__item .placeholder img{
            width: 100%;
            height: 12rem;
        }
        .pay-info{
            font-size: .4rem;
            color: #000;
            position: relative;
        }
        .pay-info .ico-time{
            display: inline-block;
            width: 15px;
            height: 15px;
            background-image: url({{asset('dist/images/time.png')}});
            background-size: contain;
            background-repeat: no-repeat;
            margin-left: 7px;
        }
        .pay-info span.add-time{
            position: absolute;
            top: -1px;
            left: 28px;
        }
        .pay-info .ico-view{
            display: inline-block;
            width: 15px;
            height: 15px;
            background-image: url({{asset('dist/images/view.png')}});
            background-size: contain;
            background-repeat: no-repeat;
            position: absolute;
            right: 26%;
        }
        .pay-info span.views{
            position: absolute;
            top: -2px;
            right: 2%;
        }
        .placeholder .title{
            font-size: 1.2rem;
            margin-left: 5px;
            color:#000;
        }
        .weui-tab {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: auto;
        }
        .bd-title{
            margin-top: 10px;
            margin-left: 10px;
            color: #888;
            position: relative;
        }
        .bd-title .ico-pay{
            display: inline-block;
            width: 30px;
            height: 30px;
            background-image: url({{asset('dist/images/pay.png')}});
            background-size: contain;
            background-repeat: no-repeat;
        }
        .bd-title span{
            font-size: 1.1rem;
            position: absolute;
            top: 2px;
            left: 36px;
        }
    </style>
@endsection
@section('content')
    <div class="page__hd">
        视频名称
    </div>
    <div class="page__bd">
        <div class="video-player-main" id="player">

        </div>
        <div class="weui-flex">
            <div class="weui-flex__item">
                <div class="bd-title">
                    <i class="ico-pay"></i>
                    <span>RECOMMEND “ 随机推荐 ”</span>
                </div>
            </div>
        </div>
        <article class="remod-video">

        </article>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('video-js/ie8/videojs-ie8.min.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="{{asset('video-js/video.min.js')}}" charset="utf-8"></script>
    <script type="text/javascript">
        var request = GetRequest();
        var hostUrl = 'http://' + window.location.host + '/mobile/';
        $(function(){

            $.get("/api/random", { name: "John", time: "2pm" }, function(data){
                if (data.status == 1) {
                    $(".remod-video").html(getPublicHtml(data.msg,data.image));
                }
            },'json');
            if (request.id > 0) {
                $.get("/api/getVideo", { id: request.id}, function(data){
                    if (data.status == 1) {
                        updateVideo(data.info,data.image,data.link);
                        var myPlayer =  videojs("example_video_1");
                        myPlayer.load();
                    }else if(data.status == 10 || data.status == 11){
                        alert1(data.msg,'/mobile/');
                    }else{
                        alert1(data.msg,'/mobile/');
                    }
                },'json');
            }else{
                window.location.href = hostUrl;
            }

            function updateVideo (data,image,link)
            {
                var _html = '<video id="example_video_1" class="video-js vjs-16-9 vjs-big-play-centered fod-vjs-default-skin vjs-paused vjs-fluid vjs-controls-enabled vjs-workinghover vjs-mux fod-vjs-embed videoPlayer-25c17d6eb2-dimensions vjs-user-inactive" controls preload="none" width="840" height="464" poster="' + image + data.image + '" data-setup="{}"> <source src="' + link + data.link + '" type="video/mp4"> <track kind="captions" src="{{asset('video-js/examples/shared/example-captions.vtt')}}" srclang="en" label="English" default></track><p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p></video>';

                $(".title").text(data.name);
                $("#player").html(_html);
            }
        });
    </script>
@endsection