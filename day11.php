<?php
interface shape{

    public function calculateArea();
}

class ractangel implements shape{
    public $length;
    public $width;
    public function __construct($length,$width)
    {
        $this->length=$length;
        $this->width=$width;
    }
    public function calculateArea()
    {
        return $this->length*$this->width;
    }
}
class circle implements shape{
    public $redius;
    public function __construct($redius)
    {
        $this->redius=$redius;
    }
    public function calculateArea()
    {
        return 3.14*$this->redius*$this->redius;
    }
}

$ractangel=new ractangel(5,10);
echo "area of ractangel is : " . $ractangel->calculateArea()." <br> ";

$circle=new circle(7);
echo "area of circle is : " . $circle->calculateArea();


interface notification{
    public function sendnotifcation($message);

}

class email implements notification{
    public function sendnotifcation($message){
        echo "send email with message : " . $message . "<br>";
    }

}

class sms implements notification{
    public function sendnotifcation($message){
        echo "send sms with message : " . $message . "<br>";
    }
}

class pushnotification implements notification{
    public function sendnotifcation($message){
        echo "send push notification with message : " . $message . "<br>";
    }
}

$email=new email();
$email->sendnotifcation("hello from email");

$sms=new sms();
$sms->sendnotifcation("hello from sms");

$pushnotification=new pushnotification();
$pushnotification->sendnotifcation("hello from push notification");


?>
