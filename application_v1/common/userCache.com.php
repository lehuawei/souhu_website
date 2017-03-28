<?php
/*
  +----------------------------------------------------------------------+
  | 以User为核心的Memcache类，封装常用的几个Memcache方法。				|
  | 主要可以方便的根据User来决定所访问的Memcache服务器。				 |
  +----------------------------------------------------------------------+
  | Author:  Xgdapg													  	 |
  +----------------------------------------------------------------------+
*/
if(!defined('ACCESS_KEY')){header("HTTP/1.1 404 Not Found");die;}
class C_UserCache
{
	private $mcObj;
	private $userId;
	private $fullKey;
	public  $serverHost = '127.0.0.1';
	public  $serverPort = 11212;
	private $compressThreshold = 20480;
	public  $serverList;
	private $useCache = false;
	private $cache = array();
	
	function __construct($userId)
	{
		$this->userId = $userId;
		if($this->userId == 'SYS') $index = 'SYS';		
		else if($this->userId == 'USR') $index = 'USR';
		else
			$index = 'USR_'.substr(strval($this->userId),-1,1);
		if(array_key_exists($index,Config::$cache)){
			$this->serverHost = Config::$cache[$index]['host'];
			$this->serverPort = Config::$cache[$index]['port'];
		}
		$this->mcObj = new Memcache;
		//$this->_connect();
	}
	
	function __destruct()
	{
		$this->_close();
	}
	private function _connect()
	{
		$this->mcObj->connect($this->serverHost,$this->serverPort);
		$this->mcObj->setCompressThreshold($this->compressThreshold,0.4);
	}
	private function _close()
	{
		$this->mcObj->close();
	}
	
	private function _get()
	{
		if($this->useCache) if(isset($this->cache[$this->fullKey])) return $this->cache[$this->fullKey];
		$this->_connect();
		$result = $this->mcObj->get($this->fullKey);
		$this->_close();
		if(false === $result) $result = null;
		if($this->useCache) if(!is_null($result)) $this->cache[$this->fullKey] = $result;
		return $result;
	}
	private function _set($val, $time=0)
	{
		$this->_connect();
		$result = $this->mcObj->set($this->fullKey,$val,0,$time);
		if(!$result){
			$this->mcObj->delete($this->fullKey);
			C_Com::debugLog('memSetErr.log',$this->fullKey);
		}
		$this->_close();
		if($this->useCache) $this->cache[$this->fullKey] = $val;
		return $result;
	}
	
	//设置MC键
	public function key()
	{
		$argsCnt = func_num_args();
		
		if($argsCnt < 1) return null;
		
		$argsList = func_get_args();
		
	//	$this->baseKey = $argsList[0];
		$this->fullKey = $this->userId.'|'.$argsList[0];
		
		for($i = 1; $i < $argsCnt; $i++){
			$this->fullKey .= '|'.$argsList[$i];
		}
		
		return $this;
	}
	
	//获取键值
	public function value()
	{
		$result = $this->_get();
		if(isset($result['t']) && 
			isset($result['v']) &&
			isset($result['e']) &&
			$result['e']>=time()) return $result['v'];
		return null;
	}
	
	//设置键值
	public function setValue($val, $time=86400)
	{
		$now = time();
		$data = array('t' => $now, 'e' => $now+$time, 'v' => $val);
		return $this->_set($data, $time);
	}
	
	//获取键值更新时间，单位秒
	public function upTime()
	{
		$result = $this->_get();
		return time()-$result['t'];
	}
	
	//获取键值更新时间戳
	public function t()
	{
		$result = $this->_get();
		return $result['t'];
	}
	
	//删除键值
	public function delete($time=0)
	{
		$this->_connect();
		$result = $this->mcObj->delete($this->fullKey,$time);
		$this->_close();
		if($this->useCache) unset($this->cache[$this->fullKey]);
		return $result;
	}
	
	//初始化计数器
	public function initCounter($val=0)
	{
		return $this->_set($val);
	}
	
	//键值自増，仅用于计数器初始化后的键值
	public function increase($val=1)
	{
		$this->_connect();
		$res = $this->_get();
		if(is_null($res) || !is_int($res)){$this->_close();return false;}
		$result = $this->mcObj->increment($this->fullKey,$val);
		$this->_close();
		return $result;
	}
	
	//键值自减，仅用于计数器初始化后的键值
	public function decrease($val=1)
	{
		$this->_connect();
		$res = $this->_get();
		if(is_null($res) || !is_int($res)){$this->_close();return false;}
		$result = $this->mcObj->decrement($this->fullKey,$val);
		$this->_close();
		return $result;
	}
}
?>
