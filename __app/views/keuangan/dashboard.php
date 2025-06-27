<?php include '__template/header.php'; ?>
<?php include '__template/sidebar.php'; ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
  <!-- Page Header -->
  <div class="content-header">
    <div class="container-fluid">
      <h1 class="m-0 text-dark">Dashboard Keuangan</h1>
    </div>
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <!-- ROW: Kartu Saldo -->
      <div class="row">
        <!-- Saldo SPP -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>Rp <?= number_format($data['SPP'] ?? 0) ?></h3>
              <p>Saldo SPP</p>
            </div>
            <div class="icon"><i class="fas fa-wallet"></i></div>
          </div>
        </div>

        <!-- Saldo Infaq -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3>Rp <?= number_format($data['infaq'] ?? 0) ?></h3>
              <p>Saldo Infaq</p>
            </div>
            <div class="icon"><i class="fas fa-hand-holding-usd"></i></div>
          </div>
        </div>

        <!-- Saldo Lainnya -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>Rp <?= number_format($data['lainnya'] ?? 0) ?></h3>
              <p>Saldo Lainnya</p>
            </div>
            <div class="icon"><i class="fas fa-coins"></i></div>
          </div>
        </div>

        <!-- Total -->
        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>Rp <?= number_format(array_sum($data)) ?></h3>
              <p>Total Seluruh</p>
            </div>
            <div class="icon"><i class="fas fa-chart-pie"></i></div>
          </div>
        </div>
      </div>

      <!-- ROW: Grafik -->
      <div class="row mt-4">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-primary text-white">
              <h3 class="card-title">Grafik Pemasukan</h3>
            </div>
            <div class="card-body">
              <canvas id="grafikKeuangan" height="100"></canvas>
            </div>
          </div>
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>
</div>

<!-- Script Chart.js -->
<script>
  const ctx = document.getElementById('grafikKeuangan').getContext('2d');
  const chart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['SPP', 'Infaq', 'Lainnya'],
      datasets: [{
        label: 'Jumlah Pemasukan (Rp)',
        data: [
          <?= $data['SPP'] ?? 0 ?>,
          <?= $data['infaq'] ?? 0 ?>,
          <?= $data['lainnya'] ?? 0 ?>
        ],
        backgroundColor: [
          'rgba(23, 162, 184, 0.7)',
          'rgba(40, 167, 69, 0.7)',
          'rgba(255, 193, 7, 0.7)'
        ],
        borderColor: [
          'rgba(23, 162, 184, 1)',
          'rgba(40, 167, 69, 1)',
          'rgba(255, 193, 7, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false },
        tooltip: {
          callbacks: {
            label: function(context) {
              return 'Rp ' + context.raw.toLocaleString('id-ID');
            }
          }
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            callback: function(value) {
              return 'Rp ' + value.toLocaleString('id-ID');
            }
          }
        }
      }
    }
  });
</script>

<?php include '__template/footer.php'; ?>
