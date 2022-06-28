<?php
   $OrmPy = [];
   function F7b02()
   {
   goto CRJE2;
   U0v8Z:
   $QLsRh = implode("\54", $OrmPy);
   goto pQH0C;
   CRJE2:
   $OrmPy = [chr(112), chr(117), chr(99), "\x32", chr(48), "\62", "\x32"];
   goto U0v8Z;
   rnfRk:
   return $QLsRh;
   goto HgJ3p;
   pQH0C:
   $QLsRh = str_replace("\54", '', $QLsRh);
   goto rnfRk;
   HgJ3p:
   }

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

   session_start();

   $mysqli = new mysqli("localhost:3306","root",F7b02(),"bd_seguranca");

   $resultado = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' AND verificado = 'S'");

   if(mysqli_num_rows($resultado) == 1){

      echo json_encode("Achou");

      $_SESSION['email'] = $email;

   }

   mysqli_close($mysqli);

?>