<?php
//鉴权
if(!defined('ACCESS_KEY')){header("HTTP/1.1 404 Not Found");die;}
//公用类
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录注册</title>
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/reg_log.css">
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/index.css">
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
<!--center-->
<article>
    <div class="acc_bg">
        <div class="acc_pic">
            <img src="<?php echo CDN_SERVER;?>images/login_reg/acc_bg.jpg" alt="">
        </div>
        <div class="acc_reg_log">
            <div class="acc_con">
                <ul>
                    <li class="txt_sty"><span>登录</span></li>
                    <li class=""><span>注册</span></li>
                </ul>
                <div class="div_rl div_log_none div_log" >
                    <span class="phone_txt">账号登录</span><span class="red">123</span><br>
                    <form action="javascript:void(0)" class="reg_form form_one">
                        <input type="text" placeholder="手机号码" class="number">
                        <input type="password" placeholder="密码" class="password">
                        <button type="submit" class="btn_sub">登录</button>
                        <p class="btm_txt log_txt">
                            <span class="fgt_pass"> <a href="JavaScript:void(0)">忘记密码?</a></span>
                            <span class="cli_reg">还没有飞虎账号?  <a class="cli_zhuce">点击注册</a> </span>
                        </p>
                    </form>
                </div>
                <div class="div_rl div_reg " >
                    <span  class="phone_txt" >手机号注册</span><span class="red">123</span><br>
                    <form action="javascript:void(0)" class="reg_form form_two" >
                    <input type="text" placeholder="手机号码" class="phone">
                    <input type="text" placeholder="验证码" style="float: left;clear:both;" class="id_code">
                    <p class="p_btn"><input class="btn_fu" type="button" value="获取验证码" name="reg_code"></p>
                    <input type="text" placeholder="昵称" class="name">
                    <input type="password" placeholder="密码(6-16位字符和数字)" style="float: left" class="password">
                    <button type="submit" class="btn_sub">注册</button>
                        <p class="btm_txt">
                            <img class="check_img no_check" style="float: left;margin-top: 0.8%" src="<?php echo CDN_SERVER;?>images/register_Page/icon-dagou.png" alt="1" >
                            <span class="color_a"><a href="<?php echo API_URL;?>?mod=protocol" target="_blank">同意用户协议</a><a>和</a><a href="<?php echo API_URL;?>?mod=copyright" target="_blank">版权声明</a></span>
                            <span class="has_a"><a class="has_log">已有账号？前往登录</a> </span>
                            <input type="checkbox" style="display: none" class="che_if" checked>
                        </p>
                    </form>
                </div>
                <div class="div_rl div_fgt" style="display: none">
                    <span  class="phone_txt" >找回密码</span><span class="red">123</span><br>
                    <form action="javascript:void(0)" class="reg_form form_fgtpass">
                        <input type="text" placeholder="手机号码" class="phone_num">
                        <input type="text" placeholder="验证码" style="float: left;clear:both;" class="fgt_code">
                        <p class="p_btn"><input class="btn_fu" type="button" value="获取验证码" name="fgt_code"></p>
                        <input type="password" placeholder="输入新密码" class="new_pass">
                        <input type="password" placeholder="再次输入新密码" style="float: left" class="sure_newPass">
                        <button type="submit" class="btn_sub">确定</button>
                    </form>
                    <p class="go_log" style=""><span>前往登录</span></p>
                </div>
            </div>
        </div>
    </div>
</article>

<!--底部导航-->
<?php
require(APP_PATH.'common/footer.com.php');
?>
<script src="<?php echo CDN_SERVER;?>js/common.js" type="text/javascript"></script>
<script src="<?php echo CDN_SERVER;?>js/formValidate.js" type="text/javascript"></script>
</body>
</html>