<?php
require '__vendor/autoload.php';
require '__app/models/KeuanganModel.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$model = new KeuanganModel();
$data = $model->getLaporan();

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->fromArray(['ID', 'Nama', 'Jenis', 'Tanggal', 'Nominal', 'Keterangan'], NULL, 'A1');

$row = 2;
while ($d = $data->fetch_assoc()) {
    $sheet->fromArray([
        $d['id'], $d['nama'], $d['nama_jenis'], $d['tanggal'], $d['nominal'], $d['keterangan']
    ], NULL, "A$row");
    $row++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="laporan_keuangan.xlsx"');
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;

