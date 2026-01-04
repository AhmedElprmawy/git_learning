<?php
session_start();

if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
    header("location: login2.php");
}else{
    echo "<h1>Welcome " . $_SESSION['username'] . "</h1>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard2</title>
</head>
<body>

<form action="dashboard2.php" method="post">
    <button type="submit" name="logout">Logout</button>
</form>
<?php
if(isset($_POST['logout'])){

    header("location: logout2.php");
}
?>
</body>
</html>