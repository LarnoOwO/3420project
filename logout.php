<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
unset($_SESSION["login"]);
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
        <legend>Log out success!</legend>
    </main>

      <?php include 'includes/footer.php';?>
  </body>
</html>

