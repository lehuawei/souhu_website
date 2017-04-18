<?php
class C_Sys
{
	
    /***
    *获取系统的产品列表
    **/
    public static function getSysProdurceList(){
        //查询数据库
		try{
			$sql = "SELECT pId,pName,pPic,pDesc FROM sysProdurce ORDER BY pId";
			$dbSys = DB::connect('DB_USR');
			$result = $dbSys->fetchAll($sql);
			
			return $result;
		}catch(PDOException $e){
			C_Com::debugLog('dbError.log',$e->getMessage());
			return null;
		}
    }

    public static function getSysProdurceInfoById($id){
        try{
			$sql = "SELECT pId,pName,pPic,pDesc FROM sysProdurce WHERE pId = ".$id;
			$dbSys = DB::connect('DB_USR');
			$result = $dbSys->fetch($sql);
			return $result;
		}catch(PDOException $e){
			C_Com::debugLog('dbError.log',$e->getMessage());
			return null;
		}
    }


    public static function getSysShopListByPid($pid,$payType){
        try{
			$sql = "SELECT shopId,pId,shopName,addValue,price,truePrice FROM sysShop WHERE pId = ".$pid." AND payType = ".$payType." ORDER BY pId";
			$dbSys = DB::connect('DB_USR');
			$result = $dbSys->fetchAll($sql);
			return $result;
		}catch(PDOException $e){
			C_Com::debugLog('dbError.log',$e->getMessage());
			return null;
		}
    }
    public static function getSysShopInfoById($id){
         try{
			$sql = "SELECT shopId,pId,shopName,addValue,price,truePrice FROM sysShop WHERE shopId = ".$id;
			$dbSys = DB::connect('DB_USR');
			$result = $dbSys->fetch($sql);
			return $result;
		}catch(PDOException $e){
			C_Com::debugLog('dbError.log',$e->getMessage());
			return null;
		}
    }
}
?>