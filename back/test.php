<?php
    date_default_timezone_set("Asia/Bangkok");
    echo "The time is " . date("Y-m-t");
    if(isset($_POST['submit'])){
        echo "<br>".$_POST['date'];
        if ($_POST['date']>date("Y-m-t")) {
            echo "<br>bello";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <br>
    <form action="" method="post">
        <input type="date" name="date">
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>