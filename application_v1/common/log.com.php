<?php
if(!defined('ACCESS_KEY')){header("HTTP/1.1 404 Not Found");die;}
class C_Log
{
	//用户登录日志*
	public static function insertLoginLog($userId)
	{
		$sql = "INSERT DELAYED INTO pf_userLoginLog (userId,logDate,logTime) VALUES ('$userId','".date('Y-m-d')."','".date('H:i:s')."')";
		$dbLog = DB::connect('DB_LOG');
		$dbLog->exec($sql);
	}
}
?>
