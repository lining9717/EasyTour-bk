<?php
$servername = "localhost";
$username = "root";
$password = "Abc12345";
$dbname = "EasyTour";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("Fail to connect: ".$conn->connect_error);
}

/**
 * create tables
 */

//create user table
$user_table_sql = "create table user(
userID int(11) unsigned AUTO_INCREMENT primary key,
userAccount varchar(10) not null,
password varchar(16) not null,
introduce varchar(50),
tel int(11) not null,
photo varchar(200)
)";

if ($conn->query($user_table_sql) === TRUE) {
    echo "Table user created successfully";
} else {
    echo "Fail to create user table " . $conn->error;
}


////create guider table
$guider_table_sql = "create table guider(
guiderID int(11) unsigned AUTO_INCREMENT primary key,
guiderAccount varchar(10) not null,
password varchar(16) not null,
name varchar(10) not null,
tel int(11) not null,
IDnumber int(18) not null,
introduce varchar(50),
photo varchar(200),
place varchar(20),
star int
)";

if ($conn->query($guider_table_sql) === TRUE) {
    echo "Table guider created successfully";
} else {
    echo "Fail to create guider table " . $conn->error;
}

//create order table
$order_table_sql = "create table orders(
orderID int(11) unsigned AUTO_INCREMENT primary key,
userID int(11) unsigned not null,
guiderID int(11) unsigned not null,
begin_day date not null,
end_day date not null,
place varchar(20) not null,
discripts varchar(50) not null,
numofPeople int not null,
isDone bit not null,
foreign key(userID) references user(userID),
foreign key(guiderID) references guider(guiderID)
)";

if ($conn->query($order_table_sql) === TRUE) {
    echo "Table orders created successfully\n";
} else {
    echo "Fail to create order table " . $conn->error."\n";
}


//create comment table
$comment_table_sql = "create table comment(
commentID int(11) unsigned AUTO_INCREMENT primary key,
userID int(11) unsigned not null,
content varchar(100) not null,
time date not null,
foreign key(userID) references user(userID)
)";

if ($conn->query($comment_table_sql) === TRUE) {
    echo "Table guider created successfully\n";
} else {
    echo "Fail to create comment table " . $conn->error."\n";
}


//create recommend table
$recommend_table_sql = "create table recommend(
recommendId int(11) unsigned AUTO_INCREMENT primary key,
title varchar(10) not null,
picture varchar(200),
discript varchar(50) not null,
zan int,
commentID int(11) unsigned not null,
foreign key(commentID) references comment(userID)
)";

if ($conn->query($recommend_table_sql) === TRUE) {
    echo "Table recommend created successfully\n";
} else {
    echo "Fail to create recommend table " . $conn->error."\n";
}

$conn->close();
?>