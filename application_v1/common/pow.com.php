<?php
if(!defined('ACCESS_KEY')){header("HTTP/1.1 404 Not Found");die;}
class C_Pow
{
    private $resourceId = "";
	function __construct()
	{
        if(isset($_REQUEST['resourceId']))
            $this->resourceId = $_REQUEST['resourceId'];
        else if(isset($_REQUEST['id']))
		    $this->resourceId = $_REQUEST['id'];
      
        if(empty($this->resourceId)) die('非法访问');
	}
	function __destruct()
	{
		unset($this->resourceId);
	}

    //判断权限
    public function checkIsExistPow($powId){
        //var_dump($powId ."====".$this->resourceId);
        class_exists('C_User') or require(APP_PATH.'class/user.class.php');
        //获取用户所属的角色的资源列表
        $currUser = new C_User(C_CurrUser::$userId);
        $userInfo = $currUser->getUserInfo();
        $resourceList = $currUser->userResource()->getSysRoleResourceList($userInfo->roleId);
        foreach($resourceList as $row){
            if($row->resourceId == $this->resourceId){
               // var_dump($this->resourceId."====".$powId."=====".$row->auth."====".(pow(2,$powId-1) & $row->auth) );die;
                if((pow(2,$powId-1) & $row->auth) == pow(2,$powId-1)){
                    return true;
                }
                else{
                    return false;
                }
                break;
            }
        }
        return false;
    } 
}

?>
