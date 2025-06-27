<?php
require 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $lines = explode("\n", trim($_POST['data']));
  foreach ($lines as $line) {
    $columns = explode("\t", trim($line));
    if (count($columns) >= 4) {
      $nisn = $columns[0];
      $nama = $columns[1];
      $kelas = $columns[2];
      $sektor = $columns[3];
      $koneksi->query("INSERT INTO siswa (nisn, nama, kelas, sektor) VALUES ('$nisn', '$nama', '$kelas', '$sektor')");
    }
  }
  header('Location: index.php?page=siswa');
}
?>
