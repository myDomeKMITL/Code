<?php
    session_start();
    session_destroy();
    session_start();
    $_SESSION["check"] = 0;
    header("Location: signin.php");
?>