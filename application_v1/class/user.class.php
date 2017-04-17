<?php
class C_User
{
	public $userId = 0;
	function __construct($userId)
	{
		if(empty($userId)) die('Error: Missing userId');
		$this->userId = $userId;
	}
	function __destruct()
	{
		unset($this->cache);
		
	}
	/***
	*获取用户的基本信息
	**/
	public function getUserInfo(){
		$sql = "SELECT userId,countryNo,mobileNo,nickName,userPass,trueName,sex,idCardNo,provinceId,cityId,address,createTime,modifyTime FROM userInfo WHERE userId = ".$this->userId;
		//var_dump($sql);
		$info = $this->userDB()->fetch($sql);
		return $info;
	}

	/**
	*修改用户的基本信息
	**/
	public function modUserInfo($param){
		$sql = "UPDATE userInfo SET nickName =  WHERE userId = ".$this->userId;
	}


	public function userDB(){
		if(!isset($this->_db))
			$this->_db = DB::connect('DB_USR');
		return $this->_db;
	}
	public function userGold(){
		if(!isset($this->_userGold)){
			class_exists("C_UserGold") or require(APP_PATH."class/userGold.class.php");
			$this->_userGold = new C_UserGold($this);
		}
		return $this->_userGold;
	}
}
?>