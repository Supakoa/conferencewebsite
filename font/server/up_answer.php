<?php
    //connect server
    require 'server.php';
    if($_SESSION['status'] != 1){
        $_SESSION['online'] = 0 ;
        header("Location: ../index.php");
      }
    $id  = $_SESSION['id'];
    // $id = "123456";
    //required post
    $done = $_POST['done'];
    $score = $_POST['score'];
    $comment = $_POST['comment'];
     $id_paper = $_GET['id'];
    

    $count = "SELECT COUNT(paper_id) FROM reviewer_answer WHERE paper_id = '$id_paper' AND status = ' ' ";
    $r_count = mysqli_query($con,$count);
    $row_count = mysqli_fetch_assoc($r_count);

    $count_answer = $row_count['COUNT(paper_id)'];

    echo $count_answer ; 
    if($count_answer < "2"){
    $a = "UPDATE paper SET status = '6' WHERE paper_id = '$id_paper' ";
    $r_a = mysqli_query($con,$a);
    if($r_a){
        echo 'Success';
    }else{
        echo 'Fail';
    }
}
    $b = "UPDATE reviewer_answer SET status = '$done',score='$score',comment='$comment' WHERE paper_id = '$id_paper' AND reviewer_id = '$id' ";
    $r_b = mysqli_query($con,$b);
    header("Location: ../reviewer.php");

    echo $done.'<br>'.$score.'<br>'.$comment.'<br>'.$id_paper;
?>