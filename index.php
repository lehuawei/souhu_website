<?php
require('inc.php');
$mod = '';
//根据路由参数加载所需模块文件
if(!isset($_REQUEST['mod'])) $_REQUEST['mod'] = 'index';
$mod = $_REQUEST['mod'];

if(empty($mod))
	require(APP_PATH.'module/index.mod.php');
else if($mod == "api")
	require(APP_PATH.'module/api.mod.php');
else
	require(APP_PATH.'module/'.$mod.'.mod.php');
?>