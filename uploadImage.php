<?php
/**
 * Created by PhpStorm.
 * User: lining
 * Date: 2018/4/12
 * Time: 9:52
 */
if($_FILES["file"]["error"]>0){
    Response::json(0,"upload image fail","");
}else{
    $target_path  = "http://118.89.18.136/EasyTour/img/";//接收文件目录

    $target_path = $target_path.($_FILES['file']['name']);
    if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
        Response::json(1,"upload image success","");
    }else{
        Response::json(2,"upload image fail","");
    }
}

