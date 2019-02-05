<?php
     require '../server.php';
    $id = $_GET["id"];                               
    $status = $_POST['done'];
     $up = "UPDATE `paper` SET `status`= $status WHERE paper_id = $id";
     $result_up = mysqli_query($con,$up);
     
     if($result_up){
         if($status==2){
            $up2 = "UPDATE `paper` SET `money_status`= 7 WHERE paper_id = $id";
            $result_up2 = mysqli_query($con,$up2);
            if($result_up2){
               $_SESSION['alert'] = 3;
            }
            else{
               $_SESSION['alert'] = 4;
            }
         }elseif($status==4){
            $up2 = "UPDATE `reviewer_answer` SET `reviewer_id` IS NULL,`status` IS NULL,`comment` IS NULL,`score` IS NULL WHERE `paper_id` = '$id' ";
            $result_up2 = mysqli_query($con,$up2);
            if($result_up2){
               $_SESSION['alert'] = 3;
            }
            else{
               $_SESSION['alert'] = 4;
            }
         }
        $_SESSION['counter_up'] = 1;
        $_SESSION['alert'] = 3;
       
     }
     else{
       $_SESSION['alert'] = 4;
     }
    
     header("Location: ../table3.php");



?>