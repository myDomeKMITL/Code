<?php 
    session_start();
    if(is_null($_SESSION["success"])) $_SESSION["success"] = 0;
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/code/banner.css">
        <link rel="stylesheet" href="css/code/moveout.css">
        <link rel="stylesheet" href="css/code/appeal.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <title>Appeal Problem</title>
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
                        <?php if($_SESSION["success"] == 1){ ?>
                        <script> alert("We already sent your petition to admin \nSorry for your unconvinence"); </script>
                        <?php $_SESSION["success"] = 0; } ?>

                    <h1>Appeal The Problem</h1>
                    <div class="row">
                        <div class="col-md-3"><img src="Picture/megaphone.png" class="appeal_img"></div>
                        <div class="col-md-3"><img src="Picture/no-smoking.png" class="appeal_img"> </div>
                        <div class="col-md-3"><img src="Picture/wrench.png" class="appeal_img"></div>
                        <div class="col-md-3"><img src="Picture/question.png" class="appeal_img"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="dropdown">
                                <form action="appealDB.php">
                                <button class="dropbtn" type="button">Loud & Noisy</button>
                                <div class="dropdown-content">
                                    <input type="text" name="room" placeholder="Noisy room..." required></input>
                                    <button class="btn" type="submit" name="type" value="1">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dropdown">
                                <form action="appealDB.php">
                                <button class="dropbtn" type="button">Smoking</button>
                                <div class="dropdown-content">
                                    <input type="text" name="room" placeholder="Smoking room..." required></input>
                                    <button class="btn" type="submit" name="type" value="2">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dropdown">
                                <form action="appealDB.php">
                                <button class="dropbtn" type="button">Maintenance</button>
                                <div class="dropdown-content">
                                    <input type="text" name="message" placeholder="Complain..." required></input>
                                    <button class="btn" type="submit" name="type" value="3">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dropdown">
                                <form action="appealDB.php">
                                <button class="dropbtn" type="button">Other Problem</button>
                                <div class="dropdown-content">
                                    <input type="text" name="message" placeholder="Complain..." required></input>
                                    <button class="btn" type="submit" name="type" value="4">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>