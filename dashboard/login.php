<?php 

    session_start();
    require_once '../auth/config.php';
    require_once '../auth/admins/sessionLogin.php';
    echo '<script type="text/javascript" src="../files/bower_components/sweetalert1/sweetalert.min.js"></script>';

    if (isset($_POST['btnSubmit']) === true) {
       $email = htmlentities($_POST['email']);
       $password = htmlentities($_POST['password']);

       $querySelectUsers = mysqli_query($link, "SELECT * FROM users_admin WHERE email = '$email'");

       if (mysqli_num_rows($querySelectUsers) === 1) {
           $rowHash = mysqli_fetch_assoc($querySelectUsers);
           if ($rowHash['role'] === 'peserta') {
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
                        window.location.replace('../');
                        } ,3000); 
                    </script>";
            return false;   
           }
           if (password_verify($password, $rowHash['password'])) {
            //SetSession 

            $_SESSION['role'] = $rowHash['role'];
            $_SESSION['userSession'] = true;
            $_SESSION['id_admin'] = $rowHash['id_admin'];
            $_SESSION['username'] = $rowHash['username'];
            $_SESSION['email'] = $rowHash['email'];

            echo '<script type="text/javascript" src="..\files\bower_components\jquery\js\jquery.min.js"></script>';
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
                toastr.success("Succesfully Login", "Success")
            });
            </script>';
            echo '<meta http-equiv="refresh" content="6; url=index">';
           }else{
                // $errorPassword = true;
                echo '<script type="text/javascript" src="..\files\bower_components\jquery\js\jquery.min.js"></script>';
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
                toastr.error("Password yang anda masukkan salah", "Oopps, error")
            });
            </script>';
           }
       }else{
            echo '<script type="text/javascript" src="..\files\bower_components\jquery\js\jquery.min.js"></script>';
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
            toastr.error("Email yang anda masukkan salah", "Oopps, error")
        });
        </script>';
       }
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PPDB - Admin Login</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="PPDB Online, PPDB SMKN5 Kota Bekasi, PPDB SMK">
    <meta name="author" content="Zamzam Saputra">
    <!-- Favicon icon -->
    <link rel="icon" href="https://files.itszami.my.id/files/5e9de3ec54a74.jpg" type="image/x-icon">
    <!-- Google font--><link href="http://fonts.googleapis.com/css?family=Quicksand:400,700%7CPT+Serif:400,700" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\bootstrap\css\bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\themify-icons\themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\icon\icofont\css\icofont.css">

    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="..\files\bower_components\toastr\toastr.css">

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="..\files\assets\css\style.css">
    <style>
        *{
            font-family: quicksand;
        }
    </style>
</head>

<body class="fix-menu">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    
                        <form class="md-float-material form-material" method="post" action="">
                            <div class="text-center">
                                <!-- <img src="" alt="logo.png"> -->
                            </div>
                            <div class="auth-box card">
                                <div class="card-block">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h3 class="text-center">Admin Login</h3>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group form-primary">
                                        <input type="text" name="email" class="form-control" id="email" required="" autocomplete="off" autofocus placeholder="Your Email Address">
                                        <span class="form-bar"></span>
                                    </div>
                                    <div class="form-group form-primary">
                                        <input type="password" name="password" minlength="6" class="form-control" id="password" required="" autocomplete="off" placeholder="Password">
                                        <span class="form-bar"></span>
                                    </div>
                                    <div class="row m-t-25 text-left">
                                        <div class="col-12">
                                            <div class="checkbox-fade fade-in-primary d-">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                    <span class="text-inverse">Remember me</span>
                                                </label>
                                            </div>
                                            <div class="forgot-phone text-right f-right">
                                                <a href="auth-reset-password.htm" class="text-right f-w-600"> Forgot Password?</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <button type="submit" name="btnSubmit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign in</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="text-inverse text-left m-b-0">Terima kasih</p>
                                            <p class="text-inverse text-left"><a href="../index"><b class="f-w-600">Back to website</b></a></p>
                                        </div>
                                        <div class="col-md-2">
                                            <img src="../smkn5.jpg" alt="small-logo.png" style="height: 45px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
   
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="..\files\bower_components\jquery\js\jquery.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\popper.js\js\popper.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\bootstrap\js\bootstrap.min.js"></script>
    <!-- Toastr -->
    <script type="text/javascript" src="..\files\bower_components\toastr\toastr.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="..\files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="..\files\bower_components\modernizr\js\modernizr.js"></script>
    <script type="text/javascript" src="..\files\bower_components\modernizr\js\css-scrollbars.js"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="..\files\bower_components\i18next\js\i18next.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="..\files\bower_components\jquery-i18next\js\jquery-i18next.min.js"></script>
    <script type="text/javascript" src="..\files\assets\js\common-pages.js"></script>
    
    <!-- Bootstrap Validate -->
    <script type="text/javascript" src="../files/bower_components/bootstrap-validate/bootstrap-validate.js"></script>
    <script>
        bootstrapValidate('#email', 'email: Masukkan email yang valid');
        bootstrapValidate('#password', 'min:6: Masukkan minimal 6 karakter');

    </script>
</body>

</html>
