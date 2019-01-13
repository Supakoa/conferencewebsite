<?php
    //check login 
    if (!isset($_SESSION['online'])) {
        $_SESSION['alert'] = 2;
        header("Location: ../index.php");
        exit();
    }
?>