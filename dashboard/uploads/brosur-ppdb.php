<?php 
    session_start();
    require_once '../../auth/config.php';
    require_once '../../auth/admins/sessionUser.php';
    require_once '../../src/dashboardFiles/brosurUpload.php';



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Adminstrator</title>
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
    <link href="..\..\files\assets\pages\jquery.filer\css\jquery.filer.css" type="text/css" rel="stylesheet">
    <link href="..\..\files\assets\pages\jquery.filer\css\themes\jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet">

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
                                                <a href="../admin-verifikator">
                                                    <span class="pcoded-mtext">Peserta Terverifikasi</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="../peserta-lolos">
                                                    <span class="pcoded-mtext">Peserta Lolos</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="../peserta-tidak-lolos">
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
                                        <li class="">
                                            <a href="">
                                                <span class="pcoded-mtext">Peserta Terdaftar</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="">
                                                <span class="pcoded-mtext">Pengecekan</span>
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
                                    </ul>
                                </li>
                                <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu active pcoded-trigger">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-upload"></i></span>
                                        <span class="pcoded-mtext">Uploads</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="../uploads/alur-ppdb">
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
                            <div class="pcoded-navigatio-lavel">More</div>
                            <div class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="#" data-toggle="modal" data-target="#tambahAdminModal">
                                        <span class="pcoded-micon"><i class="feather icon-user-plus"></i></span>
                                        <span class="pcoded-mtext">Tambah Admin</span>
                                    </a>
                                </li>
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

                                    <div class="page-body">
                                        <!-- File upload card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>File Upload</h5>
                                                <div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li><i class="feather icon-maximize full-card"></i></li>
                                                        <li><i class="feather icon-minus minimize-card"></i></li>
                                                        <li><i class="feather icon-trash-2 close-card"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-block">
                                                <form method="post" action="" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <div class="sub-title">Hanya di perbolehkan : jpg, jpeg, png</div>
                                                        <input type="file" name="gambar" required class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-success btn-round btn-sm" name="btnUpload">Upload</button>
                                                    </div>
                                                </form>
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
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="saveBtn" class="btn btn-primary">Save</button>
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
    <script data-cfasync="false" src="..\..\..\..\cdn-cgi\scripts\5c5dd728\cloudflare-static\email-decode.min.js"></script><script type="text/javascript" src="..\..\files\bower_components\jquery\js\jquery.min.js"></script>
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
    <script type="text/javascript" src="..\../files/bower_components/bootstrap-validate/bootstrap-validate.js"></script>

    <!-- jquery file upload js -->
    <script src="..\..\files\assets\pages\jquery.filer\js\jquery.filer.min.js"></script>
    <script src="..\..\files\assets\pages\filer\custom-filer.js" type="text/javascript"></script>
    <script src="..\..\files\assets\pages\filer\jquery.fileuploads.init.js" type="text/javascript"></script>

</body>

</html>
