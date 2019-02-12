<?php 
require '../server/server.php';
if (!isset($_SESSION['status'])) {
    // $_SESSION['online'] = 0;
    $_SESSION['alert'] = 2;
    header("Location: ../index.php");
}

?>