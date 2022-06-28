<?php

   session_start();


   if(isset($_SESSION['recupera-senha'])){

      $dados = $_POST["mensagem"];

      $conteudo_chave = file_get_contents("../chaves/private_key.pem");

      $chave_privada = openssl_pkey_get_private($conteudo_chave);

      openssl_private_decrypt( base64_decode($dados), $mensagem, $chave_privada );

      $mensagem_decode = json_decode($mensagem);
      $mensagem_encode = json_encode($mensagem_decode);

      $mensagem_trim = trim($mensagem_encode, true);

      $mensagem_trim = json_decode($mensagem_trim);

      $mensagem_trim = get_object_vars($mensagem_trim);

      $email = $_SESSION['recupera-senha'];

      $senha = $mensagem_trim["senha"];

      $mysqli = new mysqli("localhost:3306","root","puc2022","bd_seguranca");

      if (!$mysqli) {
         die("Falha de conexao: " . mysqli_connect_error());
      }

      $adicionar = "UPDATE usuarios SET senha = '$senha' WHERE email = '$email'";

      
      if (mysqli_query($mysqli, $adicionar)) {
         echo json_encode("OK");
      } else {
         echo "Erro: " . $adicionar . "<br>" . mysqli_error($mysqli);
      }

      $_SESSION['recupera-senha'] = "";

      session_unset();

      session_destroy();
   
      mysqli_close($mysqli);
      
   }else{
      echo json_encode("NOT");
   }

   

   

   
?>