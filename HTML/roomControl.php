<?php
    $roomid = $_GET['Room'];
    $electricQuan = $_GET['elecQuan'];
    $waterQuan = $_GET['waterQuan'];

    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "myDorm";
    
    $mysqli = new mysqli($host,$user,$pass,$dbname);
    //Room
    $sql = "SELECT `userID`, `price` FROM `room` WHERE roomID = '".$roomid."'";
    $result =  $mysqli->query($sql);
    while ($w = mysqli_fetch_array($result)){
        $userID = $w[0];
        $price = $w[1];
    }
    //Admin
    $sql = "SELECT `electricRate`, `waterRate` FROM `admin` WHERE 1";
    $result =  $mysqli->query($sql);
    while ($w = mysqli_fetch_array($result)){
        $electricRate = $w[0];
        $waterRate = $w[1];
    }
    $total = ($electricQuan*$electricRate)+($waterRate*$waterQuan)+$price;
    //User
    $sql = "UPDATE `user` SET `total`='".$total."' WHERE `userID` = '".$userID."'";
    $result = $mysqli->query($sql);
    //Bill
    $sql = "UPDATE `bill` SET `waterNow` = '".$waterQuan."',
    `electricNow` = '".$electricQuan."' WHERE `roomID` = '".$roomid."'";
    $result = $mysqli->query($sql);

    mysqli_close($mysqli);
    header("Location: manage.php");
?>