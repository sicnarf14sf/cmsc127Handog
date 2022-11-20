<?php
    $title = 'Handog | Create a Drive';
    $page = 'create';
    include_once('header.php');
    if($_SESSION['loggedin']!=true){
        header('location:access.php?noaccount');
        exit();
    }
?>

<div class="content">
    <h1>Create a Donation Drive</h1>
    
</div>

<form action="create.php" method="post" class="createform">
    <br><label>Give your donation drive a name:</label><br>
    <input type="text" name="donation_name" id="dname" placeholder="Donation Drive Name" required><br>
    <label>Tell us about your drive:</label><br>
    <textarea name="description" placeholder="Describe your Donation Drive" required></textarea><br>
    <label>How much are you looking to raise?</label><br>
    <label>PHP</label>
    <input type="number" name="completion_target" id="mgoal" placeholder="Donation Drive Goal" required><br>
    <label>When do you aim to complete the goal?</label><br>
    <input type="date" name="date_opened" id="dgoal" required><br>
    <button type="submit" class="button" name="createdrive">Create</button>
    <?php
        if(isset($_GET['invalid'])){
            $message = $_GET['invalid'];
            $message = "Please Log In before creating a Drive. Click on Log In/Sign Up on the upper right of the screen.";

        ?>
                <label style="color: darkred; font-weight:bolder; margin-top: 50px">
                <?php echo $message?></label>  
        <?php
        }
    ?>
</form>


<?php include_once('footer.php')?>
