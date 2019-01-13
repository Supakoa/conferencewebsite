<?php
     require '../server.php';
    $id = $_GET["id"];                               
    $status = $_POST['done'];
     $up = "UPDATE `paper` SET `money_status`= $status WHERE paper_id = $id";
     $result_up = mysqli_query($con,$up);
     
     if($result_up){
         
      $_SESSION['alert'] = 3;

       
     }
     else{
      $_SESSION['alert'] = 4;
     }
    
     header("Location: ../money.php");



?>