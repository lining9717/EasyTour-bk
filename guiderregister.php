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
$realname = str_replace(" ","",$_POST['realname']);
$ID = str_replace(" ","",$_POST['IDnumber']);
$tel = str_replace(" ","",$_POST['telephone']);
function isUserNmaeExist($conn,$username,){
   $sql_check = "select guiderAccount from guider";
   $res = mysql_query($sql_check);
   while($row = mysql_fetch_assoc($res)){
       if($row['guiderAccount'] == $username){
           return true;
       }
   }
   return false;
}
$checkUserName = isUserNmaeExist($conn,$username);
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