<?php
require_once '__app/models/KeuanganModel.php';

class KeuanganController {
    private $model;

    public function __construct() {
        $this->model = new KeuanganModel();
    }

    public function dashboard() {
        $data = $this->model->getRingkasan();
        include '__app/views/keuangan/dashboard.php';
    }

    public function tambahTransaksi() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->tambah($_POST);
            header('Location: index.php');
            exit;
        }
        $jenis = $this->model->getJenis();
        include '__app/views/keuangan/tambah_transaksi.php';
    }

    public function laporan() {
        $keyword = $_GET['cari'] ?? null;
        $data = $this->model->getLaporan($keyword);
        include '__app/views/keuangan/laporan.php';
    }

    public function tambahUser() {
        if ($_SESSION['user']['role'] !== 'admin') {
            echo "Akses ditolak!";
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->tambahUser($_POST);
            header("Location: index.php?page=tambah-user&berhasil=1");
            exit;
        }
        include '__app/views/keuangan/tambah_user.php';
    }

    // ✅ Tambahan: Menampilkan Data Siswa
    public function dataSiswa() {
        include '__template/header.php';
        include '__template/sidebar.php';
        include '__app/views/keuangan/siswa.php';
        include '__template/footer.php';
    }

    // ✅ Tambahan: Form Tambah Siswa
    public function tambahSiswa() {
        include '__template/header.php';
        include '__template/sidebar.php';
        include '__app/views/keuangan/tambah_siswa.php';
        include '__template/footer.php';
    }
}
