<?php
require 'server/server.php';
// $_SESSION['id'] = '123456';
$id = $_SESSION['id'];
// $id = "321654";
  
if (!isset($_SESSION['status'])) {
  // $_SESSION['online'] = 0;
  $_SESSION['alert'] = 2;
  header("Location: index.php");
}

$q1 = "SELECT paper.paper_id,paper.name_th,status_tb.status 
FROM paper,reviewer_paper,user,status_tb,reviewer_answer
WHERE paper.paper_id = reviewer_paper.paper_id 
  AND user.username = '$id' 
  AND paper.status = status_tb.id 
  AND paper.status = '1' 
  And reviewer_paper.reviewer = '$id'  
  AND (reviewer_answer.reviewer_id = '$id' 
  AND reviewer_answer.paper_id = paper.paper_id 
  AND reviewer_answer.status IS NULL)  ";
$result1 = mysqli_query($con, $q1); 

$q2 = "SELECT paper.paper_id,paper.name_th,status_tb.status 
FROM paper,reviewer_paper,user,status_tb 
WHERE paper.paper_id = reviewer_paper.paper_id 
  AND user.username = '$id' 
  AND paper.status = status_tb.id 
  AND paper.status != '1'  
  And reviewer_paper.reviewer = '$id' ";
$result2 = mysqli_query($con, $q2);
$q_name = "SELECT `first_name`,`last_name`,`role` FROM `user` WHERE `username`= '$id' ";
$result_name = mysqli_query($con, $q_name);
$r_name = mysqli_fetch_assoc($result_name);

  if($r_name['role']!=2){
    $_SESSION['online'] = 0 ;
    header("Location: index.php");
  }
  //footer
  $a3 = "SELECT * FROM banner ";
  $q3 = mysqli_query($con,$a3);
  $r_3 = mysqli_fetch_array($q3);
?>



<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Conference -Reviewer Website</title>
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
    <!-- <link rel="stylesheet" href="device-mockups/device-mockups.min.css"> -->

    <!-- Custom styles for this template -->
    <link href="css/new-age.css" rel="stylesheet">

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
        <a class="navbar-brand js-scroll-trigger" href="#page-top" style="font-size:25px"><?php echo $r_name['first_name']." ".$r_name['last_name'] ?></a>
          <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#uncheck" style="font-size:20px">ยังไม่ได้ตรวจ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#check" style="font-size:20px">ตรวจแล้ว</a>
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
              <img class="img-responsive" src="..." alt="Chania" > 
              <h1 class="mb-5" >การประชุมวิชาการ สำนักวิชาการศึกษาทั่วไป</h1>
            </div>
          </div>
        </div>
      </div>
    </header> -->
    <img src="../back/pages/banner/<?php echo $r_3['tmp_name'] ?>" class="img-responsive" alt="" style="width:100%" srcset="">


    <section class="text-center" id="uncheck" style="background-color:#F6F8FA;">
      <div class="container">
        <div class="section-heading text-center">
        <h2 class="text-center text-uppercase text-secondary mb-0">ยังไม่ได้ตรวจ</h2>
        </div>
        <div class="row">
        <div class="col-lg-10 mx-auto">
        <div class="table-responsive-lg">
        <table id="table1" class="table display">
                <thead>
                    <tr>
                        <th>รหัสเอกสาร</th>
                        <th>คำนำ</th>
                        <th>สถานะ</th>
                        <th>แก้ไข</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row1 = mysqli_fetch_array($result1)) {
                      $id_paper = $row1["paper_id"];

                    ?>
                  <tr>
                       <td><?php echo $row1['paper_id'] ?></td>
                        <td><?php echo $row1['name_th'] ?></td>
                        <td><?php echo $row1['status'] ?></td>
                        <td> 
                        <?php 
                          require 'modal/modal3.php';
                        ?> 
                        </td>
                    </tr>
                <?php 
            } ?>
                </tbody>
            </table>
        </div>
                
        </div>
        </div>
      </div><br><br>
    </section>

     <section class="text-center" id="check" style="background-color:#F6F8FA;">
            <div class="container">
            <h2 class="text-center text-uppercase text-secondary mb-0">ตรวจแล้ว</h2>
              <div class="row">
              <div class="col-lg-10 mx-auto ">
                  <div class="table-responsive-lg">
                  <table id="table2" class="table display">
                  <thead>
                      <tr>
                          <th>รหัสเอกสาร</th>
                          <th>คำนำ</th>
                          <th>สถานะ</th>
                          <th>แก้ไข</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php while ($row2 = mysqli_fetch_array($result2)) {
                      $id_paper = $row2["paper_id"];

                      ?>
                    <tr>
                        <td><?php echo $row2['paper_id'] ?></td>
                          <td><?php echo $row2['name_th'] ?></td>
                          <td><?php echo $row2['status'] ?></td>
                          <td> 

                          <?php 
                          require 'modal/modal4.php';
                          ?>

                          
                          </td>
                      </tr>
                  <?php 
                  } ?>
                  </tbody>
                  </table>
                  </div>
            </div>
          </div>
        </div><br><br>
    </section>

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
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>

      $(document).ready( function () {
      $('#table1').DataTable();
      } );

      $(document).ready( function () {
      $('#table2').DataTable();
      } );

    </script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/new-age.min.js"></script>

  </body>

</html>
