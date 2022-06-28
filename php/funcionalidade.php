<?php

    session_start();

    $mysqli = new mysqli("localhost:3306","root","puc2022","bd_seguranca");

    $email = $_SESSION['email'];

    if(isset($_POST["ganhos"])){
        $ganhos = $_POST["ganhos"];
        $ganhos_add = "UPDATE usuarios SET ganhos =  ganhos + '$ganhos' WHERE email = '$email'";
        if (mysqli_query($mysqli, $ganhos_add)) {
            echo json_encode("");
        }else {
            echo "Error: " . $ganhos_add . "<br>" . mysqli_error($mysqli);
      } 
    }

    if(isset($_POST["despesas"])){
        $despesas = $_POST["despesas"];
        $despesas_add = "UPDATE usuarios SET despesas =  despesas + '$despesas' WHERE email = '$email'";
        if (mysqli_query($mysqli, $despesas_add)) {
            echo json_encode("");
        }else {
            echo "Error: " . $despesas_add . "<br>" . mysqli_error($mysqli);
      }    
    }

    //SELECT ganhos - despesas FROM usuarios;
    
  mysqli_close($mysqli);

?>