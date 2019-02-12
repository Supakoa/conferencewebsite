<?php
require 'server/server.php';
if ($_SESSION['status'] != 1) {
    // $_SESSION['online'] = 0;
    $_SESSION['alert'] = 2;
    header("Location: index.php");
    exit();
}

// $_SESSION['id'] = 'singha';
$id = $_SESSION['id'];
$q = "SELECT * FROM `user` WHERE `username` = '$id' ";
$result = mysqli_query($con, $q);
$row = mysqli_fetch_assoc($result);
$q_name = "SELECT `first_name`,`last_name`,`role` FROM `user` WHERE `username`= '$id' ";
$result_name = mysqli_query($con, $q_name);
$r_name = mysqli_fetch_assoc($result_name);

$q_bill = "SELECT * FROM `bill_guest`  WHERE `username`= '$id' ";
$result_bill = mysqli_query($con, $q_bill);
$r_bill = mysqli_fetch_assoc($result_bill);

$q_pay_time = "SELECT * FROM `setting_timmer` WHERE `order` = '3' ";
$result_pay_time = mysqli_query($con, $q_pay_time);
$r_pay_time = mysqli_fetch_assoc($result_pay_time);

date_default_timezone_set("Asia/Bangkok");
$today = date('Y-m-d');
$pay_start = $r_pay_time['time_start'];
$pay_end = $r_pay_time['time_end'];


$status = $r_bill['status'];
if ($r_name['role'] != 3) {
    $_SESSION['alert'] = 2;
    header("Location: index.php");
    exit();
}

//footer
$a3 = "SELECT * FROM banner ";
$q3 = mysqli_query($con, $a3);
$r_3 = mysqli_fetch_array($q3);


if (isset($_POST['gogo'])) {
    $ext = pathinfo(basename($_FILES["money"]["name"]), PATHINFO_EXTENSION);
    $new_taget_name = 'Bill_' . uniqid() . "." . $ext;
    $target_path = "../Bill/";
    $upload_path = $target_path . $new_taget_name;
    $uploadOk = 1;

    $imageFileType = strtolower(pathinfo($new_taget_name, PATHINFO_EXTENSION));

    if ($_FILES["money"]["size"] > 8000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "pdf" && $imageFileType != "jpg" && $imageFileType != "png") {
        echo "Sorry, only PDF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if ($pay_start <= $today && $today <= $pay_end) {



            if (move_uploaded_file($_FILES["money"]["tmp_name"], $upload_path)) {
                echo 'Move success.<br>';
            } else {
                echo 'Move fail';
            }


            $paper = $_FILES["money"]["name"];
            $b = $new_taget_name;

            $a = "UPDATE `bill_guest` SET `tmp_name`='$b',`status`='6' WHERE `username` = '$id' ;";

            $r_a = mysqli_query($con, $a);

            if ($r_a) {
                $_SESSION['alert'] = 3;
            } else {
                // แสดงข้อความว่าผิดพลาด
                $_SESSION['alert'] = 4;
            }
        } else {

            $_SESSION['alert'] = 18;
            
        }
        header("Location: guest.php");
        exit();
      }
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Conference -guest Website</title>
        <link rel="stylesheet" href="DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
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

    <body id="page-top">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
               <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse text-center" id="navbarResponsive">
                <a class="navbar-brand js-scroll-trigger" href="#page-top" style="font-size:20px">ผู้เข้าร่วมการประชุมวิชาการ</a>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#first" style="font-size:20px">ข้อมูลส่วนตัว</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#second" style="font-size:20px">การชำระค่าบริการ</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="server/logout.php" style="font-size:20px">ออกจากระบบ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- <header class="masthead" >
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-lg-12 my-auto">
                        <div class="header-content mx-auto">
                            <h1 class="mb-5" >การประชุมวิชาการ สำนักวิชาการศึกษาทั่วไป <br> CONFERENCE <br> GE SSRU</h1>
                        </div>
                    </div>
                </div>
            </div>
        </header> -->
        <img src="../back/pages/banner/<?php echo $r_3['tmp_name'] ?>" class="img-responsive" alt="" style="width:100%" srcset="">
        <section class="text-center" id="first" style="background-color:#F6F8FA;">
            <div class="container">
                <h3 class="text-center text-uppercase text-secondary mb-0">ข้อมูลส่วนตัว</h3>
                <br>
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6" style="text-align:left">
                                            <h5>ประเภท :</h5>
                                        </div>
                                        <div class="col-lg-6" style="text-align:left"> 
                                            <label>ผู้เข้าร่วมการประชุมวิชาการ</label>
                                        </div>
                                        <div class="col-lg-6" style="text-align:left">
                                            <h5>ชื่อ-นามสกุล :</h5>
                                        </div>
                                        <div class="col-lg-6" style="text-align:left">
                                            <label><?php echo $row['first_name'] . "  " . $row['last_name']; ?></label>
                                        </div>
                                        <div class="col-lg-6" style="text-align:left">
                                            <h5>เพศ :</h5>
                                        </div>
                                        <div class="col-lg-6" style="text-align:left">
                                            <label><?php echo $row['gender']; ?></label>
                                        </div>
                                        <div class="col-lg-6" style="text-align:left">
                                            <h5>E-mail :</h5>
                                        </div>
                                        <div class="col-lg-6" style="text-align:left">
                                            <label><?php echo $row['email']; ?></label>
                                        </div>
                                        <div class="col-lg-6" style="text-align:left">
                                            <h5>สถานะการชำระค่าบริการ :</h5>
                                        </div>
                                        <div class="col-lg-6" style="text-align:left">
                                            <label><?php
                                            $status = $r_bill['status'];
                                            if ($status == '6') {
                                                echo "รอการตรวจสอบจากเจ้าหน้าที่";
                                            } elseif ($status == '4') {
                                                echo "แก้ไขหลักฐานการชำระค่าบริการ";
                                            } elseif ($status == '7') {
                                                echo "ยังไม่ได้ชำระ";
                                            } elseif ($status == '8') {
                                                echo "ชำระแล้ว";
                                            } else {
                                                
                                            }
                                            ?></label>
                                        </div>
                                    </div>
                            </div>
                        </div>  
                    </div>
                    <div class="col-lg-1"></div>
                </div>
            </div><br><br>
        </section>
