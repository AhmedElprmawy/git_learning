<?php
require_once "appl.php";
trait timestamp{
    public function createdAt(){
        return date("Y-m-d H:i:s");
    }
}


class user{
    use timestamp;
    public function __construct(){
        echo "this is user time has log in : " . $this->createdAt() ."<br>";
    }
}

class post {

use timestamp;

    public function __construct(){
    echo "this is post time has created : " . $this->createdAt();

    }
}

$user = new user();
$post = new post();

$sendemail= new app\serves\emailservise();

$sendemail->sendemail("ahmed@gmail.com");


?>