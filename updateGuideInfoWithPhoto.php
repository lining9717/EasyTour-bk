<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/4/12
 * Time: 21:20
 */

require_once ('connect.php');
$oldusername = str_replace(" ","",$_POST['oldusername']);
$username = str_replace(" ","",$_POST['username']);
$tel = str_replace(" ","",$_POST['telephone']);
$introduce = $_POST['introduce'];
$place = $_POST['place'];

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

$sql_get = "select * from guider where guiderAccount ='" . $oldusername . "'";
$query_get = mysql_query($sql_get);
$rs = mysql_fetch_array($query_get);
$password = $rs['password'];
$realname = $rs['name'];
$star = $rs['star'];
$ID = $rs['IDnumber'];

$sql_delete = "delete from guider where guiderAccount = '".$oldusername."'";
if(mysql_query($sql_delete)) {
    if($_FILES["file"]["error"]>0){
        Response::json(0,"register fail file error: ". $_FILES["file"]["error"],"");
    }else {
        $newfile= time().rand(1,1000).substr($_FILES["file"]["name"],strrpos($_FILES["file"]["name"],"."));
        $imgpath= "http://118.89.18.136/EasyTour/EasyTour-Img/img/".$newfile;
        if (move_uploaded_file($_FILES["file"]["tmp_name"], "img/".$newfile)) {
            $check = isUserNmaeExist($username);
            if ($check) {
                Response::json(0,"username exists","");
            } else {
                $sql_insert = "insert into guider(guiderAccount,password,tel,name,introduce,photo,place,IDnumber,star) ".
                    "values('".$username."','".$password."','".$tel."','".$realname."','".$introduce."','".$imgpath."','".$place."','".$ID."','".$star."')";
                $rs = mysql_query($sql_insert);
                if ($rs) {
                    Response::json(1,"update success",$imgpath);
                } else {
                    Response::json(0,"update fail sql error:" . mysql_error(),"");
                }
            }
        }
        else{
            Response::json(0,"register fail image error: " . $_FILES["file"]["error"],"");
        }
    }
}else{
    Response::json(0,"delete fail sql error:" . mysql_error(),"");
}
