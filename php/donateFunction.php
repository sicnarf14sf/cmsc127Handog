<?php

    session_start();
    require_once('connection.php');
    header('location: mainfeed.php?donationsuccess');   

    $drive_ID = $_GET['drive_ID'];
    $user_ID = $_SESSION['user_ID'];

    $donation_amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "insert into donationtable(donated_to, donated_by, donation_amount, message)
    values('$drive_ID', '$user_ID', '$donation_amount', '$message')";
    mysqli_query($conn, $sql);

?>