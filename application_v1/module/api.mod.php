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
        $currUser = new C_User(C_CurrUser::$userId);
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
    public static function modifyUserInfo($param){
        $trueName = $param->userName;
        $sex =$param->userSex;
        $cardId=$param->userId;
        $provinceId = $param->userProv;
        $cityId = $param->userCity;
        $address = $param->userAddress;
        return C_Com::apiResult(0,C_CurrUser::modifyUserInfo($trueName,$sex,$cardId,$provinceId,$cityId,$address));
    }
//绑定直播账号
 public static function bindProdurce($param){
     if(!C_CurrUser::isLogin()){
          return C_Com::apiResult(-3);
     }
      if(!isset($param->pId))  return C_Com::apiResult(-2);
      if(!isset($param->bindAccountNo)) return C_Com::apiResult(-2);
      if(!isset($param->bindPwd)) return C_Com::apiResult(-2);
      class_exists('C_User') or require(APP_PATH.'class/user.class.php');
      //var_dump(C_CurrUser::$userId);die;
      $currUser = new C_User(C_CurrUser::$userId);
      $info = $currUser->userProdurce()->bindProdurceInfo($param->pId,$param->bindAccountNo,$param->bindPwd);
      return C_Com::apiResult(0,$info);
 }
 //支付
 public static function userOrder($param){
     if(!C_CurrUser::isLogin()){
          return C_Com::apiResult(-3);
     }
     if(!isset($param->shopId) && empty($param->shopId) && $param->shopId<1)  return C_Com::apiResult(-2);
     if(!isset($param->payType) && empty($param->payType) && $param->payType<1)  return C_Com::apiResult(-2);
     if(!isset($param->num) && empty($param->num) && $param->num<1)  return C_Com::apiResult(-2);
     if(!isset($param->userPId) && empty($param->userPId) && $param->userPId<1)  return C_Com::apiResult(-2);
    
     $payType = $param->payType;
     $shopId = $param->shopId;
     $num = $param->num;
     $userPId = $param->userPId;
     class_exists('C_User') or require(APP_PATH.'class/user.class.php');
     $currUser = new C_User(C_CurrUser::$userId);
     $info = $currUser->userOrder()->userOrder($payType,$shopId,$num);
     if($payType == 1){
         return C_Com::apiResult(0,$info);
     }
     else if($payType == 2){
        require_once(ROOT_PATH."alipay.config.php");
        require_once(ROOT_PATH."lib/alipay_submit.class.php");
        $parameter = array(
            "service"       => $alipay_config['service'],
            "partner"       => $alipay_config['partner'],
            "seller_id"  => $alipay_config['seller_id'],
            "payment_type"	=> $alipay_config['payment_type'],
            "notify_url"	=> $alipay_config['notify_url'],
            "return_url"	=> $alipay_config['return_url'],
            "anti_phishing_key"=>$alipay_config['anti_phishing_key'],
            "exter_invoke_ip"=>$alipay_config['exter_invoke_ip'],
            "out_trade_no"	=> $info->billNo,
            "subject"	=> $info->shopName,
            "total_fee"	=> $info->price,
            "body"	=> $body,
            "_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
        );
        $alipaySubmit = new AlipaySubmit($alipay_config);
        $html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
        echo $html_text;exit;
     }else if($payType == 3){
        //微信
        
     }
 }
}
?>