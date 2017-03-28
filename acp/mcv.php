<?php
if(!defined('ACP')){header("HTTP/1.1 404 Not Found");die;}//define('ACCESS_KEY',1);
//定义程序根目录
define('ROOT_PATH', dirname(__FILE__).'/');
//定义程序版本号。更新程序时，先将application上传并重命名加上版本号，测试无误后修改本文件版本号定义并上传
define('APP_VERSION', 'v1');
//定义主体程序目录
define('APP_PATH', ROOT_PATH.'application_'.APP_VERSION.'/');
//加载MC类

error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'on');
header("Content-type: text/html; charset=utf-8");
$thisFile = ACP;//pathinfo(__FILE__,PATHINFO_BASENAME);

if(isset($_GET['fmt']))
{
        if($_GET['fmt']==1) setcookie('_mcv_showFmt',1);
        else setcookie('_mcv_showFmt','');
        header('location:'.$_SERVER['HTTP_REFERER']);
}


if(isset($_GET['host']) && isset($_GET['port']))
{
        $host = $_GET['host'];
        $port = $_GET['port'];
}
elseif(isset($_GET['uid']))
{
        $userCache = new C_UserCache($_GET['uid']);
        $host = $userCache->serverHost;
        $port = $userCache->serverPort;
}
else
{
        $host = '';
        $port = '';
}

$userCache = new C_UserCache('SYS');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" <?if(!empty($_COOKIE['_mcv_showFmt'])){?>"http://www.w3c.org/TR/html4/loose.dtd<?}?>">
<html>
<head>
<style type="text/css">
a{text-decoration: none;} 
a:link{color: #0000FF;} 
a:visited{color: #0000FF;} 
a:hover{color: #FF0000;text-decoration: underline;} 
a:active{color: #0000FF;}
body{font-size:14px;font-family:Arial;}
table{table-layout:fixed;border-collapse:collapse;font-size:14px;}
table td{padding:2px 4px;}
</style>
<title>用户缓存管理</title>
</head>
<body>
<div>
	<span>Server:
	<? foreach(Config::$cache as $key => $server){?>
		[<a href="<?=$thisFile;?>&action=list&host=<?=$server['host'];?>&port=<?=$server['port'];?>"><? if($server['host']==$host && $server['port']==$port) echo '<strong>'.$key.'</strong>'; else echo $key; ?></a>]
	<? }?>
	</span>
	<span style="margin-left:50px;">UID:<input type="text" id="inpUid" style="width:100px;" value="<?=$_GET['uid'];?>" /><input type="button" value="View" onclick="window.location.href='<?=$thisFile;?>&action=list&uid='+document.getElementById('inpUid').value" /></span>
</div>
<?

$keyList = array();

$mem = new Memcache();
$mem->connect($host,$port);
$items = $mem->getExtendedStats('items');//print_r($items);
$items =& $items["$host:$port"]['items'];//print_r($items);

foreach($items as $i => $values){
       // print_r($values);
	$keyArr = $mem->getExtendedStats("cachedump",$i,0);
	$keyArr =& $keyArr["$host:$port"];
	foreach($keyArr as $key => $value){
		list($uid,$keyStr) = explode('|',$key,2);
		if(!empty($_GET['uid']) && $uid!=$_GET['uid']) continue;
		if(!empty($_GET['key']) && strpos($keyStr,$_GET['key'])!==0) continue;
		$keyList[] = $key;
	}
}

//print_r($keyList);
switch($_GET['action'])
{
	case 'list':{
		echo '<pre><table border=1>';
		echo '<tr>';
		echo '<td style="width:35px;" align=center><a href="'.$thisFile.'&action=del&host='.$host.'&port='.$port.'&uid='.$_GET['uid'].'&key='.$_GET['key'].'">全删</a></td>';
		echo '<td>KEY</td><td>TIME</td><td>VALUE<span style="float:right;">'.getExpandLink().'</span></td></tr>';
		foreach($keyList as $key)
		{
                        //print_r($mem->get("3|userRequestDownCn"));
                        //$value = $mem->get("");
			$value = $mem->get($key);
                        //var_dump($value);
                        if($value == false) continue;
                        //print_r($value);die;
                       // var_dump($value);
			list($uid,$keyStr) = explode('|',$key,2);
			echo '<tr>';
			echo '<td align=center><a target="_blank" href="'.$thisFile.'&action=del&host='.$host.'&port='.$port.'&uid='.$uid.'&key='.$keyStr.'">删</a>|<a target="_blank" href="'.$thisFile.'&action=list&host='.$host.'&port='.$port.'&uid='.$uid.'&key='.$keyStr.'">查</a></td>';
			echo '<td><a target="_blank" href="'.$thisFile.'&action=list&host='.$host.'&port='.$port.'&uid='.$uid.'">'.$uid.'</a>|';
			echo '<a target="_blank" href="'.$thisFile.'&action=list&host='.$host.'&port='.$port.'&key='.$keyStr.'">'.$keyStr.'</a></td>';
			echo '<td title="'.date('Y-m-d H:i:s',$value['t']).'">'.date('md H:i',$value['t']).'</td>';
			echo '<td>'.print_r($value['v'],true).'</td>';
			echo '</tr>';
		}
		echo '</table></pre>';
	}break;
	case 'del':{
		foreach($keyList as $key)
		{
			$mem->delete($key);
			echo 'Delete: '.$key.'<br>';
		}
	}break;
}
?>
</body>
</html>
<?
function getExpandLink()
{
	return empty($_COOKIE['_mcv_showFmt'])? '[<a href="'.$thisFile.'?fmt=1">展开</a>]' : '[<a href="'.$thisFile.'?fmt=0">收起</a>]';
}
?>