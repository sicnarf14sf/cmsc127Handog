<?php

    session_start();
    require_once('connection.php');

    $drive_ID = $_GET['drive_ID'];

    $donation_name = mysqli_real_escape_string($conn, $_POST['donation_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $completion_target = mysqli_real_escape_string($conn, $_POST['completion_target']);
    $amount_needed = mysqli_real_escape_string($conn, $_POST['amount_needed']);

    $sql = "update donationdrives
    set donation_name='$donation_name', description='$description', completion_target='$completion_target', amount_needed='$amount_needed'
    where drive_ID = $drive_ID";

    $result = mysqli_query($conn, $sql);
    if($result) {
        header('location:account.php?driveupdated');
        exit();
        }
        else {die(mysqli_error($conn));}
?>

