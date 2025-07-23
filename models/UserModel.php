<?php
// Model untuk user authentication (register & login)
class UserModel {
    private $conn;
    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "db_basket");
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }
    public function createUser($username, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ss", $username, $hash);
            $result = $stmt->execute();
            $stmt->close();
            return $result;
        }
        return false;
    }
    public function getUserByUsername($username) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $res = $stmt->get_result();
            $data = $res->fetch_assoc();
            $stmt->close();
            return $data;
        }
        return null;
    }
    public function verifyUser($username, $password) {
        $user = $this->getUserByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
    public function __destruct() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
} 