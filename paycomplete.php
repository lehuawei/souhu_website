<?php
require('inc.php');  
$param = file_get_contents("php://input");
if(empty($param)) die('非法请求');
C_Com::debugLog("bill.log",print_r($param,true));

$merchantNo     = $_REQUEST['merchantNo'];
$merchantOrderNo = $_REQUEST['merchantOrderNo'];
$orderAmt = $_REQUEST['orderAmt'];
$orderPayStatus = $_REQUEST['orderPayStatus'];

?>