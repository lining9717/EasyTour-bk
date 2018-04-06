<?php
require_once ('connect.php');

$username = str_replace(" ","",$_POST['username']);

$sql = "select * from guider where guiderAccount='".$username."'";
$query=mysql_query($sql);
$rs = mysql_fetch_array($query);
if(is_array($rs)>0){
    if($_POST['password'] == $rs['password']){
        $guiderInfo = array(
            "guidername"=>$rs['guiderAccount'],
            "introduce"=>$rs['introduce'],
            "realname"=>$rs['name'],
            "tel"=>$rs['tel'],
            "photo"=>$rs['photo'],
            "place"=>$rs['place'],
            "star"=>$rs['star'],
            "IDnumber"=>$rs['IDnumber']);
        Response::json(1,"Login success",$guiderInfo);
    }else{
        Response::json(0,"Login fail".mysql_error(),"");
    }
}else{
    Response::json(0,"Login fail".mysql_error(),"");
}
?>