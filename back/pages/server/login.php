<?php
    //connect server
    require '../server.php';

    //recieve data
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = base64_encode(mysqli_real_escape_string($con,$_POST['password']));
    
    //check data correct in database
    $sql = "SELECT * FROM admin WHERE id='$username' AND password='$password' ";
    $result = mysqli_query($con,$sql);
    $r_a = mysqli_fetch_array($result);
    
    if($r_a){
        $_SESSION['online'] = 1;
        $_SESSION['status_admin'] = 1;
        header("Location: ../report.php");
        exit();
    }else{
        $_SESSION['alert'] = 14;
        header("Location: ../../index.php");
        exit();
    }

    // echo $username."<br>".$password;
?>