<?php
require_once ('connect.php');
$username = str_replace(" ","",$_POST['username']);
$password = str_replace(" ","",$_POST['password']);
$realname = str_replace(" ","",$_POST['realname']);
$ID = str_replace(" ","",$_POST['IDnumber']);
$tel = str_replace(" ","",$_POST['telephone']);
function isUserNmaeExist($username){
   $sql_check = "select guiderAccount from guider";
   $res = mysql_query($sql_check);
   while($row = mysql_fetch_assoc($res)){
       if($row['guiderAccount'] == $username){
           return true;
       }
   }
   return false;
}
$checkUserName = isUserNmaeExist($username);
if($checkUserName){
    echo "username exists";
}else{
   $sql_insert = "insert into guider(guiderAccount,password,tel,name,IDnumber) values('".$username."','".$password."','".$tel."','".$realname."','".$ID."')";
   $rs = mysql_query($sql_insert);
   if($rs){
       echo "register successful";
   }else{
       echo "register fail";
   }
}
mysql_close($conn);
?>