<?php
require('inc.php');
ini_set('memory_limit', '2560M');
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'on');
header("Content-type: text/html; charset=utf-8");
$file_path = "/home/www/gamemanager/souhu_website/log_2017-02-24_1.log";
$db = DB::connect("DB_USR");
$file_arr=file($file_path);
$cnt = count($file_arr);
$pName = 'com.live.xhdl.xndh';
for($i = 0;$i<$cnt;$i++){
    $v = $file_arr[$i];
   // echo $v;break;
    $v = str_replace("\r\n","",$v);
    $v = str_replace("\n","",$v);
    $v = str_replace("\r","",$v);

    $info = explode("^",$v);
   
    $time = $info[0];
    $result = $info[1];
    if(empty($time) || empty($result)) continue;
   
    $result = json_decode($result);
    // foreach($result as $key=>$value){
    //     echo $key.":".$value;
    //     echo "\n";
    // }
    if(empty($result)) continue;
    
    $downloadId = $result->downloadId;
   // echo $result;
    //echo  "\n";
    //echo $downloadId;break;
    $appId = $result->appId;
    $imei = $result->imei;
    $imsi = $result->imsi;
    $uuid = $result->uuid;
    $channel = $result->channel;
    $existsPackages = $result->existsPackages;
    $pList = explode("*",$existsPackages);
    $isExists = 0;
    if(in_array($pName,$pList)) $isExists = 1;
    $mac = $result->mac;
    $sql = "INSERT INTO down(downloadId,appId,imei,imsi,uuid,channel,isExists,mac,createTime)values(".$downloadId.",".$appId.",'".$imei."','".$imsi."','".$uuid."','".$channel."',".$isExists.",'".$mac."','".$time."');";
    // echo $sql;
    // break;
    $db->exec($sql);
    
}
// $sql = "SELECT ip FROM ip";
// $list = $db->fetchAll($sql);
// for($list as $row){
//     echo long2ip($row->ip);
//     echo "<br/>";
// }
?>