<?php 
	
	require_once 'auth/config.php';

 ?>
<!DOCTYPE html>
<html lang="en">	
<head>	
	<title>PPDB Online - Status</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="description" content="" />
	<meta name="keywords" content="PPDB Online, PPDB SMK" />
	<meta name="author" content="Zamzam Saputra - itszami.my.id" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" href="https://files.itszami.my.id/files/5e9de3ec54a74.jpg" />
	<link href='http://fonts.googleapis.com/css?family=Quicksand:400,700%7CPT+Serif:400,700' rel='stylesheet' type='text/css'>  
	<!-- Required Fremwork -->
	<link rel="stylesheet" type="text/css" href="files\bower_components\bootstrap\css\bootstrap.min.css">
	<!-- themify-icons line icon -->
	<link rel="stylesheet" type="text/css" href="files\assets\icon\themify-icons\themify-icons.css">
	<!-- ico font -->
	<link rel="stylesheet" type="text/css" href="files\assets\icon\icofont\css\icofont.css">
	<!-- feather Awesome -->
	<link rel="stylesheet" type="text/css" href="files\assets\icon\feather\css\feather.css">
	<!-- Datatables -->
	<link rel="stylesheet" type="text/css" href="files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css">
	<!-- Style.css -->
	<link rel="stylesheet" type="text/css" href="files\assets\css\style.css">
	<link rel="stylesheet" type="text/css" href="files\assets\css\linearicons.css">
	<link rel="stylesheet" type="text/css" href="files\assets\css\jquery.mCustomScrollbar.css">
	<style type="text/css">*{font-family: quicksand;}</style>
</head>
<body>


