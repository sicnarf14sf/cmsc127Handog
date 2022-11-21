<?php
    $page = 'donate';
    require_once('connection.php');
    $drive_ID = $_GET['drive_ID'];
    
    $sql = "select * from donationdrives where drive_ID=$drive_ID";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $donation_name = $row['donation_name'];
    
    $title = 'Handog | Donate to ' . $donation_name;
    include_once('header.php');
?>

<div class="content"><h1>Donate to <?php echo $donation_name?></h1></div>
<form action="donatefunction.php?drive_ID=<?php echo $drive_ID; ?>" method="post" class="createform">
    <br><label>How much are you going to donate?</label><br>
    <label>PHP</label>
    <input type="number" name="amount" id="amount" placeholder="Amount" required><br>
    <label>Want to give a message?</label><br>
    <textarea name="message" placeholder="Any kind words are welcome! You may leave this part empty."></textarea><br>
    <button type="submit" class="button" name="donate">Donate</button>
</form>

<?php include_once('footer.php')?>

