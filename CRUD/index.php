<?php
    include 'config.php';
    $result = $conn->query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pengguna</title>
</head>
<body>
    <h2>Daftar Pengguna</h2>
    
    <form action="create.php" method="POST">
        Nama: <input type="text" name="name" required><br>
        Email: <input type="email" name="email" required><br>
        Usia: <input type="number" name="age" required><br>
        <button type="submit">Tambah Data</button>
    </form>

    <br><br>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Usia</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['age'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>