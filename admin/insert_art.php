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
        <title>Add Art</title>
        <?php include("../shared/head.php") ?>
    </head>
    <body>
        <div class="container">
            <h1>Admin: Add Art</h1>
            <form action="insert_art.php" method="POST" enctype="multipart/form-data" class="">
                <div class="form-group">
                    <label for="art_image">Image</label>
                    <input type="file" name="art_image" value="" required />
                </div>
                <div class="form-group">
                    <label for="art_name">Name</label>
                    <input type="text" name="art_name" value="" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="art_desc">Description</label>
                    <input type="textarea" cols="20" rows="10" name="art_desc" value="" class="form-control" required />
                </div>
                <div class="form-group">    
                    <label for="art_medium">Medium</label>
                    <input type="text" name="art_medium" value="" class="form-control" required />
                </div>
                <div class="form-group">    
                    <label for="art_creation_date">Art Creation Date</label>
                    <input type="date" name="art_creation_date" value="" class="form-control" required />
                </div>

                <input type="submit" name="insert_art" value="Add Art" class="btn btn-primary" required />
                <a class="btn btn-default" href="view_art.php">Back</a>
            </form>
        </div>
    </body>
</html>

<?php
if(isset($_POST['insert_art'])){

    $art_name = mysqli_real_escape_string($con,$_POST['art_name']);
    $art_desc = mysqli_real_escape_string($con,$_POST['art_desc']);
    $art_medium = mysqli_real_escape_string($con,$_POST['art_medium']);
    $art_creation_date = mysqli_real_escape_string($con,$_POST['art_creation_date']);

    //$art_image = mysqli_real_escape_string($con,addslashes(file_get_contents($_FILES['art_image']['tmp_name'])));
    if (is_uploaded_file($_FILES['art_image']['tmp_name'])) {
        $imgData = addslashes(file_get_contents($_FILES['art_image']['tmp_name']));
        $imageProperties = getimageSize($_FILES['art_image']['tmp_name']);
    }
    $q = "INSERT INTO Art(`Name`,`Description`,`Medium`,`ArtCreationDate`,`CreationDate`,`ModifiedDate`,`Type`, `Image`)
    VALUES('$art_name', '$art_desc', '$art_medium', '$art_creation_date', '{$imageProperties['mime']}', '{$imgData}')";
    if(mysqli_query($con, $q)){
        header("Location: view_art.php");
        echo "Record added successfully.";
    }
    else {
        echo "Record unsuccessful." . mysqli_error($con);
    }
    
}
mysqli_close($con);
?>