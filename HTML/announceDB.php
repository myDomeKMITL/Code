<?php
    $date = $_GET['date'];
    $type = $_GET['type'];
    $message = $_GET['message'];

    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "myDorm";
    
    $mysqli = new mysqli($host,$user,$pass,$dbname);
    //Room
    $sql = "INSERT INTO `announcement`(date,type,message) values ('$date','$type','$message')";
    $result =  $mysqli->query($sql);
    //Admin
    $sql = "SELECT `electricRate`, `waterRate` FROM `admin` WHERE 1";
    $result =  $mysqli->query($sql);

    mysqli_close($mysqli);
    header("Location: main_admin.php");
?>