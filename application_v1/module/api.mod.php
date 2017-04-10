<?php
$_REQUEST = (object)$_REQUEST;
//var_dump($_REQUEST);
//生成当前用户对象
C_Com::debugLog("request.log",json_encode($_REQUEST));
$apiMethod = $_REQUEST->action;
//判断是否有某个方法没有则返回接口不存在
$result = in_array($apiMethod,get_class_methods('API')) ? API::$apiMethod($_REQUEST) : C_Com::apiResult(-1);
C_Com::apiResponse($result);
class API
{
	public static $currUser;
    public static function createUser($param){
        $mobileNo = $param->mobileNo;
        $smsCode = $param->smsCode;
        $nickName = $param->nickName;
        $userPass = $param->userPass;
        if(empty($smsCode) || empty($mobileNo) || empty($nickName) || empty($userPass)) return C_Com::apiResult(-2);
        //验证验证码是否正确
        $code = getRedisMain()->get('Sys/Sms/'.$mobileNo);

        if($code != $smsCode){
            return C_Com::apiResult(-1008);
        }
        $userInfo = C_CurrUser::createUser($mobileNo,$userPass,$nickName);
        return C_Com::apiResult(0,$userInfo);

    }
    public static function userLogin($param){
        $userName = $param->userName;
        $userPass = $param->userPass;
        if(empty($userName) || empty($userPass)) return C_Com::apiResult(-2);
        $userInfo = C_CurrUser::userLogin($userName,$userPass);
        return C_Com::apiResult(0,$userInfo);
    }
    public static function isLogin(){
        return C_Com::apiResult(0,C_CurrUser::isLogin());
    }
    public static function getUserInfo(){
        return C_Com::apiResult(0,C_CurrUser::getUserInfo());
    }
    public static function modifyUserPass($param){
        if(!C_CurrUser::isLogin()) return C_Com::apiResult(-3);
        $mobileNo = $param->mobileNo;
        $smsCode = $param->smsCode;
        $newPass = $param->newPass;
        $newPassTwo = $param->newPassTwo;
        if(empty($newPass) || empty($newPassTwo)) return C_Com::apiResult(-2);
        if($newPass != $newPassTwo) return C_Com::apiResult(-1007);
         $code = getRedisMain()->get('Sys/Sms/'.$mobileNo);
       /* var_dump($code);
        var_dump($smsCode);*/
          if($code != $smsCode){
            return C_Com::apiResult(-1008);
        }
        return C_Com::apiResult(0,C_CurrUser::modifyUserPass($newPass,$newPassTwo));
    }
    public static function findUserPass($param){
        $mobileNo = $param->mobileNo;
        $smsCode = $param->smsCode;
        $newPass = $param->newPass;
        $newPassTwo = $param->newPassTwo;
        if(empty($newPass) || empty($newPassTwo)) return C_Com::apiResult(-2);
        if($newPass != $newPassTwo) return C_Com::apiResult(-1007);
         $code = getRedisMain()->get('Sys/Sms/'.$mobileNo);
          if($code != $smsCode){
            return C_Com::apiResult(-1008);
        }
        return C_Com::apiResult(0,C_CurrUser::findUserPass($newPass,$newPassTwo,$mobileNo));
    }
   

    public static function logout(){
        return C_Com::apiResult(0,C_CurrUser::userLogout());
    }
    public static function addGold($param){
        if(!isset($param->addCnt)) return C_Com::apiResult(-2);
        $addCnt = $param->addCnt;
        $currUser = new C_User(C_CurrUser::userId);
        $result = $currUser->userGold()->addGold($addCnt);
        return C_Com::apiResult(0,$result);
    }
    /*
    *smsType:短信类型
    *1:注册
    *2:找回密码
    */
    public static function sendSms($param){
        if(!isset($param->mobileNo))  return C_Com::apiResult(-2);
        if(!isset($param->smsType)) return C_Com::apiResult(-2);
        $mobileNo = $param->mobileNo;
        $smsType = $param->smsType;
        //判断手机号码是否注册
        $isExist = C_CurrUser::isExistsMobile($param->mobileNo);
        if($smsType == 1){
            if($isExist){
                return C_Com::apiResult(-1003);
            }
        }
        else if($smsType == 2){
            if(!$isExist){
                return C_Com::apiResult(-1009);
            }   
        }
        else{
            return C_Com::apiResult(-2);
        }
        $result = C_CurrUser::sendRegSms($param->mobileNo,$smsType);
        return C_Com::apiResult(0,$result);
    }

//修改资料
    public static function modifyInfo($param){
        $trueName = $param->userName;
        $sex =$param->userSex;
        $provinceId = $param->userProv;
        $cityId = $param->userCity;
        $address = $param->userAddress;
    }
}

?>