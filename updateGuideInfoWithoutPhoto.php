<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/4/12
 * Time: 21:33
 */

require_once('connect.php');
$oldusername = str_replace(" ", "", $_POST['oldusername']);
$username = str_replace(" ", "", $_POST['username']);
$tel = str_replace(" ", "", $_POST['telephone']);
$introduce = $_POST['introduce'];
$place = $_POST['place'];

function isUserNmaeExist($username)
{
    $sql_check = "select guiderAccount from guider";
    $res = mysql_query($sql_check);
    while ($row = mysql_fetch_assoc($res)) {
        if ($row['guiderAccount'] == $username) {
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
$photo_path = $rs['photo'];

$sql_delete = "delete from guider where guiderAccount = '" . $oldusername . "'";
if (mysql_query($sql_delete)) {
    $check = isUserNmaeExist($username);
    if ($check) {
        echo "username exists";
    } else {
        $sql_insert = "insert into guider(guiderAccount,password,tel,name,introduce,photo,place,IDnumber,star) values('" . $username . "','" . $password . "','" . $tel . "','" . $realname . "','" . $introduce . "','" . $photo_path . "','" . $place . "','" . $ID . "',".$star.")";
        $rs = mysql_query($sql_insert);
        if ($rs) {
            echo "update success";
        } else {
            echo "update fail sql error:" . mysql_error();
        }
    }
} else {
    echo "delete fail sql error:" . mysql_error();
}