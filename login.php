<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php $_SESSION["username"] = "admin"; $_SESSION["password"] = "236";  ?>


<form action="dashboard.php" method="POST">

    <input type="text" name="username" placeholder="enter your username">
    <br><br>
    <input type="password" name="password" placeholder="enter your password">
    <br><br>
    <button type="submit">login</button>

    </form>
    
</body>
</html>