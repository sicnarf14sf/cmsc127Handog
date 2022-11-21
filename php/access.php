<?php
    $title = 'Handog | Log-in/Sign-up';
    $page = 'access';
    include_once('header.php');

    // if user has duplicate
    if(isset($_GET['duplicate'])){
        $message = $_GET['duplicate'];
        $message = "There is already an account registered with that email. Please try again.";
        
        ?>
            <label style="color: darkred; display:block; text-align:center; font-weight:bolder; margin-top: 50px">
            <?php echo $message?></label>  
        <?php
    }

    // if user completes to sign-up to the page
    if(isset($_GET['success'])){
        $message = $_GET['success'];
        $message = "You have successfully registered. You may now log in.";

    ?>
            <label style="color: darkgreen; display:block; text-align:center; font-weight:bolder; margin-top: 50px">
            <?php echo $message?></label>  
    <?php
    }

    // if there were invalid input during log-in
    if(isset($_GET['invalid'])){
        $message = $_GET['invalid'];
        $message = "Email or password is incorrect. No account? Sign up instead.";

    ?>
            <label style="color: darkred; display:block; text-align:center; font-weight:bolder; margin-top: 50px">
            <?php echo $message?></label>  
    <?php
    }

    // checks if inputted account is in the system
    if(isset($_GET['noaccount'])){
        $message = $_GET['noaccount'];
        $message = "Please log in first. No account? Sign up instead.";
    ?>
            <label style="color: darkred; display:block; text-align:center; font-weight:bolder; margin-top: 50px">
            <?php echo $message?></label>  
    <?php
    }

    // checks if password is error
    if(isset($_GET['passworderror'])){
        $message = $_GET['passworderror'];
        $message = "Passwords did not match, please try again.";

    ?>
            <label style="color: darkred; display:block; text-align:center; font-weight:bolder; margin-top: 50px">
            <?php echo $message?></label>  
    <?php
    }
?>


<div class="accesstabs">
    <!-- log-in -->
    <input type="radio" id="login" name="accesstabs" checked="checked">
    <label for="login">Log In</label>
    <div class="tabs">
        <form action="validate.php" method="post"> 
            <input type="email" placeholder="E-mail" name="user_email" size="30" required><br/>
            <input type="password" placeholder="Password" name="user_pass" size="30" required>
            <button type="submit" class="accessbutton" name="login">Log In</button>
            <a class="forgotPass" href="">Forgot Password?</a>
        </form>
    </div>

    <!-- Sign-up -->
    <input type="radio" id="signup" name="accesstabs">
    <label for="signup">Sign Up</label>
    <div class="tabs">
        <form action="register.php" method="post">
            <input type="text" placeholder="First Name" name="first_name" size="30" required><br/>
            <input type="text" placeholder="Last Name" name="last_name" size="30" required><br>
            <input type="email" placeholder="E-mail" name="user_email" size="30" required><br/>
            <input type="password" placeholder="Password" name="user_pass" size="30" required><br>
            <input type="password" placeholder="Confirm Password" name="confirm_pass" size="30" required>
            <button type="submit" class="accessbutton" name="signup">Sign Up</button>
        </form>
    </div>
</div>

<?php include_once('footer.php')?>

