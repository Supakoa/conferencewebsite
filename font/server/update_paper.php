<?php
 require 'server.php';
 if($_SESSION['status'] != 1){
     $_SESSION['online'] = 0 ;
     header("Location: ../index.php");
   }
$id = $_GET['id'];
 $ext = pathinfo(basename($_FILES["paper"]["name"]), PATHINFO_EXTENSION);
 $new_taget_name = 'pdf_' . uniqid() . "." . $ext;
 $target_path = "../uploads/";
 $upload_path = $target_path . $new_taget_name;
 $uploadOk = 1;

 $imageFileType = strtolower(pathinfo($new_taget_name, PATHINFO_EXTENSION));

 if ($_FILES["paper"]["size"] > 8000000) {
     echo "Sorry, your file is too large.";
     $uploadOk = 0;
 }

 // Allow certain file formats
 if ($imageFileType != "pdf") {
     echo "Sorry, only PDF files are allowed.";
     $uploadOk = 0;
 }

 // Check if $uploadOk is set to 0 by an error
 if ($uploadOk == 0) {
     echo "Sorry, your file was not uploaded.";
 }

 else {
     if (move_uploaded_file($_FILES["paper"]["tmp_name"], $upload_path)) {
         echo 'Move success.';
     }else {
         echo 'Move fail';
     }
 }

 $paper = $_FILES["paper"]["name"];
 $b = $new_taget_name;
 $a = "UPDATE `paper` SET `file_name`='$paper',`file_tmp_name`='$b',`status`= 1 WHERE paper_id = $id";
 $r_a = mysqli_query($con,$a);
if($r_a){
    $_SESSION['alert'] = 2 ;
    
}
else{
    $_SESSION['alert'] = 0 ;
    
}
$update_a = "UPDATE `reviewer_answer` SET `status`=' ',`comment`=' ',`score`=' ' WHERE paper_id = $id";
$r_u = mysqli_query($con,$update_a);

header("Location: ../user.php");


?>