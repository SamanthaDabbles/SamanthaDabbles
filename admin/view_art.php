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
        <title>Admin: View Art</title>
        <?php include("../shared/head.php") ?>
    </head>
    <body>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="">Admin: All Art</h1>
        </div>
        <div class="panel-body">
            <a class="btn btn-success" href="insert_art.php">Add Art</a>
            <a class="btn btn-default" href="../admin">Back</a>
            <table class="table table-striped table-condensed table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Medium</th>
                    <th>Art Creation Date</th>
                    <th>Row Creation Date</th>
                    <th>Modified Date</th>
                    <th></th>
                </tr>
                <?php 
                    $get_art = "SELECT `ArtID`, `Image`, `Type`, 
                                       `Name`, `Description`, `Medium`, 
                                       `ArtCreationDate`, `CreationDate`, 
                                       `ModifiedDate` 
                                FROM Art";
                    $run_art = mysqli_query($con, $get_art);
                    $i = 0;
                    while($row_art=mysqli_fetch_array($run_art)) {
                        $art_id = $row_art['ArtID'];
                        $art_image = $row_art['Image'];
                        $art_type = $row_art['Type'];
                        $art_name = $row_art['Name'];
                        $art_desc = $row_art['Description'];
                        $art_medium = $row_art['Medium'];
                        $art_creation_date = $row_art['ArtCreationDate'];
                        $creation_date = $row_art['CreationDate'];
                        $modified_date = $row_art['ModifiedDate'];

                ?>
                <tr>
                    <td><?php echo $art_id; ?></td>
                    <td>
                        <?php echo '<img width="50" alt="entry thumbnail" src="data:<?php echo $art_type; ?>;base64,'.base64_encode($art_image).'"/>'; ?>
                    </td>
                    <td><?php echo $art_type; ?></td>
                    <td><?php echo $art_name; ?></td>
                    <td><?php echo $art_desc; ?></td>
                    <td><?php echo $art_medium; ?></td>
                    <td><?php echo $art_creation_date; ?>‎</td>
                    <td><?php echo $creation_date; ?></td>
                    <td><?php echo $modified_date; ?></td>
                    <td>
                        <a class="btn btn-primary btn-block" href="edit_art.php?edit_art=<?php echo $art_id; ?>">Edit</a> 
                        <a href="delete_art.php?delete_art=<?php echo $art_id; ?>" class="btn btn-danger btn-block">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    </body>
</html>
<?php mysqli_close($con); } ?>