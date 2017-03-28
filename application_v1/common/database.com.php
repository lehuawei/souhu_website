<?php
if(!defined('ACCESS_KEY')){header("HTTP/1.1 404 Not Found");die;}
class DB
{
	public static $pdoDbLink = array();
	public static $dbLink = array();
	public static function connect($key,$time='')
	{
			if(empty($key)) $key = "DB_USR";
			if(!isset(Config::$mysql[$key])){
					die('Database connect error');
			}
			$$dsn = '';
			if(!isset(self::$dbLink[$key.$time])){
					try{
							$dbServer = Config::$mysql[$key];
							$dbName = $dbServer['name'];
							$dsn = 'mysql:host='.$dbServer['host'].':'.$dbServer['port'].';dbname='.$dbName; 
							self::$dbLink[$key.$time] = new appQuery($dsn, $dbServer['user'], $dbServer['pass']);
					}catch(PDOException $e){
						C_Com::debugLog("dbConnentError.log",$dsn.'-time:'.$time);
							die('Database connect failed');

					}
			}
			return self::$dbLink[$key.$time];
	}
}
class appQuery
{
	public $pdo;
	
	function __construct($dsn, $usr, $pwd)
	{
		$this->pdo = new PDO($dsn, $usr, $pwd);//, array(PDO::ATTR_PERSISTENT=>true));
		$this->pdo->query("SET NAMES utf8");
	}
	public function filterSql($sql)
	{
		return str_replace(array('/*','*/','--','#',';'),'',$sql);
	}
	public function fetch($sql)
	{
		$sql = $this->filterSql($sql);
		//C_Com::debugLog("rtrlog_fetch.log","fetch:".$sql);
		$stmt = $this->pdo->query($sql);if(empty($stmt)) C_Com::debugLog('fetchErr.log',$sql);
		$result = $stmt->fetch(PDO::FETCH_OBJ);
		$stmt->closeCursor();
		return $result;
	}
	public function fetchAll($sql)
	{
		$sql = $this->filterSql($sql);
	//	C_Com::debugLog("rtrlog_fetchAll.log","fetchAll:".$sql);
		$stmt = $this->pdo->query($sql);if(empty($stmt)) C_Com::debugLog('fetchAllErr.log',$sql);
		$result = $stmt->fetchAll(PDO::FETCH_OBJ);
		$stmt->closeCursor();
		return $result;
	}
	public function fetchColumn($sql,$column_number=0)
	{
		$sql = $this->filterSql($sql);
		$stmt = $this->pdo->query($sql);
		$result = $stmt->fetchColumn($column_number);
		$stmt->closeCursor();
		return $result;
	}
	public function exec($sql)
	{
		$sql = $this->filterSql($sql);
	//	C_Com::debugLog("rtrlog_exec.log","sql:".$sql);
		return $this->pdo->exec($sql);
	}
	public function execFetchId($sql,$name=null)
	{
		$sql = $this->filterSql($sql);
		$this->pdo->exec($sql);
		return $this->pdo->lastInsertId($name);
	}
	public function execTransaction($sqlArr)
	{
		if(empty($sqlArr) || !is_array($sqlArr)) return false;
		try{
			$this->pdo->beginTransaction();
			foreach($sqlArr as $sql){
				$sql = $this->filterSql($sql);
				if(false === $this->pdo->exec($sql)){
					$this->pdo->rollBack();
					return false;
				}
			}
			$this->pdo->commit();
			return true;
		}catch(PDOException $e){
			$this->pdo->rollBack();
			C_Com::debugLog('dbError.log',$e->getMessage());
			return false;
		}
		return false;
	}
	public function callProc($procName,$param){
		$stmt = $this->pdo->prepare("CALL  ".$procName."(?)");
		$stmt->bindParam(1,$param);    
		$stmt->execute();
	}
}
?>