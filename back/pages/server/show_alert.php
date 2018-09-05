<?php
    if(isset($_SESSION['alert'])){
        if($_SESSION['alert']==1){
            echo '<script>alert("เกิดข้อผลิดพลาดโปรดลองใหม่อีกครั้ง.");</script>';
        }
        elseif($_SESSION['alert']==2){
            echo '<script>alert("อัพโหลดสำเร็จ.");</script>';
        }
        elseif($_SESSION['alert']==3){
            echo '<script>alert("แก้ไขสำเร็จ.");</script>';
        }
        elseif($_SESSION['alert']==4){
            echo '<script>alert("ลบข้อมูลสำเร็จ.");</script>';
        }
        elseif($_SESSION['alert']==5){
            echo '<script>alert("ล้มเหลวเพราะนอนเหนือเวลาที่กำหนด.");</script>';
        }
        $_SESSION['alert']=0;
    }
?>