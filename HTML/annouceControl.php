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
                <form action="announceDB.php" method="GET">
                    <h1>Adding Announce</h1>
                    <input class="ipt" type="date" name="date" placeholder="maintainance date"><br>
                    <select name="type" id="soflow">
                        <option>-- choose your note --</option>
                        <option value="Water Cut">Water Cut</option>
                        <option value="Electic Cut">Electric Cut</option>
                        <option value="Internet Disable">Internet Disable</option>
                        <option value="Other">Other</option>
                    </select><br>
                    <input class="ipt" type="text" name="message" placeholder="type detail right here..."><br>
                    <input class="btn btn-primary btn-margin-top" type="submit" value="Confirm">
                </form>
                </div>
            </div>
        </main>
    </body>
</html>
                    