<?php
session_start();

// Redirect jika belum login
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

require_once '__app/controllers/KeuanganController.php';

$page = $_GET['page'] ?? 'dashboard';

$controller = new KeuanganController();

switch ($page) {
    case 'dashboard':
        $controller->dashboard();
        break;

    case 'tambah':
        $controller->tambahTransaksi();
        break;

    case 'laporan':
        $controller->laporan();
        break;

    case 'tambah-user':
        $controller->tambahUser();
        break;

    case 'siswa':
        $controller->dataSiswa();
        break;

    case 'tambah-siswa':
        $controller->tambahSiswa();
        break;

    case 'proses-siswa':
        require '__app/controllers/proses-siswa.php';
        break;

    default:
        echo "<h3 class='text-danger'>Halaman tidak ditemukan.</h3>";
        break;
}
