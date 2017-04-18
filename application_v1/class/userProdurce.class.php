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
        $sql = "SELECT id,userId,pId,puserId,pAccountNo,pHeadUrl,pnickName FROM userProdurce ORDER BY id";
        $list = $this->objUser->userDB()->fetchAll($sql);
        return $list;
    }


    /****
    *绑定飞虎直播账号
    **/
    public function bindProdurceInfo($pId,$bindAccountNo,$bindPwd){
        $url = "https://dev.feihutv.cn/platform/getUserInfo";
        $souhuSecret = 'hEbiRk+8@kRCMJ@aN3UfW[bKk#xiJ01I';
        $time = time();
        $sign = "";
        $requestData = array('accountNo'=>$bindAccountNo,'passWd'=>$bindPwd,'t'=>$time);
        $sigparams = array('accountNo','passWd','t');
        sort($sigparams);
        $sigStr = '';
        foreach($sigparams as $param){
            $sigStr .= $param.'='.$requestData[$param];
        }
        $sigStr .= $souhuSecret;
        $sig = md5($sigStr);
        $requestData['sig'] = $sig;

        $ch = curl_init();
		$queryList = http_build_query($requestData, null, '&');
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
		//print_r($result);
		if (false === $result)
		{
			// cURL 网络错误, 返回错误码为 cURL 错误码加偏移量
			// 详见 http://curl.haxx.se/libcurl/c/libcurl-errors.html
			// $err = array(
			// 	'ret' => 3000 + curl_errno($ch),
			// 	'msg' => curl_error($ch));
			// curl_close($ch);
			// return $err;
             return C_Com::apiResult(-23);
		}
		curl_close($ch);
		
		$result_array = json_decode($result, true);
		// 远程返回的不是 json 格式, 说明返回包有问题
		if (is_null($result_array)) {
			// return array(
			// 	'ret' => PYO_ERROR_RESPONSE_DATA_INVALID,
			// 	'msg' => $result);
            return C_Com::apiResult(-2001);
		}
        else{
            $code =  $result_array->Code;
            if($code == "0"){
                $userInfo =  $result_array->Data;
                //userId:用户id,avatar:头像地址,nickname:昵称,gender:性别}}
                $avatar = $userInfo->avatar;
                $nickname = $userInfo->nickname;
                $gender = $userInfo->gender;
                $sql = "INSERT INTO userProdurce(userId,pId,puserId,gender,pHeadUrl,pnickName)VALUES(".$this->userId.",".$pId.",".$userInfo->userId.",".$gender.",'".$avatar."','".$nickname."')";
                $id = $this->objUser->userDB()->execFetchId($sql);
                if($id >0){
                    $data = new stdclass;
                    $data->id = $id;
                    $data->pId = $pId;
                    $data->userId = $this->userId;
                    $data->puserId = $userInfo->userId;
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
		return $result_array;
    }

}
?>