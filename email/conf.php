<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/autoload.php';
function enviaEmail($mensagem)
{
   $email = 'canelosrs@gmail.com';
   $senha = 'quaraicanelos';
   $mail = new PHPMailer(TRUE);
   $mail->isSMTP();
   $mail->Host = 'smtp.gmail.com';
   $mail->setLanguage('pt_br');
   $mail->CharSet = 'utf-8';
   $mail->SMTPAuth = TRUE;
   $mail->SMTPSecure = 'tls';
   $mail->Username = $email;
   $mail->Password = $senha;
   $mail->Port = 587;
   $mail->isHTML(true);
   $mail->SMTPOptions = array(
      'ssl' => array(
         'verify_peer' => false,
         'verify_peer_name' => false,
         'allow_self_signed' => true
      )
   );
   try {
      $mail->setFrom($email);
      $mail->addAddress('canelosoficial@gmail.com');
      $mail->Subject = 'Contato através do site';
      $mail->Body = $mensagem;
      $mail->send();
      return true;
   } catch (Exception $e) {
      return false;
   } catch (\Exception $e) {
      return false;
   }
}
