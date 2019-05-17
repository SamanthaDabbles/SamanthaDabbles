<?php 
session_start(); 
include('../db.php');
?>
<html>
    <head>
        <title>Admin Login</title>
        <?php include("../shared/head.php"); ?>
    </head>
    <body>
        <div class="container">
            <div class="col-lg-4 col-lg-offset-4">
                <h1 class="text-center">Admin Panel</h1>
                <div class="login-panel panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h1>
                    </div>
                    <form method="post" action="login.php">
                        <input type="text" name="username" placeholder="Username" required="required" class="form-control" />
                        <input type="password" name="password" placeholder="Password" required="required" class="form-control" />
                        <input type="submit" class="btn btn-block btn-lg btn-success" name="login" required="required" />
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php 

if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $entered_password=$_POST['password'];
    $q = "SELECT * FROM `admin` WHERE Username='$username'";
    $query = mysqli_query($con, $q);
    $check = mysqli_num_rows($query);
    $incorrect = '<p class="incorrect" style="text-align:center;color:red;"><b>Error: Login details incorrect<b></p>';
    if($check == 0)
    {
        echo $incorrect;
    }
    else
    {
        $row = mysqli_fetch_row($query);
        $db_password = $row[2];
        if(password_verify($entered_password, $db_password))
        {
            //Store the fetched details into $_SESSION
            $_SESSION['user_email'] = $row[1];
        
            echo "<script>window.open('index.php?success','_self')</script>";
        }
        else 
        {
            echo $incorrect;
        }
    }
}

?>
