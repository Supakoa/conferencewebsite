<?php
    //connect database
    require 'server.php';
    if($_SESSION['status'] != 1){
        $_SESSION['online'] = 0 ;
        header("Location: ../index.php");
      }
    //give value from form_insert_paper.php
    $paper_th = $_POST['paper_th'];
    $paper_eng = $_POST['paper_eng'];
    $abstract = $_POST['abstract'];
    $keyword = $_POST['keyword'];
    echo $paper_th,$paper_eng,$abstract,$keyword;
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
    $a = "INSERT INTO paper (file_name,file_tmp_name,name_th,name_eng,abstract,key_word,status) 
            VALUES ('$paper','$b','$paper_th','$paper_eng','$abstract','$keyword','5')";
            
    $r_a = mysqli_query($con,$a);
    $c = "SELECT * FROM paper ORDER BY paper_id DESC LIMIT 1";
    $result_c = mysqli_query($con, $c);
    $row_c = mysqli_fetch_array($result_c);
    $last_paper = $row_c['paper_id'];
    
    $r_p = "INSERT INTO `reviewer_paper`( `paper_id`) VALUES ('$last_paper')";
    $r_r_p = mysqli_query($con,$r_p);

    $id = $_SESSION['id'];

    $p_u = "INSERT INTO `user_paper`( `paper_id`,username) VALUES ('$last_paper','$id')";
    $r_p_u = mysqli_query($con,$p_u);

    $r_a = "INSERT INTO `reviewer_answer`( `paper_id`) VALUES ('$last_paper')";
    $r_r_a = mysqli_query($con,$r_a);
    $r_r_a = mysqli_query($con,$r_a);
    
    header("Location: ../user.php");

    // echo '<br><button><a href="form_insert_paper.php">Click Me!!</a></button>';
?>