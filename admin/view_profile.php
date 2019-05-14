<?php 
include('../db.php'); 

session_start(); 

if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php','_self')</script>";
}
else {

?>
<html>
    <head>
        <title>Admin Profile</title>
        <?php include("../shared/head.php") ?>
    </head>
    <body>
        <?php  
        $get_ad = "SELECT `AdminID`, `Username`, `Email`, `Password` 
                     FROM `Admin`
                    WHERE `AdminID` = 1";
        $run_ad = mysqli_query($con, $get_ad);

        $row_ad=mysqli_fetch_array($run_ad);
        $ad_id = $row_ad['AdminID'];
        $ad_name = $row_ad['Username'];
        $ad_email = $row_ad['Email'];
        $ad_hash = $row_ad['Password'];
        ?>

        <div class="container">
            <h1>Admin Profile</h1>
            <form>
                <input type="hidden" value="<?php echo $ad_id; ?>" class="form-control" required />
                <label>Username</label>
                <input type="text" value="<?php echo $ad_name; ?>" placeholder="Username" class="form-control" required />
                
                <label>Email</label>
                <input type="email" value="<?php echo $ad_email; ?>" placeholder="Email" class="form-control" required />
                
                <label>Current Password</label>
                <input type="password" name="current_password" placeholder="Current Password" class="form-control" required />
                <label>New Password</label>
                <input type="password" name="new_password" placeholder="New Password" class="form-control" />
                <label>Confirm New Password</label>
                <input type="password" name="confirm_password" placeholder="New Password" class="form-control" />
                
                <input type="submit" value="Update Profile" class="btn btn-primary" />
                <a class="btn btn-default" href="../admin">Back</a>
            </form>
        </div>
    </body>
</html>
<?php mysqli_close($con); } ?>