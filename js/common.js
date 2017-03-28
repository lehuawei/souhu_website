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
       //点击账户充值m没有登录直接进入登录注册页面部分
       $(".acc_reg_log .acc_con ul li ").on("click","span",function () {
           var index_rl=$(this).parent().index();
           $(this).parent().addClass("txt_sty").siblings().removeClass("txt_sty");
           $(".div_rl ").eq(index_rl).css("display","block").siblings(".div_rl").hide();
       });
       //点击选框改变图片
       $(".check_img").click(function () {
           var flag=(this.getAttribute("src")=="images/register_Page/checkbox_no.png");
           this.src=flag?"images/register_Page/icon-dagou.png":"images/register_Page/checkbox_no.png";
       });
       //点击注册
     $(".cli_zhuce").click(function () {
        $(".div_rl ").eq(1).css("display","block").siblings(".div_rl").css("display","none");
         $(".acc_reg_log .acc_con ul li").eq(1).addClass("txt_sty").siblings().removeClass("txt_sty");
     });
      //前往登录
    $(".has_log").click(function (){
        $(".div_rl ").eq(0).css("display","block").siblings(".div_rl").css("display","none");
        $(".acc_reg_log .acc_con ul li").eq(0).addClass("txt_sty").siblings().removeClass("txt_sty");
    });

    //点击登录注册按钮进入登录注册部分
    $("header .nav_span .log").click(function(e){
        if(!$(this).hasClass("org")){
            $(this).addClass("org").siblings().removeClass("org");
        }
        var url=$(this).children().attr("title");
        window.location.replace(url);
        $(this).addClass("org").siblings().removeClass("org");
    });
    $("header .nav_span .reg").click(function(e){
        if(!$(this).hasClass("org")){
            $(this).addClass("org").siblings().removeClass("org");
        }
        var url=$(this).children().attr("title");
        window.location.replace(url);
    });
    //忘记密码？
    $(".fgt_pass a").click(function () {
        $(".acc_con ul").empty();
        var add_li=$("<li class=' txt_sty' style='margin-left: 0'><span>找回密码</span></li>");
        $(".acc_con ul").append(add_li);
        $(".div_log_none").css("display","none");
        $(".div_fgt").css({"display":"block","margin-top":"20px"});
    });

    //个人中心部分
    //个人中心选项卡效果
    $(".user_ul li").click(function () {
        if(!$(this).hasClass("active_t")){
            $(this).addClass("active_t").siblings().removeClass("active_t");
        }
        var index=$(this).index();
        $(".user_ul_div").eq(index).show().siblings('.user_ul_div').hide();
    });
    //点击编辑资料
    var input_edit=$(".table_two input")
    input_edit.focus(function () {
        $(this).select();
    });
    $(".edit_datum").click(function(){
        console.log($(input_edit).attr("disabled"))
        input_edit.removeAttr("disabled");
    });
    //点击个人中心保存
    $(".user_info button.save").click(function () {
        console.log($(input_edit).attr("disabled"))
        input_edit.attr("disabled",'disabled');
    });
    //按钮 取消和保存
    $(".btn_div button").click(function () {
        input_edit.attr("disabled",'disabled');
        if(!$(this).hasClass("save")){
            $(this).addClass("save").siblings().removeClass("save").addClass("cancel");
        }
    });

    //产品管理
    //游戏选项卡效果
    $(".game_ul li").click(function () {
        if(!$(this).hasClass("active_g")){
            $(this).addClass("active_g").siblings().removeClass("active_g");
        }
        var index=$(this).index();
        $(".pro_Man .game").eq(index).show().siblings('.game').hide();
    });
    //账户安全 点击图片
    $(".secret_ul li img").click(function (e) {
        var sel="-selected";
        var img_src=$(this).attr("src");
        var c=img_src.replace(".png","");
        var d=c+sel+".png";
        if(img_src.indexOf(sel)<0){
            $(this).attr("src",d);
        }else{
            var e=img_src.replace(sel,"");
            $(this).attr("src",e);
        }
    });
    //付款方式
    $(".payway_ul li").click(function () {
        $(this).addClass("active_p").siblings("li").removeClass("active_p");
    });
     //充值明细选择框
    var opt='';
    for(var i=2;i<5;i++){
        opt+="<option value=" + i + "> " + i + "</option>";
    }
    $("#mouth").append(opt);

    //修改密码
    $('.btn_se button').click(function (){
        if(!$(this).hasClass("sure")){
            $(this).addClass("sure").siblings().removeClass("sure").addClass("edit");
        }
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

        /*遮罩方法二*/
        $(this).css({"opacity":"0.9"});
        $(this).children().fadeIn("slow");
    });
    $(".pic_in").mouseleave(function(){
        //changeDiv();
        $(this).css({"opacity":"0"});
        $(this).children().hide();
    });



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
    //点击设置图标会显示对应的弹出框div
    $(".set_icon").click(function () {
        if ($(".angle").is(":hidden")) {
            $(".angle").show();
        } else if($(".angle").is(":visible")){
            $(".angle").hide();
        }

    });
    //进入直播页面
    $(" .live").click(function(){
        var detail_url=$(this).attr("title");
        window.open(detail_url);
    });

    //请求用户的登录信息
    var data = {};
    data.action = "getUserInfo";
    $.post(url,data,function(result){
        var obj = JSON.parse(result);
        var code =parseInt(obj.CODE);
        if(code != 0){
            //失败
            //alert(obj.DATA.ERRMSG);

        }
        else{
            //成功
            var data = obj.DATA.RESULT;
            $(".yhm").html(data.nickName);
            $(".reg").css("display","none");
            $(".log").css("display","none");
            $("header .add_icon").css("display","inline");

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
     //账户管理部分
    //点击添加账户
    $(".add_img").click(function () {
        $(".pop_cho").css("display","block");
        $(".opacity_color").css("display",'block');
        var h=$(document.body).height()+"px";
        $(".opacity_color").css("height",'h');
    });
    //点击关闭
    $(".close").click(function(){
        $(this).parent().css("display","none");
        $(".opacity_color").css("display",'none');
    });
    //点击选择账户部分
    $(".person_ul li").click(function () {
        var add_img=$('<img class="che_img" src="images/recharge_Manage/has_che.png" alt="" value="1" >');
        var has_img=$(this).find(".che_img").length;
        var img_li_index=$(this).index();
        if(has_img==1){
           $(".person_ul li").eq(img_li_index).children('.che_img').remove();
        }
        if(has_img==0){
            $(this).append(add_img);
        }
    });

    //点击不同充值金额
    $(".clearfix_ul .active_li").click(function () {
        if(!$(this).hasClass("active_m")){
            $(this).addClass("active_m").siblings().removeClass("active_m");
        }
        $(".user_sel").removeClass("active_sel");
        var rmb=$(this).children(".money").attr("value");
        $(".pay_money em").html(rmb);
    });
    //点击自行输入充值金额
    $(".user_sel .sou_coin_input").focus(function () {
        $(".sou_coin_input").val("");
        $(".user_sel").addClass("active_sel");
        $(".clearfix_ul li").removeClass("active_m");
    });
    $(".user_sel .sou_coin_input").blur(function () {
        var user_coin=$(".sou_coin_input").val();
        $(".sou_coin_input").val(user_coin+'搜币');
        result_money=user_coin*0.01;
        $(".user_sel .money_input").val(result_money+'元');
        $(".pay_money em").html(result_money);
    });
    //点击选择不同的支付方式
    $(".pay_img ul li").on("click",function () {
        $(this).addClass('active');
        $(this).siblings().removeClass("active");
    });
     //获取屏幕宽度
    var screenWidth=$(document.body).outerWidth(true);
    if(screenWidth<1280){
        $("footer .foot .foot1 .contact").css("width","60%");
        $(".clearfix_ul").css("width","70%");
    }
    //如果是ie
     if ((navigator.userAgent.indexOf('MSIE') >= 0) && (navigator.userAgent.indexOf('Opera') < 0)){
        $("*").css("font-family","微软雅黑");
        $(".bs").css("background-color","white");
        $(".cont5_one .pic_in").css("opacity","0");
        $("header .nav_span .angle").css("right","-28px")
    }
});
