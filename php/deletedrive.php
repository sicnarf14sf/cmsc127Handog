<?php
    session_start();
    require_once('connection.php');

    if(isset($_GET['delete_ID'])){
        $drive_ID = $_GET['delete_ID'];

        $sql = "delete from donationdrives where drive_ID=$drive_ID";
        $result = mysqli_query($conn, $sql);
        header("location:account.php?drivedeleted");
        exit();
    }
?>