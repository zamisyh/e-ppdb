<?php 

	if (isset($_POST['btnSubmit']) === true) {


		//Deskripsi
		$deskripsi = $_POST['deskripsi'];

		$namaFile = $_FILES['gambar']['name'];
		$ukuranFile = $_FILES['gambar']['size'];
		$errorFile = $_FILES['gambar']['error'];
		$tmp = $_FILES['gambar']['tmp_name'];

		$ekstensi = ['jpg', 'jpeg', 'png'];
		$ekstensiFiles = explode('.', $namaFile);
		$ekstensiFiles = strtolower(end($ekstensiFiles));

		if (!in_array($ekstensiFiles, $ekstensi)) {
			echo '<script type="text/javascript" src="..\..\files\bower_components\jquery\js\jquery.min.js"></script>';
            echo '<script>
                $(document).ready(function(){
                    toastr.options = {
                      "closeButton": true,
                      "newestOnTop": false,
                      "positionClass": "toast-top-right",
                      "hideDuration": "1000",
                      "timeOut": "6000",
                      "extendedTimeOut": "1000",
                }
                toastr.error("Gambar gagal diupload, ektensi yang anda masukkan tidak valid", "Ooopss, error")
            });
            </script>';
			return false;
		}

		$newFile = uniqid();
		$newFile .= '.';
		$newFile .= $ekstensiFiles;

		$id_admin = $_SESSION['id_admin'];
		$type = 'alur';

		$saveData = mysqli_query($link, "INSERT INTO uploads (id, id_admin, gambar, deskripsi, type) VALUES ('', '$id_admin', '$newFile', '$deskripsi', '$type')");

		move_uploaded_file($tmp, '../../gambar/'. $newFile);

		if (mysqli_affected_rows($link) > 0) {
			echo '<script type="text/javascript" src="..\..\files\bower_components\jquery\js\jquery.min.js"></script>';
            echo '<script>
                $(document).ready(function(){
                    toastr.options = {
                      "closeButton": true,
                      "newestOnTop": false,
                      "positionClass": "toast-top-right",
                      "hideDuration": "1000",
                      "timeOut": "6000",
                      "extendedTimeOut": "1000",
                }
                toastr.success("Data berhasil ditambahkan", "Success")
            });
            </script>';
		}else{
			echo '<script type="text/javascript" src="..\..\files\bower_components\jquery\js\jquery.min.js"></script>';
            echo '<script>
                $(document).ready(function(){
                    toastr.options = {
                      "closeButton": true,
                      "newestOnTop": false,
                      "positionClass": "toast-top-right",
                      "hideDuration": "1000",
                      "timeOut": "6000",
                      "extendedTimeOut": "1000",
                }
                toastr.error("Data gagal ditambahkan", "Ooopss, error")
            });
            </script>';
            
		}
	}

 ?>