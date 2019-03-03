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



    <!-- Custom styles for this template -->
    <!-- <link href="css/new-age.css" rel="stylesheet"> -->

    <!-- sweet alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="../sweetalert2/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../sweetalert2/dist/sweetalert2.min.css">
</head>

<body>
    <!-- banner -->
    <div class="container-fluid" style="background-color:lightpink;height:200px">
        <div class="text-center">
            <h2>Banner</h2>
        </div>
    </div><br>
    <!-- banner -->

    <!-- navbar -->
    <div class="container-fluid" style="background-color: #e3f2fd;">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                        </li>
                        <?php
                            while ($row = mysqli_fetch_array(mysqli_query($con," SELECT * FROM `news` WHERE status = 1 "))) { ?>
                                <li class="nav-item">
                                    <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
                                </li> 
                           <?php }
                        ?>
                    </ul>


                </div>
                <div class="col-10">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="container">
                                <img src="journal_4.png" alt="Responsive image" class="img-fluid" style="">
                            </div>
                        </div>
                        <div class="tab-pane fade text-cnter" id="profile" role="tabpanel" aria-labelledby="profile-tab">...arrays takes 2* O(n/2). This ends up in a performance of O(n log n).

                            In the worst case quicksort selects only one element in each iteration. So it is O(n) + O(n-1) + (On-2).. O(1) which is equal to O(n^2).

                            The average case of quicksort is O(n log n). </div>
                        <div class="tab-pane fade" id="messages" role="tabpanel" aria-labelledby="messages-tab">... <p>1. ถ้าข้อมูลเข้า ( input) เป็นตัวถูกดำเนินการ ( operand) ให้นำออกไปเป็นผลลัพธ์ ( output)

                                2. ถ้าข้อมูลเข้าเป็นตัวดำเนินการ ( operator) ให้ดำเนินการดังนี้
                                2.1 ถ้าสแตคว่าง ให้ push operator ลงในสแตค
                                2.2 ถ้าสแตคไม่ว่าง ให้เปรียบเทียบ operator ที่เข้ามากับ operator ที่อยู่ในตำแหน่ง TOP ของสแตค
                                2.2.1 ถ้า operator ที่เข้ามามีความสำคัญมากกว่า operator ที่ตำแหน่ง TOP ของสแตคให้ push ลงสแตค
                                2.2.2 ถ้า operator ที่เข้ามามีความสำคัญน้อยกว่าหรือเท่ากับ operator ที่อยู่ในตำแหน่ง TOP ของสแตค ให้ pop สแตคออกไปเป็นผลลัพธ์ แล้วทำการเปรียบเทียบ operator ที่เข้ามากับ operator ที่ตำแหน่ง TOP ต่อไป จะหยุดจนกว่า operator ที่เข้ามาจะมีความสำคัญมากกว่า operator ที่ตำแหน่ง TOP ของสแตค แล้วจึง push operator ที่เข้ามานั้นลงสแตค

                                3. ถ้าข้อมูลเข้าเป็นวงเล็บเปิด ให้ push ลงสแตค

                                4. ถ้าข้อมูลเข้าเป็นวงเล็บปิด ให้ pop ข้อมูลออกจากสแตคไปเป็นผลลัพธ์จนกว่าจะถึงวงเล็บ เปิด จากนั้นทิ้งวงเล็บเปิดและปิดทิ้งไป

                                5. ถ้าข้อมูลเข้าหมด ให้ pop ข้อมูลออกจากสแตคไปเป็นผลลัพธ์จนกว่าสแตคจะว่าง

                                ตัวอย่างการแปลงนิพจน์ Infix เป็นนิพจน์ Postfix
                                นิพจน์ A + B * C</p>
                        </div>
                        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">.Quicksort is a divide and conquer algorithm. It first divides a large list into two smaller sub-lists and then recursively sort the two sub-lists. If we want to sort an array without any extra space, quicksort is a good option. On average, time complexity is O(n log(n)).

                            The basic step of sorting an array are as follows:
                            Select a pivot
                            Move smaller elements to the left and move bigger elements to the right of the pivot
                            Recursively sort left part and right part
                            This post shows two versions of the Java implementation. The first one picks the rightmost element as the pivot and the second one picks the middle element as the pivot...</div>
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
        $('#myTab a').on('click', function(e) {
            e.preventDefault()
            $(this).tab('show')
        })
        $(function() {
            $('#myTab li:first-child a').tab('show')
        })
    </script>
    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <!-- <script src="js/new-age.min.js"></script> -->


</body>

</html> 