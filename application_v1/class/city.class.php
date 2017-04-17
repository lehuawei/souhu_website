<?php
class C_City
{
	
	function __construct()
	{
		
	}
	function __destruct()
	{
		
		
	}

	/***
	*获取省份城市LIST
	**/
	public function getProvinceCityList(){
		$db = DB::connect('DB_USR');
		$sql = "SELECT provinceId,provinceName FROM sysProvince ORDER BY provinceId";
		$list = $db->fetchAll($sql);
	}

	/**
	*获取某个省份下的城市列表
	**/
	public function getCityListById($provinceId){
		$db = DB::connect('DB_USR');
		$sql = "SELECT cityId,cityName,provinceId FROM sysCity WHERE provinceId= ".$provinceId;
		$list = $db->fetchAll($sql);
	}
	
}
?>