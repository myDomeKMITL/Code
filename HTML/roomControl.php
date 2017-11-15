<?php
    $roomid = $_GET['Room'];
    $room =  $roomid[1];
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "myDorm";
    
    $mysqli = new mysqli($host,$user,$pass,$dbname);

    $sql = "SELECT `billIDPresent`, `billIDLast`, `price` FROM `room` WHERE roomID = 1101";
    $result =  $mysqli->query($sql);
    
    while ($w = mysqli_fetch_array($result)){
        $billPresent = $w[0];
        $billLast = $w[1];
        $roomPrice = $w[2];
    }
    echo $room;
    mysqli_close($mysqli);

    echo $billLast;
    echo $billPresent;
    echo $roomPrice;
    
?>