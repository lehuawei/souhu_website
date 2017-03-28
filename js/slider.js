/*var arr=["images/homepage/homepage_banner2.jpg","images/homepage/homepage_banner1.jpg","images/homepage/homepage_banner3.jpg"];
var timer=0;*/
//设置定时器 改变timer的值 调用函数更改图片
/* setInterval(function(){
    changeImg(timer);
    if(timer==0){
        timer=1;
    }
    else if(timer==1){
        timer=2;
    }
    else if(timer=2){
        timer=0;
    }
},5000);
function changeImg(timer){
    var a=0;
    var img=$("#banner-img");
    if(timer==0){
       /!* $('.focusBox li img').eq(0).fadeOut();*!/
        $('.focusBox li img').eq(0).css("display","inline");
        $('.focusBox li img').eq(1).css("display","none");
        $('.focusBox li img').eq(2).css("display","none")
        timer=1;
        img.attr("src",arr[timer]);
    }
    else if(timer==1){
        $('.focusBox li img').eq(0).css("display","none");
        $('.focusBox li img').eq(1).css("display","inline");
        $('.focusBox li img').eq(2).css("display","none");
        timer=2;
        img.attr("src",arr[timer]);
    }
    else  if(timer==2) {
        $('.focusBox li img').eq(1).css("display","none");
        $('.focusBox li img').eq(0).css("display","none");
        $('.focusBox li img').eq(2).css("display","inline");
        timer=0;
        img.attr("src",arr[timer]);
    }*/
$(function () {

    //slider2
    //页面加载隐藏所有的li 除了第一个
    $('.banner_pic li:gt(0)').hide();
    var num=$('.circle span').length;
    //console.log(num);//4个圈圈
    var i_mun=0;
    var timer_banner=null;

//底下小图标点击切换
    $('.circle span').click(function(event){
        // $(this).css("background","url(images/homepage/rounddot_banner.png) no-repeat left bottom");
        // $(this).siblings('span').css("background","url(images/homepage/rounddot_banner.png) no-repeat left top");
        $(this).addClass('focusBox_one').siblings().removeClass("focusBox_one");
        //$(this).addClass('focusBox_one').siblings('span').removeClass('focusBox_one');
        var i_mun1=$('.circle span').index(this);
        $('.banner_pic li').eq(i_mun1).fadeIn('slow')
            .siblings('li').fadeOut('slow');

        i_mun=i_mun1;
    });

//自动播放函数
    function bannerMoveks(){
        timer_banner=setInterval(function(){
            move_banner();
        },4000)
    }
    bannerMoveks();//开始自动播放
    //鼠标移动到banner上时停止播放
    $('.slider').mouseover(function(){
        clearInterval(timer_banner);
    });

    //鼠标离开 banner 开启定时播放
    $('.slider').mouseout(function(){
        bannerMoveks();
    });
    function move_banner(){
        if(i_mun==num-1){
            i_mun=-1
        }
        //大图切换
        $('.banner_pic li').eq(i_mun+1).fadeIn('slow').siblings('li').fadeOut('slow');
        //小图切换
        $('.circle span').eq(i_mun+1).addClass('focusBox_one').siblings('span').removeClass('focusBox_one');

        i_mun++;

    }

});

//点击圆点时，进行切换
/*
$('.focusBox li').click(function(){
    index = $('.focusBox li').index(this);
    changeImg(index);
}).eq(0).trigger('click');*/
