<?php 
    require 'server.php';
    require 'server/check_login.php';
    if(isset($_POST['code'])){
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




    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-6">
                    
                        <div class="container text-center">
                        <form action="content.php" method="post">
                            <label for="header">ชื่อหัวข้อ</label>
                            <input type="text" name="header" id="">

                            <div id="summernote"></div>
                            <br>
                            <button class="btn btn-lg"  id = "gogo"> Submit</button>
                            <input type="hidden" id="code" name="code" value="">
                        </form>
                         <div id="singha"></div>
                            
                        </div>
                    
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
            $('#gogo').click(function (e) { 
              var markupStr = $('#summernote').summernote('code');
              $('#singha').append(markupStr);
              $('#code').val(markupStr);
              
            });
           
            
        });

       

    </script>
</body>

</html> 