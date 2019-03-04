<?php
    require 'server/server.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Conference</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Mitr:400,500" rel="stylesheet">

    <!-- google font kanit -->
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!-- <link href="css/new-age.css" rel="stylesheet"> -->

    <!-- sweet alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="../sweetalert2/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../sweetalert2/dist/sweetalert2.min.css">
</head>

<body>
    <!-- banner -->
    <!-- <div class="container-fluid" style="background-color:lightpink;height:200px">
        <div class="text-center">
            <h2>Banner</h2>
        </div>
    </div><br> -->
    <!-- banner -->
    <div class="">
    <img src="..\back\pages\banner\123456.png" style = "width:100%" alt="">
    </div>
    

    <!-- navbar -->
    <div class="container-fluid" style="background-color: #e3f2fd;">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    <div class="form-inline my-2 my-lg-0">
                        <a href="index.php" class="btn btn-outline-success my-2 my-sm-0">sign-in</a>
                    </div>
                </div>
            </nav>
        </div>
    </div><br>

    <!-- nav col4 && content col8 -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Home</a>
                        </li>
                        <?php
                        $sql = "SELECT * FROM `news` WHERE status = 1";
                        $result = mysqli_query($con,$sql);
                            while ($row = mysqli_fetch_array($result)){ ?>
                        <li class="nav-item">
                            <a class="nav-link" id="settings-tab" data-toggle="tab" href="#<?php echo $row['news_id'];?>"
                                role="tab" aria-controls="settings" aria-selected="false">
                                <?php echo $row['name']; ?></a>
                        </li>
                        <?php } ?>
                    </ul>


                </div>
                <div class="col-10">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <?php  
                            $result2 = mysqli_query($con,$sql);
                            while ($row_content = mysqli_fetch_array($result2)) { ?>
                                <div class="tab-pane fade text-cnter" style="font-family: 'Kanit', sans-serif;" id="<?php echo $row_content['news_id']; ?>" role="tabpanel" aria-labelledby="profile-tab">
                                    <?php
                                        echo $row_content['content'];
                                    ?>
                                </div>
                        <?php } ?>
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="container">
                                <img src="journal_4.png" alt="Responsive image" class="img-fluid" style="">
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div><br>


    <footer>
        <div class="container text-center" style="background-color:lightpink">
            <h1>footer</h1>
        </div>
    </footer>




    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>
        $('#myTab a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
        })
        $(function () {
            $('#myTab li:first-child a').tab('show')
        })
    </script>
    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <!-- <script src="js/new-age.min.js"></script> -->


</body>

</html>