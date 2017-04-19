<?php
if(!defined('ACCESS_KEY')){header("HTTP/1.1 404 Not Found");die;}
class C_Com
{
	public static function apiResult($code,$data='')
	{
		//实例化一个类
		$result = new stdClass;
		$result->CODE = $code;
		$result->DATA = new stdClass;
		if(self::isError($code)) $result->DATA->ERRMSG = self::getErrorMessage($code);
		else{
			$result->DATA->RESULT = $data;
		}
		// if(!empty(C_GlobalVar::$apiVer)){
		// 		$result->DATA->apiVer = C_GlobalVar::$apiVer;
		// }C_Com::apiResponse(C_Com::apiResult(-1005));
		$result->VERSION = APP_VERSION;
		$result->EXECTIME = self::microtime_float()-APP_START_MTIME;
		$result->NOW = time();
		//$r = json_encode($result);
		//$result->JSON = $r;
       self::debugLog('apiResult.log',json_encode($result));
		return (object)$result;
	}
	public static function apiResponse($result)
	{
		//echo '<pre>';
		//print_r($result);
		self::debugLog('apiResult.log',json_encode($result));
		echo json_encode($result);
		exit;
	}
	public static function apiResponseEncode($code,$data=''){
		
		// $result = new stdClass;
		// $result->CODE = $code;
		// $result->DATA = new stdClass;
		// if(self::isError($code)) $result->DATA->ERRMSG = self::getErrorMessage($code);
		// else{
		// 	$result->DATA->RESULT = $data;
		// }
		// $result->EXECTIME = self::microtime_float()-APP_START_MTIME;
		// $result->NOW = time();
		// $arr = array ('a'=>1,'b'=>2,'c'=>3,'d'=>4,'e'=>5);
		
		$result = array();
		
		$result['CODE'] = $code;
		if(self::isError($code))
			$result['DATA'] 	= self::getErrorMessage($code);
		else {
			$result['DATA'] 	= $data;
		}
	//	self::debugLog("rtrlog.log","apiResponseEncode:".json_encode($result));
		echo C_Encode::aes128cbcEncrypt(json_encode($result));die;
	}
	public static function isError($code)
	{
		if(isset($code) && is_int($code) && $code < 0) return true;
		return false;
	}
	public static function getErrorMessage($code)
	{
		switch($code) {
			case -1: $errorMsg = 'API接口不存在';break;
			case -2: $errorMsg = 'API接口参数错误';break;
			case -3: $errorMsg = '请先登录';break;
			case -4: $errorMsg = '内部参数错误';break;
			case -10: $errorMsg = 'UserID错误';break;
			case -20: $errorMsg = '创建用户出错';break;
			case -21: $errorMsg = '此ID数据不存在';break;
			case -22: $errorMsg = '数据操作失败';break;
			case -23:$errorMsg='网络错误';break;
			//登录验证错误
			case -1001:$errorMsg = '用户名为空';break;
			case -1002:$errorMsg = '用户密码为空';break;
			case -1003:$errorMsg ='该手机号码已注册';break;
			case -1004:$errorMsg= '密码错误';break;
			case -1005:$errorMsg= '账号已禁用';break;
			case -1006:$errorMsg= '未找到用户信息';break;
			case -1007:$errorMsg= '两次密码输入不一致';break;
			case -1008:$errorMsg= '验证码错误';break;
			case -1009:$errorMsg= '该手机号码未注册';break;
			case -1022:$errorMsg = '业务短信日下发条数超过设定的上限';break;
			case -1023:$errorMsg = '单个手机号30秒内下发短信条数超过设定的上限';break;
			case -1025:$errorMsg='单个手机号日下发短信条数超过设定的上限';break;

			case -2001:$errorMsg='绑定用户返回的数据格式错误';break;
			case -2002:$errorMsg='绑定用户验证错误，请输入正确的账号和密码';break;

			case -3001:$errorMsg='没有商品信息';break;
			case -3002:$errorMsg='创建订单出错';break;
			case -3003:$errorMsg='没找到产品信息';break;
			case -3004:$errorMsg='充值失败';break;
		
		}
		return $errorMsg;
	}
	//调试日志
	public static function debugLog($filename,$content)
	{
		$nowDate = date('Y-m-d');
		$filename = $filename."_".$nowDate;
		//把字符串写入文件中
		file_put_contents(ROOT_PATH.'log/'.$filename,'['.date('Y-m-d H:i:s').']'.$content."\r\n",FILE_APPEND);
	}
	public static function varExport_old($name,$value)
	{
		$result = '';
		if(is_array($value)){
			$result .= '$'.$name.'=array();'."\r\n";
			foreach($value as $k => $v){
				if(is_int($k)) $k = intval($k);
				else $k = "'".$k."'";
				$result .= self::varExport_old($name.'['.$k.']',$v);
			}
		}elseif(is_object($value)){
			$result .= '$'.$name.'=new stdClass;'."\r\n";
			foreach($value as $k => $v){
				$result .= self::varExport_old($name.'->'.$k,$v);
			}
		}else{
			if(is_int($value)){
				$v = intval($value);
			}elseif(is_float($value)){
				$v = floatval($value);
			}elseif(is_string($value)){
				$v = "'".strval($value)."'";
			}elseif(is_bool($value)){
				$v = $value ? 'true' : 'false';
			}elseif(is_null($value)){
				$v = 'null';
			}else{
				$v = "'".$value."'";
			}
			$result .= '$'.$name.'='.$v.';'."\r\n";
		}
		return $result;
	}
	public static function varExport($value,$level=1)
	{
		$result = '';
		$end = ($level == 1)? ';' : ',';
		if(is_array($value)){
			$result .= 'array('."\r\n";
			foreach($value as $k => $v){
				if(is_int($k)) $k = intval($k);
				else $k = "'".$k."'";
				$result .= $k.'=>'.self::varExport($v,$level+1);
			}
			$result .= ')'.$end."\r\n";
		}elseif(is_object($value)){
			$result .= '(object)array('."\r\n";
			foreach($value as $k => $v){
				$result .= "'".$k."'=>".self::varExport($v,$level+1);
			}
			$result .= ')'.$end."\r\n";
		}else{
			if(is_int($value)){
				$v = intval($value);
			}elseif(is_float($value)){
				$v = floatval($value);
			}elseif(is_string($value)){
				$v = "'".strval($value)."'";
			}elseif(is_bool($value)){
				$v = $value ? 'true' : 'false';
			}elseif(is_null($value)){
				$v = 'null';
			}else{
				$v = "'".$value."'";
			}
			$result .= $v.$end."\r\n";
		}
		return $result;
	}
	public static function todaySeconds()
	{
		$endTime = strtotime(date('Y-m-d').' 23:59:59');
		$nowTime = time();
		return $endTime-$nowTime;
	}
	public static function microtime_float()
	{
		list($usec, $sec) = explode(" ", microtime());
		return ((float)$usec + (float)$sec) * 1000;
	}
	