<?php if ($status == '4' || $status == '7') { ?>
            <section class="text-center" id="second" style="background-color:#F6F8FA;">
                <div class="container">
                    <h3 class="text-center text-uppercase text-secondary mb-0">ช่องทางการชำระค่าบริการ <i class="fa fa-university" aria-hidden="true"></i></h3>
                    <br>
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6" style="text-align:center">
                                            <h5>ธนาคารกรุงเทพ :</h5>
                                        </div>
                                        <div class="col-lg-6" style="text-align:left">
                                            <label>546-4678-153</label>
                                        </div>
                                        <div class="col-lg-6" style="text-align:center">
                                            <h5>ธนาคารกสิกร :</h5>
                                        </div>
                                        <div class="col-lg-6" style="text-align:left">
                                            <label>487984-54984-210</label>
                                        </div>
                                        <div class="col-lg-6" style="text-align:center">
                                            <h5>ธนาคารไทยพาณิช :</h5>
                                        </div>
                                        <div class="col-lg-6" style="text-align:left">
                                            <label>123-488-8791</label>
                                        </div>
                                        <div class="col-lg-12" style="text-align:left">
                                            <br>
                                        </div>
                                        <div class="col-lg-12" style="text-align: right">
                                            <label>โอนแล้ว กรุณาส่งหลักฐานการโอนด้านล่าง</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                    </div>
                </div><br>

                <h3 class="text-center text-uppercase text-secondary mb-0">หลักฐานการชำระค่าบริการ</h3><br>
                <form action="guest.php" method="post"  enctype="multipart/form-data" >
                    <input type="file" name="money" accept=".jpg,.png" required>
                    <button type="submit" name = "gogo"class="btn btn-md btn-info">อัพโหลดใบเสร็จ</button>
                </form>
                        <br><br>
            </section>
<?php } else { ?>
            <section class="text-center" id="second" style="background-color:#F6F8FA;">
                <div class="container">
                    <h3 class="text-center text-uppercase text-secondary mb-0">หลักฐานการชำระค่าบริการ</h3><br>
                    <div class="card">
                        <br>
                        <div class="row">
                            <div class="col-lg-12" style="text-align:center">
                                <img src="../bill/<?php echo $r_bill['tmp_name'] ?>" class="img-responsive" alt="Bill" style="text-align:center;width:auto;height:500px;" >
                            </div>
                            <br>
                            <div class="col-lg-12" style="text-align:center">
                                <h2>
                                    <br>
    <?php
    if ($status == '6') {
        echo "รอการตรวจสอบจากเจ้าหน้าที่";
    } elseif ($status == '8') {
        echo "ชำระแล้ว";
    }
    ?>
                                </h2>
                            </div>
                        </div>   
                    </div>
                </div><br><br>
            </section>

    <?php }
?>
        <footer>
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

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="DataTables/datatables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#table_id').DataTable();
            });
            $(document).ready(function () {
                $('#table').DataTable();
            });
        </script>

        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for this template -->
        <script src="js/new-age.min.js"></script>
        <!-- php check alert -->
<?php
require '../alert.php';
?>
    </body>

</html>
