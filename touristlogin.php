<?php
require_once ('connect.php');
$username = str_replace(" ","",$_POST['username']);
$sql = "select * from user where userAccount='".$username."'";
$query=mysql_query($sql);
$rs = mysql_fetch_array($query);

if(is_array($rs)>0){
    if($_POST['password'] == $rs['password']){
        $userInfo = array("username"=>$rs['userAccount'],
            "introduce"=>$rs['introduce'],
            "tel"=>$rs['tel'],
            "photo"=>$rs['photo']);
        Response::json(1,"Login success",$userInfo);
    }else{
        Response::json(0,"Login fail","");
    }
}else{
    Response::json(0,"Login fail","");
}
mysql_close($conn);
?>