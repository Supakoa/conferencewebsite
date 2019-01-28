<?php
 require 'server.php';
 if($_SESSION['status'] != 1){
     $_SESSION['online'] = 0 ;
     header("Location: ../index.php");
     exit();
   }
 $id = $_GET['id'];
 $ext = pathinfo(basename($_FILES["paper"]["name"]), PATHINFO_EXTENSION);
 $new_taget_name = 'pdf_' . uniqid() . "." . $ext;
 $target_path = "../uploads/";
 $upload_path = $target_path . $new_taget_name;
 $uploadOk = 1;

 $imageFileType = strtolower(pathinfo($new_taget_name, PATHINFO_EXTENSION));

 if ($_FILES["paper"]["size"] > 60000000) {
     echo "Sorry, your file is too large.";
     $uploadOk = 0;
     $_SESSION['alert'] = 4 ;
     header("Location: ../user.php");
     exit();
 }

 // Allow certain file formats
 if ($imageFileType != "pdf") {
     echo "Sorry, only PDF files are allowed.";
     $uploadOk = 0;
     $_SESSION['alert'] = 16 ;
     header("Location: ../user.php");
     exit();
 }

 // Check if $uploadOk is set to 0 by an error
 if ($uploadOk == 0) {
     echo "Sorry, your file was not uploaded.";
     $_SESSION['alert'] = 4 ;
     header("Location: ../user.php");
     exit();
 }

 else {
     if (move_uploaded_file($_FILES["paper"]["tmp_name"], $upload_path)) {
         echo 'Move success.';
         $_SESSION['alert'] = 3 ;
        
     }else {
         echo 'Move fail';
         $_SESSION['alert'] = 4 ;
        header("Location: ../user.php");
        exit();
     }
 }

 $paper = $_FILES["paper"]["name"];
 $b = $new_taget_name;
 $a = "UPDATE `paper` SET `file_name`='$paper',`file_tmp_name`='$b',`status`= 1 WHERE paper_id = $id";
 $r_a = mysqli_query($con,$a);
if($r_a){
    $_SESSION['alert'] = 3 ;
     
    
}
else{
    $_SESSION['alert'] = 4 ;
    
}
$update_a = "UPDATE `reviewer_answer` SET `status`=' ',`comment`=' ',`score`=' ' WHERE paper_id = $id";
$r_u = mysqli_query($con,$update_a);

header("Location: ../user.php");

    if($_SESSION['status'] != 1){
        //  $_SESSION['online'] = 0 ;
        $_SESSION['alert'] = 2;
        header("Location: ../index.php");
    }

    $id = $_GET['id'];
    $ext = pathinfo(basename($_FILES["paper"]["name"]), PATHINFO_EXTENSION);
    $new_taget_name = 'pdf_' . uniqid() . "." . $ext;
    $target_path = "../uploads/";
    $upload_path = $target_path . $new_taget_name;
    $uploadOk = 1;

    $imageFileType = strtolower(pathinfo($new_taget_name, PATHINFO_EXTENSION));

    if ($_FILES["paper"]["size"] > 62914560) {
        // echo "Sorry, your file is too large.";
        $uploadOk = 0;
        $_SESSION['alert'] = 15;
        header("Location: ../user.php");
        exit();
    }

    // Allow certain file formats
    if ($imageFileType != "pdf") {
        // echo "Sorry, only PDF files are allowed.";
        $uploadOk = 0;
        $_SESSION['alert'] = 16;
        header("Location: ../user.php");
        exit();
    }

    $re_c = 0;
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        header("Location: ../user.php");
        exit();
    }else {
        if (move_uploaded_file($_FILES["paper"]["tmp_name"], $upload_path)) {
            echo 'Move success.';
            $re_c++;
        }else {
            echo 'Move fail';
        }
    }

    $paper = $_FILES["paper"]["name"];
    $b = $new_taget_name;
    $a = "UPDATE `paper` SET `file_name`='$paper',`file_tmp_name`='$b',`status`= 1 WHERE paper_id = $id";
    $r_a = mysqli_query($con,$a);
    if($r_a){
        // $_SESSION['alert'] = 2 ;
        $re_c++;
    }
    else{
        // $_SESSION['alert'] = 0 ;
        
    }
    $update_a = "UPDATE `reviewer_answer` SET `status`=' ',`comment`=' ',`score`=' ' WHERE paper_id = $id";
    $r_u = mysqli_query($con,$update_a);

    if($r_u){
        // $_SESSION['alert'] = 10;
        $re_c++;
    }else{
        // $_SESSION['alert'] = 11;
    }

    // all complete
    if($re_c == 3){
        $_SESSION['alert'] = 10;
    }else{
        $_SESSION['alert'] = 11;
    }

    header("Location: ../user.php");
    exit();
?>