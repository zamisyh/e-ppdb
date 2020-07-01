<?php 
	
	session_start();
	require_once '../../auth/config.php';
	require_once '../../auth/admins/sessionUser.php';
	require_once '../../src/dashboardFiles/navMoreScript.php';
    echo '<script type="text/javascript" src="../../files/bower_components/sweetalert1/sweetalert.min.js"></script>';

	$id_pendaftar = $_GET['id_pendaftar'];
	$querySelectId = "SELECT * FROM data_pendaftar JOIN data_asal_sekolah ON data_asal_sekolah.id_siswa = data_pendaftar.id_pendaftar JOIN data_alamat ON data_alamat.id_siswa = data_pendaftar.id_pendaftar JOIN data_jurusan ON data_jurusan.id_siswa = data_pendaftar.id_pendaftar JOIN status_pendaftaran ON status_pendaftaran.id_siswa = data_pendaftar.id_pendaftar WHERE id_pendaftar = '$id_pendaftar' ";

	$queryAll = mysqli_query($link, $querySelectId);
	$fetchId = mysqli_fetch_array($queryAll);

	//Update Status 
	if (isset($_POST['updateStatus']) === true) {
		$ubah_status = htmlspecialchars($_POST['ubah_status']);
		$name = htmlspecialchars($fetchId['nama_lengkap']);

		$queryUpdate = mysqli_query($link, "UPDATE status_pendaftaran SET status = '$ubah_status' WHERE id_siswa = '$id_pendaftar'");

		if (mysqli_affected_rows($link) > 0) {
			echo "<script type='text/javascript'>
                        setTimeout(function () {  
                            swal({
                                icon: 'success',
                                closeOnClickOutside: false,
                                closeOnEsc: false,
                                dangerMode: true,
                                className: 'red-bg',
                                buttons: false,
                                title: 'Berhasil',
                                text:  'Status $name berhasil diubah menjadi $ubah_status',
                                type: 'success',
                                timer: 3000,
                                showConfirmButton: false
                            });  
                        },10); 
                        window.setTimeout(function(){ 
                        window.location.replace('../operator');
                        } ,3000); 
                    </script>";

		}
	}
	

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Detail - <?= $fetchId['nama_lengkap'] ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="PPDB SMK Negeri 5 Kota Bekasi">
    <meta name="keywords" content="PPDB Online, PPDB SMKN5 Kota Bekasi, PPDB SMK">
    <meta name="author" content="Zamzam Saputra">
    <!-- Favicon icon -->
    <link rel="icon" href="https://files.itszami.my.id/files/5e9de3ec54a74.jpg" type="image/x-icon">
    <!-- Google font-->
    <link href="http://fonts.googleapis.com/css?family=Quicksand:400,700%7CPT+Serif:400,700" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="..\..\files\bower_components\bootstrap\css\bootstrap.min.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="..\..\files\assets\icon\feather\css\feather.css">
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css">

     <!-- Toastr -->
     <link rel="stylesheet" type="text/css" href="..\..\files\bower_components\toastr\toastr.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="..\..\files\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="..\..\files\assets\css\jquery.mCustomScrollbar.css">
    <style rel="stylesheet" type="text/css">
        *{
            font-family: quicksand;
        }
