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
        $errors['user'] = "usernexit";
    }
   else if (password_verify($password, $result['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $result['id'];
        $_SESSION['login']=true;
        header("Location:main.php");
        exit();
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
    $PAGE_TITLE = "Login";
    include "includes/metadata.php";
    ?>
</head>

<body>
    <!-- HEADER -->
    <?php include "includes/header.php"?>

    <!-- MAIN -->
    <main>
        <h1>Login</h1>

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
                <span class="<?=!isset($errors['user']) ? 'hidden' : "";?>">*That user doesn't exist</span>
                <span class="<?=!isset($errors['login']) ? 'hidden' : "";?>">*Incorrect login info</span>
            </div>
            <div>
                <a href="eaccount.php">establish an account</a>
            </div>
            <button id="submit" name="submit">Log In</button>
        </form>
    </main>

    <!-- FOOTER -->
    <?php include "includes/footer.php"?>
</body>

</html>