<?php
session_start();
if(isset($_SESSION['login'])){
   header("Location:account.php");
   exit();
 }
 
$errors = array(); 
$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;
include "includes/library.php";
$pdo = connectDB();

if (isset($_POST['submit'])){
    $query = "select * from cois3420_pro_users where username=? ";
    $stmt = $pdo->prepare($query);
    $stmt-> execute([$username]);
    $result=$stmt->fetch();
    if($result===false){
        $password=password_hash($password,PASSWORD_DEFAULT);
        $query = "INSERT INTO `cois3420_pro_users` (username, password) VALUES (?, ?)";
        $stmt = $pdo->prepare($query)->execute([$username, $password]);
        header("Location:login.php");
        exit();
    }
   else if (password_verify($password, $result['password'])) {
        $errors['user'] = "usernexit";
    } 
    else{
    $errors['login']= 'passwordissue';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $PAGE_TITLE = "Sign In";
    include "includes/metadata.php";
    ?>
</head>

<body>
    <!-- HEADER -->
    <?php include "includes/header.php"?>

    <!-- MAIN -->
    <main>
        <h1>Sign In</h1>

        <!-- LOGIN FORM -->
        <form action="<?=htmlentities($_SERVER['PHP_SELF'])?>" method="POST" autocomplete="off">
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" placeholder="Username"  value="<?=$username;?>">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <div>
                <span class="<?=!isset($errors['user']) ? 'hidden' : "";?>">*That user has already exist</span>
                <span class="<?=!isset($errors['login']) ? 'hidden' : "";?>">*Incorrect login info</span>
            </div>
            <button id="submit" name="submit">Sign In</button>
        </form>
    </main>

    <!-- FOOTER -->
    <?php include "includes/footer.php"?>
</body>

</html>