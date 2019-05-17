<?php 
include('../db.php');

session_start(); 

if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php','_self')</script>";
}
else {

    if(isset($_GET['edit_art'])) {
        $get_id = $_GET['edit_art'];
        $get_art = "SELECT `ArtID`, `Type`, `Image`, `Name`, `Description`, `Medium`, `ArtCreationDate`, `ModifiedDate` FROM Art WHERE ArtID='$get_id'";
        $run_art = mysqli_query($con, $get_art);
        $i = 0;
        
        $row_art = mysqli_fetch_array($run_art);
            
        $art_id = $row_art['ArtID'];
        $art_image = $row_art['Image'];
        $art_name = $row_art['Name'];
        $art_desc = $row_art['Description'];
        $art_medium = $row_art['Medium'];
        $art_creation_date = $row_art['ArtCreationDate'];
        $modified_date = $row_art['ModifiedDate'];
    }
?>
<html>
    <head>
        <title>Update Art</title>
        <?php include("../shared/head.php") ?>
    </head>
    <body>
        <div class="container">
            <h1 class="">Admin: Edit Art</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="art_id" value="<?php echo $art_id; ?>" class="form-control" required />

                <?php echo '<img width="150" alt="entry preview" src="data:image/png;base64,'.base64_encode($art_image).'"/>'; ?>
                <br/>
                <label for="art_image">Image</label>
                <input type="file" name="art_image" value="" class="" />
                
                <label for="art_name">Name</label>
                <input type="text" name="art_name" value="<?php echo $art_name; ?>" class="form-control" required />
                
                <label for="art_desc">Description</label>
                <input type="textarea" cols="20" rows="10" name="art_desc" value="<?php echo $art_desc; ?>" class="form-control" />
                
                <label for="art_medium">Medium</label>
                <input type="text" name="art_medium" value="<?php echo $art_medium; ?>" class="form-control" required />
                
                <label for="art_creation_date">Art Creation Date</label>
                <input type="date" name="art_creation_date" value="<?php echo $art_creation_date; ?>" class="form-control" />
                
                <input type="submit" name="update_art" value="Update Art" class="btn btn-primary" class="form-control" required />
                <a class="btn btn-default" href="view_art.php">Cancel</a>
            </form>
        </div>
    </body>
</html>

<?php
if(isset($_POST['update_art'])){
    $art_id = mysqli_real_escape_string($con,$_POST['art_id']);
    $art_name = mysqli_real_escape_string($con,$_POST['art_name']);
    $art_desc = mysqli_real_escape_string($con,$_POST['art_desc']);
    $art_medium = mysqli_real_escape_string($con,$_POST['art_medium']);
    $art_creation_date = mysqli_real_escape_string($con,$_POST['art_creation_date']);
    $modified_date = mysqli_real_escape_string($con,date("Y-m-d H:i:s"));

    if(!empty($_FILES['art_image']['name'])) {
        $art_image = $_FILES['art_image'];
        if (is_uploaded_file($_FILES['art_image']['tmp_name'])) {
            $imgData = addslashes(file_get_contents($_FILES['art_image']['tmp_name']));
            $imageProperties = getimageSize($_FILES['art_image']['tmp_name']);
            $q = "UPDATE Art SET 
            `Type`='{$imageProperties['mime']}', 
            `Image`='{$imgData}', 
            `Name` = '$art_name', 
            `Description` = '$art_desc', 
            `Medium` = '$art_medium', 
            `ArtCreationDate` = '$art_creation_date', 
            `ModifiedDate` = '$modified_date'
            WHERE `Art`.`ArtID` = '$art_id'";
        }
    }
    else {
        $q = "UPDATE `Art` SET 
        `Name` = '$art_name', 
        `Description` = '$art_desc', 
        `Medium` = '$art_medium', 
        `ArtCreationDate` = '$art_creation_date', 
        `ModifiedDate` = '$modified_date'
        WHERE `Art`.`ArtID` = '$art_id'";
    }
    mysqli_query($con, $q);
    if(mysqli_query($con, $q)){
        echo '<p style=text-align:center;color:green;"><b>Record edited successfully.</b></p>';
    }
    else {
        echo '<p style="text-align:center;color:red;"><b>Record edit unsuccessful:' . mysqli_error($con) . '</b></p>';
    }
}
mysqli_close($con);
}
?>