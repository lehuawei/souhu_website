<?php
require('inc.php');
//根据路由参数加载所需模块文件
if(!isset($_REQUEST['mod'])) $_REQUEST['mod'] = 'api';
$mod = $_REQUEST['mod'];
switch($mod)
{

    case 'api':{
    //内部api接口，需要鉴权
       require(APP_PATH.'module/api.mod.php');
    }
    break;
	default:{
		return C_Com::apiResult(-2);
	}break;
}
?>