<?php
class C_UserGold
{
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
    
    public function userOrder($payType){
        //
        $billNo = md5(time().mt_rand(10000,99999));
        /***
        *第三方接口
        **/
        switch($payType){
            case 1:
            //支付宝
            aliPay();
            break;
            case 2:
            weixinPay();
            //微信
            break;
            case 3:
            //银联
            bankPay();
            break;
        }
        return $billNo;
    }

    private function aliPay(){
        //完成接入，得到回应值
        $sql = "UPDATE ";
    }
    private function weixinPay(){

    }
    private function bankPay(){

    }

	public function addGold($addCnt){
		
	}
	public function subGold($subCnt){

	}
}
?>