<?php

require_once "db.php";
require_once "user.php";
require_once "validator.php";

$user = new user($coon);
$validator = new validator();

$id = isset($_GET['id']) ? $_GET['id'] : null;

$name ="";
$email ="";
$phone ="";
$error ="";
$success ="";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    
    
    $validator->require_fields(['name'=>$name , 'email'=>$email , 'phone'=>$phone])->validate_email($email)->validate_phone($phone)->check_duplicate_email($user , $email , $id);
    
    if ($validator->haserrors()) {
        $error = implode('<br>' , $validator->geterrors());
        }else {
            try {
                $user->update_user($id , $name , $email , $phone);
                $success = "تم التحديث بنجاح";
                header("refresh: 2; url=index.php");
                } catch (PDOException $e) {
                    $error = $e->getMessage();
                    }
                    }
                    }

    if ($id) {
        try {
            $student = $user->get_user_by_id($id);
            if (!$student) {
                $error = "المستخدم غير موجود";
            }else {
                $name = $student['name'];
                $email = $student['email'];
                $phone = $student['phone'];
            }
        } catch (PDOException $e) {
            $error = $e->getMessage();
        }
    }else {
        $error = "لم يتم تحديد المستخدم";    
    
    }





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit_page</title>
</head>
<body>
<h1>Edit Student</h1>

<?php if (!empty($error)) : ?> 
    <div class="error"><?php echo $error; ?></div>
<?php endif; ?>
<?php if (!empty($success)) : ?> 
    <div class="error"><?php echo $success; ?></div>
<?php endif; ?>

<form action="edit.php" method="POST">

<input type="hidden" name="id" value="<?php echo htmlspecialchars ($id); ?>">

<label for="name">الاسم: </label><br>
<input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>"><br>

<label for="email">البريد الالكتروني</label><br>
<input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>"><br>

<label for="phone">رقم الهاتف </label><br>
<input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>"><br>


<button type="submit" style="margin-top: 20px; padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">Update</button>
<a href="index.php" style="margin-top: 20px; display: inline-block; padding: 10px 20px; background-color: #008CBA; color: white; text-decoration: none; border-radius: 4px;">Cancel</a>

</form>

</body>
</html>