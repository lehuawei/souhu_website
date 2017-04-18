
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>飞虎直播</title>
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/live.css">
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
require(APP_PATH.'common/header2.com.php');
?>
<article>
    <div class="bg slider"id="jump">
        <div class="white_bg " >
            <h1>飞虎直播</h1>
            <div class="underline"></div>
            <p style="text-indent:0%;padding-top: 26px">
                飞虎直播，一个集互动娱乐一体的高颜值视频直播社区。这里汇聚了女神萌妹、帅哥型男、才子佳人，有颜逗趣、幽默不低俗，总能勾搭到
                <br>
                你要的那一款。
            </p>
            <div class="img_q">
                <div style="text-align: center;width: 100%;margin-top: 40px"><img src="<?php echo CDN_SERVER;?>images/case_detail/case_detail_pic1.png" alt=""></div>
                <div style="text-align: center;width: 100%;"><img src="<?php echo CDN_SERVER;?>images/case_detail/case_detail_pic2.png" alt=""></div>

            </div>
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
                    <input type="text" placeholder="请输入昵称" class="notchk name" id="nickname"><br>
                    <input type="text" placeholder="请输入登录邮箱作为用户名"  class="notchk email" id="username">
                    <input type="password" placeholder="密码（6-16位字母、数字和符号）"  class="notchk password" id="pass">
                    <input type="submit" value="注册"  class="notchk"><br>
                    <p style="width: 78%; margin:2% auto auto 10%;">
                        <input type="checkbox" class="agree" id="chk">&nbsp;
                        <span  class="protocol1" style="float: left"><a href="protocol.mod.php" target="_blank">同意用户协议</a>和<a href="copyright.mod.php" target="_blank">版权声明</a> </span>
                        <span class="rit_reg" style="float: right"><a href="#" class="has_acc">已有账号?登录</a></span>
                    </p>
                    <p class="red">输入不能为空!</p>
                    <!--<p class="yx_gs">请输入正确的邮箱格式</p>-->
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
    </div>
</article>
<!--底部导航-->
<?php
require(APP_PATH.'common/footer.com.php');
?>
<script src="<?php echo CDN_SERVER;?>js/common.js"></script>
<script src="<?php echo CDN_SERVER;?>js/formValidate.js"></script>
</body>
</html>