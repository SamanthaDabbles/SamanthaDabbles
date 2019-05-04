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
    <form id="contact" class="form">
            <div class="container">
                <div class="head">
                    <h1>Contact</h1>
                </div>
                <input class="form-control" type="text" name="name" placeholder="Name" required /><br />
                <input  class="form-control" type="email" name="email" placeholder="Email" required /><br />
                <textarea class="form-control" type="text" name="message" placeholder="Message" required ></textarea><br />
                <input class="btn btn-primary" type="submit" name="send" />
            </div>
    </form>
    <?php include("shared/footer.php"); ?>
</body>
