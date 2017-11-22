<?php
    $tel = $_GET['telephone'];
    $address = $_GET['address'];

    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "myDorm";
    
    $mysqli = new mysqli($host,$user,$pass,$dbname);

    $sql = "UPDATE `admin` SET `telephone`='".$tel."', `address`='".$address."' WHERE 1";
    $result =  $mysqli->query($sql);
    
    mysqli_close($mysqli);
    header("Location: contact_us.php");

?>