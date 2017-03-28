<?php
//系统配置文件
if(!defined('ACCESS_KEY')){header("HTTP/1.1 404 Not Found");die;}
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'on');
date_default_timezone_set('Etc/GMT-8');
define("DOMAIN","chinasouhu.net");
define("PwdSecret","asdfds!@#*1234@!#*ASDFasdfQ@#4345asDF");
define("CDN_SERVER","/");
define("WEBNAME","销量管理平台");
class Config {
public static $mysql = array(
			'DB_USR'	=> array('user'=>'root', 'pass'=>'souhu2011', 'host'=>'127.0.0.1', 'name'=>'souhu_usr','port'=>'3306')
	);
}
?>
