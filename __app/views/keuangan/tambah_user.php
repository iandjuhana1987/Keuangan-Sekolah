<!DOCTYPE html>
<html>
<head><title>Tambah User</title></head>
<body>
<h2>Tambah User Baru</h2>
<?php if (isset($_GET['berhasil'])) echo "<p style='color:green;'>User berhasil ditambahkan!</p>"; ?>
<form method="POST">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Role:
    <select name="role">
        <option value="operator">Operator</option>
        <option value="admin">Admin</option>
    </select><br>
    <button type="submit">Simpan</button>
</form>
</body>
</html>

