<?php
if (isset($_POST['submit'])) {
    // Menangkap data form
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    // Validasi sederhana
    if (!empty($nama) || empty($email)) {
        echo "<p style='color:green;'>Data berhasil dikirim!</p>";
        echo "<p>Nama: $nama</p>";
        echo "<p>Email: $email</p>";
    }
}