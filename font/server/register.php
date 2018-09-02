<?php
    require 'server.php';
 
    $username = $_POST['username'];
    $password = $_POST['password'];
    $conpassword = $_POST['conpassword'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $conemail = $_POST['conemail'];
    $member = $_POST['member'];

    //Check user from databse is match or not match
    $a = "SELECT * FROM user WHERE username=$username ";
    $r_a = mysqli_query($con,$a);

    //check username password email
    $alert=0;
    if ($password!=$conpassword||$email!=$conemail) {
        $_SESSION['index_alert']=3;
        if ($email==$conemail&&$password!=$conpassword) {
            $_SESSION['index_alert']=1;
        }elseif ($email!=$conemail&&$password==$conpassword) {
            $_SESSION['index_alert']=2;
        }
        $alert=1;
    }
    if (mysqli_fetch_array($r_a)) {
        $_SESSION['user_match']=1;
        $alert=1;
    }
    if($alert==1){
        header("Location: ../index.php");
    }

    //encode password
    $password = base64_encode($_POST['password']);

    //insert to database
    $a = "INSERT INTO user (username,password,gender,first_name,last_name,address,email,member,role) 
            VALUES ('$username','$password','$gender','$fname','$lname','$address','$email','$member','1')";

    $r_a = mysqli_query($con,$a);
    if ($r_a) {
        $_SESSION['user_match']=2;
        header("Location: ../index.php");
    }else {
        $_SESSION['user_match']=3;
        header("Location: ../index.php");
    }

    // echo $username.'<br>'.$password.'<br>'.$conpassword.'<br>'.$fname.'<br>'
    //     .$lname.'<br>'.$gender.'<br>'.$address.'<br>'.$email.'<br>'.$conemail.'<br>'.$member;
?>