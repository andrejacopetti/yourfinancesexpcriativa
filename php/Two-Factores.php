<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';



$mail = new PHPMailer(true);

session_start();

    if(isset($_SESSION['email'])){
        try {

            $email = $_SESSION['email'];

            $token = random_int(10000, 99999);

            $_SESSION['token'] = $token;
    
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
    
      
            $mail->setFrom($mail->Username, 'Empresa');
            $mail->addAddress($email, 'Usuario');
    
        
            $mail->isHTML(true);                              
            $mail->Subject = 'Confirmacao de cadastro';
            $mail->Body =('Seu token de acesso e: '.$token);
    
            $mail->send();
    
        } catch (Exception $e) {
            echo "Erro ao enviar o token ao email: {$mail->ErrorInfo}";
        }
    
        echo json_encode("OK");
    }else{
        echo json_encode("NO");
    }
?>