<?php
    if(isset($_SESSION['counter_up'])){
        if($_SESSION['counter_up']==1){
            echo '<script>alert("เกิดข้อผลิดพลาดโปรดลองใหม่อีกครั้ง.");</script>';
        }
        elseif($_SESSION['counter_up']==2){
            echo '<script>alert("อัพโหลดสำเร็จ.");</script>';
        }
        elseif($_SESSION['counter_up']==3){
            echo '<script>alert("แก้ไขสำเร็จ.");</script>';
        }
        elseif($_SESSION['counter_up']==4){
            echo '<script>alert("ลบข้อมูลสำเร็จ.");</script>';
        }
        elseif($_SESSION['counter_up']==5){
            echo '<script>alert("ล้มเหลวเพราะนอนเหนือเวลาที่กำหนด.");</script>';
        }
        elseif($_SESSION['counter_up']==6){
            echo '<script>alert("ผู้ตรวจซ้ำกัน กรุณาลองอีกครั้ง.");</script>';
        }
        $_SESSION['counter_up']=0;
    }
?>