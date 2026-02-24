<?php

//day 9 : oop practes

class user{

    public $name;
    public $email;

    public function __construct($name, $email){
        $this->name = $name;
        $this->email = $email;
    }
    public function displayInfo(){
        echo "name : " . $this->name . " email : " . $this->email . "<br>";
    }

}

class student extends user{

    public $grade;
    public function __construct($name, $email,$grade){
        parent::__construct($name,$email);
        $this->grade=$grade;
    }

    public function getResult(){
        if($this->grade>=85){
            echo "you ar atalnted student  " . $this->name . " your grade is " . $this->grade . "<br>";
        }elseif ($this->grade>=65) {
            echo "good job " . $this->name . " your grade is " . $this->grade . " you can do peter next time <br>";
        }else {
            echo "you ar filde  " . $this->name . " your grade is " . $this->grade . " you can do peter next time <br>";
    }
}
}

class admin extends user{

    public function deletestudent(&$student){
        
        unset($student);
        echo "student has been deleted <br>";
    }

}

$student1 = new student("ahmed","ahmed@email.com",90);
$student2 = new student("mohamed","mohamed@email.com" , 70);
$student3 = new student("sara","sara@email.com" , 40);

$admin =new admin("admin " , "admin@email.com");

$student1->displayInfo();
$student1->getResult();
$student2->displayInfo();
$student2->getResult();
$student3->displayInfo();
$student3->getResult();
$admin->deletestudent($student3);



class BanckAcount{
    public $acountname;
    private $blance;

    public function __construct($acountname,$blance){
        $this->acountname = $acountname;
        $this->blance = $blance;
    }

    public function getblance(){
        return $this->blance;
    }

    public function deposit($amount){
        if ($amount > 0){
            $this->blance += $amount;
            echo "you have deposited " . $amount . " your new blance is : " . $this->blance . "<br>";
 
        }else{
            echo "invaild amount <br>";
        }

    }

    public function withdraw($amount){
        if($amount > 0 && $amount <= $this->blance){
            $this->blance -= $amount;
            echo "you have withdrawn " . $amount . " your new blance is : " . $this->blance . "<br>";

        }else{
            echo "invaild amount or insufficient blance <br>";
        }
    }



}


$account1 = new BanckAcount("ahmed",1000);
$account1->deposit(3000);
$account1->withdraw(400);

$account2 = new BanckAcount("mohamed",2000);
$account2->deposit(1000);
$account2->withdraw(500);
?>