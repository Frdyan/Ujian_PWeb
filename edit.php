<?php
include 'connect.php';  // Mengimpor file 'connect.php' yang berisi koneksi ke database.

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {  // Memeriksa apakah request yang diterima adalah metode GET dan terdapat parameter "id" dalam URL.
    $id = $_GET["id"];  // Mengambil nilai parameter "id" dari URL.

    $sql = "SELECT * FROM student_db WHERE id=$id";  // Query untuk mendapatkan data mahasiswa berdasarkan ID.
    $result = $conn->query($sql);  // Menjalankan query dan menyimpan hasilnya ke dalam variabel $result.

    if ($result->num_rows > 0) {  // Memeriksa apakah data mahasiswa ditemukan berdasarkan ID.
        $row = $result->fetch_assoc();  // Mengambil data mahasiswa dan menyimpannya dalam array asosiatif $row.
        $name = $row["name"];  // Mengambil nilai nama dari data mahasiswa.
        $age = $row["age"];    // Mengambil nilai usia dari data mahasiswa.
        $grade = $row["grade"];  // Mengambil nilai nilai dari data mahasiswa.
    } else {
        echo "Data not found.";  // Jika data tidak ditemukan, tampilkan pesan.
        exit();  // Hentikan eksekusi script.
    }
} else {
    echo "Invalid request.";  // Jika request tidak sesuai, tampilkan pesan kesalahan.
    exit();  // Hentikan eksekusi script.
}

$conn->close();  // Menutup koneksi ke database.
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="EditStyle.css">  <!-- Mengimpor file CSS dengan nama 'EditStyle.css'. -->
</head>

<body>
    <h2>Edit Student</h2>
    <form action="update.php" method="post">  <!-- Form untuk menyimpan perubahan data mahasiswa dengan mengirimkan data ke halaman update.php menggunakan metode POST. -->
        <input type="hidden" name="id" value="<?php echo $id; ?>">  <!-- Input field tersembunyi untuk menyimpan nilai ID yang akan digunakan pada saat pembaruan data. -->
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>" required>  <!-- Input field untuk nama mahasiswa dengan nilai awal dari data yang akan diubah (wajib diisi). -->
        <br>
        <label for="age">Age:</label>
        <input type="text" name="age" value="<?php echo $age; ?>" required>  <!-- Input field untuk usia mahasiswa dengan nilai awal dari data yang akan diubah (wajib diisi). -->
        <br>
        <label for="grade">Grade:</label>
        <input type="text" name="grade" value="<?php echo $grade; ?>" required>  <!-- Input field untuk nilai mahasiswa dengan nilai awal dari data yang akan diubah (wajib diisi). -->
        <br>
        <button type="submit">Save Changes</button>  <!-- Tombol untuk menyimpan perubahan data form. -->
    </form>
</body>

</html>

