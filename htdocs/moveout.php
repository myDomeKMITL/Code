<!doctype html>
<html>
    <head>
        <?php session_start();
            if(is_null($_SESSION["move-type"])) $_SESSION["move-type"] = 0;
        ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/code/banner.css">
        <link rel="stylesheet" href="css/code/moveout.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <title>Move Out</title>
    </head>
    <body>
        <nav class="row fix-top">
            <div class="col-md-2 icon-bg">
                <img src="Picture/icon.png" alt="logo" width="100px" height="100px" style="padding: 0 auto; position: center; display: block; margin: auto;">
            </div>
            <div id="top" class="col-md-10 banner">
                <p class="banner">Room <?php echo $_SESSION["room"] ?></p>
                <div class="row">
                    <div class="col-md-3 space-bottom"><a href="main_user.php">Main Menu</a></div>
                    <div class="col-md-3 space-bottom"><a href="appeal.php">Appeal Problem</a></div>
                    <div class="col-md-3 space-bottom"><a href="moveout.php">Move Out</a></div>
                    <div class="col-md-3 space-bottom"><a href="contact.php">Contact Us</a></div>
                </div>
            </div>
        </nav>
        <main role="main">
            <div class="row">
                <div class="container information">
                    <h1>Move Out</h1>
                    <form action="moveoutControl.php" method="GET">
                    <input type="date" name="date" style="border-radius:10px; width:40%; text-align:center;">
                    <p style="font-size:12px; color:red; margin:10px;"><i>If you want to move out, you should informed before 30 days of contract ending</i></p>
                    <p style="font-size:12px; color:red; margin:10px;"><i>And if you want to leave before contract ending, your deposit will be void</i></p>
                    <?php
                        $host = "localhost";
                        $user = "root";
                        $pass = "";
                        $dbname = "myDorm";
                        
                        $mysqli = new mysqli($host,$user,$pass,$dbname);

                        $sql = "SELECT `contract`, `moveout` FROM `user` WHERE `userID` = '".$_SESSION["userID"]."'";
                        $result =  $mysqli->query($sql);
                        
                        while ($w = mysqli_fetch_array($result)){
                            $contract = $w[0];
                            $moveout = $w[1];
                        }
                        mysqli_close($mysqli);

                        $date1 = date_create(date("Y-m-d"));
                        $date2 = date_create($contract);
                        $diff = date_diff($date2,$date1); ?>
                        <p style="color:yellow;"><i><?php echo $diff->format("%a days").' before your contract ending'." & Contact ending date: ".$contract ?></i></p>
                        <?php if(!is_null($moveout)){ ?>
                        <p style="color:yellow;"><i><?php echo 'Your move out date: '.$moveout ?></i></p>
                        <button id = "delete" name="btn" value="2" class="btn btn-primary" type="submit">Cancel</button>
                        <button id = "confirm" class="btn btn-primary" type="submit" disabled>Move Out</button>
                        <?php } else { ?>
                        <button id = "confirm" name="btn" value="1" class="btn btn-primary" type="submit">Move Out</button>
                        <?php } ?>
                    </form>
                    <?php if($_SESSION["move-type"] == 1){ ?>
                        <script>
                            alert("The day you choose that before today!");
                        </script>
                    <?php $_SESSION["move-type"] = 0; } elseif ($_SESSION["move-type"] == 2) { ?>
                        <script>
                            alert("The day you choose that out of contract!")
                        </script>
                    <?php $_SESSION["move-type"] = 0; } elseif ($_SESSION["move-type"] == 3) { ?>
                        <script>
                            alert("The day you choose that before 30 days!")
                        </script>
                    <?php $_SESSION["move-type"] = 0; } elseif ($_SESSION["move-type"] == 4) { ?>
                        <script>
                            alert("Suscess!");
                        </script>
                    <?php $_SESSION["move-type"] = 0; } ?>
                </div>
            </div>
        </main>
    </body>
</html>