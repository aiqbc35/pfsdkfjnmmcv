@extends('Common.mobile')
@section('css')
<style>
    .page__hd{padding:40px;background-color: #f8f8f8}
    .page__title{    text-align: left;
        font-size: 20px;
        font-weight: 400;
    }
    .weui-cells{margin-top: 0px;}
    .weui-cell{line-height: 2em;}
    .weui-cell_primary{color:red;}
    .weui-btn_primary{margin-top: 10px;margin-bottom: 3px;}
    .page__bd{min-height: 31.5em;}
    a.weui-actionsheet__cell {
        color: #000;
    }
    .weui-actionsheet__cell{
        padding-left: 20px;
        text-align: left;
    }
</style>
@stop
@section('content')
    <div class="page__hd">
        <h1 class="page__title">用戶中心</h1>
    </div>
    <div class="page__bd">
        <div class="weui-panel">
            <div class="weui-panel__bd">
                <div class="weui-cells">
                    <div class="weui-cell">
                        <div class="weui-cell__bd">
                            <p>用戶名：<span id="username"></span></p>
                        </div>
                        <div class="weui-cell__ft"></div>
                    </div>
                    <div class="weui-cell">
                        <div class="weui-cell__bd">
                            <p>會員等級：<span id="userlev"></span></p>
                        </div>
                        <div class="weui-cell__ft"></div>
                    </div>
                    <div class="weui-cell weui-cell_vcode" style="line-height: 3rem;">
                        <div class="weui-cell__hd" >
                            <label class="weui-label">VIP激活码：</label>
                        </div>
                        <div class="weui-cell__bd" >
                            <input type="hidden"  id="csrf-token" value="{{ csrf_token() }}">
                            <input class="weui-input" type="text" id="code" placeholder="請点击輸入激活碼">
                        </div>
                        <div class="weui-cell__ft">
                            <button class="weui-vcode-btn">確認激活</button>
                        </div>
                    </div>
                    <div class="weui-btn weui-btn_primary actcode" id="showIOSActionSheet" style="width: 98%;">
                        購買VIP激活碼升级至VIP
                    </div>
                        <a class="weui-cell weui-cell_access" href="javascript:;" target="_blank">
                            <div class="weui-cell__bd weui-cell_primary">
                                <p>VIP會員權益：</p>
                                <p>1、享受會員專享高速服務器，看片更清晰更流暢！</p>
                                <p>2、優質片源每天新增！</p>
                                <p>3、不定期發送1080P高清片源至會員郵箱！</p>
                                <p>4、優先體驗公司最新服務！</p>
                                <p>5、<strong style="color: #4876FF">勁爆體驗價1天：18元或2美金，1個月：28元或5美金，一季度：58元或9美金，全年98元或15美金。暑期活動價：10美金或70元人民幣/年（截止：2017-09-15）！</strong></p>

                            </div>
                            <span class="weui-cell__ft"></span>
                        </a>
                    <a class="weui-btn weui-btn_warn logout" style="width: 90%;" href="{{url('/logout')}}">
                        退出登陆
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="weui-mask" id="iosMask" style="opacity: 0; display: none;"></div>
        <div class="weui-actionsheet" id="iosActionsheet">
            <div class="weui-actionsheet__title">
                <p class="weui-actionsheet__title-text">请点击选择</p>
            </div>
            <div class="weui-actionsheet__menu">
                <a class="weui-actionsheet__cell" style="display: block" href="http://t.cn/RNhLPCE">1天体验价（18元）</a>
                <a class="weui-actionsheet__cell" style="display: block" href="http://t.cn/RNhLh4Z">1月（28元）</a>
                <a class="weui-actionsheet__cell" style="display: block" href="http://t.cn/RNh2d8t">1季度（58元）</a>
                <a class="weui-actionsheet__cell" style="display: block" href="http://t.cn/RC8dIB4">1年（原价98）现在活动价70元，活动截止：2017/9/15</a>
            </div>
            <div class="weui-actionsheet__action">
                <div class="weui-actionsheet__cell" id="iosActionsheetCancel" style="text-align: center;">取消</div>
            </div>
        </div>
    </div>
@stop
@section('script')
<script>

    var getUrlType = GetRequest();

    window.onload = function(){
        $.get("/api/getUser", { name: "John", time: "2pm" }, function(data){
            if (data.status != 1) {
                window.location.href = '/mobile/login';
                return;
            }
            $("#username").text(data.msg.username);
            if (data.msg.type == 1) {
                $("#userlev").text('VIP会员');
                if (data.msg.vipstatus) {
                    window.location.reload();
                    return;
                }

                $(".weui-cell_vcode").remove();
                $(".actcode").remove();
            }else{
                $("#userlev").text('普通会员');
            }

        },'json');

        if (getUrlType.type == 'btn') {
            $('#iosActionsheet').addClass('weui-actionsheet_toggle');
            $('#iosMask').fadeIn(200);
        }

    }


    // ios
    $(function(){
        var $iosActionsheet = $('#iosActionsheet');
        var $iosMask = $('#iosMask');

        function hideActionSheet() {
            $iosActionsheet.removeClass('weui-actionsheet_toggle');
            $iosMask.fadeOut(200);
        }

        $iosMask.on('click', hideActionSheet);
        $('#iosActionsheetCancel').on('click', hideActionSheet);
        $("#showIOSActionSheet").on("click", function(){
            $iosActionsheet.addClass('weui-actionsheet_toggle');
            $iosMask.fadeIn(200);
        });
    });


    $(".weui-vcode-btn").click(function(event){
            var code = $("#code").val();
            var token = $("#csrf-token").val();

            if (token == '') {
                alert1('請刷新頁面后再操作','')
            }else if (code == '') {
                alert1('請輸入驗證碼！','')
            }else{
                $.post("/api/actcode", { code: code, '_token': token },function(data){
                          if (data.status == 1) {
                              window.location.reload();
                          }
                          alert1(data.msg,'');
                 },'json');
            }
    });

</script>
@stop