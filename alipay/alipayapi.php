<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>支付宝即时到账交易</title>
</head>
<?php
require_once("../inc.php");
require_once("alipay.config.php");
require_once("lib/alipay_submit.class.php");
if(!empty($_POST)) die;
if(!C_CurrUser::isLogin()){
	die('请先登录');
}
if(!isset($_POST['shopId']) || !isset($_POST['payType']) || !isset($_POST['num']) || !isset($_POST['userPId'])){
	die('非法请求');
}
$shopId  = $_POST['shopId'];
$payType = $_POST['payType'];
$num = $_POST['num'];
$userPId = $_POST['num'];
if(empty($shopId) || $shopId<1){
	die('非法请求');
}
if(empty($payType) || $payType<1){
	die('非法请求');
}
if(empty($num) || $num<1){
	die('非法请求');
}
if($userPId<0){
	die('非法请求');
}
class_exists('C_User') or require(APP_PATH.'class/user.class.php');
$currUser = new C_User(C_CurrUser::$userId);
$info = $currUser->userOrder()->userOrder($payType,$shopId,$num);


// /**************************请求参数**************************/
//         //商户订单号，商户网站订单系统中唯一订单号，必填
//         $out_trade_no = $_POST['WIDout_trade_no'];

//         //订单名称，必填
//         $subject = $_POST['WIDsubject'];

//         //付款金额，必填
//         $total_fee = $_POST['WIDtotal_fee'];

//         //商品描述，可空
//         $body = $_POST['WIDbody'];





/************************************************************/

//构造要请求的参数数组，无需改动
$parameter = array(
		"service"       => $alipay_config['service'],
		"partner"       => $alipay_config['partner'],
		"seller_id"  => $alipay_config['seller_id'],
		"payment_type"	=> $alipay_config['payment_type'],
		"notify_url"	=> $alipay_config['notify_url'],
		"return_url"	=> $alipay_config['return_url'],
		"anti_phishing_key"=>$alipay_config['anti_phishing_key'],
		"exter_invoke_ip"=>$alipay_config['exter_invoke_ip'],
		"out_trade_no"	=> $info->billNo,
		"subject"	=> $info->shopName,
		"total_fee"	=> $info->price,
		"body"	=> $info->body,
		"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
);

//建立请求
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
echo $html_text;

?>
</body>
</html>