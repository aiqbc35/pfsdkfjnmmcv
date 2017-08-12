<div class="weui-tab">
    <div class="weui-tab__panel">

    </div>
    <div class="weui-tabbar">
        <a href="{{url('/mobile/')}}" class="weui-tabbar__item weui-bar__item_on">

            <img src="{{asset('dist/images/home.png')}}" alt="" class="weui-tabbar__icon">

            <p class="weui-tabbar__label">首页</p>
        </a>
        {{--<a href="javascript:;" class="weui-tabbar__item">--}}
            {{--<img src="{{asset('dist/images/line.png')}}" alt="" class="weui-tabbar__icon">--}}
            {{--<p class="weui-tabbar__label">专线</p>--}}
        {{--</a>--}}
        <a href="{{url('/mobile/public')}}" class="weui-tabbar__item">

            <img src="{{asset('dist/images/public.png')}}" alt="" class="weui-tabbar__icon">

            <p class="weui-tabbar__label">公共</p>
        </a>
        {{--<a href="javascript:;" class="weui-tabbar__item">--}}
            {{--<img src="{{asset('dist/images/user.png')}}" alt="" class="weui-tabbar__icon">--}}
            {{--<p class="weui-tabbar__label">我</p>--}}
        {{--</a>--}}
    </div>
</div>