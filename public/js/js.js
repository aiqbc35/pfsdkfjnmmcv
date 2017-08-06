$("div").ajaxStart(function(){
    var loading = layer.load(1, {
        shade: [0.1,'#fff'] //0.1透明度的白色背景
    });
});
$("div").ajaxStop(function(){
    layer.close(loading);
});

function getTop(image,data)
{
    $(".top-one-image").attr('src',image + data[0].image);
    $(".top-one-title").text(data[0].name).attr('href','/view?id=' + data[0].id);
    $(".top-one-click").text(data[0].hit);
    $(".top-one-link").attr('href','/view?id=' + data[0].id);

    $(".top-two-image").attr('src',image + data[1].image);
    $(".top-two-title").text(data[1].name).attr('href','/view?id=' + data[1].id);
    $(".top-two-click").text(data[1].hit);
    $(".top-two-link").attr('href','/view?id=' + data[1].id);

    $(".top-three-image").attr('src',image + data[2].image);
    $(".top-three-title").text(data[2].name).attr('href','/view?id=' + data[2].id);
    $(".top-three-click").text(data[2].hit);
    $(".top-three-link").attr('href','/view?id=' + data[2].id);
}

function getPravite(image,data) {
    var _html = '';
    $.each(data, function(i, item){
        _html += '<div class="col-md-3 col-sm-3 col-xs-12"><div class="post-details"> <div class="overlay-inner-image"> <img src="' + image + item.image +'" alt=""/> <a href="/view?id=' + item.id +'" class="inner-image-overlay"></a> <div class="watch-icon" data-toggle="tooltip" title="Watch Later" > <a href="/view?id=' + item.id +'"  ><i class="fa fa-clock-o" aria-hidden="true"></i></a> </div> </div> <div class="image-content background-color-white"><h3><a href="/view?id=' + item.id +'">' + item.name + '</a></h3><p>VIEW<i class="fa fa-check-circle-o trending-post">' + item.hit + '</i></p></div></div></div>';
    });
    return _html;
}

function listPage (data,imageLink)
{
    var _html = '';
    $.each(data,function (i,item) {
        _html += '<li class="col-md-3 col-sm-3 col-xs-12"> <div class="post-details"> <div class="overlay-inner-image"> <a href="/view?id=' + item.id + '"><img src="'  + imageLink + item.image + '" alt=""/></a> </div> <div class="image-content background-color-white"> <h3><a href="/view?id=' + item.id + '">' + item.name.substring(0,12) + '</a></h3> <p>' +item.hit+ ' View</p> </div> </div> </li>';
    });
    return _html;
}

function pageStyle($total,limit,page,linkPath)
{
    var totalPage = Math.ceil($total / limit) - 1;
    page = parseInt(page);

    $(".previous a").attr('href',linkPath + (page - 1));
    $(".next a").attr('href',linkPath + (page + 1));

    if (page == 0) {
        $(".previous").addClass('disabled').find('a').attr('href','#');
    }
    if (page == totalPage) {
        $(".next").addClass('disabled').find('a').attr('href','#');
    }

    if (page < 0 || page > totalPage) {
        window.history.go(-1);
    }

}

function alertLink (text,link)
{
    layer.alert(text, {
        skin: 'layui-layer-molv'
        ,closeBtn: 0,
    }, function(){
        window.location.href = link;
    });
}

function alertError (text)
{
    layer.alert(text, {
        skin: 'layui-layer-molv',
        title:'ERROR'
        ,closeBtn: 0,
        btn:'Back'
    }, function(){
        window.location.href = '/';
    });
}

function alert1 (text){
    layer.alert(text, {
        skin: 'layui-layer-molv' //样式类名
        ,closeBtn: 0,
        btn:'确认'
    });
}

function emailCheck (email)
{
    var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
    if (!myreg.test(email)) {
        return false;
    }else{
        return true;
    }
}
function GetRequest() {
    var url = location.search; //获取url中"?"符后的字串
    var theRequest = new Object();
    if (url.indexOf("?") != -1) {
        var str = url.substr(1);
        strs = str.split("&");
        for(var i = 0; i < strs.length; i ++) {
            theRequest[strs[i].split("=")[0]]=unescape(strs[i].split("=")[1]);
        }
    }

    return theRequest;
}
/**
 * 和PHP一样的时间戳格式化函数
 * @param  {string} format    格式
 * @param  {int}    timestamp 要格式化的时间 默认为当前时间
 * date('Y-m-d','1350052653');//很方便的将时间戳转换成了2012-10-11
 * date('Y-m-d H:i:s','1350052653');//得到的结果是2012-10-12 22:37:33
 * @return {string}           格式化的时间字符串
 */
