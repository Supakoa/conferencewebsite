<?php
    //connect database
    require '../server.php';

    //get id from url
    $id = $_GET['id'];
    echo $id;

    $a = "DELETE FROM `user` WHERE `order` = '$id' ";
    $r_a = mysqli_query($con,$a);
    // if($r_a){
    //     echo ' Delete success.';
    // }else{
    //     echo ' Delete error.';
    // }
    header("Location: ../user.php");
?>