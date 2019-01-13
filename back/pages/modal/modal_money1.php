<!-- Button trigger modal -->
<button type="button" class="btn btn-primary form-control btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row['username'] ?>">
  ยืนยันสถานะ
</button>

<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $row['username'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ยืนยันสถานะ</h4>
      </div>
      <div class="modal-body">
      <div class="card">
                           
                            <div class="content">
                                    <img src="../../Bill/<?php echo $row ['tmp_name']?>" class="img-fluid" style="width:100%" alt="Responsive image">
                            <br><br>
                            <form action="setup/up_bill1.php?id=<?php echo $row['username'] ?>" method="post"></form>
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