<?php
    session_start();
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "myDorm";
    
    $mysqli = new mysqli($host,$user,$pass,$dbname);
    $sql = "UPDATE `user` SET `total` = 0 WHERE `userID` = '".$_SESSION["userID"]."'";
    $result =  $mysqli->query($sql);

    $sql = "SELECT `waterNow`, `waterPrevious`, `electricNow`, `electricPrevious`, `currentMonth`
    FROM `bill`WHERE `roomID` = '".$_SESSION["roomID"]."'";
    $result =  $mysqli->query($sql);
    while ($w = mysqli_fetch_array($result)){
        $waterPrevious = $w[0];
        $waterLastest = $w[1];
        $electricPrevious = $w[2];
        $electricLastest = $w[3];
        $currentMonth = $w[4];
    }
    if($currentMonth == 12) $currentMonth = 1;
    else $currentMonth++;
    $sql = "UPDATE `bill` SET `waterNow` = 0, `waterPrevious` = $waterPrevious,
    `waterLastest` = $waterLastest, `electricNow` = 0, `electricPrevious` = $electricPrevious,
    `electricLastest` = $electricLastest, `currentMonth` = $currentMonth WHERE `roomID` = '".$_SESSION["roomID"]."'";
    $result =  $mysqli->query($sql);
    mysqli_close($mysqli);
    header("Location: main_user.php");
?>