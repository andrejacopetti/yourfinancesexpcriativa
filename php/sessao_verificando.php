<?php

    error_reporting(0);

    session_start();

    if($_SESSION['logged'] != null)
    {
        if($_SESSION['logged'] == true)
        {
            echo json_encode("OK");     
        }else if(!isset($_SESSION['logged'])){
            echo json_encode("NOT");
        }else {
            echo json_encode("NOT");
        }
    
        if (time() > $_SESSION["expiration_time"]) {
    
            $_SESSION['email'] = "";
            $_SESSION['logged'] = "";
    
            session_unset();
            session_destroy();
            echo json_encode("NOT");
         }
    }
    else{
       
            echo json_encode("NOT");
    }
   

?>