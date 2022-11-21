<?php
    session_start();
    require_once('connection.php');

    if(isset($_GET['delete_ID'])){
        $user_ID = $_GET['delete_ID'];

        $sql = "delete from usertable where user_ID = $user_ID";
        $result = mysqli_query($conn, $sql);
        header("location:logout.php");
        exit();
    }


?>