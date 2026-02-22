<?php

class student{
    public $name;
    public $grade;

    public function get_grade($name , $grade){
        $this->name=$name;
        $this->grade=$grade;    
    
        if ($grade > 85) {
            echo "excelent " . $name . " you ar top student of this class<br>";
            
        }elseif($grade>=65 && $grade<=85){
            echo "good " . $name . " whel done but you can do peter <br>";
        }else {
        echo "you ar file " . $name . " sory you can stude peter the next time <br> ";
        }
    
    }
}

$grades=new student();
$grades->get_grade("ahmed", 90);

$student2=new student();
$student2->get_grade("mohamed" , 80);

$student3=new student();
$student3->get_grade("amal" , 60);


?>