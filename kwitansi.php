<?php
require '__app/models/KeuanganModel.php';
$model = new KeuanganModel();
$data = $model->getTransaksiById($_GET['id']);
?>
<h2>Kwitansi Pembayaran</h2>
<table border="1" cellpadding="10">
<tr><td>Nama</td><td><?= $data['nama'] ?></td></tr>
<tr><td>Jenis</td><td><?= $data['nama_jenis'] ?></td></tr>
<tr><td>Tanggal</td><td><?= $data['tanggal'] ?></td></tr>
<tr><td>Nominal</td><td>Rp <?= number_format($data['nominal']) ?></td></tr>
<tr><td>Keterangan</td><td><?= $data['keterangan'] ?></td></tr>
</table>
<p><i>Terima kasih atas pembayaran Anda.</i></p>

