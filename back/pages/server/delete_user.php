<?php
    //connect database
    require '../server.php';

    // check online with check have start with index
    if(!isset($_SESSION['status_admin'])){
        // $_SESSION['online'] = 0 ;
        $_SESSION['alert'] = 2 ;
        header("Location: ../../index.php");
        exit();
    }

    //get id from url
    $id = $_GET['id'];

    $a = "DELETE FROM `user` WHERE `order` = '$id' ";
    $r_a = mysqli_query($con,$a);
    if($r_a){
        $_SESSION['alert'] = 12 ;
       
    }else{
        $_SESSION['alert'] = 13 ;
    }
    header("Location: ../manageuser.php");
    exit();
?>