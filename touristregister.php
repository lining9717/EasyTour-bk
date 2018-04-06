<?php
require_once ('connect.php');
$username = str_replace(" ","",$_POST['username']);
$password = str_replace(" ","",$_POST['password']);
$tel = str_replace(" ","",$_POST['telephone']);
function isExist($username){
   $sql_check = "select userAccount from user";
   $res = mysql_query($sql_check);
   while($row = mysql_fetch_assoc($res)){
       if($row['userAccount'] == $username){
           return true;
       }
   }
   return false;
}
$check = isExist($username);
if($check){
    Response::json(0,"username exists","");
}else{
   $sql_insert = "insert into user(userAccount,password,tel) values('".$username."','".$password."','".$tel."')";
   $rs = mysql_query($sql_insert);
   if($rs){
       //echo "register successful";
       Response::json(1,"register successful","");
   }else{
       //echo "register fail: ".mysql_error();
       Response::json(2,"register fail: ".mysql_error(),"");
   }
}
mysql_close($conn);
?>