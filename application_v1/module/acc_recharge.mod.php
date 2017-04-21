<?php
if(!defined('ACCESS_KEY')){header("HTTP/1.1 404 Not Found");die;}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>账户充值</title>
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/acc_recharge.css">
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/index.css">
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/reg_log.css">
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/user_Center.css">
    <script src="<?php echo CDN_SERVER;?>js/jquery-1.9.1.js"></script>
    <script src="<?php echo CDN_SERVER;?>js/placeholderfriend.js"></script>
    <!--if it IE 8--><!--兼容h5-->
    <script src="<?php echo CDN_SERVER;?>js/respond.min.js"></script>
    <script src="<?php echo CDN_SERVER;?>js/html5shiv.min.js"></script>
    <!--end if -->
</head>
<body>
<!--顶部导航-->
<?php
require(APP_PATH.'common/header.com.php');

if(!empty($userInfo)){
    $userProdurceList = $currUser->userProdurce()->getUserProdurceList();
?>
<!--弹出框的背景-->
<div class="opacity_color"></div>
<!--微信支付弹出框-->
<div class="wePay_pop">
    <div class="close"><img src="<?php echo CDN_SERVER;?>images/recharge_Manage/icon-close.png" alt=""></div>
    <h2>微信扫一扫支付马上完成</h2>
    <p >交易金额 : <span class="account"> 100.00元</span></p>
    <p>交易号 : <span class="acc_num"> XZ201704191458401798</span></p>
    <img src="<?php echo CDN_SERVER;?>images/common/wePay.png" alt="">
    <h3>请使用微信扫描二维码以完成支付</h3>
</div>
<!--未选择账户提示框-->
<div class="selAcc_pop">
    <div class="close"><img src="<?php echo CDN_SERVER;?>images/recharge_Manage/icon-close.png" alt=""></div>
    <h3><strong>请选择所要充值的账号!</strong></h3>
    <span class="know">我知道了</span>
</div>
<!--中间内容-->
<article>
    <!--充值中心-->
    <div class="recharge_bg">
        <div class="recharge_wh">
            <!--充值中心标题-->
            <p class="tit_rc">
              <span> <strong> 充值中心</strong></span> &nbsp;&nbsp;
              当前账号:&nbsp; <b class="name"><?php echo $userInfo->nickName;?></b>
                &nbsp;&nbsp;账户余额:&nbsp;<b class="sb"> <tt><?php echo $currUser->userGold()->userGold();?></tt> 搜币</b>
                <span class="no_add">（还未添加账号？<a href="<?php echo API_URL;?>?mod=user_Center">点此马上前往产品管理添加</a>）</span>
            </p>
            <div class="full_gl"></div>
            <!--账号充值部分-->
            <div class="sys_mess one">
                <ul class="mess_ul">
                    <li class="active_x">
                        <p>
                            <img src="<?php echo CDN_SERVER;?>images/recharge_Manage/icon_weixin.png" alt="">
                            <span class="user_n">微信支付</span>
                        </p>
                    </li>
                    <li>
                        <p>
                            <img src="<?php echo CDN_SERVER;?>images/recharge_Manage/icon_zhifubao.png" alt="">
                            <span class="user_n">支付宝支付</span>
                        </p>
                    </li>
                    <li>
                        <p>
                            <img src="<?php echo CDN_SERVER;?>images/recharge_Manage/icon_hubi.png" alt="">
                            <span class="user_n">搜币支付</span>
                        </p>
                    </li>
                </ul>
            </div>
            <!--支付方式-->
            <div>
            <!--微信支付-->
            <div class="mess_detail">
                <div class="mess">
                    <form action="javascript:void(0)" class="weiPayForm">
                    <p class="fh_tit">
                        <span>微信支付</span>
                    </p>
                    <p class="main">充值账号:<b style="font-size: 22px;font-style: normal;margin-left: 10px"><?php echo $userInfo->nickName;?></b></p>
                    <span class="main">选择账号:</span>
                    <ul class="person_ul">
                        <li>
                            <span class="pro_span">官网账号:<?php echo $userInfo->nickName;?></span>
                            <img class="che_img" src="<?php echo CDN_SERVER;?>images/recharge_Manage/has_che.png">
                        </li>
                        <?php
                            if(!empty($userProdurceList)){
                                foreach($userProdurceList as $row){
                        ?>
                             <li class="mg_lt">
                                <span class="pro_span">飞虎账号:<?php echo $row->pnickName;?></span>
                                <img class="che_img" src="<?php echo CDN_SERVER;?>images/recharge_Manage/has_che.png" hidden>
                            </li>
                        <?
                                }
                            }
                        ?>
                    </ul>
                    <br>
                    <span class="main">选择金额:</span>
                    <ul class="clearfix_ul">
                        <li class="active_li active_m">
                            <p class="money" value="10">¥10元</p>
                        </li>
                        <li class="active_li">
                            <p class="money"  value="20">¥20元</p>
                        </li>
                        <li class="active_li">
                            <p class="money"  value="50">¥50元</p>
                        </li>
                        <li class="active_li">
                            <p class="money"  value="200">¥200元</p>
                        </li>
                        <li class="active_li">
                            <p class="money"  value="1000">¥1000元</p>
                        </li>
                        <li class="user_sel">
                            <input type="text" class="money_input" placeholder="请输入金额">
                        </li>
                    </ul>
                        <p class="bl scale">充值比例 1:100</p>
                        <p class="bl get_sb">充值成功后，您将获得1000搜币</p>
                    <div class="pay_money">
                        <h4>支付金额 : <em>10</em> 元 </h4>
                        <button type="submit" class="surePay weiPay">确认支付</button>
                    </div>
                    </form>
                </div>
            </div>
            <!--支付宝支付-->
            <div class="mess_detail" style="display: none">
                <div class="mess">
                    <form action="" class="payForm">
                    <p class="fh_tit">
                        <span>支付宝支付</span>
                    </p>
                    <p class="main">充值账号:<b style="font-size: 22px;font-style: normal;margin-left: 10px"><?php echo $userInfo->nickName;?></b></p>
                    <span class="main">选择账号:</span>
                    <ul class="person_ul">
                        <li>
                            <span class="pro_span">官网账号:<?php echo $userInfo->nickName;?></span>
                            <img class="che_img" src="<?php echo CDN_SERVER;?>images/recharge_Manage/has_che.png" alt="" value="1">
                        </li>
                        <?php
                            if(!empty($userProdurceList)){
                                foreach($userProdurceList as $row){
                        ?>
                             <li class="mg_lt">
                                <span class="pro_span">飞虎账号:<?php echo $row->pnickName;?></span>
                                <img class="che_img" src="<?php echo CDN_SERVER;?>images/recharge_Manage/has_che.png" hidden>
                            </li>
                        <?
                                }
                            }
                        ?>
                    </ul>
                    <br>
                    <span class="main">选择金额:</span>
                        <ul class="clearfix_ul">
                            <li class="active_li active_m">
                                <p class="money" value="10">¥10元</p>
                            </li>
                            <li class="active_li">
                                <p class="money"  value="20">¥20元</p>
                            </li>
                            <li class="active_li">
                                <p class="money"  value="50">¥50元</p>
                            </li>
                            <li class="active_li">
                                <p class="money"  value="200">¥200元</p>
                            </li>
                            <li class="active_li">
                                <p class="money"  value="1000">¥1000元</p>
                            </li>
                            <li class="user_sel">
                                <input type="text" class="money_input" placeholder="请输入金额">
                            </li>
                        </ul>
                        <p class="bl scale">充值比例 1:100</p>
                        <p class="bl get_sb">充值成功后，您将获得1000搜币</p>
                        <div class="pay_money">
                            <h4>支付金额 : <em>10</em> 元 </h4>
                            <button type="submit" class="surePay ">确认支付</button>
                    </div>
                    </form>
                </div>
            </div>
            <!--搜币支付-->
            <div class="mess_detail" style="display: none">
                <div class="mess">
                    <form action="javascript:void(0)">
                    <p class="fh_tit">
                        <span>搜币支付</span>
                    </p>
                    <p class="main">充值账号:<b style="font-size: 22px;font-style: normal;margin-left: 10px"><?php echo $userInfo->nickName;?></b></p>
                    <span class="main">选择账号:</span>
                    <ul class="person_ul">
                       
                         <?php
                            if(!empty($userProdurceList)){
                                foreach($userProdurceList as $row){
                        ?>
                             <li>
                                <span class="pro_span">飞虎账号:<?php echo $row->pnickName;?></span>
                                <img class="che_img" src="<?php echo CDN_SERVER;?>images/recharge_Manage/has_che.png">
                            </li>
                        <?
                                }
                            }
                        ?>
                    </ul>
                    <br>
                    <span class="main">选择金额:</span>
                    <ul class="clearfix_ul">
                        <li class="active_li active_m">
                            <p class="money" value="1000">1000搜币</p>
                        </li>
                        <li class="active_li">
                            <p class="money"  value="2000">2000搜币</p>
                        </li>
                        <li class="active_li">
                            <p class="money"  value="5000">5000搜币</p>
                        </li>
                        <li class="active_li">
                            <p class="money"  value="20000">20000搜币</p>
                        </li>
                        <li class="active_li">
                            <p class="money"  value="100000">100000搜币</p>
                        </li>
                        <li class="user_sel">
                            <input type="text" class="money_input" placeholder="请输入金额">
                        </li>
                    </ul>
                    <p class="bl">充值比例 1:1</p>
                    <p class="bl">充值成功后，您将获得1000飞虎币</p>
                    <div class="pay_money">
                        <h4>支付金额 : <em>10</em> 元 </h4>
                        <button type="submit" class="surePay ">确认支付</button>
                    </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    <?}else{?>
<!--隐藏的验证登录框-->
    <div class="chk_log">
        <p><img src="<?php echo CDN_SERVER;?>images/common/green_reminder_03.png" alt="">&nbsp;&nbsp;您好，您需要先登录才能继续本操作</p><br>
        <p><a href="<?php echo API_URL;?>?mod=reg_log">请点此链接进行登录或注册</a></p>
    </div>
    <?}?>
