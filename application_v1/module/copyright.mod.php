<?php
if(!defined('ACCESS_KEY')){header("HTTP/1.1 404 Not Found");die;}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>版权声明</title>
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/copyright.css">
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
    <div class="head">
        <div class="logo"><img src="<?php echo CDN_SERVER;?>images/common/logo_w.png" alt="" class="logo"></div>
        <div class="nav_span">
            <span class="nav_a"><a href="#" class="<?php if($mod == 'index'){echo 'orange';}?> first" title="<?php echo CDN_SERVER;?>?mod=index" >首页</a></span>
            <span class="nav_a"><a href="#" class="<?php if($mod == 'acc_recharge'){echo  'orange';}?> accountRecharge" title="<?php echo CDN_SERVER;?>?mod=acc_recharge">账户充值</a></span>
            <span class="nav_a"><a href="#" class="<?php if($mod == 'case'){echo  'orange';}?> case" title="<?php echo CDN_SERVER;?>?mod=case">案例</a></span>
            <span class="nav_a"><a href="#" class="<?php if($mod == 'about'){echo  'orange';}?> about" title="<?php echo CDN_SERVER;?>?mod=about">关于我们</a></span>
            <span class="nav_a"><a href="#" class="<?php if($mod == 'join'){echo  'orange';}?> join" title="<?php echo CDN_SERVER;?>?mod=join">加入我们</a></span>
            <div class="log"><a href="javascript:void(0)" title="<?php echo CDN_SERVER;?>?mod=reg_log">登录/注册</a></div>
            <span class="add_icon" >
            <img src="<?php echo CDN_SERVER;?>images/login_reg/user_icon-w.png" alt="" class="user_icon">&nbsp;&nbsp;<a href="" class="yhm">用户名</a>
            &nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo CDN_SERVER;?>images/login_reg/setup_icon-w.png" alt="" class="set_icon">
            <div class="angle">
                 <p class="safe"><a class="person_safe" href="<?php echo CDN_SERVER;?>modify_pass.html">账户安全</a></p>
                    <div class="grey_line_short"></div>
                 <p class="exit"><a class="back">退出</a></p>
            </div>
            </span>
        </div>
    </div>
</header>

<article>
    <div class="bg slider" id="jump">
        <div class="white_bg ">
            <h1>版权申明</h1>
            <div class="line"></div>
            <p class="copyright">深圳市搜虎网络科技有限公司对其发行的或与合作伙伴共同发行的作品享有版权，受各国版权法及国际版权公约的保护。
                对于上述版权内容，超越合理使用范畴、并未经本公司书面许可 <br> 的使用行为，我公司均保留追究法律责任的权利。
            </p>
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
                    <input type="submit" value="注册"  class="notchk"> <br>
                    <input type="checkbox" class="agree" id="chk">&nbsp;<span style="margin-right: 20%" class="protocol1"><a href="protocol.mod.php" target="_blank">同意用户协议</a>和<a href="copyright.mod.php" target="_blank">版权声明</a> </span><span class="rit_reg"><a href="#" class="has_acc">已有账号?登录</a></span>
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
                <!-- <div class="center">
                     <p><img src="images/wenhuajingying.png" alt="" style="width: 40px;height: 40px"></p>
                     <p style="font-size: 14px;"><a style="color: #fff;" href="http://sq.ccm.gov.cn/ccnt/sczr/service/business/emark/toDetail/3c3a59aa6a6740c3b47e88290db02c3b" target="_ blank">粤网文〔2017〕1079-007号</a></p>
                 </div>-->
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
</body>
</html>