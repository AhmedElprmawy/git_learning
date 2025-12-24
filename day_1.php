<?php 
//  day_1
// $name = "ahmed";
// $age = 25;
// $carer= "developer";

// if($age > 18){
//     echo "allowed";

// }elseif($age > 18 && $carer=="devoloper"){
//     echo "allowed for devolper";

// }else{
//     echo "not allowed";
// }

//day_2

// echo "<br>";

// $count="";
// for($i=0; $i<=20; $i++){
//     if($i % 2 == 0){

//         echo $i;
//     }
//     echo "<br>";
// }

// for($i=1; $i<=20; $i++){

//     if($i % 3==0){
//         echo "Fizz <br>"; 
//     }else{
//         echo $i."<br>";
//     }

// }

// $name = "admin";

// if($name == "admin"){
//     echo "welcome admin";
// }else{
//     echo "access denied";
// }

// day_3 

// function age_add($age){
//     if($age<=18){
//         return "allowed";

//     }else{
//         return "not allowed";
//     }
// }

// $ageed=age_add(18);
// echo $ageed;

// function colector($number){
//     if($number % 2 == 0){
//         echo "even";
//     }else{
//         echo "odd";
//     }
// }
// $count= colector(10);
// echo $count;


// day_4

// $students = array("ahmed","mohamed","anas","sara","hend");



// foreach($students as $student){
//     echo $student . "<br>";
// }



// foreach($students as &$student){
//     if($student == "anas"){
//         echo "top student : " . $student . "<br>";
//     }else{
//         echo $student . "<br>";
//     }
// }
// unset($student);


$students = [["name"=>"ahmed","grade"=>90],["name"=>"mohamed","grade"=>75],["name"=>"anas","grade"=>60]];

foreach($students as $student){
    if($student["grade"] >=85){
        echo $student["name"] . " : excellent <br>";
    }elseif($student["grade"] >65){
        echo $student["name"] . " : good <br>";
        }else{
            echo $student["name"] . " : fail <br>";
        }
}

?>