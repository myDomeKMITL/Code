<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/code/manage.css">
        <link rel="stylesheet" href="css/code/banner.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <title>Manage Room</title>
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
                <div class="container information" style="padding: 20px;">
                    <h1>Manage Room</h1>
                    <?php
                        $host = "localhost";
                        $user = "root";
                        $pass = "";
                        $dbname = "myDorm";
                        
                        $mysqli = new mysqli($host,$user,$pass,$dbname);

                        $sql = "SELECT `name`, `contract`,`total`  FROM `user`";
                        $result =  $mysqli->query($sql);
                        $i = 0;
                        while ($w = mysqli_fetch_array($result)){
                            $renter[$i] = $w[0];
                            $contract[$i] = $w[1];
                            $total[$i] = $w[2];
                            $i++;
                        }
                        mysqli_close($mysqli);
                    ?>
                    <table id="room">
                        <tr>
                            <th>Room</th>
                            <th>Paid</th>
                            <th>Renter</th>
                            <th>Contract</th>
                        </tr>
                        <tr>
                            <td><a href="#">101</a></td>
                            <td><?php echo $total[0] ?></td>
                            <td><?php echo $renter[0] ?></td>
                            <td><?php echo $contract[0] ?></td>
                        </tr>
                        <tr>
                            <td><a href="#">102</a></td>
                            <td><?php echo $total[1] ?></td>
                            <td><?php echo $renter[1] ?></td>
                            <td><?php echo $contract[1] ?></td>
                        </tr>
                        <tr>
                            <td><a href="#">103</a></td>
                            <td>database</td>
                            <td>database</td>
                            <td>database</td>
                        </tr>
                        <tr>
                            <td><a href="#">104</a></td>
                            <td>database</td>
                            <td>database</td>
                            <td>database</td>
                        </tr>
                        <tr>
                            <td><a href="#">105</a></td>
                            <td>database</td>
                            <td>database</td>
                            <td>database</td>
                        </tr>
                        <tr>
                            <td><a href="#">106</a></td>
                            <td>database</td>
                            <td>database</td>
                            <td>database</td>
                        </tr>
                        <tr>
                            <td><a href="#">201</a></td>
                            <td>database</td>
                            <td>database</td>
                            <td>database</td>
                        </tr>
                        <tr>
                            <td><a href="#">202</a></td>
                            <td>database</td>
                            <td>database</td>
                            <td>database</td>
                        </tr>
                        <tr>
                            <td><a href="#">203</a></td>
                            <td>database</td>
                            <td>database</td>
                            <td>database</td>
                        </tr>
                        <tr>
                            <td><a href="#">204</a></td>
                            <td>database</td>
                            <td>database</td>
                            <td>database</td>
                        </tr>
                        <tr>
                            <td><a href="#">205</a></td>
                            <td>database</td>
                            <td>database</td>
                            <td>database</td>
                        </tr>
                        <tr>
                            <td><a href="#">206</a></td>
                            <td>database</td>
                            <td>database</td>
                            <td>database</td>
                        </tr>
                    </table>
                    
                </div>
            </div>
        </main>
    </body>
</html>
