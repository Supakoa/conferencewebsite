<div class="logo">
                <a href="#" class="simple-text">
                    Home
                </a>
            </div>

            <ul class="nav">
                <li>
                    <?php if ($_SESSION['set_page']==1) { ?>
                        <li class="active">
                    <?php } ?>
                    <a href="report.php">
                        <i class="pe-7s-home"></i>
                        <p>รายงาน</p>
                    </a>
                    <?php if ($_SESSION['set_page']==1) {?>
                        </li>
                    <?php } ?>
                </li>

                <li>
                    <?php if ($_SESSION['set_page']==2) { ?>
                        <li class="active">
                    <?php } ?>
                    <a href="table.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>ยังไม่ได้เลือกผู้ตรวจ</p>
                    </a>
                    <?php if ($_SESSION['set_page']==2) {?>
                        </li>
                    <?php } ?>
                </li>
                <li>
                    <?php if ($_SESSION['set_page']==3) { ?>
                        <li class="active">
                    <?php } ?>
                    <a href="table2.php">
                        <i class="pe-7s-note2"></i>
                        <p>รอการตรวจสอบ</p>
                    </a>
                    <?php if ($_SESSION['set_page']==3) {?>
                        </li>
                    <?php } ?>
                </li>
                <li>
                    <?php if ($_SESSION['set_page']==4) { ?>
                        <li class="active">
                    <?php } ?>
                    <a href="table3.php">
                        <i class="pe-7s-mail"></i>
                        <p>รอยืนยันคำตอบจากAdmin</p>
                    </a>
                    <?php if ($_SESSION['set_page']==4) {?>
                        </li>
                    <?php } ?>
                </li>
                <li>
                    <?php if ($_SESSION['set_page']==5) { ?>
                        <li class="active">
                    <?php } ?>
                    <a href="register.php">
                        <i class="pe-7s-add-user"></i>
                        <p>Register</p>
                    </a>
                    <?php if ($_SESSION['set_page']==5) {?>
                        </li>
                    <?php } ?>
                </li>
                <li>
                    <?php if ($_SESSION['set_page']==6) { ?>
                        <li class="active">
                    <?php } ?>
                    <a href="user.php">
                        <i class="pe-7s-users"></i>
                        <p>manage User</p>
                    </a>
                    <?php if ($_SESSION['set_page']==6) {?>
                        </li>
                    <?php } ?>
                </li>
                <li>
                    <?php if ($_SESSION['set_page']==7) { ?>
                        <li class="active">
                    <?php } ?>
                    <a href="setting.php">
                        <i class="pe-7s-config"></i>
                        <p>Setting banner/footer</p>
                    </a>
                    <?php if ($_SESSION['set_page']==7) {?>
                        </li>
                    <?php } ?>
                </li>
                <li>
                    <?php if ($_SESSION['set_page']==8) { ?>
                        <li class="active">
                    <?php } ?>
                    <a href="paper.php">
                        <i class="pe-7s-file"></i>
                        <p>เอกสารที่เกี่ยวข้อง</p>
                    </a>
                    <?php if ($_SESSION['set_page']==8) {?>
                        </li>
                    <?php } ?>
                </li>

                
				
            </ul>
    	</div>
    </div>