<?php
require_once "db.php";
require_once "user.php";
require_once "validator.php";

$user = new user($coon);
$validator = new validator();

$name ="";
$email ="";
$phone ="";
$error ="";
$success ="";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    
    
    $validator->require_fields(['name'=>$name , 'email'=>$email , 'phone'=>$phone])->validate_email($email)->validate_phone($phone)->check_duplicate_email($user , $email);
    
    if ($validator->haserrors()) {
        $error = implode("<br>" , $validator->geterrors());
        }else {
            try {
                $user->add_user($name , $email , $phone);
                $success = "تم اضافة الطالب بنجاح ";
                $name ="";
                $email ="";
                $phone ="";
                header("refresh: 2; url=index.php");
                }catch (PDOException $e){
                    $error = $e->getMessage();
                    }
                    }
                    }


   
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        
        <title>add student</title>
    </head>
    <body>

    <div class=container>
    <h1>اضافة طالب جديد</h1>
    <?php if (!empty($error)) : ?> 
    <div class="error"><?php echo $error; ?></div>
<?php endif; ?>
<?php if (!empty($success)) : ?> 
    <div class="error"><?php echo $success; ?></div>
<?php endif; ?>

    <form action="add.php" method="POST">
        <div class="form-floating mb-3">
            <input type="name" class="form-control" id="name" name=name placeholder="name" value="<?php echo htmlspecialchars($name);?>">
            <label for="floatingInput">name</label>
        </div>
        
<div class="form-floating mb-3">
  <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="<?php echo htmlspecialchars($email);?>">
  <label for="floatingInput">Email</label>
</div>

<div class="form-floating mb-3">
  <input type="phone" class="form-control" id="phone" name="phone" placeholder="phone" value="<?php echo htmlspecialchars($phone);?>">
  <label for="floatingInput">phone</label>
</div>

<button type="submit" class="btn btn-primary">submit</button>
            <a href="index.php" class="btn btn-dark">⬅️ إلغاء</a>


</form>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>