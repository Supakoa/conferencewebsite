<?php
    if(!isset($_SESSION['f_online'])){
        $_SESSION['check_login']=' ';
        header("Location: index.php");
    }
?>