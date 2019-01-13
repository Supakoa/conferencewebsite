<?php
    //connect database
    require '../server.php';

    // check online with check have start with index
    if(!isset($_SESSION['status_admin'])){
        // $_SESSION['online'] = 0 ;
        $_SESSION['alert'] = 2 ;
        header("Location: ../index.php");
        exit();
    }

    $username = $_POST['username'];
    $password = base64_encode($_POST['password']);
    $gender = $_POST['gender'];
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $member = $_POST['member'];
    $id = $_GET['id'];

    $a = "UPDATE `user` SET `username`='$username',`password`='$password',`gender`='$gender',`first_name`='$firstname',
            `last_name`='$lastname',`address`='$address',`email`='$email',`Tel`='$tel',`member`='$member' WHERE `order` = '$id' ";
    $r_a = mysqli_query($con,$a);

    if($r_a){
        $_SESSION['alert'] = 10;
    }else{
        $_SESSION['alert'] = 11;
    }
    header("Location: ../manageuser.php");
    exit();
    

    echo $a;
?>