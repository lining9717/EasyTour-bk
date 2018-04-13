<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/4/11
 * Time: 19:55
 */

require_once ('connect.php');

$username = str_replace(" ","",$_POST['username']);

$sql = "select * from orders where userAccount = '".$username."'";
$query = mysql_query($sql);
if($query){
    $arr = array();
    while ($row = mysql_fetch_array($query)) {
        $info = array(
            "orderID" => $row['orderID'],
            "username" => $row['userAccount'],
            "guidername" => $row['guiderAccount'],
            "begin_day" => $row['begin_day'],
            "end_day" => $row['end_day'],
            "place" => $row['place'],
            "place_descript" => $row['place_discripts'],
            "time_descript" => $row['time_discripts'],
            "num_of_people" => $row['numofPeople'],
            "isDone" => $row['isDone']);
        array_push($arr, $info);
    }
    echo Response::json(1, "success", $arr);
}else{
    Response::json(0, "fail".mysql_error(), "");
}
mysql_close($conn);
