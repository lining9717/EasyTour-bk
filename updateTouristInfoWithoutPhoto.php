<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/4/12
 * Time: 19:44
 */

$oldusername = str_replace(" ", "", $_POST['oldusername']);
$username = str_replace(" ", "", $_POST['username']);
$tel = str_replace(" ", "", $_POST['telephone']);
$introduce = str_replace(" ", "", $_POST['introduce']);

function isExist($username)
{
    $sql_check = "select userAccount from user";
    $res = mysql_query($sql_check);
    while ($row = mysql_fetch_assoc($res)) {
        if ($row['userAccount'] == $username) {
            return true;
        }
    }
    return false;
}

$sql_get = "select * from user where userAccount='" . $oldusername . "'";
$query_get = mysql_query($sql_get);
$rs = mysql_fetch_array($query_get);
$photo_path = $rs['photo'];
$password = $rs['password'];

$sql_delete = "delete from user where userAccount = '" . $oldusername . "'";
if (mysql_query($sql_delete)) {
    $check = isExist($username);
    if ($check) {
        echo "username exists";
    } else {
        $sql_insert = "insert into user(userAccount,password,introduce,tel,photo) values('" . $username . "','" . $password . "','" . $introduce . "','" . $tel . "','" . $photo_path . "')";
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

