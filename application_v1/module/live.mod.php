
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