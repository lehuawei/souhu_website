<?php
//鉴权
    if(!defined('ACCESS_KEY')){header("HTTP/1.1 404 Not Found");die;}
//公用类
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>搜虎首页</title>
    <!--ie8支持的jQuery版本2.0以下-->
    <script src="<?php echo CDN_SERVER;?>js/jquery-1.9.1.js"></script>
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/index.css">
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/common_response.css">
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/jquery.fullPage.css">
    <!-- jquery.easings.min.js 是必须的，用于 easing 参数，也可以使用完整的 jQuery UI 代替 -->
    <script src="<?php echo CDN_SERVER;?>js/jquery.easings.min.js"></script>
    <script src="<?php echo CDN_SERVER;?>js/jquery.fullPage.min.js"></script>

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
<!--左侧导航文字设置-->
<div style="display:none" id="#leftdata">
    <p id="leftdata0" class="active1">首页</p>
    <p id="leftdata1">移动广告</p>
 <!--   <p id="leftdata2">游戏业务</p>-->
    <p id="leftdata2">直播平台</p>
    <p id="leftdata3">成功案例</p>
    <p id="leftdata4">团队介绍</p>
</div>

<!--大屏滚动效果-->
<div id="fullpage">
    <!--首页 轮播-->
    <div class="section section1"  id="denglu">
        <div class="slider">
            <!--轮播的图片-->
            <ul class="banner_pic">
                <li><img src="<?php echo CDN_SERVER;?>images/homepage/banner_b1.jpg" alt=""></li>
                <li><img src="<?php echo CDN_SERVER;?>images/homepage/banner_b2.jpg" alt=""></li>
                <li><img src="<?php echo CDN_SERVER;?>images/homepage/banner_b3.jpg" alt=""></li>
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
                <input type="text" placeholder="请输入昵称" class="notchk name" id="nickname"><br>
                <input type="text" placeholder="请输入登录邮箱作为用户名"  class="notchk email" id="username">
                <input type="password" placeholder="密码（6-16位字母、数字和符号）"  class="notchk password" id="pass">
                <input type="submit" value="注册"  class="notchk"> <br>
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
    <!--第二屏移动广告-->
    <div class="section section2">
        <div class="pages pages2">
            <div class="long-bg"></div>
            <div class="cont cont2">
                <!--右边-->
                <div class="core_good">
                    <!--图片部分-->
                    <div class="core_img">
                        <div class="img">
                            <p>五大核心优势</p>
                            <ul class="circle_ul">
                                <li class="orange">大数据</li>
                                <li>高流量</li>
                                <li>强应用</li>
                                <li>精算法</li>
                                <li>懂广告</li>
                            </ul>
                        </div>
                    </div>
                    <!--文字部分-->
                    <div>
                        <div class="good_text">
                        <ul class="list">
                            <li class="big">PB级数据</li>
                            <li class="small">每天千万级竞价请求，累计过亿受众人群</li>
                        </ul>
                        </div>
                        <div class="good_text">
                            <ul class="list">
                                <li class="big">高增长流量</li>
                                <li class="small">快人一步，洞视市场动向</li>
                            </ul>
                        </div>
                        <div class="good_text">
                            <ul class="list">
                                <li class="big">全方位管控</li>
                                <li class="small">时段、地区、频次、媒体、广告位、气温、湿度、空气质量、人群、兴趣、意向</li>
                            </ul>
                        </div>
                        <div class="good_text">
                            <ul class="list">
                                <li class="big">智能竞价引擎</li>
                                <li class="small">机器学习智能优化，毫秒级精算定向或出价</li>
                            </ul>
                        </div>
                        <div class="good_text">
                            <ul class="list">
                                <li class="big">互联网广告专家</li>
                                <li class="small">独创立体优化模型，专家优化团队和服务体系</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--左边-->
                <div class="move_ad">
                    <div class="tit">
                        <h3>移动广告&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="">
                                <font></font>&nbsp;&nbsp;
                                <span class="sm">查看详情</span>
                            </a>
                        </h3>
                        <h4>覆盖2.2亿手机用户</h4>
                        <p>搜虎不仅与百度、腾讯、仙果等众多知名移动媒体建立了
                            合作，还直接对接广告主，丰富广告内容填充。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--第三屏游戏业务  暂时去掉-->
    <!--<div class="section section3">
        <div class="pages pages3">
            <div class="cont cont3">
                &lt;!&ndash;右边白色矩形&ndash;&gt;
                <div class="white_bg"></div>
                &lt;!&ndash;左边部分&ndash;&gt;
                <div class="four_adv">
                    &lt;!&ndash;图形部分&ndash;&gt;
                    <div class="adv_img">
                        <div class="img">
                            <p>四大特征</p>
                            <ul class="circle_ul">
                                <li class="orange">轻操作</li>
                                <li>轻时间</li>
                                <li>轻流量</li>
                                <li>轻资费</li>
                            </ul>
                        </div>
                    </div>
                    &lt;!&ndash;文字部分&ndash;&gt;
                    <div>
                        <div class="good_text">
                            <ul class="list">
                                <li class="small">游戏操作简单易上手，符合智能机的使用特征</li>
                            </ul>
                        </div>
                        <div class="good_text">
                            <ul class="list">
                                <li class="small">可以充分利用碎片时间体验游戏，随时开启随时结束</li>
                            </ul>
                        </div>
                        <div class="good_text">
                            <ul class="list">
                                <li class="small">游戏下载和使用过程中消耗的流量较小，帮助玩家节省流量</li>
                            </ul>
                        </div>
                        <div class="good_text">
                            <ul class="list">
                                <li class="small">单次付费门槛较低，无花费太多金额就能享受到优质的游戏产品</li>
                            </ul>
                        </div>
                        <div class="good_text">
                            <ul class="list">
                                <li class="small">独创立体优化模型，专家优化团队和服务体系</li>
                            </ul>
                        </div>
                </div>
            </div>
                &lt;!&ndash;右边部分&ndash;&gt;
                <div class="game_work">
                    <div class="tit">
                        <h3>游戏业务&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="">
                                <font></font>&nbsp;&nbsp;
                                <span>查看详情</span>
                            </a>
                        </h3>
                        <h4>搜虎游戏部门定位发展轻游戏</h4>
                        <p>推出过射击岛国、萌妹消消除、快乐2048、拳皇快打、
                            天天跑酷等益智、消除、动作类轻游戏。</p>
                    </div>
                </div>
        </div>
    </div>
    </div>-->
