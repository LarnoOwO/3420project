<?php
session_start();
$password = $_POST['password'] ?? null;
include "includes/library.php";
$pdo = connectDB();
if (isset($_POST['submit'])){
    $password=password_hash($password,PASSWORD_DEFAULT);
    $query = "DELETE FROM cois3420_pro_users WHERE username=?";
    $stmt = $pdo->prepare($query);
    $stmt-> execute([$_SESSION['username']]);
    $query = "INSERT INTO `cois3420_pro_users` (username, password) VALUES (?, ?)";
    $stmt = $pdo->prepare($query)->execute([$_SESSION["username"], $password]);
    unset($_SESSION["username"]);
    unset($_SESSION["password"]);
    unset($_SESSION["login"]);
    header("Location:login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
 <?php
$PAGE_TITLE = "Recepis";
include 'includes/metadata.php';
?>
  </head>

  <body>
   <?php include 'includes/header.php';?>

    <!-- MAIN CONTENT -->
    <main>
    <form action="<?=htmlentities($_SERVER['PHP_SELF'])?>" method="POST" autocomplete="off">
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <button id="submit" name="submit">reset</button>
        </form>
    </main>

      <?php include 'includes/footer.php';?>
  </body>
</html>

