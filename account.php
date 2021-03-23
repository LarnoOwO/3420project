<?php
/****************************************
// ENSURES THE USER HAS ACTUALLY LOGGED IN
// IF NOT REDIRECT TO THE LOGIN PAGE HERE
 ******************************************/
session_start();
if(!isset($_SESSION['login'])){
   header("Location:login.php");
   exit();
 }

require "includes/library.php";

// CONNECT TO DATABASE
$pdo = connectDB();


?>
<!DOCTYPE html>
<html lang="en">
  <head>
 <?php
$PAGE_TITLE = "My account";
include 'includes/metadata.php';
?>
  </head>

  <body>
   <?php include 'includes/header.php';?>

    <!-- MAIN CONTENT -->
    <main>
    <form action="" method="post">
        <h1>Personal information</h1>
            <div>
                <p>Username: <?php echo $_SESSION['username'];?></p>
            </div>
            <?php
                echo '<button type="submit" class="reset_password" name="preset"> Reset Password</button>';
                echo '<button type="submit" class="delete_account" name="daccount" >Delete Account</button>';
                if(isset($_POST['daccount'])) { 
                    $query = "DELETE FROM cois3420_pro_users WHERE username=?";
                    $stmt = $pdo->prepare($query);
                    $stmt-> execute([$_SESSION['username']]);
                    unset($_SESSION["username"]);
                    unset($_SESSION["password"]);
                    unset($_SESSION["login"]);
                    header("Location:main.php");
                    exit();
                }
                else if(isset($_POST['preset']))
                {
                    header("Location:preset.php");
                    exit();
                }
            ?>
    </form>
    </main>

      <?php include 'includes/footer.php';?>
  </body>
</html>

