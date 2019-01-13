<?php
    require 'server.php';

    if ($_SESSION['status'] != 1) {
        $_SESSION['online'] = 0;
        header("Location: index.php");
    }
 
    $username = $_POST['username'];
    $password = $_POST['password'];
    $conpassword = $_POST['conpassword'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $conemail = $_POST['conemail'];
    $tel  =$_POST['tel'];
    $member = $_POST['member'];
    $type = $_POST['type'];

    //Check user from databse is match or not match
    $a = "SELECT * FROM user WHERE `username`='$username' ";
    $r_a = mysqli_query($con,$a);

    //check username password email
    // $alert=0;
    if ($password!=$conpassword||$email!=$conemail) {
        // $_SESSION['register_alert']=3;
        $_SESSION['alert'] = 6;

        if ($email==$conemail&&$password!=$conpassword) {

            // $_SESSION['register_alert']=1;
            $_SESSION['alert'] = 7;
            header("Location: ../index.php");
            exit();

        }elseif ($email!=$conemail&&$password==$conpassword) {

            // $_SESSION['register_alert']=2;
            $_SESSION['alert'] = 8;
            header("Location: ../index.php");
            exit();

        }
        // $alert=1;
        header("Location: ../index.php");
        exit();
    }
    if (mysqli_fetch_array($r_a)) {
        // $_SESSION['register_match']=1;
        // $alert=1;
        $_SESSION['alert'] = 9;
        header("Location: ../index.php");
        exit();
    }
    // if($alert==1){
    //     header("Location: ../index.php");
    //     exit();
    // }
    else {
        //encode password
        $password = base64_encode($_POST['password']);

        //insert to database
        $a = "INSERT INTO user (username,password,gender,first_name,last_name,address,email,Tel,member,role) 
            VALUES ('$username','$password','$gender','$fname','$lname','$address','$email','$tel','$member','$type')";


        $r_a = mysqli_query($con,$a);
        $b = "INSERT INTO `bill_guest`(`username`) VALUES ('$username')";

        $r_b = mysqli_query($con,$b);
        
        if ($r_a) {
            // $_SESSION['user_match']=2;
            $_SESSION['alert'] = 3;
            header("Location: ../index.php");
            exit();
        }else {
            // $_SESSION['user_match']=3;
            $_SESSION['alert'] = 4;
            header("Location: ../index.php");
            exit();
        }
    }

    // echo $username.'<br>'.$password.'<br>'.$conpassword.'<br>'.$fname.'<br>'
    //     .$lname.'<br>'.$gender.'<br>'.$address.'<br>'.$email.'<br>'.$conemail.'<br>'.$member;
?>