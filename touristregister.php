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

if($_FILES["file"]["error"]>0){
    echo "register fail: ". $_FILES["file"]["error"];
}else{
    $imgpath= "http://118.89.18.136/EasyTour/img/".$_FILES["file"]["name"];
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $imgpath)){
        $check = isExist($username);
        if($check){
            echo "username exists";
        }else{
            $sql_insert = "insert into user(userAccount,password,tel) values('".$username."','".$password."','".$tel."')";
            $rs = mysql_query($sql_insert);
            if($rs){
                echo "register success";
            }else {
                echo "register fail: ".mysql_error();
        }
    }else{
       echo "register fail: ". $_FILES["file"]["error"];
    }
}
mysql_close($conn);
