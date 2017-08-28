@extends('Common.home')
@section('css')
.admin-information{
    bottom:101px;
}
.feature-image .image-content{width:100%;}
.image-content.img-holder-content.background-color-white.pull-left.vipfont p {
font-size: 16px;
color: red;
}
.radio label, .checkbox label{color:#000;}
radio{line-height:2rem;}
.radio, .checkbox{margin-top:-5px !important;margin-bottom:10px !important;}
.radio label, .checkbox label{padding-left:8px;}
@stop
@section('content')
    <div class="channel-banner background-color-gray padding-top-50 padding-bottom-80">
        <div class="container">
            <div class="banner-image-container banner-img">
                <img src="http://storage1.imgchr.com/V2TIK.jpg" alt="" />
                <div class="slider-over-opacity"></div>
                <div class="admin-information clearfix">
                    <div class="admin-image">
                        <a href=""><img src="http://storage1.imgchr.com/V2hrR.png" alt="img description" width="192" height="193"/></a>
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
    <div class="staff-picked-posts padding-top-20 padding-bottom-60">
        <div class="container">
            <div class="tab-content">

                <div class="slide tab-pane active" id="r">
                    <div class="small-title">
                        <h2>升级VIP</h2>

                    </div>
                    <div class="feature-image features-post vipremo">

                        <div class="col-md-6">
                            <div class="post-details clearfix">

                                <div class="image-content img-holder-content background-color-white">
                                    <div class="form-group">
                                        <input type="hidden"  id="csrf-token" value="{{ csrf_token() }}">
                                        <input type="text" id="code" class="form-control" placeholder="請輸入激活碼升級VIP">
                                    </div>
                                    <div class="form-group">

                                        <input type="button" class="lp-secondary-btn width-full btn-first-hover" id="putCode" value="提交">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="feature-image features-post  padding-bottom-40">

                        <div class="col-md-6">
                            <div class="post-details clearfix">

                                <div class="image-content img-holder-content background-color-white pull-left vipfont" style="padding-bottom: 50px;">
                                    <p>VIP會員權益：</p>
                                    <p>1、享受會員專享高速服務器，看片更清晰更流暢！</p>
                                    <p>2、優質片源每天新增！</p>
                                    <p>3、不定期發送1080P高清片源至會員郵箱！</p>
                                    <p>4、優先體驗公司最新服務！</p>
                                    <p>5、<strong style="color: #4876FF">勁爆體驗價1天：18元或2美金，1個月：28元或5美金，一季度：58元或9美金，全年98元或15美金。暑期活動價：10美金或70元人民幣/年（截止：2017-09-15）！</strong></p>
                                    <div style="margin-top: 29px;">
                                        {{--<a class="lp-secondary-btn width-full btn-first-hover" href="http://www.yunfaka.com/product/4C3905FD3614ABD3" target="_blank">--}}
                                            {{--購買激活碼--}}
                                        {{--</a>--}}
                                        <a href="javascript:;" class="lp-secondary-btn width-full btn-first-hover" data-toggle="modal" data-target="#myModal">購買激活碼</a>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- /#myCarousel -->

            </div>

        </div>


    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">購買激活碼</h4>
                </div>
                <div class="modal-body">
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="18">
                            1天（劲爆体验价:18元)。
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="28">
                            1月（28元）
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="58">
                            1季度（58元）
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="78" checked>
                            1年（原价98/活动价70，活动截止：2017-09-15）
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary">购买</button>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
<script type="text/javascript">

    var getUrlType = GetRequest();
    var pagetype = getUrlType.type;


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
                    $(".vipremo").remove();
                    $(".btn-first-hover").remove();
                }else{
                    $(".isVip").text('普通会员');
                }

        },'json');

        if (pagetype == 'btn') {
            $("#myModal").modal('show');
        }

        $(".btn-primary").click(function(event){
            var val=$('input:radio[name="optionsRadios"]:checked').val();
            var shopurl = '';
            switch (val){
                case '18':
                    shopurl = shopurl18;
                    break;
                case '28':
                    shopurl = shopurl28;
                    break;
                case '58':
                    shopurl = shopurl58;
                    break;
                case '78':
                    shopurl = shopurl78;
                    break;
            }

            console.log(shopurl);
        });

    }
    $("#putCode").click(function(event){
        var code = $("#code").val();
        var token = $("#csrf-token").val();

        if (token == '') {
            alert1('請刷新頁面后再操作')
        }else if (code == '') {
            alert1('請輸入驗證碼！')
        }else{
            $.post("/api/actcode", { code: code, '_token': token },function(data){
                if (data.status == 1) {
                    window.location.reload();
                }
                alert1(data.msg);
            },'json');
        }
    });
</script>
@stop