<?php
    session_start();

    if(isset($_SESSION['logged'])){
        if($_SESSION['logged'] = true){
            echo json_encode("LOGADO");
        }
    }


?>