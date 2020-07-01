<?php 
	

	//Query Count Peserta Terdaftar
	$queryPesertaTerdaftar = mysqli_query($link, "SELECT * FROM data_pendaftar");
	$arrPesertaTerdaftar = array();
	while (( $rowPesertaTerdaftar = mysqli_fetch_array($queryPesertaTerdaftar)) !== null) {
		$arrPesertaTerdaftar[] = $rowPesertaTerdaftar;
	}

	$countPesertaTerdaftar = count($arrPesertaTerdaftar);

	//Query Count Pengecekan
	$queryPengecekan = mysqli_query($link, "SELECT * FROM status_pendaftaran WHERE status = 'pengecekan'");
	$arrPengecekan = array();
	while ($rowPengecekan = mysqli_fetch_array($queryPengecekan) !== null) {
		$arrPengecekan[] = $rowPengecekan;
	}

	$countPengecekan = count($arrPengecekan);

	//Query Count Peserta Lolos
	$queryLolos = mysqli_query($link, "SELECT * FROM status_pendaftaran WHERE status = 'lolos'");
	$arrLolos = array();
	while ($rowLolos = mysqli_fetch_array($queryLolos) !== null) {
		$arrLolos[] = $rowLolos;
	}

	$countLolos = count($arrLolos);

	//Query Count Pengecekan
	$queryTidakLolos = mysqli_query($link, "SELECT * FROM status_pendaftaran WHERE status = 'tidak_lolos'");
	$arrTidakLolos = array();
	while ($rowTidakLolos = mysqli_fetch_array($queryTidakLolos) !== null) {
		$arrTidakLolos[] = $rowTidakLolos;
	}

	$countTidakLolos = count($arrTidakLolos);


 ?>