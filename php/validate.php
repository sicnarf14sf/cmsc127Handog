<?php

session_start();

require_once('connection.php');

$user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
$user_pass = mysqli_real_escape_string($conn, $_POST['user_pass']);

$s = " select * from usertable where user_email = '$user_email' && user_pass = '$user_pass'";
$result = mysqli_query($conn, $s);

$num = mysqli_num_rows($result);


if($num==1){
    
    $row = mysqli_fetch_row($result);
    $_SESSION['loggedin'] = true;
    $_SESSION['user_ID'] = $row[0];
    $_SESSION['first_name'] = $row[1];
    $_SESSION['last_name'] = $row[2];
    $_SESSION['user_email'] = $row[3];
    $_SESSION['user_pass'] = $row[4];
    $_SESSION['about_me'] = $row[5];
    
    header("location:index.php?welcome");
    exit();

}
else{
    header('location:access.php?invalid');
    exit();
}