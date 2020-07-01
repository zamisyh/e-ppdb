<?php 

	if (isset($_POST['btnUpload']) === true) {

		$namaFile = $_FILES['gambar']['name'];
		$ukuranFile = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tmpName = $_FILES['gambar']['tmp_name'];

		$ektensiFile = ['jpeg', 'jpg', 'png'];
		$ektensiFiles = explode('.', $namaFile);
		$ektensiFiles = strtolower(end($ektensiFiles));

		if (!in_array($ektensiFiles, $ektensiFile)) {
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

		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ektensiFiles;

		$id_admin = $_SESSION['id_admin'];
		$type = 'brosur';

		$saveData = mysqli_query($link, "INSERT INTO uploads (id, id_admin, gambar, deskripsi, type) VALUES ('', '$id_admin', '$namaFileBaru', '-', '$type')");

		move_uploaded_file($tmpName, '../../gambar/'.$namaFileBaru);

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
                toastr.success("Gambar berhasil diupload", "Success")
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
                toastr.error("Gambar gagal diupload", "Ooopss, error")
            });
            </script>';
            echo mysqli_error($link);
		}
	}

 ?>