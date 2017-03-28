$(function () {
        //点击logo进入首页
       $(".logo").click(function(){
           window.location.replace("index.html");
       });
       //顶部导航点击效果
        $("header .nav_span .nav_a a").bind("click",function(event){
            var url=$(this).attr("title");
            window.location.replace(url);
        });
       //登录注册
        $(".log").click(function(){
            if(!$(this).hasClass("org")){
                $(this).addClass("org").siblings().removeClass("org");
            }
           $(".register").css("display","none");
           $(".login").css("display","block");
           //跳转指定位置
            var scroll_offset = $("#denglu").offset();  //得到pos这个div层的offset，包含两个值，top和left
            /*var index = $(this).parent().index();*/
           // scrollPage($('.fp-section').eq(0));
        });
        $(".reg").click(function(){
            if(!$(this).hasClass("org")){
                $(this).addClass("org").siblings().removeClass("org");
            }
            $(".login").css("display","none");
            $(".register").css("display","block");

        });
        //已有账号点击
        $(".has_acc").click(function(){
            $(".register").css("display","none");
            $(".login").css("display","block");
            $(".reg").removeClass("org");
            $(".log").addClass("org");
        });
       //点击关闭
        $(".close").click(function(){
            $(this).parent().css("display","none");
            $(".log").removeClass("org");
            $(".reg").removeClass("org");
        });
    //点击设置图标会显示对应的弹出框div
    $(".set_icon").click(function () {
        if ($(".angle").is(":hidden")) {
            $(".angle").show();
        } else if($(".angle").is(":visible")){
            $(".angle").hide();
        }

    });
    /*console.log(top);
    console.log(left);*/
    /*$(".angle").css("top", top);
    $(".angle").css("left", left);*/
    //点击账户安全
    $(".person_safe").click(function(){
        $(".change_pass").css("display","block");
    });

    //给项目导航添加类名
        $("#fp-nav ul").each(function(){
            $(this).find("li").each(function(i){
                $(this).addClass("ajx" + (i+1));
            });
        });

    //首页 图片轮播
    //除了第一张图片 其他图片都隐藏
    $(".banner_pic li:gt(0)").hide();
    //定义变量表示图片的数量
    var all=3;
    //定义变量  表示第0张图片
    var num=0;
    var time_banner=null;
    //设置自动播放函数
    function bannerPlay(){
        time_banner=setInterval(function(){
            move_banner();
        },3600);//5s启动一次定时器 调用move_banner函数
    }
    //调用自动播放函数
    bannerPlay();
    //move_banner()函数
    function move_banner(){
        //切换图片
        if(num==all-1){
            num=-1;
        }
        $(".banner_pic li").eq(num+1).fadeIn("slow").siblings("li").fadeOut("slow");
        num++;
    }

    //第二屏圆圈hover效果
    $(".core_good .good_text :gt(0)").hide();
    $(".circle_ul").on("mouseover","li",function(){
       $(this).addClass("orange").siblings("li").removeClass("orange") ;
        var index=$(this).index();
        $(".core_good .good_text").eq(index).show().siblings().hide();
    });
    //第二屏点击查看详情进入三毛广告平台页面
    $(".move_ad .sm").click(function(){
        window.open("http://192.168.1.89:81/sm_AdCenter/index.html");
    });
    //第三屏圆圈hover效果
    $(".four_adv .good_text :gt(0)").hide();
    $(".circle_ul").on("mouseover","li",function(){
        $(this).addClass("orange").siblings("li").removeClass("orange") ;
        var index=$(this).index();
        $(".four_adv .good_text").eq(index).show().siblings().hide();
    });

    //第四屏圆圈hover效果
    $(".four_function .good_text :gt(0)").hide();
    $(".circle_ul").on("mouseover","li",function(){
        $(this).addClass("orange").siblings("li").removeClass("orange") ;
        var index=$(this).index();
        $(".four_function .good_text").eq(index).show().siblings().hide();
    });

    //第五屏图片hover效果
    $(".cont5_one .pic_in").children().hide();

    $(" .pic_in").mouseenter(function(){
        /*遮罩方法一：给父亲根元素设置背景颜色 hover的时候就改变当前子元素的透明度  但是效果与预期效果不一样*/
        /*$(this).children().fadeIn("slow");
        $(this).css({"opacity":"0.16"});
        $(this).siblings(":not(.cc)").children().fadeOut("fast");
        $(this).siblings().css({"opacity":"1"});*/
        //鼠标移入的时候就停止计时器
        //clearInterval(timer);
        /*遮罩方法二*/
        $(this).css({"opacity":"0.9"});
        $(this).children().fadeIn("slow");
    });
    $(".pic_in").mouseleave(function(){
        //changeDiv();
        $(this).css({"opacity":"0"});
        $(this).children().hide();
    });

    //第五屏圆点点击效果  暂时去掉
    /*$(".cont5_one ul li img").click(function(event){
       $(this).parent().parent().parent().fadeOut().siblings().fadeIn();
    });
*/
    //定时器方法暂时注释掉
    /*$(".cont5_one :gt(0)").hide();
    var number=0;
    var timer=null;
    function changeDiv() {
        timer=setInterval(function () {
           //3s就换一次图 函数
            changePic();
        },3600);
    }
    changeDiv();
    function changePic() {
        if(number==1){
            number=-1;
        }
         $(".cont5_one").eq(number).hide().siblings().show();
         number++;

    }*/

   //案例页面 点击选项卡效果
    $(".black_bar ul").on("click","li",function(){
        $(this).addClass("orange").siblings().removeClass("orange");
        var index=$(this).index();
        index=index/2;
        $(".yd_ad").eq(index).show().siblings().hide();
        if(index==0){
            $(".black_bar ul .img1").hide();
            $(".black_bar ul .img2").show();
            $(".black_bar ul .img3").show();
        }
        if(index==1){
            $(".black_bar ul .img1").hide();
            $(".black_bar ul .img2").hide();
            $(".black_bar ul .img3").show();
        }
        if(index==2){

            $(".black_bar ul .img1").show();
            $(".black_bar ul .img2").hide();
            $(".black_bar ul .img3").hide();
        }
        if(index==3){
            $(".black_bar ul .img1").show();
            $(".black_bar ul .img2").show();
            $(".black_bar ul .img3").hide();
        }
    });
    //团队介绍hover效果 暂时注释掉
    /* $(".img_person .portrait").hover(function(){
         $(this).children(".img_person .portrait .name").hide();
         $(this).siblings().children(".img_person .portrait .name").show();
         var index=$(this).attr("title");
         $(".fade .up").eq(index).css("display","block").parent().siblings().children(".up").hide();
     });*/

    //加入我们 招聘效果
    $(".android_ul li").click(function(){
        var sort=$(this).attr("title");
        if($(".post_detail").eq(sort).is(":hidden")){
            $(".post_detail").eq(sort).show();

        }
        else if($(".post_detail").eq(sort).is(":visible")){
            $(".post_detail").eq(sort).hide();

        }
    });

     //首页第五屏 案例 进入天天酷跑案例详情页面 暂时没有该业务注释掉
    /*  $(" .kupao").click(function(){
          var detail_url=$(this).attr("title");
          window.open(detail_url);
      });*/
    //进入直播页面
    $(" .live").click(function(){
        var detail_url=$(this).attr("title");
        window.open(detail_url);
    })
    //案例页面点击进入案例详情页面
   /* $(".yd_ad .line_one img").click(function(){
        var detail_url=$(this).attr("title");
        window.open(detail_url);
    });*/

    //请求用户的登录信息
    var data = {};
    data.action = "getUserInfo";
    $.post(url,data,function(result){
        var obj = JSON.parse(result);
        var code =parseInt(obj.CODE);
        if(code != 0){
            //失败
            //alert(obj.DATA.ERRMSG);
            /* $(".form_two")[0].reset();
             $(".form_three")[0].reset();*/
        }
        else{
            //成功
            var data = obj.DATA.RESULT;
            $(".yhm").html(data.nickName);
            $(".reg").css("display","none");
            $(".log").css("display","none");
            $("header .add_icon").css("display","inline");
           /* $(".form_three")[0].reset();*/
        }
    });

    //弹出框 退出
    $(".back").click(function(){
        var data={};
        data.action="logout";
        $.post(url,data,function(result){
            var obj=JSON.parse(result);
            var code=parseInt(obj.CODE);
            if(code!=0){
                //失败
            }else{
                 $(".reg").css("display","inline-block").removeClass("org");
                 $(".log").css("display","inline-block").removeClass("org");
                 $("header .add_icon").css("display","none");
                 $(".angle").css("display","none");
                 $(".change_pass").css("display","none");
            }
        });
    });

    //如果是ie
    if ((navigator.userAgent.indexOf('MSIE') >= 0) && (navigator.userAgent.indexOf('Opera') < 0)){
        $("*").css("font-family","微软雅黑");
        $(".bs").css("background-color","white");
        $(".cont5_one .pic_in").css("opacity","0");
        $("header .nav_span .angle").css("right","-28px")
    }

});

