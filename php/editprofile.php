<?php
    $title = 'Handog | Edit Profile';
    $page = 'editprofile';
    include_once('header.php');
    require_once('connection.php');

    $user_ID = $_GET['user_ID'];
    
    $sql = "select * from usertable where user_ID=$user_ID";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $user_email = $row['user_email'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $about_me = $row['about_me'];
    $user_pass = $row['user_pass'];

    if(isset($_GET['passworderror'])){
        $message = $_GET['passworderror'];
        $message = "Passwords did not match, please try again.";

    ?>
            <label style="color: darkred; display:block; text-align:center; font-weight:bolder; margin-top: 50px">
            <?php echo $message?></label>  
    <?php
    }

?>

<div class="content"><h1>Edit your profile</h1></div>
<form action="edituserfunction.php?user_ID=<?php echo $user_ID ?>" method="post" class="createform">
    <br><label>First Name: </label><br>
    <input type="text" name="first_name" id="first_name" value="<?php echo $first_name;?>" required><br>
    <label>Last Name: </label><br>
    <input type="text" name="last_name" id="last_name" value="<?php echo $last_name;?>" required><br>
    <label>Describe yourself: </label><br>
    <textarea name="about_me"><?php echo $about_me ;?></textarea><br>
    <label>Email address: </label><br>
    <input type="email" name="user_email" id="user_email" value="<?php echo $user_email;?>" required><br>
    <label>Password: </label><br>
    <input type="password" name="user_pass" id="user_pass" value="<?php echo $user_pass;?>" required><br>
    <label>Confirm Password: </label><br>
    <input type="password" name="confirm_pass" id="confirm_pass" value="<?php echo $user_pass;?>" required><br>
    <button type="submit" class="button" name="editprofile">Save Changes</button>
</form>
<div style="margin-left: 110px">
    <?php
        echo '<button class="button" name="cancel" onclick="window.location.href=\'account.php?cancel\'">Cancel</button><br>';
    ?>
    <button class="button" name="deleteuser" style="background-color: darkred" onclick="window.location.href='deleteuser.php?delete_ID=<?php echo $user_ID ?> '; return confirm('This drive is about to be deleted!')">Delete Account</button>
</div>

<?php include_once('footer.php')?>

