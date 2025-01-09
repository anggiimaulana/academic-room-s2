<?php
if (isset($_GET['submit'])) {
    // Menangkap data form
    $nama = $_GET['nama'];
    $email = $_GET['email'];

    // Validasi sederhana
    if (empty($nama) || empty($email)) {
        echo "<p style='color:red;'>Nama dan Email wajib diisi.</p>";
    } else {
        echo "<p style='color:green;'>Data berhasil dikirim!</p>";
        echo "<p>Nama: $nama</p>";
        echo "<p>Email: $email</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Sederhana</title>
</head>
<body>
    <form method="GET" action="">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>

        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>