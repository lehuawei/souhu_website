<?php
if(!defined('ACCESS_KEY')){header("HTTP/1.1 404 Not Found");die;}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>版权声明</title>
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/copyright.css">
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
require(APP_PATH.'common/header2.com.php');
?>
<!--中间-->
<article>
    <div class="bg slider" id="jump">
        <div class="white_bg ">
            <h1>版权申明</h1>
            <div class="line"></div>
            <p class="copyright">深圳市搜虎网络科技有限公司对其发行的或与合作伙伴共同发行的作品享有版权，受各国版权法及国际版权公约的保护。
                对于上述版权内容，超越合理使用范畴、并未经本公司书面许可 <br> 的使用行为，我公司均保留追究法律责任的权利。
            </p>
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