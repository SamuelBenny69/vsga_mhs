<?php
// Menghubungkan ke database
class Database
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "mhs_vsga";
    public $conn;
    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }
}
class Mahasiswa extends Database
{
    public function create($nim, $nama, $tempat_lahir, $tanggal_lahir, $jurusan, 
    $program_studi, $ipk)
    {
        $stmt = $this->conn->prepare("INSERT INTO mahasiswa (nim, nama, tempat_lahir, tanggal_lahir, jurusan, 
        program_studi, ipk) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssd", $nim, $nama, $tempat_lahir, $tanggal_lahir, $jurusan, 
        $program_studi, $ipk);
        if ($stmt->execute()) {
            return "Data berhasil ditambahkan.";
        } else {
            return "Error: " . $stmt->error;
        }
    }

    public function read()
    {
        $sql = "SELECT nim, nama, tempat_lahir, tanggal_lahir, jurusan, program_studi, ipk FROM mahasiswa";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo " - Nama: " . $row["name"] . " - Email: " . $row["email"] .
                    "<br>";
            }
        } else {
            echo "0 results";
        }
    }

    public function update($nim, $nama, $tempat_lahir, $tanggal_lahir, $jurusan, 
    $program_studi, $ipk)
    {
        $stmt = $this->conn->prepare("UPDATE mahasiswa SET nama = ?, tempat_lahir = ?,tanggal_lahir =?, 
        jurusan =?, program_studi =?, ipk =? WHERE nim = ?");
        $stmt->bind_param("sssssds", $nama, $tempat_lahir, $tanggal_lahir, $jurusan, 
        $program_studi, $ipk, $nim);
        if ($stmt->execute()) {
            return "Data berhasil diperbarui.";
        } else {
            return "Error: " . $stmt->error;
        }
    }

    public function delete($nim)
    {
        $stmt = $this->conn->prepare("DELETE FROM mahasiswa WHERE nim = ?");
        $stmt->bind_param("i", $nim);
        if ($stmt->execute()) {
            return "Data berhasil dihapus.";
        } else {
            return "Error: " . $stmt->error;
        }
    }
}