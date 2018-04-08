<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/4/8
 * Time: 15:30
 */
require_once ('connect.php');

$sql = "select * from orders";
$query=mysql_query($sql);


$arr = array();
while($row = mysql_fetch_array($query)){
    $info = array(
        "orderID"=>$row['orderID'],
        "username"=>$row['userAccount'],
        "guidername"=>$row['guiderAccount'],
        "begin_day"=>$row['begin_day'],
        "end_day"=>$row['end_day'],
        "place"=>$row['place'],
        "place_descript"=>$row['place_discripts'],
        "time_descript"=>$row['time_discripts'],
        "num_of_people"=>$row['numofPeople'],
        "isDone"=>$row['isDone']);
    array_push($arr,$info);
}
echo  json_encode($arr);

mysql_close($conn);