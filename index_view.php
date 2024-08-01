<?php
require 'config_oop.php';
$mahasiswa = new Mahasiswa();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['create'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jurusan = $_POST['jurusan'];
        $program_studi = $_POST['program_studi'];
        $ipk = $_POST['ipk'];
        echo $mahasiswa->create($nim, $nama, $tempat_lahir, $tanggal_lahir, $jurusan, $program_studi, $ipk);
    } elseif (isset($_POST['update'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jurusan = $_POST['jurusan'];
        $program_studi = $_POST['program_studi'];
        $ipk = $_POST['ipk'];
        echo $mahasiswa->update($nim, $nama, $tempat_lahir, $tanggal_lahir, $jurusan, $program_studi, $ipk);
    } elseif (isset($_POST['delete'])) {
        $nim = $_POST['nim'];
        echo $mahasiswa->delete($nim);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Mahasiswa</title>
</head>
<body>
    <h1>CRUD Mahasiswa</h1>
    
    <!-- Form untuk menambahkan data -->
    <h2>Tambah Data Mahasiswa</h2>
    <form method="post" action="">
        <input type="hidden" name="create">
        <label for="nim">NIM:</label>
        <input type="text" name="nim" required><br>
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required><br>
        <label for="tempat_lahir">Tempat Lahir:</label>
        <input type="text" name="tempat_lahir" required><br>
        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" required><br>
        <label for="jurusan">Jurusan:</label>
        <input type="text" name="jurusan" required><br>
        <label for="program_studi">Program Studi:</label>
        <input type="text" name="program_studi" required><br>
        <label for="ipk">IPK:</label>
        <input type="text" name="ipk" required><br>
        <button type="submit">Tambah</button>
    </form>
    
    <!-- Form untuk memperbarui data -->
    <h2>Perbarui Data Mahasiswa</h2>
    <form method="post" action="">
        <input type="hidden" name="update">
        <label for="nim">NIM:</label>
        <input type="text" name="nim" required><br>
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required><br>
        <label for="tempat_lahir">Tempat Lahir:</label>
        <input type="text" name="tempat_lahir" required><br>
        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" required><br>
        <label for="jurusan">Jurusan:</label>
        <input type="text" name="jurusan" required><br>
        <label for="program_studi">Program Studi:</label>
        <input type="text" name="program_studi" required><br>
        <label for="ipk">IPK:</label>
        <input type="text" name="ipk" required><br>
        <button type="submit">Perbarui</button>
    </form>
    
    <!-- Form untuk menghapus data -->
    <h2>Hapus Data Mahasiswa</h2>
    <form method="post" action="">
        <input type="hidden" name="delete">
        <label for="nim">NIM:</label>
        <input type="text" name="nim" required><br>
        <button type="submit">Hapus</button>
    </form>
    
    <!-- Tabel untuk menampilkan data -->
    <h2>Data Mahasiswa</h2>
    <table border="1">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jurusan</th>
            <th>Program Studi</th>
            <th>IPK</th>
        </tr>
        <?php
        $sql = "SELECT nim, nama, tempat_lahir, tanggal_lahir, jurusan, program_studi, ipk FROM mahasiswa";
        $result = $mahasiswa->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["nim"] . "</td>
                    <td>" . $row["nama"] . "</td>
                    <td>" . $row["tempat_lahir"] . "</td>
                    <td>" . $row["tanggal_lahir"] . "</td>
                    <td>" . $row["jurusan"] . "</td>
                    <td>" . $row["program_studi"] . "</td>
                    <td>" . $row["ipk"] . "</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>0 results</td></tr>";
        }
        ?>
    </table>
</body>
</html>
