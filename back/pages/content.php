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
    <!-- navbar -->
    <div class="container-fluid">
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Brand</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                            <li><a href="#">Link</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">One more separated link</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="navbar-form navbar-left">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Link</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div>
    <!-- navbar -->


    <div class="container-fluid">
        <div class="card-body">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-6">
                    <div class="container">

                    
                        <a href="#" class="btn btn-lg btn-success" data-toggle="modal" data-target="#basicModal">Click to open Modal</a>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php if(isset($_GET['id'])){ 
            $id = $_GET['id'];
          $q_edit_content = "SELECT * FROM `news` WHERE `news_id` = '$id' ";
          $result_edit_content = mysqli_query($con, $q_edit_content);
          $row_edit_content = mysqli_fetch_array($result_edit_content);
        
    ?>
    
    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Basic Modal</h4>
                </div>
                <div class="modal-body">

                    <label for="header">ชื่อหัวข้อ</label>
                    <input class="form-control" type="text" name="header" id="" value = "<?php echo $row_edit_content['name'] ?>">
                    
                    <div id="summernote"></div>
                    <br>
                    <div class="text-center input-group">
                        <button class="btn btn-lg" id="gogo"> Submit</button>
                        <input class="form-control" type="hidden" id="code" name="code" value="">
                    </div>


                    <br><br>

                    <div class="text-center" id="singha"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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