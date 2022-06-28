<?php
    session_start();


    if(isset($_SESSION['email'])){
        if($_SESSION['email'] != null){
            echo json_encode("OK");
        }else{
            echo json_encode("NO");
        }
        
    }else{
        echo json_encode("NO");
    }


?>