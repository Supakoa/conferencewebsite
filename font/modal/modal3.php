<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row1['paper_id'] ?>">
  ส่งผลตรวจ
</button>

<!-- Modal -->
<div class="modal fade " id="myModal<?php echo $row1['paper_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h4  class="modal-title" id="myModalLabel">รายละเอียด</h4>
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
            <h5 style="margin-left:20px">Paper ID : </h5>
            </div>
            <div class="col col-6-lg ms-auto">
            <span><?php echo $row_q_p['paper_id'] ?></span></div>
          </div>
          <div class="row">
            <div class="col col-6-lg ms-auto">
            <h5 style="margin-left:20px"> Title(Th) : </h5>
            </div>
            <div class="col col-6-lg ms-auto"><span><?php echo $row_q_p['name_th'] ?></span></div>
          </div>
          <div class="row">
            <div class="col col-6-lg ms-auto">
            <h5 style="margin-left:20px"> Title(Eng) : </h5>
             </div>
            <div class="col col-6-lg ms-auto"><span><?php echo $row_q_p['name_eng'] ?></span></div>
          </div>
          <div class="row">
            <div class="col col-6-lg ms-auto">
            <h5 style="margin-left:20px"> Status : </h5>
            </div>
            <div class="col col-6-lg ms-auto"><span><?php echo $row_status['status'] ?></span></div>
          </div>
          <div class="row">
            <div class="col col-6-lg ms-auto">
            <h5 style="margin-left:20px"> Abstract : </h5>
            </div>
            <div class="col col-6-lg ms-auto"><span><?php echo $row_q_p['abstract'] ?></span></div>
          </div>
          <div class="row">
            <div class="col col-6-lg ms-auto">
            <h5 style="margin-left:20px"> Keyword : </h5>
            </div>
            <div class="col col-6-lg ms-auto"><span><?php echo $row_q_p['key_word'] ?></span></div>
          </div>
          <div class="row">
            <div class="col col-6-lg ms-auto">
            <h5 style="margin-left:20px">Download : </h5>
            </div>
            <div class="col col-6-lg ms-auto"><a class="btn btn-info btn-sm" Download href="uploads/<?php echo $row_q_p['file_tmp_name'] ?>">Click Here</a></div>
          </div>
                                
                                <br>
                                
                                <!-- ใส่ที่ดาวโหลดไฟล์ -->
                                <h3 style="margin-left:10px">สรุปผลตรวจ</h3>
                                <div class="container">
                                <form action="server/up_answer.php?id=<?php echo $row_q_p['paper_id'] ?>" method="POST">
                                <p>ผลตรวจ : </p><select class="form-control" name="done" required>
                                              <option disabled selected  value = "" >เลือกสถานะ</option>
                                              <option  value = "2" >ผ่าน</option>
                                              <option  value = "3" >ไม่ผ่าน</option>
                                              <option  value = "4" >แก้ไข</option>
                                              </select>
                                              <label>คะแนน  </label>
                            <input class="form-control" name="score" type="text" placeholder="score" required="required" data-validation-required-message="Please enter Score.">
                            <p class="help-block text-danger"></p>
                            <label>คอมเมนท์  </label>
                            <input class="form-control" name="comment" type="text" placeholder="comment" required="required" data-validation-required-message="Please enter comment.">
                            <p class="help-block text-danger"></p>
                                              <br>

                                <div class="container" style="text-align:right" >
                                <button type="submit" class="btn btn-primary btn-sm" id="sendMessageButton">Submit</button>
                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                </div>
                                </form><br>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div> 
      </div>
     
    </div>
  </div>
</div>