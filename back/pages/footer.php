<?php
require 'server.php';
require 'server/check_login.php';
$q_banner = "SELECT * FROM `banner` ";
$result_banner = mysqli_query($con, $q_banner);
$row_banner = mysqli_fetch_array($result_banner);



if (isset($_POST['gogogo'])) {
    $a = $_POST['commentf'];
    $b = "UPDATE `banner` SET `footer`= '$a' WHERE `order`= '1' ";
    $q_b = mysqli_query($con, $b);
    if ($q_b) {
        $_SESSION['alert'] = 2;

    } else {
        $_SESSION['alert'] = 0;
    }
}
if (isset($_SESSION['alert'])) {
    if ($_SESSION['alert'] == 0) {
        echo '<script>alert("เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง.");</script>';
    } elseif ($_SESSION['alert'] == 1) {
        echo '<script>alert("อัพเดท Banner เรียบร้อย.");</script>';
    } elseif ($_SESSION['alert'] == 2) {
        echo '<script>alert("อัพเดท Footer เรียบร้อย.");</script>';
    }
    unset($_SESSION['alert']);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin  - Admin Conference page Footer</title>
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

    

</head>

<body style="font-family: 'Mitr', sans-serif;">

    <div id="wrapper" >
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php require 'setup/main.php' ?>

            <?php require 'setup/menu.php' ?>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
            <div class="row">
                    <h1 class="page-header">Footer</h1>
                    <br><h2 class="text-center">ตั้งค่า footer</h2>
                <div class="col-lg-12" style="text-align:center">
                    <form action="footer.php" method="POST">
                            <textarea class="form-control"  name="commentf" cols="100" rows="10" ><?php echo $row_banner['footer'] ?></textarea>   
                                <br><br>
                    
                    <br>
                </div>
                    <div class="col-lg-12" style="text-align:center">
                        <button class="btn btn-success btn-md "   type="submit" name="gogogo">Upload</button>
                    </div>
                    </form>
            </div>
            </div>
            
        </div>
    </div>
    

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../DataTables/datatables.min.js"></script>

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

</body>

</html>
