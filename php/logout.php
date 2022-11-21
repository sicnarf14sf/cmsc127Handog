<?php
    header("location:index.php");

    session_start();
    session_unset();
    unset($_SESSION['loggedin']);
    session_destroy();

?>