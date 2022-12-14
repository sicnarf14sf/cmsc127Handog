<?php
    $title = 'Handog | My Account';
    $page = 'account';
    include_once('header.php');
    require_once('connection.php');
    $user_ID = $_SESSION['user_ID'];
    
    // redirects the user to delete the drive to the My Account page
    if(isset($_GET['deleteredirect'])){
        $message = $_GET['deleteredirect'];
        $message = "Please delete your drive on this page.";
        $view_ID = $user_ID;

        ?>
            <label style="color: darkred; display:block; text-align:center; font-weight:bolder; margin-top: 50px">
            <?php echo $message?></label>  
        <?php

    }

    // redirects the user to edit the drive to the My Account page
    elseif(isset($_GET['editredirect'])){
        $message = $_GET['editredirect'];
        $message = "Please edit your drive on this page.";
        $view_ID = $user_ID;

        ?>
            <label style="color: darkred; display:block; text-align:center; font-weight:bolder; margin-top: 50px">
            <?php echo $message?></label>  
        <?php
    }

    // operation to inform user that profile information was updated
    elseif(isset($_GET['userupdated'])){
        $message = $_GET['userupdated'];
        $message = "Profile successfully updated!";
        $view_ID = $user_ID;

        ?>
            <label style="color: darkgreen; display:block; text-align:center; font-weight:bolder; margin-top: 50px">
            <?php echo $message?></label>  
        <?php
    }

    // operation to inform that drive is edited
    elseif(isset($_GET['driveupdated'])){
        $message = $_GET['driveupdated'];
        $message = "Drive successfully updated!";
        $view_ID = $user_ID;

        ?>
            <label style="color: darkgreen; display:block; text-align:center; font-weight:bolder; margin-top: 50px">
            <?php echo $message?></label>  
        <?php
    }

    // operation to inform successful delete donation drive
    elseif(isset($_GET['drivedeleted'])){
        $message = $_GET['drivedeleted'];
        $message = "Drive successfully deleted!";
        $view_ID = $user_ID;

        ?>
            <label style="color: darkgreen; display:block; text-align:center; font-weight:bolder; margin-top: 50px">
            <?php echo $message?></label>  
        <?php
    }

    // operation to inform that donation drive is created
    elseif(isset($_GET['drivecreated'])){
        $message = $_GET['drivecreated'];
        $message = "Drive successfully created!";
        $view_ID = $user_ID;

        ?>
            <label style="color: darkgreen; display:block; text-align:center; font-weight:bolder; margin-top: 50px">
            <?php echo $message?></label>  
        <?php
    }

    // cancellation
    elseif(isset($_GET['cancel'])){
        $view_ID = $user_ID;
    }

    else{
        $view_ID = $_GET['user_ID'];
    }
    
    $sql = " select * from usertable where user_ID=$view_ID";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $user_email = $row['user_email'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $about_me = $row['about_me'];
?>

<div class="both-rows">
    <!-- My Profile -->
    <div class="column left-side">
        <?php
            if($user_ID==$view_ID){
                echo '<h1>My Profile</h1><br>';
            }
            else{
                echo '<h1>'. $first_name . '\'s Profile</h1><br>';
            }
        ?>
        <div class="profilebox">
            <h3>Name: </h3>
            <?php echo "<h3>" . $first_name . " " . $last_name . "</h3>"?><br>
            <h3>Email: </h3>
            <?php echo "<h3>" . $user_email . "</h3>"?><br><br>
            <?php echo "<h3>About me: ". $about_me . "</h3>" ?><br>
            <?php
                if($user_ID==$view_ID){
                    echo '<button class="button" onclick="window.location.href=\'editprofile.php?user_ID='.$user_ID.'\'">Edit Profile Information</button>
                    <button class="button" onclick="window.location.href=\'logout.php\'" style="background-color:darkred">Log Out</button>';
                }
            ?>
        </div>
    </div>

    <!-- My Donation Drives -->
    <div class="column right-side">
        <?php
            if($user_ID==$view_ID){
                echo '<h1>My Donation Drives</h1><br>';
            }
            else{
                echo '<h1>'. $first_name . '\'s Donation Drives</h1><br>';
            }
        ?>
        <?php
            $sql = " select * from donationdrives where user_ID=$view_ID";
            $result = mysqli_query($conn, $sql);
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $drive_ID = $row['drive_ID'];
                    $donation_name = $row['donation_name'];
                    $completion_target = $row['completion_target'];
                    $date_opened = $row['date_opened'];
                    $amount_needed = $row['amount_needed'];
                    $description = $row['description'];
    
                    echo '<div class="profilebox"><h2>'. $donation_name . '</h2>
                    <p2>Date Created: '. $date_opened .'</p2><br><br>
                    <p1>Organized by: '. $first_name . ' ' . $last_name . '</p1><br>
                    <p1>This drive wants to raise Php ' . $amount_needed . ' by ' . $completion_target . '</p1><br><br>
                    <p2>Description:<br>' . $description . '</p2><br>';
                    if($user_ID==$view_ID){
                        echo '
                        <button class="button" name="edit_drive" onclick="window.location.href=\'editdrive.php?edit_ID='. $drive_ID .'\'; ">Edit</button>
                        <button class="button" name="deletedrive" onclick="window.location.href=\'deletedrive.php?delete_ID='. $drive_ID .'\'; return confirm(\'This drive is about to be deleted!\')">Delete</button>';        
                        }
                        else {
                            echo '<button class="button" name="donate" onclick="window.location.href=\'donate.php?drive_ID='. $drive_ID . '\'">Donate</button>';
                        }
                    echo '</div><br>';
                }
            }
            ?>
      </div>
</div>

<?php include_once('footer.php')?>

