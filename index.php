	<script type="text/javascript" src="files/bower_components/sweetalert1/sweetalert.min.js"></script>
	<?php 
	
	session_start();
	error_reporting(0);
	include 'auth/config.php';
	


	

	





 ?>
<!DOCTYPE html>
<html lang="en">	
<head>	
	<title>PPDB Online - SMKN 5 Kota Bekasi</title>
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
   
     <!-- Date-time picker css -->
    <link rel="stylesheet" type="text/css" href="files\assets\pages\advance-elements\css\bootstrap-datetimepicker.css">
    <!-- Date-range picker css  -->
    <link rel="stylesheet" type="text/css" href="files\bower_components\bootstrap-daterangepicker\css\daterangepicker.css">
    <!-- Date-Dropper css -->
    <link rel="stylesheet" type="text/css" href="files\bower_components\datedropper\css\datedropper.min.css">
    <!-- Color Picker css -->
    <link rel="stylesheet" type="text/css" href="files\bower_components\spectrum\css\spectrum.css">
    <!-- Mini-color css -->
    <link rel="stylesheet" type="text/css" href="files\bower_components\jquery-minicolors\css\jquery.minicolors.css">

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
						<a href="peserta/register" class="btn btn-info btn-round">Daftar</a>
						<a href="status" class="btn btn-danger btn-round">Cek Status</a>
					</div>
				</div>
			</div>
		</div>
		<div class="card p-20 z-depth-4 waves-effect" data-toggle="tooltip" data-placement="top" title="Pencarian Pendaftar Berdasarkan Kode Pendaftaran" style="box-shadow: 7px 7px 20px">
			<div class="card-header">
				<h5>Cari berdasarkan Nomor Pendaftaran</h5>
				<span>Yuk cek status pendaftaran anda sekarang juga, dengan memasukkan Nomor Pendaftaran</span>
			</div>
			<div class="card-body">
				<div class="row seacrh-header" style="margin-top: -30px">
		            <div class="col-lg-12 col-xs-12">
		               	<form action="" method="get">
						   <div class="input-group input-group-button input-group-primary">
		                    	<input type="text" class="form-control" name="code" placeholder="Search here.." required="">
		                    	<button type="submit" class="btn btn-primary input-group-addon" id="basic-addon1">Search</button>
		                    </div><br>
						</form>
						<div class="form-group">
							<?php 



								if (isset($_GET['code']) === true) {

									$dataSearch = htmlentities(strip_tags(trim($_GET['code'])));

									$check = mysqli_query($link, "SELECT * FROM data_pendaftar WHERE kode_pendaftar = '$dataSearch'");
									$checkCode = mysqli_fetch_array($check);

									
									if ($dataSearch !== $checkCode['kode_pendaftar']) {
										echo "<script type='text/javascript'>
							            setTimeout(function () {  
							                swal({
							                    icon: 'error',
							                    closeOnClickOutside: false,
							                    closeOnEsc: false,
							                    dangerMode: true,
							                    className: 'red-bg',
							                    buttons: false,
							                    title: 'Ooopss, Error',
							                    text:  'Kode Pendaftaran tidak ditemukan',
							                    type: 'error',
							                    timer: 3000,
							                    showConfirmButton: false
							                    });  
							                    },10); 
							                    window.setTimeout(function(){ 
							                     window.location.replace('index');
							                     } ,3000); 
							            </script>";
										return false;
									}

									$dataQuery = mysqli_query($link, "SELECT * FROM data_pendaftar JOIN data_asal_sekolah ON data_pendaftar.id_pendaftar=data_asal_sekolah.id_siswa JOIN status_pendaftaran ON data_pendaftar.id_pendaftar=status_pendaftaran.id_siswa WHERE kode_pendaftar = '$dataSearch'");
									$rowDataSearch = mysqli_fetch_array($dataQuery);
									

							 ?>

							 <div class="dt-responsive table-responsive">
								<table class="table table-striped table-bordered nowrap">
									<thead class="bg-dark">
										<tr>
											<th>Nama</th>
											<th>Jenis Kelamin</th>
											<th>TTL</th>
											<th>Asal Sekolah</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?= ucwords(strtolower($rowDataSearch['nama_lengkap'])) ?></td>
											<td><?php 
							          			if($rowDataSearch['jenis_kelamin'] === 'L'){
							          				echo 'Laki-Laki';
							          			}else{
							          				echo 'Perempuan';
							          			}
							          			?>
							          		</td>
											<td><?= $rowDataSearch['tempat_lahir'] ?>, <?= date('d F Y', strtotime($rowDataSearch['tanggal_lahir'])) ?></td>
											<td><?= ucwords(strtolower($rowDataSearch['nama_sekolah'])) ?></td>
											<td>
												<a href="" class="btn btn-success btn-sm btn-round" data-toggle="modal" data-target="#detailSearch<?= $rowDataSearch['kode_pendaftar'] ?> ">Detail</a>
											</td>
										</tr>
									</tbody>
							 	</table>
							 </div>

							<?php } ?>

						</div>
		           		<div class="form-group">
		           			<?php if (isset($_SESSION['kode_pendaftar'])): ?>
		                		<p><b>Kode Pendaftaran</b> anda adalah : <?= $_SESSION['kode_pendaftar']; ?><br>
		                	</p>
		                	<?php endif ?>
		                	<?php if (isset($_GET['code'])): ?>
		                			Copy dan simpan link pendafaran anda : <a href="#" onclick="btnDetail()">Copy Link</a>
		                		<?php endif ?>
		           		</div>
		   
		            </div>
		        </div>      
			</div>
		</div>                                   
		<div class="row">
			<div class="col-sm-12">
				<div class="card p-20 z-depth-4 waves-effect" data-toggle="tooltip" data-placement="top" title="Table siswa yang baru daftar" style="box-shadow: 7px 7px 20px">
					<div class="card-header">
						<h5>Peserta Terdaftar</h5>
                        <span>Berikut ini adalah data peserta (siswa) yang telah berhasil mendaftarkan dirinya</span>
					</div>
					<div class="card-block">
						<div class="dt-responsive table-responsive">
							<table id="dataPesertaTerdaftar" class="table table-striped table-bordered nowrap">
								<thead class="bg-dark">
									<tr>
										<th>No</th>
										<th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>TTL</th>
                                        <th>Asal Sekolah</th>
									</tr>
								</thead>
								<tbody>
									<?php 

										$no = 1;
										$querySelect = $link->query('SELECT * FROM data_pendaftar JOIN data_asal_sekolah ON data_pendaftar.id_pendaftar=data_asal_sekolah.id_siswa ORDER BY id_pendaftar DESC');
										foreach ($querySelect as $key => $value) {
										
									 ?>
									<tr>
										<td><?= $no; ?></td>
										<td><?= ucwords(strtolower($value['nama_lengkap'])) ?></td>
                                        <td>
                                        	<?php 
                                        		if ($value['jenis_kelamin'] === "L") {
                                        			echo "Laki-laki";
                                        		}else{
                                        			echo "Perempuan";
                                        		}
                                        	 ?>
                                        </td>
                                        <td><?= $value['tempat_lahir'] ?>, <?= date('d F Y', strtotime($value['tanggal_lahir'])) ?></td>
                                        <td><?= ucwords(strtolower($value['nama_sekolah'])) ?></td>
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

<!-- Modal Detail Search -->
<?php if (isset($_GET['code'])): ?>
	 <div class="modal fade" id="detailSearch<?= $rowDataSearch['kode_pendaftar'] ?>" tabindex="-1" role="dialog" aria-labelledby="detailAndEditLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="detailAndEditLabel">Detail - <?= $rowDataSearch['nama_lengkap'] ?> (<?= $rowDataSearch['kode_pendaftar'] ?>)</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
      	<div class="form-group">
      		<label for="nama_sekolah">Nama Asal Sekolah</label>
      		<input type="text" class="form-control" readonly="" value="<?= ucwords(strtolower($rowDataSearch['nama_sekolah'])) ?>">
      	</div>
      	<div class="form-group">
      		<label for="alamat_sekolah">Alamat Asal Sekolah</label>
      		<textarea class="form-control" readonly="" rows="3"><?= $rowDataSearch['alamat_sekolah'] ?></textarea>
      	</div>
      	<div class="form-group">
      		<label for="no_telp">No Telepon</label>
      		<input type="text" class="form-control" readonly="" value="<?= $rowDataSearch['no_telp'] ?>">
      	</div>
      	<div class="form-group">
      		<label for="email">Email</label>
      		<input type="text" class="form-control" readonly="" value="<?= $rowDataSearch['email'] ?>">
      	</div>
      	<div class="form-group">
      		<label for="status_pendaftaran">Status Pendaftaran</label>
      		<?php if ($rowDataSearch['status'] === "pengecekan"): ?>
      			<div class="alert alert-warning background-warning">
      				Pengecekan
      			</div>
      		<?php endif ?>
      		<?php if ($rowDataSearch['status'] === "tidak_lolos"): ?>
      			<div class="alert alert-danger background-danger">
      				Tidak Lolos
      			</div>
      		<?php endif ?>
      		<?php if ($rowDataSearch['status'] === "lolos"): ?>
      			<div class="alert alert-success background-success">
      				Lolos
      			</div>
      		<?php endif ?>
      		<?php if ($rowDataSearch['status'] === "tidak_valid"): ?>
      			<div class="alert alert-danger background-danger">
      				Tidak Valid
      			</div>
      		<?php endif ?>
      		<?php if ($rowDataSearch['status'] === "verifikasi"): ?>
      			<div class="alert alert-info background-info">
      				Verifikasi
      			</div>
      		<?php endif ?>
      	</div>
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Close</button>
            
        </div>
    </form>
</div>
</div>
</div>
<?php endif ?>


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
      			<a href="gambar/brosur" onl>Download</a> | <a href="#" onclick="bagikanBrosur()">Bagikan</a>
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

<!-- Modal Brosur --> 
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
<!-- Bootstrap date-time-picker js -->
<script type="text/javascript" src="files\assets\pages\advance-elements\moment-with-locales.min.js"></script>
<script type="text/javascript" src="files\bower_components\bootstrap-datepicker\js\bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="files\assets\pages\advance-elements\bootstrap-datetimepicker.min.js"></script>
    <!-- Date-range picker js -->
<script type="text/javascript" src="files\bower_components\bootstrap-daterangepicker\js\daterangepicker.js"></script>
    <!-- Date-dropper js -->
<script type="text/javascript" src="files\bower_components\datedropper\js\datedropper.min.js"></script>
    <!-- Color picker js -->
<script type="text/javascript" src="files\bower_components\spectrum\js\spectrum.js"></script>
<script type="text/javascript" src="files\bower_components\jscolor\js\jscolor.js"></script>
    <!-- Mini-color js -->
<script type="text/javascript" src="files\bower_components\jquery-minicolors\js\jquery.minicolors.min.js"></script>
<script type="text/javascript" src="files\assets\pages\advance-elements\custom-picker.js"></script>
<!-- SweetAlert -->
<script type="text/javascript" src="files/bower_components/sweetalert/js/sweetalert2.js"></script>
<!-- Accordion js -->
<script type="text/javascript" src="files\assets\pages\accordion\accordion.js"></script>
<script type="text/javascript" src="files/bower_components/bootstrap-validate/bootstrap-validate.js"></script>
<!-- i18next.min.js -->

<script>
	function btnDetail(){
		Swal.fire({
		  text: 'https://ppdb.itszami.my.id/?code=<?= $rowDataSearch['kode_pendaftar'] ?>',
		  showConfirmButton: false,
		})
	}
</script>
<script>
	$(document).ready(function() {
    	$('#dataPesertaTerdaftar').DataTable();
	} );
</script>

<!-- Ajax -->
<script type="text/javascript" src="src/files/ajax/scriptAjax.js"></script>

<!-- Get Wilayah -->
<script type="text/javascript" src="wilayah/scriptWilayah.js"></script>

<!-- Validate -->
<script type="text/javascript" src="src/files/bootstrapValidateIndex/validateFormIndex.js"></script>
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