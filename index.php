<?php
include 'connect.php';

// Insert
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $phn_no = $_POST['phn_no'];

    mysqli_query($conn, "INSERT INTO user (name,email,address,age,phn_no) VALUES ('$name','$email','$address','$age','$phn_no')");
}

// Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM user WHERE id='$id'");
}

// Fetch Data
$result = mysqli_query($conn, "SELECT * FROM user");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Dashboard</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<style>
    body { margin:0; font-family:'Roboto', sans-serif; background:#f5f7fa; }
    header { background:#4e73df; color:white; padding:20px; text-align:center; font-size:24px; font-weight:500; box-shadow:0 3px 6px rgba(0,0,0,0.1);}
    .container { max-width:1200px; margin:20px auto; padding:0 20px; }
    .card { background:white; border-radius:10px; padding:20px; box-shadow:0 3px 6px rgba(0,0,0,0.1); margin-bottom:30px; }
    form input, form button { width:100%; padding:12px; margin:8px 0; border-radius:6px; border:1px solid #ccc; font-size:16px; }
    form button { background:#1cc88a; color:white; border:none; cursor:pointer; font-weight:500; }
    form button:hover { background:#17a673; }
    table { width:100%; border-collapse:collapse; margin-top:20px; }
    th, td { padding:15px; text-align:center; border-bottom:1px solid #eee; }
    th { background:#4e73df; color:white; font-weight:500; }
    tr:hover { background:#f1f3f6; }
    a.button { padding:6px 12px; border-radius:5px; text-decoration:none; color:white; font-weight:500; }
    a.edit { background:#36b9cc; }
    a.edit:hover { background:#2c9faf; }
    a.delete { background:#e74a3b; }
    a.delete:hover { background:#c0392b; }
    h2 { margin-top:0; color:#333; }
    @media(max-width:768px){
        th, td { font-size:14px; padding:10px; }
        form input, form button { font-size:14px; padding:10px; }
    }
</style>
</head>
<body>

<header>user Management Dashboard</header>

<div class="container">

    <div class="card">
        <h2>Add New user</h2>
        <form method="POST">
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="address" placeholder="Address">
            <input type="number" name="age" placeholder="Age">
            <input type="text" name="phn_no" placeholder="Phone Number">
            <button type="submit" name="submit">Add Student</button>
        </form>
    </div>

    <div class="card">
        <h2>All user</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Age</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['address'] ?></td>
                <td><?= $row['age'] ?></td>
                <td><?= $row['phn_no'] ?></td>
                <td>
                    <a class="button edit" href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                    <a class="button delete" href="index.php?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>

</div>

</body>
</html>