function getLocalTime(format, timestamp){
    var a, jsdate=((timestamp) ? new Date(timestamp*1000) : new Date());
    var pad = function(n, c){
        if((n = n + "").length < c){
            return new Array(++c - n.length).join("0") + n;
        } else {
            return n;
        }
    };
    var txt_weekdays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    var txt_ordin = {1:"st", 2:"nd", 3:"rd", 21:"st", 22:"nd", 23:"rd", 31:"st"};
    var txt_months = ["", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var f = {
        // Day
        d: function(){return pad(f.j(), 2)},
        D: function(){return f.l().substr(0,3)},
        j: function(){return jsdate.getDate()},
        l: function(){return txt_weekdays[f.w()]},
        N: function(){return f.w() + 1},
        S: function(){return txt_ordin[f.j()] ? txt_ordin[f.j()] : 'th'},
        w: function(){return jsdate.getDay()},
        z: function(){return (jsdate - new Date(jsdate.getFullYear() + "/1/1")) / 864e5 >> 0},

        // Week
        W: function(){
            var a = f.z(), b = 364 + f.L() - a;
            var nd2, nd = (new Date(jsdate.getFullYear() + "/1/1").getDay() || 7) - 1;
            if(b <= 2 && ((jsdate.getDay() || 7) - 1) <= 2 - b){
                return 1;
            } else{
                if(a <= 2 && nd >= 4 && a >= (6 - nd)){
                    nd2 = new Date(jsdate.getFullYear() - 1 + "/12/31");
                    return date("W", Math.round(nd2.getTime()/1000));
                } else{
                    return (1 + (nd <= 3 ? ((a + nd) / 7) : (a - (7 - nd)) / 7) >> 0);
                }
            }
        },

        // Month
        F: function(){return txt_months[f.n()]},
        m: function(){return pad(f.n(), 2)},
        M: function(){return f.F().substr(0,3)},
        n: function(){return jsdate.getMonth() + 1},
        t: function(){
            var n;
            if( (n = jsdate.getMonth() + 1) == 2 ){
                return 28 + f.L();
            } else{
                if( n & 1 && n < 8 || !(n & 1) && n > 7 ){
                    return 31;
                } else{
                    return 30;
                }
            }
        },

        // Year
        L: function(){var y = f.Y();return (!(y & 3) && (y % 1e2 || !(y % 4e2))) ? 1 : 0},
        //o not supported yet
        Y: function(){return jsdate.getFullYear()},
        y: function(){return (jsdate.getFullYear() + "").slice(2)},

        // Time
        a: function(){return jsdate.getHours() > 11 ? "pm" : "am"},
        A: function(){return f.a().toUpperCase()},
        B: function(){
            // peter paul koch:
            var off = (jsdate.getTimezoneOffset() + 60)*60;
            var theSeconds = (jsdate.getHours() * 3600) + (jsdate.getMinutes() * 60) + jsdate.getSeconds() + off;
            var beat = Math.floor(theSeconds/86.4);
            if (beat > 1000) beat -= 1000;
            if (beat < 0) beat += 1000;
            if ((String(beat)).length == 1) beat = "00"+beat;
            if ((String(beat)).length == 2) beat = "0"+beat;
            return beat;
        },
        g: function(){return jsdate.getHours() % 12 || 12},
        G: function(){return jsdate.getHours()},
        h: function(){return pad(f.g(), 2)},
        H: function(){return pad(jsdate.getHours(), 2)},
        i: function(){return pad(jsdate.getMinutes(), 2)},
        s: function(){return pad(jsdate.getSeconds(), 2)},
        //u not supported yet

        // Timezone
        //e not supported yet
        //I not supported yet
        O: function(){
            var t = pad(Math.abs(jsdate.getTimezoneOffset()/60*100), 4);
            if (jsdate.getTimezoneOffset() > 0) t = "-" + t; else t = "+" + t;
            return t;
        },
        P: function(){var O = f.O();return (O.substr(0, 3) + ":" + O.substr(3, 2))},
        //T not supported yet
        //Z not supported yet

        // Full Date/Time
        c: function(){return f.Y() + "-" + f.m() + "-" + f.d() + "T" + f.h() + ":" + f.i() + ":" + f.s() + f.P()},
        //r not supported yet
        U: function(){return Math.round(jsdate.getTime()/1000)}
    };

    return format.replace(/[\\]?([a-zA-Z])/g, function(t, s){
        if( t!=s ){
            // escaped
            ret = s;
        } else if( f[s] ){
            // a date function exists
            ret = f[s]();
        } else{
            // nothing special
            ret = s;
        }
        return ret;
    });

}