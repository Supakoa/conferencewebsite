<!-- Button trigger modal -->
<button type="button" class="btn btn-primary form-control btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row['paper_id'] ?>">
  รายละเอียด
</button>

<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $row['paper_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">รายละเอียด</h4>
      </div>
      <div class="modal-body">
      <div class="card">
                           
                          <?php 
                           $re_paper = $row['paper_id'];
                           $q_reviewer = "SELECT * FROM `reviewer_paper` WHERE `paper_id` = '$re_paper' ";
                           $result_reviewer= mysqli_query($con,$q_reviewer);
                           $row_reviewer = mysqli_fetch_array($result_reviewer);
                           $re_re1 = $row_reviewer['reviewer1'];
                           $re_re2 = $row_reviewer['reviewer2'];
                           $q_reviewer1 = "SELECT `first_name`,`last_name` FROM `user` WHERE `username` = '$re_re1' ";
                           $result_reviewer1= mysqli_query($con,$q_reviewer1);
                           $row_reviewer1 = mysqli_fetch_array($result_reviewer1);
                           $q_reviewer2 = "SELECT `first_name`,`last_name` FROM `user` WHERE `username` = '$re_re2' ";
                           $result_reviewer2= mysqli_query($con,$q_reviewer2);
                           $row_reviewer2 = mysqli_fetch_array($result_reviewer2);

                           ?>
                            <div class="content">
                                <form>
                                <h4>รหัสเอกสาร : <?php echo $row['paper_id'] ?></h4>
                                <h5> คำนำ : <?php echo $row['name_th'] ?></h5>
                                <h5> สถานะ : <?php echo $row['status'] ?></h5>
                                
                                <h5> บทความ : <?php echo $row['abstract'] ?></h5>
                                
                                <h5> ผู้ตรวจ 1  : <?php echo $row_reviewer1['first_name'].' '.$row_reviewer2['last_name'] ?></h5>
                                <h5> ผู้ตรวจ 2  : <?php echo $row_reviewer2['first_name'].' '.$row_reviewer2['last_name'] ?></h5>
                                <br>
                                
                                <?php
                                $i = 1;
                                $q_RA = "SELECT user.first_name,user.last_name,reviewer_answer.status,reviewer_answer.score,reviewer_answer.comment,status_tb.status
                                FROM user,reviewer_answer,status_tb WHERE reviewer_answer.paper_id =$id_paper AND reviewer_answer.reviewer_id = user.username AND status_tb.id = reviewer_answer.status";
                                $result_RA = mysqli_query($con, $q_RA);
                                while ($row_RA = mysqli_fetch_array($result_RA)) { ?>
                                <h4> สถานะผู้ตรวจคนที่ <?php echo $i++ ?> </h4>
                                    <p> ชื่อ : <?php echo $row_RA['first_name']." ".$row_RA['last_name'] ?> </p>
                                    <p> ผลตรวจ <?php echo $row_RA['status']?></p>
                                    
                                <?php 
                            } ?>
                                <div style="text-align:right" >
                                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                                
                                </div>
                                
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
      </div>
     
    </div>
  </div>
</div>