<?php
    session_start();


    if(isset($_SESSION['recupera-senha'])){
        if($_SESSION['recupera-senha'] != null){
            echo json_encode("OK");
        }else{
            echo json_encode("NO");
        }
    }else{
        echo json_encode("NO");
    }
?>