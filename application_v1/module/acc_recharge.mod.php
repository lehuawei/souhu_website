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

<!--中间内容-->
<article>
    <!--充值中心-->
    <div class="recharge_bg" style="display: none">
        <div class="recharge_wh">
            <!--充值中心标题-->
            <p class="tit_rc">
              <span> <strong> 充值中心</strong></span> &nbsp;&nbsp;
              当前账号:&nbsp; <b class="name">123456</b>
                &nbsp;&nbsp;账户余额:&nbsp;<b class="sb"> <tt>100</tt> 搜币</b>
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
            <div class="mess_detail">
                <div class="mess">
                    <p class="fh_tit"><img src="<?php echo CDN_SERVER;?>images/case_detail/case_detail_pic1.png" alt="" width="68px" height="68px">
                        <span>飞虎直播</span> <em class="time">3-16   12:01</em>
                    </p>
                    <p class="main">
                        <strong>尊敬的用户Muse:</strong> <br>
                        <span>欢迎您来到飞虎直播平台，您已获得由系统送出的10搜虎币（前往领取），希望您生活愉快!</span>
                    </p>
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