</article>
<!--底部导航-->
<?php
require(APP_PATH.'common/footer.com.php');
?>
<script src="<?php echo CDN_SERVER;?>js/common.js"></script>
<script src="<?php echo CDN_SERVER;?>js/formValidate.js"></script>
<script language="javascript">
$(function(){
     /*充值管理部分*/
    //充值选项卡
    $(".mess_ul li").click(function () {
        if(!$(this).hasClass("active_x")){
            $(this).addClass("active_x").siblings("li").removeClass("active_x");
        }
        var index_z=$(this).index();
        $(".mess_detail").eq(index_z).css("display","block").siblings().css("display","none");
    });
    $(".know").click(function () {
        $(".selAcc_pop").css("display",'none');
        $(".opacity_color").css("display",'none');
    });
   // $('article .recharge_wh .tit_rc b.name').html(name);
    //点击微信支付
    $('.weiPay').click(function () {
        $(".account").html(mr_money+'元');
        //确认用户是否选择账户
        var is_vi=$('.person_ul li img').is(":visible");
        if(!is_vi){
            $(".selAcc_pop").css("display",'block');
            $(".opacity_color").css("display",'block');
        }else{
            $(".wePay_pop").css("display","block");
            $(".opacity_color").css("display",'block');
        }
    });
    //点击添加账户
    $(".add_img").click(function () {
        $(".pop_cho").css("display","block");
        $(".opacity_color").css("display",'block');
    });
    //点击关闭
    $(".close").click(function(){
        $(this).parent().css("display","none");
        $(".opacity_color").css("display",'none');
    });
    //点击选择账户部分
    $(".person_ul li").click(function () {
        var index_c=$(this).index();
        if(index_c==0){
             $('.get_sb').html("充值成功后，您将获得1000搜币");
        }
        else if(index_c==1){
            $('.get_sb').html("充值成功后，您将获得1000飞虎币");
        }
        var if_see=$(this).children('img').is(':visible');
        if(!if_see){
            $(this).children('img').css("display","inline");
            if( $(this).siblings().children('img').is(':visible')){
                $(this).siblings().children('img').css("display","none");
            }
        }else{
            $(this).children('img').css("display","none");
        }
    });
    //点击不同充值金额
    mr_money= $(".pay_money em").html();
    $(".clearfix_ul .active_li").click(function () {
        if(!$(this).hasClass("active_m")){
            $(this).addClass("active_m").siblings().removeClass("active_m");
        }
        $(".user_sel").removeClass("active_sel");
        var rmb=$(this).children(".money").attr("value");
        $(".pay_money em").html(rmb);
        mr_money= $(".pay_money em").html();
        // $(".account").html(rmb);
    });
    //点击自行输入充值金额
    var $coinIn=$(".user_sel .sou_coin_input")
    $coinIn.focus(function () {
        $(".sou_coin_input").val("");
        $(".user_sel").addClass("active_sel");
        $(".clearfix_ul li").removeClass("active_m");
    });
    $coinIn.blur(function () {
        var user_coin=$coinIn.val();
        $coinIn.val(user_coin+'搜币');
        result_money=user_coin*0.01;
        $(".user_sel .money_input").val(result_money+'元');
        $(".pay_money em").html(result_money);
        mr_money= $(".pay_money em").html();
    });
    //点击选择不同的支付方式
});
</script>
</body>
</html>