<?php
require 'server.php';
require 'server/check_login.php';
$_SESSION['counter_up'] = 0;
    //set page
$_SESSION['set_page'] = 1;
$q = "SELECT paper.paper_id, paper.name_th, paper.name_eng, paper.abstract, paper.key_word,user.first_name,user.last_name,status_tb.status FROM paper,user,user_paper,status_tb WHERE paper.paper_id = user_paper.paper_id AND user.username = user_paper.username AND status_tb.id = paper.status";
$result = mysqli_query($con, $q);
$q2 = "SELECT paper.paper_id, paper.name_th, paper.name_eng, paper.abstract, paper.key_word,user.first_name,user.last_name,status_tb.status FROM paper,user,user_paper,status_tb WHERE paper.paper_id = user_paper.paper_id AND user.username = user_paper.username AND status_tb.id = paper.status ORDER BY paper.paper_id ASC";
$result2 = mysqli_query($con, $q2);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin  - Admin Conference Page รายงาน</title>
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
                <div class=" col-lg-12">
                    <div class="container-fluid">
                        <h1 class="page-header">รายงาน</h1>

                        <table id="tablepaper" class="display responsive" >
                            <thead>
                                <tr>
                                    <th>รหัสเอกสาร</th>
                                    <th>ชื่อ เอกสาร(Eng)</th>
                                    <th>ชื่อ เอกสาร(Th)</th>
                                    <th>ชื่อผู้ส่ง</th>                                   
                                    <th>สถานะหลัก</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                           
                                
                                <?php while ($row = mysqli_fetch_array($result)) {
                                    $id_paper = $row['paper_id']
                                    ?>
                                <tr>
                                
                                    <td><?php echo $row['paper_id'] ?></td>
                                    <td><?php echo $row['name_eng'] ?></td>
                                    <td><?php echo $row['name_th'] ?></td>
                                    <td><?php echo $row['first_name'] . " " . $row['last_name'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <td><?php require 'modal/modal2.php' ?></td>
                                   
                                </tr>
                                <?php 
                            }
                            ?>
                            </tbody>
                        </table>
                        <br>
                        <div style="text-align:center">
                            <a href="" class="btn btn-info btn-md " data-toggle="modal" data-target="#submit_modal">ดาวโหลดไฟล์</a>
                        </div>
                       
                        <div class="modal fade" id="submit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="text-align:center" >
                                        <h3 class="modal-title" id="exampleModalLabel">ยืนยัน</h3>
                                    </div>
                                        <div class="modal-body" style="text-align:center" >
                                                                <?php
                                                                $filName = "server/report.csv";
                                                                $objWrite = fopen("server/report.csv", "w");
                                                                fwrite($objWrite, "\"Paper-id\",\"ชื่อ Paper(Eng)\",\"ชื่อ Paper(Th)\",\"ชื่อผู้ส่ง\",\"สถานะหลัก\" \n\n");
                                                                while ($row2 = mysqli_fetch_array($result2)) {
                                                                    fwrite($objWrite, "\"{$row2['paper_id']}\",\"{$row2['name_eng']}\",\"{$row2['name_th']}\",\"{$row2['first_name']} {$row2['last_name']}\",\" {$row2['status']}\" \n\n");

                                                                }
                                                                fclose($objWrite);
                                                                echo "ยืนยันการดาวโหลด";
                                                                ?>
                                        </div>
                                            <div class="modal-footer" style="text-align:center">
                                                <a href="<?php echo $filName ?>"> <button type="button" class="btn btn-success"  > ยืนยัน</button></a>
                                                <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
    
    <script>
        $(document).ready( function () {
            $('#tablepaper').DataTable();
        } );

    </script>

</body>

</html>
