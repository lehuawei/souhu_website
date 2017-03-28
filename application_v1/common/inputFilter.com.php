<?php
if(!defined('ACCESS_KEY')){header("HTTP/1.1 404 Not Found");die;}
//$_REQUEST = null;
//if (!get_magic_quotes_gpc()) {}
if(!empty($_GET)) execFilter($_GET);
if(!empty($_POST)) execFilter($_POST);
if(!empty($_COOKIE)) execFilter($_COOKIE);
//if(!empty($_SESSION)) execFilter($_SESSION);

function execFilter(&$data){
	if(is_array($data)){
		foreach($data as $k => $v){
			execFilter($data[$k]);
		}
	}else{
		if(!ctype_alnum($data)){
			$data = str_replace(array(' ','\\','/','&','#',';',"'",'<','>'),'',$data);
		}
	}
}
?>