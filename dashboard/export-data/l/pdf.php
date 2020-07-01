<?php 

//Get Connection DB

session_start();
if (!$_SESSION['role']) {
	header("Location: ../../index");
}
include '../../../auth/config.php';
date_default_timezone_set("Asia/Jakarta");


require_once '../../../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$tableData = '<!DOCTYPE html>
<html>
<head>
	<title>Daftar Temuan</title>
	<style type="text/css">
		body{
			font-family: arial;
		}

		tr:nth-child(even){
			background-color: #F0E68C;
		}

		th{
			background-color: #3CB371;
		}

		catatanTh{
			width: 20%;
		}

		catatanTd{
			width: 20%;
		}
		footerDps{
			margin-top: 50px;
			text-align: center;

		}
	</style>
</head>
<body>
	<h1 style="text-align: center;">Laporan Data Peserta Lolos</h1>
	<table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
	            <th>No</th>
	            <th>Nama Lengkap</th>
	            <th>Jenis Kelamin</th>
	            <th>Tempat Lahir</th>
	            <th>Tanggal Lahir</th>
	            <th>Agama</th>
	            <th>Asal Sekolah</th>
            </tr>
         </thead>';

         $no = 1;
         $resultData = mysqli_query($link, "SELECT * FROM data_pendaftar INNER JOIN data_asal_sekolah ON data_pendaftar.id_pendaftar = data_asal_sekolah.id_siswa INNER JOIN status_pendaftaran ON data_pendaftar.id_pendaftar = status_pendaftaran.id_siswa WHERE status = 'lolos'");
         while ($rowData = mysqli_fetch_array($resultData)) {
         	$tableData .= '<tr>
         		<td>'. $no++ .'</td>
         		<td>'. $rowData["nama_lengkap"] .'</td>
         		<td>'. $rowData["jenis_kelamin"] .'</td>
         		<td>'. $rowData["tempat_lahir"] .'</td>
         		<td>'. date('d F Y', strtotime($rowData["tanggal_lahir"])) .'</td>
         		<td>'. $rowData["agama"] .'</td>
         		<td>'. $rowData["nama_sekolah"] .'</td>
         	</tr>';
         }
        
    $tableData .= '</table>
    <p style="text-align: center;">ppdb.itszami.my.id<p>
</body>
</html>';


$mpdf->WriteHTML($tableData);
$mpdf->Output('data-peserta-lolos.pdf', \Mpdf\Output\Destination::INLINE);







?>



