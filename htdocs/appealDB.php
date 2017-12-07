<?php
    session_start();
    $date = date("Y-m-d");

    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "myDorm";
    
    $mysqli = new mysqli($host,$user,$pass,$dbname);
    $sql = "SELECT `ID` FROM `appeal` ORDER BY `appeal`.`ID` ASC";
    $result =  $mysqli->query($sql);
    $id = 1;
    while ($w = mysqli_fetch_array($result)){
        if($id == $w[0]) $id++;
        else break;
    }

    if($_GET["type"] == 1){
        $message = "Loud and Noisy";
        $sql = "INSERT INTO appeal(ID,date,room,message) VALUES ('".$id."','".$date."','".$_GET["room"]."','".$message."')";
        $result = $mysqli->query($sql);
    } elseif ($_GET["type"] == 2){
        $message = "Smoking";
        $sql = "INSERT INTO appeal(ID,date,room,message) VALUES ('".$id."','".$date."','".$_GET["room"]."','".$message."')";
        $result = $mysqli->query($sql);
    } elseif ($_GET["type"] == 3){
        $message = $_GET["message"];
        $sql = "INSERT INTO appeal(ID,date,room,message) VALUES ('".$id."','".$date."','".$_SESSION["room"]."','".$message."')";
        $result = $mysqli->query($sql);
    } else {
        $message = $_GET["message"];
        $sql = "INSERT INTO appeal(ID,date,room,message) VALUES ('".$id."','".$date."','".$_SESSION["room"]."','".$message."')";
        $result = $mysqli->query($sql);
    }
    mysqli_close($mysqli);
    $_SESSION["success"] = 1;
    header("Location: appeal.php");
?>