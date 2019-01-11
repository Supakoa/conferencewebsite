<?php
require 'server.php';
require 'server/check_login.php';
require 'server/show_alert.php';


$q = "SELECT * FROM paper WHERE status = 5 ";
$result = mysqli_query($con, $q);

    //set page
$_SESSION['set_page'] = 2;


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin  - Admin Conference Page ยังไม่ได้เลือกผู้ตรวจ</title>
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

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php require 'setup/main.php' ?>

            <?php require 'setup/menu.php' ?>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <h1 class="page-header">ยังไม่ได้ตรวจ</h1>
                <div class="col-lg-12 table-responsive-lg">
                <table id="table1" class="display table">
                            <thead>
                                <tr>
                                    <th>รหัสเอกสาร</th>
                                    <th>ชื่อ เอกสาร</th>
                                    <th>ชื่อผู้ส่ง</th>
                                    <th>ผู้ตรวจ 1</th>
                                    <th>ผู้ตรวจ 2</th>
                                    <th>สถานะหลัก</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while ($row = mysqli_fetch_array($result)) { ?>
                                <tr>
                                        <?php
                                        $id_paper = $row["paper_id"];

                                        $q_reviewer = "SELECT * FROM reviewer_paper WHERE paper_id =$id_paper ";
                                        $result_reviewer = mysqli_query($con, $q_reviewer);
                                        $row_reviewer = mysqli_fetch_array($result_reviewer);
                                        $q_answer = "SELECT * FROM reviewer_answer WHERE paper_id = $id_paper ";
                                        $result_answer = mysqli_query($con, $q_answer);
                                        $row_answer = mysqli_fetch_array($result_answer);
                                        $q_user = "SELECT user.first_name,user.last_name FROM user,user_paper WHERE user_paper.paper_id = $id_paper AND user_paper.username = user.username ";
                                        $result_user = mysqli_query($con, $q_user);
                                        $row_user = mysqli_fetch_array($result_user);
                                        $status_paper = $row['status'];
                                        $q_status = "SELECT * FROM status_tb WHERE id = $status_paper";
                                        $result_status = mysqli_query($con, $q_status);
                                        $row_status = mysqli_fetch_array($result_status);
                                        ?>
                                      
                                        <td style="text-align:left" ><p style="font-size: 5 "><?php echo $row['paper_id'] ?></p></td>
                                        <td><p style="font-size: 5"><?php echo $row['name_th'] ?></p></td>
                                        <td><p style="font-size: 5"><?php echo $row_user['first_name'] . " " . $row_user['last_name'] ?></p></td>
                                        <td><p style="font-size: 5">ยังไม่ได้ระบุ</p> </td>
                                        <td><p style="font-size: 5">ยังไม่ได้ระบุ</p></td>
                                        <td><p style="font-size: 5"><?php echo $row_status['status'] ?></p></td>
                                        <td><?php require 'modal/modal.php' ?></td>
                                        
                                        </tr> 
                                        <?php 
                                    } ?>
                                      
                            </tbody>
                </table>
               
                </div>
            </div>
        </div>
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
    <script type="text/javascript">
        $(document).ready( function () {
            $('#table1').DataTable();
        } );

        $('#myModal ').on('shown.bs.modal', function () {
        $('#myInput').focus()
        })
	</script>

</body>

</html>
