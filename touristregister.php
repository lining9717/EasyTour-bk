<?php

$servername = "localhost";
$username = "root";
$password = "Abc12345";
$dbname = "EasyTour";
$conn = mysql_connect($servername,$username,$password) or die("connect error");
mysql_select_db($dbname,$conn);
mysql_query("set names 'UTF-8'");
$username = str_replace(" ","",$_POST['username']);
$password = str_replace(" ","",$_POST['password']);
$tel = str_replace(" ","",$_POST['telephone']);
function isExist($conn,$username){
   $sql_check = "select userAccount from user";
   $res = mysql_query($sql_check);
   while($row = mysql_fetch_assoc($res)){
       if($row['userAccount'] == $username){
           return true;
       }
   }
   return false;
}
$check = isExist($conn,$username);
if($check){
   echo "username exists";
}else{
   $sql_insert = "insert into user(userAccount,password,tel) values('".$username."','".$password."','".$tel."')";
   $rs = mysql_query($sql_insert);
   if($rs){
       echo "register successful";
   }else{
       echo "register fail";
   }
}
mysql_close($conn);
?>