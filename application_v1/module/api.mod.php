<?php
$_REQUEST = (object)$_REQUEST;
//var_dump($_REQUEST);
//生成当前用户对象

C_Com::debugLog("request.log",json_encode($_REQUEST));
$apiMethod = $_REQUEST->action;
$result = in_array($apiMethod,get_class_methods('API')) ? API::$apiMethod($_REQUEST) : C_Com::apiResult(-1);
C_Com::apiResponse($result);
class API
{
	public static $currUser;
    public static function createUser($param){
        $userName = $param->userName;
        $nickName = $param->nickName;
        $userPass = $param->userPass;
        if(empty($userName) || empty($nickName) || empty($userPass)) return C_Com::apiResult(-2);
        $userInfo = C_CurrUser::createUser($userName,$userPass,$nickName);
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
        $newPass = $param->newPass;
        $newPassTwo = $param->newPassTwo;
        if(empty($newPass) || empty($newPassTwo)) return C_Com::apiResult(-2);
        if($newPass != $newPassTwo) return C_Com::apiResult(-1007);
        return C_Com::apiResult(0,C_CurrUser::modifyUserPass($newPass,$newPassTwo));
    }
    public static function logout(){
        return C_Com::apiResult(0,C_CurrUser::userLogout());
    }
}

?>