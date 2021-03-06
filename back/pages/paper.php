<?php
require 'server.php';
require 'server/check_login.php';
$_SESSION['counter_up'] = 0;

$a = "SELECT * FROM show_url WHERE group_url = 1";
$b = "SELECT * FROM show_url WHERE group_url = 2";

$q1 = mysqli_query($con, $a);
$q2 = mysqli_query($con, $b);

$re = mysqli_query($con, $a);
$re2 = mysqli_query($con, $b);
if (isset($_POST['update'])) {
    $id = 1;
    $count = 1;
    $plus1 = "text";
    $plus2 = "link";
    $plus3 = "cb";
    while ($rowrow = mysqli_fetch_array($re)) {
        $sum1 = $plus1 . $id;
        $sum2 = $plus2 . $id;
        $sum3 = $plus3 . $id;
        if (isset($_POST[$sum3])) {
            $ed3 = 1;
        } else {
            $ed3 = 0;
        }
        $ed1 = $_POST[$sum1];
        $ed2 = $_POST[$sum2];
        $lin = $rowrow['id'];
        $qinq = "UPDATE `show_url` SET `id`='$id',`url`='$ed2',`text`='$ed1',`hide`='$ed3' WHERE `id`='$lin' ";//,`hide`='$ed3'
        $que = mysqli_query($con, $qinq);
        if ($que) {
            $count++;
            $_SESSION['alert'] = 3;
        }
        else{
            $_SESSION['alert'] = 4;
            header("Location: paper.php");
            exit();
            
        }
        $id = $id + 1;
    }
    while ($rowrow = mysqli_fetch_array($re2)) {
        $sum1 = $plus1 . $id;
        $sum2 = $plus2 . $id;
        $sum3 = $plus3 . $id;
        if (isset($_POST[$sum3])) {
            $ed3 = 1;
        } else {
            $ed3 = 0;
        }
        $ed1 = $_POST[$sum1];
        $ed2 = $_FILES[$sum2]['name'];

        $ext = pathinfo(basename($_FILES[$sum2]["name"]), PATHINFO_EXTENSION);
        $new_taget_name = 'pdf_' . uniqid() . "." . $ext;
        $target_path = "../../font/uploads/";
        $upload_path = $target_path . $new_taget_name;
        $uploadOk = 1;

        $imageFileType = strtolower(pathinfo($new_taget_name, PATHINFO_EXTENSION));

        if ($_FILES[$sum2]["name"] != "") {

            if ($_FILES[$sum2]["size"] > 60000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
                $_SESSION['alert'] = 15;
                header("Location: paper.php");
                exit();
            
            }
       // Allow certain file formats
            if ($imageFileType != "pdf"&&$imageFileType != "doc"&&$imageFileType != "docx") {
                echo "Sorry, only PDF files are allowed.";
                $uploadOk = 0;
                $_SESSION['alert'] = 19;
                header("Location: paper.php");
            exit();
            
            }
       // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                $_SESSION['alert'] = 4;
                header("Location: paper.php");
            exit();
            
       // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES[$sum2]["tmp_name"], $upload_path)) {
                    //echo "The file " . basename($_FILES[$sum2]["name"]) . " has been uploaded.";
                    $real_name = basename($_FILES[$sum2]["name"]);
                    //echo $real_name;
                    //$q = "INSERT INTO `testpdf`(`url`,`real_name`) VALUES ('$new_taget_name','$real_name')";
                    $q = "UPDATE `show_url` SET `url`='$new_taget_name',`real_name`='$real_name' WHERE `id` = '$id' ";
                    $result = mysqli_query($con, $q);
                    if ($result) {
                        $count++;
                        $_SESSION['alert'] = 3;
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                    $_SESSION['alert'] = 4;
                    header("Location: paper.php");
            exit();
            
                }
            }

        } else {

            $_SESSION['alert'] = 3;
            $count++;
        }

        $q_text = "UPDATE `show_url` SET `text`='$ed1' WHERE `id` = '$id' ";
        if($result = mysqli_query($con, $q_text)){
            $_SESSION['alert'] = 10;
        }
        else{
            $_SESSION['alert'] = 11;
        }

        $q = "UPDATE `show_url` SET `hide`='$ed3' WHERE `id` = '$id' ";
        if($result = mysqli_query($con, $q)){
            $_SESSION['alert'] = 10;
        }
        else{
            $_SESSION['alert'] = 11;
        }


        $id = $id + 1;
    }

    if ($count == $id) {
        $_SESSION['alert'] = 10;
    } else {
         $_SESSION['alert'] = 11;
    }
}

