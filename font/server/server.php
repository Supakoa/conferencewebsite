<?php
$con = mysqli_connect("localhost", "root", "", "journal_database") or die('เชื่อมต่อข้อมูลไม่สำเร็จ' . mysqli_connect_error());
mysqli_set_charset($con, 'utf8');
session_start();

?>