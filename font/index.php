<?php
  //connect database
  require 'server/server.php';

  //alert
  if(isset($_SESSION['check_login'])){
    echo '<script>alert("กรุณา Login เข้าสู่ระบบ.");</script>';
  }
  if(isset($_SESSION['status'])){
    if($_SESSION['status']==0){
      echo '<script>alert("Username หรือ Password ไม่ถูกต้อง.");</script>';
    }
  }
  if(isset($_SESSION['register_alert'])){
    if ($_SESSION['register_alert']==1) {
      echo '<script>alert("ท่านกรอกรหัสผ่านไม่ถูกต้อง.");</script>';
    }elseif ($_SESSION['register_alert']==2) {
      echo '<script>alert("ท่านกรอกอีเมลไม่ถูกต้อง.");</script>';
    }elseif ($_SESSION['register_alert']==3) {
      echo '<script>alert("ท่านกรอกรหัสผ่านและอีเมลไม่ถูกต้อง.");</script>';
    }
  }
  if(isset($_SESSION['register_match'])){
    if($_SESSION['register_match']==1){
      echo '<script>alert("ชื่อผู้ใช้นี้ถูกใช้งานไปแล้ว.");</script>';
    }
  }
  session_destroy();

  $a = "SELECT * FROM show_url WHERE hide='0' && group_url = '1' ";
  $b = "SELECT * FROM show_url WHERE hide='0' && group_url = '2' ";
  $q_a = mysqli_query($con,$a);
  $q_b = mysqli_query($con,$b);

  $a3 = "SELECT * FROM banner ";
  $q3 = mysqli_query($con,$a3);
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Conference - Log-in</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Mitr:400,500" rel="stylesheet">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="device-mockups/device-mockups.min.css">

    <!-- Custom styles for this template -->
    <link href="css/new-age.css" rel="stylesheet">

  </head>

  <body id="page-top" >
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top" style="font-size:25px">CONFERENCE GE SSRU</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#login" style="font-size:20px">เข้าสู่ระบบ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#register" style="font-size:20px">สมัครสมาชิก</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead" >
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-lg-12 my-auto">
            <div class="header-content mx-auto">
              <h1>การประชุมวิชาการ สำนักการศึกษาทั่วไป <br> CONFERENCE <br> GE SSRU</h1>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section class="text-center" id="login" style="background-color:#d9d9d9;">
    <div class="section-heading text-center">
        <h2 class="text-center text-uppercase text-secondary mb-0">เข้าสู่ระบบ</h2>
          <hr>
        </div><br>
      <div class="container">
        <div class="row">
          <div class="col-lg-4 mx-auto">
              <div class="card text-center">
                <div class="card-body" style="background-color:#dd99ff">
                <form  action = "server/login.php" method = "POST">
                <div class="form-group">
                    <h4 style="color:#ffffff">Username</h4>
                    <input type="text" class="form-control" name="username" aria-describedby="Username" placeholder="Username">
                    
                </div>
                <div class="form-group">
                    <h4 style="color:#ffffff">Password</h4>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-secondary">เข้าสู่ระบบ</button>
            </form>
                </div>
              </div>
            <div class="badges"></div>
          </div>
        </div>
      </div>
    </section>

    <section class="features" id="register" style="background-color:#d9d9d9;">
      <div class="container">
        <div class="section-heading text-center">
        <h2 class="text-center text-uppercase text-secondary mb-0" >สมัครสมาชิก</h2>
          <hr>
        </div>
        <div class="card" style="background-color:#dd99ff">
          <div class="card-body">
          <form action="server/register.php" method="POST">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <div class="control-group">
                <h5 style="color:#ffffff" >ประเภท</h5>
                <select class="form-control" name="type" required>
                  <option disabled selected value="">เลือกประเภท</option>
                  <option value="1">ผู้ส่ง Conference</option>
                  <option value="3">ผู้เข้าร่วมการประชุม</option>
                </select>
                <br>
                            
              </div>
                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                            <h5 style="color:#ffffff">Username *</h5>
                            <input class="form-control" name="username" type="text" placeholder="Username" required="required" data-validation-required-message="Please enter your username.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="col-lg-6 mx-auto">
                            <h5 style="color:#ffffff">Password *</h5>
                            <input class="form-control" name="password" type="password" placeholder="Password" required="required" data-validation-required-message="Please enter your password.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="col-lg-6 mx-auto"></div>
                        <div class="col-lg-6 mx-auto">
                            <h5 style="color:#ffffff">ยืนยัน password</h5>
                            <input class="form-control" name="conpassword" type="password" placeholder="ยืนยัน password" required="required" data-validation-required-message="Please enter your Confirm password.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                            <h5 style="color:#ffffff">ชื่อ ** </h5>
                            <input class="form-control" name="fname" type="text" placeholder="ชื่อ" required="required" data-validation-required-message="Please enter your firstname.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="col-lg-6 mx-auto">
                            <h5 style="color:#ffffff">นามสกุล ** </h5>
                            <input class="form-control" name="lname" type="text" placeholder="นามสกุล" required="required" data-validation-required-message="Please enter your lastname.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <div class="row">
                <div class="col-lg-4 mx-auto">
                        <h5 style="color:#ffffff">เพศ</h5>
                        <select class="form-control" name="gender" required>
                            <option disabled selected > เพศ </option>
                            <option value="male">ชาย</option>
                            <option value="female">หญิง</option>
                        </select>
                        </div>
                        <div class="col-lg-8 mx-auto">
                            <h6 style="color:#ffffff">บริษัทในเครือ (You Institute, e.g. "Suan Sunandha Rajabhat University")</h6>
                            <input class="form-control" name="address" type="text" placeholder="บริษัทในเครือ" required="required" data-validation-required-message="Please enter your affiliate.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                            <h5 style="color:#ffffff">Email ** </h5>
                            <input class="form-control" name="email" type="text" placeholder="Email" required="required" data-validation-required-message="Please enter your Email.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="col-lg-6 mx-auto">
                            <h5 style="color:#ffffff">ยินยัน email ** </h5>
                            <input class="form-control" name="conemail" type="text" placeholder="ยืนยัน email" required="required" data-validation-required-message="Please enter your Confirm email.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="col col-lg-12 mx-auto">
                            <h5 style="color:#ffffff">สมาชิก</h5>
                            <textarea class="form-control" placeholder="สมาชิก" name="member" rows="3"></textarea>
                        </div>
                    </div>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="form-group">
                <button type="submit" class="btn btn-secondary btn-xl"  name="r_b">ตกลง</button>
              </div>
            </form>    
          </div>
        </div>
       
      </div>
    </section>


    <footer>
    <div class="container">
        <h2 style="color:white">เอกสารที่เกี่ยวข้อง</h2>
        <div class="row">
          <div class="col-md-6">
          <ul class="list-inline list-social">
          <li>
          <div class="text-center">
                <?php while($r1 = mysqli_fetch_array($q_a)){ ?>
                  <a class=" text-center" target="_blank" href="<?php echo $r1['url']; ?>"><?php echo $r1['text']; ?></a><br>
                <?php } ?>
              </div>
          </li>
        </ul>
      </div>
      <div class="col-md-6">
        <ul class="list-inline list-social">
          <li>
          <div class="text-center">
                <?php while($r2 = mysqli_fetch_array($q_b)){ ?>
                  <a class=" text-center" target="_blank" href="uploads/<?php echo $r2['url']; ?>"><?php echo $r2['text']; ?></a><br>
                <?php } ?>
              </div>
          </li>
        </ul>
        </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-4"></div>
          <div class="col-lg-4">
            <?php 
              //htis site is show footer.
              $r_3 = mysqli_fetch_array($q3);
              echo $r_3['footer'];
            ?>
          </div><!-- content -->
          <div class="col-lg-4"></div>
        </div>
        <p>&copy; Your Website 2018. All Rights Reserved.</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/new-age.min.js"></script>

  </body>

</html>
