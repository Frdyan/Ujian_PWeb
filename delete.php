<?php
include 'connect.php';  // Mengimpor file 'connect.php' yang berisi koneksi ke database.

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {  // Memeriksa apakah request yang diterima adalah metode GET dan terdapat parameter "id" dalam URL.
    $id = $_GET["id"];  // Mengambil nilai parameter "id" dari URL.

    // DELETE
    $sql = "DELETE FROM student_db WHERE id=$id";  // Query untuk menghapus data dari tabel 'student_db' berdasarkan ID.

    if ($conn->query($sql) === TRUE) {  // Menjalankan query dan memeriksa apakah eksekusi query berhasil.
        header("Location: index.php");  // Jika berhasil, redirect ke halaman utama (index.php).
    } else {
        echo "Error deleting record: " . $conn->error;  // Jika terjadi kesalahan, tampilkan pesan error.
    }
} else {
    echo "Invalid request.";  // Jika request tidak sesuai, tampilkan pesan kesalahan dan hentikan eksekusi script.
    exit();
}

$conn->close();  // Menutup koneksi ke database.
?>
