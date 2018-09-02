<?php
    if (isset($_SESSION['online'])) {
        if($_SESSION['online']==0){
            header("Location: ../index.php");
        }
        elseif($_SESSION['online']==1){

        }
    }else{
        header("Location: ../index.php");
    }
?>