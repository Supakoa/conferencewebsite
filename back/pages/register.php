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
                        <h1 class="page-header">เพิ่มข้อมูลผู้ทรงคุณวุฒิ </h1>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-9">
                            <div class="container-fluid">
                                    <form action="server/insert_register.php" method="POST">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                            <label >Username **</label>
                                            <input type="text" class="form-control" name="username" placeholder="ชื่อผู้ใช้" pattern="([!-~]{6,})" title="ขั้นต่ำ 6 ตัวอักษร เฉพาะภาษาอังกฤษ ตัวเลขหรือสัญญาลักษณ์พิเศษ" required>

                                            </div>
                                            <div class="col-lg-6">
                                            <label for="password">Password **</label>
                                            <input type="text" class="form-control" name="password" placeholder="รหัสผ่าน" pattern="({6,})" title="ขั้นต่ำ 6 ตัวอักษร" required>

                                            <label for="conpassword">ยืนยัน Password </label>
                                            <input type="text" class="form-control" name="conpassword" placeholder="ยืนยันรหัสผ่าน" pattern="({6,})" title="ขั้นต่ำ 6 ตัวอักษร" required>

                                            </div>
                                            <div class="col-lg-6">
                                            <label for="fname">ชื่อ **</label>
                                            <input type="text" class="form-control" name="fname" placeholder="ชื่อจริง" pattern="^[ก-๛!-@[-`{-~\s]+$" title="กรุณากรอกเฉพาะภาษาไทย" required>

                                            </div>
                                            <div class="col-lg-6">
                                            <label for="lname">นามสกุล **</label>
                                            <input type="text" class="form-control" name="lname" placeholder="นามสกุล"  pattern="^[ก-๛!-@[-`{-~\s]+$" title="กรุณากรอกเฉพาะภาษาไทย" required>

                                            </div>
                                            <div class="col-lg-6">
                                            <label for="gender">เพศ</label>
                                            <select class="form-control" name="gender" required>
                                                <option disabled selected value="">เพศ</option>
                                                <option value="male">ชาย</option>
                                                <option value="female">หญิง</option>
                                            </select>
                                            </div>
                                            <div class="col-lg-12">
                                            <label for="address">ที่อยู่</label>
                                            <textarea class="form-control" name="address" rows="3" placeholder="ที่อยู่"></textarea required>
                                        
                                            </div>
                                            <div class="col-lg-6">
                                            <label for="email">Email *</label>
                                            <input type="text" class="form-control" name="email" placeholder="อีเมล์"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="ตัวอย่าง examble@email.com" required>
                                            
                                            </div>
                                            <div class="col-lg-6">
                                            <label for="comemail">ยืนยัน Email *</label>
                                            <input type="text" class="form-control" name="conemail" placeholder="ยืนยันอีเมล์"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="ตัวอย่าง examble@email.com" required>
                                            
                                            </div>
                                            <div class="col-lg-6">
                                            <label for="Tel"เบอร์โทรศัพท์มือถือ *>เบอร์โทรศัพท์มือถือ</label>
                                            <input class="form-control" name="tel" type="text" maxlength="10" pattern="[0-9]{10}" title="ตัวอย่าง 0888888888" placeholder="เบอร์โทรศัพท์มือถือ **" required="required" data-validation-required-message="Please enter your Phone number.">
                                            
                                            </div>
                                        </div>
                                            </div>
                                            <div class="text-center">
                                            <button class="btn btn-info btn-fill pull-center" name="submit" type="submit">ตกลง</button><br>
                                                
                                            </div>
                                    </form><br>
                                </div>
                            </div>
                        <div class="col-lg-2"></div>
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

    <!-- php check alert -->
    <?php require '../../alert.php'; ?>

</body>

</html>
