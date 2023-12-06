<?php
include 'connect.php';  // Mengimpor file 'connect.php' yang berisi koneksi ke database.

if ($_SERVER["REQUEST_METHOD"] == "POST") {  // Memeriksa apakah request yang diterima adalah metode POST.
    // CREATE
    $name = $_POST["name"];  // Mengambil nilai input field "name" dari formulir.
    $age = $_POST["age"];    // Mengambil nilai input field "age" dari formulir.
    $grade = $_POST["grade"];  // Mengambil nilai input field "grade" dari formulir.

    $sql = "INSERT INTO student_db (name, age, grade) VALUES ('$name', $age, '$grade')";  // Query untuk menambahkan data baru ke tabel 'student_db'.

    if ($conn->query($sql) === TRUE) {  // Menjalankan query dan memeriksa apakah eksekusi query berhasil.
        header("Location: index.php");  // Jika berhasil, redirect ke halaman utama (index.php).
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;  // Jika terjadi kesalahan, tampilkan pesan error.
    }
}

$conn->close();  // Menutup koneksi ke database.
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>

<body>
    <h2>Add Student</h2>
    <form action="add.php" method="post">  <!-- Form untuk menambahkan data mahasiswa dengan mengirimkan data ke halaman add.php menggunakan metode POST. -->
        <label for="name">Name:</label>
        <input type="text" name="name" required>  <!-- Input field untuk nama mahasiswa (wajib diisi). -->
        <br>
        <label for="age">Age:</label>
        <input type="text" name="age" required>  <!-- Input field untuk usia mahasiswa (wajib diisi). -->
        <br>
        <label for="grade">Grade:</label>
        <input type="text" name="grade" required>  <!-- Input field untuk nilai mahasiswa (wajib diisi). -->
        <br>
        <button type="submit">Add</button>  <!-- Tombol untuk mengirimkan data form. -->
    </form>
</body>

</html>
