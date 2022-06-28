<?php
    
    session_start();

    if($_SESSION['email-verificar'] != null){
        $mysqli = new mysqli("localhost:3306","root","puc2022","bd_seguranca");

        $email = $_SESSION['email-verificar'];

        $verificar= "UPDATE usuarios SET verificado =  'S' WHERE email = '$email'";


        if (mysqli_query($mysqli, $verificar)) {
            $_SESSION['email-verificar'] = "";
            echo json_encode("OK");
         } else {
            echo "Erro: " . $adicionar . "<br>" . mysqli_error($mysqli);
         }

        session_unset();

        session_destroy();
       

        mysqli_close($mysqli);
    }

?>