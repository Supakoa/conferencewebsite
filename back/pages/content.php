<?php 
// connect database
require 'server.php';
// check login
require 'server/check_login.php';

if (isset($_POST['code'])) {
    $head = $_POST['header'];
    $code = $_POST['code'];
    $status = $_POST['status'];
    $id = $_POST['id'];
    $q_content = "UPDATE `news` SET `name`='$head',
            `content`='$code',`status`='$status',
            `time`= CURRENT_TIMESTAMP WHERE `news_id` =  '$id' ";
    if ($result_content = mysqli_query($con, $q_content)) {
        $_SESSION['alert'] = 10;
    } else {
        $_SESSION['alert'] = 11;
    }
} elseif (isset($_POST['del_id'])) {
    $id = $_POST['del_id'];
    $q_content = "DELETE FROM `news` WHERE `news_id` = '$id' ";
    if ($result_content = mysqli_query($con, $q_content)) {
        $_SESSION['alert'] = 12;
    } else {
        $_SESSION['alert'] = 13;
    }
} elseif (isset($_POST['add_news'])) {
    $q_content = "INSERT INTO `news`( `name`, `content`) VALUES ('ข่าวที่เพิ่มมาใหม่','ทดสอบๆ')";
    if ($result_content = mysqli_query($con, $q_content)) {
        $_SESSION['alert'] = 3;
    } else {
        $_SESSION['alert'] = 4;
    }
}

    if(isset($_FILES["banner"]["name"])){
        $ext = pathinfo(basename($_FILES["banner"]["name"]), PATHINFO_EXTENSION);
        $new_taget_name = 'banner_' . uniqid() . "." . $ext;
        $target_path = "banner/";
        $upload_path = $target_path . $new_taget_name;
        $uploadOk = 1;
    
        $imageFileType = strtolower(pathinfo($new_taget_name, PATHINFO_EXTENSION));
    
        if ($_FILES["banner"]["size"] > 60000000) {
            echo "Sorry, your file is too large.";
            $_SESSION['alert'] = 15 ;
            header("Location: content.php");
                exit();
            $uploadOk = 0;
        }
    
        // Allow certain file formats
        if ($imageFileType != "jpg"&&$imageFileType != "png") {
            echo "Sorry, only JPG , PNG files are allowed.";
            $_SESSION['alert'] = 17 ;
            header("Location: content.php");
                exit();
            $uploadOk = 0;
        }
    
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            $_SESSION['alert'] = 4 ;
            header("Location: content.php");
                exit();
        }
    
        else {
            if (move_uploaded_file($_FILES["banner"]["tmp_name"], $upload_path)) {
                echo 'Move success.';
                $_SESSION['alert'] = 3 ;
                
    
            }else {
                echo 'Move fail';
                $_SESSION['alert'] = 4 ;
            }
        }
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

    <!-- sweet alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="../../sweetalert2/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../../sweetalert2/dist/sweetalert2.min.css">


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
                                        <td>
                                            <?php echo $i."." ?>
                                        </td>
                                        <td>
                                            <?php 
                                        
                                        if($row_show['status']==1){
                                            echo '<p style=""><span style="background-color: rgb(247, 247, 247); color: rgb(107, 165, 74);">เปิดใช้งาน</span></p>';
                                        }else{
                                            echo '<p style=""><span style="background-color: rgb(239, 239, 239); color: rgb(255, 0, 0);">ปิดใช้งาน</span></p>';
                                        }
                                        ?>
                                        </td>
                                        <td>
                                            <?php echo $row_show['name'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row_show['time'] ?>
                                        </td>
                                        <td>
                                            <a href="content.php?id=<?php echo $row_show['news_id'] ?>" class="btn btn-sm btn-warning"><i
                                                    class="glyphicon glyphicon-pencil"></i></a>
                                            <a onclick="  $('#del_id').val('<?php echo $row_show['news_id'] ?>')" href="#"
                                                class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete"><i
                                                    class="glyphicon glyphicon-minus"></i></a>
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
                        <a href="../../font/main.php" target="_blank" class="btn btn-sm btn-success">ไปยังหน้าแสดงข่าว</a>
                    </div>
                    <div class="row">
                <h1 class="page-header">อัพโหลดรูป</h1>
                <div class="col-lg-12">
                    <form action="content.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class=" col-lg-4">
                                <input class="form-control" name="banner" type="file" placeholder="File" required="required">
                            </div>
                            <div class=" col-lg-4">
                                <button type="submit" class="btn btn-success">อัพโหลด</button>
                            </div>
                        </div>
                        <!-- <h4 class="text-center" style="color:red">ขนาด 1900*1000 px</h4> -->

                        <?php if(isset($new_taget_name)){
                            echo ' <img style="max-width: 100%;height: auto;" class="img-fluid" src="banner/'.$new_taget_name.'"';
                        }
                         ?>
                        <br>
                    </form>
                </div>
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
                                <input class="form-control" type="text" name="header" id="" value="<?php echo $row_edit_content['name'] ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="st">สถานะ</label>
                                <select class="form-control" name="status" id="st" required>
                                    <?php if($row_edit_content['status']==0){
                                                echo  '<option value="0">ปิดใช้งาน</option><option value="1">เปิดใช้งาน</option>';
                                            }
                                            else{
                                                echo ' <option value="1">เปิดใช้งาน</option><option value="0">ปิดใช้งาน</option>';
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
                            <input type="hidden" name="id" value="<?php echo $row_edit_content['news_id'] ?>">
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
                <form action="content.php" id="del_singha" method="post">
                    <div class="modal-body text-center" id="test">
                        <input type="hidden" id="del_id" name="del_id">

                        <h3>ท่านต้องการจะลบข้อมูลนี้ ?</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ไม่</button>
                        <button type="submit" id="del_yes" class="btn btn-primary">ใช่</button>

                    </div>
                </form>
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
                    <h3>ท่านต้องการเพิ่มข่าวใหม่ ?</h3>
                    <form action="content.php" method="post" id="add_news">
                        <input type="hidden" name="add_news">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ไม่</button>
                    <button type="submit" form="add_news" class="btn btn-primary">ใช่</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {

            $('#summernote').summernote({
                height: 300, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: true, // set focus to editable area after initializing summernote
                callbacks: {
                    onImageUpload: function (image) {
                        uploadImage(image[0]);
                    }
                }
            });

            function uploadImage(image) {
                var data = new FormData();
                data.append("image", image);
                $.ajax({
                    url: 'img_up.php',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    type: "post",
                    success: function (url) {
                        var image = $('<img>').attr('src', 'http://' + url);
                        $('#summernote').summernote("insertNode", image[0]);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }
        




        $('#gogo').click(function (e) {
            var markupStr = $('#summernote').summernote('code');
            $('#code').val(markupStr);

        });
        // $('#del_id').val('value');
        var markupStr2 = `<?php echo $row_edit_content['content'] ?>`; $('#summernote').summernote('code',
            markupStr2);
        });
        $('#basicModal').modal({
            keyboard: false,
            backdrop: 'static'

        });
        $('#delete').modal({
            // keyboard: false,
            backdrop: 'static'
        });
        $('#add').modal({
            // keyboard: false,
            backdrop: 'static'
        });
        $('#del_yes').click(function () {
            // $('#test').append('123456');
            $('#del_singha').submit();

        });

        $('*').modal('hide');
        // $('#basicModal').modal(options)
        $('#basicModal').modal('show');

        // $('#basicModal').modal('toggle')
        // $('#basicModal').modal('handleUpdate')
    </script>
    <!-- php check alert -->
    <?php require '../../alert.php'; ?>
</body>

</html>