<!DOCTYPE html>
<html>
<head>
<style>
    body{
        background-color: darkgrey;
    }
    h1{
        color: orange;
    }
    p{
        color: orange;
    }
</style>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>status posting system </title>
</head>
<body>
<h1>Status posting system</h1>
<?php
include "poststatusform.html";
$statuscode;
$status;
$date;
$share;
$likes;
$comments;
$sharing;
if(isset($_POST["statuscode"])){
    $statuscode = $_POST["statuscode"];
}
if(isset($_POST["status"])){
    $status = $_POST["status"];
}
if(isset($_POST["date"])){
    $date = $_POST["date"];
}
if(isset($_POST["share"])){
    $share = $_POST["share"];
}
if(isset($_POST["allowlikes"])){
    $likes = "likes enabled";
}
else{
    $likes = "likes disabled";
}
if(isset($_POST["allowcomments"])){
    $comments = "comments enabled";
}
else{
    $comments = "comments disabled";
}
if(isset($_POST["allowsharing"])){
    $sharing = "sharing enabled";
}
else{
    $sharing = "sharing disabled";
}
$connection = mysqli_connect("cmslamp14.aut.ac.nz", "prq2929", "");
if(mysqli_connect_errno()){
    echo "connection error" . "<br>";
    exit();
}
//else{
//    echo "no issues" . "<br>";
//}
$sql = "CREATE DATABASE IF NOT EXISTS myDB";
$isError = mysqli_query($connection, $sql);
//echo $isError;
//echo "<br>";
//if(mysqli_query($sql, $connection)){
//    echo "database created" . "<br>";
//}
//else{
//    echo "error found: " . mysqli_error($connection) . "<br>";
//    echo mysqli_error($connection);
//    echo "<br>";
//}
mysqli_select_db(connection, "myDB");
$query = "CREATE TABLE IF NOT EXISTS posts (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
statuscode VARCHAR(30) NOT NULL,
status VARCHAR(30) NOT NULL,
date DATE NOT NULL,
likes VARCHAR(30),
comments varchar(30),
sharing VARCHAR(30)
)";
mysqli_query($connection, $query);
$query = "INSERT INTO posts (id, statuscode, status, date, likes, comments, sharing)
VALUES (1," . $statuscode . "," . $status . "," .  $date . ", " . $share . ", " . $likes . ", " . $comments . ", " . $sharing . ")";
mysqli_query($connection, $query);
//if(mysqli_query($connection, $query)){
//    echo "data saved successfully <br>";
//}
//else{
//    echo "an error has occured <br>";
//}
//$query = "SELECT * FROM myDB";
//$result = mysqli_query($connection, $query);
//if(mysqli_num_rows(result) > 0){
//    while($row = mysqli_fetch_assoc($result)){
//        echo "ID: " . $row["id"];
//    }
//}
//echo "end reached" . "<br>";
//echo mysqli_get_host_info($connection);
//        print_r($_POST);
?>
<a href="http://prq2929.cmslamp14.aut.ac.nz/assign1/index.html";>return to home page</a>
</body>
</html>
