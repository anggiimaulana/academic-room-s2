<?php
    include 'config.php';
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM users WHERE id=$id");
    $row = $result->fetch_assoc();
?>
<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    Nama: <input type="text" name="name" value="<?= $row['name'] ?>"><br>
    Email: <input type="email" name="email" value="<?= $row['email'] ?>"><br>
    Usia: <input type="number" name="age" value="<?= $row['age'] ?>"><br>
    <button type="submit">Update</button>
</form>