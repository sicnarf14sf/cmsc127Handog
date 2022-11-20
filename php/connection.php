<?php

    $conn = mysqli_connect('localhost', 'root', '', 'handog2');

    if(!$conn){
        die('Connection Error'.mysqli_error($conn));
    }

?>