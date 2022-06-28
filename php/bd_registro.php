<?php
   // dado que vem no POST
   $dados = $_POST["mensagem"];

   // dados que vem da funcao de criptografia
   $mensagem = $dados["dados"];
   $chave = $dados["chave"];
   $iv = $dados["iv"];

   // echo json_encode($mensagem);
   // echo json_encode($chave);
   // echo json_encode($iv);

   // echo json_encode($dados);
   // // echo json_encode($dados);

   $conteudo_chave = file_get_contents("../chaves/private_key.pem");

   $chave_privada = openssl_pkey_get_private($conteudo_chave);

   // descriptografa chave e iv
   openssl_private_decrypt( base64_decode($chave), $chave, $chave_privada );
   openssl_private_decrypt( base64_decode($iv), $iv, $chave_privada );

   $chave = trim($chave, '"');
   $iv = trim($iv, '"');
   

   // descriptografa os dados
   $mensagem_decrypt = openssl_decrypt($mensagem, "aes-128-cbc", $chave, OPENSSL_ZERO_PADDING, $iv);

   $mensagem_decrypt = trim($mensagem_decrypt);
   $mensagem_decrypt = json_decode($mensagem_decrypt, true);

   $email= $mensagem_decrypt["email"];
   $senha = $mensagem_decrypt["senha"];
   $telefone = $mensagem_decrypt["telefone"];

   $mysqli = new mysqli("localhost:3306","root","puc2022","bd_seguranca");

   if (!$mysqli) {
      die("Falha de conexao: " . mysqli_connect_error());
   }

   $verificar_existencia = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE email = '$email'");

   $adicionar = "INSERT INTO usuarios (email,senha,telefone,verificado,ganhos,despesas) VALUES ('$email','$senha','$telefone','N','0','0')";

   if(mysqli_num_rows($verificar_existencia) == 0){
      if (mysqli_query($mysqli, $adicionar)) {
         session_start();
         $_SESSION['email-verificar'] = "";
         $_SESSION['email-verificar'] = $email;
         echo json_encode("OK");
      } else {
         echo "Erro: " . $adicionar . "<br>" . mysqli_error($mysqli);
      }
   }else{
      echo json_encode("NOT");
   }

   mysqli_close($mysqli);
?>