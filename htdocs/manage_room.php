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
        <?php
            $roomid = $_GET['Room'];
            $page = $_GET['page'];

            function formatMonth($month){
                if($month == 1) return "January";
                elseif($month == 2) return "February";
                elseif($month == 3) return "March";
                elseif($month == 4) return "April";
                elseif($month == 5) return "May";
                elseif($month == 6) return "June";
                elseif($month == 7) return "July";
                elseif($month == 8) return "August";
                elseif($month == 9) return "September";
                elseif($month == 10) return "October";
                elseif($month == 11) return "November";
                else return "December";
            }

            $host = "localhost";
            $user = "root";
            $pass = "";
            $dbname = "myDorm";

            $mysqli = new mysqli($host,$user,$pass,$dbname);
            //roomID
            $sql = "SELECT `price`, `userID` FROM `room` WHERE roomID = $roomid";
            $result =  $mysqli->query($sql);
            while ($w = mysqli_fetch_array($result)){
                $roomPrice = $w[0];
                $userID = $w[1];
            }
            $room = $roomid[1].$roomid[2].$roomid[3];
            //user
            $sql = "SELECT `name`, `nickname`, `personalID`, `address`, `picture` FROM `user` WHERE userID = $userID";
            $result = $mysqli->query($sql);
            while($w = mysqli_fetch_array($result)){
                $name = $w[0];
                $nickname = $w[1];
                $personalID = $w[2];
                $address = $w[3];
                $picture = $w[4];
            }
            //billID
            $sql = "SELECT `waterNow`, `waterPrevious`, `waterLastest`,
            `electricNow`, `electricPrevious`, `electricLastest`, `currentMonth` FROM `bill` WHERE roomID = $roomid";
            $result =  $mysqli->query($sql);
            while ($w = mysqli_fetch_array($result)){
                $waterNow = $w[0];
                $waterPrevious = $w[1];
                $waterLastest = $w[2];
                $electricNow = $w[3];
                $electricPrevious = $w[4];
                $electricLastest = $w[5];
                $monthDB = $w[6];
            }
            //admin
            $sql = "SELECT `electricRate`, `waterRate` FROM `admin` WHERE 1";
            $result =  $mysqli->query($sql);
            while ($w = mysqli_fetch_array($result)){
                $electricRate = $w[0];
                $waterRate = $w[1];
            }
            if($page == 0){
                $electric = $electricNow;
                $water = $waterNow;
                $month = formatMonth($monthDB);
            }
            elseif($page == 1){
                $electric = $electricPrevious;
                $water = $waterPrevious;
                $month = formatMonth($monthDB-1);
            }
            else{
                $electric = $electricLastest;
                $water = $waterLastest;
                $month = formatMonth($monthDB-2);
            }
            $room = $roomid[1].$roomid[2].$roomid[3];
            mysqli_close($mysqli);
        ?>
        <main role="main">
            <div class="row">
                <div class="container">
                    <h1 class="top_name" style="float: right;">Room <?php echo $room ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="container information">
                    <h1 style="margin-top:10px">Room Receipt</h1>
                    <?php if($page==0){ ?>
                        <form action="manage_room.php">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-1">
                                <input type="hidden" name="page" value="1"></input>
                                <button class="btn btn-primary" name="Room" value="<?php echo $roomid ?>" type="submit"> < </button>
                            </div>
                            <div class="col-md-2"><p style="padding-top:7px;"><?php echo $month ?></p></div>
                            <div class="col-md-1"></div>
                            <div class="col-md-4"></div>
                        </div>
                        </form>
                    <?php }elseif ($page==1){ ?>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-1">
                            <form action="manage_room.php" action="GET">
                                <input type="hidden" name="page" value="2"></input>
                                <button class="btn btn-primary" name="Room" value="<?php echo $roomid ?>" type="submit"> < </button>
                            </form>
                            </div>
                            <div class="col-md-2"><p style="padding-top:7px;"><?php echo $month ?></p></div>
                            <div class="col-md-1">
                            <form action="manage_room.php" action="GET">
                                <input type="hidden" name="page" value="0"></input>
                                <button class="btn btn-primary" name="Room" value="<?php echo $roomid ?>" type="submit"> > </button>
                            </form>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    <?php }else{ ?>
                        <form action="manage_room.php">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-1"></div>
                            <div class="col-md-2"><p style="padding-top:7px;"><?php echo $month ?></p></div>
                            <div class="col-md-1">
                                <input type="hidden" name="page" value="1"></input>
                                <button class="btn btn-primary" name="Room" value="<?php echo $roomid ?>" type="submit"> > </button>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        </form>
                    <?php }
                        if($page == 0){
                    ?>
                    <form action="roomControl.php" method="GET">
                    <div class="row">
                        <div class="col-sm-6">
                            <p>Description</p>
                            <p><i>Monthly Rate</i></p>
                            <p><i>Electric Service Rate</i></p>
                            <p><i>Water Service Rate</i></p>
                        </div>
                        <div class="col-sm-2">
                            <p>Quantity</p>
                            <input style="width:100%; margin-bottom:10px; border-radius:5px;" type="number" name="quantity" value="1" disabled>
                            <input style="width:100%; margin-bottom:10px; border-radius:5px;" type="number" name="elecQuan" min="0" placeholder="<?php echo $electric; ?>" required>
                            <input style="width:100%; margin-bottom:10px; border-radius:5px;" type="number" name="waterQuan" min="0" placeholder="<?php echo $water; ?>" required>
                        </div>
                        <div class="col-sm-2">
                            <p>Price</p>
                            <p><?php echo $roomPrice ?></p>
                            <p><?php echo $electricRate ?></p>
                            <p><?php echo $waterRate?></p>
                            <!-- <input style="width:100%; margin-bottom:10px; border-radius:5px;" type="number" name="rate" value="<?php echo $roomPrice?>" disabled>
                            <input style="width:100%; margin-bottom:10px; border-radius:5px;" type="number" name="rate" min="0" value="<?php echo $electricRate?>" disabled>
                            <input style="width:100%; margin-bottom:10px; border-radius:5px;" type="number" name="rate" min="0" value="<?php echo $waterRate?>" disabled> -->
                            <!-- <a href="rate_edit.php">edit?</a> -->
                        </div>
                        <div class="col-sm-2">
                            <p>Total</p>
                            <p><?php echo $roomPrice?></p>
                            <p><?php echo $electricSum = $electricRate*$electric?></p>
                            <p><?php echo $waterSum = $waterRate*$water?></p>
                            <p><?php echo $total = $roomPrice+$electricSum+$waterSum?></p>
                        </div>
                    </div>
                    <?php if(date("d") >= 20 && date("d") <= 31 && $monthDB == date("m")) {?>
                    <input type="hidden" name="Room" value="<?php echo $roomid ?>"></input>
                    <button class="btn btn-primary" style="margin-bottom:1rem; width: 20%;" type="submit">Submit</button>
                    </form>
                    <?php }}else{ ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>Description</p>
                            <p><i>Monthly Rate</i></p>
                            <p><i>Electric Service Rate</i></p>
                            <p><i>Water Service Rate</i></p>
                        </div>
                        <div class="col-sm-2">
                            <p>Quantity</p>
                            <p>1</p>
                            <p><?php echo $electric; ?></p>
                            <p><?php echo $water; ?></p>
                        </div>
                        <div class="col-sm-2">
                            <p>Price</p>
                            <p><?php echo $roomPrice?></p>
                            <p><?php echo $electricRate?></p>
                            <p><?php echo $waterRate?></p>
                        </div>
                        <div class="col-sm-2">
                            <p>Total</p>
                            <p><?php echo $roomPrice?></p>
                            <p><?php echo $electricSum = $electricRate*$electric?></p>
                            <p><?php echo $waterSum = $waterRate*$water?></p>
                            <p><?php echo $total = $roomPrice+$electricSum+$waterSum?></p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="container information">
                    <h1>Profile</h1>
                    <div class="row">
                    <div class="col-md-5"><img src="Picture/user.png"></div>
                    <div class="col-md-7" style="padding-top:60px; text-align: left;"> 
                        <p>Name: <?php echo $name ?></p>
                        <p>Nickname: <?php echo $nickname ?></p>
                        <p>Personal ID: <?php echo $personalID ?></p>
                        <p>Address: <?php echo $address ?></p>
                    </div>
                </div>
                </div>
            </div>
        </main>
    </body>
</html>