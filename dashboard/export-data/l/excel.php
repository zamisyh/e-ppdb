<?php 

    //Get Connection DB
date_default_timezone_set("Asia/Jakarta");
include '../../../auth/config.php';
require '../../../spreadsheet/autoload.php';
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

$helper = new Sample();
if ($helper->isCli()) {
    $helper->log('This example should only be run from a Web Browser' . PHP_EOL);

    return;
}


$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Kode Pendaftar');
$sheet->setCellValue('C1', 'Nama Lengkap');
$sheet->setCellValue('D1', 'Jenis Kelamin');
$sheet->setCellValue('E1', 'Tempat Lahir');
$sheet->setCellValue('F1', 'Tanggal Lahir');
$sheet->setCellValue('G1', 'Agama');
$sheet->setCellValue('H1', 'Asal Sekolah');


$query = mysqli_query($link,"SELECT * FROM data_pendaftar INNER JOIN data_asal_sekolah ON data_pendaftar.id_pendaftar = data_asal_sekolah.id_siswa INNER JOIN status_pendaftaran ON data_pendaftar.id_pendaftar = status_pendaftaran.id_siswa WHERE status = 'lolos'");
$i = 2;
$no = 1;
while($row = mysqli_fetch_array($query))
{
    $sheet->setCellValue('A'.$i, $no++);
    $sheet->setCellValue('B'.$i, $row['kode_pendaftar']);
    $sheet->setCellValue('C'.$i, $row['nama_lengkap']);
    $sheet->setCellValue('D'.$i, $row['jenis_kelamin']);
    $sheet->setCellValue('E'.$i, $row['tempat_lahir']); 
    $sheet->setCellValue('F'.$i, date('d F Y', strtotime($row['tanggal_lahir']))); 
    $sheet->setCellValue('G'.$i, $row['agama']);
    $sheet->setCellValue('H'.$i, $row['nama_sekolah']);           
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
$sheet->getStyle('A1:I'.$i)->applyFromArray($styleArray);


// Rename worksheet
$spreadsheet->getActiveSheet()->setTitle('Data Peserta Lolos');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$spreadsheet->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Laporan_Data_Peserta_Lolos.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;



?>
