<?php
include 'connect.php';  // Mengimpor file 'connect.php' yang berisi koneksi ke database.

// READ
$sql = "SELECT * FROM student_db";  // Query untuk membaca data dari tabel 'student_db'.
$result = $conn->query($sql);  // Menjalankan query dan menyimpan hasilnya ke dalam variabel $result.

$conn->close();  // Menutup koneksi ke database setelah query selesai dijalankan.
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Database</title>
    <link rel="stylesheet" href="HomeStyle.css">  <!-- Mengimpor file CSS dengan nama 'HomeStyle.css'. -->
</head>

<body>
    <h2>Student Database</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Grade</th>
            <th>Action</th> 
        </tr>
        <?php
        if ($result->num_rows > 0) {  // Memeriksa apakah ada data yang ditemukan dari query sebelumnya.
            while ($row = $result->fetch_assoc()) {  // Mengambil setiap baris data dan menyimpannya .
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['grade']}</td>
                        <td>
                            <a href='edit.php?id={$row['id']}' class='edit-btn'>Edit</a>  <!-- Menampilkan link 'Edit' dengan mengirimkan parameter ID ke halaman edit.php. -->
                            <a href='delete.php?id={$row['id']}' class='delete-btn' onclick=\"return confirm('Are you sure you want to delete?');\">Delete</a>  
                            <!-- Menampilkan link 'Delete' dengan mengirimkan parameter ID ke halaman delete.php dan memunculkan konfirmasi sebelum penghapusan. -->
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No data available</td></tr>";  // Jika tidak ada data yang ditemukan, menampilkan pesan bahwa tidak ada data.
        }
        ?>
    </table>

    <h2>Add Student</h2>
    <form action="add.php" method="post">  <!-- Form untuk menambahkan data mahasiswa menggunakan metode POST. -->
        <label for="name">Name:</label>
        <input type="text" name="name" required>  <!-- Input field untuk nama mahasiswa (wajib diisi). -->
        <br>
        <label for="age">Age:</label>
        <input type="text" name="age" required>  <!-- Input field untuk usia mahasiswa (wajib diisi). -->
        <br>
        <label for="grade">Grade:</label>
        <input type="text" name="grade" required>  <!-- Input field untuk nilai mahasiswa (wajib diisi). -->
        <br>
        <button type="submit" class="add-btn">Add</button>  <!-- Tombol untuk mengirimkan data form. -->
    </form>
</body>

</html>
