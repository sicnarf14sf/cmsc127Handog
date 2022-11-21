<?php

session_start();
header('location:account.php');

require_once('connection.php');

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    $donation_name = mysqli_real_escape_string($con, $_POST['donation_name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $completion_target = mysqli_real_escape_string($con, $_POST['completion_target']);
    $date_opened = mysqli_real_escape_string($con, $_POST['date_opened']);
    
    $user_ID = $_SESSION['user_ID'];
    
    $reg = "insert into drives(donation_name, description, completion_target, date_opened, user_ID) 
    values ('$donation_name', '$description', '$completion_target', '$date_opened', '$user_ID')";
    mysqli_query($conn, $reg);
    header('location:account.php?drivecreated');
}
else{
    header('location:account.php?invalid');
    exit();
}

?>