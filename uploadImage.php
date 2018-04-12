<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/4/12
 * Time: 9:52
 */
$target_path  = "http://118.89.18.136/EasyTour-bk/upload/";//接收文件目录
$target_path = $target_path.($_FILES['file']['name']);
$target_path = iconv("UTF-8","gb2312", $target_path);
if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
    echo "The file ".( $_FILES['file']['name'])." has been uploaded.";
}else{
    echo "There was an error uploading the file, please try again! Error Code: ".$_FILES['file']['error'];
}
