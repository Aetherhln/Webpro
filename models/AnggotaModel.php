<?php
class AnggotaModel {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "db_basket");
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    public function getAllAnggota() {
        $sql = "SELECT * FROM anggota ORDER BY tanggal_daftar DESC";
        $result = $this->conn->query($sql);
        $data = [];
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function getAnggotaById($id) {
        $sql = "SELECT * FROM anggota WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $res = $stmt->get_result();
            $data = $res->fetch_assoc();
            $stmt->close();
            return $data;
        }
        return null;
    }

    public function tambahAnggota($nama_lengkap, $email, $telepon, $usia, $jenis_kelamin, $tinggi_badan, $posisi, $pengalaman) {
        $sql = "INSERT INTO anggota (nama_lengkap, email, telepon, usia, jenis_kelamin, tinggi_badan, posisi, pengalaman) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("sssissss", $nama_lengkap, $email, $telepon, $usia, $jenis_kelamin, $tinggi_badan, $posisi, $pengalaman);
            $result = $stmt->execute();
            $stmt->close();
            return $result;
        }
        return false;
    }

    public function updateAnggota($id, $nama_lengkap, $email, $telepon, $usia, $jenis_kelamin, $tinggi_badan, $posisi, $pengalaman) {
        $sql = "UPDATE anggota SET nama_lengkap=?, email=?, telepon=?, usia=?, jenis_kelamin=?, tinggi_badan=?, posisi=?, pengalaman=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("sssissssi", $nama_lengkap, $email, $telepon, $usia, $jenis_kelamin, $tinggi_badan, $posisi, $pengalaman, $id);
            $result = $stmt->execute();
            $stmt->close();
            return $result;
        }
        return false;
    }

    public function hapusAnggota($id) {
        $sql = "DELETE FROM anggota WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("i", $id);
            $result = $stmt->execute();
            $stmt->close();
            return $result;
        }
        return false;
    }

    public function __destruct() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
?>
