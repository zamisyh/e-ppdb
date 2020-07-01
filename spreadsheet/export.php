<?php 

    //Get Connection DB
date_default_timezone_set("Asia/Jakarta");
include '../inc/auth/config.php';
include '../inc/auth/sessions.php';

require 'autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Nama Client');
$sheet->setCellValue('C1', 'Tanggal Pengisina');
$sheet->setCellValue('D1', 'Divisi');
$sheet->setCellValue('E1', 'Nama Temuan');
$sheet->setCellValue('F1', 'Batas Waktu');
$sheet->setCellValue('G1', 'Laporan');
$sheet->setCellValue('H1', 'Status Pengerjaan');
$sheet->setCellValue('I1', 'Catatan');


$query = mysqli_query($link,"SELECT * FROM temuan");
$i = 2;
$no = 1;
while($row = mysqli_fetch_array($query))
{
    $sheet->setCellValue('A'.$i, $no++);
    $sheet->setCellValue('B'.$i, $row['nama_client']);
    $sheet->setCellValue('C'.$i, $row['tanggal_pengisian']);
    $sheet->setCellValue('D'.$i, $row['divisi']);   
    $sheet->setCellValue('E'.$i, $row['nama_temuan']);
    $sheet->setCellValue('F'.$i, $row['batas_waktu']);
    $sheet->setCellValue('G'.$i, $row['laporan']); 
    $sheet->setCellValue('H'.$i, $row['status_pengerjaan']);
    $sheet->setCellValue('I'.$i, $row['catatan']);              
    $i++;
}
 
$styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
$i = $i - 1;
$sheet->getStyle('A1:D'.$i)->applyFromArray($styleArray);
 
 
$writer = new Xlsx($spreadsheet);
$writer->save('Report Data Temuan.xlsx');



?>
