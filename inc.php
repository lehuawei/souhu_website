<?php
//定义程序根目录
define('ROOT_PATH', dirname(__FILE__).'/');
//定义程序版本号。更新程序时，先将application上传并重命名加上版本号，测试无误后修改本文件版本号定义并上传
define('APP_VERSION', 'v1');
//定义主体程序目录
define('APP_PATH', ROOT_PATH.'application_'.APP_VERSION.'/');
//index.php为程序唯一入口，内部程序文件不允许单独访问
define('ACCESS_KEY',1);
//文件缓存的版本号
define('FC_VER',16101901);
//统一设定编码为UTF-8
header("Content-type: text/html; charset=utf-8");
//加载配置文件
require(APP_PATH.'common/config.com.php');
//加载过滤输入参数
require(APP_PATH.'common/inputFilter.com.php');
//加载PDO类
require(APP_PATH.'common/database.com.php');
//鉴权验证
require(APP_PATH.'common/user.com.php');
//日志系统
require(APP_PATH.'common/log.com.php');
//加载公共函数文件
require(APP_PATH.'common/common.com.php');
//应用开始时间
define('APP_START_MTIME',C_Com::microtime_float());
require(APP_PATH.'/common/Predis/Autoloader.php');
Predis\Autoloader::register();
require(APP_PATH.'common/redis.com.php');

//应用开始时间
define('APP_START_MTIME',C_Com::microtime_float());
class Clean {
	function __destruct() {
		global $redisCache;
		foreach ($redisCache as $redis) {
			$redis->quit();
		}
	}
}

$c = new Clean();

?>