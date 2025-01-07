<!-- <?php 
    // Tulis kode disini
?> -->

<!-- <?php echo "Hello World!" ?> -->

<!-- <?php
// Komentar satu baris

# Komentar satu baris

/* 
   Ini adalah komentar multi-baris
   yang dapat digunakan untuk menulis 
   catatan panjang.
*/

?> -->

# Type data 
<?php
    $nama = "Anggi"; // String
    $umur = 20; // Integer
    $tinggi = 1.75; // Float
    $isStudent = true; // Boolean
    $courses = ["PHP", "HTML", "CSS"]; // Array
    echo $nama;
?>

# Operator
<?php 
    # Aritmatika
    $x = 5 + 2; // Penjumlahan
    $y = 5 - 2; // Pengurangan
    $z = 5 * 2; // Perkalian
    $a = 5 / 2; // Pembagian
    $b = 5 % 2; // Modulus (Sisa bagi)

    # Perbandingan
    $x == $y; // Sama dengan
    $x != $y; // Tidak sama dengan
    $x > $y;  // Lebih besar
    $x < $y;  // Lebih kecil

    # Logika
    $x && $y; // AND
    $x || $y; // OR
    !$x;      // NOT
?>

# Conditional Statement
<?php 
    # If Statement
    $umur = 17;
    if ($umur >= 18) {
        echo "Anda dewasa.";
    }

    # If-Else Statement
    $umur = 17;
    if ($umur >= 18) {
        echo "Anda dewasa.";
    } else {
        echo "Anda masih anak-anak.";
    }
    
    # if-else-if Statement
    $nilai = 80;
    if ($nilai >= 85) {
        echo "A";
    } elseif ($nilai >= 70) {
        echo "B";
    } else {
        echo "C";
    }
    
    # Switch Statement
    $warna = "merah";
    switch ($warna) {
        case "merah":
            echo "Warna favorit Anda adalah merah.";
            break;
        case "biru":
            echo "Warna favorit Anda adalah biru.";
            break;
        default:
            echo "Warna favorit Anda tidak dikenal.";
    }
?>