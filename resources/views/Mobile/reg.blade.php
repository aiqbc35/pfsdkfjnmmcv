@extends('Common.mobile')
@section('css')
    <style>
        .weui-msg{padding-top:106px;}
        .weui-cells{line-height: 2.4;border: 1px solid #e5e5e5;}
        .weui-btn-area{margin-top:56px !important;}
        .login{line-height: 3rem;color: #586C94;}
        .weui-article{padding-bottom: 5em;}
    </style>
@stop
@section('content')
    <div class="page msg_success js_show">
        <div class="weui-msg">
            <div class="weui-msg__text-area">
                <h2 class="weui-msg__title">Register(註冊)</h2>
            </div>
            <div class="weui-msg__opr-area weui-article">
                <div class="weui-cells">
                    <div class="weui-cell">
                        <div class="weui-cell__bd">
                            <input class="weui-input" type="email" id="email" placeholder="Email(郵箱)">
                        </div>
                    </div>
                </div>
                <div class="weui-cells">
                    <div class="weui-cell">
                        <div class="weui-cell__bd">
                            <input type="hidden"  id="csrf-token" value="{{ csrf_token() }}">
                            <input class="weui-input" type="password" id="passwd" placeholder="password(密碼)">
                        </div>
                    </div>
                </div>
                <p class="weui-btn-area">
                    <a href="javascript:;" class="weui-btn weui-btn_primary">Return(確認)</a>
                </p>
                <p>
                    <a href="{{url('/mobile/login')}}" class="login">老客戶，前往登陸</a>
                </p>
            </div>

        </div>
    </div>
@stop
@section('script')
<script>

    $(".weui-btn_primary").click(function(event){

        var email = $("#email").val();
        var passwd = $("#passwd").val();
        var csrftoken = $("#csrf-token").val();

        isemail = emailCheck(email);

        if (csrftoken == '') {
            alert1('請刷新后訪問','')
        }else if (email == '') {
            alert1('郵箱不能為空','');
        }else if (passwd == ''){
            alert1('密碼不能為空','');
        }else if (isemail == false){
            alert1('請輸入正確的郵箱','');
        }else{
            $.post("/api/reg", { email: email, passwd: passwd , '_token':csrftoken},function(data){
                if (data.status == 1) {
                    window.location.href = '/mobile/member'
                }else{
                    alert1(data.msg,'');
                }
            },'json');
        }

    });


</script>
@stop