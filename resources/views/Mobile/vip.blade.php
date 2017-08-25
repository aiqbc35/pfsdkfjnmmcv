@extends('Common.mobile')
@section('css')
    <style type="text/css">
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
        .page-home{
            padding: 0 5px;
            width: 100%;
            height: 4rem;
            font-size: 1.1rem !important;
            margin-top: 20px;
        }
        .weui-cell_select .weui-cell__bd:after{
            width: 0;
            height: 0;
            border-width: 0;
        }
        .page-home .weui-flex .weui-flex__item .placeholder{
            width: 90%;
            height: 2.5rem;
            border:1px solid #888;
            line-height: 2.5rem;
            text-align: center;
            background-color: #fff;
            display: block;
        }
        .page-home .weui-flex .weui-flex__item .placeholder select{
            width: 100%;
            font-size: 1.1rem;
            padding-left: 41%;
            height: 2.5rem;
        }
        .weui-flex__item a{
            color:#000;
        }
    </style>
@endsection
@section('content')
    <div class="page__hd">
        VIP LINE “ VIP ”
    </div>
    <div class="page__bd">
        <article class="public-video">
        </article>
        <div class="page-home">
            <div class="weui-flex">
                <div class="weui-flex__item">
                    <a class="placeholder uppage" href="#">
                        首页
                    </a>
                </div>
                <div class="weui-flex__item">
                    <div class="placeholder">
                        <select id="pageNum">
                        </select>
                    </div>
                </div>
                <div class="weui-flex__item">
                    <a class="placeholder nextpage" href="#">
                        下一页
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(function(){
            var getUrlType = GetRequest();
            var page = 0;
            if (getUrlType.page) {
                page = getUrlType.page;
            }
            $.get("/api/getVip", { limit: page,type:1 }, function(data){
                pageStyle(data.total,data.limit,page,'/mobile/public?page=');
                $(".public-video").html(getPublicHtml(data.list,data.image));
            },'json');

            $("#pageNum").change(function(event){
                id = $(this).val();
                window.location.href = '/mobile/public?page='+id;
            });


            function pageStyle(total,limit,page,link) {
                var totalPage = Math.ceil(total / limit) - 1;
                page = parseInt(page);

                var selected = function(stats,stop){
                    if (stats == stop) {
                        return 'selected';
                    }
                }

                if (page < 0 || page > totalPage) {
                    window.location.href = '/mobile/public';
                }

                $(".uppage").attr('href','/mobile/public?page='+ (page - 1)).text('上一页');
                $(".nextpage").attr('href','/mobile/public?page='+ (page + 1)).text('下一页');
                if (page == 0) {
                    $(".uppage").attr('href','javascript:;').text('首页');
                }
                if (page == totalPage) {
                    $(".nextpage").attr('href','javascript:;').text('末页');
                }

                var option = '<option value="0" '+ selected(0,page) +'>首页</option>';
                for (i = 1;i <= totalPage;i++){
                    option += '<option value="'+i+'" '+ selected(i,page) +'>'+i+'</option>'
                }

                $("#pageNum").html(option);
            }
        });
    </script>
@endsection