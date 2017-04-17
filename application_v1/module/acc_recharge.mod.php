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
<!--选择账号弹出框-->
<div class="pop_cho">
    <div class="close"><img src="<?php echo CDN_SERVER;?>images/recharge_Manage/icon-close.png" alt=""></div>
    <ul>
        <li class=" txt_sty"><span>添加账号</span></li>
    </ul>
    <div class="cho_user">
        <form action="javascript:void(0)" class="reg_form form_four">
            <span  class="phone_txt" >选择账号类型</span><span class="red">123</span><br>
            <select>
                <option value="1">直播账号</option>
                <option value="2">游戏账号</option>
            </select>
            <span  class="phone_txt" >账号登录</span><br>
            <input type="text" placeholder="手机号码" class="phonenumber">
            <input type="text" placeholder="密码" class="password">
            <button type="submit" class="btn_sub">登录</button>
        </form>
        <div class="another_log">
            <span>使用第三方登录
                <a href="#"><img src="<?php echo CDN_SERVER;?>images/recharge_Manage/icon_weChat.png" alt=""></a>
                <a href="#"><img src="<?php echo CDN_SERVER;?>images/recharge_Manage/icon-weibo.png" alt=""></a>
                <a href="#"><img src="<?php echo CDN_SERVER;?>images/recharge_Manage/icon-qq.png" alt=""></a>
            </span>
        </div>
    </div>
</div>
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
            <!--账号部分-->
            <div class="acc_head">
                <ul class="person_ul">
                    <li>
                        <span class="hp_span"><img src="<?php echo CDN_SERVER;?>images/recharge_Manage/girl.jpg" alt=""></span>
                        <span class="pro_span"><h3>Muse<img src="<?php echo CDN_SERVER;?>images/recharge_Manage/girl.png" alt=""> </h3>搜虎账号:123456</span>
                        <img class="che_img" src="<?php echo CDN_SERVER;?>images/recharge_Manage/has_che.png" alt="" value="1" >
                    </li>
                    <li>
                        <span class="hp_span"><img src="<?php echo CDN_SERVER;?>images/recharge_Manage/girl.jpg" alt=""></span>
                        <span class="pro_span"><h3>Muse<img src="<?php echo CDN_SERVER;?>images/recharge_Manage/girl.png" alt=""> </h3>搜虎账号:123456</span>
                    </li>

                </ul>
               <span class="add_img"><img src="<?php echo CDN_SERVER;?>images/recharge_Manage/icon-and.png" alt="" > 添加账号</span>
            </div>
            <!--充值金额-->
            <div class="recharge_money">
                <h4>请选择充值金额</h4>
            </div>
            <div class="no_full_line"></div>
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
            <!--请选择支付方式-->
            <div class="pay_way">
                <h4>请选择支付方式</h4>
            </div>
            <div class="no_full_line"></div>
            <div class="pay_img">
                <ul>
                    <li class="active"><span class="aliPay"></span></li>
                    <li><span class="weChatpay"></span></li>
                    <li><span class="unionPay"></span></li>
                </ul>
            </div>
            <!--支付金额与支付-->
             <div class="pay_money">
                   <h4>支付金额 : <em>10</em> 元 </h4>
                   <span class="surePay">确认支付</span>
             </div>
        </div>
    </div>
<!--隐藏的验证登录框-->
    <div class="chk_log" style="display: none">
        <p><img src="<?php echo CDN_SERVER;?>images/common/green_reminder_03.png" alt="">&nbsp;&nbsp;您好，您需要先登录才能继续本操作</p><br>
        <p><a href="<?php echo CDN_SERVER;?>reg_log.html">请点此链接进行登录或注册</a></p>
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