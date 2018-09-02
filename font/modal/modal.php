<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row['paper_id'] ?>">
  รายละเอียด
</button>

<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $row['paper_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">รายละเอียด</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
      <div class="card">
                           
                            <div class="content">
                                <?php
                                $q_p = "SELECT * FROM paper WHERE paper_id = $id_paper";
                                $r_q_p = mysqli_query($con,$q_p);
                                $row_q_p = mysqli_fetch_assoc($r_q_p);
                                $status_paper = $row_q_p['status'];
                                $q_status = "SELECT * FROM status_tb WHERE id = $status_paper";
                                $result_status = mysqli_query($con, $q_status);
                                $row_status = mysqli_fetch_array($result_status);
                                ?>
                                <div class="row">
                                  <div class="col col-6-lg ms-auto">
                                <h5 style="margin-left:10px">Paper ID : </h5>
                                  </div>
                                  <div class="col col-6-lg ms-auto"><span><?php echo $row_q_p['paper_id'] ?></span></div>
                                </div>
                                <div class="row">
                                  <div class="col col-6-lg ms-auto">
                                <h5 style="margin-left:10px" > Title : </h5>
                                  </div>
                                  <div class="col col-6-lg ms-auto"><span><?php echo $row_q_p['name_th'] ?></span></div>
                                </div>
                                <div class="row">
                                  <div class="col col-6-lg ms-auto">
                                <h5 style="margin-left:10px"> Status : </h5>
                                  </div>
                                  <div class="col col-6-lg ms-auto"><span><?php echo $row_status['status'] ?></span></div>
                                </div>
                                <div class="row">
                                  <div class="col col-6-lg ms-auto">
                                <h5 style="margin-left:10px"> Abstract : </h5>
                                  </div>
                                  <div class="col col-6-lg ms-auto"><span><?php echo $row_q_p['abstract'] ?></span><br></div> 
                                </div>
                                <div class="row">
                                
                                <?php
                                $i = 1;
                                $q_RA = "SELECT user.first_name,user.last_name,reviewer_answer.status,reviewer_answer.score,reviewer_answer.comment,status_tb.status
                                FROM user,reviewer_answer,status_tb WHERE reviewer_answer.paper_id =$id_paper AND reviewer_answer.reviewer_id = user.username AND status_tb.id = reviewer_answer.status";
                                $result_RA = mysqli_query($con, $q_RA);
                                
                                while ($row_RA = mysqli_fetch_array($result_RA)) { ?>
                                  
                                  <div class="col col-12-lg ms-auto">
                                  <h4 style="margin-left:10px" > สถานะผู้ตรวจคนที่ <?php echo $i++ ?> </h4>
                                <p style="margin-left:10px"> ชื่อ : <?php echo $row_RA['first_name'] . " " . $row_RA['last_name'] ?> </p>
                                    <p style="margin-left:10px"> คะแนน : <?php echo $row_RA['score'] ?></p>
                                    <p style="margin-left:10px"> ผลตรวจ : <?php echo $row_RA['status'] ?></p>
                                    <p style="margin-left:10px"> คอมเมนต์ : <?php echo $row_RA['comment'] ?></p>
                                    </div>
                                <?php 
                            
                            } ?>
                            
                              </div>
                           
                                <br>
                                <div style="text-align:right" >
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div><br>
                            </div>
                                </div>
                                
                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div> 
      </div>
     
    </div>
  </div>
</div>