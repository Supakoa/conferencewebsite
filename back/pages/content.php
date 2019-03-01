<?php 
require 'server.php';
require 'server/check_login.php';
if (isset($_POST['code'])) {
    $head = $_POST['header'];
    $code = $_POST['code'];
    $q_content = "INSERT INTO `news`( `name`, `content`) VALUES ('$head','$code')";
    $result_content = mysqli_query($con, $q_content);
}
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
                            <table class="table table-hover">
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
                                    <tr>
                                        <td>1</td>
                                        <td>On-air</td>
                                        <td>เปรมชัยหนีคดี</td>
                                        <td>2/3/2562 , 0:40 น.</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#basicModal">Click to open Modal</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- table -->




    <?php if(isset($_GET['id'])){ 
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

                    <label for="header">ชื่อหัวข้อ</label>
                    <input class="form-control" type="text" name="header" id="" value = "<?php echo $row_edit_content['name'] ?>">
                    
                    <br>
                    <div id="summernote"></div>

                    <br><br>

                    <div class="card-body text-center" id="singha"></div>
                    <br>
                    <div class="text-center  modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button class="btn btn-info" id="gogo"> Submit</button>
                        <input class="form-control" type="hidden" id="code" name="code" value="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
            $('#gogo').click(function(e) {
                var markupStr = $('#summernote').summernote('code');
                $('#singha').append(markupStr);
                $('#code').val(markupStr);

            });

            var markupStr2 = '<?php echo $row_edit_content['content'] ?>';
            $('#summernote').summernote('code', markupStr2);
        });
        $('#basicModal').modal({
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