<?php
if(!defined('ACCESS_KEY')){header("HTTP/1.1 404 Not Found");die;}
class_exists('C_User') or require(APP_PATH.'class/user.class.php');
$class = "";
$mod = $_REQUEST['mod'];
if(empty($mod)) {
    $mod = 'index';
}
$userInfo = null;
$currUser = null;
$isLogin = 0;
if(C_CurrUser::isLogin()){
    //已登录
    $isLogin = 1;
    $currUser = new C_User(C_CurrUser::$userId);
    $userInfo = $currUser->getUserInfo();

}

?>
<header>
    <div class="head bs">
        <div class="logo"><a href="<?php echo API_URL;?>?mod=index"> <img src="<?php echo CDN_SERVER;?>images/common/logo.png" alt="" class="logo"></a></div>
        <div class="nav_span">
            <span class="nav_a"><a href="#" class="<?php if($mod == 'index'){echo "orange";}?> first" title="<?php echo API_URL;?>?mod=index" >首页</a></span>
            <span class="nav_a"><a href="#" class="<?php if($mod == 'acc_recharge'){echo "orange";}?> accountRecharge" title="<?php echo API_URL;?>?mod=acc_recharge">账户充值</a></span>
            <span class="nav_a"><a href="#" class="<?php if($mod == 'case'){echo "orange";}?> case" title="<?php echo API_URL;?>?mod=case">案例</a></span>
            <span class="nav_a"><a href="#" class="<?php if($mod == 'about'){echo "orange";}?> about" title="<?php echo API_URL;?>?mod=about">关于我们</a></span>
            <span class="nav_a"><a href="#" class="<?php if($mod == 'join'){echo "orange";}?> join" title="<?php echo API_URL;?>?mod=join">加入我们</a></span>
            <?php
            if(empty($userInfo)){
                ?>
                <div class="log org"><a href="javascript:void(0)" title="<?php echo API_URL;?>?mod=reg_log">登录/注册</a></div>
                <?
            }
            else{
                ?>
                <span class="add_icon" style="display: inline">
                <img src="<?php echo CDN_SERVER;?>images/login_reg/person_icon1.png" alt="" class="user_icon ">&nbsp;&nbsp;
                <a href="<?php echo API_URL;?>?mod=user_Center" target="_blank" class="yhm"><?php echo $userInfo->nickName;?></a>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <img src="<?php echo CDN_SERVER;?>images/login_reg/setup_icon.png" alt=""  class="set_icon">
                <div class="angle">
                    <p class="safe"><a class="person_safe" href="<?php echo API_URL;?>?mod=modify_pass">账户安全</a></p>
                        <div class="grey_line_short"></div>
                    <p class="exit"><a class="back">退出</a></p>
                </div>
                </span>
            <?}?>
        </div>
    </div>
</header>