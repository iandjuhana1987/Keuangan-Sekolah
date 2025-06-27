<?php
session_start();
require 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']);

    $result = $koneksi->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
    if ($result->num_rows === 1) {
        $_SESSION['login'] = true;
        $_SESSION['user'] = $result->fetch_assoc();
        header('Location: index.php');
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - Keuangan Sekolah</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSS -->
  <link rel="stylesheet" href="statics/css/bootstrap.min.css">
  <link rel="stylesheet" href="statics/css/adminlte.min.css">
  <link rel="stylesheet" href="statics/plugins/fontawesome-free/css/all.min.css">

  <style>
    body {
      background: linear-gradient(135deg, #007bff, #6610f2);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .login-box {
      width: 360px;
    }
    .login-logo a {
      color: white;
      font-weight: bold;
    }
  </style>
</head>
<body>

<div class="login-box">
  <div class="login-logo">
    <a href="#"><i class="fas fa-school"></i> Keuangan Sekolah</a>
  </div>

  <div class="card card-outline card-primary">
    <div class="card-body">
      <p class="login-box-msg">Silakan login untuk melanjutkan</p>

      <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
      <?php endif; ?>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" required>
          <div class="input-group-append"><div class="input-group-text"><span class="fas fa-user"></span></div></div>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>
        </div>

        <div class="row">
          <div class="col-8"></div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- JS -->
<script src="statics/js/jquery.min.js"></script>
<script src="statics/js/bootstrap.bundle.min.js"></script>
</body>
</html>
