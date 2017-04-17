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
<header>
    <div class="head bs">
        <div class="logo"><img src="<?php echo CDN_SERVER;?>images/common/logo.png" alt="" class="logo"></div>
        <div class="nav_span">
            <span class="nav_a"><a href="#"  class="first" title="index.html">首页</a></span>
            <span class="nav_a"><a href="#" class="accountRecharge" title="acc_recharge.html">账户充值</a></span>
            <span class="nav_a"><a href="#" class="case" title="case.html">案例</a></span>
            <span class="nav_a"><a href="#" class="about" title="about.html">关于我们</a></span>
            <span class="nav_a"><a href="#" class="join" title="join.html">加入我们</a></span>
            <span class="add_icon" >
                <img src="<?php echo CDN_SERVER;?>images/login_reg/person_icon1.png" alt="" class="user_icon">&nbsp;&nbsp;
                <a href="user_Center.mod.php" target="_blank" class="yhm">用户名</a>
                &nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo CDN_SERVER;?>images/login_reg/setup_icon.png" alt="" class="set_icon">
                <div class="angle">
                 <p class="safe"><a class="person_safe" href="modify_pass.mod.php">账户安全</a></p>
                    <div class="grey_line_short"></div>
                 <p class="exit"><a class="back">退出</a></p>
            </div>
            </span>
        </div>
    </div>
</header>

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

<footer>
    <div class="foot">
        <div class="foot1">
            <div class="contact">
                <div class="con_left">
                    <span><img src="<?php echo CDN_SERVER;?>images/common/image_wechat.png" alt="" style="width: 120px;height: 120px"></span>
                    <ul style="display: inline-block">
                        <li>扫一扫</li>
                        <li>关注搜虎微信平台</li>
                    </ul>
                </div>
                <div class="con_right">
                    <div>
                        <p style="font-size: 16px" >联系方式:</p>
                        <p><img src="<?php echo CDN_SERVER;?>images/common/footer_icon1.png" alt="" style="width: 14px;height: 14px"><span>&nbsp;&nbsp;0755-26651181</span></p>
                        <p><img src="<?php echo CDN_SERVER;?>images/common/footer_icon2.png" alt="" style="width: 14px;height: 14px"><span>&nbsp;&nbsp;深圳市南山区南头检查站智恒产业园22栋3楼</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="foot2">
            <p>Copyright &nbsp; @ &nbsp; 搜虎网络   &nbsp;&nbsp;   &nbsp;&nbsp;备案号：粤ICP备16109808号-1&nbsp;&nbsp;   &nbsp;&nbsp;
                <img src="<?php echo CDN_SERVER;?>images/common/wenhuajingying.png" alt="" style="width: 28px;height: 28px">&nbsp;&nbsp;
                <a  href="http://sq.ccm.gov.cn/ccnt/sczr/service/business/emark/toDetail/3c3a59aa6a6740c3b47e88290db02c3b" target="_ blank">粤网文〔2017〕1079-007号</a>
            </p>
        </div>
    </div>
</footer>
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