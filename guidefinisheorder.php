<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/4/13
 * Time: 15:10
 */

require_once('connect.php');
$orderID = str_replace(" ","",$_POST['orderid']);
$orderID = (int)$orderID;
$sql = "update orders set isDone = 'Yes' where orderID = $orderID";
if(mysql_query($sql))
    echo Response::json(1,"finish success","");
else
    echo Response::json(0,"finish fail ".mysql_error(),"");
mysql_close($conn);