<!--第四屏直播平台-->
    <div class="section section4">
        <div class="pages pages4">
            <div class="cont cont4">
                <!--左边橙色矩形-->
                    <div class="orange_bg"></div>
                <!--左边文字部分-->
                    <div class="live_plat">
                        <div class="tit">
                            <h3>直播平台&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="">
                                    <font></font>&nbsp;&nbsp;
                                    <span>查看详情</span>
                                </a>
                            </h3>
                            <h4>一个娱乐化直播演艺社区</h4>
                            <p>旨为用户提供高清、流畅而丰富的互动式视频
                                直播服务，可提供百万人同时在线，产品覆盖
                                PC、Web、移动三端。</p>
                        </div>
                    </div>
                <!--右边部分-->
                    <div class="four_function">
                         <!--图形部分-->
                         <div class="func_img">
                             <div class="img">
                                 <p>四大功能</p>
                                 <ul class="circle_ul">
                                     <li class="orange">实时互动</li>
                                     <li class="">美女圈子</li>
                                     <li class="">美女直播</li>
                                     <li class="">壕礼纷飞</li>
                                 </ul>
                             </div>
                         </div>
                        <!--文字部分-->
                        <div>
                            <div class="good_text">
                                <ul class="list">
                                    <li class="small">高清视频画面，现场音效感知，与艺人主播零距离互动</li>
                                </ul>
                            </div>
                            <div class="good_text">
                                <ul class="list">
                                    <li class="small">小清新、萌妹纸、性感女神、御姐女王，总有一款让你心动</li>
                                </ul>
                            </div>
                            <div class="good_text">
                                <ul class="list">
                                    <li class="small">休闲娱乐必备神器，聊游戏、聊足球、聊八卦、聊人生，寂寞生活，一去不返</li>
                                </ul>
                            </div>
                            <div class="good_text">
                                <ul class="list">
                                    <li class="small">与萌妹子同场竞技，与朋友现场比拼，这里不只是游戏</li>
                                </ul>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

