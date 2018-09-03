<?php
    require 'server.php';
    require 'server/check_login.php';
    $_SESSION['counter_up'] = 0 ;
    //set page
    $_SESSION['set_page']=7;
    $q_banner = "SELECT * FROM `banner` ";
    $result_banner = mysqli_query($con,$q_banner);
    $row_banner = mysqli_fetch_array($result_banner);
     
   
    if(!isset($_SESSION['check_banner'])){
        $_SESSION['tmp_banner'] = $row_banner['tmp_name'];
        
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

    <title>Admin  - Admin Conference Page Banner</title>
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
    <link href="https://fonts.googleapis.com/css?family=Mitr:400,500" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    

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
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Banner</h1>
                    <h5 style="text-align:center">Paper File</h5><br>
            	<div class="row">
                    <div class="col col-8-lg">
                    <form action = "server/insert_banner.php" method ="POST" enctype="multipart/form-data">
                    <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <div class="row">
                            <div class="col col-lg-6">
                        <input class="form-control" name="banner" type="file" placeholder="File" required="required">
                            </div>
                            <div class="col col-lg-6" >
                        <button type="submit" class="btn btn-success" >อัพโหลด</button>
                            </div>
                        </div>
                        </form> 
                        
                    </div>
                </div>
                <div class="modal fade" id="submit_modal_banner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm" role="document">
                                      
                                            <div class="modal-content">
                                            <div class="modal-header" style="text-align:center" >
                                                <h3 class="modal-title" id="exampleModalLabel">ยืนยัน</h3>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="text-align:center" >
                                            
                                            </div>
                                            <div class="modal-footer" style="text-align:center">
                                           <a href="server/insert_banner.php?id=1"><button type="submit" class="btn btn-success" > ยืนยัน</button></a> 
                                                    <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
                                            </div>
                                            </div>
                                           
                                        </div>
                                        </div>
                                        <div class="container-fluid">
                                        <div class="jumbotron" >
                                            <div  class="row" >
                                            <div class="col col-lg-12">
                                            <div style="text-align:center">
                                            <img src="banner/<?php echo $_SESSION['tmp_banner']?>" alt="banner">
                                            <div class="container" style="text-align:center;">
                            <br>
                            <a href="" class="btn btn-info btn-md " data-toggle="modal" data-target="#submit_modal_banner">Update Banner</a>
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

</body>

</html>
