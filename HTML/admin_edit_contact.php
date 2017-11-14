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
                    <h1>Contact us</h1>
                    <form action="main_admin.html" method="GET">
                        <div class="space">
                            <label for="inputTel" class="sr-only">Telephone</label>
                            <input type="text" id="telephone" class="form_control" placeholder="Telephone Number" required autofocus>
                        </div>
                        <div class="space">
                            <label for="inputAdd" class="sr-only">Address</label>
                            <input type="text" id="address" class="form_control" placeholder="Address" required>
                        </div>
                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-2"><button class="btn btn-lg btn-primary btn-block" style="margin-top:10px" type="submit">Confirm</button></div>
                            <div class="col-md-5"></div>
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>