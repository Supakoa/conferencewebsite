<?php
    require 'server.php';
    require 'server/check_login.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin  - Admin Conference Page Register</title>

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
                        <div class="col-lg-8">
                            <div class="container-fluid">
                                <h3 style="text-align:center">สมัคร reviewer </h3><hr>
                                
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label >Username **</label>
                                            <input type="text" class="form-control" name="username" placeholder="ชื่อผู้ใช้" >

                                            <label for="password">Password **</label>
                                            <input type="text" class="form-control" name="password" placeholder="รหัสผ่าน" >

                                            <label for="conpassword">Confirm Password </label>
                                            <input type="text" class="form-control" name="conpassword" placeholder="ยืนยันรหัสผ่าน" >

                                            <label for="fname">First name **</label>
                                            <input type="text" class="form-control" name="fname" placeholder="ชื่อจริง" >

                                            <label for="lname">Last name **</label>
                                            <input type="text" class="form-control" name="lname" placeholder="นามสกุล" >

                                            <label for="gender">Gender</label>
                                            <select class="form-control" name="gender" required>
                                                <option disabled selected value="">เพศ</option>
                                                <option value="male">male</option>
                                                <option value="female">female</option>
                                            </select>

                                            <label for="address">Address</label>
                                            <textarea class="form-control" name="address" rows="3" placeholder="ที่อยู่"></textarea>
                                        
                                            <label for="username">Email *</label>
                                            <input type="text" class="form-control" name="email" placeholder="อีเมล์" >
                                            
                                            <label for="password">Confirm Email *</label>
                                            <input type="text" class="form-control" name="conemail" placeholder="ยืนยันอีเมล์" >

                                            </div>
                                            <button class="btn btn-info btn-fill pull-center" name="submit" type="submit">Submit</button><br>
                                    </form><br>
                                </div>
                            </div>
                        <div class="col-lg-4"></div>
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
