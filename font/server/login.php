<?php
    require 'server.php';
    
    $login_id = mysqli_real_escape_string($con,$_POST['username']);
    $login_pw = base64_encode(mysqli_real_escape_string($con,$_POST['password']));
    
  
    $sql = "SELECT * FROM user WHERE username='$login_id' AND password='$login_pw' ";
    $result = mysqli_query($con,$sql);
    $r_a = mysqli_fetch_array($result);
   

    if ($r_a>=1) {
      $_SESSION['id'] = $login_id;
      $_SESSION['status'] = 1; //online
        echo '1';
        if ($r_a['role']==1) {
            echo '2';
            header("Location: ../user.php");
        }elseif($r_a['role']==2){
            echo '3';
            header("Location: ../reviewer.php");
        }
    }else{
      $_SESSION['status'] = 0; //not match
        header("Location: ../index.php");
    }
?>