<?php
    require 'server.php';
    
    $login_id = mysqli_real_escape_string($con,$_POST['username']);
    $login_pw = base64_encode(mysqli_real_escape_string($con,$_POST['password']));
    
  
    $sql = "SELECT * FROM user WHERE username='$login_id' AND password='$login_pw' ";
    $result = mysqli_query($con,$sql);

    if ($r_a = mysqli_fetch_array($result)) {
      $_SESSION['id'] = $login_id;
      $_SESSION['status'] = 1;//online
        if ($r_a['role']==1) {
            header("Location: ../user.php");
        }elseif($r_a['role']==2){
            header("Location: ../reviewer.php");
        }
        elseif($r_a['role']==3){
            echo '3';
            header("Location: ../guest.php");
        }
    }else{
        $_SESSION['status'] = 0; //not match
        header("Location: ../index.php");
    }
?>