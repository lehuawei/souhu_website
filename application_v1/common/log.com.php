<?php
if(!defined('ACCESS_KEY')){header("HTTP/1.1 404 Not Found");die;}
class C_Log
{
	//用户登录日志
	public static function insertLoginLog($userId)
	{
		$sql = "INSERT INTO userLoginLog (userId,logDate,logTime) VALUES ('$userId','".date('Y-m-d')."','".date('H:i:s')."')";
		$dbLog = DB::connect('DB_LOG');
		$dbLog->exec($sql);
	}
	public static function insertAddGoldLog($userId,$addCnt,$userGold,$payType){
		$sql = "INSERT INTO userGoldAddLog(userId,addGold,currGold,addSource,addTime,ipaddress)VALUES(".$userId.",".$addCnt.",".$userGold.",".$payType.",".time().",".C_Com::getUserLongIp().")";
		$dbLog = DB::connect('DB_LOG');
		$dbLog->exec($sql);
	}
	public static function insertSubGoldLog($userId,$subCnt,$userGold,$pId){
		$sql = "INSERT INTO userGoldAddLog(userId,subGold,currGold,pId,subTime,ipaddress)VALUES(".$userId.",".$subCnt.",".$userGold.",".$pId.",".time().",".C_Com::getUserLongIp().")";
		$dbLog = DB::connect('DB_LOG');
		$dbLog->exec($sql);
	}
}
?>
