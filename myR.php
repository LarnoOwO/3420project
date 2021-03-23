<?php
/****************************************
// ENSURES THE USER HAS ACTUALLY LOGGED IN
// IF NOT REDIRECT TO THE LOGIN PAGE HERE
 ******************************************/
session_start();
if(!isset($_SESSION['username'])){
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
$PAGE_TITLE = "Recepis";
include 'includes/metadata.php';
?>
  </head>

  <body>
   <?php include 'includes/header.php';?>

    <!-- MAIN CONTENT -->
    <main>
        
    </main>

      <?php include 'includes/footer.php';?>
  </body>
</html>

