<?php
if(!defined('ACCESS_KEY')){header("HTTP/1.1 404 Not Found");die;}
define('COOKIE_PREFIX','souhu_');
require_once(APP_PATH."class/SmsSender.php");
use Qcloud\Sms\SmsSingleSender;
use Qcloud\Sms\SmsMultiSender;
class C_CurrUser
{
	public static $userId;
	
	/**
	*用户登录成功，重新设置用户信息
	**/
	public static function setCurrUser($userId){
		self::$userId = $userId;
		header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"'); 
		setcookie(COOKIE_PREFIX.'userId',$userId);
		//setcookie(COOKIE_PREFIX.'userId',$userId,time()+86400,"/","www.".DOMAIN);
		setcookie(COOKIE_PREFIX.'sstr',md5($userId.PwdSecret));
		//setcookie(COOKIE_PREFIX.'sstr',md5($userId.PwdSecret),$userId,time()+86400,"/","www.".DOMAIN);
	}

	
	public static function isLogin()
	{
		//var_dump($_COOKIE[COOKIE_PREFIX.'userId']);
		if(empty($_COOKIE[COOKIE_PREFIX.'userId'])){
			return false;
		}
		if($_COOKIE[COOKIE_PREFIX.'sstr'] != md5($_COOKIE[COOKIE_PREFIX.'userId'].PwdSecret)){
			return false;
		}
		self::$userId = $_COOKIE[COOKIE_PREFIX.'userId'];
		return true;
	}
	
	public static function loginIsValid()
	{
		return false;
	}
	public static function setLogin()
	{

	}
	public static function userLogout(){
		header('P3P: CP="CURa ADMa DEVa PSAo PSDo OUR BUS UNI PUR INT DEM STA PRE COM NAV OTC NOI DSP COR"'); 
		setcookie(COOKIE_PREFIX.'userId','');
		#setcookie(COOKIE_PREFIX.'userId','',time()-86400,"/","www.".DOMAIN);
		#setcookie(COOKIE_PREFIX.'userId','',time()-86400,"/",DOMAIN);
		setcookie(COOKIE_PREFIX.'sstr','');
		//setcookie(COOKIE_PREFIX.'sstr','',time()-86400,"/","www.".DOMAIN);
		self::$userId = 0;
		return true;
	}
	public static function createUser($mobileNo,$userPass,$nickName){
		$sql = "SELECT * FROM userInfo WHERE mobileNo = ".$mobileNo."";
		$db = DB::connect('DB_USR');
		$userInfo = $db->fetch($sql);
		if(!empty($userInfo)){
			C_Com::apiResponse(C_Com::apiResult(-1003));
			return;
		}
		$passwd = strtolower(md5($userPass.PwdSecret));
		$sql = "INSERT INTO userInfo(countryNo,mobileNo,userPass,nickName,createTime)VALUES(86,'".$mobileNo."','".$passwd."','".$nickName."',".time().")";
		$id = $db->execFetchId($sql);
		if($id>0){
			//注册成功
			C_CurrUser::setCurrUser($id);
			$userInfo = new stdclass;
			$userInfo->userId = $id;
			$userInfo->mobileNo = $mobileNo;
			$userInfo->nickName = $nickName;
			return $userInfo;
		}
		else{
			C_Com::apiResponse(C_Com::apiResult(-20));
			return;	
		}
	}

	/***
	*用户登录
	**/
	public static function userLogin($userName,$userPass){
		$sql = "SELECT userId,userName,userPass,nickName FROM userInfo WHERE userName = '".$userName."'";
		$db = DB::connect("DB_USR");
		$userInfo = $db->fetch($sql);
		if(empty($userInfo)){
			C_Com::apiResponse(C_Com::apiResult(-1006));
			return;
		}
		if(strtolower(md5($userPass.PwdSecret)) != $userInfo->userPass){
			C_Com::apiResponse(C_Com::apiResult(-1004));
			return;
		}
		//写登录日志
		C_CurrUser::setCurrUser($userInfo->userId);
		unset($userInfo->userPass);
		return $userInfo;
	}

	/**
	*获取用户资料
	**/
	public static function getUserInfo(){
		if(!self::isLogin()){
			C_Com::apiResponse(C_Com::apiResult(-3));
			return;
		}
		$sql = "SELECT userId,userName,userPass,nickName FROM userInfo WHERE userId =".self::$userId;
		$db = DB::connect("DB_USR");
		$userInfo = $db->fetch($sql);
		if(empty($userInfo)){
			C_Com::apiResponse(C_Com::apiResult(-1006));
			return;
		}
		unset($userInfo->userPass);
		return $userInfo;
	}
	public static function modifyUserPass($newPass,$newPasTwo){
		if(!self::isLogin()){
			C_Com::apiResponse(C_Com::apiResult(-3));
			return;
		}
		if($newPass != $newPasTwo){
			C_Com::apiResponse(C_Com::apiResult(-1007));
			return;
		}
		$passwd = strtolower(md5($newPass.PwdSecret));
		$sql = "UPDATE souhu_userInfo SET userPass = '".$passwd."' WHERE userId =".self::$userId;
		$db = DB::connect("DB_USR");
		$db->exec($sql);
		//注销用户
		self::userLogout();
		return true;
	}
	public static function sendRegSms($mobileNo){
		/****/
		$rnd = mt_rand(100000,999999);
		$singleSender = new SmsSingleSender(SmsAppId, SmsAppKey);
		$params = array((string)$rnd, "5");
		$result = $singleSender->sendWithParam("86", $mobileNo, SmsRegTempId, $params, SmsSign,'','');
		$rsp = json_decode($result);
		$code = $rsp->result;
		if($code == 0){
			getRedisMain()->set('Sys/Sms/'.$mobileNo,$rnd);
			getRedisMain()->EXPIRE('Sys/Sms/'.$mobileNo,300);
			return true;
		}
		else
			return false;
	}
}
?>