<!--第五屏成功案例-->
    <div class="section section5">
        <div class="pages pages5">
            <div class="cont5_one cont5_fir">
                <div class="pic pic1" title="qwkd.html" style="background: url(<?php echo CDN_SERVER;?>images/homepage/case_pic1.jpg) ">
                    <div class="pic_in" style="background-color: #f5a517;opacity: 0">
                    <h2>移动广告</h2>
                    <p>经过大数据研究分析，为客户提供</p>
                    <p>移动广告精准投放服务</p>
                    </div>
                </div>
                <div class="pic" style="background: url(<?php echo CDN_SERVER;?>images/homepage/case_pic2.jpg)">
                    <div class="pic_in" style="background-color: #f5a517;opacity: 0">
                    <h2>移动广告</h2>
                    <p>经过大数据研究分析，为客户提供</p>
                    <p>移动广告精准投放服务</p>
                    </div>
                </div>
                <div class="pic" style="background: url(<?php echo CDN_SERVER;?>images/homepage/case_pic3.jpg)">
                    <div class="pic_in" style="background-color: #f5a517;opacity: 0">
                        <h2>移动广告</h2>
                        <p>经过大数据研究分析，为客户提供</p>
                        <p>移动广告精准投放服务</p>
                    </div>
                </div>
                <div class="pic" style="background: url(<?php echo CDN_SERVER;?>images/homepage/case_pic4.jpg)">
                    <div class="pic_in" style="background-color: #f5a517;opacity: 0">
                        <h2>移动广告</h2>
                        <p>经过大数据研究分析，为客户提供</p>
                        <p>移动广告精准投放服务</p>
                    </div>
                </div>
                <div class="pic kupao" title="qwkd.html" style="background: url(<?php echo CDN_SERVER;?>images/homepage/case_pic11.jpg);">
                    <div class="pic_in" style="background-color: #f5a517;opacity: 0">
                        <h2>移动广告</h2>
                        <p>经过大数据研究分析，为客户提供</p>
                        <p>移动广告精准投放服务</p>
                    </div>
                </div>
                <div class="pic live" title="<?php echo API_URL;?>?mod=live"   style="background: url(<?php echo CDN_SERVER;?>images/homepage/case_pic6.jpg);cursor: pointer">
                    <div class="pic_in" style="background-color: #f5a517;opacity: 0">
                    <h2>飞虎直播</h2>
                    <p>是一个娱乐化直播演艺社区旨为用</p>
                    <p>户提供高清、流畅而丰富的互动式</p>
                    <p>视频直播服务。</p>
                    </div>
                </div>
                <!--圆点 暂时去掉-->
                   <!-- <ul class="cc">
                        <li class="icon1"><img src="<?php echo CDN_SERVER;?>images/switch_icon_p.png" alt=""></li>
                        <li class="icon2"><img src="<?php echo CDN_SERVER;?>images/switch_icon_n.png" alt=""></li>
                    </ul>-->
            </div>

            <!--第二屏图 暂时去掉-->
           <!-- <div class="cont5_one cont5_two">
                <div class="pic pic1" title="qwkd.html" style="background: url(<?php echo CDN_SERVER;?>images/homepage/case_pic2.jpg)">
                    <h2>游戏业务</h2>
                    <p>经过大数据研究分析，为客户提供</p>
                    <p>移动广告精准投放服务</p>
                </div>
                <div class="pic"  title="qwkd.html" style="background: url(<?php echo CDN_SERVER;?>images/homepage/case_pic3.jpg)">
                    <h2>移动广告</h2>
                    <p>经过大数据研究分析，为客户提供</p>
                    <p>移动广告精准投放服务</p>
                </div>
                <div class="pic"  title="qwkd.html" style="background: url(<?php echo CDN_SERVER;?>images/homepage/case_pic1.jpg)">
                    <h2>移动广告</h2>
                    <p>经过大数据研究分析，为客户提供</p>
                    <p>移动广告精准投放服务</p>
                </div>
                <div class="pic" title="qwkd.html"  style="background: url(<?php echo CDN_SERVER;?>images/homepage/case_pic3.jpg)">
                    <h2>移动广告</h2>
                    <p>经过大数据研究分析，为客户提供</p>
                    <p>移动广告精准投放服务</p>
                </div>
                <div class="pic" title="qwkd.html"  style="background: url(<?php echo CDN_SERVER;?>images/homepage/case_pic2.jpg)">
                    <h2>移动广告</h2>
                    <p>经过大数据研究分析，为客户提供</p>
                    <p>移动广告精准投放服务</p>
                </div>
                <div class="pic"  title="qwkd.html" style="background: url(<?php echo CDN_SERVER;?>images/homepage/case_pic4.jpg)">
                    <h2>移动广告</h2>
                    <p>经过大数据研究分析，为客户提供</p>
                    <p>移动广告精准投放服务</p>
                </div>
                &lt;!&ndash;圆点&ndash;&gt;
                <ul class="cc">
                    <li class="icon1"><img src="<?php echo CDN_SERVER;?>images/switch_icon_n.png" alt=""></li>
                    <li class="icon2"><img src="<?php echo CDN_SERVER;?>images/switch_icon_p.png" alt=""></li>
                </ul>
            </div>-->
        </div>
    </div>

