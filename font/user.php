<?php
require 'server/server.php';
// require 'server/show_alert.php';
if ($_SESSION['status'] != 1) {
    $_SESSION['online'] = 0;
    $_SESSION['alert'] = 2;
    
     
    header("Location: index.php");
    exit();
}
//$id = $_SESSION['id'];
// $_SESSION['id'] = 'singha';
$id = $_SESSION['id'];
$q = "SELECT paper.paper_id,paper.name_th,status_tb.status FROM paper,user_paper,user,status_tb WHERE paper.paper_id = user_paper.paper_id AND user.username = '$id' AND user_paper.username = user.username AND paper.status = status_tb.id group by paper.paper_id";

$result = mysqli_query($con, $q);
$q_money = "SELECT paper.money_status,paper.tmp_money,paper.paper_id, paper.name_th, paper.name_eng, paper.abstract, paper.key_word,user.first_name,user.last_name,status_tb.status FROM paper,user,user_paper,status_tb WHERE paper.paper_id = user_paper.paper_id AND user.username = user_paper.username AND status_tb.id = paper.money_status AND paper.status = 2 AND user_paper.username = user.username group by paper.paper_id";
$result_money = mysqli_query($con, $q_money);

$q_name = "SELECT `first_name`,`last_name`,`role` FROM `user` WHERE `username`= '$id' ";
$result_name = mysqli_query($con, $q_name);
$r_name = mysqli_fetch_assoc($result_name);

$q_paper_time = "SELECT * FROM `setting_timmer` WHERE `order` = 1 ";
$result_paper_time = mysqli_query($con, $q_paper_time);
$r_paper_time = mysqli_fetch_assoc($result_paper_time);

$q_pay_time = "SELECT * FROM `setting_timmer` WHERE `order` = 2 ";
$result_pay_time = mysqli_query($con, $q_pay_time);
$r_pay_time = mysqli_fetch_assoc($result_pay_time);

date_default_timezone_set("Asia/Bangkok");
$today = date('Y-m-d');
$paper_start = $r_paper_time['time_start'];
$paper_end = $r_paper_time['time_end'];
$pay_start = $r_pay_time['time_start'];
$pay_end = $r_pay_time['time_end'];
$a3 = "SELECT * FROM banner ";
$q3 = mysqli_query($con, $a3);
$r_3 = mysqli_fetch_array($q3);


if ($r_name['role'] != '1') {
    $_SESSION['online'] = 0;
    header("Location: index.php");
}

//footer
$a3 = "SELECT * FROM banner ";
$q3 = mysqli_query($con, $a3);
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
                <a class="navbar-brand js-scroll-trigger" href="#page-top" style="font-size:25px"><?php echo $r_name['first_name'] . " " . $r_name['last_name'] ?></a>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#first" style="font-size:20px">ประวัติการส่งเอกสาร</a>
                        </li>
                        <?php if ($paper_start <= $today && $today <= $paper_end) { ?>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="#second" style="font-size:20px">เพิ่มเอกสาร</a>
                            </li>
                        <?php }
                        ?>
                        <?php if ($pay_start <= $today && $today <= $pay_end) { ?>
                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="#third" style="font-size:20px">จ่ายเงิน</a>
                            </li>
                        <?php }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="server/logout.php" style="font-size:20px">ออกจากระบบ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- 
              <header class="masthead" >
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

        <img src="../back/pages/banner/<?php echo $r_3['tmp_name'] ?>" class="img-responsive" alt="" style="width:100%;" srcset="">

        <section class="text-center" id="first" style="background-color:#F6F8FA;">
            <div class="container">
                <h2 class="text-center text-uppercase text-secondary mb-0">เอกสาร</h2>
                <div class="table-responsive-lg">
                    <table id="table_id" class="table display">
                        <thead>
                            <tr>
                                <th>รหัสเอกสาร</th>
                                <th>ชื่อเรื่อง</th>
                                <th>สถานะ</th>
                                <th>แก้ไข</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                                $id_paper = $row["paper_id"];
                                ?>
                                <tr>
                                    <td><?php echo $row['paper_id'] ?></td>
                                    <td><?php echo $row['name_th'] ?></td>
                                    <td><?php
                                      if ($row['status'] == "รอผลการตรวจสอบ" || $row['status'] == "รอผลจากแอดมิน" || $row['status'] == "ยังไม่ได้เลือกผู้ตรวจ") {
                                        echo "รอผลการตรวจสอบ";
                                      }
                                      else{
                                        echo $row['status'] ;
                                      }

                                                                       
                                     ?></td>
                                    <td> 

                                        <?php
                                            if ($row['status'] == "ผ่าน" || $row['status'] == "ไม่ผ่าน") {
                                                require 'modal/modal.php';
                                            } elseif ($row['status'] == "แก้ไข") {
                                                require 'modal/modal2.php';
                                            } else {
                                                
                                            }
                                        ?>


                                    </td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div><br><br>
    </section>
    <?php if ($paper_start <= $today && $today <= $paper_end) { ?>


        <section class="features" id="second" style="background-color:#F6F8FA;">
            <div class="container">
                <h2 class="text-center text-uppercase text-secondary mb-0">เพิ่มเอกสาร</h2>
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="card">
                            <div class="card-body" style="background-color:#cc66ff">
                                <form action = "server/insert_paper.php" method ="POST" enctype="multipart/form-data">

                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <h5 style="color:#ffffff">ไฟล์เอกสาร(.Doc,.Docx)</h5>
                                            <input class="form-control" name="paper" type="file"  accept=".doc,.docx" placeholder="File" required="required">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <h5 style="color:#ffffff">ชื่อเอกสาร (Thai)</h5>
                                            <input class="form-control" name="paper_th" type="text" placeholder="ชื่อเอกสาร thai" pattern="^[ก-๛!-@[-`{-~\s]+$" title="กรุณากรอกชื่อภาษาไทย" required="required" data-validation-required-message="Please enter your Paper name thai.">
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                            <h5 style="color:#ffffff">ชื่อเอกสาร (English)</h5>
                                            <input class="form-control" name="paper_eng" type="text" placeholder="ชื่อเอกสาร English " pattern="^[!-~\s]+$" title="กรุณากรอกชื่อภาษาอังกฤษ" required="required" data-validation-required-message="Please enter your Paper name english.">
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
                                            <h5 style="color:#ffffff">คำเฉพาะ</h5>
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
            </div><br><br>
        </section>
    <?php }
    ?>
    <?php if ($pay_start <= $today && $today <= $pay_end) { ?>
        <section class="text-center" id="third" style="background-color:#F6F8FA;">
            <div class="container">
                <h2 class="text-center text-uppercase text-secondary mb-0">จ่ายเงิน</h2>
                <div class="table-responsive-lg">
                    <table id="table" class="table display">
                        <thead>
                            <tr>
                                <th>รหัสเอกสาร</th>
                                <th>คำนำ</th>
                                <th>สถานะการจ่าย</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row_money = mysqli_fetch_assoc($result_money)) {
                                $id_paper = $row_money["paper_id"];
                                ?>
                                <tr>
                                    <td><?php echo $row_money['paper_id'] ?></td>
                                    <td><?php echo $row_money['name_th'] ?></td>
                                    <td><?php echo $row_money['status'] ?></td>
                                    <td>
                                        <?php
                                            if ($row_money['money_status'] == "7" || $row_money['money_status'] == "4") {
                                                require 'modal/modal_money.php';
                                            }
                                        ?>
                                    </td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
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
    <?php require '../alert.php'; ?>
</body>

</html>
