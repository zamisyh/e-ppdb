<?php 

    if (isset($_SESSION['userSession']) !== true) {
        header("Location: login");
    }

?>