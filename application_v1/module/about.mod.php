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
                </li>
            </ul>
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