<?php session_start(); ?>
<?php
        if (isset($_SESSION['taikhoanadmin']) && $_SESSION['taikhoanadmin'] != NULL) {
            unset($_SESSION['taikhoanadmin']);
            header('Location: login.php');
        }
    ?>