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
if($_FILES["file"]["error"]>0){
    echo "register fail file error: ". $_FILES["file"]["error"];
}else{
    $newfile= time().rand(1,1000).substr($_FILES["file"]["name"],strrpos($_FILES["file"]["name"],"."));
    $imgpath= "http://118.89.18.136/EasyTour/EasyTour-Img/img/".$newfile;
    if (move_uploaded_file($_FILES["file"]["tmp_name"], "img/".$newfile)){
        $checkUserName = isUserNmaeExist($username);
        if($checkUserName){
            echo "username exists";
        }else{
            $sql_insert = "insert into guider(guiderAccount,password,tel,name,photo,IDnumber) values('".$username."','".$password."','".$tel."','".$realname."','".$imgpath."','".$ID."')";
            $rs = mysql_query($sql_insert);
            if($rs){
                echo "register successful";
            }else{
                echo "register fail".mysql_error();
            }
        }
    }else{
        echo "register fail image error: " . $_FILES["file"]["error"];
    }
}
mysql_close($conn);