<!--第六屏 团队介绍-->
    <div class="section section6">
        <div class="team_pro">
            <div style="width: 100%;height: auto" class="text">
            <h1>我们</h1>
            <div class="pp">
                <p>我们是一支专业的团队。我们的成员拥有多年的信息安全专业技术背景，来自国内知名广告公司的一线骨干。</p>
                <p>我们是一支年轻的团队。我们的平均年龄仅有26岁，充满了朝气和创新精神。</p>
                <p>我们是一支专注的团队。我们坚信，可靠的品牌源自客户的信任。只有专注，才能赢得信任。</p>
                <p>我们是一支有梦想的团队。我们来自五湖四海，因为一个共同的梦想：做一家真正优秀的企业。</p>
            </div>
            </div>
        </div>
        <div class="foot">
            <div class="foot1">
                 <div class="contact">
                     <div class="con_left">
                         <span><img src="<?php echo CDN_SERVER;?>images/common/image_wechat.png" alt="" style="width: 126px;height: 126px"></span>
                         <ul  class="scan_code">
                             <li>扫一扫</li>
                             <li>关注搜虎微信平台</li>
                         </ul>
                     </div>
                     <div class="con_right">
                         <div style="float: right;text-align: left">
                         <p style="font-size: 16px;">联系方式:</p>
                         <p ><img src="<?php echo CDN_SERVER;?>images/common/footer_icon1.png" alt="" style="width: 14px;height: 14px"><span>&nbsp;&nbsp;0755-26651181</span></p>
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

    </div>
</div><!--大屏滚动效果结束-->
<script src="<?php echo CDN_SERVER;?>js/common.js"></script>
<script src="<?php echo CDN_SERVER;?>js/index.js"></script>
<script src="<?php echo CDN_SERVER;?>js/formValidate.js"></script>
<script src="<?php echo CDN_SERVER;?>js/placeholderfriend.js"></script>
</body>
</html>