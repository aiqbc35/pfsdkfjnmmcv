@extends('Common.home')
@section('linkcss')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')
    <div class="page-title-banner">
        <div class="container clearfix">
            <div class="pull-left page-category-title">
                <h1>Login</h1>
                <p>Please Login Here</p>

            </div>
            <div class="module-title pull-right">
                <ul  class="page-breadcram">

                    <li><a href="/">Home</a></li>
                    <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                    <li><a href="{{url('login')}}">Login</a></li>

                </ul>
            </div>
        </div>
    </div>


    <div class="login-page-connent clearfix padding-bottom-70 padding-top-70 background-color-gray">
        <div class="login-page">
            <div class="col-md-5 col-sm-5 col-xs-12 aligncenter">
                <div class="popup-inner">

                    <div class="popup-content2 popup-fix login-register-content login-1">
                        <h1 class="forgot-pass">User Login</h1>

                        <form method="post" class="real-login-officer">
                            <div class="form-group login-username">

                                <input type="text"  class="form-control" id="loginusername" placeholder="Email(请输入邮箱)" />
                            </div>
                            <div class="form-group login-password">

                                <input type="password"  class="form-control" id="loginpwd" placeholder="Password(请输入密码)" />
                            </div>
                            <div class="form-group">
                                <div class="pad-bottom-10">
                                    <input type="checkbox" value="price-on-call" name="price-on-call" id="check1">
                                    <label for="check1">Keep me signed in</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="button" class="lp-secondary-btn width-full btn-first-hover put-login" value="登陆">
                            </div>
                        </form>
                        <div class="bottom-links clearfix">
                            <a class="signUpClick">Not a member? Sign up(注册)</a>
                            {{--<a class="forgetPasswordClick pull-right">Forgot password</a>--}}
                        </div>

                    </div>
                    <div class="popup-content popup-fix login-register-content login-2">
                        <h1 class="forgot-pass">Sign Up</h1>

                        <form method="post" class="real-login-officer">
                            <div class="form-group login-username">

                                <input type="text" id="regusername" class="form-control" placeholder="Email(请输入邮箱)">
                            </div>
                            <div class="form-group login-password">

                                <input type="password" id="regpassword" class="form-control" placeholder="Email(请输入密码)">
                            </div>
                            {{--<div class="form-group">--}}
                                {{--<div class="pad-bottom-10">--}}

                                    {{--<label for="check1">A password will be e-mailed to you.</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group">
                                <input type="button" class="lp-secondary-btn width-full btn-first-hover put-reg" value="注册">
                            </div>
                        </form>
                        <div class="bottom-links clearfix">
                            <a class="signInClick">Already have an account? Sign in(登陆)</a>
                            {{--<a class="forgetPasswordClick pull-right">Forgot password</a>--}}
                        </div>
                    </div>
                    <div class="popup-content popup-fix login-register-content login-3">
                        <h1 class="forgot-pass">Forgotten Password</h1>
                        <form method="post" class="real-login-officer">
                            <div class="form-group login-emailaddress">

                                <input type="email" id="email2" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="lp-secondary-btn width-full btn-first-hover" value="Get New Password">
                            </div>
                        </form>
                        <div class="pop-form-bottom">
                            <div class="bottom-links">
                                <a class="cancelClick">Return to Sign in</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="js/logintriger.js"></script>
    <script type="text/javascript">
        var webpath = {{Request::getPathInfo() == '/register' ? 1 : 2}};
        var token = $('meta[name="csrf-token"]').attr('content');

        if (webpath == 1) {
            $('.login-1').css("display","none");
            $('.login-3').css("display","none");

            $('.login-2').css("display","block");
        }

        $(".put-reg").click(function(event){
            email = $("#regusername").val();
            passwd = $("#regpassword").val();

            if (emailCheck(email) == false) {
                alert1('请输入正确的邮箱格式');
                return;
            }

            if (passwd.length < 6) {
                alert1('密码最少为6位！');
                return;
            }

            $.post("/api/reg", { email: email, passwd: passwd,'_token':token },function(data){
                       if (data.status == 1) {
                           window.location.href = '/member/index';
                       }else{
                           alert1(data.msg);
                       }
             },'json');

        });

        $(".put-login").click(function(event){
            email = $("#loginusername").val();
            passwd = $("#loginpwd").val();

            if (emailCheck(email) == false) {
                alert1('请输入正确的邮箱格式');
                return;
            }

            if (passwd.length < 6) {
                alert1('密码最少为6位！');
                return;
            }
            $.post("/api/login", { email: email, passwd: passwd,'_token':token },function(data){
                if (data.status == 1) {
                           window.location.href = '/member/index';
                }else{
                    alert1(data.msg);
                }
            },'json');

        });
    </script>
@stop