<div class="page-body">
	<div class="container">
		<div class="row">
			<div class="col-lg-12" style="margin-top: 10px;">
				<div class="card p-20 z-depth-4 waves-effect" data-toggle="tooltip" data-placement="top" title="Judul Dan Informasi" style="box-shadow: 7px 7px 20px">
					<div class="card-body">
						<h4>Selamat Datang di PPDB SMK Negeri 5 Kota Bekasi</h4>
						<p>Apabila anda sudah melakukan pendaftaran anda bisa cari status anda
						berdasarkan <b>Kode Pendaftaran</b> dan anda bisa cek Status peserta yang lolos dan tidak lolos, klik tombol "Cek Status"</p>
						
						<button class="btn btn-primary btn-round" data-toggle="modal" data-target="#alurPpdb">Alur PPDB</button>
						<button class="btn btn-success btn-round" data-toggle="modal" data-target="#brosurPpdb">Download Brosur</button>
						<a href="javascript:window.history.go(-1);" class="btn btn-danger btn-round">Back</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card p-20 z-depth-4 waves-effect" data-toggle="tooltip" data-placement="top" title="Table siswa yang lolos seleksi" style="box-shadow: 7px 7px 20px">
					<div class="card-header">
						<h5>Peserta Lolos Seleksi</h5>
                        <span>Berikut ini adalah data peserta (siswa) yang telah lolos seleksi</span>
					</div>
					<div class="card-block">
						<div class="dt-responsive table-responsive">
							<table id="pesertaLolos" class="table table-striped table-bordered nowrap">
								<thead class="bg-dark">
									<tr>
										<th>No</th>
										<th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>TTL</th>
                                        <th>Asal Sekolah</th>
                                       	<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php 

										$no = 1;
										$querySelect = mysqli_query($link, "SELECT * FROM data_pendaftar JOIN data_asal_sekolah ON data_pendaftar.id_pendaftar = data_asal_sekolah.id_siswa JOIN status_pendaftaran ON data_pendaftar.id_pendaftar = status_pendaftaran.id_siswa WHERE status = 'lolos'");
										while ($rowDataSelect = mysqli_fetch_array($querySelect)) {

									 ?>
									<tr>
										<td><?= $no; ?></td>
										<td><?= ucwords(strtolower($rowDataSelect['nama_lengkap'])) ?></td>
                                        <td>
                                        	<?php 
                                        		if ($rowDataSelect['jenis_kelamin'] === "L") {
                                        			echo "Laki-laki";
                                        		}else{
                                        			echo "Perempuan";
                                        		}
                                        	 ?>
                                        </td>
                                        <td><?= $rowDataSelect['tempat_lahir'] ?>, <?= date('d F Y', strtotime($rowDataSelect['tanggal_lahir'])) ?></td>
                                        <td><?= ucwords(strtolower($rowDataSelect['nama_sekolah'])) ?></td>
                                        <td><?= ucwords(strtolower($rowDataSelect['status'])) ?></td>
									</tr>
									<?php $no++; ?>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card p-20 z-depth-4 waves-effect" data-toggle="tooltip" data-placement="top" title="Table siswa yang tidak lolos seleksi" style="box-shadow: 7px 7px 20px">
					<div class="card-header">
						<h5>Peserta Tidak Lolos Seleksi</h5>
                        <span>Berikut ini adalah data peserta (siswa) yang tidak lolos seleksi</span>
					</div>
					<div class="card-block">
						<div class="dt-responsive table-responsive">
							<table id="pesertaTidakLolos" class="table table-striped table-bordered nowrap">
								<thead class="bg-dark">
									<tr>
										<th>No</th>
										<th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>TTL</th>
                                        <th>Asal Sekolah</th>
                                       	<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$no = 1;
										$querySelectTidakLolos = mysqli_query($link, "SELECT * FROM data_pendaftar JOIN data_asal_sekolah ON data_pendaftar.id_pendaftar = data_asal_sekolah.id_siswa JOIN status_pendaftaran ON data_pendaftar.id_pendaftar = status_pendaftaran.id_siswa WHERE status = 'tidak_lolos'");
										while ($rowDataSelectTidakLolos = mysqli_fetch_array($querySelectTidakLolos)) {
											
									 ?>
									<tr>
										<td><?= $no; ?></td>
										<td><?= ucwords(strtolower($rowDataSelectTidakLolos['nama_lengkap'])) ?></td>
                                        <td>
                                        	<?php 
                                        		if ($rowDataSelectTidakLolos['jenis_kelamin'] == "L") {
                                        			echo "Laki-laki";
                                        		}else{
                                        			echo "Perempuan";
                                        		}
                                        	 ?>
                                        </td>
                                        <td><?= ucwords(strtolower($rowDataSelectTidakLolos['tempat_lahir'])) ?>, <?= date('d F Y', strtotime($rowDataSelectTidakLolos['tanggal_lahir'])) ?></td>
                                        <td><?= ucwords(strtolower($rowDataSelectTidakLolos['nama_sekolah'])) ?></td>
                                       	<td><?= ucwords(strtolower('tidak lolos')) ?></td>
									</tr>
									<?php $no++; ?>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="text-center p-10">
         	<b>Copyright &copy; 2020 by <a href="https://www.itszami.my.id">Zamzam Saputra</a></b>
         </div>
	</div>
</div>

<?php 
	
	$queryBrosur = mysqli_query($link, "SELECT gambar FROM uploads WHERE type = 'brosur' ORDER BY id DESC LIMIT 1");
	$getBrosur = mysqli_fetch_array($queryBrosur);

 ?>

<!-- Modal Brosur --> 
<div class="modal fade" id="brosurPpdb" tabindex="-1" role="dialog" aria-labelledby="brosurPpdbLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="brosurPpdbLabel">Brosur PPDB</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
      	<div class="form-group">
      		<img src="gambar/<?= $getBrosur['gambar'] ?>" style="height: 312px; width: 100%;">
      	</div>
      	<div class="form-group text-center">
      		<h4>
      			<a href="gambar/brosur">Download</a> | <a href="#" onclick="bagikanBrosur()">Bagikan</a>
      		</h4>
      		<div class="form-group">
      			<p id="bagikanRest"></p>
      		</div>
      	</div>
      </div>
       <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Close</button>
            
        </div>
</div>
</div>
</div>

<?php 

	$queryAlur = mysqli_query($link, "SELECT * FROM uploads WHERE type = 'alur' ORDER BY id DESC LIMIT 1");
	$getAlur = mysqli_fetch_array($queryAlur);

 ?>

<!-- Modal Alur --> 
<div class="modal fade" id="alurPpdb" tabindex="-1" role="dialog" aria-labelledby="brosurPpdbLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="brosurPpdbLabel">Alur PPDB</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
      	<div class="form-group">
      		<img src="gambar/<?= $getAlur['gambar'] ?>" style="height: 312px; width: 100%;">
      	</div>
      	<div class="form-group text-center">
      		<p><a href="gambar/alur">Download</a> | <a href="#" onclick="bagikanAlur()">Bagikan</a></p>
      		<p id="bagikanRestAlur"></p>
      	</div>
      	<div class="form-group">
      		<p><?= $getAlur['deskripsi'] ?></p>
      	</div>
      </div>
       <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Close</button>
            
        </div>
</div>
</div>
</div>

<!-- Required Jquery -->
<script type="text/javascript" src="files\bower_components\jquery\js\jquery.min.js"></script>
<script type="text/javascript" src="files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
<script type="text/javascript" src="files\bower_components\popper.js\js\popper.min.js"></script>
<script type="text/javascript" src="files\bower_components\bootstrap\js\bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="files\bower_components\modernizr\js\modernizr.js"></script>
<script type="text/javascript" src="files\bower_components\modernizr\js\css-scrollbars.js"></script>
<!-- data-table js -->
<script type="text/javascript" src="files\bower_components\datatables\jquery.dataTables.min.js"></script>
<script type="text/javascript" src="files\bower_components\datatables\dataTables.bootstrap4.min.js"></script>
<!-- SweetAlert -->
<script type="text/javascript" src="files/bower_components/sweetalert/js/sweetalert2.js"></script>
<!-- i18next.min.js -->
<script type="text/javascript" src="files\bower_components\i18next\js\i18next.min.js"></script>
<script type="text/javascript" src="files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="files\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="files\bower_components\jquery-i18next\js\jquery-i18next.min.js"></script>
<!-- Custom js -->



<!-- Scripts -->
<script>
	$(document).ready(function() {
    	$('#pesertaLolos').DataTable();
	} );
	$(document).ready(function() {
    	$('#pesertaTidakLolos').DataTable();
	} );
</script>

<script type="text/javascript">
	function bagikanBrosur(){
		var url = 'https://ppdb.itszami.my.id/gambar/<?= $getBrosur['gambar'] ?>';
		document.getElementById('bagikanRest').innerHTML=url;
	}
</script>
<script type="text/javascript">
	function bagikanAlur(){
		var url = 'https://ppdb.itszami.my.id/gambar/<?= $getAlur['gambar'] ?>';
		document.getElementById('bagikanRestAlur').innerHTML=url;
	}
</script>


</body>
</html>