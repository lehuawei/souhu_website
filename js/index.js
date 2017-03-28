$(function(){
    $('#fullpage').fullpage({
        navigation: true,
        navigationPosition:"left",
        loopBottom:false,
        anchors:['slider','ad','live','example','team'],
        //滚动到某一屏后的回调函数，接收 anchorLink 和 index 两个参数
        // anchorLink 是锚链接的名称，index 是序号，从1开始计算
        afterLoad:function (anchorLink,index) {
             if(index==2){
                 $(".cont2 .core_good").css({"transform":"translate3d(0,-19.6%,0)","-webkit-transform":"translate3d(0,-19.6%,0)","opacity":1});
                 $(".cont2 .move_ad").css({"transform":"translate3d(0,-1%,0)","-webkit-transform":"translate3d(0,-1%,0)","opacity":1});
                 $('.long-bg').css({'opacity':'0.7'});
             }
            /*if(index==3){
                $(".cont3 .four_adv").css({"transform":"translate3d(0,0,0)","-webkit-transform":"translate3d(0,0,0)","opacity":1});
                $(".cont3 .game_work").css({"transform":"translate3d(86px,0,0)","-webkit-transform":"translate3d(86px,0,0)","opacity":1});
                $('.white_bg').css({'opacity':'0.8'});
                if ((navigator.userAgent.indexOf('MSIE') >= 0) && (navigator.userAgent.indexOf('Opera') < 0)){
                    $(".cont3 .game_work").css("margin-right","-80px");
                }
            }*/
            if(index==3){
                $(".cont4 .four_function").css({"transform":"translate3d(0,0,0)","-webkit-transform":"translate3d(0,0,0)","opacity":1});
                $(".cont4 .live_plat").css({"transform":"translate3d(80px,0,0)","-webkit-transform":"translate3d(80px,0,0)","opacity":1});
                $('.cont4 .orange_bg').css({'opacity':'0.8'});
                if ((navigator.userAgent.indexOf('MSIE') >= 0) && (navigator.userAgent.indexOf('Opera') < 0)){
                    $(".cont4 .live_plat").css("margin-left","80px");
                }
            }
            if(index==5){
               $(".section6 .team_pro .text").css({"transform":"translate3d(0,0,0)","-webkit-transform":"translate3d(0,0,0)"});
            }
            },
        //滚动前的回调函数，接收 index、nextIndex 和 direction 3个参数
        // direction 判断往上滚动还是往下滚动，值是 up 或 down
        onLeave:function (index,direction) {
            if(index==2){
                $(".cont2 .core_good").css({"transform":"translate3d(0,100px,0)","-webkit-transform":"translate3d(0,100px,0)","opacity":0});
                $(".cont2 .move_ad").css({"transform":"translate3d(0,100px,0)","-webkit-transform":"translate3d(0,100px,0)","opacity":0});
                $('.long-bg').css({'opacity':'0'});
            }
           /* if(index==3){
                $(".cont3 .four_adv").css({"transform":"translate3d(-200px,0,0)","-webkit-transform":"translate3d(-200px,0,0)","opacity":0});
                $(".cont3 .game_work").css({"transform":"translate3d(114px,0,0)","-webkit-transform":"translate3d(114px,0,0)","opacity":0});
                $('.white_bg').css({'opacity':'0'});
            }*/
            if(index==4){
                $(".cont4 .four_function").css({"transform":"translate3d(200px,0,0)","-webkit-transform":"translate3d(200px,0,0)","opacity":0});
                $(".cont4 .live_plat").css({"transform":"translate3d(-100px,0,0)","-webkit-transform":"translate3d(-100px,0,0)","opacity":0});
                $('.cont4 .orange_bg').css({'opacity':'0'});
            }
            if(index==5){
                $(".section6 .team_pro .text").css({"transform":"translate3d(0,120,0)","-webkit-transform":"translate3d(0,120px,0)"});
            }
        }
        });
});

