<?php
require_once ('connect.php');

$orderID = $_POST['orderid'];
$guiderAccount = $_POST['guidername'];
$orderID = (int)$orderID;

$sql = "update guider set guiderAccount = '".$guiderAccount."' where orderID = $orderID";
if(mysql_query($sql))
    echo Response::json(1,"accept success","");
else
    echo Response::json(0,"accept fail ".mysql_error(),"");
mysql_close($conn);