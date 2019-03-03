<?php 
    // connect database
    require 'server.php';
    // check login
    require 'server/check_login.php';

    if (isset($_POST['code'])) {
        $head = $_POST['header'];
        $code = $_POST['code'];
        $status =$_POST['status'];
        $id = $_POST['id'];
        $q_content = "UPDATE `news` SET `name`='$head',
            `content`='$code',`status`='$status',
            `time`= CURRENT_TIMESTAMP WHERE `news_id` =  '$id' ";
        $result_content = mysqli_query($con, $q_content);
    }
    $q_show = "SELECT * FROM `news`";
    $result_show = mysqli_query($con, $q_show);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>content</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>

    <!-- summernote -->
    <!-- include libraries(jQuery, bootstrap) -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

    <!-- include summernote css/js -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>

</head>

<body style="font-family: 'Mitr', sans-serif;">
    <!-- table -->

    <div class="container-fluid">
        <div class="container">
            <div class="container-fluid">
                <div class="card-body">
                    <div class="container">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>สถานะ</th>
                                        <th>หัวข้อ</th>
                                        <th>แก้ไขล่าสุด</th>
                                        <th>แก้ไข</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $i = 1 ;
                                while( $row_show = mysqli_fetch_array($result_show)){ ?>
                                    <tr>
                                        <td><?php echo $i."." ?></td>
                                        <td><?php 
                                        
                                        if($row_show['status']==1){
                                            echo "เปิดใช้งาน";
                                        }else{
                                            echo "ปิดทำงาน";
                                        }
                                        ?></td>
                                        <td><?php echo $row_show['name'] ?></td>
                                        <td><?php echo $row_show['time'] ?></td>
                                        <td>
                                            <a href="content.php?id=<?php echo $row_show['news_id'] ?>" class="btn btn-sm btn-warning" ><i class="glyphicon glyphicon-pencil"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete"><i class="glyphicon glyphicon-minus"></i></a>
                                        </td>
                                    </tr>
                                <?php 
                            $i++;
                            } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#add"><i class="glyphicon glyphicon-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- table -->




    <?php if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $q_edit_content = "SELECT * FROM `news` WHERE `news_id` = '$id' ";
        $result_edit_content = mysqli_query($con, $q_edit_content);
        $row_edit_content = mysqli_fetch_array($result_edit_content);

        ?>

    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                    <div class="alert alert-danger modal-title text-center" role="alert" id="myModalLabel">อย่าคลิกกากบาท</div>
                </div>
                <div class="modal-body">
                <form action="content.php" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <label for="header">ชื่อหัวข้อ</label>
                        <input class="form-control" type="text" name="header" id="" value = "<?php echo $row_edit_content['name'] ?>">
                    </div>
                    <div class="col-md-6">
                    <label for="st">สถานะ</label>
                                        <select class="form-control" name="status" id = "st" required>
                                            <?php if($row_edit_content['status']==0){
                                                echo  '<option value="0">ปิดใช้งาน</option><option value="1">เปิด</option>';
                                            }
                                            else{
                                                echo ' <option value="1">เปิดใช้งาน</option><option value="0">ปิด</option>';
                                            }
                                            
                                            ?>
                                           
                                        </select>
                    </div>
                </div>
                    
                    <br>
                    <div id="summernote"></div>

                    <br><br>

                    <div class="card-body text-center" id="singha"></div>
                    <br>
                    <div class="text-center  modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn btn-info" id="gogo"> Submit</button>
                        <input class="form-control" type="hidden" id="code" name="code" value="">
                        <input type="hidden" name="id" value = "<?php echo $row_edit_content['news_id'] ?>">
                    </div>
                    <form>
                </div>
            </div>
        </div>
    </div>
    <?php 
} ?>

    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="smallModal" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <!-- <h4 class="modal-title" id="myModalLabel">Small Modal</h4> -->
                </div>
                <div class="modal-body">
                    <h3>Modal Body</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="smallModal" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <!-- <h4 class="modal-title" id="myModalLabel">Small Modal</h4> -->
                </div>
                <div class="modal-body">
                    <h3>Modal Body</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
            
            $('#gogo').click(function(e) {
                var markupStr = $('#summernote').summernote('code');
                $('#singha').append(markupStr);
                $('#code').val(markupStr);

            });

            var markupStr2 = '<?php echo $row_edit_content['
            content '] ?>';
            $('#summernote').summernote('code', markupStr2);
        });
        $('#basicModal').modal({
            keyboard: false,
            backdrop: 'static'

        });
        $('#delete').modal({
            keyboard: false,
            backdrop: 'static'
        })
        $('#add').modal({
            keyboard: false,
            backdrop: 'static'
        })
        // $('#basicModal').modal(options)
        $('#basicModal').modal('show')
        // $('#basicModal').modal('toggle')
        $('#basicModal').modal('handleUpdate')
    </script>
</body>

</html> 