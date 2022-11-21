<?php
    session_start();
    require_once('connection.php');

    $user_ID= $_GET['user_ID'];

    $user_pass = mysqli_real_escape_string($conn, $_POST['user_pass']);
    $confirm_pass = mysqli_real_escape_string($conn, $_POST['confirm_pass']);

    if($user_pass==$confirm_pass){
        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $about_me = mysqli_real_escape_string($conn, $_POST['about_me']);
        $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
        
        $sql = "update usertable
        set first_name= '$first_name', last_name='$last_name', about_me='$about_me', user_email='$user_email', user_pass='$user_pass'
        where user_ID=$user_ID";
        
        $_SESSION['user_email'] = $user_email;
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['user_pass'] = $user_pass;
        $_SESSION['about_me'] = $about_me;
        
        $result = mysqli_query($conn, $sql);
        if($result){
            header('location:account.php?userupdated');
            exit();
            }
            else {
                die(mysqli_error($conn));
            }
        }
        else{
            header('location:editprofile.php?passworderror');
            exit();
        }
?>

