<?php 
    $nama = "Anggi Maulana";
    $judulBuku = "Belajar Bahasa Pemrograman PHP";
    $lamaPinjaman = 100;
    $dendaPerHari = 2000;

    if ($lamaPinjaman > 7) {
        $keterlambatan = $lamaPinjaman - 7;
        $totalDenda = $keterlambatan * $dendaPerHari;
        $status = "Terlambat";
    } else {
        $totalDenda = 0;
        $status = "Tidak Terlambat";
    }

    $daftarBuku = [
        "Pemrograman Berorientasi Objek",
        "Keamanan Sistem Informasi",
        "Data Visualisation",
        "Manajemen Proyek Sistem Informasi"
    ];

    // Menampilkan output
    echo "Data Peminjam Buku: <br/>";
    echo "1. Nama Peminjam: $nama\n";
    echo "<br/> 2. Judul Buku: \"$judulBuku\"\n";
    echo "<br/> 3. Lama Pinjaman: $lamaPinjaman hari\n";
    echo "<br/> 4. Status: $status\n";
    echo "<br/> 5. Total Denda: Rp$totalDenda\n\n";

    echo "<br/><br/>Daftar Buku yang Dipinjam: <br/>";
    foreach ($daftarBuku as $index => $buku) {
        echo ($index + 1) . ". $buku<br/>";
    }
