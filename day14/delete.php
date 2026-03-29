<?php

require_once "db.php";
require_once "user.php";
require_once "validator.php";

$user = new user ($coon);


$id = isset($_GET['id']) ? $_GET['id'] : null;

$error ="";
$success ="";

if ($id) {
    try {
        $student= $user->get_user_by_id($id);
        if (!$student) {
            $error = "المستخدم غير موجود" ;
        }else {
            $user->delete_user($id);
            $success = "تم الحذف بنجاح";
            header("refresh: 0; url=index.php");
        }
    } catch (PDOException $e) {
        $error = $e->getMessage();
        
    }
    
    }else {
        $error = "لم يتم تحديد مستخدم" ;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<div class="message">
    <?php if (!empty($error)) : ?> 
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <?php if (!empty($success)) : ?> 
        <div class="success"><?php echo $success; ?></div>
    <?php endif; ?>
    
    <a href="index.php">⬅️ العودة إلى القائمة</a>
</div>
    
</body>
</html>