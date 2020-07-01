<?php 
	
	
	include '../auth/config.php';

	$queryBrosur = mysqli_query($link, "SELECT gambar FROM uploads WHERE type = 'brosur' ORDER BY id DESC LIMIT 1");
	$getBrosur = mysqli_fetch_array($queryBrosur);


	$gambar = $getBrosur['gambar'];


	header("Content-Disposition: attachment; filename=$gambar");
	header("Content-Type: application/octet-stream");
	ob_clean();

	readfile($gambar);

	header("Location : ../");



 ?>