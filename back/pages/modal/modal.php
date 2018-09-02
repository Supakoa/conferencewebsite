<!-- Button trigger modal -->
<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal<?php echo $row['paper_id'] ?>">
  เลือกผู้ตรวจ
</button>

<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $row['paper_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกผู้ตรวจ</h4>
      </div>
      <div class="modal-body">
      <div class="card">
                           
                            <div class="content">
                                <form method = "POST" action= "setup/up_reviewer.php?id=<?php echo $row['paper_id'] ?>" >
                                <h4>Paper ID : <?php echo $row['paper_id'] ?></h4>
                                <h5> Title : <?php echo $row['name_th'] ?></h5>
                                <h5> Status : <?php echo $row_status['status'] ?></h5>
                                <h5> Field : <?php echo $row['field'] ?></h5>
                                <h5> Abstract : <?php echo $row['abstract'] ?></h5>
                                <p>ผู้ตรวจคนที่ 1 : </p><select class="form-control" name="reviewer1" required>
                                              <option disabled >เลือกผู้ตรวจ</option>
                               <?php
                              $q_reviewer = "SELECT * FROM user WHERE role = 2 ";
                              $result_reviewer = mysqli_query($con, $q_reviewer);
                              while ($row_reviewer = mysqli_fetch_array($result_reviewer)) { ?>
                                  <option value="<?php echo $row_reviewer['username'] ?>"><?php echo $row_reviewer['first_name'] . "  " . $row_reviewer['last_name'] ?></option>
                                 <?php 
                              } ?>

                                 </select>
                                 <p>ผู้ตรวจคนที่ 2 : </p><select class="form-control" name="reviewer2" required>
                                              <option disabled >เลือกผู้ตรวจ</option>
                               <?php
                              $q_reviewer = "SELECT * FROM user WHERE role = 2 ";
                              $result_reviewer = mysqli_query($con, $q_reviewer);
                              while ($row_reviewer = mysqli_fetch_array($result_reviewer)) { ?>
                                  <option value="<?php echo $row_reviewer['username'] ?>"><?php echo $row_reviewer['first_name'] . "  " . $row_reviewer['last_name'] ?></option>
                                 <?php 
                              } ?>

                                 </select>
                                <br>
                                <div align = "right" >
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name = "save" >Save changes</button>
                                <?php
                               
                                
                                ?>
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