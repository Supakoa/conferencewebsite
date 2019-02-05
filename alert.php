<?php
    if (isset($_SESSION['alert'])) {
        switch ($_SESSION['alert']) {
            // กรอกข้อมูลไม่ถูกต้อง
            case '1':
                echo "  <script>
                            Swal({
                                type: 'error',
                                title: 'กรอกข้อมูลผิดพลาด',
                                text: 'กรอกข้อมูลใหม่อีกครั้ง.',
                                // footer: '<a href>Why do I have this issue?</a>'
                            });
                        </script>";
            break;

            case '2':
                echo "
                    <script>
                        Swal({
                            type: 'warning',
                            title: 'กรุณาเข้าสู่ระบบ',
                            text: 'แสดงตัวตนทุกครั้งก่อนเข้าสู่ระบบ.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;
            
            case '3':
                echo "
                    <script>
                        Swal({
                            type: 'success',
                            title: 'เพิ่มข้อมูลสำเร็จ',
                            text: 'ข้อมูลเข้าสู่ระบบเรียบร้อย.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '4':
                echo "
                    <script>
                        Swal({
                            type: 'error',
                            title: 'เพิ่มข้อมูลไม่สำเร็จ',
                            text: 'เกิดข้อผลิตพลาดในการนำเข้าข้อมูล.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '5':
                echo "
                    <script>
                        Swal({
                            type: 'warning',
                            title: 'ชื่อผู้ตรวจซ้ำกัน',
                            text: 'กรุณาใส่ชื่อผู้ตรวจใหม่อีกครั้ง.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '6':
                echo "
                    <script>
                        Swal({
                            type: 'warning',
                            title: 'ยืนยัน password และ email ไม่ตรงกัน',
                            text: 'กรุณากรอกใหม่อีกครั้ง.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '7':
                echo "
                    <script>
                        Swal({
                            type: 'warning',
                            title: 'ยืนยัน password ไม่ตรงกัน',
                            text: 'กรุณากรอกใหม่อีกครั้ง.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '8':
                echo "
                    <script>
                        Swal({
                            type: 'warning',
                            title: 'ยืนยัน email ไม่ตรงกัน',
                            text: 'กรุณากรอกใหม่อีกครั้ง.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '9':
                echo "
                    <script>
                        Swal({
                            type: 'warning',
                            title: 'username นี้ถูกใช้งานไปแล้ว',
                            text: 'กรุณาใช้ชื่อใหม่.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '10':
                echo "
                    <script>
                        Swal({
                            type: 'success',
                            title: 'แก้ไขข้อมูลสำเร็จ',
                            text: 'ข้อมูลเข้าสู่ระบบเรียบร้อย.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '11':
                echo "
                    <script>
                        Swal({
                            type: 'error',
                            title: 'แก้ไขข้อมูลไม่สำเร็จ',
                            text: 'เกิดข้อผลิตพลาดในการนำเข้าข้อมูล.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '12':
                echo "
                    <script>
                        Swal({
                            type: 'success',
                            title: 'ลบข้อมูลสำเร็จ',
                            text: 'ข้อมูลถูกลบออกจากระบบเรียบร้อย.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '13':
                echo "
                    <script>
                        Swal({
                            type: 'error',
                            title: 'ลบข้อมูลไม่สำเร็จ',
                            text: 'เกิดข้อผลิตพลาดในการลบข้อมูล.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '14':
                echo "
                    <script>
                        Swal({
                            type: 'error',
                            title: 'ข้อมูลไม่ถูกต้อง',
                            text: 'เข้าสู่ระบบอีกครั้ง.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '15':
                echo "
                    <script>
                        Swal({
                            type: 'error',
                            title: 'ไฟล์ใหญ่เกินไป (มากกว่า 60MB)',
                            text: 'ลองอัพโหลดใหม่อีกครั้ง.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '16':
                echo "
                    <script>
                        Swal({
                            type: 'error',
                            title: 'อัพโหลดได้เฉพาะไฟล์ doc,docx เท่านั้น',
                            text: 'ลองอัพโหลดใหม่อีกครั้ง.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;
            
            case '17':
                echo "
                    <script>
                        Swal({
                            type: 'error',
                            title: 'อัพโหลดได้เฉพาะไฟล์ JPG,PNG  เท่านั้น',
                            text: 'ลองอัพโหลดใหม่อีกครั้ง.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '18':
                echo "
                    <script>
                        Swal({
                            type: 'warning',
                            title: 'อยู่นอกช่วงเวลาที่กำหนด',
                            text: 'กรุณาอัปโหลดลงในช่วงเวลาที่กำหนด.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;
            
            // $_SESSION['alert'] = 0 or null
            default:
                # code...
                break;
        }
    }
    unset($_SESSION['alert']);
?>