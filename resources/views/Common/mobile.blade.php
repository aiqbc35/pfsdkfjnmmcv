<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>GodSky在线视频</title>
    <link href="{{asset('dist/style/weui.min.css')}}" rel="stylesheet">
    <style type="text/css">
        .weui-tab{
            height:auto !important;
        }
    </style>
    @yield('css')
    <script type="text/javascript">

        if (!(navigator.userAgent.match(/(phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone)/i))) {
            window.location.href="/";
        }
    </script>
</head>
<body ontouchstart>
<div class="container" id="container">
    <div class="page flex js_show">

        @yield('content')
    </div>

</div>
@include('Common.btmune')
<script src="{{asset('dist/example/zepto.min.js')}}"></script>
<script src="{{asset('dist/example/weui.min.js')}}"></script>
<script src="{{asset('dist/js/js.js')}}"></script>
@yield('script')
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b6bb55e5c8cfeee093fc2a91a983142d";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
</body>
</html>
