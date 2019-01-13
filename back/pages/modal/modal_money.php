<!-- Button trigger modal -->
<button type="button" class="btn btn-primary form-control btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row['paper_id'] ?>">
  ยืนยันสถานะ
</button>

<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $row['paper_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ยืนยันสถานะ</h4>
      </div>
      <div class="modal-body">
      <div class="card">
                           
                            <div class="content">
                                <form method = "POST" action= "setup/up_bill.php?id=<?php echo $row['paper_id'] ?>">

                                <h4>รหัสเอกสาร : <?php echo $row['paper_id'] ?></h4>
                                <h5> คำนำ : <?php echo $row['name_th'] ?></h5>
                                <h5> สถานะ : <?php echo $row['status'] ?></h5>
                                <h5> คำหลัก : <?php echo $row['key_word'] ?></h5>
                                <h5> บาทความ : <?php echo $row['abstract'] ?></h5>
                                <br>
                                <img src="../../Bill/<?php echo $row ['tmp_money']?>" class="img-fluid" style="width:100%" alt="Responsive image">
                            <br><br>
                             <p>ยืนยันสถานะ : </p><select class="form-control" name="done" required>
                                               <option disabled selected >เลือกสถานะ</option>
                                              <option  value = "8" >ชำระแล้ว</option>
                                            
                                              <option  value = "4" >แก้ไข</option>
                                              </select>
                                              <br>
                                <div style="text-align:right" >
                                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                                <button type="submit" class="btn btn-primary">บันทึก </button>
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