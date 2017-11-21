<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/code/main_admin.css">
        <link rel="stylesheet" href="css/code/banner.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <title>My Dorm</title>
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
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"><h1>Announcement</h1></div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2"><a href="annouceControl.php">add?</a></div>
                    </div>
                    <table id="Announce">
                        <tr>
                            <th>Date</th>
                            <th>Note</th>
                            <th>Message</th>
                        </tr>
                    <?php
                        $host = "localhost";
                        $user = "root";
                        $pass = "";
                        $dbname = "myDorm";
                        
                        $mysqli = new mysqli($host,$user,$pass,$dbname);
                        $sql = "SELECT * FROM `announcement`";
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
                    ?>
                    </table>
                </div>
            </div>
            <!-- <div class="row">
                <div class="container information">
                    <h1>Overdue</h1>
                    <p>e Mew backend right here!!</p>
                </div>
            </div> -->
            <div class="row">
                <div class="container information">
                    <h1>Problem Appealed</h1>
                    <table id="Announce">
                        <tr>
                            <th>Check</th>
                            <th>Date</th>
                            <th>Room</th>
                            <th>Message</th>
                        </tr>
                        <?php
                        $sql = "SELECT * FROM `appeal` ORDER BY `date`";
                        $result =  $mysqli->query($sql);
                        $i = 0;
                        while ($w = mysqli_fetch_array($result)){
                            $date[$i] = $w[0];
                            $type[$i] = $w[1];
                            $message[$i] = $w[2];?>
                        <tr style="text-align:center">
                            <form action="appealControl.php">
                            <td><button id="check" class="btn btn-primary" type="submit" name="check" value=$i>Done</button></td>
                            <td><?php echo $date[$i] ?></td>
                            <td><?php echo $type[$i] ?></td>
                            <td><?php echo $message[$i] ?></td>
                            <!-- <input type="hidden" name="date" value="$date[$i]"></input>
                            <input type="hidden" name="type" value="$type[$i]"></input>
                            <input type="hidden" name="message" value="$date[$i]"></input> -->
                            </form>
                        </tr>
                    <?php
                            $i++;}
                        mysqli_close($mysqli);
                    ?>
                    </table>
                </div>
            </div>
        </main>
    </body>
</html>