<!-- Button trigger modal -->
<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal<?php echo $row['paper_id'] ?>">
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
                           
                            <div class="content">
                                <form>
                                <h4>Paper ID : <?php echo $row['paper_id'] ?></h4>
                                <h5> Title : <?php echo $row['name_th'] ?></h5>
                                <h5> Status : <?php echo $row['status'] ?></h5>
                                
                                <h5> Abstract : <?php echo $row['abstract'] ?></h5>
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
                                <div align = "right" >
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                
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