<?php
    ob_start();
    session_start();
    $date1 = date_create(date("Y-m-d")); // day now
    $date2 = date_create($_GET['date']); // day want

    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "myDorm";
    
    $mysqli = new mysqli($host,$user,$pass,$dbname);

    $sql = "SELECT `contract` FROM `user` WHERE `userID` = '".$_SESSION["userID"]."'";
    $result =  $mysqli->query($sql);
    while ($w = mysqli_fetch_array($result)) $contract = $w[0];
    
    if($_GET['btn'] == 2){
        $sql = "UPDATE `user` SET `moveout`= NULL WHERE `userID` = '".$_SESSION["userID"]."'";
        $result =  $mysqli->query($sql);
        while ($w = mysqli_fetch_array($result)) $contract = $w[0];
    } else {
        $date3 = date_create($contract);    // day contract
        $date4 = date_create(date("Y-m-d"));// day now + 30
        date_add($date4,date_interval_create_from_date_string("30 days"));
        // $diff = date_diff($date2,$date1);
        if(date_diff($date1, $date2)->format('%R%a') < 0){
            $_SESSION["move-type"] = 1;
        } elseif (date_diff($date2,$date3)->format('%R%a') < 0) { 
            $_SESSION["move-type"] = 2;
        } elseif (date_diff($date4,$date2)->format('%R%a') <= 0){
            $_SESSION["move-type"] = 3;
        } else {
            $_SESSION["move-type"] = 4;
            $sql = "UPDATE `user` SET `moveout`='".$_GET['date']."' WHERE `userID` = '".$_SESSION["userID"]."'";
            $result =  $mysqli->query($sql);
            while ($w = mysqli_fetch_array($result)) $contract = $w[0];
        }
    }
    mysqli_close($mysqli);
    header("Location: moveout.php");
?>