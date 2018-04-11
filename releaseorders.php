<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/4/8
 * Time: 12:31
 */

require_once ('connect.php');

$username = str_replace(" ","",$_POST['username']);
$place = $_POST['place'];
$place_description = $_POST['place_description'];
$time_description = $_POST['time_description'];
$start_time = str_replace(" ","",$_POST['start_time']);
$end_time = str_replace(" ","",$_POST['end_time']);
$number_of_people = str_replace(" ","",$_POST['number']);
$number_of_people = (int)$number_of_people;

$sql_insert = "insert into orders(userAccount,begin_day,end_day,place,place_discripts,time_discripts,numofPeople,isDone) "
                ."values('".$username."','".$start_time."','".$end_time."','".$place."','"
                .$place_description."','".$time_description."','".$number_of_people."','No')";
$rs = mysql_query($sql_insert);
if($rs){
    echo "release success";
}else{
    echo "release fail";
}
mysql_close($conn);

