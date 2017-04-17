<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户中心</title>
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/reg_log.css">
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/acc_recharge.css">
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/user_Center.css">
    <link rel="stylesheet" href="<?php echo CDN_SERVER;?>css/index.css">

    <script src="<?php echo CDN_SERVER;?>js/jquery-1.9.1.js"></script>
    <script src="<?php echo CDN_SERVER;?>js/placeholderfriend.js"></script>
    <script type="text/javascript" src="<?php echo CDN_SERVER;?>js/jquery.cityselect.js"></script>
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

<!--充值中心-->
<article>
<div class="recharge_bg">
    <div class="recharge_wh">
        <!--顶部导航-->
        <ul class="user_ul">
            <li class="active_t"><span>个人信息</span></li>
            <li><span>产品管理</span></li>
            <li><span>账号安全</span></li>
            <li><span>搜虎币</span></li>
            <li><span>我的消息</span></li>
        </ul>
        <!--导航内容-->
        <!--1 个人信息-->
        <div class="user_info user_ul_div"  style="display:block">
            <div class="info_one">
                <img class="tx_img" src="<?php echo CDN_SERVER;?>images/recharge_Manage/girl.jpg" alt="" width="132px" height="132px" >
                <table>
                    <tr>
                        <td style="font-size: 20px">Muse</td>
                    </tr>
                    <tr>
                        <td>飞虎账号</td>
                    </tr>
                    <tr>
                        <td>账户余额: <em>10</em>元 <a href="acc_recharge.php"><img src="<?php echo CDN_SERVER;?>images/person_Info/icon-top-up.png" alt=""> </a></td>
                    </tr>
                    <tr>
                        <td>今天天气好晴朗</td>
                    </tr>
                </table>
                <span class="edit_datum"><img src="<?php echo CDN_SERVER;?>images/person_Info/icon-modification.png" alt="">编辑资料</span>
            </div>
            <div class="info_two">
                <h4>个人资料</h4>
                <table cellspacing="0" cellpadding="0"  class="table_two">
                    <tr>
                        <td class="td_one">真实姓名: <input type="text" value="乐花薇" disabled class="userName"> </td>
                        <td class="td_two">性别:
                            <select name="" id=""  class="userGender"  disabled="disabled" >
                                <option value="0">女</option>
                                <option value="1">男</option>
                            </select>
                        </td>
                        <td class="td_three">身份证号:<input type="text" value="200122455941235561" disabled class="userId"></td>
                    </tr>
                    <tr>
                        <td class="td_one" id="city">所在地区:
                            <select class="prov" disabled ></select>
                            <select class="city" disabled ></select>
                        </td>
                        <td class="td_two">地址:<input type="text" value="深圳宝安区智恒产业园" disabled class="userAddress"></td>
                        <td class="td_three"><input type="text" value="" disabled></td>
                    </tr>
                </table>
            </div>
            <div style="text-align: center;margin-bottom: 200px;  visibility: hidden" class="btn_div" >
                <button type="submit" class="cancel" >取消</button>
                <button type="submit" class="save">保存</button>
            </div>
        </div>

        <!--2产品管理-->
        <div class="pro_Man user_ul_div" style="display: none">
            <ul class="game_ul">
                <li class="active_g">飞虎直播</li>
                <li>游戏二</li>
                <li>游戏三</li>
                <li>游戏四</li>
            </ul>
        <div class="game_one game">
            <div class="live_game">
                <img src="<?php echo CDN_SERVER;?>images/product_Manage/live_girl.jpg" alt="" class="live_girl">
                <table>
                    <tr>
                        <td> <h3>快来聊天吧</h3></td>
                    </tr>
                    <tr>
                        <td><h3> Romantic</h3></td>
                    </tr>
                    <tr>
                        <td><img src="<?php echo CDN_SERVER;?>images/product_Manage/icon-time.png" alt="">已开播120分钟 <img src="<?php echo CDN_SERVER;?>images/product_Manage/icon-audience.png" alt="">1248934 </td>
                    </tr>
                    <tr>
                        <td><a href=""><img src="<?php echo CDN_SERVER;?>images/product_Manage/icon-watch.png" alt=""></a></td>
                    </tr>
                </table>
            </div>
            <div class="live_game" >
                <img src="<?php echo CDN_SERVER;?>images/product_Manage/live_girl.jpg" alt="" class="live_girl">
                <table>
                    <tr>
                        <td> <h3>快来聊天吧</h3></td>
                    </tr>
                    <tr>
                        <td><h3>Eric</h3></td>
                    </tr>
                    <tr>
                        <td><img src="<?php echo CDN_SERVER;?>images/product_Manage/icon-time.png" alt="">已开播120分钟 <img src="<?php echo CDN_SERVER;?>images/product_Manage/icon-audience.png" alt="">322553 </td>
                    </tr>
                    <tr>
                        <td><a href=""><img src="<?php echo CDN_SERVER;?>images/product_Manage/icon-watch.png" alt=""></a></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="game" style="display: none"><span>游戏2</span></div>
        <div class="game" style="display: none"><span>游戏3</span></div>
        <div class="game" style="display: none"><span>游戏4</span></div>
        </div>

    <!--3账号安全-->
        <div class="acc_save user_ul_div"  style="display:none">
             <!--安全指数-->
            <div class="reliable_index">
                <p>安全指数: <span class="orange_span"></span> <span class="orange_span"></span> <span class="grey_span" id="chgCol_span"></span>
                    <a href="<?php echo CDN_SERVER;?>modify_pass.html" target="_blank"><i>修改密码</i></a>
                </p>
            </div>
            <!--设置隐私-->
            <div class="reliable_index set_secret">
                <h3>设置隐私</h3>
            </div>
            <ul class="secret_ul">
                <li><img src="<?php echo CDN_SERVER;?>images/account_Safe/icon-weixin.png" alt=""><h4>绑定微信账号</h4></li>
                <li><img src="<?php echo CDN_SERVER;?>images/account_Safe/icon-weibo.png" alt=""><h4>绑定微博账号</h4></li>
                <li><img src="<?php echo CDN_SERVER;?>images/account_Safe/icon-qq-selected.png" alt=""><h4><em>Muse </em>[解绑]</h4></li>
            </ul>
            <!--付款方式-->
            <div class="reliable_index pay_way">
                <h3>付款方式</h3>
            </div>
            <ul class="payway_ul">
                <li class="active_p">
                    <span class="icon"></span><!--<img src="images/account_Safe/icon-selected.png" alt="" class="icon_img">-->
                    <span class="alipay"></span><!--<img class="pay_img"src="images/account_Safe/icon-zhifubao.png" alt="">-->
                </li>
                <li>
                    <span class="icon"></span>
                    <span class="weixin"></span>
                </li>
                <li>
                    <span class="icon"></span>
                    <span class="yinlian"></span>
                </li>
                <h3>设置默认方式</h3>
            </ul>
        </div>
      <!--4搜币-->
        <div class="coin user_ul_div"  style="display:none">
            <div class="reliable_index ">
                <p>搜虎币</p>
            </div>
            <h1>500</h1>
            <h3 class="sh_b">
                <span style="margin-left: 10px">搜币</span>
                <span class="coin_cz">
                        <a href="acc_recharge.mod.php" class=""><button>搜虎币充值</button></a>
                        <a href="acc_recharge.mod.php"><button>飞虎币充值</button></a>
                        <a href="acc_recharge.mod.php"><button>游戏充值</button></a>
                </span>
            </h3>
            <!--交易明细-->
            <div class="reliable_index ">
                <p>最近十笔搜虎币交易明细</span>
                    <a href=""><i>查看全部订单</i></a>
                </p>
            </div>
            <!--充值历史-->
            <h3 class="rec_his"><span style="margin-right: 20px">充值历史</span>
                <select name="" id="year">
                    <option value="2017">2017</option>
                </select> 年
                <select name="" id="mouth">
                    <option value="1">1</option>
                </select> 月
                <button class="seek"> <img src="<?php echo CDN_SERVER;?>images/souhu_Coin/icon-seek.png" alt="" style="margin-right: 10px">查询</button>
                <button class="del">批量管理</button>
            </h3>
            <table class="detail" cellpadding="0" cellspacing="0">
                <tr>
                    <th class="one">流水号</th>
                    <th class="two">时间</th>
                    <th class="three">类型</th>
                    <th class="four">金额</th>
                    <th class="five" style="text-align: center" >
                        <span  class="che_a all_sel"><input hidden type="checkbox"  class="che_ipt" style="" checked/></span>
                        <span style="color: #b6b6b6;font-size: 14px" class="all">全选</span>
                    </th>
                </tr>
                <tr>
                    <td class="one">234134</td>
                    <td class="two">2017/1/20 20:00:00</td>
                    <td class="three">虎币</td>
                    <td class="four">520.00</td>
                    <td class="five" >
                        <span  class="che_a">
                        <input hidden type="checkbox"  class="che_ipt" checked /></span>
                    </td>
                </tr>
                <tr>
                    <td>234134</td>
                    <td>2017/1/20 20:00:00</td>
                    <td>虎币</td>
                    <td>520.00</td>
                    <td  class="five">
                         <span  class="che_a">
                        <input hidden type="checkbox"  class="che_ipt" checked /></span>
                    </td>
                </tr>
                <tr>
                    <td>234134</td>
                    <td>2017/1/20 20:00:00</td>
                    <td>虎币</td>
                    <td>520.00</td>
                    <td  class="five">
                         <span  class="che_a">
                        <input hidden type="checkbox"  class="che_ipt" checked /></span>
                    </td>
                </tr>
            </table>
        </div>
        <!--5我的消息-->
        <div class="my_Mess user_ul_div clearfix"  style="display: none">
            <ul class="game_ul">
                <li class="active_g">系统消息</li>
                <li>私信</li>
            </ul>
            <!--系统消息-->
            <div class="sys_mess one">
                <div style="margin-left: 30px;height: 26px">
                <span  class="che_a all_sel"><input hidden type="checkbox"  class="che_ipt" style="" checked/></span>
                <span style="color: #b6b6b6;font-size: 14px" class="all">全选</span>
                <button class="del">批量管理</button>
                </div>
                <ul class="mess_ul">
                    <li class="active_x">
                        <span  class="che_a"><input hidden type="checkbox"  class="che_ipt" style="" checked/></span>
                        <h4 style="">飞虎直播</h4> <em>3-16   12:01</em>
                        <p>
                            <span class="user_n">尊敬的用户muse</span>，
                            <span class="welcome">欢迎您来到飞虎直播平台，您已获得由系统送出的10搜虎币（前往领取），希望您...</span>
                        </p>
                    </li>
                    <li>
                        <span  class="che_a"><input hidden type="checkbox"  class="che_ipt" style="" checked/></span>
                        <h4 style="">飞虎直播</h4> <em>3-16   12:01</em>
                        <p>
                            <span class="user_n">尊敬的用户Lisa</span>，
                            <span class="welcome">欢迎您来到飞虎直播平台，您已获得由系统送出的20搜虎币（前往领取），希望您...</span>
                        </p>
                    </li>
                    <li>
                        <span  class="che_a"><input hidden type="checkbox"  class="che_ipt" style="" checked/></span>
                        <h4 style="">飞虎直播</h4> <em>3-16   12:01</em>
                        <p>
                            <span class="user_n">尊敬的用户Romantic</span>，
                            <span class="welcome">欢迎您来到飞虎直播平台，您已获得由系统送出的30搜虎币（前往领取），希望您...</span>
                        </p>
                    </li>
                </ul>
            </div>
            <!--私信-->
            <div class="sys_mess pri_letter" style="display: none">
                <div style="margin-left: 30px;height: 26px">
                    <span  class="che_a all_sel"><input hidden type="checkbox"  class="che_ipt" style="" checked/></span>
                    <span style="color: #b6b6b6;font-size: 14px" class="all">全选</span>
                    <button class="del">批量管理</button>
                </div>
                <ul class="mess_ul">
                    <li class="active_x">
                        <span  class="che_a"><input hidden type="checkbox"  class="che_ipt" style="" checked/></span>
                        <h4 style="">飞虎直播</h4> <em>3-16   12:01</em>
                        <p>
                            <span class="user_n">尊敬的用户muse</span>，
                            <span class="welcome">快来看呀~！</span>
                        </p>
                    </li>
                    <li>
                        <span  class="che_a"><input hidden type="checkbox"  class="che_ipt" style="" checked/></span>
                        <h4 style="">飞虎直播</h4> <em>3-16   12:01</em>
                        <p>
                            <span class="user_n">尊敬的用户Lisa</span>，
                            <span class="welcome">欢迎您来到飞虎直播平台，您已获得由系统送出的20搜虎币（前往领取），希望您...</span>
                        </p>
                    </li>
                    <li>
                        <span  class="che_a"><input hidden type="checkbox"  class="che_ipt" style="" checked/></span>
                        <h4 style="">飞虎直播</h4> <em>3-16   12:01</em>
                        <p>
                            <span class="user_n">尊敬的用户Romantic</span>，
                            <span class="welcome">欢迎您来到飞虎直播平台，您已获得由系统送出的30搜虎币（前往领取），希望您...</span>
                        </p>
                    </li>
                </ul>
            </div>
            <!--竖线-->
            <div class="ver_line"></div>
            <!--消息详情-->
            <div class="mess_detail">
                 <div class="mess">
                     <p class="fh_tit"><img src="<?php echo CDN_SERVER;?>images/case_detail/case_detail_pic1.png" alt="" width="68px" height="68px">
                        <span>飞虎直播</span> <em class="time">3-16   12:01</em>
                     </p>
                     <p class="main">
                         <strong>尊敬的用户Muse:</strong> <br>
                         <span>欢迎您来到飞虎直播平台，您已获得由系统送出的10搜虎币（前往领取），希望您生活愉快!</span>
                     </p>
                 </div>
            </div>
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
</body>
<script src="<?php echo CDN_SERVER;?>js/formValidate.js"></script>
<script src="<?php echo CDN_SERVER;?>js/common.js"></script>
<script language="javascript">
    $(function(){
        var ifStrong=localStorage.ifStrong;
        if(ifStrong==true){
            $("#chgCol_span").addClass('orange_span').removeClass('grey_span');
        }
        //console.log(ifStrong);
        var modify_ifStrong=localStorage.modify_ifStrong;
        console.log(modify_ifStrong);
        switch(modify_ifStrong)
        {
            case "true":
                $('#chgCol_span').addClass('orange_span').removeClass('grey_span');
                break;
            case "false":
                $("#chgCol_span").addClass('grey_span').removeClass('orange_span');
                break;
            default:
        }
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
                $(".userName").val(data.trueName);
                $(".userGender").val(data.sex);
                $(".userId").val(data.idCardNo);
                $(".prov").val(data.provinceId);
                $(".city").val(data.cityId);
                $('.userAddress').val(data.address);
                var settings=$.extend({
                    url:"js/city.min.js",
                    prov:data.provinceId,
                    city:data.cityId,
                    dist:null,
                    nodata:null,
                    disNum:0,
                    required:true
                },settings);
                $("#city").citySelect(settings);
            }
        });
        //点击取消
        $(".cancel").click(function (){
            $(".userName").val(data.trueName);
            $(".userGender").val(data.sex);
            $(".userId").val(data.idCardNo);
            $(".prov").val(data.provinceId);
            $(".city").val(data.cityId);
            $('.userAddress').val(data.address);
            var settings=$.extend({
                url:"js/city.min.js",
                prov:data.provinceId,
                city:data.cityId,
                dist:null,
                nodata:null,
                disNum:0,
                required:true
            },settings);
            $("#city").citySelect(settings);
        });
    });
</script>
</html>