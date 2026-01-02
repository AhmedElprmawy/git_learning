<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <?php if(!isset($_SESSION["username"]) && !isset($_SESSION["password"])){ 
        header("location: login.php");
    }
    if($_POST["username"] == $_SESSION["username"] && $_POST["password"] == $_SESSION["password"]){
        echo "Welcome to the dashboard, " . htmlspecialchars($_POST["username"]);
    }else{
        header("location: login.php");
    } 

    ?>

    <br><br>
    <a href="logout.php">logout</a>

</body>
</html>