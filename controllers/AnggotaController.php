<?php
require_once 'models/AnggotaModel.php';

class AnggotaController {
    private $model;
    public $anggotaList = [];
    public $pesan = "";
    public $editData = null;

    public function __construct() {
        $this->model = new AnggotaModel();
        $this->anggotaList = $this->model->getAllAnggota();
    }

    public function prosesTambah($post) {
        $nama_lengkap = trim($post['nama_lengkap'] ?? '');
        $email = trim($post['email'] ?? '');
        $telepon = trim($post['telepon'] ?? '');
        $usia = intval($post['usia'] ?? 0);
        $jenis_kelamin = $post['jenis_kelamin'] ?? '';
        $tinggi_badan = intval($post['tinggi_badan'] ?? 0);
        $posisi = trim($post['posisi'] ?? '');
        $pengalaman = trim($post['pengalaman'] ?? '');

        if ($nama_lengkap && $email && $telepon && $usia > 0 && $jenis_kelamin && $tinggi_badan > 0 && $posisi && $pengalaman) {
            $result = $this->model->tambahAnggota($nama_lengkap, $email, $telepon, $usia, $jenis_kelamin, $tinggi_badan, $posisi, $pengalaman);
            $this->pesan = $result ?
                "<div class='bg-green-100 text-green-700 px-4 py-2 rounded mb-4'>Pendaftaran berhasil!</div>" :
                "<div class='bg-red-100 text-red-700 px-4 py-2 rounded mb-4'>Pendaftaran gagal.</div>";
            $this->anggotaList = $this->model->getAllAnggota();
        } else {
            $this->pesan = "<div class='bg-red-100 text-red-700 px-4 py-2 rounded mb-4'>Semua field wajib diisi.</div>";
        }
    }

    public function prosesEdit($id, $post) {
        $nama_lengkap = trim($post['nama_lengkap'] ?? '');
        $email = trim($post['email'] ?? '');
        $telepon = trim($post['telepon'] ?? '');
        $usia = intval($post['usia'] ?? 0);
        $jenis_kelamin = $post['jenis_kelamin'] ?? '';
        $tinggi_badan = intval($post['tinggi_badan'] ?? 0);
        $posisi = trim($post['posisi'] ?? '');
        $pengalaman = trim($post['pengalaman'] ?? '');

        if ($nama_lengkap && $email && $telepon && $usia > 0 && $jenis_kelamin && $tinggi_badan > 0 && $posisi && $pengalaman) {
            $result = $this->model->updateAnggota($id, $nama_lengkap, $email, $telepon, $usia, $jenis_kelamin, $tinggi_badan, $posisi, $pengalaman);
            $this->pesan = $result ?
                "<div class='bg-green-100 text-green-700 px-4 py-2 rounded mb-4'>Data berhasil diupdate!</div>" :
                "<div class='bg-red-100 text-red-700 px-4 py-2 rounded mb-4'>Update gagal.</div>";
            $this->anggotaList = $this->model->getAllAnggota();
        } else {
            $this->pesan = "<div class='bg-red-100 text-red-700 px-4 py-2 rounded mb-4'>Semua field wajib diisi.</div>";
        }
    }

    public function prosesHapus($id) {
        $result = $this->model->hapusAnggota($id);
        $this->pesan = $result ?
            "<div class='bg-green-100 text-green-700 px-4 py-2 rounded mb-4'>Data berhasil dihapus!</div>" :
            "<div class='bg-red-100 text-red-700 px-4 py-2 rounded mb-4'>Gagal menghapus data.</div>";
        $this->anggotaList = $this->model->getAllAnggota();
    }

    public function getEditData($id) {
        $this->editData = $this->model->getAnggotaById($id);
    }
}
?>
