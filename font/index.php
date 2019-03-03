<?php
    //connect database
    require 'server/server.php';

    //alert
    
    if (isset($_SESSION['check_login'])) {
        echo '<script>alert("กรุณา Login เข้าสู่ระบบ.");</script>';
        unset($_SESSION['check_login']);
    }
    if (isset($_SESSION['status'])) {
        if ($_SESSION['status'] == 0) {
            echo '<script>alert("Username หรือ Password ไม่ถูกต้อง.");</script>';
        }
    }
    if(!isset($_SESSION['status_admin'])){
        session_destroy();
    }
    

    $a = "SELECT * FROM show_url WHERE hide='0' && group_url = '1' ";
    $b = "SELECT * FROM show_url WHERE hide='0' && group_url = '2' ";
    $q_a = mysqli_query($con, $a);
    $q_b = mysqli_query($con, $b);

    $a3 = "SELECT * FROM banner ";
    $q3 = mysqli_query($con, $a3);
    $r_3 = mysqli_fetch_array($q3);
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

        

        <!-- Custom styles for this template -->
        <link href="css/new-age.css" rel="stylesheet">

        <!-- sweet alert 2 -->
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
        <script src="../sweetalert2/dist/sweetalert2.all.min.js"></script>
        <link rel="stylesheet" href="../sweetalert2/dist/sweetalert2.min.css">

    </head>

    <body id="page-top" >
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse text-center" id="navbarResponsive">
                <a class="navbar-brand js-scroll-trigger navbar-collapse" href="#page-top" style="font-size:25px" >CONFERENCE GE SSRU</a>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#login" style="font-size:20px">เข้าสู่ระบบ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#register" style="font-size:20px">สมัครสมาชิก</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#manual" style="font-size:20px">คู่มือการใช้งาน</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <img src="../back/pages/banner/<?php echo $r_3['tmp_name'] ?>" class="img-responsive" alt="" style="width:100%;heigth:auto" srcset="">

        <section class="text-center" id="login" style="background-color:#F6F8FA;">
            <div class="section-heading text-center">
                <h2 class="text-center text-uppercase text-secondary mb-0">เข้าสู่ระบบ</h2>
                <br>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mx-auto" >
                        <div class="card text-center" style="border-radius: 10px;">
                            <div class="card-body" style="background-color:#e766ff;border-radius: 10px;">
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
            </div><br><br>
        </section>

        <section class="" id="register" style="background-color:#F6F8FA;">
            <div class="section-heading text-center">
                    <h2 class="text-center text-uppercase text-secondary mb-0" >สมัครสมาชิก</h2>
                    <br>
                </div>
            <div class="container">
                <div class="card" style="background-color:#e766ff">
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
                                            <h5 for="username" style="color:#ffffff">Username *</h5>
                                            <input class="form-control" name="username" type="text" placeholder="Username" required="required" pattern="([!-~]{6,})" title="ขั้นต่ำ 6 ตัวอักษร เฉพาะภาษาอังกฤษ ตัวเลขหรือสัญญาลักษณ์พิเศษ" data-validation-required-message="Please enter your username.">
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        <div class="col-lg-6 mx-auto">
                                            <h5 for = "password" style="color:#ffffff">Password *</h5>
                                            <input class="form-control" name="password" type="password" placeholder="Password" required="required" pattern="(.{6,})" title="ขั้นต่ำ 6 ตัวอักษร" data-validation-required-message="Please enter your password.">
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        <div class="col-lg-6 mx-auto"></div>
                                        <div class="col-lg-6 mx-auto">
                                            <h5 for = "conpassword" style="color:#ffffff">ยืนยัน password</h5>
                                            <input class="form-control" name="conpassword" type="password" placeholder="ยืนยัน password" required="required" pattern="(.{6,})" title="ขั้นต่ำ 6 ตัวอักษร" data-validation-required-message="Please enter your Confirm password.">
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <div class="row">
                                        <div class="col-lg-6 mx-auto">
                                            <h5 style="color:#ffffff">ชื่อ ** (ไม่ต้องใส่คำนำหน้า) </h5>
                                            <input class="form-control" name="fname" type="text" placeholder="ชื่อ" required="required"  pattern="^[ก-๛!-@[-`{-~\s]+$" title="กรุณากรอกเฉพาะภาษาไทย" data-validation-required-message="Please enter your firstname.">
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        <div class="col-lg-6 mx-auto">
                                            <h5 style="color:#ffffff">นามสกุล ** </h5>
                                            <input class="form-control" name="lname" type="text" placeholder="นามสกุล" required="required"  pattern="^[ก-๛!-@[-`{-~\s]+$" title="กรุณากรอกเฉพาะภาษาไทย" data-validation-required-message="Please enter your lastname.">
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
                                            <select class="form-control" name="gender" required="required" >
                                                <option disabled selected value=""> เพศ </option>
                                                <option value="male">ชาย</option>
                                                <option value="female">หญิง</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-8 mx-auto">
                                            <h6 style="color:#ffffff">บริษัทในเครือ (You Institute, e.g. "Suan Sunandha Rajabhat University")</h6>
                                            <input class="form-control" name="address" type="text" placeholder="บริษัทในเครือ(สังกัด)"  data-validation-required-message="Please enter your affiliate.">
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
                                            <input class="form-control" name="email" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="ตัวอย่าง examble@email.com" placeholder="Email" required="required" data-validation-required-message="Please enter your Email.">
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        <div class="col-lg-6 mx-auto">
                                            <h5 style="color:#ffffff">ยินยัน email ** </h5>
                                            <input class="form-control" name="conemail" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="ตัวอย่าง examble@email.com" placeholder="ยืนยัน email" required="required" data-validation-required-message="Please enter your Confirm email.">
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        <div class="col-lg-12 mx-auto">
                                            <h5 style="color:#ffffff">เบอร์โทรศัพท์มือถือ **</h5>
                                            <input class="form-control" name="tel" type="text" maxlength="10" pattern="[0-9]{10}" title="ตัวอย่าง 0888888888" placeholder="เบอร์โทรศัพท์มือถือ **" required="required" data-validation-required-message="Please enter your Phone number.">
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        <div class="col col-lg-12 mx-auto">
                                            <h5 style="color:#ffffff">สมาชิก</h5>
                                            <textarea class="form-control" placeholder="รายชื่อสมาชิก(ถ้ามี)" name="member" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div id="success"></div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-secondary btn-lg"  name="r_b">ตกลง</button>
                            </div>
                        </form>    
                    </div>
                </div>

            </div>
        </section>

        <section id = "manual">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                    <h3 style="color:white">เว็บไซต์ที่เกี่ยวข้อง</h3>
                        <ul class="list-inline list-social">
                            <li>
                                <div class="text-center">
                                    <?php while ($r1 = mysqli_fetch_array($q_a)) { ?>
                                        <a class=" text-center" target="_blank" href="<?php echo $r1['url']; ?>"><?php echo $r1['text']; ?></a><br>
                                    <?php } ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                    <h3 style="color:white">เอกสารที่เผยแพร่</h3>
                        <ul class="list-inline list-social">
                            <li>
                                <div class="text-center">
                                    <?php while ($r2 = mysqli_fetch_array($q_b)) { ?>
                                        <a class=" text-center" target="_blank" href="uploads/<?php echo $r2['url']; ?>"><?php echo $r2['text']; ?></a><br>
                                    <?php } ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <?php
                        //htis site is show footer.

                        echo $r_3['footer'];
                        ?>
                    </div><!-- content -->
                    <div class="col-lg-3"></div>
                </div>
                <p>&copy; Your Website 2018. All Rights Reserved.</p>
            </div>
        </footer>
        </section>                                      
        

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for this template -->
        <script src="js/new-age.min.js"></script>

        <!-- php check alert -->
        <?php require '../alert.php'; ?>

    </body>

</html>
