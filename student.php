<?php

class User {
    public $name;
    public $email;

    public function sayHello() {
        return "Hello " . $this->name;
        echo "Hello " . $this->email;
    }
}

$user1 = new User();
$user1->name = "Anas";
$user2->email = "anas@test.com";

echo $user1->sayHello();
echo $user2->sayHello();


?>