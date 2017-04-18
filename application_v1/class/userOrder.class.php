<?php
class C_Order
{
    /**订单***/
	public $userId = 0;
	private $userObj;
	function __construct($userObj)
	{
		$this->userObj = $userObj;
		$this->userId = $userObj->userId;
	}
	function __destruct()
	{
        unset($this->userObj);
        unset($this->userId);
	}
    
    /***
    *payType:支付方式 1-搜币 2-支付宝 3-微信
    **/
    public function userOrder($payType,$shopId,$num=1){
        //
        class_exists('C_Sys') or require(APP_PATH.'class/sys.class.php');
        $shopInfo = C_Sys::getSysShopInfoById($shopId);
        if(empty($shopInfo)){
             return C_Com::apiResult(-3001);
        }
        $billNo = md5(time().mt_rand(10000,99999));
        $shopName = $shopInfo->shopName;
        $amount = $shopInfo->truePrice*$num;
        $goldNum = $shopInfo->addValue*$num;

        $sql = "INSERT INTO userOrder(userId,orderId,amount,goldNum,pId,shopId,payType,payStatus,orderTime)VALUES(".$this->userId.",'".$billNo."',".$amount.",".$goldNum.",".$shopInfo->pId.",".$shopId.",".$payType.",0,".time().")";
        $id = $this->objUser->userDB()->execFetchId($sql);
        if($id > 0){
            unset($shopInfo);
            return C_Com::apiResult(-3002);
        }
        else{
          $data = new stdclass;
          $data->shopName = $shopName;
          $data->billNo = $billNo;
          $data->price = $amount;
          $data->body = '';
          unset($shopInfo);
          return $data;
        }
    }
}
?>