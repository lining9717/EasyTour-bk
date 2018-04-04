<?php
$servername = "localhost:3306";
$username = "root";
$password = "Abc12345";

$conn = new mysqli($servername,$username,$password);

if($conn->connect_error){
    die("Fail to connect: ".$conn->connect_error);
}

$sql = "create database EasyTour";
if($conn->query($sql) === true){
    echo "Creating database successful";
}else{
    echo "Error creating database ".$conn->error;
}

$conn->close();
?>