$i = "SELECT * FROM show_url WHERE group_url = 1";
$j = "SELECT * FROM show_url WHERE group_url = 2";

$q1 = mysqli_query($con, $i);
$q2 = mysqli_query($con, $j);

    //set menu page
$_SESSION['set_page'] = 8;
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin  - Admin Conference Page เอกสารที่เกี่ยวข้อง</title>
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

    <div id="wrapper" >
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php require 'setup/main.php' ?>

            <?php require 'setup/menu.php' ?>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
            <h1 class="page-header">เอกสารที่เกี่ยวข้อง</h1>

                <div class="col-lg-12">
                    <h4 style="margin-left: 5px;color:#6ac7ed;text-align:center">เว็บไซต์ที่เกี่ยวข้อง</h4><br>
                    <form method="POST" action="paper.php" enctype="multipart/form-data">
                    <table class="table  table-responsive-lg">
                        <thead class="thead-drak">
                            <th scope="col" colp="2">ข้อที่</th>
                            <th scope="col" colp="2">ข้อความ</th>
                            <th scope="col" colp="2"></th>
                            <th scope="col" colp="2">ที่อยู่</th>
                            <th scope="col" colp="2" style="text-align:center">ซ่อน</th>
                        </thead>
                        <tbody>
                                <?php $i = 1; ?>
                                <?php while ($row1 = mysqli_fetch_array($q1)) { ?>
                            <tr>
                                <th scope="row"><?php echo $i . " )." ?></th>
                                <td><input class="form-control" type="text" name="text<?php echo $i ?>" value="<?php echo $row1['text'] ?>" required></td>
                                <th scope="row"></th>
                                <td><input class="form-control" type="text" name="link<?php echo $i ?>" value="<?php echo $row1['url'] ?>" required></td>
                                <?php if ($row1['hide'] == 0) { ?>
                                <td ><input class="form-control" type="checkbox" name="cb<?php echo $i ?>" ></td>
                                <?php 
                                    } else { ?>
                                <td ><input class="form-control" type="checkbox" name="cb<?php echo $i ?>" checked></td>
                                    <?php 
                                    } ?>
                            </tr>
                                <?php $i = $i + 1;
                                } ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12">
                    <h4 style="margin-left: 5px;color:#6ac7ed;text-align:center">เอกสารเผยแพร่</h4><br>
                        <table class="table  table-responsive-lg">
                            <thead class="thead-drak">
                                <th scope="col" colp="2">ข้อที่</th>
                                <th scope="col" colp="2">ข้อความ</th>
                                <th scope="col" colp="2">ชื่อไฟล์ปัจจุบัน</th>
                                <th scope="col" colp="2">ไฟล์ข้อมูลPDF</th>
                                <th scope="col" colp="2" style="text-align:center">ซ่อน</th>
                            </thead>
                            <tbody>
                                    <?php while ($row2 = mysqli_fetch_array($q2)) {
                                    $a = $i - 4; ?>
                                <tr>
                                    <th scope="row"><?php echo $a . " )." ?></th>
                                    <td><input class="form-control" type="text" name="text<?php echo $i ?>" value="<?php echo $row2['text'] ?>" ></td>
                                    <th scope="row"><?php echo $row2['real_name'] ?></th>
                                    <td><input class="form-control" type="file" name="link<?php echo $i ?>"  accept=".doc,.docx,.pdf" ></td>
                                    <?php if ($row2['hide'] == 0) { ?>
                                    <td ><input class="form-control" type="checkbox" name="cb<?php echo $i ?>"></td>
                                    <?php 
                                        } else { ?>
                                    <td ><input class="form-control" type="checkbox" name="cb<?php echo $i ?>" checked></td>
                                        <?php 
                                        } ?>
                                </tr>
                                    <?php $i = $i + 1;
                                    } ?>
                            </tbody>
                        </table>
                </div>
            </div>
                                    <div class="text-center">
                                        <input type="submit" class="btn btn-info btn-active" value="อัพเดท" name="update">
                                    </div>
                    </form>
        </div><br>
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
