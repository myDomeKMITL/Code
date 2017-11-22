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
                    <div class="col-md-4 space-bottom"><a href="main_admin.php">Main Menu</a></div>
                    <div class="col-md-4 space-bottom"><a href="manage.php">Manage Room</a></div>
                    <div class="col-md-4 space-bottom"><a href="contact_us.php">Contact Us</a></div>
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
                        
                        $mysqli = new mysqli($host,$user,$pass,$dbname);

                        $sql = "SELECT `telephone`, `address` FROM `admin` WHERE 1";
                        $result =  $mysqli->query($sql);
                        
                        while ($w = mysqli_fetch_array($result)){
                            $Tel = $w[0];
                            $Address = $w[1];
                        }
                        mysqli_close($mysqli);
                    ?>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8"><h1>Contact us</h1></div>
                        <div class="col-md-2"><a href="admin_edit_contact.php">edit?</a></div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <img src="Picture/phone-call.png" style="position: absolute; right:2%; height:70px; width:70px;">
                        </div>
                        <div class="col-md-9" style="text-align:left; margin-top:20px;">
                            <span>Tel: </span>
                            <span><?php echo $Tel; ?></span>
                        </div>
                    </div>
                    <div class="row" style="margin: 50px 0px">
                        <div class="col-md-3">
                            <img src="Picture/village.png" style="position: absolute; right:2%; height:70px; width:70px;">
                        </div>
                        <div class="col-md-9" style="text-align:left; margin-top:20px;">
                            <span>Address: </span>
                            <span><?php echo $Address; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>