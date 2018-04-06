<?php
$servername = "localhost";
$username = "root";
$password = "Abc12345";
$dbname = "EasyTour";

$conn = mysql_connect($servername,$username,$password) or die("connect error");
mysql_select_db($dbname,$conn);
mysql_query("set names 'UTF-8'");

class Response{
	public static function json($code,$message="",$data=array()){
		$result=array(  
              'code'=>$code,  
              'message'=>$message,  
              'data'=>$data   
            );  
            //输出json  
            echo json_encode($result);  
            exit;  
	}
}
?>