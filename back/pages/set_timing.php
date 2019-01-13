<?php
    require 'server.php';
    require 'server/check_login.php';

    if(isset($_POST['update'])){
        //paper
        $a = $_POST['start_paper'];
        $b = $_POST['end_paper'];
        //slip(paper)
        $c = $_POST['start_slip1'];
        $d = $_POST['end_slip1'];
        //slip(view)
        $h = $_POST['start_slip2'];
        $i = $_POST['end_slip2'];

        $s1 = "UPDATE `setting_timmer` SET `time_start`='$a',`time_end`='$b' WHERE `order` = '1' ";
        $s2 = "UPDATE `setting_timmer` SET `time_start`='$c',`time_end`='$d' WHERE `order` = '2' ";
        $s3 = "UPDATE `setting_timmer` SET `time_start`='$h',`time_end`='$i' WHERE `order` = '3' ";

        if($q1 = mysqli_query($con,$s1)){
            $_SESSION['alert'] = 3;
        }
        else{
            $_SESSION['alert'] = 4;
        }
        
        if($q2 = mysqli_query($con,$s2)){
            $_SESSION['alert'] = 3;
        }
        else{
            $_SESSION['alert'] = 4;
        }

        if($q3 = mysqli_query($con,$s3)){
            $_SESSION['alert'] = 3;
        }
        else{
            $_SESSION['alert'] = 4;
        }

    }

    $st =  "SELECT * FROM `setting_timmer` WHERE `order` = '1'";
    $st2 = "SELECT * FROM `setting_timmer` WHERE `order` = '2'";
    $st3 = "SELECT * FROM `setting_timmer` WHERE `order` = '3'";

    $q_t = mysqli_query($con,$st);
    $q_t2 = mysqli_query($con,$st2);
    $q_t3 = mysqli_query($con,$st3);

    $r_t = mysqli_fetch_array($q_t);
    $r_t2 = mysqli_fetch_array($q_t2);
    $r_t3 = mysqli_fetch_array($q_t3);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin  - Admin Conference page Money</title>
    <link rel="stylesheet" href="../DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css"/>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Mitr:400,500" rel="stylesheet">
    
    <!-- sweet alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="../../sweetalert2/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../../sweetalert2/dist/sweetalert2.min.css">
    

</head>

<body style="font-family: 'Mitr', sans-serif;">

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php require 'setup/main.php' ?>

            <?php require 'setup/menu.php' ?>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
            <h1 class="page-header">ตั้งค่าเวลา</h1>

                <div class="col-lg-12">
                </div>
                <form action="set_timing.php" method="post">

                <div class="col-lg-6">
                <h3>เอกสาร</h3>
                    <span>เวลาเริ่มอัพโหลดเอกสาร : </span>
                    <input class="form-control" type="date" name="start_paper" value="<?php echo $r_t['time_start'] ?>"><br>
                    <span>เวลาสิ้นสุดอัพโหลดเอกสาร : </span>
                    <input class="form-control" type="date" name="end_paper" value="<?php echo $r_t['time_end'] ?>"><br><br>
                </div>

                <div class="col-lg-6">
                <h3>ใบเสร็จ(เอกสาร)</h3>
                    <span>เวลาเริ่มอัพโหลดใบเสร็จ : </span>
                    <input class="form-control" type="date" name="start_slip1" value="<?php echo $r_t2['time_start'] ?>"><br>
                    <span>เวลาสิ้นสุดอัพโหลดใบเสร็จ : </span>
                    <input class="form-control" type="date" name="end_slip1" value="<?php echo $r_t2['time_end'] ?>"><br><br>
                </div>

                <div class="col-lg-6">
                <h3>ใบเสร็จ(ผู้เข้าชม)</h3>
                    <span>เวลาเริ่มอัพโหลดใบเสร็จ : </span>
                    <input class="form-control" type="date" name="start_slip2" value="<?php echo $r_t3['time_start'] ?>"><br>
                    <span>เวลาสิ้นสุดอัพโหลดใบเสร็จ : </span>
                    <input class="form-control" type="date" name="end_slip2" value="<?php echo $r_t3['time_end'] ?>"><br><br>
                </div>
            </div>
                <div class="text-center">
                <button class=" btn btn-info" type="submit" name="update" >อัพเดท</button>
                </div><br>
                </form>
           

    </div>
    

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../DataTables/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7/dist/sweetalert2.all.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- php check alert -->
    <?php require '../../alert.php'; ?>
</body>

</html>
