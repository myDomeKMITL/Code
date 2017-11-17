<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/code/banner.css">
        <link rel="stylesheet" href="css/code/main_user.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <title>Main Menu</title>
    </head>
    <body>
        <nav class="row fix-top">
            <div class="col-md-2 icon-bg">
                <img src="Picture/icon.png" alt="logo" width="100px" height="100px" style="padding: 0 auto; position: center; display: block; margin: auto;">
            </div>
            <div id="top" class="col-md-10 banner">
                <p class="banner">Room <?php echo $_SESSION['room'] ?></p>
                <div class="row">
                    <div class="col-md-3 space-bottom"><a href="main_user.php">Main Menu</a></div>
                    <div class="col-md-3 space-bottom"><a href="appeal.php">Appeal Problem</a></div>
                    <div class="col-md-3 space-bottom"><a href="moveout.php">Move Out</a></div>
                    <div class="col-md-3 space-bottom"><a href="contact.php">Contact Us</a></div>
                </div>
            </div>
        </nav>
        <?php
            if(isset($_GET["submit"])){
                $_SESSION["receipt"] = $_GET["submit"];
            }
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
            //bill
            $sql = "SELECT `waterNow`, `electricNow`,`waterPrevious`,`electricPrevious`,
            `waterLastest`, `electricLastest` FROM `bill` WHERE `roomID` = '".$_SESSION['roomID']."'";
            $result =  $mysqli->query($sql);
            while ($w = mysqli_fetch_array($result)){
                $water[0] = $w[0];
                $elec[0] = $w[1];
                $water[1] = $w[2];
                $elec[1] = $w[3];
                $water[2] = $w[4];
                $elec[2] = $w[5];
            }
            //admin
            $sql = "SELECT `electricRate`, `waterRate` FROM `admin` WHERE 1";
            $result =  $mysqli->query($sql);
            while ($w = mysqli_fetch_array($result)){
                $elecRate = $w[0];
                $waterRate = $w[1];
            }
            //user
            $sql = "SELECT `name`, `nickname`, `personalID`, `address` FROM `user` WHERE `userID` = '".$_SESSION["userID"]."'";
            $result =  $mysqli->query($sql);
            while ($w = mysqli_fetch_array($result)){
                $name = $w[0];
                $nickname = $w[1];
                $personalID = $w[2];
                $address = $w[3];
            }

            if($_SESSION["receipt"] == 0){
                $elec = $elec[0];
                $water = $water[0];
                $month = formatMonth(date("m"))."-".date("y");
            }
            elseif($_SESSION["receipt"] == 1){
                $elec = $elec[1];
                $water = $water[1];
                $d=strtotime("-1 Months");
                $month = formatMonth(date("m",$d))."-".date("y");
            }
            else{
                $elec = $elec[2];
                $water = $water[2];
                $d=strtotime("-2 Months");
                $month = formatMonth(date("m",$d))."-".date("y");
            }
        ?>
        <main role="main">
            <div class="row">
                <div class="container information">
                    <h1>Receipt</h1>
                    <?php if($_SESSION["receipt"] == 0){ ?>
                        <form action="main_user.php">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-1">
                                <button class="btn btn-primary" name="submit" value="1" type="submit" style="width:100%"> < </button>
                            </div>
                            <div class="col-md-2"><p style="padding-top:7px;"><?php echo $month ?></p></div>
                            <div class="col-md-1"></div>
                            <div class="col-md-4"></div>
                        </div>
                        </form>
                    <?php } elseif($_SESSION["receipt"] == 1) { ?>
                        <form action="main_user.php">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-1">
                                <button class="btn btn-primary"  name="submit" value="2" type="submit" style="width:100%"> < </button>
                            </div>
                            <div class="col-md-2"><p style="padding-top:7px;"><?php echo $month ?></p></div>
                            <div class="col-md-1">
                                <button class="btn btn-primary"  name="submit" value="0" type="submit" style="width:100%"> > </button>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        </form>
                    <?php }else{ ?>
                        <form action="main_user.php">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-1"></div>
                            <div class="col-md-2"><p style="padding-top:7px;"><?php echo $month ?></p></div>
                            <div class="col-md-1">
                                <button class="btn btn-primary"  name="submit" value="1" type="submit" style="width:100%"> > </button>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        </form>
                    <?php } ?>
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
                            <p><?php echo $elec ?></p>
                            <p><?php echo $water ?></p>
                        </div>
                        <div class="col-sm-2">
                            <p>Price</p>
                            <p><?php echo $_SESSION["price"] ?></p>
                            <p><?php echo $elecRate ?></p>
                            <p><?php echo $waterRate ?></p>
                        </div>
                        <div class="col-sm-2">
                            <p>Total</p>
                            <p><?php echo $_SESSION["price"] ?></p>
                            <p><?php echo $elecSum = $elec*$elecRate ?></p>
                            <p><?php echo $waterSum = $water*$waterRate ?></p>
                            <p><?php echo $_SESSION["price"]+$elecSum+$waterSum ?></p>
                        </div>
                    </div>
                    <?php if($_SESSION["receipt"] == 0){ ?>
                    <form>
                        <button class="btn btn-primary" style="width:20%" type="submit">Pay Now!</button>
                    </form>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="container information">
                    <h1>Announce</h1>
                    <table id="Announce">
                        <tr>
                            <th>Date</th>
                            <th>Note</th>
                            <th>Message</th>
                        </tr>
                    <?php
                        $sql = "SELECT * FROM `announcement` ORDER BY `date` DESC LIMIT 3";
                        $result =  $mysqli->query($sql);
                        $i = 0;
                        while ($w = mysqli_fetch_array($result)){
                            $date[$i] = $w[0];
                            $type[$i] = $w[1];
                            $message[$i] = $w[2];?>
                        <tr style="text-align:center">
                            <td><?php echo $date[$i] ?></td>
                            <td><?php echo $type[$i] ?></td>
                            <td><?php echo $message[$i] ?></td>
                        </tr>
                    <?php
                            $i++;}
                        mysqli_close($mysqli);
                    ?>
                    </table>
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
        </main>
    </body>
</html>