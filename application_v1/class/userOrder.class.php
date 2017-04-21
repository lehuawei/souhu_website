<?php
class C_UserOrder
{
    /**订单***/
	public $userId = 0;
	private $objUser;
	function __construct($userObj)
	{
		$this->objUser = $userObj;
		$this->userId = $userObj->userId;
	}
	function __destruct()
	{
        unset($this->objUser);
        unset($this->userId);
	}
    
    /***
    *@payType:支付方式 1-搜币 2-支付宝 3-微信
    *@price：金额
    *userPId:产品ID 0-官网 1-直播
    **/
    public function userOrder($payType,$price,$userPId=1){
        class_exists('C_Sys') or require(APP_PATH.'class/sys.class.php');
        $shopId = 0;
        $billNo = time().mt_rand(10000,99999);
        $amount = $price;
        $goldNum = 0;
        $shopName = "";
        if($payType == 1){
            $goldNum = $price;
            $shopName = "飞虎币";
        }else{
             $goldNum = $price*100;
             if($userPId == 0){
                 $shopName = "搜币";
             }else{
                 $shopName = "飞虎币";
             }
        }
       
        //搜币支付，给产品充值
        if($payType == 1){
            if($this->objUser->userGold()->prePay($amount)){
               $this->objUser->userProdurce()->userPay($userPId,$goldNum,$amount);
            }else{
                return false;
            }
        }else{
            $sql = "INSERT INTO userOrder(userId,orderId,amount,goldNum,pId,shopId,payType,payStatus,orderTime)VALUES(".$this->userId.",'".$billNo."',".$amount.",".$goldNum.",".$userPId.",".$shopId.",".$payType.",0,".time().")";
           // var_dump($sql);die;
            $id = $this->objUser->userDB()->execFetchId($sql);
            if($id > 0){
                
                return C_Com::apiResult(-3002);
            }
            else{
            $data = new stdclass;
            $data->shopName = $shopName;
            $data->billNo = $billNo;
            $data->price = $amount;
            $data->body = '';
           
            return $data;
            }
        }
    }
}
?>