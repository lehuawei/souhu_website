<?php

/****
*支付界面
**/

require_once('inc.php');
if(empty($_POST)) die('提交数据为空');
if(!C_CurrUser::isLogin()){
	die('请先登录');
}

if(!isset($_POST['payType']) || !isset($_POST['price']) || !isset($_POST['userPId'])){
	die('非法请求');
}
$payType = $_POST['payType'];
$price = $_POST['price'];
$userPId = $_POST['userPId'];
if(empty($price) || $price<1){
	die('非法请求');
}
if(empty($payType) || $payType<1){
	die('非法请求');
}
if($userPId<0){
	die('非法请求');
}

/****
*错误代码
*1001：搜虎币不足
*1002:搜币充值失败
*1003:生成订单号失败
*1004:微信订单生成失败
*/
//payType=2&price=10&userPId=0

class_exists('C_User') or require(APP_PATH.'class/user.class.php');

$currUser = new C_User(C_CurrUser::$userId);
if($payType == 1){
    //搜币给直播充值
    if($currUser->userGold()->prePay($price)){
        if($currUser->userProdurce()->userPay($userPId,$price,$price)){
            echo "0";exit;
        }
        else{
            echo "1002";
        }
    }
    else{
        echo "1001";exit;
    }
}
else{
    //生成订单号
    $db = DB::connect("DB_USR");
    $billNo = time().mt_rand(10000,99999);
    $num = $price*100;
    $shopName = "";
    if($userPId == 0){
        $shopName = $num."搜币";
    }else
        $shopName = $num."飞虎币";
    $sql = "INSERT INTO userOrder(userId,orderId,amount,goldNum,pId,shopId,payType,payStatus,orderTime)VALUES(".C_CurrUser::$userId.",'".$billNo."',".$price.",".$num.",".$userPId.",".$price.",".$payType.",0,".time().")";
    //var_dump($sql);
    $id = $db->execFetchId($sql);
    if($id>0){
        if($payType == 2){
            //支付宝
            //$price = 0.01;
            require_once(ROOT_PATH."alipay/alipay.config.php");
            require_once(ROOT_PATH."alipay/lib/alipay_submit.class.php");
            $parameter = array(
                "service"       => $alipay_config['service'],
                "partner"       => $alipay_config['partner'],
                "seller_id"  => $alipay_config['seller_id'],
                "payment_type"	=> $alipay_config['payment_type'],
                "notify_url"	=> $alipay_config['notify_url'],
                "return_url"	=> $alipay_config['return_url'],
                "anti_phishing_key"=>$alipay_config['anti_phishing_key'],
                "exter_invoke_ip"=>$alipay_config['exter_invoke_ip'],
                "out_trade_no"	=> $billNo,
                "subject"	=> $shopName,
                "total_fee"	=> $price,
                "body"	=> '',
                "_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
            );
                //建立请求
            $alipaySubmit = new AlipaySubmit($alipay_config);
            $html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
            echo $html_text;
        }else{
            //微信支付
            //$price = $price*100;
             
            require_once(ROOT_PATH."wxpay/lib/WxPay.Api.php");
            require_once(ROOT_PATH."wxpay/pay/WxPay.NativePay.php");
            require_once(ROOT_PATH.'wxpay/pay/log.php');
            $notify = new NativePay();
            $input = new WxPayUnifiedOrder();
            $input->SetBody($shopName);
            $input->SetAttach('');
            $input->SetOut_trade_no($billNo);
            $input->SetTotal_fee($price*100);
            $input->SetTime_start(date("YmdHis"));
            $input->SetTime_expire(date("YmdHis", time() + 600));
            $input->SetGoods_tag('');
            $input->SetNotify_url("https://www.chinasouhu.net/wxpay/pay/notify.php");
            $input->SetTrade_type("NATIVE");
            $input->SetProduct_id($price);
            $result = $notify->GetPayUrl($input);
           // var_dump($result);die;
            $url = $result["code_url"];
            $returnData = new stdclass;
            if(empty($url)){
                $returnData->code = 1004;
                echo json_encode($returnData);exit;
//                echo "1004";exit;
            }
            $prepay_id = $result['prepay_id'];
            //wx20170421190502ffdde12c230295687298
            $returnData->code = 0;
            $returnData->billNo = $billNo;
            $returnData->prepay_id=$prepay_id;
            $returnData->url = "https://www.chinasouhu.net/wxpay/pay/qrcode.php?data=".urlencode($url);
            echo json_encode($returnData);exit;
            
        }
    }
    else{
        echo "1003";exit;
    }
}
?>