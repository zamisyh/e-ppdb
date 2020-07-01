<?php 

	include '../auth/config.php';
	$id_prov = $_GET['id_prov'];
	$sql = "SELECT * FROM kabupaten WHERE `id_prov` = '$id_prov'";
	$query = $link->query($sql);
	$data = array();
	while($row = $query->fetch_array(MYSQLI_ASSOC)){
	$data[] = array("id_kab" => $row['id_kab'], "nama" => $row['nama']);
	}
	echo json_encode($data);

 ?>