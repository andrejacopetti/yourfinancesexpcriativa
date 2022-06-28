<?php

    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require './Exception.php';
    require './PHPMailer.php';
    require './SMTP.php';
    

    $mail = new PHPMailer(true);

    // Configuração
    
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    $mail->IsSMTP(); 
	$mail->CharSet = 'UTF-8';   
	$mail->SMTPDebug = 0;
	$mail->SMTPAuth = true;     
	$mail->SMTPSecure = 'ssl'; 
    $mail->Host = 'smtp.gmail.com'; 
	$mail->Port = 587;

    // Detalhes do envio de E-mail
	$mail->Username = 'bancoflorsa@gmail.com'; 
	$mail->Password = 'meubancoehflor';
	$mail->SetFrom($mail->Username, 'Banco Flor S.A.');
    $mail->addAddress('');
	$mail->Subject = "Bem-vindo(a) cliente!";
	$mail->Body =("Se você está recebendo este email, confirme seu cadastro no link abaixo:
    
        'http://127.0.0.1/MAMP/htdocs/Mailer-masterSite/Site/msgconfirmacadastro.php' " );

    $mail->isHTML(true);
    
    if ( $mail->send()){
        echo "email enviado com sucesso";

    }else {
        echo "Falha ao enviar email" . $mail->ErrorInfo;

    }
   

?>