	public static function getEndThismonth(){
		$year = date("Y");
 		$month = date("m");
 		$allday = date("t");
		return strtotime($year."-".$month."-".$allday);
	}

	public static function getLastMonth(){
		return date('Ym', strtotime('-1 month'));
	}
	//validTime格式:Y:2011,d:28,H:12//2011年每月28号12:00:00-12:59:59
	public static function dateIsValid($str)
	{
		$currDate = self::getCurrDataArr();
		$kvList = explode(',',$str);
		//折扣信息是否在生效时间内
		foreach($kvList as $kv){
			list($k,$v) = explode(':',$kv);
			if($currDate[$k] != $v){
				return false;
			}
		}
		return true;
	}
	
	private static $_currDataArr;
	public static function getCurrDataArr()
	{
		if(empty(self::$_currDataArr)){
			self::$_currDataArr = array('Y'=>'','m'=>'','d'=>'','H'=>'','i'=>'','N'=>'');
			list(self::$_currDataArr['Y'],
				 self::$_currDataArr['m'],
				 self::$_currDataArr['d'],
				 self::$_currDataArr['H'],
				 self::$_currDataArr['i'],
				 self::$_currDataArr['N']) = explode(',',date('Y,m,d,H,i,N'));
		}
		return self::$_currDataArr;
	}

	public static function getUniqueId()
	{
		return md5(mt_rand(100,999).str_replace('.','',substr(uniqid('',true),9)));
	}
	/***
	*获取指定区间的随机数
	*$min最小值
	*$max最大值
	*cnt产生随机数的个数 
	*isLoop 产生的随机数是否允许重复 true-允许 false-不允许
	**/
	public static function getRandNum($min=0,$max=1,$cnt=1,$isLoop=true){
		$ret = array();
		if($isLoop)
		{
			for($i=0;$i<$cnt;$i++)
			{
				$ret[] = mt_rand($min,$max);
			}
		}
		else
		{
			while(count($ret)<$cnt)
			{
				$r = mt_rand($min,$max);
				if(!in_array($r,$ret))
				{
					$ret[] = $r;//如果产生出来的随机数不在数组内，把生成的那个随机数放到数组内
				}
			}
		}
		return $ret;
	}
	
