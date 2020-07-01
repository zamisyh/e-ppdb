<link rel="stylesheet" type="text/css" href="..\files\bower_components\toastr\toastr.css">
<link href="http://fonts.googleapis.com/css?family=Quicksand:400,700%7CPT+Serif:400,700" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<link rel="icon" href="https://files.itszami.my.id/files/5e9de3ec54a74.jpg" type="image/x-icon">
<style>
    *{
        font-family: quicksand;
    }
</style>
<?php 

    session_start();

    if(!$_SESSION){
        header('Location: login');
    }

    session_destroy();

    echo '<script type="text/javascript" src="..\files\bower_components\jquery\js\jquery.min.js"></script>';

    echo '<script>
            $(document).ready(function(){
                toastr.options = {
                "closeButton": true,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "showDuration": "1000",
                "hideDuration": "1000",
                "timeOut": "4000",
                "extendedTimeOut": "1000",
            }
            toastr.success("Anda berhasil logout, redirecting...", "Berhasil")
        });
        </script>';
        echo '<meta http-equiv="refresh" content="4; url=login">';

    echo '<script type="text/javascript" src="..\files\bower_components\toastr\toastr.min.js"></script>';

    

?>