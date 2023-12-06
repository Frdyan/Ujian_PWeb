<?php
include 'connect.php';  // Koneksi ke database.

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    // UPDATE
    $id = $_POST["id"];  // Mengambil ID dari formulir.
    $name = $_POST["name"];  // Mengambil nama dari formulir.
    $age = $_POST["age"];  // Mengambil usia dari formulir.
    $grade = $_POST["grade"];  // Mengambil nilai dari formulir.

    $sql = "UPDATE student_db SET name='$name', age=$age, grade='$grade' WHERE id=$id";  // Query untuk memperbarui data di database berdasarkan ID.

    if ($conn->query($sql) === TRUE) {  // Menjalankan query dan memeriksa apakah eksekusi query berhasil.
        header("Location: index.php");  // Redirect ke halaman utama setelah pembaruan berhasil.
    } else {
        echo "Error updating record: " . $conn->error;  // Menampilkan pesan error jika terjadi kesalahan saat pembaruan data.
    }
}

$conn->close();  // Menutup koneksi ke database.
?>
