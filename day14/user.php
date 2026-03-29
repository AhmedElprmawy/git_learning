<?php

class user{

private $coon;

public function __construct($database){

    $this->coon = $database;

}


public function adduser($name , $email , $phone){
    try {
        $query=$this->coon->prepare("INSERT INTO users (name , email , phone) VALUE (? , ? , ?)");
        $query->execute([$name , $email , $phone]);
        return true;
    } catch (PDOException $e) {
        throw new Exception("خطا في الاضافة : " . $e->getMessage());
    }

}

public function get_user_by_id($id){

try {
    $query=$this->coon->prepare("SELECT * FROM users WHERE id=?");

    $query->execute([$id]);
    return $query->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    throw new Exception("خطا في جلب البيانات : " . $e->getMessage());
}
}

public function get_all_users(){
        try {
            $query = $this->coon->query("SELECT * FROM users");
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("خطا في جلب البيانات : " . $e->getMessage());
        }
}


public function update_user($id , $name ,$email , $phone){
    try {
        $query=$this->coon->prepare("UPDATE users SET name = ? , email = ? , phone = ? WHERE id= ? ");
        $query->execute([$name , $email , $phone , $id]);
        return true;
    } catch (PDOException $e) {
        throw new Exception("خطا في تحديث البيانات : " . $e->getMessage());
    }

}

public function delete_user($id){
    try {
        $query=$this->coon->prepare("DELETE FROM users WHERE id=?");
        $query->execute([$id]);
        return true;
    } catch (PDOException $e) {
        throw new Exception("خطا في حزف البيانات" . $e->getMessage());
    }
}

public function email_exists($email , $excludeid = null){

try {
    if ($excludeid) {
        $query=$this->coon->prepare("SELECT email FROM users WHERE email =? AND id!=?");
        $query->execute([$email , $excludeid]);
    }else {
        $query=$this->coon->prepare("SELECT email FROM users WHERE email =?");
        $query->execute([$email]);
    }
    return $query->rowCount() > 0;
} catch (PDOException $e) {
    throw new Exception("خطا في التحقق : " . $e->getMessage());
}
}


public function validate_email($email){
    return filter_var( $email, FILTER_VALIDATE_EMAIL);
}

public function validate_phone($phone){
    return preg_match('/^[0-9]{10,}$/', $phone);

}


}




?>