	public static function getArrayRowByWeight($arr)
	{
		if(!is_array($arr)) return false;
		$totalWeight = 0;
		foreach($arr as $row){
			$totalWeight += $row->weight;
		}
		$rnd = mt_rand(1,$totalWeight);
		$pt = 0;
		//if(count($row)> 1) shuffle($row);
		foreach($arr as $row){
			$pt += $row->weight;
			if($pt >= $rnd) return $row;
		}
		return false;
	}
	
	public static function getUserIP()
	{
		if(isset($_SERVER['HTTP_QVIA'])){
			$hexIP1 = substr($_SERVER['HTTP_QVIA'],0,2);
			$hexIP2 = substr($_SERVER['HTTP_QVIA'],2,2);
			$hexIP3 = substr($_SERVER['HTTP_QVIA'],4,2);
			$hexIP4 = substr($_SERVER['HTTP_QVIA'],6,2);
			return hexdec($hexIP1).'.'.hexdec($hexIP2).'.'.hexdec($hexIP3).'.'.hexdec($hexIP4);
		}else{
			return $_SERVER["REMOTE_ADDR"];
		}
	}

	public static function getUserLongIp(){
		return ip2long(self::getUserIP());
	}

	/***
	*根据权限返回用户所拥有的权限ID
	*1：view 2:add 3:edit 4:delete
	**/
	public static function getPowerList($power){
		$powerList = array();
		for($i = 1;$i<=4;$i++){
			$v = pow(2,$i-1) & $power;
			//echo $v == pow(2,$i-1);
			if( $v == pow(2,$i-1)){
				$powerList[]=$i;
			}
		}
		return $powerList;
	}
	
	public static function getUserStatus($status){
		$v = "";
		switch($status){
			case 0:
				$v = "禁用";
			break;
			case 1:
				$v = "启用";
			break;
			case 2:
				$v = "删除";
			break;
		}
		return $v;
	}
	public static function getSelectTime($idName,$selectValue,$placeholder=""){
		$str = '<select class="select" size="1" name="'.$idName.'" id="'.$idName.'" style="width:170px;">';
		if(!empty($placeholder)){
			$str .= '<option value="-1">'.$placeholder.'</option>';
		}
		for($i = 0;$i<24;$i++){
			$selected = "";
			if($i == $selectValue){
				$selected = "selected";
			}
			$str .= '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
		}
		$str .= '</select>';
		return $str;
	}
	public static function getProviderName($id){
		switch($id){
			case 1:
				return "移动";
			break;
			case 2:
				return "电信";
			break;
			case 3:
				return "联通";
			break;
			case 4:
				return "其他";
			break;
		}
	}
	public static function getRtResultCode($rtResult){
		$code = 0;
		switch($rtResult){
			case 'old_exists':
				$code = 10;
				break;
			case 'old_push':
				$code = 11;
				break;
			case 'old_cmd':
				$code = 12;
				break;
			case 'success':
				$code = 13;
				break;
			case 'run_core_failed':
				$code = 20;
				break;
			case 'failed':
				$code = 21;
				break;
			case 'failed_unknow':
				$code = 22;
				break;
		}
		return $code;
	}
	//根据imsi获取运营商
	//1:移动 2：电信 3：电信  4：联通
	public static function getProviderId($imsi){
		$providerId = 4;
		if(empty($imsi)) return $providerId;
		$code = substr($imsi,0,5);
		switch($code){
			case '46000':
			case '46002':
			case '46007':
				$providerId = 1;
			break;
			case '46003':
				$providerId = 2;
			break;
			case '46001':
			case '46010':
				$providerId = 3;
			break;
			default:
				$providerId = 4;
			break;
		}
		return $providerId;
	}
	// public static function getUserDeviceTable($userId)
	// {
	// 	return 'zoo_userDevice_'.(floor($userId/10)%10);
	// }
	/***
	*获取当前服的详细信息
	**/
	// public static function  getServerInfo()
	// {
	// 	foreach ($GLOBALS['serverList'] as $serverInfo) {
	// 		if($serverInfo['serverId']==$GLOBALS['server']){
	// 			return $serverInfo;
	// 		}
	// 	}
	// 	return array();
		
	// }
	
}

?>
