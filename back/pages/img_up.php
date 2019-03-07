<?php 
if ($_FILES['data']['name']) {
    if (!$_FILES['data']['error']) {
        $name = md5(rand(100, 200));
        $ext = explode('.', $_FILES['data']['name']);
        $filename = $name . '.' . $ext[1];
        $destination = '/img_up/' . $filename; //change this directory
        $location = $_FILES["data"]["tmp_name"];
        move_uploaded_file($location, $destination);
        echo 'http://localhost/back/pages/img_up/' . $filename;//change this URL
    }
    else
    {
      echo  $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['data']['error'];
    }
}
?>