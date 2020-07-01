<?php 

	include '../auth/config.php';
	$id_kec = $_GET['id_kec'];
	$sql = "SELECT * FROM kelurahan WHERE `id_kec` = '$id_kec'";
	$query = $link->query($sql);
	$data = array();
	while($row = $query->fetch_array(MYSQLI_ASSOC)){
	$data[] = array("id_kel" => $row['id_kel'], "nama" => $row['nama']);
	}
	echo json_encode($data);

 ?>