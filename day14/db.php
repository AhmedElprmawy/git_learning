<?php
$host="localhost";
$username="root";
$password="";
$dbname="student";
try{

$coon=new pdo("mysql:host=$host;dbname=$dbname",$username,$password);


}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();


}







?>