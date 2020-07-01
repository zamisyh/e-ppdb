<?php
    if (isset($_POST['saveBtn'])) {
       $username_admin = htmlentities($_POST['username_admin']);
       $email_admin = htmlentities($_POST['email_admin']);
       $role = htmlentities($_POST['type_role']);
       $password_admin = htmlentities($_POST['password_admin']);
       $confirm_password = htmlentities($_POST['confirm_password']);

       if ($confirm_password !== $password_admin) {
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
            toastr.error("Password yang anda masukkan tidak sesuai", "Ooops, error")
        });
        </script>';
        return false;
       }

       //Hash
       $hash = password_hash($password_admin, PASSWORD_DEFAULT);

       $saveData = mysqli_query($link, "INSERT INTO users_admin (id_admin, username, email, password, role) 
                                VALUES ('', '$username_admin', '$email_admin', '$hash', '$role')");
        
        if (mysqli_affected_rows($link) > 0) {
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
                toastr.success("Data berhasil ditambahkan", "Success")
            });
            </script>';
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
                toastr.error("Admin gagal ditambahkan", "Ooops, error")
            });
            </script>';
        }
       
    }else if(isset($_POST['settingsBtn'])) {
        $id_admin = $_SESSION['id_admin'];
        $username_admin_change = htmlentities($_POST['username_admin_change']);
        $email_admin_change = htmlentities($_POST['email_admin_change']);

        $changeData = mysqli_query($link, "UPDATE users_admin SET username = '$username_admin_change', email = '$email_admin_change' WHERE id_admin = '$id_admin'");
        
        if (mysqli_affected_rows($link) > 0) {
            echo '<script type="text/javascript" src="..\files\bower_components\jquery\js\jquery.min.js"></script>';
            echo '<script>
                $(document).ready(function(){
                    toastr.options = {
                      "closeButton": true,
                      "newestOnTop": false,
                      "positionClass": "toast-top-right",
                      "showDuration": "1000",
                      "hideDuration": "1000",
                      "timeOut": "4000",
                      "extendedTimeOut": "1000",
                }
                toastr.success("Data berhasil di ubah, redirecting...", "Success")
            });
            </script>';
            echo '<meta http-equiv="refresh" content="4; url=logout">';
        }
    }

    if (isset($_POST['changePassword']) === true) {
      $idAdmin = $_SESSION['id_admin'];
      $password_change = mysqli_real_escape_string($link, trim($_POST['password_change']));
      $confirm_password_change = mysqli_real_escape_string($link, trim($_POST['confirm_password_change']));

      if ($confirm_password_change !== $password_change) {
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
            toastr.error("Password yang anda masukkan tidak sesuai", "Ooops, error")
        });
        </script>';
        return false;
       
      }

      $hash = password_hash($password_change, PASSWORD_DEFAULT);

      $queryUpdate = mysqli_query($link, "UPDATE users_admin SET password = '$hash' WHERE id_admin = '$idAdmin'");

      if (mysqli_affected_rows($link) > 0) {
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
                toastr.success("Password berhasil diubah", "Success")
            });
            </script>';
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
                toastr.error("Password gagal diubah", "Oooops, Error")
            });
            </script>';
      }
    }
?>