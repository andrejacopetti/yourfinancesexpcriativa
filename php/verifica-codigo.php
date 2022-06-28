<?php

    session_start();
    
    if(isset($_SESSION['email'])){

        $token = $_SESSION['token'];

        $codigo = $_POST["codigo"];

        if($token == $codigo){

            echo json_encode("OK");

            $_SESSION['logged'] = true;

            $_SESSION["creation_time"] = time();
            $_SESSION["expiration_time"] = $_SESSION["creation_time"] + 3200;

            $codigo = "";
    
            $_SESSION['token'] = "";    
            
        }else{
            $codigo = "";
            echo json_encode("NOT");
        }
    }else{
        echo json_encode("NO");
    }
    

    

?>

