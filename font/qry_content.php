<?php 
require 'server/server.php';
$id = $_POST['data'];
$q_content = "SELECT * FROM `news` WHERE `news_id` = '$id' ";
$result_content = mysqli_query($con, $q_content);
$row_content = mysqli_fetch_assoc($result_content);
?>
<!-- <div class="tab-pane fade text-cnter qry_content" style="font-family: 'Kanit', sans-serif;"  role="tabpanel" aria-labelledby="profile-tab"> -->

                                    <?php
                                      echo $row_content['content'];
                                    ?>
 <!-- </div> -->

 <script>
//  alert("123456");
 </script>
 
