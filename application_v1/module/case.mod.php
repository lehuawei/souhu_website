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
                <li><span>直播平台</span></li>
            </ul>
        </div>
    </section>
    <section>
        <div class="yd_ad join">
            <h1>MOBILE ADVERTISING</h1>
            <p>移动广告</p>
            <div style="width: 60px;height: 2px;background-color: #575757;margin-top: 24px;"></div>
            <div class="line_one first">
                <div><a href=""><img src="<?php echo CDN_SERVER;?>images/case/case_advert_pic1.jpg" alt=""></a><p>为某公司做的开屏广告</p></div>
                <div><a href=""><img src="<?php echo CDN_SERVER;?>images/case/case_advert_pic3.jpg" ></a><p>为某公司做的插屏广告</p></div>
                <div><a href=""><img src="<?php echo CDN_SERVER;?>images/case/case_advert_pic2.jpg"></a><p>为某公司做的插屏广告</p></div>
            </div>
            <div class="line_one">
                <div><a href=""><img src="<?php echo CDN_SERVER;?>images/case/case_advert_pic4.jpg" ></a><p>为某公司做的插屏广告</p></div>

            </div>
        </div>
        <div class="yd_ad join" style="display: none">
            <h1>LIVE PLATFORM</h1>
            <p>直播平台</p>
            <div style="width: 60px;height: 2px;background-color: #575757;margin-top: 24px;"></div>
            <div class="line_one first">
                <div><a href="?mod=live"><img class="live" src="<?php echo CDN_SERVER;?>images/case/case_zhibo.jpg" alt="" title="live.html"></a><p>飞虎直播</p></div>
            </div>
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