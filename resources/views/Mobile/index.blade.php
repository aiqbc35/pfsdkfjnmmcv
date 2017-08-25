@extends('Common.mobile')
@section('css')
    <style type="text/css">
    body{
    background: #f6f6f6 url({{asset('dist/images/shadow-new-opp.png')}}) bottom center no-repeat;
    }
    #picPanel ul, li, a, img {
    margin: 0;
    padding: 0;
    list-style: none;
    }
    #picPanel img {
    display: block;
    height: 15rem;
    }
    #picPanel p {
    margin: 0;
    padding: 1rem 1rem;
    font-size: 1rem;
    line-height: 1.4;
    }
    .pagination {
    width: 100%;
    left: 0;
    bottom: 10px;
    position: absolute;
    text-align: center;
    -webkit-transition: 300ms;
    transition: 300ms;
    z-index: 10;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    }
    .pagination span {
    width: 8px;
    height: 8px;
    display: inline-block;
    border-radius: 100%;
    background: #fff;
    opacity: .5;
    margin: 0 3px;
    }
    .pagination span.active {
    opacity: 1;
    background: #007AFF;
    }
    .pic-panel {
    width: 100%;
    position: relative;
    overflow: hidden;
    }
    .pic-list {
    width: 100%;
    position: relative;
    }
    .pic-list li {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    }
    .pic-list .re {
    position: relative;
    z-index: 2;
    }
    .pic-list li img {
    width: 100%;
    }
    .pic-list li a {
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    }
    @media screen and (min-width: 600px) {
    .pic-box {
    position: relative;
    top: 0;
    left: 25%;
    width: 50%;
    }
    .pic-list li:nth-child(2) {
    left: 100%;
    }
    .pic-list li:last-child {
    left: -100%;
    }
    .pic-list li img {
    padding: 0 0.125rem;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    }
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
    }
    .weui-tab {
    position: fixed;
    height: 100%;
    bottom: 0;
    left: 0;
    width: 100%;
    }
    #public-video{
       margin-bottom:55px;
    }
    .weui-flex a {
      color: #000;
    }
    </style>
@endsection
@section('content')
    <div class="page__hd">
        <div id="picPanel" class="pic-panel">
            <div id="picBox" class="pic-box">
                <ul id="picList" class="pic-list">

                </ul>
            </div>
        </div>
    </div>
    <div class="page__bd">
        <div class="weui-flex">
            <div class="weui-flex__item">
                <div class="bd-title">
                    <i class="ico-pay"></i>
                    <span>VIP LINE “ VIP ”</span>
                </div>
            </div>
        </div>
        <article id="private-video">
        </article>
        <div class="weui-flex">
            <div class="weui-flex__item">
                <div class="bd-title">
                    <i class="ico-pay"></i>
                    <span>PUBLIC LINE “ 公共线路 ”</span>
                </div>
            </div>
        </div>
        <article id="public-video">

        </article>

    </div>
@endsection
@section('script')
    <script src="{{asset('dist/js/photoSlider-1.21.js')}}"></script>
    <script type="text/javascript">
        $(function(){
            $.get("/api/home", { top:'4',limit:'6' }, function(data){
                $("#picList").html(getBanner(data.top,data.image));
                homeBanner();
                $("#public-video").html(getPublicHtml(data.public,data.image));
                $("#private-video").html(getPublicHtml(data.private,data.image));
            },'json');



        });
    </script>
@endsection