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
    <!--充值中心-->
    <div class="recharge_bg" style="display: none">
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
                        <span>微信支付</span>
                    </p>
                    <p class="main">充值账号:<b style="font-size: 22px;font-style: normal;margin-left: 10px">Esther</b></p>
                    <span class="main">选择账号:</span>
                    <ul class="person_ul">
                        <li>
                            <span class="pro_span">官网账号:123456</span>
                            <img class="che_img" src="images/recharge_Manage/has_che.png" alt="" value="1" hidden>
                        </li>
                        <li class="mg_lt">
                            <span class="pro_span">飞虎账号:123456</span>
                            <img class="che_img" src="images/recharge_Manage/has_che.png" alt="" value="1" hidden>
                        </li>
                    </ul>
                    <br>
                    <span class="main">选择金额:</span>
                    <ul class="clearfix_ul">
                        <li class="active_li active_m">
                            <p class="sou_coin" value="1000">1000搜币</p>
                            <p class="money" value="10">¥10元</p>
                        </li>
                        <li class="active_li">
                            <p class="sou_coin">2000搜币</p>
                            <p class="money"  value="20">¥20元</p>
                        </li>
                        <li class="active_li">
                            <p class="sou_coin">5000搜币</p>
                            <p class="money"  value="50">¥50元</p>
                        </li>
                        <li class="active_li">
                            <p class="sou_coin">20000搜币</p>
                            <p class="money"  value="200">¥200元</p>
                        </li>
                        <li class="active_li">
                            <p class="sou_coin">100000搜币</p>
                            <p class="money"  value="1000">¥1000元</p>
                        </li>
                        <li class="user_sel">
                            <input type="text" class="sou_coin_input" placeholder="输入币数">
                            <input type="text" class="money_input">
                        </li>
                    </ul>
                    <div class="pay_money">
                        <h4>支付金额 : <em>10</em> 元 </h4>
                        <span class="surePay weiPay">确认支付</span>
                    </div>
                </div>
            </div>
            <!--支付宝支付-->
            <div class="mess_detail" style="display: none">
                <div class="mess">
                    <p class="fh_tit">
                        <span>支付宝支付</span>
                    </p>
                    <p class="main">充值账号:<b style="font-size: 22px;font-style: normal;margin-left: 10px">Esther</b></p>
                    <span class="main">选择账号:</span>
                    <ul class="person_ul">
                        <li>
                            <span class="pro_span">官网账号:123456</span>
                            <img class="che_img" src="images/recharge_Manage/has_che.png" alt="" value="1" hidden>
                        </li>
                        <li class="mg_lt">
                            <span class="pro_span">飞虎账号:123456</span>
                            <img class="che_img" src="images/recharge_Manage/has_che.png" alt="" value="1" hidden>
                        </li>
                    </ul>
                    <br>
                    <span class="main">选择金额:</span>
                    <ul class="clearfix_ul">
                        <li class="active_li active_m">
                            <p class="sou_coin" value="1000">1000搜币</p>
                            <p class="money" value="10">¥10元</p>
                        </li>
                        <li class="active_li">
                            <p class="sou_coin">2000搜币</p>
                            <p class="money"  value="20">¥20元</p>
                        </li>
                        <li class="active_li">
                            <p class="sou_coin">5000搜币</p>
                            <p class="money"  value="50">¥50元</p>
                        </li>
                        <li class="active_li">
                            <p class="sou_coin">20000搜币</p>
                            <p class="money"  value="200">¥200元</p>
                        </li>
                        <li class="active_li">
                            <p class="sou_coin">100000搜币</p>
                            <p class="money"  value="1000">¥1000元</p>
                        </li>
                        <li class="user_sel">
                            <input type="text" class="sou_coin_input" placeholder="输入币数">
                            <input type="text" class="money_input">
                        </li>
                    </ul>
                    <div class="pay_money">
                        <h4>支付金额 : <em>10</em> 元 </h4>
                        <span class="surePay">确认支付</span>
                    </div>
                </div>
            </div>
            <!--搜币支付-->
            <div class="mess_detail" style="display: none">
                <div class="mess">
                    <p class="fh_tit">
                        <span>搜币支付</span>
                    </p>
                    <p class="main">充值账号:<b style="font-size: 22px;font-style: normal;margin-left: 10px">Esther</b></p>
                    <span class="main">选择账号:</span>
                    <ul class="person_ul">
                        <li>
                            <span class="pro_span">官网账号:123456</span>
                            <img class="che_img" src="images/recharge_Manage/has_che.png" alt="" value="1" hidden>
                        </li>
                    </ul>
                    <br>
                    <span class="main">选择金额:</span>
                    <ul class="clearfix_ul">
                        <li class="active_li active_m">
                            <p class="sou_coin" value="1000">1000搜币</p>
                            <p class="money" value="10">¥10元</p>
                        </li>
                        <li class="active_li">
                            <p class="sou_coin">2000搜币</p>
                            <p class="money"  value="20">¥20元</p>
                        </li>
                        <li class="active_li">
                            <p class="sou_coin">5000搜币</p>
                            <p class="money"  value="50">¥50元</p>
                        </li>
                        <li class="active_li">
                            <p class="sou_coin">20000搜币</p>
                            <p class="money"  value="200">¥200元</p>
                        </li>
                        <li class="active_li">
                            <p class="sou_coin">100000搜币</p>
                            <p class="money"  value="1000">¥1000元</p>
                        </li>
                        <li class="user_sel">
                            <input type="text" class="sou_coin_input" placeholder="输入币数">
                            <input type="text" class="money_input">
                        </li>
                    </ul>
                    <div class="pay_money">
                        <h4>支付金额 : <em>10</em> 元 </h4>
                        <span class="surePay">确认支付</span>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
<!--隐藏的验证登录框-->
    <div class="chk_log" style="display: none">
        <p><img src="<?php echo CDN_SERVER;?>images/common/green_reminder_03.png" alt="">&nbsp;&nbsp;您好，您需要先登录才能继续本操作</p><br>
        <p><a href="<?php echo CDN_SERVER;?>?mod=reg_log">请点此链接进行登录或注册</a></p>
    </div>
</article>
<!--底部导航-->
<?php
require(APP_PATH.'common/footer.com.php');
?>
<script src="<?php echo CDN_SERVER;?>js/common.js"></script>
<script src="<?php echo CDN_SERVER;?>js/formValidate.js"></script>
<script language="javascript">
    $(function(){
        var data = {};
        data.action = "getUserInfo";
        $.post(url,data,function(result){
            var obj = JSON.parse(result);
            var code =parseInt(obj.CODE);
            if(code != 0){
                //失败
            }
            else{
                //成功
                data = obj.DATA.RESULT;
                $('article .recharge_wh .tit_rc b.name').html(data.nickName);
            }
        });
    });
</script>
</body>
</html>