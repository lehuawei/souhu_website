<?php
// echo phpinfo();
// die;
require('inc.php');
ini_set('memory_limit', '2560M');
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'on');
header("Content-type: text/html; charset=utf-8");
//$file_path = "/home/www/gamemanager/souhu_website/log_2017-02-24_1.log";

C_CurrUser::sendRegSms('15678282076');
die;


$db = DB::connect("DB_USR");
$sql = "SELECT  REGION_CODE,REGION_NAME FROM region order by REGION_CODE";
$list = $db->fetchAll($sql);
$l = array();
$first = array();
$second = array();
$three = array();
foreach($list as $row){
    if(substr($row->REGION_CODE,2,4) == '0000'){
        $first[] = $row;
    }
    else if(substr($row->REGION_CODE,4,2) == '00'){
        $second[] = $row;
    }
    else{
        $three[] = $row;
    }
    //$l[$row->REGION_CODE] = $row->REGION_NAME;
}
$data = new stdclass;
$r = array();
foreach($first as $f){
    $data1 = new stdclass;
    $data1->id = $f->REGION_CODE;
    $data1->name = $f->REGION_NAME;
    $r[$f->REGION_CODE] = $f->REGION_NAME;
   // print_r($r);
    echo "<br/>";
    echo "<br/>";
    $r1 = array();
    foreach($second as $s){
        if(substr($s->REGION_CODE,0,2) != substr($f->REGION_CODE,0,2)) continue;
        $data2 = new stdclass;
        $r1[$s->REGION_CODE] = $s->REGION_NAME;
        $r2 = array();
        $data2->id  = $s->REGION_CODE;
        $data2->name = $s->REGION_NAME;
        foreach($three as $t){
            if(substr($t->REGION_CODE,0,4) != substr($s->REGION_CODE,0,4)) continue;
            $r2[$t->REGION_CODE] = $t->REGION_NAME;
        }
        $data2->l = $r2;
       
        
        
        print_r($data2);       
         echo "<br/>";
          echo "<br/>";
       // break;
       // $r1[$s->REGION_CODE][] = $r2;
        
        //   echo "<br/>";
       
    }

  
  //  $r[] = $data1;
    //$data->a = $data1;
     //print_r($data1);
        echo "<br/>";
        echo "<br/>";
   //break;
   // $r[$f->REGION_CODE]->s1 = $r1;
}
//print_r($r);
 //print_r($r);

//print_r($l);
// $l = array();
// foreach($list as $key=>$val){
// //   echo $key."<br/>";
// //   print_r($val)."<br/>";
// //   echo "<br/>";
//     $id = 0;
//     $r = array();
//     foreach($val as $k=>$v){
//         $r[$k] = $v;
//         if($k == 'provinceId') $id = $v;
//     }
//     $l[$id] = $r;
    
// }
// print_r($l);
// $file_arr=file($file_path);
// $cnt = count($file_arr);
// $pName = 'com.live.xhdl.xndh';
// for($i = 0;$i<$cnt;$i++){
//     $v = $file_arr[$i];
//    // echo $v;break;
//     $v = str_replace("\r\n","",$v);
//     $v = str_replace("\n","",$v);
//     $v = str_replace("\r","",$v);

//     $info = explode("^",$v);
   
//     $time = $info[0];
//     $result = $info[1];
//     if(empty($time) || empty($result)) continue;
   
//     $result = json_decode($result);
//     // foreach($result as $key=>$value){
//     //     echo $key.":".$value;
//     //     echo "\n";
//     // }
//     if(empty($result)) continue;
    
//     $downloadId = $result->downloadId;
//    // echo $result;
//     //echo  "\n";
//     //echo $downloadId;break;
//     $appId = $result->appId;
//     $imei = $result->imei;
//     $imsi = $result->imsi;
//     $uuid = $result->uuid;
//     $channel = $result->channel;
//     $existsPackages = $result->existsPackages;
//     $pList = explode("*",$existsPackages);
//     $isExists = 0;
//     if(in_array($pName,$pList)) $isExists = 1;
//     $mac = $result->mac;
//     $sql = "INSERT INTO down(downloadId,appId,imei,imsi,uuid,channel,isExists,mac,createTime)values(".$downloadId.",".$appId.",'".$imei."','".$imsi."','".$uuid."','".$channel."',".$isExists.",'".$mac."','".$time."');";
//     // echo $sql;
//     // break;
//     $db->exec($sql);
    
// }
// $sql = "SELECT ip FROM ip";
// $list = $db->fetchAll($sql);
// for($list as $row){
//     echo long2ip($row->ip);
//     echo "<br/>";
// }
?>