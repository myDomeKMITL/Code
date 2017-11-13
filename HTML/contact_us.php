<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/code/banner.css">
        <link rel="stylesheet" href="css/code/contact_us.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <title>Contact Us</title>
    </head>
    <body>
 
    
        <nav class="row fix-top">
            <div class="col-md-2 icon-bg">
                <img src="Picture/icon.png" alt="logo" width="100px" height="100px" style="padding: 0 auto; position: center; display: block; margin: auto;">
            </div>
            <div id="top" class="col-md-10 banner">
                <p class="banner">@ADMIN</p>
                <div class="row">
                    <div class="col-md-4 space-bottom"><a href="main_admin.html">Main Menu</a></div>
                    <div class="col-md-4 space-bottom"><a href="Manage_Room.html">Manage Room</a></div>
                    <div class="col-md-4 space-bottom"><a href="contact_us.html">Contact Us</a></div>
                </div>
            </div>
        </nav>
        <main role="main">
            <div class="row">
                <div class="container information">
					<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$dbname = "myDorm";
	
	$conn = mysql_connect($host,$user,$pass) or die("ไม่สามารถติดต่อฐานข้อมูลได้".mysql_error());
	
	mysql_select_db($dbname) or die ("เชื่อมต่อฐานข้อมูลไม่ได้".mysql_error());
	
	$sql = "SELECT `Tel`, `Address` FROM `Admin` WHERE 1";
	$result = mysql_query($sql);
	
	while ($w = mysql_fetch_array($result)){
		$Tel = $w[0];
		$Address = $w[1];
	}
	mysql_close($conn);
?>
                    <h1>Contact us</h1>
                    <span>Tel: </span>
                    <span><?php
						echo $Tel;
					?></span><br>
                    <span>Address: </span>
                    <span><?php
						echo $Address;
					?></span>
                </div>
            </div>
        </main>
    </body>
</html>