<?php

$host="localhost";
$username="root";
$password="";
$dbname="test";

try {

    $coon=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $coon->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();


}

// $sql="INSERT INTO login (name,password,email) VALUES (?, ? , ?)";
// $stmt=$coon->prepare($sql);
// $stmt->execute(["jana","1234","jana@gmail.com"]);


// $stmt=$coon->query("SELECT * FROM login");
// $login=$stmt->fetchAll(PDO::FETCH_ASSOC);
// foreach ($login as $row) {
//     echo "Name: " . $row['name'] . "<br>";
//     echo "Password: " . $row['password'] . "<br>";
//     echo "Email: " . $row['email'] . "<br><br>";
// }


// $delete=$coon->prepare("DELETE FROM login WHERE id=?");
// $delete->execute([20]);

// $ubdete=$coon->prepare("UPDATE login SET name=? , password=? , email=? WHERE id=?");
// $ubdete->execute(["jana","23456","jana23@gmail.com",4]);

class student_manager{
    public $coon;
    public function __construct($coon){
        $this->coon=$coon;

    }
    
public function addstudent($name , $password , $email){

            $sql="INSERT INTO login (name , password , email) VALUES (?,?,?)";
            $stmt=$this->coon->prepare($sql);
            $stmt->execute([$name , $password , $email]);

}

public function get_student($id){
    $sql="SELECT * FROM login WHERE id=?";
    $stmt=$this->coon->prepare($sql);
    $stmt->execute([$id]);
    $stmt=$stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($stmt as $row){
        echo "name : " .$row ['name'] . "<br>";
        echo "password : " .$row ['password'] . "<br>";
        echo "email : " .$row ['email'] . "<br>";
    }

}

public function delete($id){
    $delete="DELETE FROM login WHERE id=?";
    $stmt=$this->coon->prepare($delete);
    $stmt->execute([$id]);
}

}

$add=new student_manager($coon);
$add->addstudent("gamal" , "90" ,"gamal@email.com");
$add->get_student(3);
$add->delete(4);