<?php
    //require database check_online show_message
    require 'server.php';
    require 'server/check_login.php';
    require 'server/show_alert.php';

    //connect database form table user
    $a = "SELECT * FROM user ";
    $r_a = mysqli_query($con,$a);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin  - Admin Conference Page Manage User</title>
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
            <div class="row">
            <h1 class="page-header">จัดการสมาชิค</h1>

                <div class="col-lg-12">
                <table class="table responsive display" id="tableuser">
                            <thead>
                                <th>Username</th>
                                <th>Password</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>เพศ</th>
                                <th>ที่อยู่</th>
                                <th>E-mail</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>Member</th>
                                
                                <th>สถานะ</th>
                                <th>แก้ไข</th>
                                <th>ลบ</th>
                            </thead>
                            <tbody>
                                <?php while($ro_a = mysqli_fetch_array($r_a)){ ?>
                                <tr>
                                            <td><?php echo $ro_a['username'] ?></td>
                                            <td><?php echo base64_decode($ro_a['password']) ?></td>
                                            <td><?php echo $ro_a['first_name'] ?></td>
                                            <td><?php echo $ro_a['last_name'] ?></td>
                                            <td><?php echo $ro_a['gender'] ?></td>
                                            <td><?php echo $ro_a['address'] ?></td>
                                            <td><?php echo $ro_a['email'] ?></td>
                                            <td><?php echo $ro_a['Tel'] ?></td>
                                            <td><?php echo $ro_a['member'] ?></td>
                                            <td>
                                            <?php
                                            if($ro_a['role']=='1'){
                                                echo "ผู้ใช้";
                                            } 
                                            else if($ro_a['role']=='2'){
                                                echo "ผู้ทรงคุณวุฒิ";
                                            }else{
                                                echo "ผู้เข้าร่วมการประชุม" ; 
                                            }
                                            
                                            ?>
                                            </td>

                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#conedit_modal<?php echo $ro_a['order'] ?>">
                                        แก้ไข
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="conedit_modal<?php echo $ro_a['order'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                        <form action="server/edit_user.php?id=<?php echo $ro_a['order'] ?>" method="POST">
                                            <div class="modal-content">
                                            <div class="modal-header" style="text-align:center" >
                                                <h3 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลสมาชิค</h3>
                                                </button>
                                            </div>
                                            <div class="modal-body"  >
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label for="user_name">username  </label>
                                                            <input class="form-control" id="user_name" type="text" name="username" value="<?php echo $ro_a['username'] ?>" placeholder="username">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="pass_word">password  </label>
                                                            <input class="form-control" id="pass_word" type="text" name="password" value="<?php echo base64_decode($ro_a['password']) ?>" placeholder="password">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                        <label for="gen_der">เพศ  </label>
                                                        <select class="form-control" id="gen_der" name="gender" required>
                                                                            <option hidden  selected value="<?php echo $ro_a['gender'] ?>"><?php echo $ro_a['gender'] ?></option>
                                                                            <option value="male">ขาย</option>
                                                                            <option value="female" required>หญิง</option>
                                                                        </select>
                                                        </div>
                                                        <div class="col-lg-6"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label for="f_name">ชื่อ  </label>
                                                            <input id="f_name" class="form-control" type="text" name="first_name" value="<?php echo $ro_a['first_name'] ?>" placeholder="firstname">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label fpr="l_name">นามสกุล  </label>
                                                            <input id="l_name" class="form-control" type="text" name="last_name" value="<?php echo $ro_a['last_name'] ?>" placeholder="lastname">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label for="addre">ที่อยู่  </label>
                                                            <input id="addre" class="form-control" type="text" name="address" value="<?php echo $ro_a['address'] ?>" placeholder="address">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="e_mail">e-mail  </label>
                                                            <input id="e_mail" class="form-control" type="text" name="email" value="<?php echo $ro_a['email'] ?>" placeholder="email">
                                                        </div>
                                                    </div>
                                                
                                            </div>
                                            <div class="modal-footer" style="text-align:center">
                                                    <button type="submit" class="btn btn-success">ยืนยัน</button>
                                                    <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
                                            </div>
                                            </div>
                                        </form>    
                                        </div>
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#submit_modal<?php echo $ro_a['order'] ?>">
                                        ลบ
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="submit_modal<?php echo $ro_a['order'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm" role="document">
                                        <form action="server/delete_user.php?id=<?php echo $ro_a['order'] ?> " method="POST">
                                            <div class="modal-content">
                                            <div class="modal-header" style="text-align:center" >
                                                <h3 class="modal-title" id="exampleModalLabel">ยืนยัน</h3>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="text-align:center" >
                                                <h5>ยืนยันการลบข้อมูลสมาชิค</h5>
                                            </div>
                                            <div class="modal-footer" style="text-align:center">
                                                    <button type="submit" class="btn btn-success">ยืนยัน</button>
                                                    <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
                                            </div>
                                            </div>
                                        </form>    
                                        </div>
                                        </div>
                                    </td>

                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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
            $('#tableuser').DataTable();
        } );
        
        
	</script>

</body>

</html>
