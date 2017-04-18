<?php
if(!defined('ACCESS_KEY')){header("HTTP/1.1 404 Not Found");die;}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>案例详情</title>
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/case.css">
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/index.css">
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/common_response.css">
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
<article>
    <div class="banner"><img src="<?php echo CDN_SERVER;?>images/case/case_banner.jpg" alt="" id="jump"></div>
    <section>
        <div class="black_bar slider">
            <ul>
                <li class="orange"><span>移动广告</span></li><img class="img1" src="<?php echo CDN_SERVER;?>images/common/Split_line.jpg" alt="" height="50px" width="1px" style="display: none">
               <!-- <li><span>游戏业务</span></li> <img src="images/Split_line.jpg" alt="" height="50px" width="1px" class="img2">-->
                <li><span>直播平台</span></li>
            </ul>
            <!--登录部分-->
            <div class="login add" style="display:none;">
                <div class="close"><img src="<?php echo CDN_SERVER;?>images/login_reg/colse.png" alt=""></div>
                <p>账户登录</p>
                <form class="form_one" action="javascript:void(0)">
                    <input type="text" placeholder="请输入账号" class="account"><br>
                    <input type="password" placeholder="请输入密码" class="password">
                    <input type="submit"  value="登录" class="dl">
                    <p><span class="red">输入不能为空!</span><!--<span><a href="#">忘记密码?</a></span>--></p>
                </form>
            </div>
            <!--注册部分-->
            <div class="register add" style="display:none;">
                <div class="close"><img src="<?php echo CDN_SERVER;?>images/login_reg/colse.png" alt=""></div>
                <p>注册账户</p>
                <form class="form_two" action="javascript:void(0)">
                    <input type="text" placeholder="请输入昵称" class="notchk name"><br>
                    <input type="text" placeholder="请输入登录邮箱作为用户名"  class="notchk email">
                    <input type="password" placeholder="密码（6-16位字母、数字和符号）"  class="notchk password">
                    <input type="submit" value="注册"  class="notchk"> <br>
                    <p style="width: 78%; margin:2% auto auto 10%;">
                        <input type="checkbox" class="agree" id="chk">&nbsp;
                        <span  class="protocol1" style="float: left"><a href="<?php echo CDN_SERVER;?>protocol.html" target="_blank">同意用户协议</a>和<a href="<?php echo CDN_SERVER;?>copyright.html" target="_blank">版权声明</a> </span>
                        <span class="rit_reg" style="float: right"><a href="#" class="has_acc">已有账号?登录</a></span>
                    </p>
                    <span class="red">输入不能为空!</span>
                </form>
            </div>
            <!--修改密码-->
            <div class="change_pass add"  style="display:none;">
                <div class="close"><img src="<?php echo CDN_SERVER;?>images/login_reg/colse.png" alt=""></div>
                <p>修改密码</p>
                <form class="form_three" action="javascript:void(0)">
                    <input type="password" placeholder="请输入新密码" class="new_pass">
                    <input type="password" placeholder="确认密码" class="sure_pass">
                    <input type="submit" value="确定"><br>
                    <span class="red">输入不能为空!</span>
                    <span class="again">两次输入不一样，请重新输入！</span>
                </form>
            </div>
        </div>
    </section>
    <section>
        <div class="yd_ad join">
            <h1>MOBILE ADVERTISING</h1><!--margin-left: 25px-->
            <p>移动广告</p>
            <div style="width: 60px;height: 2px;background-color: #575757;margin-top: 24px;"></div>
            <div class="line_one first">
                <div><a href=""><img src="<?php echo CDN_SERVER;?>images/case/case_advert_pic1.jpg" alt=""></a><p>为某公司做的开屏广告</p></div>
                <div><a href=""><img src="<?php echo CDN_SERVER;?>images/case/case_advert_pic3.jpg" ></a><p>为某公司做的插屏广告</p></div>
                <div><a href=""><img src="<?php echo CDN_SERVER;?>images/case/case_advert_pic2.jpg"></a><p>为某公司做的插屏广告</p></div>
            </div>
            <div class="line_one">
                <div><a href=""><img src="<?php echo CDN_SERVER;?>images/case/case_advert_pic4.jpg" ></a><p>为某公司做的插屏广告</p></div>
                <!-- <div><a href=""><img src="images/case/case_pic5.jpg" alt=""title="qwkd.html"></a><p>为某公司做的PUSH广告</p></div>
                 <div><a href=""><img src="images/case/case_pic6.jpg" alt=""title="qwkd.html"></a><p>为某公司做的PUSH广告</p></div>-->
            </div>
            <!--<div class="line_one">
                <div><a href=""><img src="images/case/case_pic7.jpg" alt=""title="qwkd.html"></a><p>为某公司做的插屏广告</p></div>
                <div><a href=""><img src="images/case/case_pic8.jpg" alt=""title="qwkd.html"></a><p>为某公司做的PUSH广告</p></div>
                <div><a href=""><img src="images/case/case_pic9.jpg" alt=""title="qwkd.html"></a><p>为某公司做的PUSH广告</p></div>
            </div>-->
        </div>
       <!-- <div class="yd_ad join" style="display: none">
            <h1>GAME WORK</h1>
            <p>游戏业务</p>
            <div style="width: 60px;height: 2px;background-color: #575757;margin-top: 24px;"></div>
            <div class="line_one first">
                <div class="kupao" title="qwkd.html"><a href=""><img src="images/case/case_game.jpg" alt=""></a><p>天天酷跑</p></div>
                &lt;!&ndash;<div><a href=""><img src="images/case/case_advert_pic3.jpg" alt=""></a><p>为某公司做的插屏广告</p></div>
                <div><a href=""><img src="images/case/case_advert_pic2.jpg" alt=""></a><p>为某公司做的插屏广告</p></div>&ndash;&gt;
            </div>
          &lt;!&ndash;  <div class="line_one">
                <div><a href=""><img src="images/case/case_advert_pic4.jpg" alt=""></a><p>为某公司做的banner广告</p></div>
                <div><a href=""><img src="images/case/case_pic5.jpg" alt=""></a><p>为某公司做的PUSH广告</p></div>
                <div><a href=""><img src="images/case/case_pic6.jpg" alt=""></a><p>为某公司做的PUSH广告</p></div>
            </div>
            <div class="line_one">
                <div><a href=""><img src="images/case/case_pic7.jpg" alt=""></a><p>为某公司做的插屏广告</p></div>
                <div><a href=""><img src="images/case/case_pic8.jpg" alt=""></a><p>为某公司做的PUSH广告</p></div>
                <div><a href=""><img src="images/case/case_pic9.jpg" alt=""></a><p>为某公司做的PUSH广告</p></div>
            </div>&ndash;&gt;

        </div>-->
        <div class="yd_ad join" style="display: none">
            <h1>LIVE PLATFORM</h1>
            <p>直播平台</p>
            <div style="width: 60px;height: 2px;background-color: #575757;margin-top: 24px;"></div>
            <div class="line_one first">
                <div><a href=""><img class="live" src="<?php echo CDN_SERVER;?>images/case/case_zhibo.jpg" alt="" title="live.html"></a><p>飞虎直播</p></div>
                <!-- <div><a href=""><img src="images/case/case_pic1_20.jpg" alt=""title="qwkd.html"></a><p>为某公司做的PUSH广告</p></div>
                 <div><a href=""><img src="images/case/case_pic3.jpg" alt=""title="qwkd.html"></a><p>为某公司做的PUSH广告</p></div>-->
            </div>
            <!--<div class="line_one">
                <div><a href=""><img src="images/case/case_pic4.jpg" alt=""title="qwkd.html"></a><p>为某公司做的插屏广告</p></div>
                <div><a href=""><img src="images/case/case_pic5.jpg" alt=""title="qwkd.html"></a><p>为某公司做的PUSH广告</p></div>
                <div><a href=""><img src="images/case/case_pic6.jpg" alt=""title="qwkd.html"></a><p>为某公司做的PUSH广告</p></div>
            </div>-->
            <!-- <div class="line_one">
                 <div><a href=""><img src="images/case/case_pic7.jpg" alt=""title="qwkd.html"></a><p>为某公司做的插屏广告</p></div>
                  <div><a href=""><img src="images/case/case_pic8.jpg" alt=""title="qwkd.html"></a><p>为某公司做的PUSH广告</p></div>
                  <div><a href=""><img src="images/case/case_pic9.jpg" alt=""title="qwkd.html"></a><p>为某公司做的PUSH广告</p></div>
            </div>-->
        </div>
    </section>
</article>

<!--底部导航-->
<?php
require(APP_PATH.'common/footer.com.php');
?>
<script src="<?php echo CDN_SERVER;?>js/common.js"></script>
<script src="<?php echo CDN_SERVER;?>js/formValidate.js"></script>
</body>
</html>