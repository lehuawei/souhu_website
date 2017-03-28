<?php
if(!defined('ACCESS_KEY')){header("HTTP/1.1 404 Not Found");die;}
function newPredis($addr, $pass) {
	$redis = new Predis\Client('tcp://'.$addr);
	if (!$redis->auth($pass)) {
		C_Com::debugLog("redis.log","connected failed:".$addr.":".$pass);
		return null;
	}
	return $redis;
}

$redisCache = array();
function getRedisByIndex() {
	global $redisCache;
	$index = 'SYS';
	if (empty($redisCache[$index])) {
		$r = Config::$redisServers[$index];
		$redisCache[$index] = newPredis($r['addr'], $r['pass']);
	}
	return $redisCache[$index];
}


function getRedisMain() {
	return getRedisByIndex('SYS');
}

function getRedisByUid($uid) {

}

function getOldRedisByUid($uid) {
	
}
?>
