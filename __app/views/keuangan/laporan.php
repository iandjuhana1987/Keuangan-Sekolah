<!DOCTYPE html>
<html>
<head><title>Laporan</title></head>
<body>
<h2>Laporan Keuangan</h2>

<form method="GET">
    <input type="hidden" name="page" value="laporan">
    <input type="text" name="cari" placeholder="Cari NISN/Nama..." value="<?= $_GET['cari'] ?? '' ?>">
    <button>Cari</button>
</form>

<a href="export_excel.php" target="_blank">📤 Export Excel</a>

<table border="1" cellpadding="5">
<tr>
    <th>No</th><th>Nama</th><th>Jenis</th><th>Tanggal</th><th>Nominal</th><th>Keterangan</th><th>Aksi</th>
</tr>
<?php $no = 1; while ($row = $data->fetch_assoc()): ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['nama_jenis'] ?></td>
    <td><?= $row['tanggal'] ?></td>
    <td>Rp <?= number_format($row['nominal']) ?></td>
    <td><?= $row['keterangan'] ?></td>
    <td><a href="kwitansi.php?id=<?= $row['id'] ?>" target="_blank">🧾 Cetak</a></td>
</tr>
<?php endwhile; ?>
</table>
</body>
</html>

