<?php
   require '../server.php';
   require 'server/check_login.php';

   if($_GET['id']==1){
    $b1 =$_SESSION['name_banner'];
    $b2 = $_SESSION['tmp_banner'];
    $a = "UPDATE `banner` SET `name`='$b1',`tmp_name`='$b2' WHERE 1";
    $r_a = mysqli_query($con,$a);
    unset($_SESSION['check_banner']); 
    if ($r_a) {
        $_SESSION['alert'] = 3 ;
    } else {
        $_SESSION['alert'] = 4 ;
    }
    header("Location: ../banner.php");
    exit();
}
else{
    $ext = pathinfo(basename($_FILES["banner"]["name"]), PATHINFO_EXTENSION);
    $new_taget_name = 'banner_' . uniqid() . "." . $ext;
    $target_path = "../banner/";
    $upload_path = $target_path . $new_taget_name;
    $uploadOk = 1;

    $imageFileType = strtolower(pathinfo($new_taget_name, PATHINFO_EXTENSION));

    if ($_FILES["banner"]["size"] > 60000000) {
        echo "Sorry, your file is too large.";
        $_SESSION['alert'] = 15 ;
        header("Location: ../banner.php");
            exit();
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg"&&$imageFileType != "png") {
        echo "Sorry, only JPG , PNG files are allowed.";
        $_SESSION['alert'] = 17 ;
        header("Location: ../banner.php");
            exit();
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        $_SESSION['alert'] = 4 ;
        header("Location: ../banner.php");
            exit();
    }

    else {
        if (move_uploaded_file($_FILES["banner"]["tmp_name"], $upload_path)) {
            echo 'Move success.';
            $_SESSION['alert'] = 3 ;
            

        }else {
            echo 'Move fail';
            $_SESSION['alert'] = 4 ;
        }
    }

    $banner = $_FILES["banner"]["name"];
    $b = $new_taget_name;
    $_SESSION['name_banner'] = $banner ;
    $_SESSION['tmp_banner'] = $b ;
    $_SESSION['check_banner'] = 1;
    header("Location: ../banner.php");
}
    ?>