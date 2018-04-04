<?php
$servername = "localhost";
$username = "root";
$password = "Abc12345";
$dbname = "EasyTour";

//$conn = new mysqli($servername,$username,$password,$dbname);
$conn = mysql_connect($servername,$username,$password) or die("connect error");
mysql_select_db($dbname,$conn);
mysql_query("set names 'UTF-8'");
//if($conn->connect_error){
//    die("Fail to connect: ".$conn->connect_error);
//}

$username = str_replace(" ","",$_POST['username']);

$sql = "select * from guider where guiderAccount='".$username."'";
//$rs = $conn->query($sql);
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