<?php
require_once "db.php";
require_once "user.php";
require_once "validator.php";

$user = new user($coon);
$students = [];
$errors = [];

try {
    $students=$user->get_all_users();
} catch (PDOException $e) {
    $errors = $e->getMessage();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>

    <h1>Student Management</h1>
    <a href="add.php" style="margin-bottom: 20px; display: inline-block; padding: 10px 20px; background-color: #4CAF50;
     color: white; text-decoration: none; border-radius: 4px;">Add Student</a>
    
<?php if (!empty($errors)) : ?>
    <div class="error"><?php echo $errors; ?></div>
<?php endif; ?>

<?php if (count($students) > 0) : ?>

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead style="background-color: #f6f1f1;">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
               foreach ($students as $student) : ?>
                <tr>
                        <td><?php echo htmlspecialchars($student['id']); ?></td>
                        <td><?php echo htmlspecialchars($student['name']); ?></td>
                        <td><?php echo htmlspecialchars($student['email']); ?></td>
                        <td><?php echo htmlspecialchars($student['phone']); ?></td>
                        <td>
                            <div class="actions">
                            
                            <a href="edit.php?id=<?php echo htmlspecialchars($student['id']); ?>" class="btn btn-warning"> edit</a>
                            <a href="delete.php?id=<?php echo htmlspecialchars($student['id']); ?>" class="btn btn-danger" onclick="return confirm('هل انت متاكد من الحزف ؟');"> delete</a>
                            </div>
               </td>
               </tr>
               <?php endforeach;?>
                    
        </tbody>
    </table>
    <?php else : ?>
        <p> لا يوجد طلاب حاليا </p>
        <?php endif; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>