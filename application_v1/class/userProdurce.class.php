<?php
class C_Produrce
{
	private $objUser;
    private $userId;
	function __construct($objUser)
	{
		$this->objUser = $objUser;
		$this->userId = $objUser->userId;
	}
	function __destruct()
	{
		unset($this->userId);
        unset($this->objUser);
		
	}

	/****
    *获取用户的产品列表
    **/
    public function getUserProdurceList(){
        $sql = "SELECT id,userId,pId,puserId,gender,pHeadUrl,pnickName FROM userProdurce ORDER BY id";
        $list = $this->objUser->userDB()->fetchAll($sql);
        return $list;
    }

    public function getUserProdurceInfoById($id){
        $sql = "SELECT id,userId,pId,puserId,gender,pHeadUrl,pnickName FROM userProdurce WHERE id=".$id;
        $info = $this->objUser->userDB()->fetch($sql);
        return $info;
    }



    /****
    *绑定飞虎直播账号
    **/
    public function bindProdurceInfo($pId,$bindAccountNo,$bindPwd){
        $time = time();
        $requestData = array('accountNo'=>$bindAccountNo,'passWd'=>$bindPwd,'t'=>$time);
        $sigparams = array('accountNo','passWd','t');
        $info = $this->httpRequest($sigparams,$requestData,'getUserInfo');
       // var_dump($info);die;
        $code =  $info["Code"];
        if($code == 0){
            $userInfo =  $info["Data"];
            $avatar = $userInfo["avatar"];
            $nickname = $userInfo["Nickname"];
            $gender = $userInfo["Gender"];
            $sql = "INSERT INTO userProdurce(userId,pId,puserId,gender,pHeadUrl,pnickName)VALUES(".$this->userId.",".$pId.",".$userInfo["UserId"].",".$gender.",'".$avatar."','".$nickname."')";
            $id = $this->objUser->userDB()->execFetchId($sql);
            if($id >0){
                $data = new stdclass;
                $data->id = $id;
                $data->pId = $pId;
                $data->userId = $this->userId;
                $data->puserId = $userInfo["UserId"];
                $data->gender = $gender;
                $data->pHeadUrl = $avatar;
                $data->nickName = $nickname;
                return $data;
            }
            else{
                return C_Com::apiResult(-22);
            }
        }else{
            return C_Com::apiResult(-2002);
        }
    }

    public function userPay($userPId,$addCnt,$price){
        //获取用户的产品信息
        $produceInfo = $this->getUserProdurceInfoById($userPId);
        if(empty($produceInfo)){
             return C_Com::apiResult(-3003);
        }
        $pUserId = $produceInfo->puserId;
        $time = time();
        $requestData = array('userId'=>$pUserId,'amount'=>$addCnt,'t'=>$time);
        $sigparams = array('userId','amount','t');
        $info = $this->httpRequest($sigparams,$requestData,'recharge');
        $code =  $info["Code"];
        if($code == 0){
            //扣除用户的飞虎币
            $ret = $this->objUser->userGold()->subGold($price,$produceInfo->pId);
            return $ret;
        }
        else{
            return C_Com::apiResult(-3004);
        }
    }

    private function httpRequest($sigparams,$param,$apiName){
        $url = feihuUrl.$apiName;
        //var_dump($url);
        sort($sigparams);
        $sigStr = $apiName;
        foreach($sigparams as $k){
            $sigStr .= $k.'='.$param[$k];
        }
        $sigStr .= feihuSecret;
        $sig = md5($sigStr);
        $param['sig'] = $sig;
        $ch = curl_init();
		$queryList = http_build_query($param, null, '&');
		//print_r($queryList);
		$opts = array();
		$opts[CURLOPT_RETURNTRANSFER] = true;
		$opts[CURLOPT_TIMEOUT] = 30;
		$opts[CURLOPT_POST] = 1;
		$opts[CURLOPT_POSTFIELDS] = $queryList;
		$opts[CURLOPT_USERAGENT] = 'chinasouhu-1.0';
		$opts[CURLOPT_URL] = $url;
		curl_setopt_array($ch, $opts);
		$result = curl_exec($ch);
        //var_dump($result);
		if (false === $result)
		{
            $ret = array();
            $ret["Code"]=-23;
            return $ret;
             //return C_Com::apiResult(-23);exit;
		}
		curl_close($ch);
        $result_array = json_decode($result, true);
		if (is_null($result_array)) {
            $ret = array();
            $ret["Code"]=-2001;
            return $ret;
		}
        return $result_array;
    }
}
?>