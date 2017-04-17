<?php
if(!defined('ACCESS_KEY')){header("HTTP/1.1 404 Not Found");die;}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>关于我们</title>
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/index.css">
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/case.css">
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/about.css">
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/about_response.css">
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
    <div class="banner"><img src="<?php echo CDN_SERVER;?>images/about_us/about_banner.jpg" alt="" id="jump"></div>

    <section>
        <div class="black_bar slider">
            <ul>
                <li class="orange"><span>公司简介</span></li><img class="img1" src="<?php echo CDN_SERVER;?>images/common/Split_line.jpg" alt="" height="50px" width="1px" style="display: none">
                <li><span>发展历程</span></li> <img src="<?php echo CDN_SERVER;?>images/common/Split_line.jpg" alt="" height="50px" width="1px" class="img2">
                <li><span>产品体系</span></li> <img src="<?php echo CDN_SERVER;?>images/common/Split_line.jpg" alt="" height="50px" width="1px" class="img3">
                <li><span>团队介绍</span></li>
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
        <div class="yd_ad">
            <h1>COMPANY PROFILE</h1>
            <p>公司简介</p>
            <div style="width: 60px;height: 2px;background-color: #575757;margin-top: 24px;"></div>

            <div class="introduce">
                <p style="text-indent: 30px;font-size: 14px;line-height: 30px">“ 以精细化运营为先导，发展多屏和跨平台用户运营的能力；从流量运营发展成为以数据为基础，面向用户运营的互联网运营型公司。“ </p>
                <p  style="text-indent: 30px;font-size: 14px;line-height: 30px">搜虎团队成立于2011年，专注向客户提供移动广告服务。我们一直致力于为优质客户提供具有竞争力的移动广告解决方案，专门根据用户地理位置、性别、年龄段、兴趣、爱好等多项数据研究分析，向互联网、电商、游戏、金融、房产、教育、饮食及医疗等客户提供移动广告精准投放服务，保证客户的广告投放能达到最理想的效果并
                     帮助他们成长。</p>
                <br>
                <p style="text-indent: 30px;font-size: 14px;line-height: 30px">企业愿景：创新引领发展，科技成就收获。</p>
                <p style="text-indent: 30px;font-size: 14px;line-height: 30px">核心竟争力：领先业内的核心技术、不竭的创新动力、稳固的营销网络、产生强大影响力的企业文化。</p>
            </div>

            <div class="environment">
                <div class="lft">
                    <div style="width: 100%;"class="img_up"><img src="<?php echo CDN_SERVER;?>images/about_us/introduce/introdure_pic1.jpg" alt=""></div>
                    <div style="width: 100%;" class="img_down">
                        <img src="<?php echo CDN_SERVER;?>images/about_us/introduce/introdure_pic3.jpg" alt="">
                        <img src="<?php echo CDN_SERVER;?>images/about_us/introduce/introdure_pic4.jpg" alt="">
                    </div>
                </div>
                <div class="rit">
                    <img src="<?php echo CDN_SERVER;?>images/about_us/introduce/introdure_pic2.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="yd_ad " style="display: none">
            <h1>DEVELOPMENT HISTORY</h1>
            <p>发展历程</p>
            <div style="width: 60px;height: 2px;background-color: #575757;margin-top: 24px;"></div>

            <div class="bg_img">
                <img style="position: relative;" src="<?php echo CDN_SERVER;?>images/about_us/develop_history/develop_pic_2.png" alt="">
               <!-- <h2 style="position: absolute;margin: -61.4% auto auto 53.8%" class="year">2011</h2>
                <h2 style="position: absolute;margin: -48.5% auto auto 39.2%" class="year">2012</h2>
                <h2 style="position: absolute;margin: -34.5% auto auto 54%" class="year">2013</h2>
                <h2 style="position: absolute;margin: -21.6% auto auto 39.6%" class="year">2016</h2>-->

              <!--  <p  style="position: absolute;margin: -58% auto auto 61%" class="txt">以移动广告平台作为第一站打入互联网的“搜虎团队”成<br>立。<br>
                    不断的采集数据研究分析，为求广告精准投放到定向人群，<br>提高广告效应。我们，从不停歇。</p>
                <p  style="position: absolute;margin: -45% auto auto 8.2%" class="txt">日渐成熟的移动广告平台，我们不满足。
                    成立游戏应用<br>开发部门，并研发出单机游戏“抢三张纸牌”等 。正式<br>进入手机游戏领域。</p>
                <p  style="position: absolute;margin: -31.6% auto auto 61%" class="txt">成功研发出移动弹幕式视频直播平台，走在了移动视频类<br>应用的前头。</p>
                <p  style="position: absolute;margin:-18% auto auto 7.2%" class="txt">成立搜虎网络科技有限公司，整合移动广告业务，游戏应用<br>业务以及呀呀云，重新出发。</p>-->
            </div>
        </div>
        <div class="yd_ad" style="display: none">
            <h1>PRODUCT SYSTEM</h1>
            <p>产品体系</p>
            <div style="width: 60px;height: 2px;background-color: #575757;margin-top: 24px;"></div>
            <div class="pro"><img src="<?php echo CDN_SERVER;?>images/about_us/product/product_pic.png" alt=""></div>
        </div>
        <div class="yd_ad" style="display: none">
            <h1>OUR TEAM</h1>
            <p>团队介绍</p>
            <div style="width: 60px;height: 2px;background-color: #575757;margin-top: 24px;"></div>
            <div style="margin-top: 50px;line-height: 36px;width: 100%;height: auto">
                <p style="font-size: 14px;color: #161616;">我们是一支专业的团队。我们的成员拥有多年的信息安全专业技术背景，来自国内知名广告公司的一线骨干。</p>
                <p style="font-size: 14px;color: #161616;">我们是一支年轻的团队。我们的平均年龄仅有26岁，充满了朝气和创新精神。</p>
                <p style="font-size: 14px;color: #161616;">我们是一支专注的团队。我们坚信，可靠的品牌源自客户的信任。只有专注，才能赢得信任。</p>
                <p style="font-size: 14px;color: #161616;">我们是一支有梦想的团队。我们来自五湖四海，因为一个共同的梦想：做一家真正优秀的企业。</p>
            </div>
            <ul class="img_person fade">
                <li class="one portrait" title="0">
                    <img src="<?php echo CDN_SERVER;?>images/about_us/team/team_pic.jpg" alt="">
                   <!-- <div class="name">
                        <p class="big">周孝龙</p>
                        <p class="small">CEO</p>
                    </div>-->
                    <!-- <div class="up" style="display: none">
                         <div class="pa">
                             <p class="big">周孝龙</p>
                             <p class="small">CEO</p>
                             <p class="normal">公司整体规划，发展方向的制定<br>者。<br>
                                 拥有对移动大数据变化的高度敏<br>感，擅长捕捉市场动向。掌握丰<br>富整合内部资源，拓展外部市场<br>经验。</p>
                         </div>
                     </div>-->
                </li>
                <!--<li class="two portrait" title="1">
                  <img src="images/about_us/team/team_pic2.jpg" alt="">
                   <div class="name">
                       <p class="big">周明龙</p>
                       <p class="small">广告策划总监</p>
                   </div>
                     <div class="up" style="display: none">
                         <div class="pa">
                             <p class="big">周明龙</p>
                             <p class="small">广告策划总监</p>
                             <p class="normal">搜虎移动广告策划总监。
                                 负责公司<br>整个产品开发体系的搭建及实施。<br>
                                 是公司多个项目主导者，拥有3项<br>大平台开发经验。</p>
                         </div>
                     </div>
                </li>-->
                <!-- <li class="three portrait"title="2">
                    <img src="images/about_us/team/team_pic3.jpg" alt="">
                     <div class="name">
                         <p class="big">吴锦亮</p>
                         <p class="small">产品策划总监</p>
                     </div>
                     <div class="up" style="display: none">
                         <div class="pa">
                             <p class="big">吴锦亮</p>
                             <p class="small">产品策划总监</p>
                             <p class="normal">负责移动支付业务战略指定与市<br>场推进。<br>
                                 2011年即投身手机互联网行业，<br>拥有多年互联网媒体市场开拓经<br>验。对公司人才管理经验丰厚，<br> 业务规划独具慧眼。</p>
                         </div>
                     </div>
                </li>-->
                <!--  <li class="four portrait"title="3">
                    <img src="images/about_us/team/team_pic4.jpg" alt="">
                     <div class="name">
                         <p class="big">吴锦光</p>
                         <p class="small">市场部总监</p>
                     </div>

                  <div class="up" style="display: none">
                         <div class="pa">
                             <p class="big">吴锦光</p>
                             <p class="small">市场部总监</p>
                             <p class="normal">曾在中兴任职，深谙市场业务发<br>展之道。<br>
                                 在职四年，对公司业务线人员的<br>培训及管理有丰富的经验。</p>
                         </div>
                     </div>
                </li>-->
            </ul>
        </div>
    </section>
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
                        <p><img src="<?php echo CDN_SERVER;?>images/common/footer_icon1.png" alt="" style="width: 14px;height: 14px;"><span>&nbsp;&nbsp;0755-26651181</span></p>
                        <p><img src="<?php echo CDN_SERVER;?>images/common/footer_icon2.png" alt=""><span>&nbsp;&nbsp;深圳市南山区南头检查站智恒产业园22栋3楼</span></p>
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