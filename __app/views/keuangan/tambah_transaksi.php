<!DOCTYPE html>
<html>
<head><title>Tambah Transaksi</title></head>
<body>
<h2>Tambah Transaksi</h2>
<form method="POST">
    NISN (ID Siswa): <input type="text" name="id_siswa" required><br>
    Jenis:
    <select name="id_jenis" required>
        <?php while ($row = $jenis->fetch_assoc()): ?>
            <option value="<?= $row['id'] ?>"><?= $row['nama_jenis'] ?></option>
        <?php endwhile; ?>
    </select><br>
    Tanggal: <input type="date" name="tanggal" required><br>
    Nominal: <input type="number" name="nominal" required><br>
    Keterangan: <input type="text" name="keterangan"><br>
    <button type="submit">Simpan</button>
</form>
</body>
</html>

