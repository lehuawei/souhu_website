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



    /***
    *按照支付方式和产品ID获取商品列表
    **/
    public static function getSysShopListById($payType,$pId){
        $shopInfo = self::getSysShopListByPid($pId,($payType==2 || $payType == 3)?2:$payType);
        // var_dump($shopInfo);
        $numList = array(1000,2000,5000,20000,100000,0);
        $list = array();
        foreach($numList as $num){
            $data = new stdclass;
            $data->shopId = $shopInfo->shopId;
            $data->shopName = $shopInfo->shopName;
            $data->addValue = $shopInfo->addValue;
            $data->pId = $pId;
            $data->payType = $payType;
            $data->amount  = intval($num)/intval($shopInfo->addValue)*intval($shopInfo->truePrice);
            $data->num = $num;
            $data->price = $shopInfo->truePrice;
            $list[] = $data;
        }
       // unset($shopInfo);
        return $list;
    }

    public static function getSysShopListByPid($pid,$payType){
        try{
			$sql = "SELECT shopId,pId,shopName,addValue,price,truePrice FROM sysShop WHERE pId = ".$pid." AND payType = ".$payType." ORDER BY shopId";
			$dbSys = DB::connect('DB_USR');
			$result = $dbSys->fetch($sql);
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