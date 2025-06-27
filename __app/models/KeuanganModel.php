<?php
require 'config/database.php';

class KeuanganModel {
    public function getRingkasan() {
        global $koneksi;
        $res = $koneksi->query("SELECT jt.nama_jenis, SUM(tk.nominal) as total
            FROM transaksi_keuangan tk
            JOIN jenis_transaksi jt ON jt.id = tk.id_jenis_transaksi
            GROUP BY jt.nama_jenis");
        $data = [];
        while ($row = $res->fetch_assoc()) {
            $data[$row['nama_jenis']] = $row['total'];
        }
        return $data;
    }

    public function tambah($data) {
        global $koneksi;
        $stmt = $koneksi->prepare("INSERT INTO transaksi_keuangan (id_siswa, id_jenis_transaksi, tanggal, nominal, keterangan) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iisds", $data['id_siswa'], $data['id_jenis'], $data['tanggal'], $data['nominal'], $data['keterangan']);
        $stmt->execute();
    }

    public function getJenis() {
        global $koneksi;
        return $koneksi->query("SELECT * FROM jenis_transaksi");
    }

    public function getLaporan($keyword = null) {
        global $koneksi;
        $sql = "SELECT tk.*, s.nama, jt.nama_jenis FROM transaksi_keuangan tk
                JOIN siswa s ON s.id = tk.id_siswa
                JOIN jenis_transaksi jt ON jt.id = tk.id_jenis_transaksi";
        if ($keyword) {
            $keyword = $koneksi->real_escape_string($keyword);
            $sql .= " WHERE s.nisn LIKE '%$keyword%' OR s.nama LIKE '%$keyword%'";
        }
        return $koneksi->query($sql);
    }

    public function getTransaksiById($id) {
        global $koneksi;
        $res = $koneksi->query("SELECT tk.*, s.nama, jt.nama_jenis FROM transaksi_keuangan tk 
            JOIN siswa s ON s.id = tk.id_siswa 
            JOIN jenis_transaksi jt ON jt.id = tk.id_jenis_transaksi 
            WHERE tk.id = $id");
        return $res->fetch_assoc();
    }

    public function tambahUser($data) {
        global $koneksi;
        $username = $koneksi->real_escape_string($data['username']);
        $password = hash('sha256', $data['password']);
        $role = $koneksi->real_escape_string($data['role']);
        $koneksi->query("INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')");
    }
}

