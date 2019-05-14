<?php 
include("../db.php");
 
session_start(); 

if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php','_self')</script>";
}
else {
    if(isset($_GET['delete_art'])){
        $delete_id = $_GET['delete_art'];
        $delete_art = "DELETE FROM Art WHERE ArtID='$delete_id'";
        $run_delete = mysqli_query($con, $delete_art);
        
        if($run_delete){
            echo "<script>alert('A product has been deleted!')</script>";
            echo "<script>window.open('view_art.php','_self')</script>";
        }
            
    }
    mysqli_close($con);
?>