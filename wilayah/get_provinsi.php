<?php 

include '../auth/config.php';

$sql = "SELECT * FROM provinsi";
$query = $link->query($sql);
$data = array();
while($row = $query->fetch_array(MYSQLI_ASSOC)){
$data[] = array("id_prov" => $row['id_prov'], "nama" => $row['nama']);
}
echo json_encode($data);

 ?>