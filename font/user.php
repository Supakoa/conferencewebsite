<?php
require 'server/server.php';
if($_SESSION['status'] != 1){
  $_SESSION['online'] = 0 ;
  header("Location: index.php");
}
//$id = $_SESSION['id'];
// $_SESSION['id'] = 'singha';
$id = $_SESSION['id'];
$q = "SELECT paper.paper_id,paper.name_th,status_tb.status FROM paper,user_paper,user,status_tb WHERE paper.paper_id = user_paper.paper_id AND user.username = '$id' AND paper.status = status_tb.id";
$result = mysqli_query($con, $q);
$q_money = "SELECT paper.money_status,paper.tmp_money,paper.paper_id, paper.name_th, paper.name_eng, paper.abstract, paper.key_word,user.first_name,user.last_name,status_tb.status FROM paper,user,user_paper,status_tb WHERE paper.paper_id = user_paper.paper_id AND user.username = user_paper.username AND status_tb.id = paper.money_status AND paper.status = 2";
$result_money = mysqli_query($con, $q_money);

$q_name = "SELECT `first_name`,`last_name`,`role` FROM `user` WHERE `username`= '$id' ";
$result_name = mysqli_query($con, $q_name);
$r_name = mysqli_fetch_assoc($result_name);

if($r_name['role']!=1){
  $_SESSION['online'] = 0 ;
  header("Location: index.php");
}


?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Conference -User Website</title>
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
        <a class="navbar-brand js-scroll-trigger" href="#page-top" style="font-size:25px"><?php echo $r_name['first_name']." ".$r_name['last_name'] ?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#first" style="font-size:20px">เอกสาร</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#second" style="font-size:20px">เพิ่มเอกสาร</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#third" style="font-size:20px">จ่ายเงิน</a>
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
      <h2 class="text-center text-uppercase text-secondary mb-0">เอกสาร</h2>
            <hr class="star-dark mb-5">
            <table id="table_id" class="table responsive display">
                <thead>
                    <tr>
                        <th>รหัสเอกสาร</th>
                        <th>คำนำ</th>
                        <th>สถานะ</th>
                        <th>แก้ไข</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_array($result)) {
                   $id_paper = $row["paper_id"];
                    
                  ?>
                  <tr>
                       <td><?php echo $row['paper_id'] ?></td>
                        <td><?php echo $row['name_th'] ?></td>
                        <td><?php echo $row['status'] ?></td>
                        <td> 

                        <?php 
                        if($row['status']=="ผ่าน"||$row['status']=="ไม่ผ่าน"){
                            require 'modal/modal.php';
                        }
                          elseif($row['status']=="แก้ไข"){
                            require 'modal/modal2.php';
                          }
                          else{
                            
                          }
                        ?>

                         
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
      </div>
    </section>

    <section class="features" id="second" style="background-color:#d9d9d9;">
      <div class="container">
      <h2 class="text-center text-uppercase text-secondary mb-0">เพิ่มเอกสาร</h2>
        <hr class="star-dark mb-5">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <div class="card">
              <div class="card-body" style="background-color:#cc66ff">
              <form action = "server/insert_paper.php" method ="POST" enctype="multipart/form-data">
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <h5 style="color:#ffffff">ไฟล์เอกสาร</h5>
                        <input class="form-control" name="paper" type="file" placeholder="File" required="required">
                    </div>
                </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <h5 style="color:#ffffff">ชื่อเอกสาร (Thailand)</h5>
                  <input class="form-control" name="paper_th" type="text" placeholder="ชื่อเอกสาร thai" required="required" data-validation-required-message="Please enter your Paper name thai.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <h5 style="color:#ffffff">ชื่อเอกสาร (English)</h5>
                  <input class="form-control" name="paper_eng" type="text" placeholder="ชื่อเอกสาร English " required="required" data-validation-required-message="Please enter your Paper name english.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <h5 style="color:#ffffff">บทความ</h5>
                  <textarea class="form-control" name="abstract" rows="5" placeholder="บทความ" required="required" data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <h5 style="color:#ffffff">คำหลัก</h5>
                  <input class="form-control" name="keyword" type="text" placeholder="คำหลัก" required="required" data-validation-required-message="Please enter your Keyword.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
           

              <br>
              
              <div class="form-group text-center" >
                <button type="submit" class="btn btn-secondary btn-md" id="sendMessageButton">ส่ง</button>
              </div>
            </form>
              </div>
            </div>
            
            
          </div>
        </div>
      </div>
    </section>

           <section class="text-center" id="third" style="background-color:#d9d9d9;">
      <div class="container">
      <h2 class="text-center text-uppercase text-secondary mb-0">จ่ายเงิน</h2>
            <hr class="star-dark mb-5">
            <table id="table" class="table responsive display">
                <thead>
                    <tr>
                        <th>รหัสเอกสาร</th>
                        <th>คำนำ</th>
                        <th>สถานะการจ่าย</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($row_money = mysqli_fetch_assoc($result_money)) {
                   $id_paper = $row_money["paper_id"];
                    
                  ?>
                  <tr>
                       <td><?php echo $row_money['paper_id'] ?></td>
                        <td><?php echo $row_money['name_th'] ?></td>
                        <td><?php echo $row_money['status'] ?></td>
                        <td> 

                        <?php 
                        if($row_money['money_status']=="7"||$row_money['money_status']=="4"){
                            require 'modal/modal_money.php';
                        }
                         
                        ?>

                         
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
      </div>
    </section>               
   

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-4"></div>
          <div class="col-lg-4">
            ใส่ตรงนี้
          </div><!-- content -->
          <div class="col-lg-4"></div>
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
