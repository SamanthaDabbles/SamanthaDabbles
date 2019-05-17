<?php include('db.php'); ?>
<head>
    <title>Samantha Dabbles</title>

    <!--All Meta Tags-->
    <meta charset="UTF-8">
    <meta name="description" content="A professional art portfolio and eccomerce website for Samantha Dabbles' works.">
    <meta name="keywords" content="art, portfolio">
    <meta name="author" content="Samantha Tait">
    <meta name="viewport" content="width=device-width, initial-scale=0.1, maximum-scale=1, user-scalable=1"/>
    
    <?php include_once("shared/head.php"); ?>
</head>
<body>
    <?php include("shared/nav.php"); ?>
    <div class="container art-content">
        <div class=" panel-group">
            <?php 
            $get_art = "SELECT ArtID, Image, Name, Description, Medium, ArtCreationDate FROM Art";
            $run_art = mysqli_query($con, $get_art);
            $i = 0;
            while($row_art=mysqli_fetch_array($run_art)) {
                $art_id = $row_art['ArtID'];
                $art_image = $row_art['Image'];
                $art_name = $row_art['Name'];
                $art_desc = $row_art['Description'];
                $art_medium = $row_art['Medium'];
                $art_creation_date = $row_art['ArtCreationDate'];

            ?>
        
            <div class="entries pull-left panel panel-default block">
                <?php echo '<img width="400" alt="entry thumbnail" src="data:image/png;base64,'.base64_encode($art_image).'"/>'; ?>
                <div class="pull-right">
                    <div class="panel-heading">
                        <h2 class=""><?php echo $art_name; ?></h2>
                    </div>
                    <div class="panel-body">
                        <p>
                            <?php echo $art_creation_date; ?>
                            <br/>
                            <?php echo $art_medium; ?>
                            <br/>
                            <?php echo $art_desc; ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php include("shared/footer.php"); ?>
</body>
