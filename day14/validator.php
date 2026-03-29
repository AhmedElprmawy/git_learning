<?php 

require_once "db.php";
require_once "user.php";

class validator{
    private $errors=[];
    public function require_fields($data){

    foreach ($data as $field => $value) {
        if (empty($value)) {
            $this->errors [] = "مطلوب $field  حقل ";
        }
    }
    return $this ;
    }

    public function validate_email($email){
        if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
        $this->errors[] = "البريد الالكتروني غير صحيح";
        }
        return $this ;
    }
    public function validate_phone($phone){
        if (!preg_match('/^[0-9]{10,}$/' , $phone)) {
            $this->errors[] = "رقم الهاتف يجب ان يكون ارقام فقط ولا يقل عن 10 ارقام";
        }
        return $this;
    }

    public function check_duplicate_email($user , $email , $excludeid = null ){
        try {
            if ($user->email_exists($email , $excludeid)) {
                $this->errors[] = "هذاالبريد الالكتروني مسجل بلفعل : ";
            }
        } catch (PDOException $e) {
            $this->errors[] = $e->getMessage();
        }
        return $this;
    }

    public function geterrors(){
        return $this->errors;
    }
    public function haserrors(){
        return count($this->errors) > 0 ;
    }
    public function clear_errors(){
        $this->errors = [];
        return $this;
    }

}






?>
