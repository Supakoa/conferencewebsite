<?php
require 'server/server.php';
// if($_SESSION['status'] != 1){
//   $_SESSION['online'] = 0 ;
//   header("Location: index.php");
// }
// //$id = $_SESSION['id'];
// // $_SESSION['id'] = 'singha';
// $id = $_SESSION['id'];
// $q = "SELECT paper.paper_id,paper.name_th,status_tb.status FROM paper,user_paper,user,status_tb WHERE paper.paper_id = user_paper.paper_id AND user.username = '$id' AND paper.status = status_tb.id";
// $result = mysqli_query($con, $q);
// $q_money = "SELECT paper.money_status,paper.tmp_money,paper.paper_id, paper.name_th, paper.name_eng, paper.abstract, paper.key_word,user.first_name,user.last_name,status_tb.status FROM paper,user,user_paper,status_tb WHERE paper.paper_id = user_paper.paper_id AND user.username = user_paper.username AND status_tb.id = paper.money_status AND paper.status = 2";
// $result_money = mysqli_query($con, $q_money);

// $q_name = "SELECT `first_name`,`last_name`,`role` FROM `user` WHERE `username`= '$id' ";
// $result_name = mysqli_query($con, $q_name);
// $r_name = mysqli_fetch_assoc($result_name);

// $q_paper_time = "SELECT * FROM `setting_timmer` WHERE `order` = 1 ";
// $result_paper_time = mysqli_query($con, $q_paper_time);
// $r_paper_time = mysqli_fetch_assoc($result_paper_time);

// $q_pay_time = "SELECT * FROM `setting_timmer` WHERE `order` = 2 ";
// $result_pay_time = mysqli_query($con, $q_pay_time);
// $r_pay_time = mysqli_fetch_assoc($result_pay_time);

// date_default_timezone_set("Asia/Bangkok");
// $today = date('Y-m-d'); 
// $paper_start = $r_paper_time['time_start'];
// $paper_end = $r_paper_time['time_end']; 
// $pay_start = $r_pay_time['time_start'];
// $pay_end = $r_pay_time['time_end'];


// if($r_name['role']!=1){
//   $_SESSION['online'] = 0 ;
//   header("Location: index.php");
// }

// //footer
// $a3 = "SELECT * FROM banner ";
// $q3 = mysqli_query($con,$a3);
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


    <!-- Plugin CSS -->
    <link rel="stylesheet" href="device-mockups/device-mockups.min.css">

    <!-- Custom styles for this template -->
    <link href="css/new-age.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top" style="font-size:25px">55555555555555555</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#first" style="font-size:20px">ข้อมูลส่วนตัว</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#second" style="font-size:20px">ช่องทางการจ่ายเงิน</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="server/logout.php" style="font-size:20px">ออกจากระบบ</a>
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
              <h1 class="mb-5" >การประชุมวิชาการ สำนักการศึกษาทั่วไป <br> CONFERENCE <br> GE SSRU</h1>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section class="text-center" id="first" style="background-color:#d9d9d9;">
      <div class="container">
      <h2 class="text-center text-uppercase text-secondary mb-0">ข้อมูลส่วนตัว</h2>
            <hr class="star-dark mb-5">
                <div class="card">
                    <h5 class="card-title">ข้อมูล</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6" style="text-align:left">
                                <h5>ประเภท :</h5>
                            </div>
                            <div class="col-lg-6" style="text-align:left"> 
                                <span>asd</span>
                            </div>
                            <div class="col-lg-6" style="text-align:left">
                                <h5>ชื่อ-นามสกุล :</h5>
                            </div>
                            <div class="col-lg-6" style="text-align:left">
                                <span>โก๊ะ เอง</span>
                            </div>
                            <div class="col-lg-6" style="text-align:left">
                                <h5>เพศ :</h5>
                            </div>
                            <div class="col-lg-6" style="text-align:left">
                                <span>asd</span>
                            </div>
                            <div class="col-lg-6" style="text-align:left">
                                <h5>E-mail :</h5>
                            </div>
                            <div class="col-lg-6" style="text-align:left">
                                <span>asdasd@fgfdipojgp.co.co</span>
                            </div>
                            <div class="col-lg-6" style="text-align:left">
                                <h5>สมาชิก :</h5>
                            </div>
                            <div class="col-lg-6" style="text-align:left">
                                <span>1.fdsf 2.dsfsd 3.dfsd</span>
                            </div>
                        
                        </div>
                    </div>
                </div>  
        </div>
      </div>
    </section>

    <section class="text-center" id="second" style="background-color:#d9d9d9;">
      <div class="container">
      <h2 class="text-center text-uppercase text-secondary mb-0">ช่องทางการจ่ายเงิน</h2>
            <hr class="star-dark mb-5">
            <div class="card">
                <h5 class="card-title">ช่องทางการจ่ายเงิน</h5>
                <div class="card-body">
                    <div class="row">
                            <div class="col-lg-6" style="text-align:left">
                                <h5>ธนาคารกรุงเทพ :</h5>
                            </div>
                            <div class="col-lg-6" style="text-align:left">
                                <span>546-4678-153</span>
                            </div>
                            <div class="col-lg-6" style="text-align:left">
                                <h5>ธนาคารกสิกร :</h5>
                            </div>
                            <div class="col-lg-6" style="text-align:left">
                                <span>487984-54984-210</span>
                            </div>
                            <div class="col-lg-6" style="text-align:left">
                                <h5>ธนาคารไทยพาณิช :</h5>
                            </div>
                            <div class="col-lg-6" style="text-align:left">
                                <span>123-488-8791</span>
                            </div>
                    </div>
                </div>
            </div>
        </div><br>
        <label>(รูปภาพ)</label>
        <button type="file" class="btn btn-md btn-info">อัพโหลดใบเสร็จ</button>
      </div>
    </section>
  

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <?php 
              //htis site is show footer.
              $r_3 = mysqli_fetch_array($q3);
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
    $(document).ready( function () {
    $('#table_id').DataTable();
    } );
    $(document).ready( function () {
    $('#table').DataTable();
    } );
    </script>

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/new-age.min.js"></script>

  </body>

</html>
