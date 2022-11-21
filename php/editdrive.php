<?php
    $title = 'Handog | Edit Your Drive';
    $page = 'create';
    include_once('header.php');
    require_once('connection.php');

    $drive_ID = $_GET['edit_ID'];
    
    $sql = "select * from donationdrives where drive_ID=$drive_ID";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $donation_name = $row['donation_name'];
    $completion_taret = $row['completion_target'];
    $amount_needed = $row['amount_needed'];
    $description = $row['description'];

?>

<div class="content">
    <h1>Edit Your Drive: </h1>
</div>

<form action="editdrivefunction.php?drive_ID=<?php echo $drive_ID ?>" method="post" class="createform">
    <br><label>Donation Drive Name: </label><br>
    <input type="text" name="donation_name" id="donation_name" value="<?php echo $donation_name ?>" required><br>
    <label>Description: </label><br>
    <textarea name="description" placeholder="Describe your Donation Drive" required><?php echo $description ?></textarea><br>
    <label>Monetary Goal: </label><br>
    <label>PHP</label>
    <input type="number" name="amount_needed" id="amount_needed" value="<?php echo $amount_needed ?>" required><br>
    <label>Completion Date: </label><br>
    <input type="date" name="completion_target" id="completion_target" value="<?php echo $completion_target ?>" required><br>
    <button type="submit" class="button" name="createdrive">Save Changes</button>
</form>
<div style="margin-left: 110px">
    <?php
        echo '<button class="button" name="cancel" onclick="window.location.href=\'account.php?cancel\'">Cancel</button><br>';
    ?>
</div>


<?php include_once('footer.php')?>
