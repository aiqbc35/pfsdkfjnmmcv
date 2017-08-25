<div class="weui-tab">
    <div class="weui-tab__panel">

    </div>
    <div class="weui-tabbar">
        <a href="{{url('/mobile/')}}" class="weui-tabbar__item {{ Request::getPathInfo() == '/mobile' ? 'weui-bar__item_on' : ''}}">

            <img src="{{asset('dist/images/home.png')}}" alt="" class="weui-tabbar__icon">

            <p class="weui-tabbar__label">首页</p>
        </a>
        <a href="{{url('/mobile/vip')}}" class="weui-tabbar__item {{ Request::getPathInfo() == '/mobile/vip' ? 'weui-bar__item_on' : ''}}">
            <img src="{{asset('dist/images/line.png')}}" alt="" class="weui-tabbar__icon">
            <p class="weui-tabbar__label">VIP</p>
        </a>
        <a href="{{url('/mobile/public')}}" class="weui-tabbar__item {{ Request::getPathInfo() == '/mobile/public' ? 'weui-bar__item_on' : ''}}">

            <img src="{{asset('dist/images/public.png')}}" alt="" class="weui-tabbar__icon">

            <p class="weui-tabbar__label">公共</p>
        </a>
        <a href="{{url('/mobile/member')}}" class="weui-tabbar__item {{ Request::getPathInfo() == '/mobile/member' ? 'weui-bar__item_on' : ''}}">
            <img src="{{asset('dist/images/user.png')}}" alt="" class="weui-tabbar__icon">
            <p class="weui-tabbar__label">我</p>
        </a>
    </div>
</div>