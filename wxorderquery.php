<?php
require('inc.php');
ini_set('date.timezone','Asia/Shanghai');
error_reporting(E_ERROR);
require_once ROOT_PATH."wxpay/lib/WxPay.Api.php";
require_once ROOT_PATH.'wxpay/pay/log.php';

//初始化日志
$logHandler= new CLogFileHandler("log/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);

// function printf_info($data)
// {
//     foreach($data as $key=>$value){
//         echo "<font color='#f00;'>$key</font> : $value <br/>";
//     }
// }


// if(isset($_REQUEST["transaction_id"]) && $_REQUEST["transaction_id"] != ""){
// 	$transaction_id = $_REQUEST["transaction_id"];
// 	$input = new WxPayOrderQuery();
// 	$input->SetTransaction_id($transaction_id);
// 	printf_info(WxPayApi::orderQuery($input));
// 	exit();
// }

if(isset($_REQUEST["out_trade_no"]) && $_REQUEST["out_trade_no"] != ""){
	$out_trade_no = $_REQUEST["out_trade_no"];
	$input = new WxPayOrderQuery();
	$input->SetOut_trade_no($out_trade_no);
    $result = WxPayApi::orderQuery($input);
    $trade_state = $result['trade_state'];
    echo $trade_state;
	exit();
}
?>
