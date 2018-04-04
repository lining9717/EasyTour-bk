<?php
$servername = "localhost";
$username = "root";
$password = "Abc12345";
$dbname = "EasyTour";

$conn = mysql_connect($servername,$username,$password) or die("connect error");
mysql_select_db($dbname,$conn);
mysql_query("set names 'UTF-8'");
$username = str_replace(" ","",$_POST['username']);
$sql = "select * from user where userAccount='".$username."'";
$query=mysql_query($sql);
$rs = mysql_fetch_array($query);
if(is_array($rs)>0){
    if($_POST['password'] == $rs['password']){
        echo "Login succeed";
    }else{
        echo "Login error";
    }
}else{
    echo "Login error";
}
?>