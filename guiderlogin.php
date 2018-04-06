<?php
require_once ('connect.php');

$username = str_replace(" ","",$_POST['username']);

$sql = "select * from guider where guiderAccount='".$username."'";
$query=mysql_query($sql);
$rs = mysql_fetch_array($query);
if(is_array($rs)>0){
    if($_POST['password'] == $rs['password']){
        Response::json(1,"Login success","");
    }else{
        Response::json(0,"Login fail","");
    }
}else{
    Response::json(0,"Login fail","");
}
?>