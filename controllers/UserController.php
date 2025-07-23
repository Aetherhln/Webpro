<?php
require_once __DIR__ . '/../models/UserModel.php';
// Controller untuk user authentication (register & login)
class UserController {
    private $model;
    public $pesan = "";
    public function __construct() {
        $this->model = new UserModel();
    }
    public function register($post) {
        $username = trim($post['username'] ?? '');
        $password = $post['password'] ?? '';
        $password2 = $post['password2'] ?? '';
        if ($username && $password && $password2) {
            if ($password !== $password2) {
                $this->pesan = "<div class='bg-red-100 text-red-700 px-4 py-2 rounded mb-4'>Password tidak sama.</div>";
                return false;
            }
            if ($this->model->getUserByUsername($username)) {
                $this->pesan = "<div class='bg-red-100 text-red-700 px-4 py-2 rounded mb-4'>Username sudah terdaftar.</div>";
                return false;
            }
            $result = $this->model->createUser($username, $password);
            if ($result) {
                $this->pesan = "<div class='bg-green-100 text-green-700 px-4 py-2 rounded mb-4'>Registrasi berhasil, silakan login.</div>";
                return true;
            } else {
                $this->pesan = "<div class='bg-red-100 text-red-700 px-4 py-2 rounded mb-4'>Registrasi gagal.</div>";
            }
        } else {
            $this->pesan = "<div class='bg-red-100 text-red-700 px-4 py-2 rounded mb-4'>Semua field wajib diisi.</div>";
        }
        return false;
    }
    public function login($post) {
        $username = trim($post['username'] ?? '');
        $password = $post['password'] ?? '';
        if ($username && $password) {
            $user = $this->model->verifyUser($username, $password);
            if ($user) {
                $_SESSION['user'] = $user['username'];
                return true;
            } else {
                $this->pesan = "<div class='bg-red-100 text-red-700 px-4 py-2 rounded mb-4'>Username atau password salah.</div>";
            }
        } else {
            $this->pesan = "<div class='bg-red-100 text-red-700 px-4 py-2 rounded mb-4'>Semua field wajib diisi.</div>";
        }
        return false;
    }
    public function logout() {
        session_destroy();
        header("Location: login.php");
        exit;
    }
} 