<?php
if(!defined('ACCESS_KEY')){header("HTTP/1.1 404 Not Found");die;}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>加入我们</title>
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/index.css">
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/case.css">
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/join.css">
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
    <div class="banner"><img src="<?php echo CDN_SERVER;?>images/join_us/welfare_banner.jpg" alt="" id="jump"></div>
    <section>
        <div class="black_bar slider">
            <ul>
                <li class="orange"><span>招聘岗位</span></li><img src="<?php echo CDN_SERVER;?>images/common/Split_line.jpg" alt="" height="50px" width="1px" hidden style="display: none">
                <li><span>公司福利</span></li>
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
                    <input type="submit" value="注册"  class="notchk"><br>
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
        <!--招聘岗位-->
        <div class="yd_ad join">
            <h1>RECRUITMENT POST</h1>
            <p>招聘岗位</p>
            <div style="width: 60px;height: 2px;background-color: #575757;margin-top: 24px;"></div>
            <div class="recruit">
                <ul class="title_ul">
                    <li ><span style="text-align: left">职位名称</span></li>
                    <li class="di "><span>工作地点</span></li>
                    <li class="di"><span>人数</span></li>
                    <li class="di"><span>发布时间</span></li>
                    <li class="di"><span>职位详情</span></li>
                </ul>
                <div class="fat_line"></div>
                <ul class="android_ul">
                    <li class="long_text sell" style="text-align: left"><span>运营推广</span></li>
                    <li class="short_text address"><span>深圳</span></li>
                    <li class="short_text"><span>3</span></li>
                    <li class="short_text time"><span>2016-12-20</span></li>
                    <li class="post short_text" title="0"><span>查看详细</span></li>
                </ul>
                <div class="thin_line"></div>
                <div class="post_detail">
                    <h3>职位描述:</h3>
                    <p>1.负责客户关系维护，开拓和发展新的客户关系;
                        <br>
                        2.产品推广工作支持，进行平台资源统筹工作推进;
                        <br>
                        3.协助完成部门工作任务。<br>
                    </p>
                    <h3>任职要求:</h3>
                    <p>1.熟悉电脑操作，熟练使用办公软件; <br>
                        2.熟悉网络推广，对销售工作有意向;<br>
                        3.具备良好的沟通能力、学习能力、独立工作能力;<br>
                        4.稳定性强，在深圳长期发展为佳。<br>
                        <br>
                    </p>
                </div>
                <ul class="android_ul">
                    <li class="long_text"><span>android高级逆向工程师</span></li>
                    <li class="short_text address"><span>深圳</span></li>
                    <li class="short_text"><span>1</span></li>
                    <li class="short_text time"><span>2016-12-20</span></li>
                    <li class="post short_text" title="1"><span>查看详细</span></li>
                </ul>
                <div class="thin_line"></div>
                <div class="post_detail">
                    <h3>职位描述:</h3>
                    <p>1.负责软件的逆向分析、开发工作；<br>
                        2.负责配合产品线开发工程师的软件开发工作；<br>
                        3.负责对技术预研难点进行攻关；<br>
                        4.负责其它技术相关工作。<br>
                    </p>
                    <h3>任职要求:</h3>
                    <p>1.计算机科学、计算机工程或电子信息工程或相关专业本科以上学历，英语四级或以上; <br>
                        2.精通C、C++语言，熟悉VC编程环境；有2-3年或以上软件开发相关经验者优先;<br>
                        3.对软件逆向领域和软件安全领域有强烈的爱好，有较强的程序反汇编技术和逆向分析能力;<br>
                        4.精通X86/ARM汇编指令体系，熟练理解汇编代码, 掌握C/C++，熟悉PE/ELF文件格式，熟练掌握IDA、OllyDbg等调试、逆向工具;<br>
                        5.解Android底层运行机制;<br>
                        6.熟悉常见压缩算法和加密算法；-熟悉软件逆向分析流程，能够独立完成技术预研开发工作;<br>
                        7.有较好地团队合作和吃苦耐劳的精神，能承受较强的工作压力，虚心好学、事业心强。<br>
                        <br>
                    </p>
                </div>
                <ul class="android_ul">
                    <li class="long_text"><span>android中级逆向工程师</span></li>
                    <li class="short_text address"><span>深圳</span></li>
                    <li class="short_text"><span>1</span></li>
                    <li class="short_text time"><span>2016-12-20</span></li>
                    <li class="post short_text" title="2"><span>查看详细</span></li>
                </ul>
                <div class="thin_line"></div>
                <div class="post_detail">
                    <h3>职位描述:</h3>
                    <p>1.负责软件的逆向分析、开发工作；<br>
                        2.负责配合产品线开发工程师的软件开发工作；<br>
                        3.负责对技术预研难点进行攻关；<br>
                        4.负责其它技术相关工作。<br>
                    </p>
                    <h3>任职要求:</h3>
                    <p>1.计算机科学、计算机工程或电子信息工程或相关专业本科以上学历，英语四级或以上; <br>
                        2.精通C、C++语言，熟悉VC编程环境；有2-3年或以上软件开发相关经验者优先;<br>
                        3.对软件逆向领域和软件安全领域有强烈的爱好，有较强的程序反汇编技术和逆向分析能力;<br>
                        4.精通X86/ARM汇编指令体系，熟练理解汇编代码, 掌握C/C++，熟悉PE/ELF文件格式，熟练掌握IDA、OllyDbg等调试、逆向工具;<br>
                        5.解Android底层运行机制;<br>
                        6.熟悉常见压缩算法和加密算法；-熟悉软件逆向分析流程，能够独立完成技术预研开发工作;<br>
                        7.有较好地团队合作和吃苦耐劳的精神，能承受较强的工作压力，虚心好学、事业心强。<br>
                        <br>
                    </p>
                </div>
                <ul class="android_ul">
                    <li class="long_text"><span>产品经理</span></li>
                    <li class="short_text address"><span>深圳</span></li>
                    <li class="short_text"><span>1</span></li>
                    <li class="short_text time"><span>2016-12-20</span></li>
                    <li class="post short_text" title="3"><span>查看详细</span></li>
                </ul>
                <div class="thin_line"></div>
                <div class="post_detail">
                    <h3>职位描述:</h3>
                    <p>1.市场调研：调研客户需求; <br>
                        2.需求分析：形成MRD文档（市场需求分析文档）;<br>
                        3.产品规划：根据市场需求和分享规划产品发展路线，设计产品商业和服务模式，并定义相关功能模块;<br>
                        4.产品开发：组织公司开发等相关资源立项开发，并跟进开发进度;<br>
                        5.产品定价：产品开发完成后进行产品定价;<br>
                        6.产品推广：配合销售部进行产品推广策划;<br>
                        7.日常产品管理：管理日常中出现的bug等问题。<br>

                    </p>

                    <h3>任职要求:</h3>
                    <p>1.2年以上产品经理相关工作经验者优先；计算机相关专业优先;<br>
                        2.熟悉产品管理的各个方面，包括用户调研，需求分析，产品研发及实施的全流程，数据统计与跟踪;<br>
                        3.注重细节，能够琢磨每一个文案，用户体验至上;<br>
                        4.良好的产品文档撰写能力，理解技术语言；<br>
                        5.良好的沟通能力和独立判断能力，思路清晰。<br>
                        <br>
                    </p>
                </div>
                <ul class="android_ul">
                    <li class="long_text"><span>活动策划专员</span></li>
                    <li class="short_text address"><span>深圳</span></li>
                    <li class="short_text"><span>1</span></li>
                    <li class="short_text time"><span>2016-12-20</span></li>
                    <li class="post short_text" title="4"><span>查看详细</span></li>
                </ul>
                <div class="thin_line"></div>
                <div class="post_detail">
                    <h3>职位描述:</h3>
                    <p> 1、负责线上营销推广，策划活动方案并协调推进执行;<br>
                        2、通过数据分析，对于活动效果进行数据分析总结优化;<br>
                        3. 利用创意、媒介、渠道、技术等不同方式进行项目营销、推广;<br>
                        4. 建立有效的活动策划及运营手段，不断改进活动计划，提升用户活跃度。<br>
                        <br>
                    </p>
                    <h3>任职要求:</h3>
                    <p> 1.1年以上互联网行业活动策划工作经验; <br>
                        2.优秀的文字能力，流畅的撰写稿件和方案;<br>
                        3.熟练掌握创意活动策划、执行、成本控制等特征;<br>
                        4.工作态度认真，有责任心，强大的执行能力。<br>
                        <br>
                    </p>
                </div>
            </div>
        </div>
        <!--公司福利-->
        <div class="yd_ad join" style="display: none">
            <h1>COMPANY WELFARE</h1>
            <p>公司福利</p>
            <div style="width: 60px;height: 2px;background-color: #575757;margin-top: 24px; "></div>

            <div class="welfare">
                <div class="happy like">
                    <img src="<?php echo CDN_SERVER;?>images/join_us/welfare/welfare_pic1.png" alt="">
                    <div class="low sgz"><p>室内娱乐</p></div>
                </div>
                <div class="tea like even">
                    <img src="<?php echo CDN_SERVER;?>images/join_us/welfare/welfare_pic2.png" alt="">
                    <div class="low"><p>下午茶时光</p></div>
                </div>
                <div class="party like">
                    <img src="<?php echo CDN_SERVER;?>images/join_us/welfare/welfare_pic3.png" alt="">
                    <div class="low sgz"><p>员工聚餐</p></div>
                </div>
                <div class="work like even">
                    <img src="<?php echo CDN_SERVER;?>images/join_us/welfare/welfare_pic4.png" alt="">
                    <div class="work_day"><p>7.5小时工<br>作日双休</p></div>
                </div>
                <div class="birthday like">
                    <img src="<?php echo CDN_SERVER;?>images/join_us/welfare/welfare_pic5.png" alt="">
                    <div class="low sgz"><p>员工生日</p></div>
                </div>
                <div class="tour like even">
                    <img src="<?php echo CDN_SERVER;?>images/join_us/welfare/welfare_pic6.png" alt="">
                    <div class="low sgz"><p>年度旅游</p></div>
                </div>
            </div>
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