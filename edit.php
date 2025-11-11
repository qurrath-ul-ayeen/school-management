<?php
include 'connect.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM user WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $phn_no = $_POST['phn_no'];

    mysqli_query($conn, "UPDATE student SET name='$name', email='$email', address='$address', age='$age', phn_no='$phn_c no' WHERE id='$id'");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit user</title>
<style>
    body { font-family: Arial; background: #f4f4f9; padding: 20px;}
    form { max-width: 600px; margin:50px auto; background:#fff; padding:25px; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.1);}
    input { width:100%; padding:10px; margin:8px 0; border-radius:5px; border:1px solid #ccc;}
    input[type=submit] { background:#28a745; color:white; border:none; cursor:pointer; }
    input[type=submit]:hover { background:#218838; }
</style>
</head>
<body>
<h2 style="text-align:center;">Edit user</h2>
<form method="POST">
    <input type="text" name="name" value="<?= $row['name'] ?>" required>
    <input type="email" name="email" value="<?= $row['email'] ?>" required>
    <input type="text" name="address" value="<?= $row['address'] ?>">
    <input type="number" name="age" value="<?= $row['age'] ?>">
    <input type="text" name="phn_no" value="<?= $row['phn_no'] ?>">
    <input type="submit" name="update" value="Update Student">
</form>
</body>
</html>
