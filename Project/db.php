<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'ar';

    // Membuat koneksi ke database
    $conn = new mysqli($host, $user, $pass, $dbname);

    // Cek koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

