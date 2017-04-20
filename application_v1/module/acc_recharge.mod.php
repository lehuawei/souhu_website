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
    <?php
        if(!empty($userInfo)){
           $userProdurceList = $currUser->userProdurce()->getUserProdurceList();
           $produrceCnt = count($userProdurceList);
    ?>
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
                    <p class="fh_tit">
                        <span id="sp_payType">微信支付</span>
                    </p>
                    <p class="main">充值账号:<b style="font-size: 22px;font-style: normal;margin-left: 10px"><?php echo $userInfo->nickName;?></b></p>
                    <span class="main">选择账号:</span>
                    <ul class="person_ul" id="ul_userProdurce">
                         <li id="person_li_0" value="0">
                            <span class="pro_span">官网账号:<?php echo $userInfo->nickName;?></span>
                            <img class="che_img" src="<?php echo CDN_SERVER;?>images/recharge_Manage/has_che.png" alt="" value="0">
                        </li>
                       <?php
                            if(!empty($userProdurceList)){
                                foreach($userProdurceList as $row){
                        ?>
                            <li class="mg_lt" id="person_li_<?php echo $row->pId;?>" value="<?php echo $row->pId;?>">
                                <span class="pro_span">飞虎账号:<?php echo $row->pnickName;?></span>
                                <img class="che_img" src="<?php echo CDN_SERVER;?>images/recharge_Manage/has_che.png" alt="" value="<?php echo $row->pId;?>" hidden>
                            </li>
                        <?
                            }
                          }
                        ?>
                    </ul>
                    <br>
                    <span class="main">选择金额:</span>
                    <?php
                        class_exists("C_Sys") or require(APP_PATH."class/sys.class.php");
                       for($i = 0;$i<3;$i++){
                    ?>
                         <ul class="clearfix_ul" id="ul_shop_<?php echo $i;?>" <?if($i>0){echo 'style="display:none"';}?>>
                            <?php
                                if($i == 0){
                                    $shopList = C_Sys::getSysShopListById(2,0);
                                }else if($i == 1){
                                    $shopList = C_Sys::getSysShopListById(2,1);
                                }
                                else if($i == 2){
                                    $shopList = C_Sys::getSysShopListById(1,1);
                                }
                            if(!empty($shopList)){
                                $j= 0;
                                $class = "";
                                foreach($shopList as $shop){
                                    if($j == 0){
                                        $class = "active_li active_m";
                                    }else if($shop->num == 0){
                                        $class = "user_sel";
                                    }
                                    else{
                                        $class = "active_li";
                                    }
                                    if($shop->num>0){
                            ?>
                                <li class="<?php echo $class;?>">
                                    <p class="sou_coin" value=""><?php echo $shop->num.$shop->shopName;?></p>
                                    <p class="money" value="10">¥<?php echo $shop->amount;?><?if($i == 2){echo "搜币";}else{echo "元";}?></p>
                                </li>
                            <?
                                }else{
                            ?>
                                <li class="user_sel">
                                    <input type="text" class="sou_coin_input" placeholder="输入币数">
                                    <input type="text" class="money_input">
                                </li>
                            <?
                                }
                                $j++;
                                }
                            }
                            ?>
                     </ul>
                    <?
                       }
                    ?>
                   
                    <div class="pay_money">
                        <h4>支付金额 : <em>10</em> 元 </h4>
                        <span class="surePay weiPay">确认支付</span>
                    </div>
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
var curr_selectIndex = 0;
var curr_selectPId = 0;
 $(function(){
     /***
      *初始化支付信息 
      **/
    var isLogin = parseInt('<?php echo $isLogin;?>');
    if(isLogin == 1)
       // initPayInfo();
    $(".mess_ul li").click(function () {
        var index_z=parseInt($(this).index());
        if(index_z == curr_selectIndex) return;
        curr_selectIndex = index_z;
        if(!$(this).hasClass("active_x")){
            $(this).addClass("active_x").siblings("li").removeClass("active_x");
        }
        initPayInfo();
    });

        //点击选择账户部分
    $(".person_ul li").click(function () {
        var if_see=$(this).children('img').is(':visible');
        if(!if_see){
            $(this).children('img').css("display","inline");
            curr_selectPId = parseInt($(this).val());
            if( $(this).siblings().children('img').is(':visible')){
                $(this).siblings().children('img').css("display","none");
            }
        }else{
            $(this).children('img').css("display","none");
        }
        initShopInfo();
    });

      /*充值管理部分*/
    $(".know").click(function () {
        $(".selAcc_pop").css("display",'none');
        $(".opacity_color").css("display",'none');
    });
    $('article .recharge_wh .tit_rc b.name').html(name);
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
    // //点击添加账户
    // $(".add_img").click(function () {
    //     $(".pop_cho").css("display","block");
    //     $(".opacity_color").css("display",'block');
    // });
    // //点击关闭
    // $(".close").click(function(){
    //     $(this).parent().css("display","none");
    //     $(".opacity_color").css("display",'none');
    // });
    // //点击选择账户部分
    // $(".person_ul li").click(function () {
    //     var if_see=$(this).children('img').is(':visible');
    //     if(!if_see){
    //         $(this).children('img').css("display","inline");
    //         if( $(this).siblings().children('img').is(':visible')){
    //             $(this).siblings().children('img').css("display","none");
    //         }

    //     }else{
    //         $(this).children('img').css("display","none");
    //     }
    // });
    // //点击不同充值金额
    //  mr_money= $(".pay_money em").html();
    // $(".clearfix_ul .active_li").click(function () {
    //     if(!$(this).hasClass("active_m")){
    //         $(this).addClass("active_m").siblings().removeClass("active_m");
    //     }
    //     $(".user_sel").removeClass("active_sel");
    //     var rmb=$(this).children(".money").attr("value");
    //     $(".pay_money em").html(rmb);
    //     mr_money= $(".pay_money em").html();
    //    // $(".account").html(rmb);
    // });
    // //点击自行输入充值金额
    // var $coinIn=$(".user_sel .sou_coin_input")
    // $coinIn.focus(function () {
    //     $(".sou_coin_input").val("");
    //     $(".user_sel").addClass("active_sel");
    //     $(".clearfix_ul li").removeClass("active_m");
    // });
    // $coinIn.blur(function () {
    //     var user_coin=$coinIn.val();
    //     $coinIn.val(user_coin+'搜币');
    //     result_money=user_coin*0.01;
    //     $(".user_sel .money_input").val(result_money+'元');
    //     $(".pay_money em").html(result_money);
    //     mr_money= $(".pay_money em").html();
    // });
});
/***
 * 初始化支付信息
 * @payType 1-搜币支付 2-支付宝支付 3-微信支付
 * **/
function initPayInfo(){

   
    var len = parseInt('<?php echo $produrceCnt;?>');
    //alert(len);
   
    if(curr_selectIndex == 0){
        //微信支付
          $('#sp_payType').html('微信支付');
           $('#person_li_0').css("display","");
    }else if(curr_selectIndex == 1){
        //支付宝
          $('#sp_payType').html('支付宝支付');
           $('#person_li_0').css("display","");
          
    }else if(curr_selectIndex == 2){
        //搜虎币
          $('#sp_payType').html('搜虎币支付');
          $('#person_li_0').css("display","none");
    }
}
function initShopInfo($pId){
    //var curr_selectIndex = 0;
//var curr_selectPId = 0;
    if(curr_selectPId == 0 && curr_selectIndex<2){
         $('#ul_shop_0').css('display','');
         $('#ul_shop_1').css('display','none');
         $('#ul_shop_2').css('display','none');
    }
    else{
       
        if(curr_selectPId>0 && curr_selectIndex <2){
            $('#ul_shop_0').css('display','none');
            $('#ul_shop_1').css('display','');
            $('#ul_shop_2').css('display','none');
        }
        else{
           
            $('#ul_shop_0').css('display','none');
            $('#ul_shop_1').css('display','none');
            $('#ul_shop_2').css('display','');
        }
    }
}
</script>
</body>
</html>
