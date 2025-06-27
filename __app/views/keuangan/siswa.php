<h2>Data Siswa</h2>
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>NISN</th>
      <th>Nama</th>
      <th>Kelas</th>
      <th>Sektor</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $result = $koneksi->query("SELECT * FROM siswa");
    while ($row = $result->fetch_assoc()) {
      echo "<tr>
              <td>{$row['nisn']}</td>
              <td>{$row['nama']}</td>
              <td>{$row['kelas']}</td>
              <td>{$row['sektor']}</td>
            </tr>";
    }
    ?>
  </tbody>
</table>
