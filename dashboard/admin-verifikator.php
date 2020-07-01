<?php 
	
	session_start();

	require_once '../auth/config.php';
	require_once '../auth/admins/sessionUser.php';
	require_once '../src/dashboardFiles/navMoreScript.php';

	echo '<script type="text/javascript" src="../files/bower_components/sweetalert1/sweetalert.min.js"></script>';
	if ($_SESSION['role'] !== 'admin') {
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
                        text:  'Anda tidak diperbolehkan masuk ke halaman ini!',
                        type: 'error',
                        timer: 3000,
                        showConfirmButton: false
                       });  
                    },10); 
                window.setTimeout(function(){ 
                window.location.replace('index');
                } ,3000); 
            </script>";
	}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Adminstrator - Admin Verifikator</title>
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
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\bootstrap\css\bootstrap.min.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\feather\css\feather.css">
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="files\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="files\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css">

     <!-- Toastr -->
     <link rel="stylesheet" type="text/css" href="..\files\bower_components\toastr\toastr.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="..\files\assets\css\jquery.mCustomScrollbar.css">
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
                                        <img src="..\files\assets\images\user-profile\admin.png" class="img-radius">
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
                                               <a href="logout">
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
            <?php include '../src/dashboardFiles/navbar.php'; ?>

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="col-xl-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Peserta Check Admin Verifikasi</h5>
                                                        <span class="text-muted">Sebelum data ini di <b>Terverifikasi</b>, pastikan anda sudah mengecek data-data nya dengan baik dan teliti, jika ada kesalahan anda bisa mengubah statusnya menjadi <b>Konfirmasi </b> Data akan tidak ada di table jika status nya sudah di konfirmasi dan Akan di check kembali oleh user verifikator</span>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="feather icon-maximize full-card"></i></li>
                                                                <li><i class="feather icon-minus minimize-card"></i></li>
                                                                <li><i class="feather icon-trash-2 close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="tableAdmin" class="table table-striped table-bordered nowrap">
                                                                <thead class="bg-dark">
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Nama</th>
                                                                        <th>Jenis Kelamin</th>
                                                                        <th>TTL</th>
                                                                        <th>Agama</th>
                                                                        <th>Asal Sekolah</th>
                                                                        <th>Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                   	<?php 
                                                                   		$no = 1;
                                                                   		$queryDetail = mysqli_query($link, "SELECT * FROM data_pendaftar JOIN data_asal_sekolah ON data_pendaftar.id_pendaftar = data_asal_sekolah.id_siswa JOIN status_pendaftaran ON data_pendaftar.id_pendaftar = status_pendaftaran.id_siswa WHERE status = 'verifikasi'");
                                                                   		
                                                                   		while ($rowData = mysqli_fetch_assoc($queryDetail)) {
                                                                   		
                                                                   		
                                                                   	 ?>
                                                                    <tr>
                                                                        <td><?= $no; ?></td>
                                                                        <td><?= $rowData['nama_lengkap'] ?></td>
                                                                        <td><?= $rowData['jenis_kelamin'] ?></td>
                                                                        <td><?= $rowData['tempat_lahir'] ?>, <?= date('d F Y', strtotime($rowData['tanggal_lahir'])) ?></td>
                                                                        <td><?= $rowData['agama'] ?></td>
                                                                        <td><?= $rowData['nama_sekolah'] ?></td>
                                                                        <td>
                                                                        	<a href="detail-admin-verifikator/<?= $rowData['id_pendaftar'] ?>" class="btn btn-info btn-round btn-sm"><i class="feather icon-info"></i>Detail</a> | 
                                                                            <?php if ($rowData['status'] === "lolos"): ?>
                                                                                <button type="button" class="btn btn-success btn-round btn-sm">Lolos</button>
                                                                            <?php endif ?>
                                                                            <?php if ($rowData['status'] === "tidak_lolos"): ?>
                                                                                <button type="button" class="btn btn-danger btn-round btn-sm">Tidak Lolos</button>
                                                                            <?php endif ?>
                                                                            <?php if ($rowData['status'] === "verifikasi"): ?>
                                                                                <button type="button" class="btn btn-warning btn-round btn-sm">Verifikasi</button>
                                                                            <?php endif ?>

                                                                        </td>
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
    <script data-cfasync="false" src="..\..\..\cdn-cgi\scripts\5c5dd728\cloudflare-static\email-decode.min.js"></script><script type="text/javascript" src="..\files\bower_components\jquery\js\jquery.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\popper.js\js\popper.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\bootstrap\js\bootstrap.min.js"></script>
    <!-- Toastr -->
    <script type="text/javascript" src="..\files\bower_components\toastr\toastr.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="..\files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="..\files\bower_components\modernizr\js\modernizr.js"></script>
    <!-- amchart js -->
    <script src="..\files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="..\files\assets\js\SmoothScroll.js"></script>
    <script src="..\files\assets\js\pcoded.min.js"></script>
    <!-- custom js -->
    <script src="..\files\assets\js\vartical-layout.min.js"></script>
    <script type="text/javascript" src="..\files\assets\pages\dashboard\custom-dashboard.js"></script>
    <script type="text/javascript" src="..\files\assets\js\script.min.js"></script>
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





