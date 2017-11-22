<?php
    $id = $_GET["check"];

    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "myDorm";
    
    $mysqli = new mysqli($host,$user,$pass,$dbname);
    $sql = "DELETE FROM `appeal` WHERE `id` = $id";
    $result =  $mysqli->query($sql);
    mysqli_close($mysqli);
    header("Location: main_admin.php");
?>