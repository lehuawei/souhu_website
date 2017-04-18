<?php
if(!defined('ACCESS_KEY')){header("HTTP/1.1 404 Not Found");die;}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改密码</title>
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/index.css">
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/reg_log.css">
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/user_Center.css">
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/acc_recharge.css">
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/reg_log.css">
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
<!--中间-->
<article>
    <div class="recharge_bg">
        <div class="recharge_wh">
            <!--顶部导航-->
            <ul class="user_ul">
                <li class="active_t"><span>账号安全</span></li>
            </ul>
            <!--导航内容-->
            <!--3账号安全-->
            <div class="acc_bg acc_save"  style="display:block">
                <!--安全指数-->
                <div class="reliable_index">
                    <p style="font-size: 18px">安全指数: <span class="orange_span"></span> <span class="orange_span"></span> <span class="grey_span" id="chg_span"></span>
                        <em style="font-style: normal;color: #f5a517;font-size: 20px" id="chg_strong">中</em>
                    </p>
                </div>
                <div class="acc_con">
                    <h1 style="text-align: center">修改密码</h1>
                    <div class="div_rl div_fgt" style="display: block; margin-top: 20px;">
                        <form action="javascript:void(0)" class="reg_form form_three">
                           <!-- <input placeholder="手机号码" type="text" class="phone">-->
                            <input placeholder="输入新密码(6-16位字符和数字)" type="password" class="new_pass">
                            <input placeholder="再次输入新密码" style="float: left" type="password" class="sure_pass"><br>

                            <span class="red" style="margin: 0 auto;text-align: center;height: 20px">123</span>
                            <div style="" class="btn_se">
                                <button class="edit">取消</button>
                                <button class="sure" type="submit">确定</button>
                                <br>
                                <a href="reg_log.mod.php" class="log_a">前往登录</a>
                            </div>
                        </form>

                    </div>
                </div>


            </div>
        </div>
    </div>
</article>

<!--底部导航-->
<?php
require(APP_PATH.'common/footer.com.php');
?>
<script src="<?php echo CDN_SERVER;?>js/common.js"></script>
<script src="<?php echo CDN_SERVER;?>js/formValidate.js"></script>
<script>
    $(function () {
        var ifStrong=localStorage.ifStrong;
        if(ifStrong){
            $("#chg_span").addClass('orange_span').removeClass('grey_span');
            $("#chg_strong").html("强");
        }
        console.log(ifStrong);
        var modifyifStrong=localStorage.modify_ifStrong;
        console.log(modifyifStrong);
        switch(modifyifStrong)
        {
            case "true":
                $('#chg_span').addClass('orange_span').removeClass('grey_span');
                $('#chg_strong').html('强');
                break;
            case "false":
                $("#chg_span").addClass('grey_span').removeClass('orange_span');
                $("#chg_strong").html('中');
                break;
            default:
        }
    });
</script>
</body>
</html>