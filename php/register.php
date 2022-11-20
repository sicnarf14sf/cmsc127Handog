<?php

session_start();

require_once('connection.php');

$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
$user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
$user_pass = mysqli_real_escape_string($conn, $_POST['user_pass']);
$confirm_pass = mysqli_real_escape_string($conn, $_POST['confirm_pass']);

if($user_pass==$confirm_pass){
    $s = " select * from usertable where user_email = '$user_email'";
    
    $result = mysqli_query($conn, $s);
    
    $num = mysqli_num_rows($result);
    
    if($num==1){
        header("location:access.php?duplicate");
        exit();
    }   
    else{
        $reg = " insert into usertable(first_name, last_name, user_email, user_pass) values ('$first_name', '$last_name', '$user_email', '$user_pass')";
        mysqli_query($conn, $reg);
        header("location:access.php?success");
        exit();
    }
}
else{
    header("location:access.php?passworderror");
    exit();
}

?>