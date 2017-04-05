<?php
class C_UserGold
{
	public $userId = 0;
	private $userObj;
	function __construct($userId)
	{
		if(empty($userId)) die('Error: Missing userId');
		$this->userId = $userId;
	}
	function __destruct()
	{
        unset($this->userObj);
	}
    
	public function addGold($addCnt){
		
	}
	public function subGold($subCnt){

	}
}
?>