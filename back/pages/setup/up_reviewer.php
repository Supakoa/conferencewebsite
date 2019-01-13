<?php

require '../server.php';
$id = $_GET["id"];
$reviewer1 = $_POST['reviewer1'];
$reviewer2 = $_POST['reviewer2'];
if ($reviewer1 == $reviewer2) {
    $_SESSION['counter_up'] = 6; //สองคนซ้ำกัน
    header("Location: ../table.php");
} else {
    $up = "UPDATE `reviewer_paper` SET `reviewer1`='$reviewer1',`reviewer2`='$reviewer2' WHERE paper_id = $id";
    $result_up = mysqli_query($con, $up);
    $u_r1 = "UPDATE `reviewer_answer` SET `reviewer_id`='$reviewer1'WHERE  paper_id = $id AND reviewer_id = ' ' limit 1";
    $re_u_r1 = mysqli_query($con, $u_r1);
    $u_r2 = "UPDATE `reviewer_answer` SET `reviewer_id`='$reviewer2'WHERE  paper_id = $id AND reviewer_id = ' ' limit 1 ";
    $re_u_r2 = mysqli_query($con, $u_r2);
    $up_status = "UPDATE `paper` SET `status`= 1 WHERE paper_id = $id";
    $result_up_status = mysqli_query($con, $up_status);
    if ($result_up && $result_up_status) {
        $_SESSION['counter_up'] = 1;
    } else {
        $_SESSION['counter_up'] = 2;
    }

    header("Location: ../table.php");
}
?>