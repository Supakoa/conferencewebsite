<?php
    //connect database
require 'server.php';
if ($_SESSION['status'] != 1) {
    $_SESSION['online'] = 0;
    header("Location: ../index.php");
}
    //give value from form_insert_paper.php
$q_pay_time = "SELECT * FROM `setting_timmer` WHERE `order` = 2 ";
$result_pay_time = mysqli_query($con, $q_pay_time);
$r_pay_time = mysqli_fetch_assoc($result_pay_time);
date_default_timezone_set("Asia/Bangkok");
$today = date('Y-m-d');
$pay_start = $r_pay_time['time_start'];
$pay_end = $r_pay_time['time_end'];

$id_paper = $_GET['id'];

$ext = pathinfo(basename($_FILES["money"]["name"]), PATHINFO_EXTENSION);
$new_taget_name = 'Bill_' . uniqid() . "." . $ext;
$target_path = "../../Bill/";
$upload_path = $target_path . $new_taget_name;
$uploadOk = 1;

$imageFileType = strtolower(pathinfo($new_taget_name, PATHINFO_EXTENSION));

if ($_FILES["money"]["size"] > 8000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

    // Allow certain file formats
if ($imageFileType != "pdf" && $imageFileType != "jpg" && $imageFileType != "png") {
    echo "Sorry, only PDF,JPG,PNG files are allowed.";
    $uploadOk = 0;
}

    // Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if ($pay_start <= $today && $today <= $pay_end) {
       


            if (move_uploaded_file($_FILES["money"]["tmp_name"], $upload_path)) {
                echo 'Move success.';
            } else {
                echo 'Move fail';
            }


            $paper = $_FILES["money"]["name"];
            $b = $new_taget_name;
            echo $b . "  " . $id_paper;
            $a = "UPDATE `paper` SET`money_status`='6',`tmp_money`='$b' WHERE paper_id = '$id_paper'";

            $r_a = mysqli_query($con, $a);

            if ($r_a) {

            } else {

            }
            header("Location: ../user.php");
        }
        else{
            
            header("Location: ../user.php");
        }
    }
    header("Location: ../user.php");
    // echo '<br><button><a href="form_insert_paper.php">Click Me!!</a></button>';
    ?>