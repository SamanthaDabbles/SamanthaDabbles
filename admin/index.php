<?php 
session_start(); 

if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php','_self')</script>";
}
else {

?>
<html>
    <head>
        <title>Admin Panel</title>
        <?php include("../shared/head.php"); ?>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    <body>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>SamanthaDabbles: Admin Panel</h1>
            </div>
            <div class="panel-body">
                <a href="logout.php" class="btn btn-danger">Logout</a>
                <a href="view_art.php" class="btn btn-default">View Art</a>
                <a href="view_profile.php" class="btn btn-default">View Profile</a>
            </div>
        </div>
    </body>
</html>
<?php } ?>