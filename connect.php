<?php
$host = "localhost";          // Nama host database, dalam kasus ini menggunakan server lokal.
$username = "root";            // Nama pengguna database, umumnya "root" pada server lokal.
$password = "";                // Kata sandi pengguna database, dalam kasus server lokal mungkin kosong.
$database = "student_crud";    // Nama database yang akan digunakan.

$conn = new mysqli($host, $username, $password, $database);  // Membuat objek koneksi baru menggunakan kelas mysqli.

if ($conn->connect_error) {  // Memeriksa apakah terjadi kesalahan saat menjalankan koneksi.
    die("Connection failed: " . $conn->connect_error);  // Jika terdapat kesalahan, hentikan eksekusi script dan tampilkan pesan kesalahan.
}
?>
