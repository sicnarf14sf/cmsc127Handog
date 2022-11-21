<?php
    $title = 'Handog | Discover';
    $page = 'discover';
    include_once('header.php');
    require_once('connection.php');

    if(isset($_GET['donationsuccess'])){
        $message = $_GET['donationsuccess'];
        $message = "Thank you for donating! Browse for more drives here.";

    ?>
            <label style="color: darkgreen; display:block; text-align:center; font-weight:bolder; margin-top: 50px">
            <?php echo $message?></label>
    <?php
    }
?>

<div class="content">
    <h1>Discover Donation Drives</h1>
</div>

<?php
    $sql = "
    select donationdrives.*, usertable.user_ID, usertable.first_name, usertable.last_name
    from donationdrives
    join usertable
    on donationdrives.user_ID = usertable.user_ID";
    $result = mysqli_query($conn, $sql);
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $drive_ID = $row['drive_ID'];
            $donation_name = $row['donation_name'];
            $completion_target = $row['completion_target'];
            $date_opened = $row['date_opened'];
            $description = $row['description'];
            $amount_needed = $row['amount_needed'];
            $user_ID = $row['user_ID'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];

            echo '<div class="discoverpost">
            <h2>'. $donation_name . '</h2>
            <p1>Organized by: <a href="account.php?user_ID='. $user_ID . '">'. $first_name . ' ' . $last_name . '</a></p1><br>
            <p1>This drive wants to raise Php '. $amount_needed. ' by '. $completion_target . '</p1><br><br>
            <p2>' . $description . '</p2><br>';
            
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                if($_SESSION['user_ID']==$user_ID){
                    echo '<button class="button" name="editdrive" onclick="window.location.href=\'account.php?editredirect\'">Edit</button> <button class="button" name="deletedrive" onclick="window.location.href=\'account.php?deleteredirect\'">Delete</button></div><br>
                    </div>';
                }
                else{
                    echo '<button class="button" name="donate" onclick="window.location.href=\'donate.php?drive_ID='. $drive_ID . '\'">Donate</button>
                    </div>';
                }
            }
            else{
                echo '<button class="button" name="donate" onclick="window.location.href=\'access.php?noaccount\'">Donate</button>
                    </div>';
            }

        }
    }
?>


<?php include_once('footer.php')?>