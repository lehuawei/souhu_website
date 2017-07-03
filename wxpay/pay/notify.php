<?php
ini_set('date.timezone','Asia/Shanghai');
error_reporting(E_ERROR);

require_once "../lib/WxPay.Api.php";
require_once '../lib/WxPay.Notify.php';
require_once 'log.php';

//初始化日志
$logHandler= new CLogFileHandler("../logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);

class PayNotifyCallBack extends WxPayNotify
{
	//查询订单
	public function Queryorder($transaction_id)
	{
		$input = new WxPayOrderQuery();
		$input->SetTransaction_id($transaction_id);
		$result = WxPayApi::orderQuery($input);
		Log::DEBUG("query:" . json_encode($result));
		if(array_key_exists("return_code", $result)
			&& array_key_exists("result_code", $result)
			&& $result["return_code"] == "SUCCESS"
			&& $result["result_code"] == "SUCCESS")
		{

			return true;
		}
		return false;
	}
	
	//重写回调处理函数
	public function NotifyProcess($data, &$msg)
	{
		Log::DEBUG("call back:" . json_encode($data));
		$notfiyOutput = array();
		
		if(!array_key_exists("transaction_id", $data)){
			$msg = "输入参数不正确";
			return false;
		}
		//查询订单，判断订单真实性
		if(!$this->Queryorder($data["transaction_id"])){
			$msg = "订单查询失败";
			return false;
		}
		return true;
	}
}

Log::DEBUG("begin notify:".json_encode(file_get_contents("php://input")));

$postStr = file_get_contents("php://input");
if(empty($postStr)) die;
libxml_disable_entity_loader(true);
$xmlstring = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
$val = json_decode(json_encode($xmlstring),true);
$out_trade_no = $val['out_trade_no'];
Log::DEBUG("begin notify:".$val["transaction_id"]);
$notify = new PayNotifyCallBack();
$r = $notify->Queryorder($val["transaction_id"]);
if($r){
	//发货
	require('../../inc.php');
	$db = DB::connect('DB_USR');
	$sql = "SELECT * FROM userorder WHERE orderId = '".$out_trade_no."'";
	$info = $db->fetch($sql);
	if(empty($info)){
		die;
	}
	$userId = $info->userId;
	$goldNum = $info->goldNum;
	$id = $info->id;
	$payStatus = $info->payStatus;
	if($payStatus!="1"){
		$sql = "UPDATE userorder SET payStatus = '1',payTime = ".time()." WHERE id =".$id;
		$db->exec($sql);
		class_exists('C_User') or require(APP_PATH.'class/user.class.php');
		$currUser = new C_User($userId);
		$currUser->userGold()->addGold($goldNum,3);
	}
}


//$notify->Handle(false);
?>