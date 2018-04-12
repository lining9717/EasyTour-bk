<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/4/12
 * Time: 19:16
 */

require_once ('connect.php');
$oldusername = str_replace(" ","",$_POST['oldusername']);
$username = str_replace(" ","",$_POST['username']);
$tel = str_replace(" ","",$_POST['telephone']);
$introduce = str_replace(" ","",$_POST['introduce']);

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

$sql_get = "select password from user where userAccount='" . $oldusername . "'";
$query_get = mysql_query($sql_get);
$rs = mysql_fetch_array($query_get);
$password = $rs['password'];

$sql_delete = "delete from user where userAccount = '".$oldusername."'";
if(mysql_query($sql_delete)){
    if($_FILES["file"]["error"]>0){
        echo "register fail file error: ". $_FILES["file"]["error"];
    }else {
        $newfile= time().rand(1,1000).substr($_FILES["file"]["name"],strrpos($_FILES["file"]["name"],"."));
        $imgpath= "http://118.89.18.136/EasyTour/EasyTour-Img/img/".$newfile;
        if (move_uploaded_file($_FILES["file"]["tmp_name"], "img/".$newfile)) {
            $check = isExist($username);
            if ($check) {
                echo "username exists";
            } else {
                $sql_insert = "insert into user(userAccount,password,introduce,tel,photo) values('" . $username . "','" . $password . "','".$introduce."','" . $tel . "','".$imgpath."')";
                $rs = mysql_query($sql_insert);
                if ($rs) {
                    echo "update success";
                } else {
                    echo "update fail sql error:" . mysql_error();
                }
            }
        }
        else{
            echo "register fail image error: " . $_FILES["file"]["error"];
        }
    }
}else{
    echo "delete fail sql error:" . mysql_error();
}




