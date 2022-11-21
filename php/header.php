<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">
        <link href="stylesheet.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
        
        <div id="main_menu">
            <div class="logo_area">
                <a href="index.php"><img src="assets/handoglogo.png" alt=""></a>
            </div>
            <div class="inner_main_menu">
                <ul>
                    <li><a href="index.php#about">About</a></li>
                    <li><a href="mainfeed.php">Discover</a></li>
                    <li><a href="cdd.php">Create a Drive</a></li>

                    <?php
                        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                            echo '<li><a href="account.php?user_ID='. $_SESSION['user_ID'] .'">My Account</a></li>';
                        } 
                        else {
                            echo '<li><a href="access.php">Log In/Sign Up</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </div>

        <hr class="navline">
    </head>
    
    <body>

    