</style>
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="/">
                            <h6>PPDB - Adminstrator</h6>
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="feather icon-maximize full-screen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="feather icon-bell"></i>
                                        <span class="badge bg-c-pink">1</span>
                                    </div>
                                    <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <h6>Notifications</h6>
                                            <label class="label label-danger">New</label>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="d-flex align-self-center img-radius" src="https://files.itszami.my.id/files/5e9de3ec54a74.jpg" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">Super Admin</h5>
                                                    <p class="notification-msg">Selamat datang di dashboard PPDB <?= $_SESSION['username'] ?></p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="..\..\files\assets\images\user-profile\admin.png" class="img-radius">
                                        <span><?= $_SESSION['username']; ?></span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#settingsModal">
                                                <i class="feather icon-settings"></i> Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#profileModal">
                                                <i class="feather icon-user"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                               <a href="../logout">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Sidebar inner chat end-->
          <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">Navigation</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="../index">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu active pcoded-trigger">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                                        <span class="pcoded-mtext">Master Data</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                       <?php if ($_SESSION['role'] === 'operator'): ?>
                                            <li class="">
                                                <a href="../operator">
                                                    <span class="pcoded-mtext">Operator Check</span>
                                                </a>
                                            </li>
                                       <?php endif ?>
                                        <?php if ($_SESSION['role'] === 'verifikator'): ?>
                                            <li class="">
                                            <a href="../verifikator">
                                                <span class="pcoded-mtext">Verifikasi Check</span>
                                            </a>
                                        </li>
                                        <?php endif ?>
                                        <?php if ($_SESSION['role'] === 'admin'): ?>
                                            <li class="">
                                                <a href="">
                                                    <span class="pcoded-mtext">Peserta Terverifikasi</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="">
                                                    <span class="pcoded-mtext">Peserta Lolos</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="">
                                                    <span class="pcoded-mtext">Peserta Tidak Lolos</span>
                                                </a>
                                            </li>
                                        <?php endif ?>
                                    </ul>
                                </li>
                                <?php if ($_SESSION['role'] === 'admin'): ?>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu active pcoded-trigger">
                                        <a href="javascript:void(0)">
                                            <span class="pcoded-micon"><i class="feather icon-upload"></i></span>
                                            <span class="pcoded-mtext">Uploads</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="../alur-ppdb">
                                                    <span class="pcoded-mtext">Alur PPDB</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="../uploads/brosur-ppdb">
                                                    <span class="pcoded-mtext">Brosur PPDB</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                <?php endif ?>
                            <div class="pcoded-navigatio-lavel">More</div>
                            <div class="pcoded-item pcoded-left-item">
                               <?php if ($_SESSION['role'] === 'admin'): ?>
                                    <li class="">
                                    <a href="#" data-toggle="modal" data-target="#tambahAdminModal">
                                        <span class="pcoded-micon"><i class="feather icon-user-plus"></i></span>
                                        <span class="pcoded-mtext">Tambah Admin</span>
                                    </a>
                                </li>
                               <?php endif ?>
                                <li class="">
                                    <a href="#" data-toggle="modal" data-target="#settingsModal">
                                        <span class="pcoded-micon"><i class="feather icon-settings"></i></span>
                                        <span class="pcoded-mtext">Akun Setting</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#" data-toggle="modal" data-target="#profileModal">
                                        <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                                        <span class="pcoded-mtext">Profile</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="../logout">
                                        <span class="pcoded-micon"><i class="feather icon-log-out"></i></span>
                                        <span class="pcoded-mtext">Logout</span>
                                    </a>
                                </li>
                            </div>
                        </div>
                    </nav>

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                	<div class="col-xl-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Status Pendaftatan <?= ucwords(strtolower($fetchId['nama_lengkap'])) ?></h5>
                                                    <span class="text-muted">Berikut ini adalah status <?= ucwords(strtolower($fetchId['nama_lengkap'])) ?> Anda hanya bisa mengubah status nya saja, jika status data-data milik <?= $fetchId['nama_lengkap'] ?> itu valid, anda bisa pilih status Konfirmasi.. kalau tidak valid ubah statusnya menjadi Tidak Valid</span>
                                                    <div class="card-header-right">
                                                        <ul class="list-unstyled card-option">
                                                           	<li><i class="feather icon-maximize full-card"></i></li>
                                                            <li><i class="feather icon-minus minimize-card"></i></li>
                                                            <li><i class="feather icon-trash-2 close-card"></i></li>
                                                        </ul>
                                                	 </div>
                                                </div>
                                                <div class="card-block">
                                                	<?php if ($fetchId['status'] === 'verifikasi' OR $fetchId['status'] === "konfirmasi"): ?>
                                                        <div class="alert alert-success background-success">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <i class="icofont icofont-close-line-circled text-white"></i>
                                                                </button>
                                                                <i class="feather icon-check"></i> Data sudah ter<?= $fetchId['status'] ?> anda tidak bisa mengubah nya lagi
                                                            </div>
                                                    <?php endif ?>
                                                    <?php if ($fetchId['status'] === 'tidak_valid' OR $fetchId['status'] === 'pengecekan'): ?>
                                                        <form method="post" action="">
                                                        <div class="form-group">
                                                            <div class="alert alert-warning background-warning">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                 <i class="icofont icofont-close-line-circled text-white"></i>
                                                                 </button>
                                                                 <strong><i class="feather icon-info"></i> Status <?= ucwords(strtolower($fetchId['nama_lengkap'])) ?> = <?= ucwords( $fetchId['status']) ?></strong>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ubah_status">Ubah Status</label>
                                                            <select name="ubah_status" id="ubah_status" class="form-control" required="">
                                                                <option>---Pilih---</option>
                                                                <option value="konfirmasi">Konfirmasi</option>
                                                                <option value="tidak_valid">Tidak Valid</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" name="updateStatus" id="updateStatus" class="btn btn-success btn-round btn-sm" onclick="return confirm('Apakah anda yakin ingin mengubah status data <?= $fetchId['nama_lengkap'] ?>')">Ubah Status</button>
                                                        </div>
                                                    </form>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>

                                	 <div class="col-xl-12 col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Detail <?= ucwords(strtolower($fetchId['nama_lengkap'])) ?></h5>
                                                    <span class="text-muted">Berikut ini adalah kumpulan data-data <?= ucwords(strtolower($fetchId['nama_lengkap'])) ?> Anda hanya bisa mengubah status nya saja, jika status data-data milik <?= $fetchId['nama_lengkap'] ?> itu valid, anda bisa pilih status Konfirmasi.. kalau tidak valid ubah statusnya menjadi Tidak Valid</span>
                                                    <div class="card-header-right">
                                                        <ul class="list-unstyled card-option">
                                                           	<li><i class="feather icon-maximize full-card"></i></li>
                                                            <li><i class="feather icon-minus minimize-card"></i></li>
                                                            <li><i class="feather icon-trash-2 close-card"></i></li>
                                                        </ul>
                                                	 </div>
                                                </div>
                                                <div class="card-block">
                                             		<b>1. Data Pendaftaran</b><p>
                                             		<div class="form-group">
                                             			<label for="nama_lengkap">Nama Lengkap</label>
                                             			<input type="text" class="form-control" value="<?= $fetchId['nama_lengkap'] ?>" readonly="">
                                             		</div>
                                             		<div class="form-group">
                                             			<label for="kode_pendaftar">Kode Pendaftar</label>
                                             			<input type="text" class="form-control" value="<?= $fetchId['kode_pendaftar'] ?>">
                                             		</div>
                                             		<div class="form-group">
                                             			<label for="jenis_kelamin">Jenis Kelamin</label>
                                             			<input type="text" class="form-control" value="<?php if($fetchId['jenis_kelamin'] === 'L'){
                                             				echo 'Laki-laki';
                                             			}else{
                                             				echo 'Perempuan';
                                             			} ?>" readonly="">
                                             		</div>
                                             		<div class="form-group">
                                             			<label for="TTL">TTL</label>
                                             			<input type="text" class="form-control" value="<?= $fetchId['tempat_lahir'] ?>, <?= date('d F Y', strtotime($fetchId['tanggal_lahir'])) ?>" readonly>
                                             		</div>
                                             		<div class="form-group">
                                             			<label for="agama">Agama</label>
                                             			<input type="text" class="form-control" value="<?= $fetchId['agama'] ?>" readonly>
                                             		</div>
                                             		<div class="form-group">
                                             			<label for="nik">Nik</label>
                                             			<input type="text" class="form-control" value="<?= $fetchId['nik'] ?>" readonly>
                                             		</div>
                                             		<div class="form-group">
                                             			<label for="no_telp">No Handphone</label>
                                             			<input type="text" class="form-control" value="<?= $fetchId['no_telp'] ?>" readonly>
                                             		</div>
                                             		<div class="form-group">
                                             			<label for="email">Email</label>
                                             			<input type="text" class="form-control" value="<?= $fetchId['email'] ?>" readonly>
                                             		</div><p>
                                             		<div class="form-group">
                                             			<b>2. Data Alamat</b>

                                             		</div>
                                             		<div class="form-group">
                                             			<label for="longitude">Longitude</label>
                                             			<input type="text" class="form-control" value="<?= $fetchId['longitude'] ?>" readonly>
                                             		</div>
                                             		<div class="form-group">
                                             			<label for="latitude">Latitude</label>
                                             			<input type="text" class="form-control" value="<?= $fetchId['latitude'] ?>" readonly>
                                             		</div>
                                             		<div class="form-group">
                                             			<label for="alamat">Alamat</label>
                                             			<input type="text" class="form-control" value="<?= $fetchId['alamat'] ?>" readonly>
                                             		</div>
                                             		<div class="form-group">
                                             			<label for="jarak">Jarak</label>
                                             			<input type="text" class="form-control" value="<?php if($fetchId['jarak'] === ''){
                                             				echo 'Data kosong, field ini akan di isi oleh Verifikator';
                                             			}else{
                                             				echo $fetchId['jarak'];
                                             			} ?>" readonly>
                                             		</div>
                                             		<div class="form-group">
                                             			<label for="url">Url</label>
                                             			<input type="text" class="form-control" value="<?= $fetchId['url'] ?>" readonly>
                                             		</div>
                                             		<div class="form-group">
                                             			<b>3. Data Asal Sekolah</b>
                                             		</div>
                                             		<div class="form-group">
                                             			<label for="nama_sekolah">Nama Sekolah</label>
                                             			<input type="text" class="form-control" value="<?= $fetchId['nama_sekolah'] ?>" readonly>
                                             		</div>
                                             		<div class="form-group">
                                             			<label for="nama_kepala_sekolah">Nama Kepala Sekolah</label>
                                             			<input type="text" class="form-control" value="<?= $fetchId['nama_kepala_sekolah'] ?>" readonly>
                                             		</div>
                                             		<div class="form-group">
                                             			<label for="nis">NIS</label>
                                             			<input type="text" class="form-control" value="<?= $fetchId['nis'] ?>" readonly>
                                             		</div>
                                             		<div class="form-group">
                                             			<label for="nisn">NISN</label>
                                             			<input type="text" class="form-control" value="<?= $fetchId['nisn'] ?>" readonly>
                                             		</div>
                                             		<div class="form-group">
                                             			<label for="status_sekolah">Status Sekolah</label>
                                             			<input type="text" class="form-control" value="<?= $fetchId['status_sekolah'] ?>" readonly>
                                             		</div>
                                             		<div class="form-group">
                                             			<label for="tahun_lulus">Tahub Lulus</label>
                                             			<input type="text" class="form-control" value="<?= $fetchId['tahun_lulus'] ?>" readonly>
                                             		</div>
                                             		<div class="form-group">
                                             			<label for="nem">NEM</label>
                                             			<input type="text" class="form-control" value="<?= $fetchId['nem'] ?>" readonly>
                                             		</div>
                                             		<div class="form-group">
                                             			<label for="alamat_sekolah">Alamat Sekolah</label>
                                             			<input type="text" class="form-control" value="<?= $fetchId['alamat_sekolah'] ?>" readonly>
                                             		</div>
                                             		<div class="form-group">
                                             			<b>4. Pemilihan Jurusan</b>
                                             		</div>
                                             		<div class="form-group">
                                             			<label for="jurusan1">Jurusan Pertama</label>
                                             			<input type="text" class="form-control" value="<?= $fetchId['jurusan1'] ?>" readonly>
                                             		</div>
                                             		<div class="form-group">
                                             			<label for="jurusan2">Jurusan Kedua</label>
                                             			<input type="text" class="form-control" value="<?= $fetchId['jurusan2'] ?>" readonly>
                                             		</div>
                                            	</div>
                                       		 </div>
                                    	</div>
                                    
                                <div class="text-center">
                                    <p>Copyright &copy; 2020 by <a href="https://github.com/zamisyh">Zamzam Saputra</a></p>
                                </div>
                                <!-- <div id="styleSelector"></div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Warning Section Starts -->
    <!-- Modal Settings-->
    <div class="modal fade" id="settingsModal" tabindex="-1" role="dialog" aria-labelledby="settingsModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="settingsModalLabel">Edit Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
                <div class="form-group">
                    <code>Noted * : Jika anda mengubah profile, otomatis anda akan di keluarkan dan silahkan login kembali menggunakan email/username yang baru </code>
                </div>
                <div class="form-group">
                    <label for="username_admin_change">Username <font color="red">*</font></label>
                    <input type="text" name="username_admin_change" id="username_admin_change" class="form-control" 
                    required autofocus  minlength="4" value="<?= $_SESSION['username'] ?>">
                </div>
                <div class="form-group">
                    <label for="email_admin_change">Email <font color="red">*</font></label>
                    <input type="email" name="email_admin_change" id="email_admin_change" class="form-control" 
                    required value="<?= $_SESSION['email'] ?>">
                </div> 
                <div class="form-group">
                    <a href="#" data-toggle="modal" data-target="#changePasswordModal">Ubah Password ?</a>
                </div> 
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="settingsBtn" class="btn btn-primary" onclick="return confirm('Apakah anda yakin ingin mengubah username/email ?')">Save changes</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    <!-- Modal Profile-->
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="profileModalLabel">Detail Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="username_admin">Username</label>
                    <input type="text" name="username_admin" id="username_admin" class="form-control" readonly value="<?= $_SESSION['username'] ?>">
                </div>
                <div class="form-group">
                    <label for="email_admin">Email</label>
                    <input type="email" name="email_admin" id="email_admin" class="form-control" readonly value="<?= $_SESSION['email'] ?>">
                </div>
            </form>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>
    <!-- Tambah Admin Modal-->
    <div class="modal fade" id="tambahAdminModal" tabindex="-1" role="dialog" aria-labelledby="tambahAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="tambahAdminModalLabel">Tambah Admin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="username_admin">Username <font color="red">*</font></label>
                    <input type="text" name="username_admin" id="username_admin" class="form-control" 
                    required autofocus autocomplete="off" minlength="4" placeholder="Masukkan username admin">
                </div>
                <div class="form-group">
                    <label for="email_admin">Email <font color="red">*</font></label>
                    <input type="email" name="email_admin" id="email_admin" class="form-control" 
                    required autocomplete="off" placeholder="Masukkan email admin">
                </div>
                <div class="form-group">
                    <label for="password_admin">Password <font color="red">*</font></label>
                    <input type="password" name="password_admin" id="password_admin" class="form-control"
                    required autocomplete="off" minlength="6" placeholder="Masukkan password minimal 6 karakter">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password <font color="red">*</font></label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                    required autocomplete="off" minlength="6" placeholder="Konfirmasi password anda">
                </div>
                <div class="form-group">
                    <label for="type_role"> Role <font color="red">*</font></label>
                    <select name="type_role" id="type_role" class="form-control" required="">
                        <option>---Pilih---</option>
                        <option value="operator">Operator</option>
                        <option value="verifikator">Verifikator</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="saveBtn" class="btn btn-primary" onclick="return confirm('Apakah anda yakin ingin menambahkan admin/operator/verifikator?')">Save</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    <!-- Ganti Password Admin Modal-->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="changePasswordModalLabel">Ganti Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="password_change">Password <font color="red">*</font></label>
                    <input type="password" name="password_change" id="password_change" class="form-control"
                    required autocomplete="off" minlength="6" placeholder="Masukkan password minimal 6 karakter">
                </div>
                <div class="form-group">
                    <label for="confirm_password_change">Confirm Password <font color="red">*</font></label>
                    <input type="password" name="confirm_password_change" id="confirm_password_change" class="form-control"
                    required autocomplete="off" minlength="6" placeholder="Konfirmasi password anda">
                </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="changePassword" class="btn btn-primary" onclick="return confirm('Apakah anda yakin ingin mengubah password?')">Change</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    <!-- Required Jquery -->
    <script type="text/javascript" src="..\..\files\bower_components\jquery\js\jquery.min.js"></script>
    <script type="text/javascript" src="..\..\files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
    <script type="text/javascript" src="..\..\files\bower_components\popper.js\js\popper.min.js"></script>
    <script type="text/javascript" src="..\..\files\bower_components\bootstrap\js\bootstrap.min.js"></script>
    <!-- Toastr -->
    <script type="text/javascript" src="..\..\files\bower_components\toastr\toastr.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="..\..\files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="..\..\files\bower_components\modernizr\js\modernizr.js"></script>
    <!-- amchart js -->
    <script src="..\..\files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="..\..\files\assets\js\SmoothScroll.js"></script>
    <script src="..\..\files\assets\js\pcoded.min.js"></script>
    <!-- custom js -->
    <script src="..\..\files\assets\js\vartical-layout.min.js"></script>
    <script type="text/javascript" src="..\..\files\assets\pages\dashboard\custom-dashboard.js"></script>
    <script type="text/javascript" src="..\..\files\assets\js\script.min.js"></script>
    <!-- Bootstrap Validate -->
    <script type="text/javascript" src="../files/bower_components/bootstrap-validate/bootstrap-validate.js"></script>

    <!-- DataTable -->
    <script type="text/javascript" src="../files\bower_components\datatables\jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../files\bower_components\datatables\dataTables.bootstrap4.min.js"></script>

    <script>
        bootstrapValidate('#username_admin', 'min:4: Masukkan minimal 4 karakter');
        bootstrapValidate('#email_admin', 'email: Masukkan email yang valid');
        bootstrapValidate('#password_admin', 'min:6: Masukkan minimal 6 karakter');
        bootstrapValidate('#confirm_password', 'matches:#password_admin:Password yang anda masukkan tidak sesuai');
        bootstrapValidate('#password_change', 'min:6: Masukkan minimal 6 karakter');
        bootstrapValidate('#confirm_password_change', 'matches:#password_change:Password yang anda masukkan tidak sesuai');

    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#tableAdmin').DataTable();
        })
    </script>
</body>

</html>



