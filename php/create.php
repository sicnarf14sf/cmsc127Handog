<?php

session_start();
header('location:account.php');

require_once('connection.php');

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    $donation_name = mysqli_real_escape_string($conn, $_POST['donation_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $amount_needed = mysqli_real_escape_string($conn, $_POST['amount_needed']);
    $completion_target = mysqli_real_escape_string($conn, $_POST['completion_target']);
    
    $user_ID = $_SESSION['user_ID'];
    
    $reg = "insert into donationdrives(donation_name, description, amount_needed, completion_target, user_ID) 
    values ('$donation_name', '$description', '$amount_needed', '$completion_target', '$user_ID')";
    mysqli_query($conn, $reg);
    header('location:account.php?drivecreated');
}
else{
    header('location:account.php?invalid');
    exit();
}

?>