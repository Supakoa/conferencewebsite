<?php
     require '../server.php';
    $id = $_GET["id"];                               
    $status = $_POST['done'];
     $up = "UPDATE `paper` SET `status`= $status WHERE paper_id = $id";
     $result_up = mysqli_query($con,$up);
     
     if($result_up){
         if($status==2){
            $up2 = "UPDATE `paper` SET `money_status`= 1 WHERE paper_id = $id";
            $result_up2 = mysqli_query($con,$up2);

         }
        $_SESSION['counter_up'] = 1;

       
     }
     else{
        $_SESSION['counter_up'] = 2;
     }
    
     header("Location: ../table3.php");



?>