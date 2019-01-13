<?php
    //connect database
    require '../server.php';
    
    //check online
    if($_SESSION['status_admin'] != 1){
        $_SESSION['online'] = 0 ;
        header("Location: ../index.php");
    }

    //FORM POST 
    $username = $_POST['username'];
    $password = base64_encode($_POST['password']);
    $conpassword = base64_encode($_POST['conpassword']);
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $email = $_POST['email'];  
    $conemail = $_POST['conemail'];
    $tel = $_POST['tel'];

    //Check user from databse is match or not match
    $a = "SELECT * FROM user WHERE username = $username ";
    $r_a = mysqli_query($con,$a);

    //check username password email
    $alert=0;
    if ($password!=$conpassword||$email!=$conemail) {
        $_SESSION['register_alert']=3;
        if ($email==$conemail&&$password!=$conpassword) {
            $_SESSION['register_alert']=1;
        }elseif ($email!=$conemail&&$password==$conpassword) {
            $_SESSION['register_alert']=2;
        }
        $alert=1;
    }
    if (mysqli_fetch_array($r_a)) {
        $_SESSION['register_match']=1;
        $alert=1;
    }
    if($alert==1){
        header("Location: ../register.php");
    }

    //insert data into database
    else {

        //insert to database
        $a = "INSERT INTO user (username,password,gender,first_name,last_name,address,email,Tel,role) 
            VALUES ('$username','$password','$gender','$fname','$lname','$address','$email','$tel','2')";

        $r_a = mysqli_query($con,$a);
        if ($r_a) {
            $_SESSION['user_match']=2;
            $_SESSION['alert'] = 2;
            header("Location: ../register.php");
        }else {
            $_SESSION['user_match']=3;
            $_SESSION['alert'] = 1;
            header("Location: ../register.php");
        }
    }

    // echo $username."<br>".$password."<br>".$conpassword."<br>".$fname."<br>".$lname."<br>".$gender."<br>".$address."<br>".$email."<br>".$conemail;
?>