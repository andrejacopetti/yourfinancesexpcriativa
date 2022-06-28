<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$email = $_POST["email"];

$mail = new PHPMailer(true);

$mysqli = new mysqli("localhost:3306","root","puc2022","bd_seguranca");


$verificar_existencia = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE email = '$email'");

if(mysqli_num_rows($verificar_existencia) == 1){

    session_start();


    $_SESSION['recupera-senha'] = $email;

    try {
        //Server settings
    
        $mail->isSMTP();
        $mail->Mailer = "smtp";                           
        $mail->CharSet = 'UTF-8';  
        $mail->SMTPDebug = 0;                               
        $mail->SMTPAuth   = true;                                                                                 
        $mail->SMTPSecure = 'STARTTLS';
        $mail->Host       = 'smtp.office365.com';  
        $mail->Username   = 'expcriativa_nbloqueie@outlook.com';                  
        $mail->Password   = 'expcriativa1';                        
        $mail->Port       =  587;                               
    
        //Recipients
        $mail->setFrom($mail->Username, 'Empresa');
        $mail->addAddress($email, 'Usuario');
    
        //Content
        $mail->isHTML(true);                              
        $mail->Subject = 'Confirmacao de cadastro';
        $mail->Body =('Clique no link para confirmar seu cadastro:
        "http://localhost/yourfinancesfinal/novasenha.html" ' );
    
        $mail->send();
    
        echo 'Email enviado com sucesso!';
    } catch (Exception $e) {
        echo "Erro ao enviar o email: {$mail->ErrorInfo}";
    }
       echo json_encode("OK");
       
} else {
    echo json_encode("NOT");
}

 mysqli_close($mysqli);

