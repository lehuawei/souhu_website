<?php
//鉴权
if(!defined('ACCESS_KEY')){header("HTTP/1.1 404 Not Found");die;}
class_exists('C_User') or require(APP_PATH.'class/user.class.php');
?>
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
<!--弹出框的背景-->
<div class="opacity_color"></div>
<!--选择账号弹出框-->
<div class="pop_cho">
    <div class="close"><img src="<?php echo CDN_SERVER;?>images/recharge_Manage/icon-close.png" alt=""></div>
    <ul>
        <li class=" txt_sty"><span>添加账号</span></li>
    </ul>
    <div class="cho_user">
        <?php
            //获取系统产品列表
            class_exists('C_Sys') or require(APP_PATH.'class/sys.class.php');
            $sysProdurceList = C_Sys::getSysProdurceList();
        ?>
        <form action="javascript:void(0)" class="reg_form form_four">
            <span  class="phone_txt" >选择账号类型</span><span class="red">123</span><br>
            <select id="st_produrce">
                <?php
                    if(!empty($sysProdurceList)){
                        foreach($sysProdurceList as $row){
                ?>
                    <option value="<?php echo $row->pId;?>"><?php echo $row->pName;?></option>
                <?
                        }
                    }
                ?>
            </select>
            <span  class="phone_txt" >账号登录</span><br>
            <input type="text" placeholder="账号" class="phonenumber">
            <input type="password" placeholder="密码" class="password">
            <button type="submit" class="btn_sub">添加账号</button>
        </form>
        <div class="another_log">
            <!--第三方登录-->
        </div>
    </div>
</div>
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
        </ul>
        <!--导航内容-->
        <!--1 个人信息-->
        <div class="user_info user_ul_div"  style="display:block">
            <div class="info_one">
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
            </ul>
              <?php
            //获取用户的产品列表
                $userProdurceList = $currUser->userProdurce()->getUserProdurceList();
              ?>
            <div class="acc_head">
                <ul class="person_ul">
                    <?php
                        if(!empty($userProdurceList)){
                            foreach($userProdurceList as $row){
                    ?>
                         <li>
                        <span class="hp_span"><img src="<?php echo $row->pHeadUrl;?>" alt=""></span>
                            <span class="pro_span"><h3><?php echo $row->pnickName;?><img src="<?php echo CDN_SERVER;?>images/recharge_Manage/<?php if($row->gender == 0){echo "girl";}else{ echo "boy";}?>.png" alt=""> </h3>飞虎账号:123456</span>
                        </li>
                    <?

                           }
                        }
                    ?>
                </ul>
                <span class="add_img"><img src="<?php echo CDN_SERVER;?>images/recharge_Manage/icon-and.png" alt=""> 添加账号</span>
            </div>
        </div>

    <!--3账号安全-->
        <div class="acc_save user_ul_div"  style="display:none">
             <!--安全指数-->
            <div class="reliable_index">
                <p>安全指数: <span class="orange_span"></span> <span class="orange_span"></span> <span class="grey_span" id="chgCol_span"></span>
                    <a href="<?php echo API_URL;?>?mod=modify_pass" target="_blank"><i>修改密码</i></a>
                </p>
            </div>
            <!--付款方式-->
            <div class="reliable_index pay_way">
                <h3>付款方式</h3>
            </div>
            <ul class="payway_ul">
                <li class="active_p">
                    <span class="icon"></span>
                    <span class="alipay"></span>
                </li>
                <li>
                    <span class="icon"></span>
                    <span class="weixin"></span>
                </li>
                <h3>设置默认方式</h3>
            </ul>
        </div>
      <!--4搜币-->
        <div class="coin user_ul_div"  style="display:none">
            <div class="reliable_index ">
                <p>搜虎币</p>
            </div>
            <h1><?php echo $currUser->userGold()->userGold();?></h1>
            <h3 class="sh_b">
                <span style="margin-left: 10px">搜币</span>
                <span class="coin_cz">
                        <a href="<?php echo API_URL;?>?mod=acc_recharge" class=""><button>搜虎币充值</button></a>
                        <a href="<?php echo API_URL;?>?mod=acc_recharge"><button>飞虎币充值</button></a>
                        <a href="<?php echo API_URL;?>?mod=acc_recharge"><button>游戏充值</button></a>
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

                <?php

                ?>

                <!--<tr>
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
                </tr>-->
            </table>
        </div>
    </div>
</div>
</article>
<!--底部导航-->
<?php
require(APP_PATH.'common/footer.com.php');
?>
<!--引入js-->
<script src="<?php echo CDN_SERVER;?>js/formValidate.js"></script>
<script src="<?php echo CDN_SERVER;?>js/common.js"></script>
<script language="javascript">
    $(function(){
        //点击添加账户
        $(".add_img").click(function () {
            $(".pop_cho").css("display","block");
            $(".opacity_color").css("display",'block');
        });
        //点击关闭
        $(".close").click(function(){
            $(this).parent().css("display","none");
            $(".opacity_color").css("display",'none');
        });
        //验证密码强度
        if(localStorage.ifStrong==true){
            $("#chgCol_span").addClass('orange_span').removeClass('grey_span');
        }
        console.log('登录密码是否强'+localStorage.ifStrong);
        var modify_ifStrong=localStorage.modify_ifStrong;
        console.log('修改密码是否强'+modify_ifStrong);
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
        //拉取用户信息（获得城市列表）
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
</body>
</html>