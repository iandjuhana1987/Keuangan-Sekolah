<?php
$koneksi = new mysqli("localhost", "root", "", "db_keuangan");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

