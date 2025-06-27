<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link">
    <span class="brand-text font-weight-light">Keuangan Sekolah</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column"
          data-widget="treeview"
          data-accordion="false"
          role="menu">

        <!-- Dashboard -->
        <li class="nav-item">
          <a href="index.php" class="nav-link <?= !isset($_GET['page']) ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- Menu Siswa (dengan submenu) -->
        <li class="nav-item <?= in_array($_GET['page'] ?? '', ['siswa', 'tambah-siswa']) ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= in_array($_GET['page'] ?? '', ['siswa', 'tambah-siswa']) ? 'active' : '' ?>">
            <i class="nav-icon fas fa-user-graduate"></i>
            <p>
              Siswa
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?page=siswa" class="nav-link <?= ($_GET['page'] ?? '') === 'siswa' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Siswa</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?page=tambah-siswa" class="nav-link <?= ($_GET['page'] ?? '') === 'tambah-siswa' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Siswa</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Tambah Transaksi -->
        <li class="nav-item">
          <a href="index.php?page=tambah" class="nav-link <?= ($_GET['page'] ?? '') === 'tambah' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-money-check-alt"></i>
            <p>Tambah Transaksi</p>
          </a>
        </li>

        <!-- Laporan -->
        <li class="nav-item">
          <a href="index.php?page=laporan" class="nav-link <?= ($_GET['page'] ?? '') === 'laporan' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>Laporan</p>
          </a>
        </li>

        <!-- Tambah User (khusus admin) -->
        <?php if ($_SESSION['user']['role'] === 'admin'): ?>
          <li class="nav-item">
            <a href="index.php?page=tambah-user" class="nav-link <?= ($_GET['page'] ?? '') === 'tambah-user' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>Tambah User</p>
            </a>
          </li>
        <?php endif; ?>

        <!-- Logout -->
        <li class="nav-item">
          <a href="logout.php" class="nav-link text-danger">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
