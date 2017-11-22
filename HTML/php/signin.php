
<!doctype html>
<html lang="en">
  <head>
    <?php session_start();?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>My Dorm</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/code/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      <form class="form-signin" action="mainControl.php" method="POST">
          <img class="picture" src="Picture/icon.png" alt="logo">
        <div>
          <?php if($_SESSION["check"]==1){?>
              <script>alert("Incorrect username or password!")</script>
          <?php    $_SESSION["check"]=0;
            }?>
          <label for="inputEmail" class="sr-only">Username</label>
          <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" required autofocus>  
        </div>
        <div>
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>  
        </div>
        <div>
          <label style="color: #fff; text-shadow: 1px 1px #000; font-size: 14px;">
            <input class="checkbox" type="checkbox" value="remember-me"> Remember me
          </label>
          <a href="url" style="float: right; margin-top:4px;">forget your password?</a>
        </div>
        <button class="btn btn-lg btn-primary btn-block" onclick="click()" type="submit">Sign in</button>
      </form>
    </div> <!-- /container -->
  </body>
</html>
