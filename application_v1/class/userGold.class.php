<?php
class C_UserGold
{
	public $userId = 0;
	private $userObj;
	private $userGold = 0;
    function __construct($userObj)
	{
		$this->userObj = $userObj;
		$this->userId = $userObj->userId;
        $this->getUserGold();
	}
	function __destruct()
	{
        unset($this->userObj);
        unset($this->userId);
        unset($this->userGold);
	}

    public function userGold(){
        return $this->userGold;
    }

    private function getUserGold(){
        $sql = "SELECT userGold FROM userGold WHERE userId =".$this->userId;
        $info = $this->userObj->userDB()->fetch($sql);
        if(!empty($info))
            $this->userGold = $info->userGold;
    }

	public function addGold($addCnt,$payType = 2){
        if($addCnt <=0) return false;
        $this->userGold += $addCnt;
        $sql = "UPDATE userGold SET userGold =".$this->userGold." WHERE userId =".$this->userId;
        $this->userObj->userDB()->exec($sql);
        C_Log::insertAddGoldLog($this->userId,$addCnt,$this->userGold,$payType);
        return true;
	}
	public function subGold($subCnt,$pId = 1){
         if($subCnt <=0) return false;
         if($this->userGold<$subCnt) return false;
         $this->userGold -= $subCnt;
         $sql = "UPDATE userGold SET userGold =".$this->userGold." WHERE userId =".$this->userId;
         $this->userObj->userDB()->exec($sql);
         C_Log::insertSubGoldLog($this->userId,$subCnt,$this->userGold,$pId);
        return $true;
	}
    public function prePay($value)
	{
        return $this->userGold>=$value;
	}
}
?>