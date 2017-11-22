<?php
    session_start();

    $usernameIN = $_POST['username'];
    $passwordIN = $_POST['password'];

    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "myDorm";
    
    $mysqli = new mysqli($host,$user,$pass,$dbname);
    $sql = "SELECT `userID`, `username`, `password` FROM `user` WHERE `username` = '".$usernameIN."'";
    $result =  $mysqli->query($sql);
    while ($w = mysqli_fetch_array($result)){
        $_SESSION["userID"] = $userID = $w[0];
        $userDB = $w[1];
        $passDB = $w[2];
    }

    $sql = "SELECT `username`, `password` FROM `admin` WHERE 1";
    $result =  $mysqli->query($sql);
    while ($w = mysqli_fetch_array($result)){
        $userAdmin = $w[0];
        $passAdmin= $w[1];
    }

    $sql = "SELECT `roomID`,`price` FROM `room` WHERE `userID` = '".$userID."'";
    $result =  $mysqli->query($sql);
    while ($w = mysqli_fetch_array($result)){
        $_SESSION["roomID"] = $roomID = $w[0];
        $_SESSION["price"] = $w[1];
    }
    mysqli_close($mysqli);

    if($userDB == $usernameIN && $passwordIN == $passDB){
        $_SESSION["room"] = $roomID[1].$roomID[2].$roomID[3];
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["password"] = $_POST["password"];
        $_SESSION["receipt"] = 0;
        header("Location: main_user.php");
    } elseif($userAdmin == $usernameIN && $passAdmin == $passwordIN) {
        header("Location: main_admin.php");
    } else {
        $_SESSION["check"] = 1;
        header("Location: signin.php");
    }
?>