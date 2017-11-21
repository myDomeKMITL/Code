<?php
    session_start();
    $date = date("Y-m-d");

    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "myDorm";
    
    $mysqli = new mysqli($host,$user,$pass,$dbname);

    // $sql = "SELECT `name`, `contract`,`total`  FROM `user`";
    // $result =  $mysqli->query($sql);
    // $i = 0;
    // while ($w = mysqli_fetch_array($result)){
    //     $renter[$i] = $w[0];
    //     $contract[$i] = $w[1];
    //     $total[$i] = $w[2];
    //     $i++;
    // }
    // mysqli_close($mysqli);

    if($_GET["type"] == 1){
        $message = "Loud & Noisy";
        $sql = "INSERT INTO appeal(date,room,message,checkList) VALUES ('".$date."','".$_GET["room"]."','".$message."', 0)";
        $result = $mysqli->query($sql);
    } elseif ($_GET["type"] == 2){
        $message = "Smoking";
        $sql = "INSERT INTO appeal(date,room,message,checkList) VALUES ('".$date."','".$_GET["room"]."','".$message."', 0)";
        $result = $mysqli->query($sql);
    } elseif ($_GET["type"] == 3){
        $message = $_GET["message"];
        $sql = "INSERT INTO appeal(date,room,message,checkList) VALUES ('".$date."','".$_SESSION["room"]."','".$message."', 0)";
        $result = $mysqli->query($sql);
    } else {
        $message = $_GET["message"];
        $sql = "INSERT INTO appeal(date,room,message,checkList) VALUES ('".$date."','".$_SESSION["room"]."','".$message."', 0)";
        $result = $mysqli->query($sql);
    }
    mysqli_close($mysqli);
    $_SESSION["success"] = 1;
    header("Location: appeal.php");
?>